<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">

        <link rel="stylesheet" href="<?= base_url() ?>public/css/mui.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>public/css/login.css">
        <style>
            .logo-wrapper {
                margin-bottom: 0.5rem;
            }
            .input-group:nth-child(3){
                margin-bottom: 0.42rem;
            }
            #confirm{
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
                <img class="logo" src="<?= base_url() ?>public/images/login/SUPVP_5.png" alt="">
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
            <div class="input-group">
                <label class="text-size-14">新密码</label>
                <input id="new-pwd" type="password" class="text-size-17" placeholder="请输入新密码">
            </div>
            <div class="input-group">
                <label class="text-size-14">确认密码</label>
                <input id="password" type="password" class="text-size-17" placeholder="请再次输入密码">
            </div>
            <div id="confirm" class="img-btn custom-disable-btn"> </div>
        </div>
    </body>
    <script src="<?= base_url() ?>public/js/rem.js "></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js "></script>
    <script src="<?= base_url() ?>public/js/mui.min.js "></script>
    <script src="<?= base_url() ?>public/js/mui.view.js "></script>
    <script>

        $(function () {

            mui.init();
          
            (function (mui, $) {
             

                // ===================================================== 页面具体操作 =======================================================
                mui.ready(function () {
                    // -------------------------------- 主体页面 ------------------------------
                    // 按钮的禁用状态
                    $('#account, #password,#code,#new-pwd').on('input propertychange', function () {
                        var mobile = $('#account').val(),
                        password = $('#password').val(),
                        code = $('#code').val(),
                        newpwd = $('#new-pwd').val();
                        
                        if(mobile==''||password==''||code==''||newpwd==''){
                            $('#confirm').addClass('custom-disable-btn');
                        }else{
                            $('#confirm').removeClass('custom-disable-btn');
                        }
                    });

                    // 获取验证码
                    document.getElementById('send-code').addEventListener('tap', function () {
                        var mobile = $('#account').val();
                        if(mobile==''){
                            mui.toast('请输入手机号');
                            return;
                        };
                        $.post('../user/sendforget', {
                            "mobile": mobile,
                        }, function (data) {
                            if (data.s == 200) {
                                mui.toast('发送成功', {
                                    duration: 300,
                                    type: 'div'
                                });
                                setTimeout(function () {
                                    SetRemainTime($('#send-code'), 60);
                                }, 300);
                            } else {
                                mui.toast(data.d, {type: 'div' })
                            }
                        }, 'json');

                    });

                  

                    // 确定按钮
                    document.getElementById('confirm').addEventListener('tap', function () {
                        // 禁止状态 则禁止跳转
                        if (this.classList.contains('custom-disable-btn')){
                            mui.toast('请输入完整信息');
                            return;
                        }

                        var mobile = $('#account').val(),
                        password = $('#password').val(),
                        code = $('#code').val(),
                        newpwd = $('#new-pwd').val();
                        
                        if(newpwd!==password){
                            mui.toast('密码不一致');
                            return;
                        }

                        $.post('../user/doforget', {
                            "mobile": mobile,
                            "password": password,
                            "code": code
                        }, function (data) {
                            if (data.s == 200) {
                                mui.toast('成功', { type: 'div' });
                                tools.route('../supvp/login');
                            } else {
                                mui.toast(data.d, {type: 'div' });
                            }
                        }, 'json');
                    });

                    // ========================================================= 工具方法 ============================================
                    var tools = {
                        route: function (url) {
                            mui.openWindow({
                                url: url
                            });
                        }
                    }
                    // 倒计时
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
                });
            })(mui, jQuery);
        })
    </script>

</html>