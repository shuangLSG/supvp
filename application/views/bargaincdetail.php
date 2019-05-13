<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>

    <head>
        <meta charset="utf-8">
        <title>砍价免费拿</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" /> -->
        
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/bargaibcdetail.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/bargain.css?t=0.02">
    
    </head>

    <body>
        <div id="scroll" class=" mui-content bg-page page-scroll-wrapper">
            <section>
                <input type="hidden" value="<?= $id ?>" id="goodsid">
                <div class="custom-banner bg-white">
                    <div id="bannerSlider" class="mui-slider">

                        <!--显示轮播图内容-->

                    </div>
                </div>

                <section class="introduce page-section-30">
                    <h2 class="font-red">
                        <strong id="people" class="">0</strong>
                        <span>已免费拿</span>
                        <span class="font-gray">价值<span id="goodsprice"></span> 元</span>
                    </h2>
                    <div class="introduce-title  custom-light-gray" id="goodsname">
                        <h4 class="text-size-16"><strong> <!-- goods name --> </strong></h4>
                         <p class="text-size-12"><!-- goods title --></p>
                    </div>
                </section>
                <div class="custom-margin-top-20">
                    <ul class="mini-monthly-supply">
                        <li class="custom-flex custom-flex-vc font-red">
                            <strong>放心砍，砍成必发货</strong>  
                        </li>
                    </ul>
                </div>
                <div class="promise-box page-section-30 bg-white custom-flex-hbetween">
                    <img src="<?= base_url() ?>public/images/bargain/gs_1.png" alt="">
                    <img src="<?= base_url() ?>public/images/bargain/gs_2.png" alt="">                        
                    <img src="<?= base_url() ?>public/images/bargain/gs_3.png" alt="">
                </div>

          
                
                <section id="detail" class="goods-detail goods-info-wrapper page-section-30 custom-margin-top-20">
                    <h3 class="text-size-17"><strong>商品详情</strong></h3>
                    <div class="detail-spec">
                        
                        <!--商品详情-->

                    </div>
                    <div class="detail-img">
                        
                        <!--商品详情img-->

                    </div>
                </section>

            </div>
        </div>

        
       
      
      
        <!-- 底部导航条 -->
        <nav id="footer" class="mui-bar mui-bar-tab custom-bar custom-flex">
            <div class="btn-wrapper custom-flex">
                <a class="to-bargain custom-btn custom-default-btn-fill custom-carmine-gradient" href="javascript:;">
                    <strong>免费拿更多</strong>
                </a>
                <a class="free action-btn custom-btn custom-black-btn custom-orange-gradient">
                    <strong>砍价免费拿</strong>
                </a>
                
            </div>
        </nav>

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
                        
    
        <!-- banner -->            
        <script  id="banner_tpl" type="text/html">
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
            <div class="mui-slider-indicator">
                <div class="mui-number mui-text-center">
                    <span>1</span> / {{d.length}}
                </div>
            </div>
        </script>
    
      
        <script>
           var collectImg ='<?= base_url() ?>public/images/icons/det_1_active.png';
        </script>

        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script> 
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/bargainLogin.js" type="text/javascript" charset="utf-8"></script>
        
      <script>
        $(function () {

            mui.init();
            (function (mui, $) {


                /** 
                 * 商品列表展示
                 * commodityid   商品id
                 * bargainid     砍价id
                */

                var id = GetQueryString('bargainactivityid'),
                commodityid = GetQueryString('commodityid');
                $.post('../bargainh5/detail', {
                        'bargainactivityid':id,
                        'commodityid':commodityid
                    }, function (res) {
                        if (res.s == 200) {
                            var data = res.d;
                            // 轮播图
                            $('#bannerSlider').html(template('banner_tpl', {
                                d: data.imgs,
                                zip: zip
                            })); 

                            // slider 图片轮播 banner
                            var gallery = mui('#bannerSlider');
                            gallery.slider({
                                interval: 4000 //自动轮播周期，若为0则不自动播放，默认为0；
                            });

                            // 详情
                            goodsDetail(data);

                        }

                }, 'json');

                // 用户是否登录
                // $.post('../user/getuserinfo', {'bargain':1}, function (res) {
                //     if (res.s == 9999) {
                //         $('.action-btn').attr('data-state',1);
                //     }
                // }, 'json');
                var ss = GetQueryString('ss',window.location.href);
                $.post('../user/getuserinfo', {'bargain':1,'ss':ss == null?'':ss}, function (res) {
                    if (res.s == 9999) {
                        $('.action-btn').attr('data-state',1);
                    }
                }, 'json');

                //  商品详情
                function goodsDetail(data) {
                    // 价格
                    $('#people').text(data.sales+'人');
                    $('#goodsprice').html(data.price);

                    // 名称
                    $('#goodsname').find('strong').text(data.name).end().find('p').text(data.title);

                    //商品信息
                    $('#detail .detail-img').html(data.cinfo);                 
                }

                // 展示地址的弹框
                mui('.main-content').on('tap','.add-address',function(){
                    var bargainid = $(this).closest('li').attr('data-bargainid');
                    mui('#address_popover').popover('show');
                    $('#address_popover').attr('data-bargainid',bargainid);
                });
                mui('#footer').on('tap','a',function(){                    
                    if($(this).index()==0){
                        // 点击免费那更多 跳转至砍价首页
                        mui.openWindow({ 
                            url: '../bargainh5/bargainHome'
                        }); 
                    }else{
                        // 发起砍价 1.是否登录
                        var flag = $('.action-btn').attr('data-state');
                        if (flag) {
                            // 去登录
                            mui('#login_popover').popover('show');
                            return;
                        }

                        // 2.发起砍价
                        var bargainactivityid = GetQueryString('bargainactivityid'),
                        commodityid = GetQueryString('commodityid');
                        var json={
                            "bargainactivityid": bargainactivityid,
                            "commodityid":commodityid
                        }
                        initBargain(json);
                    }
                });

             
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
                mui('.mui-scroll-wrapper').scroll({
                    deceleration: 0.0005
                });

                
                

            })(mui, jQuery);
            })

        </script>

    </body>
</html>