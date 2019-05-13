<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>订单详情</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/orderDetail.css">
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content custom-bg-color-gray has-foot-bar">
            <div class="mui-scroll">
                <!--订单状态--> 
                <div id="order_status" class="mui-hidden custom-refunds-status custom-flex-vc">
                    <h3 class="text-size-18"></h3>
                </div>

                <section>
                    <ul id="order_status_info" class="mui-table-view">
                        
                    </ul>
                </section>

                <div id="goodslist" class="custom-margin-top-20 custom-bg-color-white"></div> 

                <!-- 订单信息 -->
                <section class="order-info custom-card-item custom-margin-top-20 custom-bg-color-white">
                    <div class="custom-card-header text-size-15">订单信息</div>
                    <div class="custom-card-content">
                        
                    </div>
                </section>
            </div>
        </div>
       
        <nav id="footer">
            <div class="mui-bar mui-bar-tab custom-btn-footer">
            </div>
        </nav>

        <div id="amortizePopover" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card amortize-box">
                <div class="mui-card-header custom-flex-c">选择分期方式<i class="mui-icon mui-icon-closeempty"></i></div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner ">
                        
                    </div>
                </div>
            </div>
        </div> 

        <div id="payment_popover" class="mui-popover mui-popover-action mui-popover-bottom custom-popover" style="display: block;">
            <div class="mui-card payment-box">
                <div class="mui-card-header custom-flex-c h-55">
                    支付方式
                    <i class="mui-icon mui-icon-closeempty"></i>
                </div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <div class="custom-card-item">
                            <div class="custom-card-content">
                                <form id="mode_payment" class="mui-input-group text-size-14">
                                    <ul class="mui-table-view">
                                        <li id="accordion" class="mui-table-view-cell accordion-box">
                                            <div class="mui-input-row mui-radio custom-flex-c">
                                                <label class="custom-flex custom-flex-vc"><img src="<?= base_url()?>/public/images/icons/fq.png">分期支付<small class="text-size-12">(0首付)</small></label>
                                                <input data-mode="amortize" name="radio1" value="Item 4" type="radio">
                                            </div>
                                            <ul class="mui-table-view hide">
                                                <li class="mui-table-view-cell">
                                                    <a href="#amortizePopover" id="amortize" class="mui-text-left mui-navigate-right text-size-14" data-iscreat="true" data-price="157.90">
                                                        <span class="custom-black-4">12期</span> 
                                                        <span class="mui-pull-right">修改分期</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="mui-input-row mui-radio custom-flex-c">
                                        <label class="custom-flex custom-flex-vc"><img src="<?= base_url()?>/public/images/icons/zfb_icon.png">支付宝</label>
                                        <input data-mode="Alipay" name="radio1" value="Item 4" type="radio">
                                    </div>
                                    <div class="mui-input-row mui-radio custom-flex-c">
                                        <label class="custom-flex custom-flex-vc"><img src="<?= base_url()?>/public/images/icons/wx.png">微信</label>
                                        <input data-mode="wx" name="radio1" type="radio">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <footer class="mui-bar mui-bar-tab custom-pay-bar">
                            <div class="amortize mui-hidden">
                                <div class="mui-pull-left">
                                    <p class="text-size-13 custom-black-2">月供：
                                        <span class="custom-pink">￥<span class="monthly-pay text-size-20 font-MarkPro">0</span></span>
                                    </p>
                                    <p class="text-size-12">合计：
                                        <span class="custom-light-gray">￥<span class="olprice text-size-15">1579</span></span>
                                    </p>
                                </div>
                                <a class="custom-pay-btn mui-pull-right gopay" href="javascript:;">
                                    <span>付款</span>
                                </a>
                            </div>
                            <div class="other custom-flex-hbetween">
                                <span class="text-size-13">合计：
                                    <span class="custom-pink">￥<span class="olprice text-size-20 font-MarkPro">1579</span></span>
                                </span>
                                <a class="custom-pay-btn gopay" href="javascript:;">
                                    <span>付款</span>
                                </a>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
       


        <script id="orderstatus_tpl" type="text/html">
            {{if d.orderstatus!=0 && d.orderstatus!=100}}
            <li data-orderstatus="{{d.orderstatus}}" class="mui-table-view-cell mui-media logisticsts-cell">
                <a href="javascript:;" class="mui-navigate-right">
                    <img class="mui-media-object mui-pull-left" src="<?= base_url() ?>public/images/icons/order_6.png">
                    <div class="mui-media-body text-size-14 custom-black-4">
                    {{if d.orderstatus==1}}
                        暂无物流消息
                    {{else}}      
                        该订单为{{count}}个包裹。点击查看详情
                        <p class="mui-ellipsis text-size-12 custom-light-gray">{{d.logisticsts}}</p>
                    {{/if}}
                    </div>
                </a>
            </li>            
            {{/if}}

            <li class="mui-table-view-cell mui-media address-info" data-capital="{{d.capital}}" data-city="{{d.city}}" data-address="{{d.address}}">
                <a href="javascript:;">
                    <img class="mui-media-object mui-pull-left" src="<?= base_url() ?>public/images/icons/order_7.png">
                    <div class="mui-media-body text-size-14 custom-black-4">
                        <span>{{d.name}}</span><span>{{d.phone}}</span>
                        <p class="mui-ellipsis text-size-13 custom-light-gray">{{d.capital}}{{d.city}}{{d.address}}</p>
                    </div>
                </a>
            </li>
        </script>

        <script id="orderinfo_tpl" type="text/html">
            <p>订单编号：&nbsp;<span>{{d.orderno}}</span></p>
            <p>创建时间：&nbsp;<span>{{d.ts}}</span></p>
            {{if d.payts && d.orderstatus>0 && d.orderstatus!=100}}
            <p>付款时间：&nbsp;<span>{{d.payts}}</span></p>
            {{/if}}
            {{if d.confirmts && d.orderstatus>=3 && d.orderstatus!=100}}
            <p>发货时间：&nbsp;<span>{{d.confirmts}}</span></p>
            {{/if}}
        </script>

        <script id="goods_tpl" type="text/html">
            <div class="custom-card-item">
                <div class="custom-card-header">
                    {{d.brandname}}
                </div>
                <div class="custom-card-content">
                    <ul class="mui-table-view" >
                    {{each d.list cell}}
                        <li id="history_goods_{{cell.id||cell.commodityid}}" class="mui-table-view-cell">
                            <div class="mui-slider-handle custom-flex">
                                <div class="custom-list-box custom-flex">
                                    <img class="custom-list-pic" src="{{cell.cimg_750_1050+zip}}180" width="100%" alt="">
                                    <div class="custom-brand-info">
                                        <div class="custom-flex custom-flex-between">
                                            <h3 class="text-size-13">{{cell.cname}}</h3>
                                            <div class="custom-black-2 text-size-13 mui-text-right">
                                                <span class="font-MarkPro"> <small>&yen;</small><span class="monthly-price ">{{cell.cprice}}</span></span>
                                                <small class="custom-light-gray text-size-13">x{{cell.cnumber}}</small>
                                                
                                            </div>
                                        </div>
                                        <p class="custom-light-gray text-size-12">规格：
                                            {{each cell.l_type type}}
                                                <span>{{type.list[0]}}</span>
                                            {{/each}}
                                        </p> 

                                        <!-- 单个商品订单按钮状况 -->
                                        <div class="right-info text-size-13">
                                            {{if cell.state== 1 && cell.confirmorder ==0}}
                                                {{if d.orderstatus ==3||d.orderstatus ==4}}
                                                    <span>待发货</span>
                                                {{/if}}
                                                <button class="mui-btn reminder-delivery-hook custom-radius text-size-13 custom-gray-8">提醒发货</button>
                                            
                                            {{else if cell.state == 1 && cell.confirmorder == 1}}
                                                {{if d.orderstatus ==3||d.orderstatus ==4}}
                                                    <span>已发货</span>
                                                {{/if}}
                                                <button class="mui-btn mui-btn-warning mui-btn-outlined custom-radius text-size-13 custom-gray-8">确认收货</button>
                                            
                                            {{else if cell.state==10 && cell.confirmorder==2}}
                                                <button class="mui-btn service-hook custom-radius text-size-13 custom-gray-8">申请售后</button>
                                            {{/if}}
                                        </div>                           
                                    </div>
                                </div>
                            </div>
                        </li>
                    {{/each}}
                    </ul>
                </div>
                <div class="custom-card-footer">
                    <p class="text-size-13 custom-black-2">优惠
                        <span class="mui-pull-right">-<small class="text-size-14 font-MarkPro" id="discount">&yen;{{d.discounts}}</small></span>
                    </p>
                    <p class="text-size-13 custom-black-2">实付金额
                        <span class="mui-pull-right">
                           <small id="endprice" class="text-size-14 font-MarkPro" >&yen;0</small>
                        </span>
                    </p>
                    <p class="text-size-13 custom-black-2">支付方式
                        {{if d.pay_type==3}}
                            <span id="pay-mode" class="mui-pull-right">&yen;{{d.amortize}}x{{d.allissues}}期(分期支付)</span>
                        {{else}}
                            <span class="mui-pull-right">{{d.pay_type|setPayType}}</span>
                        {{/if}}
                    </p>
                </div>
            </div> 
        </script>     

       

            
            <!-- 等待付款 -->
            <!-- 等待发货 -->
            <!-- 已发货 -->
            <!-- 部分完成 -->
            <!-- 交易成功 -->
            
        <script id="footer_tpl" type="text/html">
            {{if d.orderstatus==0}}
                <button id="cancleorder" class="mui-btn custom-radius text-size-13 custom-gray-8">取消订单</button>
                <a id="payment" href="#payment_popover" class="mui-btn mui-btn-warning custom-radius">付款</a>
            
            {{else if d.orderstatus==1||d.orderstatus==3}}
                <button class="mui-btn reminder-delivery-hook custom-radius text-size-13 custom-gray-8">提醒发货</button>
            
            {{else if d.orderstatus==2}}
                <button class="mui-btn check-logistics-hook custom-radius text-size-13 custom-gray-8">查看物流</button>
                <button class="mui-btn mui-btn-warning mui-btn-outlined custom-radius text-size-13 custom-gray-8">确认收货</button>                
            
            {{else if d.orderstatus==5}}
                <button class="mui-btn check-logistics-hook custom-radius text-size-13 custom-gray-8">查看物流</button>
            {{/if}}
        </script>


        <!-- 分期 -->
        <!-- <script id="amortize_tpl" type="text/html">
            <div class="content-hd text-size-14 custom-bg-color-white">
                <p class="custom-black-2 custom-flex-hbetween"><span>当前可用分期额度:</span><span class="font-MarkPro text-size-15 custom-black-4">&yen;{{d.balancelimit}}</span></p>
                <p id="installmentprice" class="custom-black-2 custom-flex-hbetween"><span>订单分期金额:</span><span class="font-MarkPro text-size-15 custom-black-4">&yen;{{d.installmentprice}}</span></p>
            </div>
            <div class="content-bd custom-card-content custom-margin-top-20">
                <form class="mui-input-group text-size-14">
                    {{each d.amortizeArr cell i}}
                    <div class="mui-input-row mui-radio custom-flex-c">
                        <label data-price="{{cell.price}}" class="custom-flex custom-flex-vc text-size-14 custom-black-4">&yen;{{cell.price}}</span>&nbsp;x&nbsp;{{cell.num}}期 </label>
                        <input name="radio1" type="radio" checked="{{i==3?true:''}}">
                    </div>
                    {{/each}}
                </form>
            </div>
        </script> -->
        <script id="amortize_tpl" type="text/html">
            <div class="content-hd text-size-14 custom-bg-color-white" data-rate="{{d.rate}}">
                <p class="custom-black-2 custom-flex-hbetween"><span>当前可用分期额度:</span><span class="font-MarkPro text-size-15 custom-black-4">&yen;{{d.balancelimit}}</span></p>
                <p id="installmentprice" class="custom-black-2 custom-flex-hbetween"><span>订单分期金额:</span><span class="font-MarkPro text-size-15 custom-black-4">&yen;{{d.installmentprice}}</span></p>
            </div>
            <div class="content-bd custom-card-content custom-margin-top-20">
                <form class="mui-input-group text-size-14">
                    {{each d.amortizeArr cell i}}
                    <div class="mui-input-row mui-radio custom-flex-c">
                        <label data-price="{{cell.price}}" class="custom-flex custom-flex-vc text-size-14 custom-black-4">&yen;{{cell.price}}</span>&nbsp;x&nbsp;{{cell.num}}期 </label>
                        <input data-num="{{cell.num}}" name="radio1" type="radio" checked="{{i==3?true:''}}">
                    </div>
                    {{/each}}
                </form>
            </div>
        </script>
        <script>
            function setPayType(payType) {
                var format = '';
                switch (payType) {
                    case '1':
                        format = "支付宝";
                        break;
                    case '2':
                        format = "微信";
                        break;
                    case '3':
                        format = "分期";
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
        <script src="<?= base_url() ?>public/js/page/orderDetail.js" type="text/javascript" charset="utf-8"></script>
    </body>

</html>