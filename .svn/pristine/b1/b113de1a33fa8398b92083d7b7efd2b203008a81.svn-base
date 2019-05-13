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
            body,
            html {
                height: 100%;
            }

            a:active {
                color: #fff;
            }

            p {
                color: #c0c0c0;
                font-size: 0.34rem;
                padding: 0.1rem 0.48rem !important;
            }

            .tooltips-info-icon {
                width: 0.32rem;
                height: 0.32rem;
                margin-right: 0.1rem;
            }

            .next-step {
                margin: 1.38rem auto 0.1rem;
            }

            ul li {
                position: relative;
            }

            /* input::-webkit-input-placeholder {
                color: #c0c0c0;
            } */

            input[type=text] {
                height: 1.28rem;
                margin-bottom: 0;
                font-size: 0.4rem;
                border: none;
            }
            .custom-flex{
                justify-content: flex-start;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">
        <p class="custom-flex">
            <img class="tooltips-info-icon" src="<?= base_url() ?>public/images/icon/info.png" alt=""> 请填写您的真是信息，通过后将不能修改</p>
        <div calss="custom-bg-color-white">
            <ul id="set-info">
                <li class="custom-line">
                    <input type="text" placeholder="真实姓名" name="userName"> </li>
                <li>
                    <input type="text" placeholder="身份证号" name="userNum">
                </li>
            </ul>
        </div>

        <a id="link-upload" class="next-step custom-block-btn custom-disable-btn" href="javascript:;">下一步</a>
        <p>以上信息用于身份验证</p>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>

            $(function () {

                document.title = "实名认证";
                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });

                (function (mui, $) {

                    // 按钮的禁用状态
                    $('input[name=userName],input[name=userNum]').on('input propertychange', function () {

                        if ($('input[name=userName]').val() !== "" && $('input[name=userNum]').val() !== "") {
                            $('.next-step').removeClass('custom-disable-btn');
                        } else {
                            $('.next-step').addClass('custom-disable-btn');
                        }
                    });

                    document.getElementById('link-upload').addEventListener('tap', function () {
                        var userName = $('input[name=userName]').val();
                        var userNum = $('input[name=userNum]').val();
                        if (userName == '') {
                            mui.toast('真实姓名不能为空', { type: 'div'})
                            return false;
                        }
                        var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
                        if (reg.test(userNum) === false)
                        {
                            mui.toast('身份证不合法', {
                                type: 'div',
                                icon: '<?= base_url() ?>public/images/Icon/warning.png'
                            })
                            return  false;
                        }
                        if (userName !== "" && userNum !== "") {
                            app.storageSave('userbind', {'user': userName, 'userid': userNum})
                            tools.route('uploadPhoto');
                        }
                    })

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