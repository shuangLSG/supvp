<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>个人信息</title>
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

            p {
                width: 5rem;
                line-height: 1rem;
                text-align: center;
                font-size: 0.42rem;
                margin: 0 auto !important;
            }

            .page {
                padding-top: 2.8rem;
            }

            .wait-animate-wrapper {
                width: 3.26rem;
                height: 3.26rem;
                padding: 0.4rem;
                margin: 0 auto 0.53rem;
                background-color: #dedede;
                border-radius: 50%;
                justify-content: space-around;
            }

            .wait-animate-wrapper span {
                display: block;
                width: 0.44rem;
                height: 0.44rem;
                background: #fff;
                border-radius: 50%;
            }

            .custom-block-btn {
                margin-top: 0.8rem;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">
        <div class="page">
            <div class="wait-animate-wrapper custom-flex">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <p>您的实名认证正在审核中请耐心等待...</p>
            <a id="link-setting" class="custom-block-btn" href="javascript:;">返回</a>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>

            $(function () {

                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });

                (function (mui, $) {

                    document.getElementById('link-setting').addEventListener('tap', function () {
                        tools.route('setting');
                    });

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