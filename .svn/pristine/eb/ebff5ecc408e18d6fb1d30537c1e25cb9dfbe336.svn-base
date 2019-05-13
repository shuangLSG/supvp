$(function () {

    (function (mui, $) {
        document.title = "优惠券";
        
        getCouponData(0,{Page:1,isdel:0},0);
        getCouponData(1,{Page:1,isdel:1},1);

        /**
         * 
         * @param {*} index  索引 
         * @param {*} json   AJAX参数   
         * @param {*} isdel  0：未使用  1.已失效
         */
        function getCouponData(index,json,isdel) {
            $.post('../api/queryCoupon', json, function (res) {

                var data = res.d;
                if (res.s == 200) {
                    var data = res.Conpondata.list;
                 
                    $('#item'+(index+1)+' .mui-scroll').html(template('coupon_tpl', {
                        d: data,
                        isdel:isdel
                    }));
                    if (data.length == 0) {
                        $('#item'+(index+1)).find('.page-nodata').show();
                    }
                }
            }, 'json');
        }
        // service
        function promise(url = '', json = {}) {
            return new Promise((resolve, reject) => {
                $.post(url, json, function (res) {
                    resolve(res);
                }, 'json');
            });
        }
        // ============================================================ 下拉刷新,下拉加载 =================================================
        var page1Num = 2;
        var page2Num = 2;
        mui.each(document.querySelectorAll('.page-more'), function (index, pullRefreshEl) {
            mui(pullRefreshEl).pullRefresh({
                up: {
                    callback: function () {

                        if (index == 0) {
                            promise('../api/queryCoupon', {Page:page1Num,isdel:0}).then((res) => {
                                isMore(res, index,0);
                            })
                        } else {
                            promise('../api/queryCoupon', {Page:page1Num,isdel:1}).then((res) => {
                                isMore(res, index,1)
                            })
                        }
                    }
                }
            });
        });

        function isMore(res, index,isdel) {
            setTimeout(function () {
                if (res.s == 200) {
                    var data = res.Conpondata.list;
                    var flage = true;
                    if (data.dataList.length == 0) {
                        flage = false;
                    } else {
                        flage = true;
                        index == 0 ? page1Num++ : page2Num++
                    }

                    if (data.length) {
                        $('#item'+(index+1)+' .mui-scroll').html(template('coupon_tpl', {
                            d: data,
                            isdel:isdel
                        }));
                    }
                    mui('#item' + (index + 1) + ' .mui-scroll-wrapper').pullRefresh().endPullupToRefresh(!flage);

                } else {
                    mui('#item' + (index + 1) + ' .mui-scroll-wrapper').pullRefresh().endPullUpToRefresh(true);
                }
            }, 1000);
        }

        mui.init({
            swipeBack: true //启用右滑关闭功能
        });
        // srcoll
        mui('.mui-scroll-wrapper').scroll({
            indicators: false //是否显示滚动条
        });

        // 点击优惠券中 [去使用]按钮
        $('#item1').on('tap', 'li button', function () {
            selectCoupon(this);
        });

        function selectCoupon(el){
            var $li = $(el).closest('li');
            var flag = $li.attr('data-from'),
            title = $li.attr('data-title');
            if(flag==0){
                // 首页
                tools.route('index');
            }else if(flag==3){
                // 活动
            }else if(flag==2){
                // 分类
                var id = $li.attr('data-selectid');
                tools.route('brandItem?selectid='+id+'&brandname='+title);
            }else if(flag==1){
                // 品牌
                var id = $li.attr('data-brandids');
                tools.route('brandItem?brandid='+id+'&brandname='+title);
            }
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