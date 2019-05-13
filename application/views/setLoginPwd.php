<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>设置登录密码</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/login.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        
        <style>
          
            #login{
                background: url(<?= base_url() ?>public/images/login/confirm.png) no-repeat center;
                background-size: 100%;
                height: 1.6rem;
                margin-top: 0.94rem;
                margin-bottom:0.24rem;
            }
            
        </style>
    </head>

    <body>
        <div class="mui-content">
            <div class="logo-wrapper">
                <img class="logo set-hook mui-hidden" src="<?= base_url() ?>public/images/login/SUPVP_4.png" alt="">
                <img class="logo edit-hook mui-hidden" src="<?= base_url() ?>public/images/login/SUPVP_6.png" alt="">
            </div>

           
            <div class="input-group">
                <label class="text-size-14">设置密码</label>
                <input id="password" type="password" class="text-size-17" placeholder="请设置6-12位字符">
            </div>
            <div class="input-group">
                <label class="text-size-14">确认密码</label>
                <input id="password2" type="password" class="text-size-17" placeholder="请再次输入密码">
            </div>
            <div id="login" class="img-btn"> </div>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript"></script>

        <script>
            var flag = GetQueryString('flag');
            if(flag==0){
                $('.set-hook').removeClass('mui-hidden');
            }else{
                $('.edit-hook').removeClass('mui-hidden');
            }
            $(function () {

                mui.init();


                (function (mui, $) {

                        // 登录
                        document.getElementById('login').addEventListener('tap', toLogin, false);
                        function toLogin() {
                            var once = $('#password').val(),
                                password = $('#password2').val();

                            // 禁止状态
                            if (once == "" && password == "") {
                                mui.toast('请完善信息');
                                return;
                            }
                            if (once != password) {
                                mui.toast('密码不一致');
                                return;
                            }
                            
                            var mobile = app.storageFetch('nopwdlogin').mobile;
                            if(flag==0){
                                setPwd(mobile,password);
                            }else{
                                editPwd(mobile,password);
                            }
                        }
                        
                        function editPwd(mobile,password){
                            $.post('../login/dologin', {
                                "mobile": mobile,
                                "password": password
                            }, function (data) {
                                if (data.s == 200) {
                                    tools.route('../supvp/index');
                                    app.storageRemove('userinfo');
                                    app.storageSave('userinfo', data);
                                    app.storageSave('authInfo', {"mobile": mobile,"password": password});
                                } else {
                                    mui.toast(data.d, {type: 'div'});
                                }
                            }, 'json');
                        }
                        
                        function setPwd(mobile,password){
                            $.post('../login/AppSetPassword', {
                                "mobile": mobile,
                                "password": password
                            }, function (data) {
                                if (data.s == 200) {
                                    tools.route('../supvp/mine');
                                    app.storageRemove('userinfo');
                                    app.storageRemove('nopwdlogin');
                                    app.storageSave('userinfo', data);
                                    app.storageSave('authInfo', {"mobile": mobile,"password": password});
                                } else {
                                    mui.toast(data.d, {type: 'div'});
                                }
                            }, 'json');
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