<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>公积金认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />

        <style>
            .page-section-60{
                padding-bottom:0;
            }
            .page-section-46{
                padding: 0 0.613rem 0;
            }
            .mui-input-row label{
                width: 44%;
            }
            .mui-input-row label~input{
                width:54%;
            }
            
            .limit-bd{
                padding-top:0.14rem;
            }
            .mui-button-row {
                margin-top: 0.82rem;
            }
            .mui-button-row button{
                margin-top: 0.38rem;
            }
        </style>
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll ">
                <section class="limit-hd page-section-60">
                    <h2 class="text-size-25 font-black">公积金认证</h2>
                    <div class="limit-content">
                        <span class="font-SFU text-size-30 font-deep-purple">7,000</span>
                        <p class="font-purple tetx-size-12">最高可提升额度(元)</p>
                    </div>
                </section>

              

                <section class="limit-bd margin-h-10 page-section-46">
                    <form class="mui-input-group">
                        <div id="link-areaSelect" class="mui-input-row text-size-15">
                            <label class="font-black">缴纳公积金所在城市</label>
                            <input id="city" type="text" placeholder="选择城市">
                            <img src="<?= base_url() ?>public/images/icons/next_arrow.png" alt="">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">公积金查询账户</label>
                            <input id="account" type="text" placeholder="请输入公积金查询账户">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">公积金查询密码</label>
                            <input id="password" type="text" placeholder="请输入公积金查询密码">
                        </div>
                    </form>
                </section>
                <div class="mui-button-row page-section-60">
                    <small class="text-size-12 font-purple">所有信息仅用于提升额度，绝不对外提供</small>
                    <button id="submit" class="mui-btn mui-btn-block mui-btn-disabled text-size-16 custom-radius">确认并提交</button>
                </div>
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
                    $('input').on('input propertychange', function () {
                        var city = $('#city').val(),
                            account = $('#account').val(),
                            password = $('#password').val();
                     
                        if (city!== ""&& account!== ""&&password!== "") {
                            $('button').removeClass('mui-btn-disabled').addClass('custom-btn-gradient');
                        } else {
                            $('button').addClass('mui-btn-disabled').removeClass('custom-btn-gradient');
                        }
                    });

                 
                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                    mui('form').on('tap','#link-areaSelect',function(){
                        var json = ajaxParam();
                        localStorage.setItem('areaSelection', JSON.stringify(json));
                        tools.route('../supvp/areaSelection');
                    });


                    // 提交认证
                    document.querySelector('#submit').addEventListener('tap', function () {
                        if($(this).hasClass('mui-btn-disabled')){
                            mui.toast('请完善信息');return;
                        }
                       
                        addProfession();
                    });

                    // ========================================== 工具方法 =======================================
                    function ajaxParam(){
                        var city = $('#city').val(),
                            account = $('#account').val(),
                            password = $('#password').val();
                        var json = {
                            'city':city,
                            'account':account,
                            'password':password
                        }
                        return json;
                    }
                    function addProfession(){
                        var json = ajaxParam();
                
                        $.post('../user/addReserved',json, function (res) {
                            if (res.s == 200) {
                                tools.route('../supvp/auditing');
                            }else{
                                mui.toast(res.d);
                            }
                        }, 'json');
                    }

                    function initPage(){
                       
                        var info = storageFetch('areaSelection');
                        $('#city').val(info.city);
                        $('#account').val(info.account);
                        $('#password').val(info.password);
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