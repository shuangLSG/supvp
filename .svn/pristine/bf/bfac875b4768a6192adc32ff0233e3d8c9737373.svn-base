<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>本周待还</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/repaid.css">
    <style>
        .mui-scroll-wrapper{
            bottom:1.7rem;
        }
    </style>
</head>
 
<body class="custom-bg-color-gray mui-ios mui-ios-11 mui-ios-11-0" style="font-size: 12px;">

    
    <div id="pullrefresh" class="mui-scroll-wrapper mui-content bg-white">
        <div class="mui-scroll">
            <div class="top-container custom-flex-c">
                <div class="mui-text-center">
                    <span class="text-size-12 font-light-blue">本周待还金额(元)</span>
                    <h2 id="allPrice" class="font-MarkPro">0</h2>
                    <span class="text-size-12 font-light-blue">剩余<span id="count">0</span>笔</span>
                </div>
            </div>

            <div class="list-container week-repaid">
                <ul class="mui-table-view mode-2 bg-white"></ul>
                
            </div>

            <div class="custom-empty mui-text-center mui-hidden">
                <img src="<?= base_url() ?>public/images/limit/pay_nodata.png" alt="">
                <p class="text-size-15 font-gray">本周不需要还款哦</p>
            </div>
        </div>
    </div>

    <div id="payment-popup" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
        <div class="mui-card stage-box">
            <div class="mui-card-header custom-flex-c"><strong>选择支付方式</strong>
                <img class="mui-icon mui-icon-closeempty" src="<?= base_url() ?>public/images/limit/close.png" alt="">
            </div>
            <div class="mui-card-content">
                <div class="mui-card-content-inner">
                    <div class="content-wrapper">
                        <ul class="mui-table-view mui-text-left">
                            <li class="mui-table-view-cell custom-flex">
                                <div class="mui-input-row  mui-radio">
                                    <label data-id="4" data-price="300">
                                        <img class="state-img" src="<?= base_url() ?>public/images/limit/pay_1.png" alt="">
                                        <span class="text-size-15">支付宝</span>
                                    </label>
                                    <input name="pay" data-mode="Alipay" type="radio" class="mui-text-right" checked>
                                </div>
                            </li>
                            <li class="mui-table-view-cell custom-flex">
                                <div class="mui-input-row  mui-radio">
                                    <label data-id="4" data-price="300">
                                        <img class="state-img" src="<?= base_url() ?>public/images/limit/pay_2.png" alt="">
                                        <span class="text-size-15">微信</span>
                                    </label>
                                    <input name="pay" data-mode="wx" type="radio" class="mui-text-right">
                                </div>
                            </li>
                        </ul>     
                        <button id="payment" class="mui-btn mui-btn-block custom-gradient text-size-15">确认支付</button>                  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pay-bar" class="mui-bar mui-bar-tab action-bar bg-white mui-hidden">
        <div class="mui-checkbox mui-pull-left custom-pay-checkbox custom-flex-c">
            <input id="checkboxAll" class="checkbox-all-hook mui-text-center" name="checkboxAll" type="checkbox">
            <span class="text-size-12">全选</span>
        </div>
        <a href="javascript:;" id="pay" class="custom-pay-btn custom-disable-btn mui-pull-right mui-text-center" href="javascript:;">
            <span class="text-size-16">立即还款</span>
        </a>
        <strong class="pay-total font-blue text-size-15 mui-hidden">¥<span id="monthly-price" class="font-MarkPro">0.00</span></strong>
    </div>


    <script id="list_tpl" type="text/html">
        {{each  d cell}}
            <li class="mui-table-view-cell custom-flex">
                <div class="mui-input-row  mui-checkbox">
                    <label data-id="4" data-orderno="{{cell.orderno}}" data-price="{{cell.principal|numberFormat  cell.rate}}">
                        <div class="custom-pink">
                            <h3 class="font-black"><strong class="text-size-15">¥</strong><span class="text-size-22 font-black font-MarkPro">{{cell.principal|numberFormat  cell.rate}}</span></h3>
                            <p class="date font-gray text-size-13">还款截止日：{{cell.expire}}</p>
                            <p class="font-gray text-size-13">状态：<span class="{{cell.state|setStyle}}">{{cell.state|setState}}</span> </p>
                        </div>
                    </label>
                    {{if cell.state==0||cell.state==-1}}
                    <input name="checkbox1" class="card-single-hook" type="checkbox">
                    {{else}}
                    <img class="state-img" src="<?= base_url() ?>public/images/limit/state.png" alt="">
                    {{/if}}
                </div>
            </li>
        {{/each}}
    </script>


    <script>
        function setState(state){
            var format='';
            switch(state){
                case -1:
                    format="逾期";
                    break;
                case 0:
                    format="待还";
                    break;
                default:
                    format="已还";
                    break;
            }
            return format;
        }
        function numberFormat(val,rate){
            var price=0,val = Number(val)+Number(rate);
            if (val.toString().indexOf(".") != -1 && (val.toString().substring(val.toString().indexOf("."), val.length).length > 3)) {
                price = Math.round(val * 100) / 100;
            } else {
                price = val;
            }
            return price;
        }
        function setStyle(state){
            var style='';
            switch(state){
                case -1:
                    style="font-red";
                    break;
                case 0:
                    style="font-yellow";
                    break;
                default:
                    style="";
                    break;
            }
            return style;
        }
    </script>
    <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
    <script>
       
        $(function () {

            ;(function (mui, $) {

                $.post('../user/instalmentListByWeek', { }, function (res) {
                    if (res.s == 200) {
                        var data = res.d;
                        var count = 0,allprice = 0;
                        if(data.list.length>0){
                            $('.list-container ul').html(template('list_tpl', { d: data.list }));

                            data.list.forEach(item=>{
                                if(item.state==-1||item.state==0){
                                    count+=1;  
                                }
                                allprice+=( numberFormat(item.principal,item.rate));
                            });
                            $('#count').text(count);
                            $('#allPrice').text(allprice);
                            $('#pay-bar').removeClass('mui-hidden');
                        }else{
                            $('.custom-empty').removeClass('mui-hidden');
                            $('#pay-bar').addClass('mui-hidden')
                        }
                    }
                }, 'json');

                // srcoll
                var scroller = mui('.mui-scroll-wrapper').scroll({
                    indicators: false, //是否显示滚动条
                });

                mui('#payment-popup').on('tap', '.mui-icon', function (e) {
                    mui('#payment-popup').popover('hide');
                });

                document.querySelector('#payment').addEventListener('tap',function(e){
                    var price = $('#monthly-price').text();
                        ordernostr='';
                    var aCheckbox = $('.card-single-hook');
                    $.each(aCheckbox, function (k, v) {
                        if (this.checked) {
                            var price = $(v).siblings('label').attr('data-price');
                            var orderno = $(v).siblings('label').attr('data-orderno');
                            ordernostr += orderno+',';
                            
                         
                        }
                    });
                    if(e.target.tagName=='BUTTON'){
                        var $input = $('#payment-popup').find('[type="radio"]:checked');
                        var mode = $input.attr('data-mode');
                        var ordernostr = ordernostr.substr(0,ordernostr.length-1)
                        if(mode=='wx'){
                            WXPayLimit(ordernostr);
                        }else if(mode=='Alipay'){
                            ZFBPayLimit(ordernostr);
                        }
                    }
                });


  

                // ==========================================================  工具方法 ===================================================
                // 计算总金额
                function calprice() {
                    var lastPrice = 0,
                        initPrice = 0,count=0;

                    var aCheckbox = $('.card-single-hook');
                    $.each(aCheckbox, function (k, v) {
                        if (this.checked) {
                            var price = $(v).siblings('label').attr('data-price');
                            lastPrice+= Number(price);
                        }
                    });
                    if(lastPrice){
                        $('#monthly-price').text(lastPrice).parent().removeClass('mui-hidden');
                        $('#pay').attr('href','#payment-popup').removeClass('custom-disable-btn')
                    }else{
                        $('#monthly-price').parent().addClass('mui-hidden');
                        $('#pay').attr('href','javascript:;').addClass('custom-disable-btn')
                    }
                } 
                // 全选checkbox
                mui('.mui-scroll').on('tap', '.checkbox-all-hook', function () {
                    checkAllChecked();
                });
                checkAllChecked();

                // 单个checkbox选中
                mui('.list-container').on('tap', '.card-single-hook', function () {
                    singleChecked();
                });


                function checkAllChecked() {
                    var aCheckAll = $('.checkbox-all-hook');
                    aCheckAll.each(function (i, item) {
                        item.onchange = function () {
                            // 选中全部 checkbox
                            tools.selectAll(item);
                            calprice();
                        }
                    })
                }

                function singleChecked() {
                    var allCheck = $('#checkboxAll');
                    var aCheckbox = $('.list-container ul .card-single-hook');
                    $.each(aCheckbox, function (i, item) {

                        this.onchange = function () {

                            $.each(aCheckbox, function (i, item) {
                                var allCheckNum = $(".list-container  input[name='checkbox1']").length;
                                var checkedNum = $(".list-container input[name='checkbox1']:checked").length;
                                if (allCheckNum == checkedNum) {
                                    allCheck.prop('checked', true)
                                } else {
                                    allCheck.prop('checked', false)
                                }
                            });
                            calprice();

                        }
                    });
                }


                function WXPayLimit(orderno){
                    $.post('../supvp/WXPayLimit', {
                        'orderno': orderno
                    }, function (data) {
                        if (data.s == 200) {
                            timeStamp = data.d.pay.timeStamp.toString();

                            function onBridgeReady() {
                                WeixinJSBridge.invoke(
                                    'getBrandWCPayRequest', {
                                        "appId": data.d.pay.appId, //公众号名称，由商户传入     
                                        "timeStamp": timeStamp,
                                        "nonceStr": data.d.pay.nonceStr, //随机串     
                                        "package": data.d.pay.package,
                                        "signType": data.d.pay.signType, //微信签名方式：     
                                        "paySign": data.d.pay.paySign //微信签名 
                                    },
                                    function (res) {
                                    
                                        if (res.err_msg == "get_brand_wcpay_request:ok") {
                                            location.reload();
                                        } // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。 
                                    }
                                );
                            }
                            if (typeof WeixinJSBridge == "undefined") {
                                if (document.addEventListener) {
                                    document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                                } else if (document.attachEvent) {
                                    document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                                    document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                                }
                            } else {
                                onBridgeReady();
                            }
                        }
                    }, 'json');
                }
                function ZFBPayLimit(orderno){
                    $.post('../supvp/ZFBPayLimit', {
                        'orderno': orderno
                    }, function (res) {
                        if (res.s == 200) {
                            var info = res.d.pay.alipay_trade_precreate_response.qr_code;
                            tools.route('qrpay?url='+info);
                            location.reload();
                        }else{
                            mui.toast(data.d)
                        }
                    }, 'json');
                }
                /**
                 * @param {url} 地址
                 * @param {param} 参数名称key
                 * @return  value  对应参数的vaule
                 */
                function GetQueryString(param, url) {
                    var currentUrl = url || window.location.href; //获取当前链接
                    var arr = currentUrl.split("?"); //分割域名和参数界限
                    if (arr.length > 1) {
                        arr = arr[1].split("&"); //分割参数
                        for (var i = 0; i < arr.length; i++) {
                            var tem = arr[i].split("="); //分割参数名和参数内容
                            if (tem[0] == param) {
                                return tem[1];
                            }
                        }
                        return null;
                    } else {
                        return null;
                    }
                }

                var tools = {
                    route: function (url) {
                        mui.openWindow({
                            url: url
                        });
                    },
                    selectAll: function (selectAll) {
                        console.log(selectAll)
                        var aCheckbox = $('input[type="checkbox"]');
                        for (var i = 0, len = aCheckbox.length; i < len; i++) {
                            aCheckbox[i].checked = selectAll.checked;
                        }
                    },
                    // 检测是否要全选
                    isSelectAll: function () {
                        var isSelected = true; //全选是否会选中
                        var allCheck = $('.checkbox-all-hook');
                        var aCheckbox = $('.card-single-hook');
                        for (var j = 0, len = aCheckbox.length; j < len; j++) {
                            if (aCheckbox[j].checked == false) {
                                isSelected = false;
                                break;
                            }
                        }

                        allCheck.checked = isSelected;
                    },
                }

            })(mui, jQuery);
        })
    </script>


</body>

</html>