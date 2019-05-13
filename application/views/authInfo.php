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
            html,
            body {
                height: 100%;
            }

            .custom-list-wrapper li {
                padding: 0.44rem 0.48rem !important;
            }

            .custom-list-wrapper li span {
                font-size: 0.34rem;
                color: #9f9f9f;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">
        <div class="custom-list-wrapper">
            <ul class="mui-table-view">
                <li class="mui-table-view-cell">
                    国籍
                    <span class="mui-pull-right">中国大陆</span>
                </li>
                <li class="mui-table-view-cell">
                    姓名
                    <span class="mui-pull-right" id="realname">某某</span>
                </li>
                <li class="mui-table-view-cell">
                    性别
                    <span class="mui-pull-right" id="sex">女</span>
                </li>
                <li class="mui-table-view-cell">
                    证件类型
                    <span class="mui-pull-right">身份证</span>
                </li>
                <li class="mui-table-view-cell">
                    证件号码
                    <span class="mui-pull-right" id="idcard">340521111111111111</span>
                </li>
            </ul>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
            $(function () {

                document.title="基本信息";
                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });

                (function (mui, $) {
                    function getuserinfo() {
                        app = app.storageFetch('userinfo');
                        name = app.d[0].realname;
                        idcard = app.d[0].realid;
                        newidcard = idcard.substr(0, 4) + '*********' + idcard.substr(-4);
                        sex = app.d[0].sex == 1 ? '男' : '女'
                        $('#realname').text(name)
                        $('#idcard').text(newidcard)
                        $('#sex').text(sex)
                    }

                    getuserinfo();

                    var tools = {

                    }
                })(mui, jQuery);
            })
        </script>
    </body>

</html>