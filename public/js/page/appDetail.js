// (判断Android 或 ios)
function isAndroid_ios() {
    var u = navigator.userAgent,
        app = navigator.appVersion;
    var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器  
    var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端  
    return isAndroid == true ? true : false;
}
// app点击加入购物车。。
function Callback(str) {

    toAppData();
    
    var isShow = $('#goodsdetail').hasClass('mui-active');
    if (!isShow) {
        mui('#goodsdetail').popover('show');
    }
}

// app 获取优惠券
function getUserId(id){
    // 优惠券
    getCouponByuser(id);
}


function getCouponByuser(useInfoid){
    var id = GetQueryString('id');
    
    $.post('../api/getCommodityCoupons', {
        'id': id,
        'userinfoid': useInfoid || ''
    }, function (res) {
        var msg = res.d;
        if (msg.coupon.length > 0) {
            showCoupon(msg.coupon);
            $('#coupon').attr('data-rid',useInfoid);
        } else {
            $('#openCouponPopover').attr('href', 'javascript:;');
        }
    }, 'json');
}
function showCoupon(data) {
    $('#coupon .mui-card-content-inner').html(template('coupon_tpl', {
        d: data
    }));
    var html = '';
    data.forEach((item, i) => {
        html += `<span class="mui-badge-warning mui-badge-outlined text-size-12">满${item.amount}-${item.price}</span>`
    });
    $('.preferential-box').html(html);
}


