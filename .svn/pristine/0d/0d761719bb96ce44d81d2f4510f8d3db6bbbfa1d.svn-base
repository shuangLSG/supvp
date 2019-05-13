<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>支付成功</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css">
        <style>
            .pay-content{
                padding: 0.4rem 0.533rem 0.6rem;
            }
            .pay-content img{
                width:3.68rem;
                height:3.8rem;
            }
            .pay-content h3{
                padding: 0.2rem;
                line-height: 2;
                margin: 0.2rem 0 0.36rem;
            }
            .pay-content .mui-btn{
                width:3.866rem;
                height:1.173rem
            }
        </style>
    </head>

    <body>
     
        <div class="mui-scroll-wrapper mui-content custom-bg-color-gray">
            <div class="mui-scroll">
                <section class="pay-content mui-center  custom-bg-color-white">
                    <img src="<?= base_url() ?>/public/images/pay_1.png" alt="">
                    <h3 class="custom-orange text-size-18">恭喜您，支付成功</h3>
                    <div class="custom-flex-hbetween">
                        <button class="mui-btn mui-btn-warning mui-btn-outlined custom-radius text-size-15">查看订单</button>
                        <button class="mui-btn custom-light-wraning-fill custom-radius text-size-15">返回首页</button>
                    </div>
                </section>

                <!--为你推荐-->
                <div class="module custom-margin-top-20 custom-bg-color-white">
                    <div class="module-hd custom-flex-c">
                        <strong class="text-size-17"> 为你推荐 </strong>
                    </div>
                    <div id="recommendlist">

                    </div>
                </div>
            </div>
        </div>

         <!-- 为你推荐 -->
         <script id="recommend_tpl" type="text/html">
            <ul class="mui-table-view mui-grid-view recommend-box mode-2">
                {{each  d cell}}
                    <li id="goods_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-6 custom-cell">
                        <img class="mui-media-object" src="{{cell.img_750_1050+zip}}338,h_352">
                        <div class="custom-cell-content">
                            <p class="describe">{{cell.name}}</p> 
                            <div class="badges-box">
                                {{if cell.news==1}}
                                    <img class="badge-icon" src="<?= base_url() ?>public/images/icons/news.png" alt="">
                                {{/if}}
                                {{if cell.freeinterest==1}}
                                    <img class="badge-icon" src="<?= base_url() ?>public/images/icons/mx.png" alt="">
                                {{/if}}
                            </div>
                            <div class="pos-bottom">
                                <p class="custom-gray"><small class="scale">&yen;</small>{{cell.activity_price}} <small class="text-decoration">&yen;{{cell.price}}</small></p>                                                       
                                <p class="custom-pink">月供<small>&yen;</small><span class="monthly-price text-size-38">{{cell.amortize}}</span>起
                                    <small class="custom-light-gray">{{cell.sales}}付款</small>
                                </p>
                            </div>
                        </div>
                    </li>
                {{/each}}
            </ul>
        </script>
        
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>

            $(function () {
                mui.init();

                (function (mui, $) {
               
                    promise('../api/getRecommend').then((data) => {
                        data.zip = zip;
                        $('#recommendlist').html(template('recommend_tpl', data));
                    });
                  

                    mui('#recommendlist').on('tap', 'li', function () {
                        var id = this.id.split('_')[1];
                        tools.route('goodsDetail?id=' + id)
                    })



                    // srcoll
                    mui('.mui-scroll-wrapper').scroll({
                        indicators: false, //是否显示滚动条
                        bounce: false //是否启用回弹
                    });

                    // ================================================ 页面跳转 ==========================================
                    mui('.pay-content').on('tap', 'button', function (e) {
                        var iIndex = $(this).index();
                        if (iIndex == 0) {
                            var orderno = GetQueryString('orderno');
                            tools.route('orderDetail?orderno='+orderno);
                        } else {
                            tools.route('index');
                        }
                    });


                    // ================================================ 工具方法 ==========================================
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