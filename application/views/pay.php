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
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>
            .mui-content{
                font-size:0;
                text-align: center;
            }
            img{
                width:6.42rem;
                height: 3.73rem;
                margin-top: 0.8rem;
                vertical-align: top;
            }
        </style>
    </head>

    <body >
        <header id="header" class="mui-bar mui-bar-nav custom-page-nav">
            <h1 class="mui-title">支付宝付款</h1>
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
        </header>
        <div class="mui-content custom-bg-color-white">
            <img src="<?= base_url() ?>public/images/Icon/alipay.png" style="width:150px;height: 60px;"/><br>
            <img src="<?= base_url() ?>public/qrcode/<?= $twocode ?>" id="fkm" style="width: 180px;height:180px"/><br>
        </div>
        <span style="color:red;font-size: 25px;font-weight: 700;display: block;text-align: center;margin-top: 20px;">￥<span><?= $money ?></span></span>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript"></script>

        <script>
            mui.init();

            ;
            (function (mui, $) {

                mui.ready(function () {


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
                });
            })(mui, jQuery);
        </script>
    </body>

</html>