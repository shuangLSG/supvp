<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>家庭认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/rzFamily.css" />

    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll page-section-60">
                <section class="limit-hd">
                    <h2 class="text-size-25 font-black">家庭认证</h2>
                    <div class="limit-content">
                        <span class="font-SFU text-size-30 font-deep-purple">7,000</span>
                        <p class="font-purple tetx-size-12">最高可提升额度(元)</p>
                    </div>
                </section>



                <section class="limit-bd margin-h-10">
                    <form class="mui-input-group">
                        <div id="link-areaSelect" class="mui-input-row text-size-15">
                            <label class="font-black">所在地区</label>
                            <input id="city" type="text" name="input" placeholder="请输入所在地区">
                            <img src="<?= base_url() ?>public/images/icons/next_arrow.png" alt="">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">详细地址</label>
                            <input id="address" type="text" name="input" placeholder="请输入详细地址">
                        </div>
                    </form>

                    <section class="tab-box" data-marital="1" data-children="1">
                        <div class="info-item text-size-15">
                            <p class="font-black text-size-15">婚姻状况</p>
                            <div class="right-content">
                                <ul id="marital" class="filter-cell">
                                    <li data-type="1" class="custom-tab-item active">已婚</li>
                                    <li data-type="0" class="custom-tab-item">未婚</li>
                                    <li class="custom-tab-item ">其他</li>
                                </ul>
                            </div>
                        </div>
                        
                        
                        <div class="info-item text-size-15">
                            <p class="font-black text-size-15">是否有子女</p>
                            <div class="right-content">
                                <ul id="children" class="filter-cell">
                                    <li data-type="1" class="custom-tab-item active">有</li>
                                    <li data-type="0" class="custom-tab-item">无</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="linkman-item text-size-15">
                            <div class="table-left font-black"><div>直系亲属1</div></div>
                            <form class="mui-input-group">
                                <div class="mui-input-row">
                                    <input class="relation" data-info="relations" type="text" name="input" placeholder="输入亲属关系">
                                </div>
                                <div class="mui-input-row">
                                    <input class="name" data-info="name" type="text" name="input" placeholder="输入姓名">
                                </div>
                                <div class="mui-input-row">
                                    <input class="phone"  data-info="mobile" type="text" name="input" placeholder="输入联系方式">
                                </div>
                            </form>
                        </div>
                        <div class="linkman-item text-size-15">
                            <div class="table-left font-black"><div>直系亲属2</div></div>
                            <form class="mui-input-group">
                                <div class="mui-input-row">
                                    <input class="relation" data-info="relations" type="text" name="input" placeholder="输入亲属关系">
                                </div>
                                <div class="mui-input-row">
                                    <input class="name" data-info="name" type="text" name="input" placeholder="输入姓名">
                                </div>
                                <div class="mui-input-row">
                                    <input class="phone" data-info="mobile" type="text" name="input" placeholder="输入联系方式">
                                </div>
                            </form>
                        </div>
                    </section>

                    <div class="mui-button-row">
                        <small class="text-size-12 font-purple">所有信息仅用于提升额度，绝不对外提供</small>
                        <button id="submit" class="mui-btn mui-btn-block mui-btn-blue text-size-16 custom-radius">确认并提交</button>
                    </div>
                </section>
            </div>
        </div>  


        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>

            $(function () {

                mui.init();
                (function (mui, $) {

                    initPage();

                    // 登录按钮的禁用状态
                    /*$('input').on('input propertychange', function () {
                        watchInput();
                    });*/


                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                    mui('form').on('tap', '#link-areaSelect', function () {
                        var json = ajaxParam();
                        localStorage.setItem('areaSelection', JSON.stringify(json));
                        
                        tools.route('../supvp/areaSelection');
                        // watchInput();
                    });

                    mui('.tab-box').on('tap','li',function(){
                        $(this).addClass('active').siblings().removeClass('active');
                        var type = $(this).data('type');
                        if(this.parentNode.id=='children'){
                            $('.tab-box').attr('data-children',type);
                        }else{
                            $('.tab-box').attr('data-marital',type);
                        }
                        // watchInput();
                    });


                    // 提交认证
                    document.querySelector('#submit').addEventListener('tap', function () {
                        if ($(this).hasClass('mui-btn-disabled')) {
                            mui.toast('请完善信息');
                            return;
                        }

                        addProfession();
                    });

                   
                    // ========================================== 工具方法 =======================================
                    function ajaxParam(){
                       
                        var city = $('#city').val();
                        var address = $('#address').val();
                        var marital = $('.tab-box').data('marital');
                        var children = $('.tab-box').data('children');

                        var linkmanArr =[];
                        $('.linkman-item').each(function(i,item){
                            var linkman={};
                            $(item).find('input').each(function(k,v){
                                var key = v.dataset.info;
                                linkman[key]=$(v).val();
                            });
                            linkmanArr.push(linkman);
                        });
                       
                        console.log(linkmanArr)
                        
                        var json = {
                            'area': city,
                            'address': address,
                            'marital':marital,
                            'children':children,
                            'linkman':JSON.stringify(linkmanArr)
                        }
                        return json;
                    }
                    function addProfession() {
                        $('input').each(function(i,item){
                            if(item.value==''){
                                mui.toast('请填写相关信息')
                            }
                        });    

                        var json = ajaxParam();    

                        $.post('../user/addFamily', json, function (res) {
                            if (res.s == 200) {
                                tools.route('../supvp/auditing');
                            }else{
                                mui.toast(res.d);
                            }
                        }, 'json');
                    }

                    function initPage(){
                        var info = storageFetch('areaSelection');

                        if(info.length==0&&info instanceof Array)return; 

                        $('#city').val(info.city);
                        $('#address').val(info.address);
                        $('.tab-box').find('li').removeClass('active').attr({'data-marital':info.marital,'data-children':info.children});
                        $('#marital').find('li[data-type='+info.marital+']').addClass('active');
                        $('#children').find('li[data-type='+info.children+']').addClass('active');
                        
                        var arr = JSON.parse(info.linkman);
                       
                        $('.linkman-item').eq(0).find('input[data-info="relations"]').val(arr[0].relation);
                        $('.linkman-item').eq(0).find('input[data-info="name"]').val(arr[0].name);
                        $('.linkman-item').eq(0).find('input[data-info="mobile"]').val(arr[0].phone);
                        $('.linkman-item').eq(1).find('input[data-info="relations"]').val(arr[1].relation);
                        $('.linkman-item').eq(1).find('input[data-info="name"]').val(arr[1].name);
                        $('.linkman-item').eq(1).find('input[data-info="mobile"]').val(arr[1].phone);
                        
                        storageRemove('areaSelection');
                    }

                    function storageFetch(key) {
                        return JSON.parse(localStorage.getItem(key)) || [];
                    }
                    function storageRemove(key) {
                        localStorage.removeItem(key);
                    }

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