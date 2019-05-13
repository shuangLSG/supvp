$(function () {
    document.title = "我的订单";

    (function (mui, $) {
        // ================================================= 下拉刷新 , 下拉加载===========================================================
     
        var tools = {
            ajaxdata:[], // ajaxdata ：当前order类型的所有数据
            initPage:function(){
                /**页面跳转前记录当前slider位置
                 * gotoItem(index,time) 切换到指定轮播
                 */
                var slider = mui('#slider').slider();
                var item = app.storageFetch('myorder').item;
                slider.gotoItem(item, 100);

                // 解决：第1个 无法监听slider事件
                if (item == 0) {
                    var res = allOrder(0);
                    this.data = res;
                }
            },
            getAjaxData:function(url,pagenum) {
                var data = [],
                    _this = this,
                    item = $('#sliderSegmentedControl a.mui-active').index();//slider索引
                if(!pagenum){
                    data = this.initData(url, item);
                
                }else{
                    setTimeout(function(){
                        data = _this.isMore(url, item,pagenum);
                    },1000)
                }
                return data;
            },
            initData: function (url, item){console.log(url, item)
                $.ajaxSetup({
                    async: false
                });
                var data = {},
                    _this = this;
                $.post(url, {}, function (res) {
    
                    var $parent = $('#item' + (item + 1) + 'mobile'); // slider 
                    if (res.s == 200) {
                        if (res.d.length == 0) {
                            $('.mui-loading').hide();
                            $parent.find('.custom-empty').show();
                            return;
                        }
                        if (item > 0) {
                            // item的作用：设置custom_state：1 ，用以区分[全部]与 其他类型订单的 模版输出
                            var json = _this.setAjaxData(res.d, item.toString());
                        } else {
                            var json = _this.setAjaxData(res.d);
                        }

                        $parent.find('.mui-loading').remove();
                        $parent.find('.mui-scroll .content').html(template('goods_tpl', json));
                   
                        data = json;
                    } else {
                        $parent.find('.custom-empty').show();
                    }
                }, 'json');

                _this.ajaxdata = data.d;// ajaxdata ：当前order类型的所有数据

                return data;
            },
            isMore:function (url, item,pagenum){
                var data = {},
                _this = this;
                $.ajaxSetup({
                    async: false
                });
                $.post(url, {
                    Page:pagenum
                }, function (res) {

                    var $parent = $('#item' + (item + 1) + 'mobile'); // slider 
                    if (res.s == 200) {
                        if (item > 0) {
                            // item的作用：设置custom_state：1 ，用以区分[全部]与 其他类型订单的 模版输出
                            var json = _this.setAjaxData(res.d, item.toString());
                        } else {
                            var json = _this.setAjaxData(res.d);
                        }
    
                        if(pagenum){
                            if (res.d.length == 0) {
                                flag = false;
                            } else {
                                flag = true;
                                $parent.find('.page-more').attr({'data-pagenum':pagenum++,'data-flag':flag});
                            }
        
                            $parent.find('.mui-scroll .content').append(template('goods_tpl', json));
                            mui('#item' + (item + 1) + 'mobile .page-more').pullRefresh().endPullupToRefresh(!flag);
                            
                        }
    
                        data = json;
                        $parent.find('.mui-scroll-wrapper').attr('data-pagenum',pagenum?pagenum++:2);
                    }

                }, 'json');
    
                _this.ajaxdata.push(data.d);

                return data;
            },
            setAjaxData:function (data, orderS) {
                var json = {
                    d: data,
                    zip: zip,
                    custom_state: orderS
                }
                data.forEach(card => {
                    card.list.forEach((item, i) => {
                        item.l_type = setTypeData(item).typeArr;
                    });
                });
    
                return json;
            },
            route: function (url) {
                mui.openWindow({
                    url: url
                });
            }
        }
        tools.initPage();
        
        
       
        

        // 全部
        function allOrder(pagenum) {
            return tools.getAjaxData('../order/getAllOrder', pagenum);
        }
        // 待付款
        function unpaid(pagenum) {
            return tools.getAjaxData('../order/getOrder', pagenum);
        }

        // 待发货
        function shipments(pagenum) {
            return tools.getAjaxData('../order/shipments', pagenum);
        }

        // 待收货
        function waitGoods(pagenum) {
            return tools.getAjaxData('../order/waitGoods', pagenum);
        }

        // 售后
        function afterSale(pagenum) {
            return tools.getAjaxData('../order/Completed', pagenum);
        }


        
        



        mui.init();
        // srcoll
        var scroller = mui('.page-more').scroll({
            indicators: false, //是否显示滚动条
            bounce: false //是否启用回弹
        });


        mui('.mui-scroll').on('tap', 'button', function (e) {
            var target = e.target;
            var classList = target.classList;
            var $cardFoot = $(target).closest('.custom-card-footer'),
                orderno = $cardFoot.attr('data-orderno');


            if (classList.contains('cancleorder-hook')) {
                // 取消订单
                var _this = this;
                mui.confirm('', '确认取消订单吗？', ['取消', '确认'], function (e) {
                    if (e.index == 1) {
                        var card = $(_this).closest('.custom-card-item');
                        deleteOrder(card, orderno);
                    }
                });


            } else if (classList.contains('payment-hook')) {
                // 付款
                tools.route('orderDetail?orderno=' + orderno);

            } else if (classList.contains('reminder-delivery-hook')) {
                // 提醒发货
                mui.toast('已提醒卖家尽快发货')

            } else if (classList.contains('check-logistics-hook')) {
                // 查看物流
                var orderid = $cardFoot.attr('data-orderid'),
                d = tools.ajaxdata;//当前的所有订单
                d.forEach(item=>{
                    if(item.id==orderid){
                        // 本地缓存商品列表
                        app.storageRemove('check_logistics');
                        app.storageSave('check_logistics', {
                            orderno: item.orderno,
                            list: item.list
                        });
                    }
                });
                tools.route('checkLogistics');

            } else if (classList.contains('payment-hook')) {
                // 确认收货
                mui.confirm('', '确认收到货了吗？', ['取消', '确认收货'], function (e) {
                    if (e.index == 1) {
                        confirmOrder(orderno);
                    }
                }); 
            }else if(classList.contains('service-hook')){
                tools.route('JIMChat');
            }
        });


        mui('.mui-scroll').on('tap', 'li', function (e) {
            var target = e.target;
            var orderno = $(target).closest('.custom-card-item').attr('data-orderno');

            tools.route('orderDetail?orderno=' + orderno);
        });


        // =================================================  页面操作 ==============================================
       
        document.querySelector('#slider').addEventListener('slide', function (e) {
             
            var curIndex = e.detail.slideNumber;
            var ajaxFn = [allOrder, unpaid, shipments, waitGoods, afterSale];
            ajaxFn[curIndex]();
            // 监听滑动，记录 子页面的slider位置、数据
            app.storageSave('myorder', {
                item: curIndex,
            });

            // 重新开启上拉加载！！
            var flag =  $('#item' + (curIndex + 1) + 'mobile .page-more').attr('data-flag'); 
            if(flag){
                mui('#item' + (curIndex + 1) + 'mobile .page-more').pullRefresh().refresh(true);
            }
            $('#item' + (curIndex + 1) + 'mobile .page-more').attr('data-pagenum',2)
        });
        
        // ======================================================  删除订单 ===========================================================
        function deleteOrder(cardObj, orderno) {

            $.post('../order/cancelOrder', {
                "orderno": orderno
            }, function (data) {
                if (data.s == 200) {
                    cardObj.remove();
                    mui.toast('取消成功');
                    // scroller.refresh();
                }
            }, 'json');

            
        }

        // ======================================================  确认订单 ===========================================================        

        function confirmOrder(orderno) {
            $.post('../order/confirmOrder', {
                "orderno": orderno
            }, function (data) {
                if (data.s == 200) {
                    mui.toast('确认收货成功', {
                        type: 'div'
                    });
                    setTimeout(function () {
                        location.reload();
                        app.storageSave('myorder', {
                            item: 4
                        });
                    }, 2000)
                }

            }, 'json');
        }
          
        // ============================================================ 下拉刷新,下拉加载 =================================================
      
        mui.each(document.querySelectorAll('.page-more'), function (index, pullRefreshEl) {
            mui(pullRefreshEl).pullRefresh({
                up: {
                    // auto:true,
                    callback: function () {
                        var curIndex = index;
                        var pageNum = $(pullRefreshEl).attr('data-pagenum');
                        var ajaxFn = [allOrder, unpaid, shipments, waitGoods, afterSale];
                        ajaxFn[curIndex](pageNum);
                    }
                }
            });
        });

  

        // ======================================= 解决safari、微信浏览器下拉回弹效果 !!! ======================================
        /*var overscroll = function (el) {
            el.addEventListener('touchstart', function () {
                var top = el.scrollTop,
                    totalScroll = el.scrollHeight,
                    currentScroll = top + el.offsetHeight;
                if (top === 0) {
                    el.scrollTop = 1;
                } else if (currentScroll === totalScroll) {
                    el.scrollTop = top - 1;
                }
            });

            el.addEventListener('touchmove', function (e) {
                if (el.offsetHeight < el.scrollHeight)
                    e._isScroller = true;
            });
        }
        overscroll(document.querySelector('.bounce'));
        document.body.addEventListener('touchmove', function (e) {
            if (e._isScroller)
                return;
            e.preventDefault();
        }, {
            passive: false
        }); //passive 参数不能省略*/


        // ======================================= 工具方法 ======================================



       
    })(mui, jQuery);
})