function toAppData(obj, type) {
    var alltype = JSON.parse($('#openTypePopover').attr('data-alltype'));
    var cnumber = mui('.mui-numbox').numbox().getValue();

    // 点击tab，替换该规格的值，并更新cell上的自定义属性
    if (obj && type == 'li') {
        var spec = $(obj).closest('ul').attr('data-type');
        alltype[spec] = $(obj).text();
        $('#openTypePopover').attr('data-alltype', JSON.stringify(alltype));
    }

    if (obj && type == 'numbox') {
        var classes = obj.classList;
        if (classes.contains('tep-reduce') && cnumber == 1) {
            cnumber = 1
        }
    }

    alltype['cnumber'] = cnumber;

    var isShow = $('#goodsdetail').hasClass('mui-active');

    console.log(alltype);console.log(isShow)
    
    if (isAndroid_ios()) {
        window.javaScriptInterface.selectSpecification(JSON.stringify(alltype),isShow);
    } else {
        console.log(alltype);
        selectSpecification(JSON.stringify(alltype),isShow);
    }
}
$(function () {
    document.title = "详情";
    mui.init();

    (function (mui, $) {

        // ======================================================= AJAX ================================================
        // 该商品详情
        function getdata() {

            $.ajaxSetup({
                async: false
            });


            var id = GetQueryString('id');
            var useInfoid = $('#useInfo').text();
            $.post('../api/getGoodsById', {
                'id': id,
            }, function (data) {

                if (data.s == 200) {
                    var msg = data.detail;
                    // 轮播图
                    $('#bannerSlider').html(template('banner_tpl', {
                        d: msg.imgs,
                        zip: zip
                    }));

                    goodsDetail(msg.item[0], msg.amortize);

                    // 秒杀
                    if (msg.seckill.length != 0) {
                        $('.introduce').before(template('skill_tpl', {
                            d: msg.seckill
                        }));
                        // 倒计时                        
                        var starttime = msg.seckill.starttime * 1000; //2019/3/1 18:29:12
                        var endtime = msg.seckill.endtime * 1000; //2019/4/30 18:29:10
                        setLeftTime(starttime, endtime, timer);
                        var timer = setInterval(function () {
                            setLeftTime(starttime, endtime, timer, function () {
                                $('.introduce').remove();
                            });
                        }, 1000);
                    }

                    // 大家都在看
                    $('#sliderSegmentedControl .mui-scroll').html(template('slider_tpl', {
                        d: msg.list,
                        zip: zip
                    }));
                    // 分期
                    var amortize = [];
                    Object.keys(msg.amortize).forEach((item, i) => {
                        amortize.push({
                            num: item,
                            price: msg.amortize[item]
                        })
                    })
                    $('.stage-spec .monthly-price').text(msg.amortize[12]);
                    $('#stage .content-wrapper').html(template('stage_tpl', {
                        d: amortize
                    }));

                }
            }, 'json');

        }
        getdata();



        // slider 图片轮播 banner
        var gallery = mui('#bannerSlider');
        gallery.slider({
            interval: 4000 //自动轮播周期，若为0则不自动播放，默认为0；
        });



        // ================================================== 逻辑操作 ==============================================
        /**
         * 分期
         * 1、底部弹框
         */
        mui('.stage-box').on('tap', '.mui-icon', function (e) {
            mui('#stage').popover('hide');
        });


        /**
         * 优惠券
         * 1、底部弹框
         * 2、领取优惠券 
         */
        mui('.coupon-box').on('tap', '.mui-icon', function (e) {
            mui('#coupon').popover('hide');
        });
        $('#coupon').on('tap', 'li button', function () {

            if (isAndroid_ios()) {
                window.javaScriptInterface.isAppLogin();
            } else {
                isAppLogin();
            }
            var id = $(this).closest('li').attr('data-id');
            var _this = $(this),
                userinfoid = $('#coupon').attr('data-rid');
            $.post('../api/getCoupons', {
                'id': id,
                'userinfoid':userinfoid
            }, function (data) {
                if (data.s == 200) {
                    $(this).parent().addClass('custom-light-gray');
                    _this.addClass('custom-bg-light-gray').removeClass('custom-btn-gradient').attr('disabled', true).text('已领取');
                }else{
                    mui.toast(data.d);
                }
            }, 'json');
        });



 

        // ====================================================  h5 与 APP 交互 =======================================================

        

        // 点击cell显示规格弹框
        $('#openTypePopover').on('click', function () {
            initTypePopover('#goodsdetail', function () {

                toAppData();

                mui('#goodsdetail').popover('show');
            });
        });
        var page = app.storageFetch('page').page;
        if (page && page == 'sizeTable') {
            mui('#goodsdetail').popover('show');
            app.storageRemove('page')
        }

        $('.goodstype-box').off('click').on('click', function (e) {
            var classes = e.target.classList;
            var target = e.target;
            var parent = e.target.parentNode;
            var $popover = $(this).closest('.mui-popover'); // 两个弹框  1.加入购物车、立即支付  2.确定
            var popoverid = $popover.attr('id');

            // [关闭]按钮
            if (classes.contains('mui-icon')) {
                // 将商品类型选择 展示在 cell
                recordPopover($popover);

                // Android /ios交互
                toAppData();

                // 关闭
                mui('.mui-popover').popover('hide');
                var num = $popover.find('.mui-numbox input').val();
                mui('.mui-numbox').numbox().setValue(num);

            }
            // 数字输入框
            if (classes.contains('tep-plus') || classes.contains('tep-reduce')) {

                toAppData(target, 'numbox');

            }
        });

        // 点击每个具体规格中的tab,并更新alltype属性的值
        mui('.goodstype-box').on('tap', 'li', function (e) {

            tab(this);
            toAppData(this, 'li');
        });




        // 查看更多
        $(document).on('tap', '#seeMore', function () {
            var selectid = this.dataset.selectid;
            var selectionname = this.dataset.selectionname;
            if (isAndroid_ios()) {
                window.javaScriptInterface.gotoBrand(selectid, selectionname);
            } else {
                gotoBrand(selectid, selectionname);
            }
        });

        // 商品详情页             
        mui('.mui-slider').on('tap', '.mui-control-item', function (e) {
            var id = this.id.split('_')[1];
            tools.route('appDetail?id=' + id);
        });
        // 尺码表
        if ($('#sizetable_link').length > 0) {
            document.querySelector('#sizetable_link').addEventListener('tap', function () {
                var url = this.dataset.url;
                if (isAndroid_ios()) {
                    window.javaScriptInterface.linkToSizetable(true);
                } else {
                    linkToSizetable(true);
                }
                tools.route('../supvp/sizeTable?url=' + url);
            });
        }
        mui('.sizetable-box').on('tap', '.mui-icon', function (e) {
            mui('#sizetable').popover('hide');
        });

       


        // ==================================================== 工具方法 =======================================================



        /**
         * 选择商品规格信息
         * 1、弹出底部弹框前，将cell上的值对应弹框中值，展示选中效果
         */
        function initTypePopover(popover, callback) {
            recordCell(popover);
            callback();
        }

        // 根据列表中的值 对应 弹框中不同规格的选中值
        function recordCell(popover) {
            $('.allSelect-box strong').each(function (i, item) {
                var index = Number(item.dataset.index);
                var $selects = $(popover).find('.goods-info-item');
                $selects.eq(i).find('li').eq(index).addClass('active').siblings().removeClass('active');
            });
        }

        // 弹框中选中的值 ，显示在cell上
        function recordPopover(popover) {
            var selected = [];
            var ali = $(popover).find('.right-content li');
            ali.each(function (i, item) {
                if (item.classList.contains('active')) {
                    var index = $(item).index();
                    var spec = $(this).closest('ul').attr('data-type');

                    selected.push({
                        'index': index,
                        'spec': spec,
                        'name': $(item).text()
                    });
                }
            });
            creatSelectedDetail(selected);
        }


        // 列表：生成选择的内容
        function creatSelectedDetail(data) {
            var html = '';
            data.forEach((item, i) => {
                html += `<strong data-index="${item.index}" data-spec="${item.spec}">${item.name}</strong>`
            })
            $('.allSelect-box').html(html);
        }

        //  商品详情
        function goodsDetail(data, amortize) {
            // 价格
            $('#goodsprice')
                .text(data.activity_price)
                .attr('data-price', data.activity_price)
                .next().html(`&yen;${data.price}`);

            // 名称
            $('#goodsname').find('strong').text(data.name).end().find('p').text(data.title);

            // 规格
            creatGoodsType(data, amortize);



            // 查看更多 设置selectid
            $('#seeMore').attr({
                'data-selectid': data.selection1,
                'data-selectionname': data.selectionname
            });

            //商品信息
            $('#detail .detail-spec').html(data.cinfo);
            if (data.details) {
                $('#detail .detail-img').append(data.details);
            }


        }




        /**
         * 1. 规格中 有且仅有一个，则默认选中
         * 2. 规格全部选中才可进行 [加入购物车][立即购买] 的操作，否则提示“请输入...(具体所缺规格类型)”
         */
        function creatGoodsType(data, amortize) {
            // 当前商品规格、颜色等详情
            var type = setTypeData(data);
            var json = {
                url: data.img_750_1050,
                price: amortize[12],
                activity_price: data.activity_price,
                total: data.total,
                type: type.typeArr
            }

            // 记录商品规格是否全部选中
            var typeObj = {},
                selected = [],
                flag = true;
            type.typeArr.forEach((item, i) => {
                if (item.list.length == 1) {
                    typeObj[item.spec] = item.list[0];
                } else {
                    typeObj[item.spec] = '';
                }
            });
            console.log(typeObj);
            $('#openTypePopover').attr('data-alltype', JSON.stringify(typeObj));

            // 默认规格
            cellDefaultType(typeObj);

            $('#goodsdetail .goodstype-box').html(template('goodstype_tpl', {
                d: json,
                zip: zip,
                size_img: data.size_img
            }));
            $('#goodstype_pay .goodstype-box').html(template('goodstype_tpl', {
                d: json,
                zip: zip,
                ispay: 1,
                size_img: data.size_img
            }));


        }

        function cellDefaultType(typeObj) {
            var selected = [],
                flag = true;
            // 每个规格有且仅有一个时，才在cell上显示默认值
            for (var key in typeObj) {
                if (typeObj[key] == '') {
                    flag = false;
                    return;
                }

                selected.push({
                    'index': 0,
                    'spec': key,
                    'name': typeObj[key]
                });
            }
            if (flag) {
                creatSelectedDetail(selected);
                $('#openTypePopover').attr('data-isdefault', true);
            }

        }

        


        /**
         * 秒杀倒计时
         * @param times 指的是时间开始时间或结束时间，
         * @param nowTime 只的是当前的时间
         */
        // var end_time= new Date(new Date().setHours(23, 59, 59, 999)).getTime()+1;
        function lastTime(times, nowTime) {
            var leftTime = (times - nowTime);
            var day = Math.floor(leftTime / (1000 * 60 * 60 * 24));
            var hour = Math.floor(leftTime / (1000 * 3600)) - (day * 24);
            var minute = Math.floor(leftTime / (1000 * 60)) - (day * 24 * 60) - (hour * 60);
            var second = Math.floor(leftTime / (1000)) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);

            if(day){
                $('#countDownTime').html('<strong>'+day+'<span>天</span></strong><div class="time"><span>'+(hour<10?"0"+hour:hour)+'</span><small>:</small><span>'+(minute<10?"0"+minute:minute)+'</span><small>:</small><span>'+(second<10?"0"+second:second)+'</span></div>')
            }else{
                $('#countDownTime').html('<div class="time"><span>'+(hour<10?"0"+hour:hour)+'</span><small>:</small><span>'+(minute<10?"0"+minute:minute)+'</span><small>:</small><span>'+(second<10?"0"+second:second)+'</span></div>')
            }
        }

        function setLeftTime(start_time, end_time, timer, callback) {
            var now_Time = new Date().getTime();
            if (now_Time < start_time) {
                //当现在的时间小于开始的时间 ("距离抽奖还有")
                lastTime(start_time, now_Time);
            } else if (now_Time < end_time) {
                //当现在的时间大于开始的时间小于现在结尾的时间("距离抽奖结束还有")
                lastTime(end_time, now_Time)
            } else {
                //当现在的时间大于结束的时间，说明活动结束。("敬请期待")
                lastTime(now_Time, now_Time);
                clearInterval(timer);
                callback();
            }
        }

        


        // 商品规格类型
        function setTypeData(data) {
            var typeArr = [];
            if (data.color) {
                var colors = data.color.split(',');
                typeArr.push({
                    name: '颜色',
                    spec: 'color',
                    list: colors
                })
            }
            if (data.size) {
                var sizes = data.size.split(',');
                typeArr.push({
                    name: '尺码',
                    spec: 'size',
                    list: sizes
                })
            }
            if (data.network_type) {
                var network_types = data.network_type.split(',');
                typeArr.push({
                    name: '网络类型',
                    spec: 'network_type',
                    list: network_types
                })
            }
            if (data.packages) {
                var packageArr = data.packages.split(',');
                typeArr.push({
                    name: '套餐',
                    spec: 'packages',
                    list: packageArr
                })
            }
            if (data.norms) {
                var normses = data.norms.split(',');
                typeArr.push({
                    name: '规格',
                    spec: 'norms',
                    list: normses
                })
            }
            if (data.capacity) {
                var capacities = data.capacity.split(',')
                typeArr.push({
                    name: '容量',
                    spec: 'capacity',
                    list: capacities
                })
            }
            if (data.content) {
                var content = data.content.split(',');
                typeArr.push({
                    name: '含量',
                    spec: 'content',
                    list: content
                })
            }
            return {
                typeArr
            };
        }




        function tab(tab) {
            var targetTab = tab;
            if (!targetTab) {
                return;
            }
            var activeTab;
            var className = 'active';
            var CLASS_TAB_ITEM = "custom-tab-item";
            var classSelector = '.' + className;
            var segmentedControl = targetTab.parentNode;

            // 添加 .active 类名
            activeTab = segmentedControl.querySelector(classSelector + '.' +
                CLASS_TAB_ITEM);
            if (activeTab) {
                activeTab.classList.remove(className);
            }
            targetTab.classList.add(className);
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
// toAppData();