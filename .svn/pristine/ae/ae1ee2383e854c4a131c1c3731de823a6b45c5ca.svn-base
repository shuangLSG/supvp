$(function () {

    mui.init();

    (function (mui, $) {
        // scroll
        mui('.mui-scroll-wrapper').scroll({
            indicators: false, //是否显示滚动条
            bounce: false //是否启用回弹
        });

        // =========================================================  AJAX  ========================================================
        //  订单详情
        $.post('../order/orderDetail', {
            "orderno": GetQueryString('orderno')
        }, function (data) {
            if (data.s == 200) {
                var msg = data.d[0];

                orderStatus(data);
                return;
            }
        }, 'json');





        // 订单卡片的底部
        function setFooter(data) {
            var html = '';
            if (data.orderstatus == 4) {// 待完成
                data.list.forEach((item, i) => {

                    if (item.state == 1 && item.confirmorder == 1) {
                        html = `<div id="shipped" class="mui-bar mui-bar-tab custom-btn-footer">
                            <button class="mui-btn check-logistics-hook custom-radius text-size-13 custom-gray-8">查看物流</button>
                            <button class="mui-btn mui-btn-warning mui-btn-outlined custom-radius text-size-13 custom-gray-8">确认收货</button>                
                        </div>`;
                    } else if (item.state == 1 && item.confirmorder == 0) {
                        html = `<div id="shipped" class="mui-bar mui-bar-tab custom-btn-footer">
                            <button class="mui-btn reminder-delivery-hook custom-radius text-size-13 custom-gray-8">提醒发货</button>
                        </div>`;
                    }
                });
                $('#footer').html(html);
            }else if(data.orderstatus==100){ // 交易关闭
                $('#footer').hide();
                $('#order_status').remove();
            }
        }


        // 支付方式(分期 ) input默认选中
        function initPayMode(data) {
            if (data.pay_type == 3) {
                var monthlyPay = $('#amortize').attr('data-price');
                $('.monthly-pay').text(monthlyPay);

                $('#accordion ul').removeClass('hide');
                $('footer .amortize').removeClass('mui-hidden').siblings().addClass('mui-hidden');
                $('#accordion input').prop('checked', true);
            } else if (data.pay_type == 2) {
                $('#mode_payment input[data-mode="wx"]').prop('checked', true);
            } else {
                $('#mode_payment input[data-mode="Alipay"]').prop('checked', true);
            }
        }
        /**
         * 付款
         */
        mui('#payment_popover').on('tap', '.mui-icon-closeempty', function (e) {
            var $form = $(this).find('form');
            var $input = $form.find('[type="radio"]:checked');
            var text = $input.prev().html();
            var price = $input.prev().attr('data-price'); // 月供
            // 点击修改分期，根据data-active 设置当前选中的分期
            $('#amortize').find('span:first-child').html(text);
            $('.monthly-pay').text(price);
            mui('#payment_popover').popover('hide');
        });
        // 支付方式选择
        mui('#payment_popover').on('tap', 'input[type="radio"]', function () {
            singleChecked();
        });

        // 点击底部去 [付款]按钮
        mui('footer').on('tap', '.gopay', function (e) {
            // 付款
            var orderno = GetQueryString('orderno');
            var $input = $('#payment_popover').find('[type="radio"]:checked');
            var mode = $input.attr('data-mode');
            var json = {
                orderno:orderno
            }
            if(mode=='wx'){
                wxpay(json);
            }else if(mode=='amortize'){
                var num = $('#amortize').attr('data-num');
                json['allissues']=num;
                addOrderAmortize(json);
            }else if(mode=='Alipay'){
                addOrderZFB(json);
            }
        })
        mui(document).on('tap', 'button', function (e) {
            var $target = e.target;
            var classList = $target.classList;
            var orderno = GetQueryString('orderno');


            if ($target.id == 'cancleorder') {
                // 取消订单
                deleteOrder(orderno, 1);

            }else if (classList.contains('reminder-delivery-hook')) {
                // 提醒发货
                mui.toast('已提醒卖家尽快发货')

            } else if (classList.contains('check-logistics-hook')) {
                // 查看物流
                tools.route('checkLogistics');

            } else if (classList.contains('mui-btn-warning')) {
                // 确认收货
                mui.confirm('', '确认收到货了吗？', ['取消', '确认收货'], function (e) {
                    if (e.index == 1) {
                        confirmOrder(orderno);
                    }
                });
            }else if(classList.contains('service-hook')){
                tools.route('JIMChat');
            }
        })




        function singleChecked() {
            var aRadio = $('#mode_payment input[type="radio"]');
            $.each(aRadio, function (i, item) {
                this.onchange = function () {
                    var mode = this.dataset.mode;
                    var text = $(this).prev().html();

                    if (this.checked && mode == 'amortize') {
                        // 分期
                        var monthlyPay = $('#amortize').attr('data-price');
                        var amortize = $('#amortize').find('span:eq(0)').text();
                        $('.monthly-pay').text(monthlyPay);
                        $('#accordion ul').removeClass('hide');
                        $('footer .amortize').removeClass('mui-hidden').siblings().addClass('mui-hidden');

                        $('#goodslist .custom-card-footer p:last-child span').attr('id', 'pay-mode').html(amortize + '(分期支付)');

                    } else {
                        $('#accordion ul').addClass('hide');
                        $('footer .amortize').addClass('mui-hidden').siblings().removeClass('mui-hidden');

                        if (mode == 'Alipay') {
                            $('#goodslist .custom-card-footer p:last-child span').text('支付宝');
                        } else if (mode == 'wx') {
                            $('#goodslist .custom-card-footer p:last-child span').text('微信');
                        }
                    }
                }
            });
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
                    $('#pay-mode').html('&yen;' + newArr[3].price + 'x' + newArr[3].num + '期(分期支付)');
                    $('#amortizePopover .mui-card-content-inner').html(template('amortize_tpl', res));

                }
            }, 'json');
        }

        /**
         * 分期
         */
        mui('.amortize-box').on('tap', '.mui-icon-closeempty', function (e) {
            var $parent = $(this).closest('.amortize-box');
            var $input = $parent.find('[type="radio"]:checked');
            var num = $input.attr('data-num');
            var text = $input.prev().html();
            var price = $input.prev().attr('data-price'); // 月供
            // 点击修改分期，根据data-active 设置当前选中的分期
            $('#amortize').attr({'data-price':price,'data-num':num}).find('span:first-child').html(text);
            $('#pay-mode').html(text + '(分期支付)');

            $('.monthly-pay').text(price);
            mui('#amortizePopover').popover('hide');
        });
        // 动态计算 订单分期金额
        $('#amortizePopover').on('tap','input',function(){
            var num = this.dataset.num,// 期数
                rate = $('#amortizePopover .content-hd').attr('data-rate'),// 利率
                free = Number($('.custom-btn-footer').attr('data-free')),//免息总金额
                nofree = Number($('.custom-btn-footer').attr('data-nofree'));//不免息总金额
            var installmentprice = free + nofree + nofree*rate*num/12;
            $('#installmentprice .font-MarkPro').html('&yen;'+installmentprice); 
        });











        //======================================================== 根据订单的状态，修改相应内容  ===========================================



        function orderStatus(res) {
            // 商品列表                       
            var data = res.d[0];
            var orderState = data.orderstatus;
            if (orderState != 0) {
                $('#order_status').removeClass('mui-hidden').addClass('custom-flex').find('h3').text(setOrderStatus(orderState));
            }
            var count=0;
            data.list.forEach(item=>{
                if(item.confirmorder>0){
                    count+=1;
                }
            });
            $('#order_status_info').html(template('orderstatus_tpl', {
                d: data,
                count:count
            }));

            $('.order-info .custom-card-content').html(template('orderinfo_tpl', {
                d: data
            }));

            // 待支付商品列表
            var json = {
                d: data,
                zip: zip
            }
            var allprice = 0,
                endPrice = 0,
                free = 0,
                nofree = 0;

            data.list.forEach((item, i) => {
                item.l_type = setTypeData(item).typeArr;

                if(item.freeinterest=='1'){
                    free += item.cnumber * item.cprice;
                }else{
                    nofree += item.cnumber * item.cprice;
                }
            });
            $('#goodslist').html(template('goods_tpl', json));

            // 总金额
            $('#endprice').html('&yen;' + allprice);
            $('.olprice').text(endPrice);
            $('.custom-btn-footer').attr({'data-free':free,'data-nofree':nofree});
            
            setEndPrice();

            initPayMode(data);

            // 部分完成下订单的按钮显示
            $('#footer .mui-bar').html(template('footer_tpl', {
                d: data
            }));
            setFooter(data);

            // 本地缓存商品列表
            app.storageRemove('check_logistics');
            app.storageSave('check_logistics', {
                orderno: data.orderno,
                list: data.list
            });
        }

        function setEndPrice(){
            var allprice=0,// 未优惠前金额
                endPrice=0,// 优惠后金额
                free = Number($('.custom-btn-footer').attr('data-free')),//免息总金额
                nofree = Number($('.custom-btn-footer').attr('data-nofree')),//不免息总金额
                couponprice= Number($('#set_coupon span').attr('data-price'))||0; //使用优惠券金额                
    
             
            // 优惠券使用条件： 1.满足满减条件 --> 2.不免息金额大于优惠金额 --> 3.免息金额大于优惠金额 
            if(nofree >= couponprice){
                nofree = nofree - couponprice;
               
            }else if(free >= couponprice){
                free = free - couponprice;
            }
            
            allprice =  nofree + free; 
            endPrice = allprice - couponprice;

            $('#endprice').html('&yen;' + allprice);
            $('.olprice').text(endPrice);
            $('.custom-btn-footer').attr({'data-free':free,'data-nofree':nofree});

            // 月供
            getAmortize(free,nofree);
        }

        // 设置顶部订单状态
        function setOrderStatus(status) {
            var format = '';
            if (status == 0) {
                format = '未付款';
            } else if (status == 1) {
                format = '支付成功，等待发货';
            } else if (status == 2) {
                format = '已发货';
            } else if (status == 3) {
                format = '部分发货';
            } else if (status == 4) {
                format = '部分完成';
            } else if (status == 5) {
                format = '交易成功';
            }
            return format;
        }


        

        //========================================================== 页面 跳转  =======================================================




        // 商品详情页
        mui('#recommendlist').on('tap', 'li', function (e) {
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
        });
        mui('#goodsList').on('tap', '.mui-table-view-cell', function (e) {
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
        });
        // 查看物流
        mui('#order_status_info').on('tap','.logisticsts-cell',function(){
            tools.route('checkLogistics');
        });

        // ======================================================  确认订单 ===========================================================        

        function confirmOrder(orderno) {
            $.post('../order/confirmOrder', {
                "orderno": orderno
            }, function (data) {
                if (data.s == 200) {

                    mui.toast('已确认收货');
                    setTimeout(function () {
                        tools.route('../supvp/myOrder');
                        app.storageSave('myorder', {
                            item: 0
                        });
                    }, 200);
                }

            }, 'json');
        }


        // ======================================================  删除订单 ===========================================================
        function deleteOrder(orderno, item) {

            $.post('../order/cancelOrder', {
                "orderno": orderno
            }, function (data) {
                if (data.s == 200) {
                    mui.toast('取消成功', {
                        type: 'div'
                    });
                    setTimeout(function () {
                        tools.route('../supvp/myOrder');
                        app.storageSave('myorder', {
                            item: item
                        });
                    }, 300);

                } else {
                    mui.toast('取消失败', {
                        type: 'div'
                    });
                }
            }, 'json');
        }
        // ======================================================  支付 ===========================================================
        /**
         * 微信支付
         */
        function wxpay(json){
            $.post('../supvp/WXPayOrder', json, function (data) {
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
        function addOrderAmortize(json){
            $.post('../supvp/addPayOrder', json, function (res) {
                if (res.s == 200) {
                    tools.route('pays?orderno='+res.d.orderno);
                }else{
                    mui.toast(res.d)
                }
            }, 'json');
        }
        // 支付宝支付
        function addOrderZFB(json){
            $.post('../supvp/H5ZFBPayOrder', json, function (res) {
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
    })(mui, jQuery);
})