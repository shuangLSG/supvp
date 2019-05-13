<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>实名认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>
            html,
            body {
                height: 100%;
            }

            .auth-info-wrapper {
                padding-top: 0.8rem;
                margin-bottom: 0.4rem;
            }

            .auth-info-card {
                position: relative;
                width: 8.6rem;
                height: 5.2rem;
                margin: 0 auto;
                padding-top: 1.6rem;
                text-align: center;
                border-radius: 6px;
                background: url(<?= base_url() ?>public/images/use/auth_bg.png) no-repeat center center;
                background-size: cover;
            }

            .auth-info-card h3 {
                font-size: 0.38rem !important;
                line-height: 1rem;
            }

            .auth-info-card p {
                color: #242424;
                line-height: 1rem;
            }

            .auth-info-card img {
                position: absolute;
                top: -0.6rem;
                left: 50%;
                margin-left: -0.8rem;
                width: 1.7rem;
                height: 1.97rem;
            }

            .custom-list-wrapper li {
                padding: 0.36rem 0.42rem !important;
            }

            .service {
                position: absolute;
                bottom: 0.8rem;
                padding: 0 0.72rem;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">

        <div class="auth-info-wrapper">
            <div class="auth-info-card">
                <img src="<?= base_url() ?>public/images/use/auth.png" alt="">
                <h3>您已实名认证</h3>
                <span id="realname"></span>
                <p id="idcard"></p>
            </div>
        </div>
        <div class="custom-list-wrapper">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell" data-index="0">
                    <a class="mui-navigate-right">基本信息
                    </a>
                </li>
                <li class="mui-table-view-cell" data-index="1">
                    <a class="mui-navigate-right">证件照片
                        <span class="mui-pull-right">已完善</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="service">
            <img src="<?= base_url() ?>public/images/use/auth_tab_icon.png" width="100%" alt="">
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>

            $(function () {
                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });



                (function (mui, $) {
                    mui('.custom-list-wrapper').on('tap', 'li', function (e) {
                        var iIndex = this.dataset.index;
                        if (iIndex == 0) {
                            tools.route('authInfo');
                        }

                        if (iIndex == 1) {
                            tools.route('idphoto');
                        }
                    });


                    function getuserinfo() {
                        app = app.storageFetch('userinfo');
                        name = app.d[0].realname;
                        idcard = app.d[0].realid;
                        newidcard = idcard.substr(0, 4) + '*********' + idcard.substr(-4);
                        $('#idcard').text(newidcard)
                        $('#realname').text(name)
                    }

                    getuserinfo();

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