$(function () {

    document.title = "购物车";

    mui.init({
        swipeBack: false //启用右滑关闭功能
    });


    (function (mui, $) {
        // srcoll
        mui('#scroll').scroll({
            indicators: false, //是否显示滚动条
            bounce: false
        });
        mui('.mui-numbox').numbox()
        // ==========================================================  AJAX ===============================================


        // 获取购物车数据 
        promise('../car/getCar').then((data) => {
            //  未登录或没有数据的情况下执行操作
            var List = data.d.list;
            if (data.s != '9999' && List.length != 0) {

                List.forEach((item, i) => {
                    item.l_type = setTypeData(item).typeArr;
                });
                data.zip = zip;
                $('#lists-wrapper').html(template('car_tpl', data))


                $('#emptydiv').hide();
                $('#pay-bar, #lists-wrapper').show();
                $('.mui-content').addClass('has-foot-bar');
                // 可编辑
                document.querySelector('#edit').addEventListener('tap', edit, false);
            } else {
                $('#emptydiv').show();
                $('#pay-bar, #lists-wrapper').hide();
                $('.mui-content').removeClass('has-foot-bar');
            }

        });

        promise('../api/getRecommend').then((data) => {
            data.zip = zip;
            $('#recommendlist').html(template('recommend_tpl', data));
        });





        //=================================================== 编辑 ===================================================


        // 减
        $(document).on('tap', '.tep-reduce', function () {
            updateCar(this, -1);
        });
        // 加
        $(document).on('tap', '.tep-plus', function () {
            updateCar(this, 1);
        });

        // 编辑的删除按钮
        $(document).on('tap', '#delete', function () {
            var commodityidArr = [],
                shopidArr = [];
            var aCheckbox = document.getElementsByName('checkbox');
            $.each(aCheckbox, function (k, v) {
                if (this.checked) {
                    var commodityid = $(v).closest('li').attr('id').split('_')[1],
                        shopid = $(v).closest('li').attr('data-shopid');

                    commodityidArr.push(commodityid);
                    shopidArr.push(shopid);
                }
            });

            // 未选中要删除的商品
            if (commodityidArr.length == 0) {
                mui.toast('请选择商品', {
                    type: 'div'
                });
                return;
            }
            mui.confirm('', '确定要删除吗？', ['取消', '确定'], function (e) {
                if (e.index == 1) {
                    if (commodityidArr.length == 1) {
                        // 删除1个
                        deletecar('../car/delCar', {
                            'commodityid': commodityidArr[0],
                            'shopid': shopidArr[0]
                        });
                    } else {
                        // 删除多个
                        deletecar('../car/delCars', {
                            'commodityid': JSON.stringify(commodityidArr),
                            'shopid': JSON.stringify(shopidArr)
                        });
                    }
                }
            });
        });


        function deletecar(url, json) {
            $.ajaxSettings.traditional = true;
            $.post(url, json, function (data) {
                if (data.s == 200) {
                    location.reload();
                }
            }, 'json');
        }

        function updateCar(el, flag) {
            var json = tools.getAjaxParam(el);
            var num = $(el).siblings('input').val();
            var count = Number(num) + flag;
            if (num == 1 && flag == -1) {// 最小为 1
                return;
            }
            if (count == 1 && flag == -1){ 
                $(el).attr('disabled',true);
            }
            if (count == 2 && flag == 1) {
                $('.tep-reduce').removeAttr('disabled');
            }
            json.cnumber = count;
            promise('../car/editcar', json).then((data) => {
                if (data.s == 200) {
                    $(el).siblings('input').val(count);
                    calprice();
                }
            });
        }








        // =================================================== checkobox ===================================================
        var isShow = false;

        function edit() {
            if (isShow) {
                init();
                $('#edit').text('编辑');
                $('#pay-bar').show().siblings('#delete-bar').hide();
            } else {
                init();
                $('#edit').text('完成');
                $('#pay-bar').hide().siblings('#delete-bar').show();
            }
            isShow = !isShow;
        }

        // 支付按钮 状态 是否启用
        function changePayBtnStatus(money) {
            if (money > 0) {
                $('#pay').removeClass('custom-disable-btn');
            } else {
                $('#pay').addClass('custom-disable-btn');
            }
        }
        // 初始化配置
        function init() {
            var aCheckbox = $('.card-single-hook');
            var oCheckAll = $('.checkbox-all-hook');
            $.each(aCheckbox, function (k, v) {
                if (this.checked) {
                    this.checked = false;
                }
            });
            oCheckAll.prop('checked', false);
            changePayBtnStatus(0)
        }
        // 计算总金额
        function calprice() {
            var lastPrice = 0,
                initPrice = 0,count=0;

            var aCheckbox = $('.card-single-hook');
            $.each(aCheckbox, function (k, v) {
                if (this.checked) {
                    var activeprice = $(v).closest('li').attr('data-activeprice');
                    var price = $(v).closest('li').attr('data-price');

                    var num = $(v).closest('li').find('.mui-numbox-input').val();
                    lastPrice += Number(activeprice * num);
                    initPrice += Number(price * num);
                    count+= Number(num);
                }
            });
            lastPrice = numberFormat(lastPrice);
            if (lastPrice > 0) {
                $('#monthly-price').text(lastPrice).attr('data-total', lastPrice);
                $('#total-price').text(initPrice).attr('data-init', initPrice);

            } else {
                $('#monthly-price').text(lastPrice).attr('data-total', '0');
            }
            $('#cart-num').text(count);
            changePayBtnStatus(lastPrice);
        }
        function numberFormat(val){
            var price= 0;
            if (val.toString().indexOf(".") != -1 && (val.toString().substring(val.toString().indexOf("."), val.length).length > 3)) {
                price = Math.round(val * 100) / 100;
            } else {
                price = val;
            }
            return price;
        }



        // 全选checkbox
        mui('.mui-scroll').on('tap', '.checkbox-all-hook', function () {
            checkAllChecked();
        });
        checkAllChecked();

        // 单个checkbox选中
        mui('#lists-wrapper').on('tap', '.card-single-hook', function () {
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
            var allCheck = $('.checkbox-all-hook');
            var aCheckbox = $('#lists-wrapper ul .card-single-hook');
            $.each(aCheckbox, function (i, item) {

                this.onchange = function () {

                    $.each(aCheckbox, function (i, item) {
                        var allCheckNum = $("input[name='checkbox']").length;
                        var checkedNum = $("input[name='checkbox']:checked").length;

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

        // =================================================== 支付-===================================================
        document.querySelector('#pay').addEventListener('tap', function () {
            if (this.classList.contains('custom-disable-btn')) return;

            var carsArr = [];
            var aCheckbox = $('.card-single-hook');
            $.each(aCheckbox, function (k, v) {
                if (this.checked) {

                    var $parent = $(this).closest('.mui-slider-handle'),
                        $typeParent = $parent.find('.l_types_hook'),
                        $numbox = $parent.find('.numbox-wrapper'),
                        id = $numbox.attr('data-id'),
                        count = $numbox.find('input').val(),
                        imgUrl = $parent.find('img').attr('src'),
                        name=$parent.find('h3').text(),
                        price = $parent.find('.monthly-price').text(),
                        free = this.dataset.free;
                    var json = {
                            'id': id,
                            'cnumber': count,
                            'src': imgUrl,
                            'name': name,
                            'price': price,
                            'freeinterest':free
                        };
                    var type={
                            'size':'',
                            'color':'',
                            'network_type':'',
                            'packages':'',
                            'norms':'',
                            'capacity':'',
                            'content':''
                        }
                    $typeParent.find('span').each(function (i, item) {
                        var spec = $(item).attr('data-type'),
                            content = $(item).text();
                        type[spec] = content;
                        
                    });

                    var obj = Object.assign(type, json);
                    carsArr.push(obj);
                }
            });
  
            app.storageRemove('conpon');
            app.storageSave('needbuy', carsArr);
            tools.route('fillOrder');
        });
        // =================================================== 页面跳转 ==============================================
        //底部 a链接
        // 当前页面为选中状态
        activeFoot(1);

        function activeFoot(i) {
            $('footer a').each(function (index, value) {
                var changeImgUrl = this.dataset.url;

                if (index == i) {
                    $('footer a').eq(i).addClass('mui-active').find('img').attr('src', changeImgUrl);
                }
            })
        }

        var pageArr = ['index', 'car', 'limit', 'mine'];
        mui('.mui-bar').on('tap', 'a', function (e) {
            var curPage = this.dataset.index;
            for (let i = 0; i < pageArr.length; i++) {
                if (curPage == i) {
                    tools.route('../supvp/' + pageArr[i])
                }
            }
        });
        // 详情跳转
        mui('#lists-wrapper').on('tap', 'li .custom-list-box', function (e) {
            console.log(e.target)
            var numbox = e.target;
            var li = this.parentNode.parentNode;
            var id = $(this).closest('li').attr('id').split('_')[1];
            if (numbox.classList.contains('numbox-wrapper') || numbox.parentNode.parentNode.classList.contains(
                    'numbox-wrapper'))
                return;

            tools.route('goodsDetail?id=' + id);
            init();
        });
        mui('#recommendlist').on('tap', 'li', function () {
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
            init();
        });

        // =================================================== 工具方法 ===================================================

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
            getAjaxParam: function (obj) {
                var $numbox = $(obj).closest('.numbox-wrapper'),
                    $parent = $(obj).closest('.custom-brand-info'),
                    shopid = $numbox.attr('data-shopid'),
                    id = $numbox.attr('data-id');

                var json = {
                    'commodityid': id,
                    'shopid': shopid
                };

                return json;
            }
        }
    })(mui, jQuery);
})