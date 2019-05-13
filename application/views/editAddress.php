<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.picker.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.poppicker.css" />

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>

            /*页面style*/
            html,
            body {
                height: 100%;
            }

            input::-webkit-input-placeholder {
                color: #d0cfd5;
            }
            /*// 列表*/
            .mui-page li, 
            .mui-input-group .mui-input-row {
                height: 1.3rem;
            }

            .mui-input-row label {
                width: 26%;
                color: #000;
                padding: 0.44rem  0 0.44rem 0.48rem;
            }
            .mui-page li,
            .mui-input-row label,
            .mui-input-row label~input {
                font-size: 0.4rem !important;
            }

            .mui-input-row label~input {
                width: 74%;
                height: 1.3rem;
            }
            .mui-page li{
                padding: 0.4rem 0.48rem;
            }
            .default-address {
                height: 1.06rem;
                line-height: 1.06rem;
                color: #9a9a9a;
                margin-left: 0.4rem;
            }

            .default-address.mui-checkbox input[type=checkbox]:before {
                font-size: 0.6rem;
            }
            .mui-input-row label~input {
                width: 74%;
                height: 1.3rem;
            }
            .default-address{
                line-height: 1.3rem;
                color:#222;
            }

            .mui-checkbox input[type=checkbox] {
                position: absolute;
                top: 0.4rem;
            }

            .add-address{
                height: 1.12rem;
                padding:0;
                color:#fff !important;
                background-color: transparent;
                background: -webkit-linear-gradient(left, #F85921 , #FFA200);
                background: -o-linear-gradient(right, #F85921 , #FFA200);
                background: linear-gradient(to right, #F85921 , #FFA200);
                border:none;
            }

            .btn-wrapper{
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 1.6rem;
                padding: 0 0.4rem;
                z-index: 2;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">
        <form class="mui-input-group fill-in-address">
            <div class="mui-input-row">
                <label>收件人</label>
                <input type="text" id="username" placeholder="请输入收货人姓名">
            </div>
            <div class="mui-input-row">
                <label>手机号</label>
                <input type="text" id="phone" placeholder="请输入收货人手机号">
            </div>
            <div id="showCityPicker2" class="mui-input-row">
                <label>省市区</label>
                <input type="text" id="address" placeholder="请选择地址">
            </div>
            <div class="mui-input-row">
                <label>详细地址</label>
                <input type="text" id="detailAddress" placeholder="请输入详细地址">
            </div>
            <div class="mui-input-row mui-checkbox default-address">
                <span class="text-size-14">设置为默认地址</span> 
                <input name="checkbox" type="checkbox" style="display: inline-block;">
            </div>
        </form>
       
        <div class="btn-wrapper">
            <button id="save" class="mui-btn mui-btn-block custom-radius add-address text-size-15">保存</button>
        </div>
 


        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <!--<script src="<?= base_url() ?>public/js/mui.view.js "></script>-->

        <script src="<?= base_url() ?>public/js/city.js"></script>
        <script src="<?= base_url() ?>public/js/mui.picker.js"></script>
        <script src="<?= base_url() ?>public/js/mui.poppicker.js"></script>
        <script>
            $(function () {

                document.title = "修改收货地址";
                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });
                mui('.mui-scroll-wrapper').scroll({
                    indicators: false, //是否显示滚动条
                });

                // 在android中键盘弹出和收起会改变window的高度，因此监听window的resize。
                var clientHeight = document.documentElement.clientHeight || document.body.clientHeight;
                $(window).on('resize', function () {
                    var nowClientHeight = document.documentElement.clientHeight || document.body.clientHeight;
                    if (clientHeight > nowClientHeight) {
                            //软键盘弹出的事件处理
                        $('.btn-wrapper').hide();
                    }
                    else {
                        //软键盘收起的事件处理
                        $('.btn-wrapper').show();
                    }
                });


                var addressData = app.storageFetch('editAddress'); // 填写编辑地址信息

                $('#username').val(addressData.name);
                $('#phone').val(addressData.phone);
                $('#address').val(addressData.capital + " " + addressData.city)
                    .attr({'data-capital':addressData.capital,'data-city':addressData.city});
                $('#detailAddress').val(addressData.detail_address);
                $('input').prop('checked',Number(addressData.isdefault))


                /**
                 * 获取对象属性的值
                 * 主要用于过滤三级联动中，可能出现的最低级的数据不存在的情况，实际开发中需要注意这一点；
                 * @param {Object} obj 对象
                 * @param {String} param 属性名
                 */
                var _getParam = function (obj, param) {
                    return obj[param] || '';
                };
                var cityPicker = new mui.PopPicker({
                    layer: 2
                });
                cityPicker.setData(cityData);
                var capitalIndex = getCityValue(addressData.capital, cityData);
                var cityIndex = getCityValue(addressData.city, cityData);
                cityPicker.pickers[0].setSelectedIndex(capitalIndex, 200);
                cityPicker.pickers[1].setSelectedIndex(cityIndex, 200);

                var capitalId = getCityId(addressData.capital, cityData);
                var cityId = getCityId(addressData.city, cityData);

                var showCityPickerButton = document.getElementById('showCityPicker2');
                var cityResult = document.getElementById('address');

                showCityPickerButton.addEventListener('tap', function (event) {

                    // 取消其他input的聚焦事件
                    $('.fill-in-address input').each(function () {
                        $(this).blur();
                    });

                    cityPicker.show(function (items) {
                        cityResult.value = _getParam(items[0], 'text') + " " + _getParam(items[1], 'text');
                        capitalId = items[0].id;
                        cityId = items[1].id;
                        //返回 false 可以阻止选择框的关闭
                        //return false;
                    });
                }, false);
                // 根据城市名称返回所在城市的 索引值
                function getCityValue(name, cityData) {
                    var defaultCityNum;
                    for (var j = 0; j < cityData.length; j++) {
                        if (name == cityData[j].text) {
                            defaultCityNum = j;
                        } else {
                            for (var k = 0; k < cityData[j].children.length; k++) {
                                if (name == cityData[j].children[k].text) {
                                    defaultCityNum = k;
                                }
                            }
                        }
                    }
                    return defaultCityNum;
                }
                // 根据城市名称返回所在城市的 id
                function getCityId(name, cityData) {
                    var defaultCityId;
                    for (var j = 0; j < cityData.length; j++) {
                        if (name == cityData[j].text) {
                            defaultCityId = cityData[j].id;
                        } else {
                            for (var k = 0; k < cityData[j].children.length; k++) {
                                if (name == cityData[j].children[k].text) {
                                    defaultCityId = cityData[j].children[k].id;
                                }
                            }
                        }
                    }
                    return defaultCityId;
                }

                // ====================================================== 页面操作 =====================================================

                // 点击保存按钮
                document.getElementById('save').addEventListener('tap', function () {
                    var id = addressData.id,
                            name = $('#username').val(), //姓名
                            phone = $('#phone').val(), // 手机号
                            info = $('#address').val(), // 省份
                            detailAddress = $('#detailAddress').val(), // 详细地址
                            isdefault = $('input[type=checkbox]').prop('checked')?1:0;

                    if (name == "" || phone == "" || info == "" || detailAddress == "") {
                        mui.toast('请完善你的信息');
                        return;
                    }

                    var param = {
                        'id': id, 
                        'name': name, 
                        'phone': phone, 
                        'capital': capitalId, 
                        'city':  cityId, 
                        'address': detailAddress, 
                        'isdefault': isdefault
                    };

                  
                    $.post('../address/editAddress', param, function (data) {
                     
                        if (data.s == 200) {
                            mui.toast('修改成功');
                            setTimeout(function () {
                                tools.route('address');
                            }, 1000);
                        } else {
                            mui.toast(data.d)
                        }
                    }, 'json');
                });

                // ============================================================ 工具方法 ===========================================

                var tools = {
                    route: function (url) {
                        mui.openWindow({
                            url: url
                        });
                    }
                }

            })
        </script>
    </body>

</html>