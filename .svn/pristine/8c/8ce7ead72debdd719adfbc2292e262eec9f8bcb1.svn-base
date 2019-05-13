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
            <div class="mui-scroll page-section-60 rzFailed-container">
                <section class="limit-hd">
                    <h2 class="text-size-25 font-black">抱歉，本次您为了获取额度</h2>
                    <div class="mui-text-center">
                        <img src="<?= base_url() ?>public/images/limit/limit_bg_4.png" alt="">
                    </div>
                </section>

                <section class="limit-bd margin-h-10">
                    <div class="explain-box">
                        <h4 class="text-size-14 mui-text-center">-认证失败可能原因-</h4>
                        <p>1.您提供的信息错误或虚假，无法进行审核评估；</p>
                        <p>2.综合评估您当前不符合我们的提额要求，请保持良好的信用记录；</p>
                    </div>    
                    <div class="mui-button-row">
                        <button id="submit" class="mui-btn mui-btn-block mui-btn-blue text-size-16 custom-radius">重新认证</button>
                    </div>
                </section>
            </div>
        </div>  


        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>

            $(function () {

                mui.init();
                (function (mui, $) {


                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });



                    

                    // ========================================== 工具方法 =======================================
                    var tools = {
                        route: function (url) {
                            mui.openWindow({
                                url: url
                            });
                        },
                        GetQueryString: function(param, url) {
                            var currentUrl = url || window.location.href; //获取当前链接
                            var arr = currentUrl.split("?"); //分割域名和参数界限
                            if (arr.length > 1) {
                                arr = arr[1].split("&"); //分割参数
                                for (var i = 0; i < arr.length; i++) {
                                    var tem = arr[i].split("="); //分割参数名和参数内容
                                    if (tem[0] == param) {
                                        return tem[1];
                                    }
                                }
                                return null;
                            } else {
                                return null;
                            }
                        }
                    }

                    // 重新认证
                    document.querySelector('#submit').addEventListener('tap', function () {
                        var page = tools.GetQueryString('page');
                        tools.route(page);
                    });
                })(mui, jQuery);
            })
        </script>
    </body>

</html>