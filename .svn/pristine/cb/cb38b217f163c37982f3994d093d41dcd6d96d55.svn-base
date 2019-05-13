<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css"> -->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/myOrder.css" />

        <style>   
           
            .custom-pay-bar.mui-bar{
                z-index: 999;
            }
        </style>
    </head>
    
    <body>
        <div id="slider" class="mui-slider mui-content mui-fullscreen page-bg  bounce">

            <div id="sliderSegmentedControl" class="mui-scroll-wrapper mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
                <div class="mui-scroll">
                    <a class="mui-control-item mui-active" href="#item1mobile">
                        <span>全部</span>
                    </a>
                    <a class="mui-control-item" href="#item2mobile">
                        <span>待付款</span>
                    </a>
                    <a class="mui-control-item" href="#item3mobile">
                        <span>待发货</span>
                    </a>
                    <a class="mui-control-item" href="#item4mobile">
                        <span>待收货</span>
                    </a>
                    <a class="mui-control-item" href="#item5mobile">
                        <span>售后</span>
                    </a>
                </div>
            </div>

            <div class="mui-slider-group">
                <div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
              
                    <div class="custom-empty mui-text-center" style="display: none;">
                        <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
                        <p>抱歉,还没有相关内容</p>
                    </div>
                    <!-- 待付款  -->

                    <div id="scroll1" data-pagenum="2" class="mui-scroll-wrapper page-more">
                        <div class="mui-scroll">    
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                            <div class="content"></div>
                        </div>
                    </div>
                </div>

                <div id="item2mobile" class="mui-slider-item mui-control-content">
                    <div class="custom-empty mui-text-center" style="display: none">
                        <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
                        <p>抱歉,还没有相关内容</p>
                    </div>
                    <div id="scroll2" data-pagenum="2" class="mui-scroll-wrapper page-more">
                        <div class="mui-scroll">  
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                            <div class="content"></div>
                        </div>
                    </div>
                </div>

                <div id="item3mobile" class="mui-slider-item mui-control-content">
                    <div class="custom-empty mui-text-center" style="display: none">
                        <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
                        <p>抱歉,还没有相关内容</p>
                    </div>
                    <div id="scroll3" data-pagenum="2" class="mui-scroll-wrapper page-more">
                        <div class="mui-scroll">
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                            <div class="content"></div>
                        </div>
                    </div>
                </div>
                <div id="item4mobile" class="mui-slider-item mui-control-content">
                    <div class="custom-empty mui-text-center" style="display: none">
                        <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
                        <p>抱歉,还没有相关内容</p>
                    </div>
                    <div id="scroll4" data-pagenum="2" class="mui-scroll-wrapper page-more" > 
                        <div class="mui-scroll">
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                            <div class="content"></div>
                        </div>
                    </div>
                </div>
                <div id="item5mobile" class="mui-slider-item mui-control-content">
                    <div class="custom-empty mui-text-center" style="display: none">
                        <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
                        <p>抱歉,还没有相关内容</p>
                    </div>
                    <div id="scroll5" data-pagenum="2" class="mui-scroll-wrapper page-more" > 
                        <div class="mui-scroll">
                            <div class="mui-loading">
                                <div class="mui-spinner">
                                </div>
                            </div>
                            <div class="content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script id="goods_tpl" type="text/html">
            {{each d card index}}
                    <div  data-orderno="{{card.orderno}}" class="custom-card-item">
                        <div class="custom-card-header custom-orange text-size-13">
                            <span class="custom-black-2">订单编号：{{card.orderno}}</span>
                            <span class="mui-pull-right">{{card.orderstatus|setOrderState}}</span>
                        </div>
                        
                        <div class="custom-card-content">
                            <ul class="mui-table-view" >
                                {{each card.list cell}}
                                <li data-logistics="{{cell.logistics}}" data-expressid="{{cell.expressid}}" class="mui-table-view-cell">
                                    <div class="mui-slider-handle custom-flex">
                                        <div class="custom-list-box custom-flex">
                                            <img class="custom-list-pic" src="{{cell.cimg_750_1050+zip}}180" width="100%" alt="">
                                            <div class="custom-brand-info">
                                                <div class="custom-flex custom-flex-between">
                                                    <h3 class="text-size-13">{{cell.cname}}</h3>
                                                    <div class="custom-black-2 text-size-13 mui-text-right">
                                                        <span> <small>&yen;</small><span class="monthly-price ">{{cell.cprice}}</span></span>
                                                        <small class="custom-light-gray text-size-13">x{{cell.cnumber}}</small>
                                                        
                                                    </div>
                                                </div>
                                                <p class="custom-light-gray text-size-12">规格：
                                                    {{each cell.l_type type}}
                                                        <span>{{type.list[0]}}</span>
                                                    {{/each}}
                                                </p> 
                                                    {{if cell.state== 1 && cell.confirmorder ==0}}
                                                        {{if card.orderstatus ==3||card.orderstatus ==4}}
                                                            <span class="right-info custom-yellow text-size-13">待发货</span>
                                                        {{/if}}
                                                
                                                    {{else if cell.state == 1 && cell.confirmorder == 1}}
                                                        {{if card.orderstatus ==3||card.orderstatus ==4}}
                                                            <span class="right-info custom-yellow text-size-13">已发货</span>
                                                        {{/if}}
                                                    {{else if cell.state == 10 && cell.confirmorder == 2}}
                                                        {{if card.orderstatus ==3||card.orderstatus ==4}}
                                                            <span class="right-info custom-yellow text-size-13">交易完成</span>
                                                        {{/if}}
                                                    {{/if}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                {{/each}}
                            </ul>
                        </div>
                        <div data-orderno="{{card.orderno}}"  data-orderid="{{card.id}}" class="custom-card-footer">
                            <p class="mui-pull-left text-size-12 custom-black-2">共{{card.allcount}}件商品 <span>合计:<span><small>&yen;</small>{{card.allprice}}</span></span></p>
                           
                            {{if custom_state}}
                                {{include 'otherfoot_tpl'}}
                            {{else}}
                                {{include 'foot_tpl' card}}
                
                            {{/if}}
                        </div>
                    </div> 
            {{/each}}

        </script>

       
    
        <script id="foot_tpl" type="text/html">
            {{if orderstatus==0||custom_state==0}}
                <button class="mui-btn cancleorder-hook custom-radius text-size-13 custom-gray-8">取消订单</button>
                <button class="mui-btn payment-hook mui-btn-warning custom-radius">付款</button>
            
            {{else if orderstatus==1||orderstatus==3||orderstatus==4&&confirmorder==0||custom_state==1}}
                <button class="mui-btn reminder-delivery-hook custom-radius text-size-13 custom-gray-8">提醒发货</button>
            
            {{else if orderstatus==2||custom_state==2}}
                <button class="mui-btn check-logistics-hook custom-radius text-size-13 custom-gray-8">查看物流</button>
                <button class="mui-btn mui-btn-warning mui-btn-outlined custom-radius text-size-13 custom-gray-8">确认收货</button>                
            
            {{else if orderstatus==5}}
                <button class="mui-btn check-logistics-hook custom-radius text-size-13 custom-gray-8">查看物流</button>
            {{/if}}
        </script>

        <script id="otherfoot_tpl" type="text/html">
            {{if custom_state==1}}
                <button class="mui-btn cancleorder-hook custom-radius text-size-13 custom-gray-8">取消订单</button>
                <button class="mui-btn payment-hook mui-btn-warning custom-radius">付款</button>
            
            {{else if custom_state==2}}
                <button class="mui-btn reminder-delivery-hook custom-radius text-size-13 custom-gray-8">提醒发货</button>
            
            {{else if custom_state==3}}
                <button class="mui-btn check-logistics-hook custom-radius text-size-13 custom-gray-8">查看物流</button>
                <button class="mui-btn mui-btn-warning mui-btn-outlined custom-radius text-size-13 custom-gray-8">确认收货</button>                
            
            {{else if custom_state==4}}
                <button class="mui-btn check-logistics-hook custom-radius text-size-13 custom-gray-8">查看物流</button>
                <button class="mui-btn service-hook custom-radius text-size-13 custom-gray-8">申请售后</button>
                
            {{/if}}
        </script>

        <script>
             function setOrderState(status) {
                var format = '';
                switch (status) {
                    case 0:
                        format = "待付款";
                        break;
                    case 1:
                        format = "待发货";
                        break;
                    case 2:
                        format = "待收货";
                        break;
                    case 3:
                        format = "部分发货";
                        break;
                    case 4:
                        format = "部分完成";
                        break;
                    case 5:
                        format = "交易完成";
                        break;
                    case 100:
                        format = "交易关闭";
                        break;
                }
                return format;               
            }
        </script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/myOrder.js" type="text/javascript" charset="utf-8"></script>

    </body>

</html>