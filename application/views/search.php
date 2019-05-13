<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>
            /* 搜索页 */

            .custom-page-nav input[type=search]{
                padding-left: 0.5rem;
                margin: 0;
                font-size: 0.34rem;
            }

            .mui-bar .mui-title {
                height:0.853rem;
                margin-top: 0.16rem;
                width: 86%;
                left: 0;
                line-height: 1.1rem;
                background-color: rgba(244,245,250,1);
                border-radius:0.08rem;
            }
            .mui-input-group:after{
                height:0;
            }
            .custom-page-nav .mui-btn-link {
                color: #323232; 
                position: absolute;
                top: 0;
                right:0;
            }

            .mui-btn-blue:enabled:active {
                color: #404040;
                border: none;
            }
            .search-history{
                min-height: 4.106rem;
            }
            .search-history h2 {
                height: 1.14rem;
                line-height: 1.14rem;
                padding: 0 0.61rem 0 0.4rem;
                font-size: 0.4rem;
            }

            .search-history h2 span {
                color: #a8a8a8;
                font-size: 0.34rem;
            }
            
            .history-lists {
                padding: 0 0.4rem;
            }

            .search-result li,
            .history-lists li {
                display: inline-block;
                margin-right: 0.6rem;
                font-size: 0.34rem;
                border-radius: 4px;
                padding: 0.15rem 0.32rem;
            }

            .history-lists li {
                margin-bottom: 0.4rem;
                background:rgba(249,249,252,1);
            }

            .search-result ul {
                padding: 0.2rem;
            }
        </style>
    </head>

    <body>
            <header id="header" class="mui-bar mui-bar-nav custom-bg-color-white custom-page-nav">
                <form class="mui-input-group">
                    <div class="mui-title mui-search">
                        <div class="custom-flex custom-flex-vc">
                            <img class="mui-icon" src="<?= base_url() ?>public/images/icons/search.png"/>
                            <input id="search" type="search" placeholder="请输入搜索关键字">
                        </div>
                    </div>
                </form>
                <button class="mui-action-back mui-btn mui-btn-blue mui-btn-link mui-pull-right">取消</button>
            </header>
            <div id="searchPage" class="mui-scroll-wrapper mui-content">
                <div class="mui-scroll">
                    <!-- 显示搜索历史 -->
                    <div class="search-history custom-bg-color-white">
                        <h2>历史记录
                            <span id="empty" class="mui-pull-right">清除历史</span>
                        </h2>
                        <div id="historyLists" class="history-lists">
                            <ul>

                            </ul>
                        </div>
                    </div>
                    <!-- 搜索结果显示 -->
                    <div class="search-result custom-bg-color-white" style="display: none;">
                        <ul class="searchlist">
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>

            $(function () {

                mui.init();

                ;
                (function (mui, $) {

                 
                    // ============================================== 详情页跳转 =================================
                    // 由历史记录列表跳转 
                    mui('#historyLists').on('tap', 'li', function () {
                        var searchName = $(this).text();
                        tools.route('brandItem?keyword='+searchName+'&brandname='+searchName);
                    });
                    // 由搜索结果列表跳转
                    mui('.search-result').on('tap', 'li', function () {
                        id = this.dataset.id;
                        name = $(this).text();
                        res = app.storageFetch('searchhistory');
                        if (res.length == 0) {
                            json = {'id': id, 'name': name}
                            res[0] = json
                        } else {
                            $.each(res, function (k, v) {
                                if (id == v.id) {
                                    res.splice(k, 1);
                                }
                            })
                            if (res.length >= 12) {
                                res.splice(11, 99);
                            }
                            json = {'id': id, 'name': name};
                            res.unshift(json)
                        }
                        app.storageSave('searchhistory', res);
                        tools.route('brandItem?selectid='+id);
                        $('#search').val("");
                    });

                    function gethistory() {
                        datas = app.storageFetch('searchhistory')
                        htmls = '';
                        if (datas != '') {
                            $.each(datas, function (k, v) {
                                htmls += '<li el="' + v.id + '">' + v.name + '</li>'
                            })
                            $('#historyLists ul').html(htmls)
                        }
                    }
                    gethistory()

                    // ============================================ 实时监听 input value ===========================
                    $('#search').bind('input propertychange', function (e) {
                        e.preventDefault();  
                        if ($(this).val() != "") {
                            $('.search-history').hide().next().show();
                        } else {
                            $('.search-history').show().next().hide();
                        }
                    });


                $("#search").on('keypress',function(e) {
                    var keycode = e.keyCode;
                    var searchName = $(this).val();
                    if(keycode=='13') {
                        e.preventDefault();  

                        res = app.storageFetch('searchhistory');
                        if (res.length == 0) {
                            json = {'name': searchName}
                            res[0] = json
                        } else {
                            $.each(res, function (k, v) {
                                if (searchName == v.name) {
                                    res.splice(k, 1);
                                }
                            })
                            if (res.length >= 12) {
                                res.splice(11, 99);
                            }
                            json = {'name': searchName};
                            res.unshift(json);
                        }
                        app.storageSave('searchhistory', res);
                        tools.route('brandItem?keyword='+searchName+'&commodity='+searchName);
                        $('#search').val("");
                    }
                })

                    // ========================================== 清空历史记录 =======================================
                    var btnArray = ['取消', '确定'];
                    var emptyBtn = document.getElementById("empty");
                    var empty = function () {
                        mui.confirm('', '清除历史记录？', btnArray, function (e) {
                            if (e.index == 1) {
                                app.storageRemove('searchhistory')
                                $('#historyLists').remove();
                            } else {
                                // $.swipeoutClose();
                            }
                        })
                    }
                    emptyBtn.addEventListener('tap', function () {
                        empty();
                    });


                    // ========================================== 工具方法 =======================================
                    var tools = {
                        route: function (url) {
                            mui.openWindow({
                                url: url
                            });
                        }
                    }
                })(mui, jQuery);
            })
        </script>
    </body>

</html>