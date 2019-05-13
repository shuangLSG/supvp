<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>人脸识别</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />
        <style>
            .limit-hd img{
                width:5.6rem;
            }
            .limit-hd .mui-text-center{
                margin: 0.5rem 0 1rem;
            }
            .limit-bd .explain-box p{
                line-height: 1.8;
            }
            .mui-button-row {
                margin-top: 3rem;
            }
            .link-zm{
                background-color: #fff;
                z-index: 100;
            }
            .link-zm >div{
                padding: 1rem 0.4rem 0;
                font-size:0.3rem;
            }
            .link-zm >div p{
                word-wrap: break-word;
            }
            .link-zm >div p:first-child{
                font-size: 0.5rem;
                color: #222;
                margin-bottom: 0.2rem;
            }
            p {
                -webkit-user-select:text !important;
                -moz-user-select:text !important;
                -ms-user-select:text !important;
                user-select:text !important;
            }
        </style>
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll page-section-60">
                <section class="limit-hd">
                    <h2 class="text-size-25 font-black">人脸识别</h2>
                    <div class="mui-text-center">
                        <img src="<?= base_url() ?>public/images/limit/rz.png" alt="">
                    </div>
                </section>



                <section class="limit-bd margin-h-10">
                    <div class="explain-box">
                        <p>1.请确认由本人亲自操作；</p>
                        <p>2.请将脸置于提示框内，并按提示完成动作；</p>
                    </div>  
                    <div class="mui-button-row">
                        <button id="submit" class="mui-btn mui-btn-block mui-btn-blue text-size-16 custom-radius">开始识别</button>
                    </div>
                </section>
            </div>
        </div> 
        
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="https://gw.alipayobjects.com/as/g/h5-lib/alipayjsapi/3.1.1/alipayjsapi.inc.min.js"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>

            $(function () {

                mui.init();
                (function (mui, $) {

                    // 芝麻认证初始化 340521199312274421
                    document.querySelector('#submit').addEventListener('tap', function () {
                        zmInit();
                    });
             
                    
                    /**
                    * 芝麻认证开始
                    */
                    function zmInit() {
                        var ID = app.storageFetch('ID');
                        var name = ID.realName;
                        var cardID = ID.idcard;
                   
                        // 禁止状态
                        if (name == "" && cardID == "") {
                            return;
                        }
                        $.post('../user/zhimaInit', {
                            "cert_name": name,
                            "cert_no": cardID,
                            "source":'web'
                        }, function (data) {
                            if (data.s == 200) {
                                var url = data.d.replace(/&amp;/g,"&").toString();
                                if(isWeiXin()){
                                    $('body').append(`<div class="mui-fullscreen link-zm mui-text-center"><div><p>请复制链接到浏览器中打开</p><p>${url}</p></div></div> `)
                                }else{
                                    mui.openWindow({ 
                                        url: url
                                    });
                                }
                            } else {
                                mui.toast(data.d);
                            }
                        }, 'json'); 
                    }
                    
                    
                    /**
                    * @param {url} 地址
                    * @param {param} 参数名称key
                    * @return  value  对应参数的vaule
                    */
                    function GetQueryString(url,param) { 
                        var currentUrl = url||window.location.href; //获取当前链接
                        var arr = currentUrl.split("?");//分割域名和参数界限
                        if (arr.length > 1) {
                            arr = arr[1].split("&");//分割参数
                            for (var i = 0; i < arr.length; i++) {
                                var tem = arr[i].split("="); //分割参数名和参数内容
                                if (tem[0] == param) {
                                    return tem[1];
                                }
                            }
                            return null;
                        }
                        else {
                            return null;
                        }
                    }
                    
                    function isWeiXin(){
                        var ua = window.navigator.userAgent.toLowerCase();
                        if(ua.match(/MicroMessenger/i) == 'micromessenger'){
                            return true;
                        }else{
                            return false;
                        }
                    }
                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                })(mui, jQuery);
            })
        </script>
    </body>

</html>