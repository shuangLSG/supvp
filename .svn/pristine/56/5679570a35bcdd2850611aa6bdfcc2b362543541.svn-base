<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>职业认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />

    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll page-section-60 auditing-container">
                <section class="limit-hd">
                    <h2 class="text-size-25 font-black">信息已提交，正在认证中</h2>
                    <div class="mui-text-center">
                        <img src="<?= base_url() ?>public/images/limit/limit_bg_2.png" alt="">
                    </div>
                </section>

              

                <section class="limit-bd margin-h-10">
                    <div class="explain-box">
                        <p>1.您的信息提交成功后，一般在1-3个工作日类完成认证，请耐心等待；</p>
                        <p>2.认证成功后，即可免费使用额度分期购物；</p>
                        <p>3.完成其他认证，可以提高您的额度。</p>
                    </div>    
                    <div class="mui-button-row">
                        <button id="submit" class="mui-btn mui-btn-block mui-btn-blue text-size-16 custom-radius">返回</button>
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

                
    
                  
 
                    

                    // ==========================================  =======================================
                 
                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                    document.querySelector('#submit').addEventListener('tap', function () {
                        window.history.go(-1)    
                    });

                    // ========================================== 工具方法 =======================================

                   
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