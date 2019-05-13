<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css?t=0.03" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/browserHistory.css" />        
    </head>

    <body class="">
        <header id="header" class="mui-bar mui-bar-nav custom-bg-color-white">
            <div class="custom-box-title">
                <p>
                    <span class="mui-pull-right custom-bt" id="edit">编辑</span>
                    <span class="mui-pull-right custom-bt" id="clear">清空</span>
                </p>
            </div>
        </header>

        <div class="page-nodata mui-center" style="display: none;">
            <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
           <p>当前暂无数据</p>
        </div>

        <div id="pullrefresh" class="mui-scroll-wrapper mui-content page-bg">
            <div  class="mui-scroll">
           
                <ul class="mui-table-view collect-box mode2-box">
                    
                    <!-- 在此插入列表内容 -->

                </ul>
            </div>
        </div>


        <footer id="footer" class="mui-bar mui-bar-tab custom-pay-bar" style="display: none;">
            <div class="mui-checkbox mui-pull-left custom-pay-checkbox">
                <input id="checkboxAll" name="checkboxAll" type="checkbox">
                <span>全选</span>
            </div>

            <a id="delete" class="custom-pay-btn mui-pull-right" href="javascript:;">
                <span>删除</span>
            </a>
        </footer>

        <script id="collect_tpl" type="text/html">
            {{each d cell}}
            <li id="car_{{cell.id}}" data-activeprice="{{cell.activity_price}}" data-shopid="{{cell.shopid}}" data-price="{{cell.price}}" class="mui-table-view-cell">
                <div class="mui-slider-handle custom-flex">
                    <div class="mui-checkbox mui-pull-left custom-flex-c">
                        <div class="checkbox-style">
                            <input data-id="{{cell.id}}" class="card-single-hook" name="checkbox" type="checkbox">
                        </div>
                    </div>
                    <div class="custom-list-box custom-flex">
                        <img class="custom-list-pic wh-180" src="{{cell.img_750_1050+zip}}180" width="100%" alt="">
                        <div class="custom-brand-info">
                            <h3 class="text-size-13 custom-white-space">{{cell.name}}</h3>
                            <div class="badges-box">
                                {{if cell.news==1}}
                                    <img class="badge-icon" src="<?= base_url() ?>public/images/icons/news.png" alt="">
                                {{/if}}
                                {{if cell.freeinterest==1}}
                                    <img class="badge-icon" src="<?= base_url() ?>public/images/icons/mx.png" alt="">
                                {{/if}}
                            </div>                            
                            <p class="custom-pink"><small>&yen;</small><span class="monthly-price text-size-20">{{cell.activity_price}}</span></p>
                        </div>
                    </div>
                </div>
            </li>
            {{/each}}
        </script> 
        <script src="<?= base_url() ?>public/js/template.js"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/collect.js" type="text/javascript" charset="utf-8"></script>

    </body>

</html>