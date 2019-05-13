<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css?t=0.01" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/classify.css?t=0.01" />
    </head>

    <body>
        <header id="header" class="mui-bar mui-bar-nav custom-bg-color-white custom-page-nav">
            <div class="mui-title mui-search mm-search custom-flex custom-flex-vc">
                <input id="search" type="search" class="mui-input-clear whiteBg">
                <span class="mui-placeholder custom-flex custom-flex-vc"><img class="mui-icon" src="<?= base_url() ?>public/images/icons/search.png"/><span>搜索你的精致生活</span></span>
            </div>
        </header>

        <div class="mui-scroll-wrapper mui-content custom-flex">
            <section class="menu-box">
                <div id="menu" class="custom-bg-color-white scroll-style"></div>                
            </section>
            <section class="content-box">
                <div id="main_content" class="main-content custom-bg-color-white"></div>                
            </section>
        </div>

        <div class="loading custom-flex-c"><i class="mui-icon mui-icon-spinner-cycle mui-spin Rotation"></i></div>

        <script id="menu_tpl" type="text/html">
            <ul class="">
                {{each d i index}}
                    <li id="classify_{{i.id}}" ><a href="#">{{i.name}}</a></li>
                {{/each}}
            </ul>
        </script>

        <script id="content_tpl" type="text/html">
            <div class="custom-bg-color-white">
                <h5>热门品牌</h5>
                <ul id="hot-brand" class="mui-table-view mui-grid-view">
                    {{each d.brand i index}}
                        <li id="brand_{{i.id}}" data-commodity="{{i.name}}" class="mui-table-view-cell mui-media">
                            <a href="#">
                                <img class="mui-media-object" src="{{i.logo}}">
                                <div class="mui-media-body">{{i.name}}</div>
                            </a>
                        </li>
                    {{/each}}
                </ul>
                <h5>热门分类</h5>
                <ul id="hot-commodity" class="mui-table-view mui-grid-view">
                    {{each d.selection i index}}
                        <li id="select_{{i.id}}"  data-commodity="{{i.name}}" class="mui-table-view-cell mui-media mui-col-xs-4">
                            <a href="#">
                                <img class="mui-media-object custom-around" src="{{i.logo}}">
                                <div class="mui-media-body">{{i.name}}</div>
                            </a>
                        </li>
                    {{/each}}
                </ul>      
            </div>
        </script>
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>
            $(function () {

                (function (mui, $) {

                    init();

                    mui('#menu').on('tap', 'li', function (e) {
                        var id=this.id.split('_')[1];
                        $(this).addClass('active').siblings().removeClass('active');
                        getData({lv:2,parent:id},'children');    
                    });
                    mui('.content-box').on('tap', 'li', function (e) {
                        var id=null,commodity=null;
                        if($(this).closest('ul').attr('id')=='hot-brand'){
                            id=this.id.split('_')[1];
                            commodity=this.dataset.commodity;
                            tools.route('../supvp/brandItem?brandid='+id+'&brandname='+commodity);
                        }else if($(this).closest('ul').attr('id')=='hot-commodity'){
                            id=this.id.split('_')[1];
                            commodity=this.dataset.commodity;
                            tools.route('../supvp/brandItem?selectid='+id+'&brandname='+commodity);
                        }
                    })
                    // 搜索
                    $(document).on('tap', '.mm-search', function () {
                        tools.route('search');
                    });


                    /**
                     * 页面初始化
                     * selectedId    lv1.id
                     */
                    function init(){
                        var selectedId = GetQueryString('id');

                        // 获取 一级分类
                        getData({lv:1});
                        // 获取 二级分类
                        getData({lv:2,parent:selectedId},'children');    
                    }


                    /**
                     * @param {Object} json 1、{lv:1} 一级分类    2、{lv:2,parent:lv1.id} 二级分类
                     * @param {string} lv   显示不同模版的标识（二级分类）
                     */
                    function getData(json,lv){
                        $.post('../api/classify', json, function (data) {
                            var data = JSON.parse(data);
                            if (data.s == 200) {
                                if(lv){
                                    $('#main_content').html(template('content_tpl', {d:data.d}));
                                }else{
                                    // selectedIndex  被选中lv1的索引
                                    var selectedIndex = GetQueryString('index');
                                    $('#menu').html(template('menu_tpl', {d:data.d}));
                                    $('#menu li').eq(selectedIndex).addClass('active');
                                }
                            }
                        });
                    }

                    var tools = {
                        route: function (url) {
                            mui.openWindow({
                                url: url
                            });
                        },
                        
                    }
                })(mui, jQuery);
            })
        </script>
    </body>

</html>