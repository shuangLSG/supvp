<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>
            html,body{
                height:100%;
                background-color: #fff;
            }
            .font-black-4{
                color:#444;
            }
            .custom-empty{
                z-index: 999;
                position: fixed;
                top: 0;
                bottom: 20%;
                left: 0;
                right: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-color: #fff;
            }
            .mui-scroll-wrapper {
                bottom: 1.7rem;
            }
            .mui-checkbox label,
            .mui-radio label {
                padding: 0;
            }

            .mui-checkbox input[type=checkbox],
            .mui-radio input[type=radio] {
                top: 0.58rem;
                right: 0;
                text-align: right;
            }

            .mui-checkbox.mui-left label,
            .mui-radio.mui-left label {
                padding-left: 51px;
            }

            .mui-radio input[type=radio]:checked:before {
                content: '\e442';
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
   

            .mui-loading{
                height:2rem;
            }
            .mui-loading,
            .mui-table-view li {
                background-color: #fff;
                padding:0 0.4rem;
            }
            .mui-table-view{
                background-color:transparent;
            }
            .mui-table-view li {
                margin-bottom: 0.26rem;
                
            }
            .mui-table-view:before,
            .mui-table-view:after,
            .mui-table-view-cell:after{
                height:0;
            }
            .mui-table-view-cell p{
                padding-top: 0.3rem;
            }

            .mui-table-view li .address-content {
                position: relative;
                padding: 0.34rem 0;
            }

            .mui-table-view li .address-content span {
                margin-right: 0.3rem;
            }

            .mui-table-view li .address-action {
                overflow: hidden;
                height: 1.04rem;
                line-height: 1.04rem;
            }

            .mui-table-view li .address-action .mui-pull-right span{
                display: inline-block;
                color:#888;                
            }
            .mui-table-view li .address-action span:nth-of-type(2) {
                margin: 0 0.186rem 0 1.1rem;
            }

            .mui-table-view li .address-action img {
                width: 0.42rem;
                height: 0.42rem;
                margin-top: -0.1rem;
                margin-right: 0.1rem;
                vertical-align: middle;
            }

            .custom-line:after {
                left: 0;
            }
        </style>
    </head>

    <body>
        <div class="custom-empty" style="display: none;">
            <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
            <p>您还没有收货地址，请点击下方新建</p>
        </div>
        <div class="mui-scroll-wrapper mui-content custom-bg-color-white">
            <div class="mui-scroll custom-bg-color-gray">
                <ul class="mui-table-view mode-2">
                    <div class="mui-loading custom-flex">
                        <div class="mui-spinner">
                        </div>
                    </div>
                    <!--收货地址列表-->

                </ul>
            </div>
        </div>
        <div class="btn-wrapper">
            <button id="addAddress" class="mui-btn mui-btn-block custom-radius add-address text-size-15">新增收货地址</button>
        </div>



        <script id="address_tpl" type="text/html">
        {{each d cell}}
            <li data-id="{{cell.id}}" data-capitalid="{{cell.capitalid}}" data-cityid="{{cell.cityid}}" id="address_{{cell.id}}" class="mui-table-view-cell">
                <div class="mui-input-row  mui-radio">
                    <label data-id="1" data-price="300">
                        <div class="address-content custom-line">
                            <strong class="text-size-15 font-black-4">
                                <span class="item_name">{{cell.name}}</span><span class="item_phone">{{cell.phone}}</span></strong>
                            <p  class="text-size-13">{{cell.capital+cell.city+cell.address}}</p>
                        </div>
                    </label>
                    {{if cell.isdefault==1}}
                    <input name="radio1" value="Item 4" type="radio" checked>
                    {{else}}
                    <input name="radio1" value="Item 4" type="radio">
                    {{/if}}
                </div>
                <div class="address-action">
                    <div class="mui-pull-left">
                        <span class="custom-orange text-size-13 {{cell.isdefault!=1? 'mui-hidden':''}}">默认地址</span>
                    </div>
                    <div class="mui-pull-right">
                        <span class="delete-hook">
                            <img src="<?= base_url() ?>public/images/icons/delete.png" alt="">删除
                        </span>
                        <span class="edit-address-hook" data-isdefault="{{cell.isdefault}}" data-city="{{cell.capital}},{{cell.city}},{{cell.address}}">
                            <img src="<?= base_url() ?>public/images/icons/edit.png" alt="">编辑
                        </span>
                    </div>
                </div>
            </li>
            {{/each}}
        </script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
            $(function () {


                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });
                document.title= "收货地址";
                
                (function (mui, $) {

                    // 获取地址
                    $.post('../address/getAddress', {}, function (data) {
                        if (data.s == 200) {
                            if (data.d.length == 0) {
                                $('.custom-empty').show();
                                $('.mui-loading').hide();
                                return;
                            }
                            $('.mui-table-view').html(template('address_tpl',{d:data.d}));
                        } else {
                            $('.custom-empty').show();
                            return;
                        }
                    }, 'json');



                    // srcoll
                    var scroller = mui('.mui-scroll-wrapper').scroll({
                        indicators: false, //是否显示滚动条
                    });

                    // ============================================================= 页面跳转 =======================================================
                    // 添加地址
                    document.getElementById("addAddress").addEventListener('tap', function () {
                        tools.route('../supvp/newAddress');
                    });
                    // 修改地址
                    mui('.mui-table-view').on('tap', '.edit-address-hook', function () {
                        var $li = $(this).closest('li');
                        var name = $li.find('.item_name').text();
                        var phone = $li.find('.item_phone').text();
                        var addressArr = this.dataset.city.split(",");
                        var isdefault = this.dataset.isdefault;
                        var id = $li.attr('data-id'),
                            capitalid = $li.attr('data-capitalid'),
                            cityid = $li.attr('data-cityid');
                        var json = {
                            "id": id,
                            "name": name,
                            "phone": phone,
                            "capital": addressArr[0],
                            "city": addressArr[1],
                            "detail_address": addressArr[2],
                            "capitalid" : capitalid,
                            "cityid" :cityid,
                            'isdefault':isdefault
                        }
                        app.storageSave('editAddress', json);
                        tools.route('../supvp/editAddress');
                    });

                    // 删除
                    mui('.mui-table-view').on('tap', '.delete-hook', function () {
                        var $li = $(this).closest('li');
                        var id = $li.attr('data-id');
                        mui.confirm('', '确定要删除吗？', ['取消', '确定'], function (e) {
                            delAddress(id);
                        });
                    });


                    mui('.mui-table-view').on('tap', '.mui-input-row', function (e) {
                        var obj = $(this).closest('li'),
                            id = obj.attr('data-id'),
                            name = obj.find('.item_name').text(),
                            phone = obj.find('.item_phone').text();
                        var info = obj.find('.edit-address-hook').attr('data-city').split(','),
                            address = info[2];
                        var capitalid = obj.attr('data-capitalid'),
                            cityid = obj.attr('data-cityid');
                        var json= {
                            'id': id, 
                            'name': name, 
                            'city': cityid, // 市级id
                            'capital': capitalid, //省级id
                            'phone': phone, 
                            'address': address, 
                            'isdefault': 1
                        }

                        if(e.target.tagName.toLowerCase()=='input'){
                            editDefault(obj,json);
                        }else{
                            var page= GetQueryString('page');
                            if(page){
                                json['capital'] = info[0];
                                json['city'] = info[1];
                                app.storageSave('buy_address',json);
                                tools.route('fillorder');
                            }
                        }
                    });

           
                    // 修改默认地址
                    function editDefault(obj,json){                       
                        $.post('../address/editaddress',json, function (res) {
                            if(res.s==200){
                                $('.mui-table-view').find('.custom-orange').addClass('mui-hidden');
                                obj.find('.custom-orange').removeClass('mui-hidden');
                            }
                        }, 'json')
                    }
                 
                    // 删除
                    function delAddress(id) {
                        $.post('../address/delAddress', {
                            "id": id
                        }, function (data) {
                            if (data.s == 200) {
                                // app.storageRemove('buy_address')
                                $("#address_" + id).remove();
                                mui.toast('删除成功');
                                scroller.refresh();   // 刷新一下滚动插件
                            } else {
                                mui.toast('删除失败');
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