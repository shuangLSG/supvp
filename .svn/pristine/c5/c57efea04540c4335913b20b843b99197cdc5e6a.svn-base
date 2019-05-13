<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/login.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        
        <style>
          
            #login{
                background: url(<?= base_url() ?>public/images/login/login.png) no-repeat center;
                background-size: 100%;
                height: 1.6rem;
                margin-top: 0.94rem;
                margin-bottom:0.24rem;
            }
            
        </style>
    </head>

    <body>
        <header id="header" class="mui-bar mui-bar-nav bg-transparent">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
            <button id="register-link" class="mui-btn mui-btn-link mui-pull-right text-size-15">快速注册</button>
        </header>
        <div class="mui-content">
            <div class="logo-wrapper">
                <img class="logo" src="<?= base_url() ?>public/images/login/SUPVP.png" alt="">
            </div>

           
            <div class="input-group">
                <label class="text-size-14">手机</label>
                <input id="account" type="text" class="text-size-17" placeholder="请输入手机号">
            </div>
            <div class="input-group">
                <label class="text-size-14">密码</label>
                <input id="password" type="password" class="text-size-17" placeholder="请输入密码">
            </div>
            <div id="login" class="img-btn"> </div>

            <div class="mui-text-right">
                <a id="forgetPSW" class="custom-orange text-size-14" href="javascript:;">忘记密码？</a>
            </div>
            <div class="code-login mui-text-center">
                <a id="codeLogin-link" class="custom-orange text-size-14" href="javascript:;">验证码登录</a>
            </div>
        
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript"></script>

        <script>

            $(function () {

                mui.init();


                (function (mui, $) {
                        // 在android中键盘弹出和收起会改变window的高度，因此监听window的resize。
                        var clientHeight = document.documentElement.clientHeight || document.body.clientHeight;
                        $(window).on('resize', function () {
                            var nowClientHeight = document.documentElement.clientHeight || document.body.clientHeight;
                            if (clientHeight > nowClientHeight) {
                                 //软键盘弹出的事件处理
                                $('.code-login').hide();
                            }
                            else {
                                //软键盘收起的事件处理
                                $('.code-login').show();
                            }
                        });
                    

                        // 登录
                        document.getElementById('login').addEventListener('tap', toLogin, false);
                        function toLogin() {
                            // 禁止状态
                            if ($('input[type="text"]').val() == "" && $('input[type="password"]').val() == "") {
                                return;
                            }
                            
                            var mobile = $('#account').val();
                            var password = $('#password').val();
                            $.post('../login/dologin', {
                                "mobile": mobile,
                                "password": password
                            }, function (data) {
                                if (data.s == 200) {
                                    window.history.go(-1);  
                                    location.replace(document.referrer);//刷新
                                    app.storageRemove('userinfo');
                                    app.storageRemove('nopwdlogin');
                                    app.storageSave('userinfo', data);
                                    app.storageSave('authInfo', {"mobile": mobile,"password": password});
                                } else {
                                    mui.toast(data.d, {type: 'div'});
                                }
                            }, 'json');
                        }
                        // 忘记密码
                        document.getElementById('forgetPSW').addEventListener('tap', function () {
                            tools.route('../supvp/resetPSW');
                        });

                        // 快速注册
                        document.getElementById('register-link').addEventListener('tap', function () {
                            tools.route('../supvp/register');
                        });

                        // 快速注册
                        document.getElementById('codeLogin-link').addEventListener('tap', function () {
                            tools.route('../supvp/codeLogin');
                        });

                        

                       
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