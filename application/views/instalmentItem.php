<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>账单详情</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/repaid.css">
    <style>
         
         
    </style>
</head>
 
<body class="custom-bg-color-gray mui-ios mui-ios-11 mui-ios-11-0" style="font-size: 12px;">
    <div id="pullrefresh" class="mui-scroll-wrapper mui-content bg-white">
        <div class="mui-scroll instalmentItem">
            <div class="top-container">
                <img src="<?= base_url() ?>public/images/limit/top_bg_1.png" alt="">
                <img src="<?= base_url() ?>public/images/limit/top_bg_2.png" class="shadow" alt="">
                
                <div class="mui-text-left">
                    <span id="date" class="text-size-12 font-light-blue"></span>
                    <h2 id="allPrice" class="font-MarkPro text-size-18">￥<span>0.00</span></h2>
                    <span class="text-size-14 font-light-blue">总计<span id="count">0</span>期，已还<span id="repaid_num"></span>期</span>
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

    <div id="payment" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
        <div class="mui-card stage-box">
            <div class="mui-card-header custom-flex-c"><strong>选择支付方式</strong>
               <div class="icon-box">
                    <img class="mui-icon mui-icon-closeempty" src="<?= base_url() ?>public/images/limit/close.png" alt="">
               </div>
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
                                    <input data-mode="Alipay" name="pay" type="radio" class="mui-text-right" checked>
                                </div>
                            </li>
                            <li class="mui-table-view-cell custom-flex">
                                <div class="mui-input-row  mui-radio">
                                    <label data-id="4" data-price="300">
                                        <img class="state-img" src="<?= base_url() ?>public/images/limit/pay_2.png" alt="">
                                        <span class="text-size-15">微信</span>
                                    </label>
                                    <input data-mode="wx" name="pay" type="radio" class="mui-text-right">
                                </div>
                            </li>
                        </ul>     
                        <button class="mui-btn mui-btn-block custom-gradient text-size-15">确认支付</button>                  
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script id="list_tpl" type="text/html">
        {{each d cell index}}
            <li data-orderno="{{cell.orderno}}" class="mui-table-view-cell custom-flex">
                <div class="mui-input-row  mui-checkbox">
                    <label data-id="4" data-price="{{cell.principal|numberFormat cell.rate}}">
                        <div class="custom-pink">
                            <h3 class="font-black"><span class="font-light-gray text-size-15">第{{index+1}}期</span><strong class="text-size-15">¥</strong><span class="text-size-22 font-black font-MarkPro">{{cell.principal|numberFormat cell.rate}}</span></h3>
                            <p class="date font-gray text-size-13">还款截止日:<span>{{cell.expire|dateFormat}}</span></p>
                            <p class="font-gray text-size-13">状态：<span class="{{cell.state|setStyle}}">{{cell.state|setState}}</span> </p>
                        </div>
                    </label>
                    {{if cell.state==1}}
                        <img class="state-img" src="<?= base_url() ?>public/images/limit/state.png" alt="">
                    {{else}}
                        <a href="#payment" class="mui-btn text-size-14">还款</a>
                    {{/if}}
                </div>
            </li>
        {{/each}}
    </script>


    <script>
        function setState(state){
            var format='';
            switch(state){
                case -1||'-1':
                    format="逾期";
                    break;
                case '0':
                    format="待还";
                    break;
                case '1':
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
                case -1||'-1':
                    style="font-red";
                    break;
                case '0':
                    style="font-yellow";
                    break;
                case '1':
                    style="";
                    break;
            }
            return style;
        }
        function dateFormat(value){
            return value.replace(/-/g,'/');
        }
    </script>
    <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
    <script>
       
        $(function () {

            ;(function (mui, $) {

                initData();


                // srcoll
                var scroller = mui('.mui-scroll-wrapper').scroll({
                    indicators: false, //是否显示滚动条
                });
                mui('.mui-table-view').on('tap', 'a', function (e) {
                    var orderno = $(this).closest('li').attr('data-orderno'),
                        price = $(this).closest('li').attr('data-price');
                    $('#payment').attr({'data-orderno':orderno,'data-price':price});
                });
                mui('#payment').on('tap', '.icon-box', function (e) {
                    mui('#payment').popover('hide');
                });

                document.querySelector('#payment').addEventListener('tap',function(e){
                    var orderno = $('#payment').attr('data-orderno'),
                        price = $('#payment').attr('data-price');
                    if(e.target.tagName=='BUTTON'){
                        var $input = $('#payment').find('[type="radio"]:checked');
                        var mode = $input.attr('data-mode');

                        if(mode=='wx'){
                            WXPayLimit(orderno,price);
                        }else if(mode=='Alipay'){
                            ZFBPayLimit(orderno,price);
                        }
                    }
                });

  

                // ==========================================================  工具方法 ===================================================
                function initData(){
                    var orderno = GetQueryString('orderno'),
                    allprice = GetQueryString('allprice');
                    $('#allPrice span').text(allprice);

                    $.post('../user/instalmentListByListNo', { 
                        'instalmentno':orderno
                    }, function (res) {
                        if (res.s == 200) {
                            var data = res.d;
                            var count = 0,repaidNum = 0;
                            if(data.length>0){

                                data.forEach(item=>{
                                    if(item.state==1){
                                        repaidNum+=1;  
                                    }
                                
                                    count+=1;
                                });
                                $('.list-container ul').html(template('list_tpl', { d: data }));
                                $('#date').text(data[0].ts.substr(0,10).replace(/-/g,'/'));
                                $('#count').text(count).next().text(repaidNum);
                                $('#pay-bar').removeClass('mui-hidden');
                            }else{
                                $('.custom-empty').removeClass('mui-hidden');
                                $('#pay-bar').addClass('mui-hidden')
                            }
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
                                            tools.route('pays')
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
                        }else{
                            mui.toast(data.d)
                        }
                    }, 'json');
                }

                var tools = {
                    route: function (url) {
                        mui.openWindow({
                            url: url
                        });
                    }
                }

            })(mui, jQuery);
        })
    </script>


</body>

</html>