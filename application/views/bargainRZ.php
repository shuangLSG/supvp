<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>实名认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <style>
            input::-webkit-input-placeholder {
                color: #bbb;
            }
            .font-gray{
                color:#999999;
            }
            .font-red{
                color:#FD4845;
            }
            .step-hd{
                font-size:0.66rem;
            }
            .mui-content{
                background-color: #FFF;
            }
            .main-content {
                padding: 0.2rem 0.8rem;
            }
            .input-group {
                position: relative;
                line-height: 1.1rem;
                margin-bottom: 0.38rem;
                border-bottom: 1px solid #eee;
            }
            .input-group input {
                width: 66%;
                height: 1rem;
                padding: 0 0.5rem;
                padding-left: 0;
                margin-bottom: 0;
                font-size: 0.414rem;
                letter-spacing: 1px;
                border: 0;
                border-radius: 0;
                background-color: transparent;
            }
            .step-hd{
                height: 2rem;
                line-height: 2rem;
            }
            .step2 .mui-text-center{
                padding: 0.3rem 0 0.7rem;
            }
            .step2 img{
                width:5.6rem;
                vertical-align: top;
            }

            .mui-btn-red{
                height:1.253rem;
                padding: 0;
                font-size:0.426rem;
                background-color: #FC5754;
                border-color: #FC5754;
                border-radius:999px;
            }
            .explain-box{
                padding-bottom: 1.1rem;
            }
            .explain-box p{
                line-height: 1.8;
            }
            .tips{
                line-height: 1.5;
                padding:0.3rem 0.48rem;
                color:#FE4D49;
                font-size:0.346rem;
                background-color:#FFF0ED;
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

            
            
            /* 提示弹框：分享、去浏览器 */
            .custom-flex-c{
                display: flex !important;
                align-items: center;
                justify-content: center;
            }
            .tip-popup{
                background-color: rgba(0,0,0,0.8);
                z-index: 999;
            }
            .tip-popup img{
                width: 10%;
                position: absolute;
                right: 0.5rem;
                top: 0.4rem;
            }
            .tip-popup>div{
                height: 2rem;
                padding: 0.2rem;
                background-color: #fff;
                margin: 23% 0.6rem;
                border-radius: 0.3rem;
                font-size: 0.46rem;
            }


        </style>
    </head>

    <body>
        <!-- <div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable mui-slide-in mui-active" >
			
            <div class="mui-inner-wrap mui-transitioning"> -->
                    
                <div id="offCanvasContentScroll" class="mui-scroll-wrapper mui-content bg-transparent">
                    <div class="mui-scroll">
                        <div class="tips">
                            尊敬的用户，为了避免恶意刷单影响活动公平性，注册成功后需进行实名认证，才可参加砍价活动，我们将对您的个人信息，承诺绝对保密，敬请谅解。
                        </div>
                        <div class="main-content">
                            
                            <div class="step-box step1">
                                <h1 class="step-hd">填写身份证信息</h1>
                                <div class="input-group">
                                    <input id="name"  type="text" placeholder="请输入身份证姓名">
                                </div>
                                <div class="input-group">
                                    <input id="identity" type="number" placeholder="请输入身份证号码">
                                </div>
                            </div>
                            <div class="step-box step2">
                                <h1 class="step-hd">人脸识别</h1>
                                <div class="mui-text-center">
                                    <img src="<?= base_url() ?>public/images/bargain/rz.png" alt="">
                                </div>

                                <div class="explain-box">
                                    <p>1.请确认由本人亲自操作；</p>
                                    <p>2.请将脸置于提示框内，并按提示完成动作；</p>
                                </div>  
                              
                                <!--登录按钮-->
                                <div class="btn-box custom-flex">
                                    <button type="button" id="submit" class="mui-btn mui-btn-red mui-btn-disabled mui-btn-block text-size-16">开始认证</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div>
        </div> -->

        <div class="mui-fullscreen to-browser tip-popup mui-hidden">
            <img src="<?= base_url() ?>public/images/bargain/share.png" alt="">
            <div class="custom-flex-c">
                 点击右上角，“在浏览器”中打开即可进行认证
            </div>
        </div>

        

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://gw.alipayobjects.com/as/g/h5-lib/alipayjsapi/3.1.1/alipayjsapi.inc.min.js"></script>
        
        <script>	 

            $(function () {

                mui.init();
                (function (mui, $) {
                    // 微信中提示去浏览器
                    if(isWeiXin()){
                        $('.tip-popup').removeClass('mui-hidden');
                    }
                    // 芝麻认证初始化 340521199312274421
                    document.querySelector('#submit').addEventListener('tap', function () {
                        zmInit();
                    });
                    
                    // 隐藏去浏览器遮罩
                    // document.querySelector('.tip-popup').addEventListener('tap', function () {
                    //     $('.tip-popup').addClass('mui-hidden');
                    // });
                    
                    /**
                    * 芝麻认证开始
                    */
                    function zmInit() {
                        var cardID = $('#identity').val();
                        var name = $('#name').val();
                    
                        // 禁止状态
                        if (name == "" && cardID == "") {
                            return;
                        }
                        $.post('../user/zhimaInit', {
                            "cert_name": name,
                            "cert_no": cardID,
                            "source":'web',
                            "bargain":1
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
                                var json={realname:name,idcard:cardID}
                                localStorage.setItem('bargain', JSON.stringify(json));
                            } else {
                                mui.toast(data.d);
                            }
                        }, 'json'); 
                      
                        
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