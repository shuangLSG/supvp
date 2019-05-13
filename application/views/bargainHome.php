<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>0元砍价免费拿</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/bargain.css?t=0.02" />
        <style>
            
            .date{
                position: absolute;
                top: 31%;
                left: 50%;
                transform: translateX(-50%);
                width:5.173rem;
                height:0.893rem;
                font-size: 0.4rem;
                color: #FFEBD1;
                background:url(<?= base_url() ?>public/images/bargain/date.png) no-repeat;
                background-size:100% 100%;
            }
        </style>
    </head>
    <body>
           <!-- 顶部img 我的砍价商品btn-->
           <img class="suspend-btn" src="<?= base_url() ?>public/images/bargain/home_btn_1.png" alt="">
           <!-- <div class="bg-white">        -->
        <!-- <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll"> -->
                <div id="textScroll" class="text-scroll-container">
                    <ul class="text-scroll mui-table-view">
                    
                    </ul>
                </div>

                <div class="container  main-content">
                    <!-- 顶部img -->
                    <div class="top-box">
                        <img width="100%" src="http://image.bfy100.com/1557489950.png" alt="">
                        <div class="date custom-flex-c">
                            <img src="" alt="">
                            <span>2019.5.9-2019-5-17</span>
                        </div>
                    </div>

                    <!-- 商品列表 -->
                    <div class="main-box">
                        <header>
                            <img width="100%" src="<?= base_url() ?>public/images/bargain/main_1.png" alt="">
                        </header>
                        <div class="list-container">
                            <ul class="mui-table-view"></ul>
                        </div>
                        <footer>
                            <img width="100%" src="<?= base_url() ?>public/images/bargain/main_3.png" alt="">
                        </footer>
                    </div>

                    <div class="tip-container">
                        <div class="tip-hb mui-text-center">
                            <h4 class="text-size-15"><strong>砍价活动规则</strong> </h4>
                        </div>
                        <ol class="tip-bd">
                            <li>活动新老用户都可参加!</li>
                            <li>注册成功后需进行实名认证，才可参加砍价活动。（注：实名认证环节，为防止恶意刷单行为，对个人信息，承诺绝对保密，敬请谅解谢谢！）</li>
                            <li>砍价时间48小时，规定时间内未完成不发货；</li>
                            <li>必须在砍价失效之前提供收货地址，未收到收货地址则判定砍价失败；</li>
                            <li>可对多个商品发起砍价，但同一个砍价商品，发起者只能砍一次；可分享/邀请诸多好友助力砍价；</li>
                            <li>新用户注册成功额外可享受1000元优惠券大礼包（仅限app端进行使用）。</li>
                            <p class="mui-text-center">
                                *本次活动最终解释权归SUPVP所有
                            </p>
                        </ol>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->

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


        <script id="list_tpl" type="text/html">
            {{each d cell}}
                <li data-id="{{cell.id}}" data-commodityid="{{cell.commodityid}}" data-bargainactivityid="{{cell.bargainactivityid}}" data-bargainid="{{cell.bargainid}}" id="goods_{{cell.id}}" class="mui-table-view-cell">
                    <div class="mui-slider-handle custom-flex">
                        <div class="custom-list-box custom-flex">
                            <img class="custom-list-pic" src="{{cell.img+zip}}210" width="100%" alt="">
                            <div class="custom-brand-info">
                                <h3 class="text-size-13 custom-white-space-2"><strong>{{cell.name}}</strong> </h3>
                                <div class="progress-box custom-flex-b">
                                    <div class="progress">
                                        <span style="width:{{cell.percent}}"></span>
                                    </div>
                                    <span>剩余{{cell.stock}}件</span>
                                </div>
                                <div data-bargaining="{{cell.bargaining}}" class="bargain-box custom-flex">
                                    <div class="bargain-price">
                                        <span class="font-red text-size-13"><small>&yen;</small><span class="font-MarkPro  text-size-32">0</span></span>
                                        <span class="price"><small class="text-size-9">&yen;</small><span>{{cell.price}}</span></span>
                                    </div>
                                    {{if cell.bargaining==1}}
                                        <img class="action_btn" src="<?= base_url() ?>public/images/bargain/btn_2.png" alt="">  
                                    {{else}}
                                        <img class="action_btn" src="<?= base_url() ?>public/images/bargain/btn_1.png" alt="">  
                                    {{/if}}  
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            {{/each}}
        </script>

         <!-- 文字滚动 -->            
         <script  id="winner_tpl" type="text/html">
            <div class="mui-slider-group mui-slider-loop">
                <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
                <div class="mui-slider-item mui-slider-item-duplicate">
                    <a href="#" class="mui-center">
                        <img src="{{d[d.length-1]+zip}}750">
                    </a>
                </div>
                <!-- 第一张 -->
                {{each d i index}}
                    <div class="mui-slider-item">
                        <a href="#" class="mui-center">
                            <img src="{{i+zip}}750">
                        </a>
                    </div>
                {{/each}}
                <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
                <div class="mui-slider-item mui-slider-item-duplicate">
                    <a href="#" class="mui-center">
                        <img src="{{d[0]+zip}}750">
                    </a>
                </div>
            </div>
        </script>    

        <script id="coupon_tpl" type="text/html">
            {{each d item}}
                <li>
                    <img src="<?= base_url() ?>public/images/pmj/huodong3/{{item.src}}" alt="">
                </li>
            {{/each}}
        </script>

    </body>
  
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url() ?>public/js/page/bargainLogin.js" type="text/javascript" charset="utf-8"></script>

    <script>
        function autoScroll(obj){  
            var height = $(obj).find("ul").find("li:first").height(); 
            $(obj).find("ul").animate({  
    
                marginTop : -height
    
            },500,function(){  
    
                $(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
    
            })  
    
        }  
        setInterval('autoScroll("#textScroll")',2000);

       
       
       
       
        ;(function () {
            
            // 商品列表展示
            $.post('../BargainH5/queryBargain', {
                    'bargainactivityid':1
                }, function (res) {
                    if (res.s == 200) {
                        var data = res.d,
                            flag = false;
                        $.each(data.list,function(i,item){
                            // percent = (item.bargainpice/item.price*100).toFixed(2)+'%'
                            // item.percent = percent;
                            var total = Number(item.stock)+Number(item.sales),
                                percent = (item.sales/total*100).toFixed(2)+'%';
                            item.percent = percent;

                            if(item.bargaining==1){
                                flag = true;
                            }
                        });
                        $('.list-container ul').html(template('list_tpl',{d:data.list,zip:zip}))
                        $('.suspend-btn').attr('data-flag',flag);// 砍价商品不为0时，即可跳转查询发起列表

                        var json={
                            'bargainactivityid':data.list[0].bargainactivityid
                        }
                        winners(json);

                    }
            }, 'json');
            
            // 用户是否登录
            var ss = GetQueryString('ss',window.location.href);
            $.post('../user/getuserinfo', {'bargain':1,'ss':ss == null?'':ss}, function (res) {
                if (res.s == 9999) {
                    $('.suspend-btn').attr('data-state',1);
                }
            }, 'json');

            // mui('.mui-scroll-wrapper').scroll({
            //     deceleration: 0.0005
            // });

            // 文字滚动
            function winners(json){
                $.post('../BargainH5/bargainWinners', json, function (res) {
                    if (res.s == 200) {
                        var data = res.d;
                        var html='';
                        for(var i=0;i<data.length;i++){
                            var arr = data[i].split(',');
                            html+='<li class="mui-table-view-cell">'+arr[0]+'刚刚获得'+arr[1]+'</li>'
                        }
                        $('.text-scroll').html(html);
                    }
                }, 'json');
            }

            

            /**
             * 去详情页
             * 点击[免费拿] 
             *  1.是否登录
             *  2.已登录下，发起砍价
             */
            document.querySelector('.list-container').addEventListener('tap', listEvent, false);
            
            function listEvent(e){
                if($(e.target).hasClass('action_btn')){
                    actionEvent($(e.target));
                }else{
                    var $li = $(e.target).closest('li');
                    var commodityid = $li.attr('data-commodityid'),
                        bargainactivityid = $li.attr('data-bargainactivityid');
                    mui.openWindow({ 
                        url: '../bargainh5/bargaincdetail?commodityid='+commodityid+'&bargainactivityid='+bargainactivityid
                    });
                }
            }
          
            // 我砍价的商品页
            document.querySelector('.suspend-btn').addEventListener('tap',function(){
                if(this.dataset.state==1){
                    // 未登录
                    nologinConfirm();
                    return;
                }
                if(this.dataset.flag=='false'){
                    // 无发起砍价商品
                    noGoodsConfirm();
                    return;
                }
              
                mui.openWindow({ 
                    url: '../bargainh5/bargainMore'
                });
            });

            /**
             * 点击[免费拿] 
             *  1.是否登录
             *  2.已登录下，发起砍价
             *    砍价中，去到砍价详情页
             */
            function actionEvent(el){
                var flag = $('.suspend-btn').attr('data-state');
                if(flag){
                    // 去登录
                    mui('#login_popover').popover('show');
                }else{
                    var id = $(el).closest('li').attr('data-commodityid'),
                        bargainid = $(el).closest('li').attr('data-bargainid'),
                        bargaining = $(el).closest('.bargain-box').attr('data-bargaining'),
                        bargainactivityid = $(el).closest('li').attr('data-bargainactivityid');

                    if(bargaining==1){
                        // 砍价中
                        mui.openWindow({ 
                            url: '../bargainh5/bargainDetail?bargainid='+bargainid+'&commodityid='+id
                        });   
                    }else{
                        //发起砍价
                        var json={
                            "bargainactivityid": bargainactivityid,
                            "commodityid":id
                        }
                        initBargain(json);
                    }
                }
            }
 
            
            // 发起砍价
            function initBargain(json){

                $.post('../BargainH5/initBargain', json, function (res) {
                    if(res.s==1022){
                        rzConfirm(res.ss);
                        return;
                    }

                    if (res.s == 200) {
                        var data = res.d;
                        mui.openWindow({ 
                            url: '../bargainh5/bargainDetail?bargainid='+data.bargainid+'&commodityid='+json.commodityid+'&f=1&p='+data.bargainprice
                        });
                    }else{
                        mui.toast(res.d);
                    }
                }, 'json');
            }

            
            
            // 未登录提示框
            function nologinConfirm(){
                var btnArray = ['取消', '去登录']
                mui.confirm('登录成功后才能砍价哦', '您尚未登录', btnArray, function (e) {
                    if (e.index == 1) {
                        mui('#login_popover').popover('show');
                    }
                })
            }

            function noGoodsConfirm(){
                var btnArray = ['取消', '确定']
                mui.confirm('', '您当前暂无砍价商品', btnArray, function (e) {
                    if (e.index == 1) {
                    
                    }
                })
            }
            
        }
        )()
    </script>  
</html>