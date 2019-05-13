<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" src="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" src="<?= base_url() ?>public/css/app.css" />
        <style>
            html,
            body,
            .wrapper {
                height: 100%;
            }

            .wrapper {
                position: relative;
                background: url(<?= base_url() ?>public/images/home/fx.png) no-repeat center center;
                background-size: cover;
            }

            .wrapper img {
                position: absolute;
                width: 3.62rem;
                height: 1rem;
            }

            .wrapper img:first-child {
                top: 44%;
                left: 7%;
            }
            .wrapper img:last-child {
                top: 44%;
                right: 7%;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            <img src="<?= base_url() ?>public/images/home/ios.png" alt="">
            <img src="<?= base_url() ?>public/images/home/android.png" alt="">
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>

            $(function () {

                mui.init();

                ;
                (function (mui, $) {

                    mui.ready(function () {
                        // 按钮的禁用状态
                        $('input[type="text"],input[type="password"]').on('input propertychange', function () {

                            if ($('input[type="text"]').val() !== "" && $('input[type="password"]').val() !==
                                    "") {
                                $('#next-step').removeClass('custom-disable-btn');
                            } else {
                                $('#next-step').addClass('custom-disable-btn');
                            }
                        });

                        // 下一步
                        // document.getElementById('next-step').addEventListener('tap', function () {
                        //     // 禁止状态 则禁止跳转
                        //     if (this.classList.contains('custom-disable-btn')) return;
                        //     tools.route('resetPSW2');
                        // });

                        var tools = {
                            route: function (url) {
                                mui.openWindow({
                                    url: url
                                });
                            }
                        }
                    });
                })(mui, jQuery);
            })
        </script>
    </body>

</html>