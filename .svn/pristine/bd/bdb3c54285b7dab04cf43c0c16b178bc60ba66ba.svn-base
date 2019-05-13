<!doctype html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>SUPVP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/index.css?t=0.01" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css?t=0.01">
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
     
        <style>
            body{
                position: fixed;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }
        </style>
    </head>

    <body>
        
        <header id="header" class="mui-bar mui-bar-nav custom-bg-color-white custom-page-nav">
            <div class="mui-title mui-search mm-search">
                <input id="search" type="search" class="mui-input-clear whiteBg">
                <span class="mui-placeholder custom-flex custom-flex-vc"><img class="mui-icon" src="<?= base_url() ?>public/images/icons/search.png"/><span>搜索你的精致生活</span></span>
            </div>
        </header>

        <div id="wrapper" class="mui-content mui-scroll-wrapper custom-bg-color-gray"> 
            <div id="wrapper-scroll" class="mui-scroll">
                <section class="custom-bg-color-white page-section-26">
                    <!-- banner 图片轮播 -->
                    <div class="custom-banner">
                        <div id="bannerSlider" class="mui-slider">

                            <!--显示轮播图内容-->

                        </div>
                    </div>

                    <!-- 分类 -->
                    <div id="classify_box" style="min-height: 4.6rem;"></div>
                </section>

                <!-- 限时抢购 -->
                <section class="custom-bg-color-white">
                    <div class="module section-SecKill">
                        
                    </div>
                </section>
                
                <!-- 精选分期 -->
                <section class="custom-bg-color-white page-section-26">
                    <div class="module section-stage">
                        
                    </div>
                </section>

                <!--为你推荐-->
                <div class="module custom-margin-top-20 custom-bg-color-white">
                    <div class="module-hd custom-flex-c">
                        <strong> 为你推荐 </strong>
                    </div>
                    <div id="recommendlist">

                    </div>
                </div>

            </div>    
        </div>


        <!-- 分类 -->
        <script id="classify_tpl" type="text/html">
            <ul class="mui-table-view mui-grid-view classify-box">
                {{each d i index}}
                    <li id="classify_{{i.id}}" class="mui-table-view-cell mui-media">
                        <a href="#">
                            <img src="{{i.logo}}" class="mui-icon custom-around"></div>
                            <span class="mui-media-body">{{i.name}}</span>
                        </a>
                    </li>
                {{/each}}
            </ul>
        </script>
            
        <!-- banner -->            
        <script  id="banner_tpl" type="text/html">
            <div class="mui-slider-group mui-slider-loop">
                <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
                <div data-url="{{d[d.length-1].url}}" data-title="{{d[d.length-1].title}}" class="mui-slider-item mui-slider-item-duplicate">
                    <a href="#">
                        <img src="{{d[d.length-1].showimg}}">
                    </a>
                </div>
                <!-- 第一张 -->
                {{each d i index}}
                    <div  data-url="{{i.url}}"  data-title="{{i.title}}" class="mui-slider-item">
                        <a href="#">
                            <img src="{{i.showimg}}">
                        </a>
                    </div>
                {{/each}}
                <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
                <div  data-url="{{d[0].url}}" data-title="{{d[0].title}}" class="mui-slider-item mui-slider-item-duplicate">
                    <a href="#">
                        <img src="{{d[0].showimg}}">
                    </a>
                </div>
            </div>
            <div class="mui-slider-indicator">
                {{each d i index}}
                    <div class="mui-indicator {{index==0?'mui-active':''}}"></div>
                {{/each}}
            </div>
        </script>

        <!-- 限时抢购 -->
        <script id="SecKill_tpl" type="text/html">
            <div class="module-hd custom-flex-hbetween">
                <img src="<?= base_url() ?>public/images/icons/title_1.png"/>
                <section id="countDownTime" class="countDownTime-box">

                </section>
            </div>
            <div class="module-bd" style="min-height:5.6rem;">
                <div id="SecKillSlider" class="mui-slider">
                    <div class="mui-slider-group">  
                        {{each d.commodity_list i index}}
                            <div class="mui-slider-item">
                                <ul class="mui-table-view mui-grid-view SecKill-box">
                                {{each i cell index}}                                  
                                    <li id="good_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-4 custom-cell">
                                        <img class="mui-media-object" src="{{cell.img_750_1050+zip}}220">
                                        <div class="custom-cell-content">
                                            <p class="describe custom-white-space custom-black-2">{{cell.name}}</p> 
                                            <p class="custom-pink">月供<small>￥</small><span class="monthly-price text-size-38">{{cell.amortize}}</span></p>
                                            <p class="custom-light-gray"><small class="scale">￥</small>{{cell.seckill_price}}</p>
                                        </div>
                                    </li>
                                {{/each}}
                                </ul>
                            </div>
                        {{/each}}
                    </div>
                    <div class="mui-slider-indicator">
                        {{each d.commodity_list i index}}
                        <div class="mui-indicator {{index==0?'mui-active':''}}"></div>
                        {{/each}}
                    </div>
                </div>
            </div>
        </script>

       
        <!-- 精选分期 -->    
        <script id="showGoods_tpl" type="text/html">
            <div class="module-hd custom-flex custom-flex-vc">
                <strong>{{d.title}}</strong>
            </div>
            <div class="module-bd">
                {{if d.img}}
                <div class="module-main-commodity custom-flex module-big-img">
                    <img data-url="{{d.url}}" data-title="{{d.title}}" class="" src="{{d.img}}"/>
                </div>
                {{else}}
                <div id="goods_{{d.commodity_list[0].id}}" class="module-main-commodity custom-flex">
                    <img class="" src="{{d.commodity_list[0].img_750_1050+zip}}280"/>
                    <div class="main-commodity-spec">
                        <div>
                            <p class="describe custom-white-space-2 text-size-14 custom-black-2">{{d.commodity_list[0].name}}</p>
                        </div>
                        <span class="tag text-size-12">{{d.commodity_list[0].title}}</span>
                        <p class="custom-light-gray"><small class="scale">￥</small>{{d.commodity_list[0].activity_price}}</p>                    
                        <p class="custom-pink">月供<small>￥</small><span class="monthly-price text-size-38 font-MarkPro">{{d.commodity_list[0].amortize}}</span>起</p>                                    
                    </div>
                </div>
                {{/if}}
                <ul class="mui-table-view mui-grid-view module-menu">
                    {{each d.commodity_list cell index}}
                        {{if d.img}}
                        <li id="good_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-4 custom-cell">
                            <img class="mui-media-object" src="{{cell.img_750_1050+zip}}220">
                            <div class="custom-cell-content">
                                <p class="describe custom-white-space custom-black-2">{{cell.name}}</p> 
                                <p class="custom-pink">月供<small>￥</small><span class="monthly-price text-size-38">{{cell.amortize}}</span></p>
                                <p class="custom-light-gray text-size-13"><small class="scale">￥</small>{{cell.activity_price}}</p>
                            </div>
                        </li>
                        {{else}}
                            {{if index>0}}
                            <li id="good_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-4 custom-cell">
                                <img class="mui-media-object" src="{{cell.img_750_1050+zip}}220">
                                <div class="custom-cell-content">
                                    <p class="describe custom-white-space custom-black-2">{{cell.name}}</p> 
                                    <p class="custom-pink">月供<small>￥</small><span class="monthly-price text-size-38">{{cell.amortize}}</span></p>
                                    <p class="custom-light-gray text-size-13"><small class="scale">￥</small>{{cell.activity_price}}</p>
                                </div>
                            </li>
                            {{/if}}
                        {{/if}}
                    {{/each}}
                </ul>
            </div>
        </script>


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

        <?php
        $this->load->view('share/footer');
        ?>
        
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/index.js" type="text/javascript" charset="utf-8"></script>

    </body>

    <script>
    
        var isStop= 0;
        document.querySelector('.mui-content').addEventListener('scroll', function (e) {
           console.log(e.detail.y)
            // var bannerH = $('.custom-banner').height();
            // if(Math.abs(e.detail.y) >= bannerH){
            //     // 可能迅速滑动 错过了参考值，直接使用定位  
            //     isStop++;
            //     if(isStop == 1){
            //         mui(".mui-content").scroll().setTranslate(0,-bannerH);
            //     }
            //     mui('.mui-content').scroll().stopped = true;
            //     $('#slider .mui-slider-item').each(function(i,item){
            //         var index = i+1;
            //         mui('#scroll'+index).scroll().stopped = false;
            //     });
            //     if(mui('.mui-content').scroll().stopped)return;
            // }else{
            //     isStop= 0;
            // }
        });
    </script>
</html>