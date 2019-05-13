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

            body,html{
                height:100%;
            }


            .mui-input-group .mui-input-row {
                height: 1.44rem;
                display:flex;
                align-items:center;
            }

            .mui-input-row label {
                width: 26%;
                color: #222;
                padding: 0.44rem  0 0.44rem 0.37rem;
            }
            .mui-input-row label,
            .mui-input-row label~input {
                font-size: 0.373rem !important;
            }

            .mui-input-row label~input {
                width: 74%;
                height: 1.3rem;
            }
            .mui-input-row .mui-icon{
                position:absolute;
                right:0.346rem;
                color: #ABABAB;
                font-size: 0.48rem;
            }

            .default-address {
                height: 1.2rem;
                line-height: 1.2rem;
                color: #222;
                margin: 0 0.373rem;
                justify-content: space-between;
            }
            .btn-box{
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                height: 1.6rem;
                padding: 0 0.4rem;
                z-index: 2;
            }
            .save-btn {
                height: 1.173rem;
                line-height: 1.173rem;
                border: none;
                color: #fff;
                padding: 0;
                border-radius:0.586rem;
                background: -webkit-linear-gradient(left, #FF4605 , #FFA200);
                background: -o-linear-gradient(right, #FF4605 , #FFA200);
                background: linear-gradient(to right, #FF4605 , #FFA200);
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

            /*弹出框*/
            .mui-picker{
                background-color: #eee;
            }
        </style>

    </head>

    <body class="custom-bg-color-white">
        <form class="mui-input-group fill-in-address">
            <div class="mui-input-row">
                <label>收件人:</label>
                <input type="text" id="username" >
            </div>
            <div class="mui-input-row">
                <label>手机号:</label>
                <input type="text" id="phone" >
            </div>
            <div id="showCityPicker2" class="mui-input-row">
                <label>省市区:</label>
                <input type="text" id="address" >
                <i class="mui-icon mui-icon-arrowright"></i>
            </div>
            <div class="mui-input-row">
                <label>详细地址</label>
                <input type="text" id="detailAddress" placeholder="街道、门牌号等">
            </div>
        </form>
        <div class="mui-checkbox default-address custom-flex-c text-size-14">
            设置为默认地址
            <input name="checkbox" type="checkbox" class="pull-right" style="display: inline-block;"> 
        </div>

        <!-- <button id="save" class="mui-btn mui-btn-block custom-radius add-address text-size-15">保存</button> -->
        <div class="btn-box">
            <a id="save" class="save-btn mui-btn mui-btn-block text-size-15" href="javascript:;">保存</a>
        </div>




        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <!--<script src="<?= base_url() ?>public/js/mui.view.js "></script>-->

        <script src="<?= base_url() ?>public/js/city.js"></script>
        <script src="<?= base_url() ?>public/js/mui.picker.js"></script>
        <script src="<?= base_url() ?>public/js/mui.poppicker.js"></script>


        <script>
            $(function () {

                document.title = "新增收货地址";
                (function (mui, $) {
                    mui.init({
                        swipeBack: true //启用右滑关闭功能
                    });
                    mui('.mui-scroll-wrapper').scroll({
                        indicators: false, //是否显示滚动条
                    });
                    var capitalId, cityId,capital,city;
                    //级联示例
                    var cityPicker = new mui.PopPicker({
                        layer: 2
                    });
                    cityPicker.setData(cityData);
                    var showCityPickerButton = document.getElementById('showCityPicker2');
                    var cityResult = document.getElementById('address');
                    showCityPickerButton.addEventListener('tap', function (event) {

                        // 取消其他input的聚焦事件
                        $('.fill-in-address input').each(function(){
                            $(this).blur();
                        });
                        cityPicker.show(function (items) {
                            cityResult.value = items[0].text + " " + items[1].text;
                            capitalId = items[0].id;
                            cityId = items[1].id,
                            capital = items[0].text,
                            city = items[1].text;
                        });
                    }, false);
                    // ====================================================== 页面操作 =====================================================
             

                    // 点击保存按钮
                    document.getElementById('save').addEventListener('tap', function () {
                        var name = $('#username').val(), //姓名
                            phone = $('#phone').val(), // 手机号
                            info = $('#address').val(), // 省份
                            detailAddress = $('#detailAddress').val(), // 详细地址
                            isdefault = $('input[type=checkbox]').prop('checked')?1:0;
                        if (name == "" || phone == "" || info == "" || detailAddress == "") {
                            mui.toast('请完善你的信息');
                            return;
                        }
                        var param = {'name': name, 'phone': phone, 'capital': capitalId, 'city': cityId, 'address': detailAddress, 'isdefault': isdefault};
                       
                        var bargainid = GetQueryString('page');
                        if(bargainid){
                            param['bargainid'] = bargainid;
                            param['bargain_address']=capital+','+city+','+detailAddress;
                        }
                        
                        $.post('../address/addAddress', param, function (data) {
                            if (data.s == 200) {
                                mui.toast('添加成功');
                                setTimeout(function () {
                                    if(bargainid){
                                        tools.route('../bargainH5/bargainMore');
                                        return;
                                    }
                                    tools.route('address');
                                }, 1000);
                            } else {
                                mui.toast(data.d, {type: 'div'})
                            }
                        }, 'json');
                    });
                    // ============================================================ 工具方法 ===========================================
                

                    function creatDom(str, data) {
                        var html = "";
                        $.each(data, function (i, item) {
                            html += ` < li id = "${str}_${item.id}" class = "mui-action-back mui-table-view-cell" > ${item.name} < /li>`;
                        });
                        return html;
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
                        }
                    }
                })(mui, jQuery);
            })
        </script>
    </body>

</html>