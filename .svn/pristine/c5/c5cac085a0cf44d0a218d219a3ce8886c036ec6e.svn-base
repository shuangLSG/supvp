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
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/car.css" />
        <style>
            #emptydiv{ 
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                display:none;
            }
            #emptydiv img{
                width:40%
            }
        </style>
    </head>

    <?php
    session_start();
    $res = MyMemcache::share()->get('dianshangH5_' . session_id());
    ?>

    <body>

        <div id="scroll" class="mui-scroll-wrapper mui-content">

            <div class="mui-scroll custom-bg-color-gray">

                <div id="emptydiv">
                    <img src="<?= base_url() ?>public/images/home/empty2.png" >
                    <p class="custom-margin-top-16">购物车里还没有东西</p>
                </div>
                <div id="lists-wrapper">
                    
                </div>

                <!--为你推荐-->
                <div class="module custom-margin-top-20 custom-bg-color-white">
                    <div class="module-hd custom-flex-c">
                        <strong class="text-size-17"> 为你推荐 </strong>
                    </div>
                    <div id="recommendlist">

                    </div>
                </div>
            </div>
            <div id="pay-bar" class="mui-bar mui-bar-tab action-bar">
                <div class="mui-checkbox mui-pull-left custom-pay-checkbox custom-flex-c">
                    <input id="checkboxAll" class="checkbox-all-hook" name="checkboxAll" type="checkbox">
                    <span class="text-size-12">全选</span>
                </div>
                <a id="pay" class="custom-pay-btn custom-disable-btn mui-pull-right" href="javascript:;">
                    <!--选中商品时 去掉 custom-disable-btn -->
                    <span class="text-size-16">结算(<span id="cart-num">0</span>)</span>
                </a>
                <div class="pay-total mui-pull-left text-size-13">
                    <p class="custom-black-2">月供：<span class="custom-pink"><small class="text-size-13">&yen;</small><span id="monthly-price" class="text-size-20 font-MarkPro">0.00</span></span></p>
                    <p class="custom-light-gray text-size-13">合计：<span><small class="text-size-13">&yen;</small><span id="total-price" class="text-size-13">0.00</span></span></p>
                </div>
            </div>
            <div id="delete-bar" class="mui-bar mui-bar-tab action-bar" style="display:none;">
                <div class="mui-checkbox mui-pull-left custom-pay-checkbox custom-flex-c">
                    <input id="checkboxAll" class="checkbox-all-hook" name="checkboxAll" type="checkbox">
                    <span class="text-size-12">全选</span>
                </div>
                <button id="delete" class="custom-pay-btn mui-pull-right custom-red">
                    <span class="text-size-16">删除</span>
                </button>
            </div>
        </div>



        


   
        <script id="car_tpl" type="text/html">
            <div id="header" class="custom-page-nav custom-flex-hbetween">
                <div class="mui-checkbox mui-pull-left custom-flex-c">
                    <input class="checkbox-all-hook" name="checkboxAll" type="checkbox">
                    <label><span class="text-size-15">{{d.brandname}}</span></label>
                </div>    
                <button class="mui-btn mui-btn-blue mui-btn-link custom-black-2 text-size-15" id="edit">编辑</button>
            </div>
            <div class="custom-list-wrapper">
                <ul class="mui-table-view mode2-box">
                    {{each d.list cell}}
                    <li id="car_{{cell.id}}" data-activeprice="{{cell.amortize}}" data-shopid="{{cell.shopid}}" data-price="{{cell.activity_price}}" class="mui-table-view-cell">
                        <div class="mui-slider-handle custom-flex">
                            <div class="mui-checkbox mui-pull-left custom-flex-c">
                                <div class="checkbox-style">
                                    <input data-id="{{cell.id}}" data-free="{{cell.freeinterest}}" class="card-single-hook" name="checkbox" type="checkbox">
                                </div>
                            </div>
                            <div class="custom-list-box custom-flex">
                                <img class="custom-list-pic wh-180" src="{{cell.img_750_1050+zip}}180" width="100%" alt="">
                                <div class="custom-brand-info">
                                    <h3 class="text-size-13 custom-white-space">{{cell.name}}</h3>
                                    <p class="custom-light-gray text-size-12 l_types_hook">规格：
                                        {{each cell.l_type type}}
                                            <span data-type="{{type.spec}}">{{type.list[0]}}</span>
                                        {{/each}}
                                    </p>                            
                                    <div class="badges-box">
                                        {{if cell.news==1}}
                                            <img class="badge-icon" src="<?= base_url() ?>public/images/icons/news.png" alt="">
                                        {{/if}}
                                        {{if cell.freeinterest==1}}
                                            <img class="badge-icon" src="<?= base_url() ?>public/images/icons/mx.png" alt="">
                                        {{/if}}
                                    </div>
                                    <div class="position-bottom">
                                        <p class="custom-pink"><small class="text-size-13">&yen;</small><span class="monthly-price text-size-20">{{cell.activity_price}}</span></p>
                                    </div>
                                    <div class="numbox-wrapper" data-id="{{cell.id}}" data-shopid="{{cell.shopid}}">
                                        <div class="mui-numbox pull-right custom-brand-num" data-numbox-step="1" data-numbox-min="1" data-numbox-max="100">
                                            {{if cell.cnumber==1}}
                                                <button class="mui-btn mui-numbox-btn-minus tep-reduce" type="button" disabled ></button>
                                            {{else}}
                                                <button class="mui-btn mui-numbox-btn-minus tep-reduce" type="button"></button>
                                            {{/if}}
                                            <input class="mui-numbox-input" type="number" value="{{cell.cnumber}}">
                                            <button class="mui-btn mui-numbox-btn-plus tep-plus" type="button"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
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


        <script src="<?= base_url() ?>public/js/template.js"></script>    
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/car.js" type="text/javascript" charset="utf-8"></script>
 
    </body>

</html>