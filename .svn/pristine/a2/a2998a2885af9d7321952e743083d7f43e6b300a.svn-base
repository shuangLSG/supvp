
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
                <img class="logo" src="<?= base_url() ?>public/images/login/SUPVP_3.png" alt="">
            </div>

           
            <div class="input-group">
                <label class="text-size-14">手机</label>
                <input id="account" type="text" class="text-size-17" placeholder="请输入手机号">
            </div>
            <div class="input-group input-group-button">
                <label class="text-size-14">验证码</label>
                <input id="code" type="text" class="text-size-17" placeholder="请输入验证码">
                <button id="send-code" class="custom-orange text-size-17">获取验证码</button>
            </div>
            <div id="login" class="img-btn"> </div>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript"></script>

        <script>

            $(function () {

                mui.init();


                (function (mui, $) {
                       // 登录按钮的禁用状态
                        $('input[type="text"],input[type="password"]').on('input propertychange', function () {

                            if ($('input[type="text"]').val() !== "" && $('input[type="password"]').val() !==
                                    "") {
                                $('#register').removeClass('disable-btn');
                            } else {
                                $('#register').addClass('disable-btn');
                            }
                        });


                        // 获取验证码
                        document.getElementById('send-code').addEventListener('tap', function () {
                            var mobile = $('#account').val();
                            var self = this;
                            if (mobile == ""){ 
                                mui.toast('请输入手机号', {type: 'div'});
                                return;
                            }
                            
                            $.post('../login/loginSend', {
                                "mobile": mobile
                            }, function (data) {
                                if (data.s == 200) {
                                    mui.toast('发送成功', {type: 'div'});
                                    SetRemainTime(self, 60);
                                } else {
                                    mui.toast(data.d, {type: 'div'});
                                }
                            }, 'json');
                        });

                        // 短信登录
                        document.getElementById('login').addEventListener('tap', function () {
                            var mobile = $('#account').val();
                            var code = $('#code').val();

                            $.post('../login/codeLogin', {
                                "mobile": mobile,
                                "code": code
                            }, function (data) {
                                if (data.s == 200) {
                                    mui.toast('登录成功');
                                    var pwd = data.d.password==''?0:1; // 0:未设置密码
                                    app.storageSave('nopwdlogin',{mobile:mobile});
                                    setTimeout(function(){
                                        tools.route('../supvp/index?pwd='+pwd);
                                    },1000);
                                } else {
                                    mui.toast(data.d, {type: 'div'})
                                }
                            }, 'json');

                        });
                          
                        // 账户登录
                        document.getElementById('register-link').addEventListener('tap', function () {
                            tools.route('../supvp/register');
                        });

                        //倒计时
                        var InterValObj;

                        function SetRemainTime(el, second, fn) {
                            // 防止多次点击，生成多个定时器
                            if (InterValObj) {
                                clearInterval(InterValObj);
                            }
                            InterValObj = setInterval(function () {
                                if (second > 0) {
                                    second = second - 1;

                                    $(el).text(second + "s").attr('disabled', true);
                                } else {
                                    clearInterval(InterValObj);
                                    $(el).text('获取验证码').removeAttr('disabled');

                                    if (fn) {
                                        fn();
                                    }
                                }
                            }, 1000)
                        }

                        var tools = {
                            route: function (url) {
                                mui.openWindow({
                                    url: url
                                });
                            },
                            showDeleteIcon: function (el, obj) {
                                if ($(el).val() !== "") {
                                    $(obj).show();
                                } else {
                                    $(obj).hide();
                                }
                            }
                        }
                   
                })(mui, jQuery);
            })

        </script>
    </body>
</html>