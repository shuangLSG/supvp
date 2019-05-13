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
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/coupon.css" />
        <style>
            .coupon-item.coupon-not-allowed .coupon-info{
                background: url(<?= base_url() ?>public//images/home/coupon_bg1.png) no-repeat;
                background-size: cover;
            }
            .coupon-item.coupon-not-allowed .coupon-line-bg{
                background: url(<?= base_url() ?>public//images/home/coupon1.png) no-repeat;
                background-size: cover;
            }
            .coupon-other-info.coupon-line-bg{
                background: url(<?= base_url() ?>public//images/home/coupon2.png) no-repeat;
                background-size: cover;
            }
            .coupon-info {
                background: url(<?= base_url() ?>public//images/home/coupon_bg2.png) no-repeat;
                background-size: cover;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">
        <!--        <header id="header" class="mui-bar mui-bar-nav custom-page-nav">
                    <h1 class="mui-title">优惠券</h1>
                    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
                </header>-->
        <div class="mui-scroll-wrapper mui-content custom-bg-color-gray">
            <div class="mui-scroll">
                <ul class="coupon-wrapper">
                    <!--                    <li class="coupon-item">
                                            <div class="coupon-info">
                                                <h1>
                                                    <span>￥</span>30</h1>
                                                <span>满299元可用</span>
                                            </div>
                                            <div class="coupon-other-info coupon-line-bg">
                                                <h3>满299减30元优惠券</h3>
                                                <p>2018.03.26-2018.03.30</p>
                                                <img src="<?= base_url() ?>public/images/home/coupon_btn2.png" alt="">
                                            </div>
                                        </li>-->
                    <!--                    <li class="coupon-item coupon-not-allowed">
                                            <div class="coupon-info">
                                                <h1>
                                                    <span>￥</span>30</h1>
                                                <span>满299元可用</span>
                                            </div>
                                            <div class="coupon-other-info coupon-line-bg">
                                                <h3>满299减30元优惠券</h3>
                                                <p>2018.03.26-2018.03.30</p>
                                                <img src="<?= base_url() ?>public/images/home/coupon_btn1.png" alt="">
                                            </div>
                                        </li>-->
                </ul>
            </div>
        </div>


        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
            $(function () {
                document.title="使用优惠券";

                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });

                (function (mui, $) {
                    $.post('../api/getCoupon', {}, function (data) {
                        console.log(data);
                        if (data.s == 200) {
                            var html = creatDom(data.Conpondata);
                            $('.mui-scroll ul').html(html);
                        }
                    }, 'json');


                    // srcoll
                    mui('.mui-scroll-wrapper').scroll({
                        indicators: false //是否显示滚动条
                    });



                    // 页面跳转到 金卡购买页面
                    mui('.coupon-wrapper').on('tap', 'li', function (e) {
                        id = $(this).attr('vid')
                        price = app.storageFetch('allprice')
                        condition = $(this).attr('condition')
                        all = $(this).attr('price')
                        if (parseInt(condition) > parseInt(price.price)) {
                            mui.toast('额度不够', {type: 'div' })
                        } else {
                            app.storageSave('conpon', {'id': id, 'price': all});
                            tools.route('fillorder');
                        }

                    });

                    // ===================================================== 工具方法 ================================================
                    function creatDom(data) {
                        var html = "";
                        $.each(data, function (i, item) {
                            html += tmpHtml(item);
                        });
                        return html;
                    }
                    // 模版
                    function tmpHtml(item) {
                        var startTime = getLocalTime(item.starttime);
                        var endTime = getLocalTime(item.endtime);
                        var html =
                                `<li id="coupon_${item.id}" class="coupon-item" vid="${item.couponno}" condition="${item.condition}" price="${item.price}">
                                <div class="coupon-info">
                                    <h1>
                                        <span>￥</span>${item.price}</h1>
                                    <span>无门槛优惠券</span>
                                </div>
                                <div class="coupon-other-info coupon-line-bg">
                                    <h3>无门槛优惠券(任何品类可用)</h3>
                                    <p>${startTime}-${endTime}</p>
                                    <img src="<?= base_url() ?>public/images/home/coupon_btn2.png" alt="">
                                </div>
                            </li>`;
                        return html;
                    }
                    function getLocalTime(nS) {
                        return new Date(parseInt(nS) * 1000).toLocaleString().substr(0, 9).replace(/\//g, ".");
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