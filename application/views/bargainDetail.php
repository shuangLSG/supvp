<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>0元砍价免费拿</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/bargain.css?t=0.02" />
        <style>
        .main-content{
            background:url(<?= base_url() ?>public/images/bargain/bg_1.png) no-repeat;
            background-size:100%;
        }
        </style>
         
    </head>

    <body>
      
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll bargin-detail">
                <!-- 顶部img 我的砍价商品btn-->
                <img id="link-home" class="suspend-btn" src="<?= base_url() ?>public/images/bargain/go_home.png" alt="">
                <div class="main-content">
                   
                    <div id="infotitle" class="custom-card-info">
                        <img id="head-icon" src="">
                        <div class="custom-card-info-box">                           
                            <h4 id="phone"></h4>
                            <p>我发现可以免费拿的好东西，快来帮我砍一下</p>
                        </div>                           
                    </div>
                    <div class="mui-card">
                        <div class="mui-card-header">
                            <div class="skill-timer custom-flex-c">
                                <span>任务倒计时：</span>    
                                <section id="countDownTime" class="countDownTime-box"><div class="time"><span>14</span>时<span>46</span>分</div></section>
                            </div>
                        </div>
                        <div class="mui-card-content">

                            <!-- 商品列表 -->
                            <div class="list-container">
                                <ul class="mui-table-view"></ul>
                            </div>


                            <div class="progress-box">
                                <p id="bargainprice" class="mui-text-center">已砍<span class="font-red">0</span>元,还差<span id="newprice" class="font-red">0</span>元</p>
                                <div class="progress">
                                    <span></span>
                                </div>
                            </div>

                            <div class="action-box"> </div>

                        </div>
                    </div>


                    <div class="mui-card billboard">
                        <div class="mui-card-header custom-flex-c">
                            <!-- 184****4563刚刚免费获得iPHONE XShhhhhhh  -->
                            <div id="textScroll" class="text-scroll-container">
                                <ul class="text-scroll mui-table-view">
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="mui-card-content">
                            <div class="mui-scroll-wrapper mui-content">
                                <div class="mui-scroll">
                                    <ul class="mui-table-view"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mui-fullscreen to-share tip-popup mui-hidden">
            <img src="<?= base_url() ?>public/images/bargain/share.png" alt="">
            <div class="custom-flex-c">
                <div>
                已砍<span class="font-red">0</span>元,不要放弃,邀请好友来砍价吧
                </div>
            </div>
        </div>


        <!-- 认证成功的弹框 -->
        <div id="authentication" class="mui-popup authentication-popup border-radius-0 mui-active">
           <div class="mui-popup-inner bg-white">
               <div class="mui-text-center top">
                   <img src="<?= base_url() ?>public/images/bargain/popup_icon.png" alt="">
                   <p class="font-red text-size-18"><strong>认证成功</strong></p>   
               </div>
               <div class="mui-popup-text">
                   <p class="text-size-13 mui-text-left">赠送1000元新人大礼包免费额度最高至20000元</p>
               </div>
           </div>
           <div class="mui-popup-buttons bg-white">
               <button id="bargain" class="mui-popup-button font-red">可以砍价啦，快去吧</button>
           </div>
       </div>

         <!-- 登录 -->
         <div id="login_popover" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card stage-box">
                <div class="mui-card-header">
                    <div class="login mui-text-center">
                        <img src="<?= base_url() ?>public/images/bargain/login_1.png" alt="">
                    </div>
                    <i class="mui-icon mui-icon-closeempty"></i>
                </div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <div class="content-wrapper">
                            <div class="input-box">
                                <div class="input-group">
                                    <input id="mobile" type="text" placeholder="请输入手机号码"/>
                                </div>
                                <div class="input-group input-group-button">
                                    <input id="code" type="text" class="text-size-17" placeholder="请输入验证码">
                                    <button id="send-code" class="font-pink text-size-17">获取验证码</button>
                                </div>
                    
                                <div id="login" class="button-box">
                                    <img width="100%" src="<?= base_url() ?>public/images/bargain/login_2.png"/>
                                </div>
                                <p class="tip font-pink"> *没有账号的用户登录自动注册</p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 砍价成功弹框 -->
        <script id="popup_tpl" type="text/html">
            <div id="successPopup" class="mui-popup success-popup mui-active">
                <div class="mui-popup-inner bg-white">
                        <div class="mui-text-center top">
                        <img class="flag" src="<?= base_url() ?>public/images/bargain/popup_3.png" alt="">
                        <div class="text">
                            <strong  class="text-size-15">好厉害</strong>
                            <p class="text-size-18 font-black"><strong>砍掉<span class="font-red">{{price}}</span>元</strong></p>
                        </div> 
                        <img width="100%" src="<?= base_url() ?>public/images/bargain/popup_4.png" alt="">
                        {{if self==1}}
                            <img class="popup-btn" src="<?= base_url() ?>public/images/bargain/popup_2.png" alt="">
                        {{else}}
                            <img class="popup-btn" src="<?= base_url() ?>public/images/bargain/to_home.png" alt="">
                        {{/if}}
                    </div>
                </div>
                <img class="popup-close" src="<?= base_url() ?>public/images/bargain/popup_1.png" alt="">
            </div>
        </script>


        <script id="bargainbtn_tpl" type="text/html">
           
            {{if d.self==1}}
                <img width="100%" src="<?= base_url() ?>public/images/bargain/btn_3.png" alt="">
            {{else}}
                <img width="100%"  class="action-btn" id="help_cut" src="<?= base_url() ?>public/images/bargain/btn_4.png" alt="1">
                <img width="100%" class="link-home" src="<?= base_url() ?>public/images/bargain/btn_5.png" alt="2">
            {{/if}}
            
        </script>

         <script id="list_tpl" type="text/html">
            <li data-commodityid="{{cell.commodityid}}" data-bargainactivityid="{{cell.bargainactivityid}}" data-bargainid="{{cell.bargainid}}" class="mui-table-view-cell">
                <div class="mui-slider-handle custom-flex">
                    <div class="custom-list-box custom-flex">

                        <img class="custom-list-pic failed {{cell.stock==0?'':'mui-hidden'}}" src="<?= base_url() ?>public/images/bargain/failed.png" width="100%" alt="">
                        <img class="custom-list-pic" src="{{cell.img+zip}}210" width="100%" alt="">
                        <div class="custom-brand-info">
                            <h3 class="text-size-13 custom-white-space-2"><strong>{{cell.name}}</strong> </h3>
                            <div class="position-bottom">
                                <div data-bargaining="{{cell.bargaining}}" class="bargain-box custom-flex-b">
                                    <div class="bargain-price">
                                        <span class="font-red text-size-13"><small>&yen;</small><span class="font-MarkPro  text-size-24">{{cell.oldprice}}</span></span>
                                    </div>
                                    <span class="font-yellow text-size-12">{{cell.sales}}人已0元拿</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </script>


        <script id="billboard_tpl" type="text/html">
            {{each d cell}}
            <li data-id="{{cell.id}}" data-commodityid="{{cell.commodityid}}" data-bargainactivityid="{{cell.bargainactivityid}}" id="goods_{{cell.id}}" class="mui-table-view-cell custom-flex-b">
                <div>
                    <img class="custom-list-pic" src="{{cell.userphoto}}" width="100%" alt="">
                    <span>{{cell.mobile}}</span>
                </div>
                <span class="font-red mui-pull-right">砍掉{{cell.bargainprice}}元</span>
            </li>
            {{/each}}
        </script>

        <script>
            function isNum2(val) {
                var number,val = val.toString(); 
                if (val.indexOf(".") != -1 && (val.substring(val.indexOf("."), val.length).length > 3)) {
                    var point = val.indexOf(".");
                    number = val.substring(0,point+3);
                } else {
                    number = val;
                }
                return number;
            }
        </script>
        <script>
            var json={
                appId: '<?= $signPackage["appId"] ?>', // 必填，公众号的唯一标识
                timestamp: "<?= $signPackage["timestamp"] ?>", // 必填，生成签名的时间戳
                nonceStr: '<?= $signPackage["nonceStr"] ?>', // 必填，生成签名的随机串
                signature: '<?= $signPackage["signature"] ?>', // 必填，签名，见附录1
            }
        </script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/JavaScript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
        <script src="<?= base_url() ?>public/js/page/bargainLogin.js" type="text/javascript"></script>      
        <script src="<?= base_url() ?>public/js/page/bargainDetail.js" type="text/javascript"></script>      
        <script defer src="<?= base_url() ?>public/js/page/bargainShare.js" type="text/javascript"></script>      
    </body>
</html>