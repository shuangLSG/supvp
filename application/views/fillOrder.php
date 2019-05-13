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
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/fillOrder.css" />
    </head>
    <body>
        <div class="mui-scroll-wrapper custom-bg-color-gray mui-content has-foot-bar">
            <div class="mui-scroll">

                <div class="address-box">
                    <!-- 地址为空时显示 -->
                    <div class="empty-address mui-hidden" >
                        <span>您当前未设置收货地址，请前去添加</span>    
                        <img src="<?= base_url() ?>public/images/icons/fillorder.png" alt="">
                    </div>
                    <!-- 地址信息 -->
                    <div id="address"></div>

                    <img src="<?= base_url() ?>public/images/line.png" width="100%"/>
                 </div>

                <div id='goodslist' class="custom-margin-top-20 custom-bg-color-white"></div> 

                <div class="custom-margin-top-20">
                    <ul class="mui-table-view order-spec">
                        <li id="set_coupon" class="mui-table-view-cell">
                            <a href="javascript:;" class="mui-navigate-right">优惠券
                                <span class="mui-pull-right">暂无可用优惠</span>
                            </a>
                        </li>
                        <li class="mui-table-view-cell">
                            <a class="mui-navigate-right">配送
                                <span class="mui-pull-right">快递免邮</span>
                            </a>
                        </li>
                        <li id="set_invoice" class="mui-table-view-cell">
                            <a href="#invoice" class="mui-navigate-right">发票
                                <span class="mui-pull-right">暂未设置</span>
                            </a>
                        </li>
                        <li class="mui-table-view-cell">
                            买家留言
                            <input type="text" placeholder="建议留言前先与客户沟通确认" id="leavemsg">                      
                        </li>
                    </ul>
                </div>
               

                <div class="custom-margin-top-20">
                    <ul class="mui-table-view order-spec" >
                        <li class="mui-table-view-cell">
                            <a class="">商品金额
                                <span id="allprice" class="mui-pull-right font-MarkPro text-size-15"></span>
                            </a>
                        </li>
                        <li class="mui-table-view-cell">
                            <a class="">活动优惠
                                <span id="activity-price" class="mui-pull-right custom-pink font-MarkPro text-size-15">-￥0.00</span>
                            </a>
                        </li>
                    </ul>
                </div>
            
                <div class="custom-margin-top-20 custom-bg-color-white">
                    <div class="custom-card-item">
                        <div class="custom-card-header">
                            支付方式
                        </div>
                        <div class="custom-card-content">
                            <form id="mode_payment" class="mui-input-group text-size-14">
                                <ul class="mui-table-view">
                                    <li id="accordion" class="mui-table-view-cell accordion-box">
                                        <div class="mui-input-row mui-radio custom-flex-c">
                                            <label class="custom-flex custom-flex-vc"><img src="<?= base_url() ?>public/images/icons/fq.png"/>分期支付<small class="text-size-12">(0首付)</small></label>
                                            <input data-mode="amortize" name="radio1" value="Item 4" type="radio" checked>
                                        </div>
                                        <ul class="mui-table-view">
                                            <li class="mui-table-view-cell">
                                                <a href="#amortizePopover" id="amortize" class="mui-navigate-right text-size-14">
                                                    <span class="custom-black-4">0</span> 
                                                    <span class="mui-pull-right">修改分期</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="mui-input-row mui-radio custom-flex-c">
                                    <label class="custom-flex custom-flex-vc"><img src="<?= base_url() ?>public/images/icons/zfb_icon.png"/>支付宝</label>
                                    <input data-mode="Alipay" name="radio1" value="Item 4" type="radio">
                                </div>
                                <div class="mui-input-row mui-radio custom-flex-c">
                                    <label class="custom-flex custom-flex-vc"><img src="<?= base_url() ?>public/images/icons/wx.png"/>微信</label>
                                    <input data-mode="wx" name="radio1" type="radio">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
        
       
        <footer class="mui-bar mui-bar-tab custom-pay-bar">
            <div class="amortize">
                <div class="mui-pull-left">
                    <p class="text-size-13 custom-black-2">月供：
                        <span class="custom-pink"><small>&yen;</small><span class='monthly-pay text-size-20 font-MarkPro'>0</span></span>
                    </p>
                    <p class="text-size-12">合计：
                        <span class="custom-light-gray"><small>&yen;</small><span class='olprice text-size-15'>0</span></span>
                    </p>
                </div>
                <a class="custom-pay-btn mui-pull-right gopay" href="javascript:;">
                    <span>付款</span>
                </a>
            </div>
            <div class="other custom-flex-hbetween mui-hidden">
                <span class="text-size-13">合计：
                    <span class="custom-pink">￥<span class='olprice text-size-20 font-MarkPro'>0</span></span>
                </span>
                <a class="custom-pay-btn gopay" href="javascript:;">
                    <span>付款</span>
                </a>
            </div>
            
        </footer>

         <div id="coupon" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card coupon-box">
                <div class="mui-card-header custom-flex-c">优惠券<i class="mui-icon mui-icon-closeempty"></i></div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                    
                    </div>
                </div>
            </div>
        </div>         
        

        <div id="invoice" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card invoice-box">
                <div class="mui-card-header custom-flex-c">发票<i class="mui-icon mui-icon-closeempty"></i></div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <h3><strong class="custom-black-2 text-size-14">发票类型-电子发票</strong></h3>
                        <div class="invoice-wrapper">
                            <h3><strong class="custom-black-2 text-size-14">发票抬头</strong></h3>
                            <div id="segmentedControl" class="mui-segmented-control">
                                <a class="mui-control-item mui-active" href="#item1">个人</a>
                                <a class="mui-control-item" href="#item2">单位</a>
                            </div>
                            <div>
                                <div id="item1" class="mui-control-content mui-active">
                                    <form class="mui-input-group">
                                        <div class="mui-input-row custom-flex-c text-size-13">
                                            <label>抬头名称:</label>
                                            <input type="text" class="mui-input-clear" placeholder="请输入发票抬头名称">
                                        </div>
                                    </form>
                                    <h3><strong class="custom-black-2 text-size-14">发票内容-商品明细</strong></h3>
                                    <div class="mui-center button-box">
                                        <button type="button" class="mui-btn invoice-btn-hook custom-btn-gradient custom-radius text-size-15">确定</button>
                                    </div>
                                </div>
                                <div id="item2" class="mui-control-content">
                                    <form class="mui-input-group">
                                        <div class="mui-input-row custom-flex-c text-size-13">
                                            <label>抬头名称:</label>
                                            <input type="text" class="mui-input-clear company-rise-hook" placeholder="请输入发票抬头名称">
                                        </div>
                                        <div class="mui-input-row custom-flex-c text-size-13">
                                            <label >税号:</label>
                                            <input type="text" class="mui-input-clear duty-paragrap-hook" placeholder="请输入纳税人识别号">
                                        </div>
                                    </form>
                                    <h3><strong class="custom-black-2 text-size-14">发票内容-商品明细</strong></h3>
                                    <div class="mui-center button-box">
                                        <button type="button" class="mui-btn invoice-btn-hook custom-btn-gradient custom-radius text-size-15">确定</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


        <div id="amortizePopover" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card amortize-box">
                <div class="mui-card-header custom-flex-c">选择分期方式<i class="mui-icon mui-icon-closeempty"></i></div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner ">
                        
                    </div>
                </div>
            </div>
        </div> 

        <script id="address_tpl" type="text/html">
            <ul class="mui-table-view custom-address-info" style="display: block;">
                <li data-id="{{d.id}}" class="mui-table-view-cell">
                    <a class="mui-navigate-right">
                        <div class="custom-list-box custom-flex">
                            <div class="custom-brand-info">
                                <h3>
                                    <strong class="text-size-17">{{d.name}}<span>{{d.phone| phoneFormat}}</span></strong>
                                </h3>
                                <p class="text-size-12 custom-gray-8">{{d.capital+d.city+d.address}}</p>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </script>
        
        <!-- 优惠券 -->
        <script id="coupon_tpl" type="text/html">
            <ul class="mui-table-view mode-2">
                {{each d cell}}
                    <li  class="mui-table-view-cell custom-flex">
                        <div class="mui-input-row  mui-radio">
                            <label data-id="{{cell.id}}"  data-amount="{{cell.amount}}" data-price="{{cell.price}}">
                                <div class="{{cell.isdel==1?'custom-light-gray':''}}">
                                    <h3  class="custom-orange">&yen;<span class="text-size-24">{{cell.price}}</span></h3>
                                    <p><sapn class="custom-orange">满{{cell.amount}}元可用</sapn><small>{{cell.remark}}</small></p>
                                    <p class="custom-light-gray text-size-11">使用期限 {{cell.starttime |dateFormat 'yyyy.MM.dd'}}-{{cell.endtime |dateFormat 'yyyy.MM.dd'}}</p>
                                </div>
                            </label>
                            {{if cell.isdel==1}}
                                <div class="mui-input-right">
                                    <small class="custom-red-e text-size-12">不满足使用条件</small>
                                    <img class="like-radio" src="<?= base_url() ?>public/images/icons/disabled.png" alt="">
                                </div>
                                {{else}}
                                <input name="radio1" value="Item 4" type="radio">
                            {{/if}}
                        </div>
                    </li>
                {{/each}}
            </ul>
        </script>

        <!-- 分期 -->
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

        <script id="goods_tpl" type="text/html">
            <div class="custom-card-item">
                <div class="custom-card-header">
                    官方自营店
                </div>
                <div class="custom-card-content">
                    <ul class="mui-table-view" >
                    {{each d cell}}
                        <li id="history_goods_{{cell.id||cell.commodityid}}" class="mui-table-view-cell">
                            <div class="mui-slider-handle custom-flex">
                                <div class="custom-list-box custom-flex">
                                    <img class="custom-list-pic" src="{{cell.src}}" width="100%" alt="">
                                    <div class="custom-brand-info">
                                        <h3 class="text-size-13 custom-white-space">{{cell.name}}</h3>
                                        <p class="custom-light-gray text-size-12">规格：
                                            {{each cell.l_type type}}
                                                <span>{{type.list[0]}}</span>
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
                                        <p class="custom-pink"><small>&yen;</small><span class="monthly-price text-size-20">{{cell.price}}</span></p>
                                        <small class="right-info text-size-13">x{{cell.cnumber}}</small>
                                    </div>
                                </div>
                            </div>
                        </li>
                    {{/each}}
                    </ul>
                </div>
            </div> 
        </script> 
        
        <script src="<?= base_url() ?>public/js/filter.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/clipboard.min.js"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.3.2.js"></script>
        <script src="<?= base_url() ?>public/js/page/fillOrder.js?t=0.03" type="text/javascript"></script>
    </body>

</html>    