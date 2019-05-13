    $(function () {
        document.title = "支付订单";

        

     /*   var spec = '确认要放弃付款';
        mui.confirm(spec, '订单会为您保留，请尽快支付', ['确认离开','继续支付'], function (val) {
            if (val.index == 1) {

            }
        });


       */


        mui.init({
            swipeBack: true //启用右滑关闭功能
        });
        

        (function (mui, $) {
            // srcoll
            mui('.mui-scroll-wrapper').scroll({
                indicators: false //是否显示滚动条
            });


            function initPage() {
                var data = app.storageFetch('needbuy'),            
                    html = '',
                    free = 0,
                    nofree = 0;

                $.each(data, function (k, v) {
                    if (!isNaN(v.cnumber) && !isNaN(v.price)) {
                        if(v.freeinterest=='1'){
                            free += v.cnumber * v.price;
                        }else{
                            nofree += v.cnumber * v.price;
                        }
                    }
                });
                // 在footer中保存 免息、不免息金额
                $('.custom-pay-bar').attr({'data-free':free,'data-nofree':nofree});

                // 设置商品规格
                data.forEach((item, i) => {
                    item.l_type = setTypeData(item).typeArr;
                });
                $('#goodslist').prepend(template('goods_tpl', {
                    d: data
                }));

                // 计算总金额
                setEndPrice();
            }
            initPage();
            getaddress();
            initData();

            

            function initData() {
                var data = app.storageFetch('needbuy');
                // 优惠券
                getCoupon({
                    'list': JSON.stringify(data)
                });
            }

            // 支付方式选择
            mui('#mode_payment').on('tap', 'input[type="radio"]', function () {
                singleChecked();
            });

            // 收货地址页面
            document.querySelector('.address-box').addEventListener('tap', function () {
                tools.route('address?page=fillorder');
            });

            /**
             * 优惠券
             * 1、底部弹框: 点击关闭按钮=> 隐藏弹框
             * 2、使用优惠券： 1.记录该券 (id、满减条件金额、券值金额)  2.计算总金额
             */
            mui('.coupon-box').on('tap', '.mui-icon-closeempty', function (e) {
                var $parent = $(this).closest('.coupon-box'),
                    $input = $parent.find('[type="radio"]:checked'),
                    $label = $input.prev();
                
                if($input.length){

                    var couponprice = Number($label.attr('data-price'))||0,
                        amount = Number($label.attr('data-amount'))||0,
                        couponid = $label.attr('data-id');

                    $('#set_coupon').find('span').addClass('custom-black-2')
                        .attr({'data-amount':amount,'data-price':couponprice})
                        .text('减免' + couponprice + '元').attr('data-id',couponid);
                    
                    

                    $('#activity-price').attr('data-price',couponprice).html('-&yen;'+couponprice);

                    setEndPrice();
                }

                mui('#coupon').popover('hide');
                
            });

            // 总金额计算 = 未优惠前金额 - 优惠券金额
            function setEndPrice(){
                var allprice=0,// 未优惠前金额
                    endPrice=0,// 优惠后金额
                    free = Number($('.custom-pay-bar').attr('data-free')),//免息总金额
                    nofree = Number($('.custom-pay-bar').attr('data-nofree')),//不免息总金额
                    couponprice= Number($('#set_coupon span').attr('data-price'))||0; //使用优惠券金额                
        
                 
                // 优惠券使用条件： 1.满足满减条件 --> 2.不免息金额大于优惠金额 --> 3.免息金额大于优惠金额 
                if(nofree >= couponprice){
                    nofree = nofree - couponprice;
                   
                }else if(free >= couponprice){
                    free = free - couponprice;
                }
                
                allprice =  nofree + free; 
                endPrice = allprice - couponprice;

                $('#allprice').html('&yen;' + allprice);
                $('.olprice').text(endPrice);
                $('.custom-pay-bar').attr({'data-free':free,'data-nofree':nofree});

                // 月供
                getAmortize(free,nofree);
            }

            /**
             * 发票
             * 1、底部弹框
             * 2. 点击[确认] 按钮
             *    1.个人： 
             *    2.单位：
             */
            mui('.invoice-box').on('tap', '.mui-icon-closeempty', function (e) {
                mui('#invoice').popover('hide');
            });
            mui('#invoice').on('tap', '.invoice-btn-hook', function () {
                var $parent = $(this).closest('.mui-control-content'),
                    index = $parent.index(),
                    str = '',
                    flag = true;
                if (index == 0) {
                    var val = $parent.find('input').val();
                    if (val == '') {
                        mui.toast('请填写相关信息');
                        flag = false;
                        return;
                    }
                    str = '个人;' + val;
                } else {
                    var val1 = $parent.find('.company-rise-hook').val(),
                        val2 = $parent.find('.duty-paragrap-hook').val();
                    if (val1 == '' || val2 == '') {
                        mui.toast('请填写相关信息');
                        flag = false;
                        return;
                    }
                    str = '单位;' + val1 + ';' + val2;
                }
                $('#set_invoice').attr('data-invoice', str).find('span').addClass('custom-black-2').text(str.replace(/;/g, '-'));
                mui('#invoice').popover('hide');
            });

            /**
             * 分期
             */
            mui('.amortize-box').on('tap', '.mui-icon-closeempty', function (e) {
                var $parent = $(this).closest('.amortize-box');
                var $input = $parent.find('[type="radio"]:checked');
                var text = $input.prev().html();
                var num = $input.attr('data-num');
                var price = $input.prev().attr('data-price');  // 月供
                // 点击修改分期，根据data-active 设置当前选中的分期(price：分期金额, num：期数)
                $('#amortize').attr({'data-price':price,'data-num':num}).find('span:first-child').html(text);
              
                $('.monthly-pay').text(price);
                mui('#amortizePopover').popover('hide');
            });
            /**
             *  动态计算 订单分期金额
             *  公式：免息 + 不免息 + 不免息*利率*期数/12
             * */
            $('#amortizePopover').on('tap','input',function(){
                var num = this.dataset.num,// 期数
                    rate = $('#amortizePopover .content-hd').attr('data-rate'),// 利率
                    free = Number($('.custom-pay-bar').attr('data-free')),//免息总金额
                    nofree = Number($('.custom-pay-bar').attr('data-nofree'));//不免息总金额
                var installmentprice = free + nofree + nofree*rate*num/12;
                $('#installmentprice .font-MarkPro').html('&yen;'+installmentprice); 
            });


            /**
             * 支付
             * @param {string}  list      商品 (json字符串)
             * @param           couponid  优惠券id
             * @param           addressid 收货地址id
             * @param           invoice   发票 1.个人;(抬头名称)  2.单位;(抬头名称);(税号)  
             * @param           leavemsg  留言 
             * @param           allissues 期数 (分期支付)
             */
            $(document).on('tap', '.gopay', function () {
                var couponid = $('#set_coupon').find('span').attr('data-id'),
                    addressid = $('#address').find('li').attr('data-id'), // 地址id
                    leavemsg = $('#leavemsg').val(), // 留言
                    datas = app.storageFetch('needbuy'),
                    allprice = $('.olprice').text(),
                    invoice = $('#set_invoice').attr('data-invoice'); // 发票
                if (!addressid) {
                    mui.toast('请选择收货地址');
                    return;
                }
                json = {
                    'couponid': couponid||'',
                    'addressid': addressid,
                    'invoice': invoice||'',
                    'leavemsg': leavemsg||'',
                    'list': JSON.stringify(datas)
                };
                
                var $input = $('#mode_payment').find('[type="radio"]:checked');
                var mode = $input.attr('data-mode');

                if(mode=='wx'){
                    wxpay(json);
                
                }else if(mode=='amortize'){
                    var num = $('#amortize').attr('data-num');
                    json['allissues']=num;
                    addOrderAmortize(json);
                
                }else if(mode=='Alipay'){
                    addOrderZFB(json);
                }
            });



            // 选择支付方式 分期支付折叠效果
            function singleChecked() {
                var aRadio = $('#mode_payment input[type="radio"]');
                $.each(aRadio, function (i, item) {
                    this.onchange = function () {
                        var mode = this.dataset.mode;
                        if(this.checked&&mode=='amortize'){
                            // 分期
                            var monthlyPay = $('#amortize').attr('data-price');
                            $('.monthly-pay').text(monthlyPay);
                            
                            $('#accordion ul').removeClass('hide');
                            $('footer .amortize').removeClass('mui-hidden').siblings().addClass('mui-hidden');
                        }else{
                            $('#accordion ul').addClass('hide');
                            $('footer .amortize').addClass('mui-hidden').siblings().removeClass('mui-hidden');
                        }
                    }
                });
            }



             /**
             * 1. 获取本地缓存的地址信息
             * 2. ajax 接口
             */
            function getaddress() {

                var buyaddress = app.storageFetch('buy_address');
                if (buyaddress != '') {
                    $('#address').html(template('address_tpl', {
                        d: buyaddress
                    }));    
                } else {
                    $.post('../address/getaddress', {}, function (res) {
                        if (res.s == 200) {
                            var data = res.d;
                            if (data.length != 0) {
                                $.each(data, function (i, item) {
                                    if (item.isdefault == 1) {
                                        $('#address').html(template('address_tpl', {
                                            d: item
                                        }));
                                    }
                                });
                            }else{
                                $('.empty-address').removeClass('mui-hidden');
                            }
                        }
                    }, 'json');
                }
            }
            /**
             * 1. 获取优惠券
             */
            function getCoupon(json) {
                $.post('../order/getOrderCoupon', json, function (res) {
                    if (res.s == 200) {
                        if (res.d.length != 0) {
                            $('#set_coupon a').attr('href', '#coupon');

                            var data = res.d.list,
                                free = $('.custom-pay-bar').attr('data-free'),
                                nofree =  $('.custom-pay-bar').attr('data-nofree'),
                                allprice = Number(free) + Number(nofree);
                            
                            data.forEach(item=>{
                                // 优惠券使用条件： 1.满足满减条件 --> 2.不免息金额大于优惠金额 --> 3.免息金额大于优惠金额 
                                if(allprice >= item.amount){
                                    if(nofree >= item.price){
                                        nofree = nofree - item.price;
                                    }else if(free >= item.price){
                                        free = free - item.price;
                                    }else{
                                        item['isdel'] =1;
                                    }
                                }else{
                                    item['isdel'] =1;
                                }
                            })
                            $('#coupon .mui-card-content-inner').html(template('coupon_tpl', {
                                d: data
                            }));
                        }
                    }
                }, 'json');
            }
            /**
             * 月供查询
             */
            function getAmortize(free,nofree) {
              
                $.post('../order/getAmortize', {
                    'free': free,
                    'nofree':nofree
                }, function (res) {
                    if (res.s == 200) {
                        $('#amortize').attr('data-iscreat', true);
                        var amortizes = res.d.amortize,
                            newArr = [];
                        Object.keys(amortizes).forEach((item, i) => {
                            newArr.push({
                                num: item,
                                price: amortizes[item]
                            })
                        })
                        res.d.amortizeArr = newArr;
                        $('#amortize').attr({'data-price':newArr[3].price,'data-num':newArr[3].num,}).find('span:first-child').html('&yen;' + newArr[3].price + 'x' + newArr[3].num+'期');
                        $('#amortizePopover .mui-card-content-inner').html(template('amortize_tpl', res));
                        $('.monthly-pay').text(newArr[3].price);
                    }
                }, 'json');
            }

            /**
             * 微信支付
             */
            function wxpay(json){
                
                $.post('../supvp/wxpay', json, function (data) {
                    
                    if (data.s == 200) {
                        var pay = data.d.pay,
                            timeStamp = pay.timeStamp.toString();

                        function onBridgeReady() {
                            WeixinJSBridge.invoke(
                                'getBrandWCPayRequest', {
                                    "appId": pay.appId, //公众号名称，由商户传入     
                                    "timeStamp": timeStamp,
                                    "nonceStr": pay.nonceStr, //随机串     
                                    "package": pay.package,
                                    "signType": pay.signType, //微信签名方式：     
                                    "paySign": pay.paySign //微信签名 
                                },
                                function (res) {
                                   
                                    if (res.err_msg == "get_brand_wcpay_request:ok") {
                                        app.storageRemove('buy_address');//删除临时选中的收货地址
                                        tools.route('pays?orderno='+data.d.orderno)
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
            // 分期支付
            function addOrderAmortize(){
                $.post('../supvp/addOrderPay', json, function (res) {
                    if(res.s==1020){
                        var spec = '您当前余额不足，无法分期支付';
                        mui.confirm(spec, '可选择支付宝或微信支付', ['其他方式支付','去申请额度'], function (val) {
                            if (val.index == 1) {
                                tools.route('limit');
                            }
                        });
                        return;
                    }
                    if (res.s == 200) {
                        app.storageRemove('buy_address');//删除临时选中的收货地址
                        tools.route('pays?orderno='+res.d.orderno);
                    }else{
                        mui.toast(res.d)
                    }
                }, 'json');
                
            }
        

            // 支付宝支付
            function addOrderZFB(){
                $.post('../supvp/webAddOrder', json, function (res) {
                    if (res.s == 200) {
                        var info = res.d.pay.alipay_trade_precreate_response.qr_code;
                        tools.route('qrpay?url='+info);
                        
                    }else{
                        mui.toast(res.d)
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
            // ----------------------------------------------- 工具方法 -------------------------------


        })(mui, jQuery);
    })