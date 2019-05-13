<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/goodsDetail.css">
        <style>
            /*防止页面加载瞬间 先缩小后正常的情况*/
            html{
                font-size:35px;
            }
       
        </style>
    </head>

    <?php
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        redirect('/supvp/index');
    }
    ?>

    <body>

        <div id="scroll" class=" mui-content custom-bg-color-gray page-scroll-wrapper">

            <section>
                <input type="hidden" value="<?= $id ?>" id="goodsid">
                <div class="custom-banner custom-bg-color-white">
                    <div id="bannerSlider" class="mui-slider">

                        <!--显示轮播图内容-->

                    </div>
                </div>

                <section class="introduce page-section-30">
                    <h2 class="custom-pink"><small>&yen;</small><strong id="goodsprice" data-price="" class="font-MarkPro">0</strong><span class="font-Arial">&yen;6533</span></h2>
                    <div class="custom-margin-top-20">
                        <ul class="mini-monthly-supply">
                            <li class="custom-flex custom-flex-vc">
                                <a href="#stage" id="openPopover" class="stage-spec custom-flex custom-flex-vc">
                                    <div class="custom-flex custom-flex-vc">
                                        <span class="mui-badge mui-badge-red text-size-13">12期</span>
                                        <span class="custom-flex custom-flex-vc custom-pink text-size-14">月供<small class="text-size-14">&yen;</small><span class="monthly-price font-MarkPro text-size-20">0</span></span>
                                    </div> 
                                    <div class="custom-flex custom-flex-vc">
                                        <span class="">更多分期方式</span>
                                        <i class="mui-icon  mui-icon-arrowright"></i>  
                                    </div> 
                                </a>
                            </li>
                        </ul>
                    </div> 
                    <div class="introduce-title  custom-light-gray" id="goodsname">
                        <h4 class="text-size-16"><strong> <!-- goods name --> </strong></h4>
                         <p class="text-size-12"><!-- goods title --></p>
                    </div>
                </section>
                <div class="promise-box page-section-30 custom-bg-color-white custom-flex-hbetween">
                    <img src="<?= base_url() ?>public/images/goodsDetail/gs_1.png" alt="">
                    <img src="<?= base_url() ?>public/images/goodsDetail/gs_2.png" alt="">                        
                    <img src="<?= base_url() ?>public/images/goodsDetail/gs_3.png" alt="">
                </div>

                <div class="custom-list-wrapper goods-info-wrapper custom-margin-top-20">
                    <ul  class="mui-table-view">
                        <li  class="mui-table-view-cell">
                            <a href="#goodstype" id="openTypePopover" class="custom-flex mui-navigate-right">
                                <span class="custom-gray-8 text-size-13">选择</span>  
                                <div data-cartnum="1" class="allSelect-box text-size-13">
                                    <!--goodstype <strong>黑色</strong>  
                                    <strong>64G内存</strong>  
                                    <strong>全网通</strong>                                       -->
                                </div>
                            </a>
                        </li>
                        <li class="mui-table-view-cell">
                            <a href="#coupon" id="openCouponPopover" class="custom-flex mui-navigate-right">
                                <span class="custom-gray-8 text-size-13">领券</span> 
                                <div class="preferential-box">
                                    <!-- <span class="mui-badge-warning mui-badge-outlined text-size-12">每满100-50</span>   -->
                                </div> 
                            </a>
                        </li>
                    </ul>
                </div>
                               
                <section id="" class="goods-info-wrapper everybody-watching-box custom-margin-top-20">
                    <h3 class="text-size-17 custom-flex-hbetween">
                        <strong>大家都在看</strong>
                        <div class="custom-flex custom-flex-vc">
                            <span id="seeMore" class="text-size-12 custom-gray-8">查看更多</span>
                            <i class="mui-icon  mui-icon-arrowright"></i>  
                        </div>
                    </h3>
                    <div id="slider" class="mui-slider custom-bg-color-white">
                        <div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                            <div class="mui-scroll custom-flex">

                                <!--横向滑动列表-->

                            </div>
                        </div>
                    </div>
                </section>
                
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

        <div id="stage" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card stage-box">
                <div class="mui-card-header custom-flex-c"><strong>分期购 0首付</strong><i class="mui-icon mui-icon-closeempty"></i></div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <div class="content-wrapper">
                            
                            
                        </div>
                            <p class="custom-gray-8">下单支付时，可选择分期付款</p>
                        
                    </div>
                </div>
            </div>
        </div>
        <div id="coupon" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card coupon-box">
                <div class="mui-card-header custom-flex-c">优惠券<i class="mui-icon mui-icon-closeempty"></i></div>               
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <!-- <div class="mui-scroll-wrapper mui-content">
                            <div class="mui-scroll">
                                <div class="mui-loading">
                                    <div class="mui-spinner">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>  
        <!-- <div id="sizetable" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card sizetable-box">
                <div class="mui-card-header custom-flex-c">尺码对照表<i class="mui-icon mui-icon-closeempty"></i></div>               
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <div class="mui-scroll-wrapper mui-content mui-slider-indicatorcode mui-segmented-control mui-segmented-control-inverted">
                            <div class="mui-scroll">
                                <div class="mui-loading">
                                    <div class="mui-spinner">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   -->
        <div id="goodsdetail" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card goodstype-box">
                
            </div>
        </div> 
        <div id="goodstype_pay" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card goodstype-box">
                
            </div>
        </div>     

        <!-- 底部导航条 -->
        <nav id="footer" class="mui-bar mui-bar-tab custom-bar custom-flex">
            <div class="icon-wrapper">
                <a id="collection" class="mui-tab-item" href="javascript:;">
                    <img class="mui-icon"  src="<?= base_url() ?>public/images/icons/det_1.png" data-active="<?= base_url() ?>public/images/icons/det_1_active.png"
                    data-init="<?= base_url() ?>public/images/icons/det_1.png" alt="">
                    <span class="mui-tab-label gocart">收藏</span>
                </a>
                <a id="service" class="mui-tab-item" href="javascript:;">
                    <img class="mui-icon"  src="<?= base_url() ?>public/images/icons/det_2.png" alt="">
                    <span class="mui-tab-label gocart">客服</span>
                </a>
                <a id="gocart" class="mui-tab-item" href="javascript:;">
                    <img class="mui-icon" src="<?= base_url() ?>public/images/icons/det_3.png" alt="">
                    <!--<span class="mui-badge mui-badge-warning"></span>-->
                    <span class="mui-tab-label gocart">购物袋</span>
                </a>
            </div>
            <div class="btn-wrapper custom-flex">
                <a class="addCart custom-btn custom-black-btn custom-orange-gradient mui-pull-right">
                    <span>加入购物袋</span>
                </a>
                <a class="addPay custom-btn custom-default-btn-fill custom-carmine-gradient mui-pull-right" href="javascript:;">
                    <span>立即购买</span>
                </a>
            </div>
        </nav>

        <script id="skill_tpl" type="text/html">
            <div class="skill-box">
                <div class="module-hd custom-flex-hbetween">
                    <strong class="text-size-17">限时抢购中</strong>
                    <div class="skill-timer custom-flex">
                        倒计时
                        <section id="countDownTime" class="countDownTime-box"><span>20</span><small>:</small><span>35</span><small>:</small><span>55</span></section>
                    </div>
                </div>
            </div>
        </script>

        <script id="goodstype_tpl" type="text/html">
            <div class="mui-card-header">
                <ul class="mode2-box">
                    <li class="mui-table-view-cell">
                        <div class="custom-list-box custom-flex">
                            <img class="custom-list-pic" src="{{d.url+zip}}180" width="100%" alt="">
                            <div class="custom-brand-info">
                                <p class="custom-pink text-size-24"><small class="scale text-size-15">&yen;</small><span class="font-MarkPro">{{d.activity_price}}</span><small class="custom-light-gray text-size-12">库存{{d.total}}件</small></p>                            
                                <p class="custom-pink text-size-15">月供<small class="text-size-12">&yen;</small><span class="monthly-price text-size-18">{{d.price}}</span></p>
                            </div>
                        </div>
                    </li>
                </ul>
                <i class="mui-icon mui-icon-closeempty"></i>
            </div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <div class="content-wrapper">
                        <div class="goods-info-wrapper">
                            {{each d.type i}}
                                {{if i.spec=='size'}}
                                <div class="goods-info-item">
                                    <span class="custom-gray-8">{{i.name}}</span>
                                    {{if size_img}}
                                    <a href="#sizetable" id="sizetable_link" data-url="{{size_img}}" class="custom-orange size_table mui-pull-right">尺码对照表</a>
                                    {{/if}}
                                    <div class="right-content">
                                        <ul class="filter-cell" data-type="{{i.spec}}">
                                            {{each i.list cell index}}
                                                <li  class="custom-tab-item {{index==0&&i.list.length==1?'active':''}}">{{cell}}</li>
                                            {{/each}}
                                        </ul>
                                    </div>
                                </div>
                                {{else}}
                                <div class="goods-info-item">
                                    <span class="custom-gray-8">{{i.name}}</span>
                                    <div class="right-content">
                                        <ul class="filter-cell" data-type="{{i.spec}}">
                                            {{each i.list cell index}}
                                                <li  class="custom-tab-item {{index==0&&i.list.length==1?'active':''}}">{{cell}}</li>
                                            {{/each}}
                                        </ul>
                                    </div>
                                </div>
                                {{/if}}
                            {{/each}}
                    
                        
                            <div class="goods-info-item  size">
                                <span class="custom-gray-8">数量</span>
                                <div class="right-content">
                                    <div class="numbox-wrapper">
                                        <div class="mui-numbox pull-right custom-brand-num" data-numbox-step="1" data-numbox-min="1" data-numbox-max="100">
                                            <button class="mui-btn mui-numbox-btn-minus tep-reduce" type="button"></button>
                                            <input class="mui-numbox-input" type="number" value="1">
                                            <button class="mui-btn mui-numbox-btn-plus tep-plus" type="button"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{if ispay==1}}
                        <button id="" class="popover-buy mui-btn mui-btn-block custom-carmine-gradient confirm-btn text-size-16">确定</button>
                    {{else}}
                        <div class="btn-wrapper custom-flex">
                            <a id="popover-addCart" class="custom-btn custom-black-btn custom-orange-gradient mui-pull-right hide-hook">
                                <span class="text-size-16">加入购物袋</span>
                            </a>
                            <a id="popover-toOrder" class="popover-buy custom-btn custom-default-btn-fill custom-carmine-gradient mui-pull-right hide-hook" href="javascript:;">
                                <span class="text-size-16">立即购买</span>
                            </a>
                        </div>
                    {{/if}}
                </div>
            </div>
        </script>
                        
        <!-- 分期 -->
        <script id="stage_tpl" type="text/html">
            <ul class="mui-table-view mui-grid-view mode-2">
                {{each d cell}}
                    <li class="mui-table-view-cell text-size-16">
                    <!-- <span class="custom-pink text-size-18">&yen;524.00</span> -->
                       <span class="custom-pink text-size-18 font-MarkPro">&yen;{{cell.price}}</span>x{{cell.num}}期 
                    </li>
                {{/each}}
            </ul>
        </script>
        <!-- 优惠券 -->
        <script id="coupon_tpl" type="text/html">
            <ul class="mui-table-view mode-2">
                {{each d cell}}
                    <li class="mui-table-view-cell custom-flex">
                        <div class="">
                            <h3 class="custom-orange">&yen;<span class="text-size-24 font-MarkPro">{{cell.price}}</span></h3>
                            <p class=""><sapn class="custom-orange">满{{cell.amount}}元可用</sapn><small>{{cell.from|couponType}}</small></p>
                            <p class="custom-light-gray text-size-11">使用期限 {{cell.starttime |dateFormat 'yyyy.MM.dd'}}-{{cell.endtime |dateFormat 'yyyy.MM.dd'}}</p>
                        </div>
                        <button type="button" class="mui-btn text-size-13 {{cell.isget==1?'custom-bg-light-gray':'custom-btn-gradient'}}">{{cell.isget==1?'已领取':'领取'}}</button>
                    </li>
                {{/each}}
            </ul>
        </script>
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
    
        <!-- 大家都在看 -->
        <script id="slider_tpl" type="text/html">
            {{each d i index}}
                <a id="item_{{i.id}}" class="mui-control-item custom-cell" >
                    <img src="{{i.img_750_1050+zip}}180">
                    <div class="custom-cell-content">
                        <p class="describe custom-white-space-clamp text-size-11">{{i.name}}</p>
                        <p class="custom-pink text-size-11">月供<small>&yen;</small><span class="monthly-price text-size-17">{{i.amortize}}</span></p>
                    </div>
                </a>
            {{/each}}
        </script>

        <script>
           var collectImg ='<?= base_url() ?>public/images/icons/det_1_active.png';
        </script>

        <script src="<?= base_url() ?>public/js/filter.js"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script> 
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/wxshare.js" type="text/javascript"></script>      
        <script src="<?= base_url() ?>public/js/page/goodsDetail.js"></script>
        <script>
            $(function () {
             //  =========================================================  分享 ==========================================================================
                var goodsname = $('#goodsname').text();
                var imgUrl = $('#bannerSlider').find('.mui-slider-item:last-child img').attr('src');
                var wxData = {
                    "imgUrl": imgUrl,
                    "link": '<?= $signPackage["url"] ?>',
                    "title": goodsname,
                    "desc": '我在supvp发现在了' + goodsname + '，官方直营，正品保证，马上来抢购吧！'
                };
                console.log(goodsname,imgUrl)
                // 通过config接口注入权限验证配置,参数由后台提供,
                wx.config({
                    debug: false,
                    appId: '<?= $signPackage["appId"] ?>',
                    timestamp: '<?= $signPackage["timestamp"] ?>',
                    nonceStr: '<?= $signPackage["nonceStr"] ?>',
                    signature: '<?= $signPackage["signature"] ?>',
                    jsApiList: [
                        'onMenuShareTimeline',
                        'onMenuShareAppMessage'
                    ]
                });
                wx.ready(function () {
                    // 分享朋友圈代码
                    wx.onMenuShareTimeline({
                        title: wxData.title,
                        link: wxData.link,
                        imgUrl: wxData.imgUrl,
                        success: function () {}
                    });
                    // 分享给朋友代码
                    wx.onMenuShareAppMessage({
                        title: wxData.title,
                        desc: wxData.desc,
                        link: wxData.link,
                        imgUrl: wxData.imgUrl,
                        type: 'link',
                        dataUrl: '',
                        success: function () {}
                    });
                });
            })
        </script>
    </body>
</html>