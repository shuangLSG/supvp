<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/brandItem.css" />
    </head>

    <body>

        <!--侧滑菜单容器-->
        <div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable mui-slide-in">
      
            <div class="mui-inner-wrap ">
                <header id="header" class="mui-bar mui-bar-nav custom-page-nav">
                    <h1 class="mui-title"></h1>
                    <div class="mui-action-back mui-icon mui-pull-left">
                        <img src="<?= base_url() ?>/public/images/icons/left_arrow.png" alt="">
                    </div>
                        <!-- <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a> -->
                    <div class="custom-icon-wrapper mui-pull-right custom-flex mui-icon">
                        <img id="search" class="" src="<?= base_url() ?>/public/images/icons/search_2.png">
                    </div>
                </header>
                <div class="custom-flex custom-nav custom-bg-color-white">
                    <a class="active custom-tab-item" href="javascript:;" id="all-brand">
                        <span> 综合</span>
                    </a>
                    <a class="custom-tab-item" href="javascript:;" id="sales-brand">
                        <span>销量</span>
                    </a>
                    <a id="priceFilter" class="custom-tab-item" href="javascript:;">
                        <span>
                            价格
                            <div class="triangle-wrapper">
                                <span class="triangle-down" val="0"></span>
                                <span class="triangle-up" val="1"></span>
                            </div>
                        </span>
                    </a>
                    <a class="custom-tab-item" href="javascript:;" id="new-brand">
                        <span>新品</span>
                    </a>
                    <a id="menu" data-togrid="1" href="javascript:;">
                        <img id="mode-grid" src="<?= base_url() ?>public/images/icons/menu.png" alt="">
                        <img id="mode-list" style="display:none;" src="<?= base_url() ?>public/images/icons/menu_2.png" />
                    </a>
                </div>
                <!-- 功能导航 -->


                <div id="offCanvasContentScroll" class="mui-content mui-scroll-wrapper custom-bg-color-white">
                    <div id="brandlist" class="mui-scroll">
                        <section id="grid-container">
                            <ul class="mui-table-view mui-grid-view mode1-box mode-2">

                            </ul>
                        </section>
                        <section id="list-container" style="display:none;">
                            <div class="custom-list-wrapper">
                                <ul class="mui-table-view mode2-box" id="goodslist">

                                </ul>
                            </div>  
                        </section>
                    </div>
                    <div class="page-nodata mui-center mui-hidden">
                        <img src="<?= base_url() ?>public/images/empty.png" alt="">
                        <p>暂无数据</p>
                    </div>
                </div>
                <!-- off-canvas backdrop -->
                <div class="mui-off-canvas-backdrop"></div>

            </div>
        </div>
        

        <!-- 模式一 -->
        <script id="menu1_tpl" type="text/html">
            {{each  d cell}}
                <li id="grid_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-6 custom-cell">
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
                                <small class="custom-light-gray pull-right">{{cell.sales}}人付款</small>
                            </p>
                        </div>
                    </div>
                </li>
            {{/each}}
        </script>
       
        <!-- 模式二 -->
        <script id="menu2_tpl" type="text/html">
            {{each  d cell}}
                <li id="list_{{cell.id}}" class="mui-table-view-cell">
                    <div class="mui-slider-handle custom-flex">
                        <div class="custom-list-box custom-flex">
                            <img class="custom-list-pic" src="{{cell.img_750_1050+zip}}210" width="100%" alt="">
                            <div class="custom-brand-info">
                                <h3 class="">{{cell.name}}</h3>
                                <div class="badges-box">
                                    {{if cell.news==1}}
                                        <img class="badge-icon" src="<?= base_url() ?>public/images/icons/news.png" alt="">
                                    {{/if}}
                                    {{if cell.freeinterest==1}}
                                        <img class="badge-icon" src="<?= base_url() ?>public/images/icons/mx.png" alt="">
                                    {{/if}}
                                </div>
                                <div class="pos-bottom">
                                    <p class="custom-gray"><small class="scale">&yen;</small>{{cell.activity_price}} <small class="text-decoration custom-light-gray">&yen;{{cell.price}}</small></p>                            
                                    <p class="custom-pink">月供<small>&yen;</small><span class="monthly-price text-size-38">{{cell.amortize}}</span>起
                                        <small class="custom-light-gray">{{cell.sales}}人付款</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            {{/each}}
        </script>
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script>    
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/brandItem.js"></script>
    </body>
</html>