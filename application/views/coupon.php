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
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/coupon.css" />
    </head>

    <body class="">
        <div class="tab-wrapper">
            <div id="segmentedControl" class="mui-segmented-control mui-segmented-control-inverted custom-bg-color-white">
                <a class="mui-control-item mui-active text-size-15" href="#item1">
                    <span>未使用</span>
                </a>
                <a class="mui-control-item text-size-15" href="#item2">
                    <span>已失效</span>
                </a>
            </div>
        </div>

        <div class="mui-control-wrapper coupon-box">
            <!--未使用-->
            <div id="item1" class="mui-control-content mui-active">
                <div class="page-nodata mui-center" style="display: none;">
                    <img src="<?= base_url() ?>public/images/empty.png" alt="">
                    <p>当前暂无数据</p>
                </div>
                <div class="mui-scroll-wrapper mui-content page-bg page-more">
                    <div class="mui-scroll"></div>
                </div>
            </div>
            <!--已失效-->
            <div id="item2" class="mui-control-content register-wrapper">
                <div class="page-nodata mui-center" style="display: none;">
                    <img src="<?= base_url() ?>public/images/empty.png" alt="">
                    <p>当前暂无数据</p>
                </div>
                <div class="mui-scroll-wrapper mui-content page-bg page-more">
                    <div class="mui-scroll"></div>
                </div>
            </div>
        </div>

        

        <!-- 优惠券 -->
        <script id="coupon_tpl" type="text/html">
            <ul class="mui-table-view mode-2">
                {{each d cell}}
                    <li data-id="{{cell.id}}" data-from="{{cell.from}}" data-brandids="{{cell.brand_ids}}" data-title="{{cell.title}}" data-selectid="{{cell.selection_ids}}" class="mui-table-view-cell custom-flex">
                        <div class="{{isdel==1?'custom-light-gray':''}}">
                            <h3 class="custom-orange">&yen;<span class="text-size-24">{{cell.price}}</span></h3>
                            <p class=""><sapn class="custom-orange">满{{cell.amount}}元可用</sapn><small>{{cell.remark}}</small></p>
                            <p class="custom-light-gray text-size-11">使用期限 {{cell.starttime |dateFormat 'yyyy.MM.dd'}}-{{cell.endtime |dateFormat 'yyyy.MM.dd'}}</p>
                        </div>
                        <button type="button" class="mui-btn text-size-13 {{isdel==1?'custom-bg-light-gray':'custom-btn-gradient'}}">{{isdel==1?'已失效':'去使用'}}</button>
                    </li>
                    
                {{/each}}
            </ul>
        </script>

        <script src="<?= base_url() ?>public/js/filter.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/coupon.js" type="text/javascript" charset="utf-8"></script>

    </body>

</html>