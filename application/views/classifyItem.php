<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/thumbnail.css" />
        <style>
            .page-bg{
                background-color:#F9F9FC;
            }
            .bg-white{
                background-color:#Fff;
            }
            a:active,a:hover{
                text-decoration: none !important;
            }
            .mui-slider-group{
                height: 17rem;
            }
            .banner-box{
                width:100%;
                height:6.66rem;
                overflow:hidden;
            }
            .mui-segmented-control.mui-scroll-wrapper{
                height:1.33rem;
            }
            .mui-segmented-control .mui-control-item{
                padding: 0 0.33rem !important;
                line-height:1.33rem;
                color:#222;
            }
            .mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active{
                font-weight:700;
                color:#222;
                font-size:0.4rem;
            }
            .mui-segmented-control.mui-segmented-control-inverted .mui-control-item.mui-active span:after {
                content: '';
                display: block;
                margin: auto;
                margin-top: -3px;
                
                width: 0.693rem;
                height: 3px;
                background: #AE8547;
            }

            .content{
                position: relative;
                z-index: 1;
                overflow: hidden;
                width: 100%;
            }

            .segmented-hd{
                height: 1.586rem;
            }
            .segmented-hd .segmented-title{
                width:2.76rem;
                height:0.6rem;
                background:url(<?= base_url() ?>public/images/icons/SUPVP_title.png) no-repeat;
                background-size:100% 100%;
            }
        </style>
    </head>

    <body>

        <div id="page" class="mui-scroll-wrapper mui-content page-bg">
            <div class="mui-scroll">
                <div class="banner-box">
                    <img src="http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280" alt="">
                </div>
               
                <div id="slider" class="mui-slider">
                    <div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted bg-white">
                        <div class="mui-scroll">

                        </div>
                    </div>
                    <!-- main content -->
                    <div class="mui-slider-group">
                        <div id="segmented" class="mui-scroll-wrapper">
                            <div class="mui-scroll">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script id="nav_tpl" type="text/html">
            {{each d item i}}
                <a id="" class="mui-control-item {{i==0?'mui-active':''}}" href="#section{{i + 1}}">
                    <span>{{item.name}}</span>
                </a>
            {{/each}}
        </script>


        <script id="segmented_tpl" type="text/html">
            <section id="section1">
                <div class="segmented-hd custom-flex-c">
                    <div class="segmented-title custom-flex-ve">
                        <span class="text-size-18">爆款推荐</span>    
                    </div>
                </div>
                <ul class="mui-table-view mui-grid-view recommend-box mode-2">
                    {{each  d cell}}
                        <li id="goods_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-6 custom-cell">
                            <img class="mui-media-object" src="{{cell.img_750_1050+zip}}294">
                            <div class="custom-cell-content">
                                <p class="describe custom-white-space-clamp-2">{{cell.name}}</p> 
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
                                    <p class="custom-pink">月供<small>&yen;</small><span class="monthly-price text-size-19">{{cell.amortize}}</span>起
                                    </p>
                                </div>
                            </div>
                        </li>
                    {{/each}}
                </ul>
            </section>
        </script>

        <script id="segmented2_tpl" type="text/html">
            <section id="section2">
                <div class="segmented-hd custom-flex-c">
                    <div class="segmented-title custom-flex-ve">
                        <span class="text-size-18">爆款推荐</span>    
                    </div>
                </div>
                <ul class="mui-table-view mui-grid-view recommend-box mode-2">
                    {{each  d cell}}
                        <li id="goods_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-6 custom-cell">
                            <img class="mui-media-object" src="{{cell.img_750_1050+zip}}294">
                            <div class="custom-cell-content">
                                <p class="describe custom-white-space-clamp-2">{{cell.name}}</p> 
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
                                    <p class="custom-pink">月供<small>&yen;</small><span class="monthly-price text-size-19">{{cell.amortize}}</span>起
                                    </p>
                                </div>
                            </div>
                        </li>
                    {{/each}}
                </ul>
            </section>
        </script>

        <script id="item_tpl" type="text/html">
            <div class="custom-bg-color-white">
                 
            </div>
        </script>

        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/mui.lazyload.js"></script>
        <script src="<?= base_url() ?>public/js/mui.lazyload.img.js"></script>
        
        <script>
            var nav = [
                {name:'爆款推荐',
                    },
                {name:'品牌包包'},
                {name:'爆款推荐'},{name:'品牌包包'},
                {name:'爆款推荐'},{name:'品牌包包'},
                {name:'爆款推荐'},{name:'品牌包包'},
            ]

       
            $('#sliderSegmentedControl .mui-scroll').html(template('nav_tpl',{d:nav}))
            //  推荐
            $.post('../api/getRecommend', {}, function (res) {
                var data = JSON.parse(res);
                var zip = '?x-oss-process=image/resize,m_lfit,w_';
                if(data.s==200){
                    $('#segmented .mui-scroll').html(template('segmented_tpl',{d: data.d,zip:zip}));
                  
                    $('#segmented .mui-scroll').append(template('segmented2_tpl',{d: data.d,zip:zip}));
                }
               
            });        
            
            mui('.mui-scroll-wrapper').scroll({
                indicators: false, //是否显示滚动条
                bounce: false //是否启用回弹
            });

            mui(document).imageLazyload({
                placeholder: 'http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280'
            });

          
            $(function () {

                (function (mui, $) {

                    

                    //  1.先让所有的slider下内容禁止scroll
                    mui('#segmented').scroll().stopped = true;

                    /*  
                     * 2.监听最外层容器的滑动事件
                     * @param {isStop} Number  防止调试器出现递归报错
                     */
                    var isStop= 0;
                    document.querySelector('#page').addEventListener('scroll', function (e) {
                        var bannerH = $('.banner-box').height();
                        if(Math.abs(e.detail.y) >= bannerH){
                            // 可能迅速滑动 错过了参考值，直接使用定位  
                            isStop++;
                            if(isStop == 1){
                                mui("#page").scroll().setTranslate(0,-bannerH);
                            }
                            mui('#page').scroll().stopped = true;
                            mui('#segmented').scroll().stopped = false;
                            if(mui('#page').scroll().stopped)return;
                        }else{
                            isStop= 0;
                        }
                    });
                    //  3.监听slider 内scroll容器的滑动事件
                    function refreshScroll(){
                        var  offon=true;
                        document.querySelector('#segmented').addEventListener('scroll',function(e){
                            if(e.detail.y >= 0){
                                mui('#page').scroll().stopped = false;
                                mui('#segmented').scroll().stopped = true;
                            }
                            // console.log(e.detail.y)
                            if(offon){
                                var scrollTop = e.detail.y;
                         
                                $('#segmented section').each(function(){
                                    // console.log( $('#segmented #section1').offset())
                                    // console.log( $('#segmented #section2').offset())
                                    var offset = $(this).offset().top;
                                    var index = $(this).index();
                                    console.log(offset , scrollTop)
                                    if(offset > scrollTop){
                                        $('#sliderSegmentedControl a').eq(index).addClass('mui-active').siblings().removeClass("mui-active");
                                        return false;
                                    }
                                });
                            }
                            //先解绑再绑定
                            // $("#sliderSegmentedControl a").off("click");

                            $("#sliderSegmentedControl a").on("click",function(){
                                offon = false;
                                var index = $(this).index();
                                var height = $("#segmented section").eq(index).offset().top-50;
                                
                                offon = true;
                                // $(this).addClass("active").siblings().removeClass("active");
                                // $('body').stop().animate({scrollTop:height},300,function(){offon=true});
                            });	
                        });
                    }

                    refreshScroll();

                    var tools = {
                        route: function (url) {
                            mui.openWindow({
                                url: url
                            });
                        },
                        
                    }
                })(mui, jQuery);
            })
        </script>
    </body>

</html>