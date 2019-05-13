<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>客服与帮助</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- <meta name="format-detection" content="telephone=yes"/> -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>
            .mui-card{
                margin:0;
                box-shadow:0 0 0 ;             
            }
            .mui-scroll-wrapper{
                bottom:2rem;
            }
            .mui-content .mui-card{
                margin-top:0.26rem;   
            }
            .mui-content .mui-card-header{
                padding: 0.42rem;
            }
            .mui-content .mui-card-header strong{
                font-size:0.4rem;
            }
            .mui-content .mui-card-content-inner{
                padding:0;
            }
            .mui-table-view-cell{
                padding: 0.5rem 0.4rem 0.4rem;
            }
            .mui-table-view-cell strong{
                position:relative;
                padding-left: 0.3rem;
                font-size: 0.38rem;
            }
            .mui-table-view-cell strong:before{
                content: " ";
                position: absolute;
                left: 0;
                top: 2px;
                right: 0;
                height: 15px;
                border-left: 3px solid #b78e5b;
            }
            .mui-table-view-cell ol{
                overflow: hidden;
                margin-top: 0.3rem;
            }
            .mui-table-view-cell li{
                width: 50%;
                float: left;
                padding: 0.2rem 0;
            }
            .custom-list-wrapper .mui-table-view{    
                padding:0.1rem 0;
            }
            .custom-list-wrapper .mui-table-view-cell a{
                font-size: 0.42rem;
            }
            /* 底部 */

            .mui-bar{
                height: 2rem;
            }
            .mui-tab-label{
                color:#000;
            }
            .mui-tab-label span{
                display:block;
                font-size:0.3rem;
                line-height: 1;
                color: #929292;
            }
            .mui-popover{
                height: 70%;
            }
            .mui-popover .mui-card-header {
                font-size: 0.42rem;
                font-weight: 700;
                letter-spacing: 1px;
            }
            .ctm-tab-item img{
                width: 0.64rem;
            }

            .mui-bar-tab .ctm-tab-item{
                display: table-cell;
                overflow: hidden;
                width: 1%;
                height: 50px;
                text-align: center;
                vertical-align: middle;
                white-space: nowrap;
                text-overflow: ellipsis;
                color: #929292;
            }
        </style>
    </head>

    <body>
        <div class="mui-content mui-scroll-wrapper custom-bg-color-gray">
            <div class="mui-scroll">
                <div class="custom-list-wrapper">
                    <ul class="mui-table-view">
                        <li id="link-feedback" class="mui-table-view-cell">
                            <a class="mui-navigate-right custom-flex">
                                APP体验反馈
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mui-card">
                    <div class="mui-card-header">
                        <strong>常见问题</strong></div>
                    <div class="mui-card-content">
                        <div id="service-content" class="mui-card-content-inner">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="mui-bar mui-bar-tab">
            <a class="ctm-tab-item" href="tel:18964227631">
                <img src="<?= base_url() ?>public/images/Icon/kfrx@2x.png" alt="">
                <p class="mui-tab-label">客服热线
                    <span>18964227631</span>
                </p>
            </a>
			<div id="service" class="ctm-tab-item" href="#">
                <img src="<?= base_url() ?>public/images/Icon/zxkf@2x.png" alt="">
                <p class="mui-tab-label">
                    在线客服
                    <span>(09:00-19:00)</span>
                </p>
			</div>
        </nav>
            <!-- 底部弹出框 -->
        <div id="popover" class="mui-popover mui-popover-action mui-popover-bottom custom-bg-color-white">
        </div>        
        
        <sciprt id="service-list-tpl" type="text/html">
            <ul class="mui-table-view">
                {{each list services index}}
                    <li class="mui-table-view-cell">
                        <strong data-name="{{services.name}}">{{services.name}}</strong>
                        <ol class="mui-cleafix">
                            {{each services.item value i}}
                            <li data-id="{{value.id}}">
                                {{value.title}}
                            </li>
                            {{/each}}
                        </ol>
                    </li>
                {{/each}}
            </ul>
        </sciprt>
        <script id="service-popver-tpl" type="text/html">
            <div class="mui-card">
                <div class="mui-card-header">问题详情&nbsp;&nbsp;({{module}})<i class="mui-icon mui-icon-closeempty"></i></div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <strong>{{title}}</strong>
                        <p>{{content}}</p>
                    </div>
                </div>
            </div>
        </script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script>        
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>

            var details={
                d:{
                    module:'账户问题',
                    title:'APP端密码忘记',
                    content:'您好，如果忘记登录密码,请在【supvp】APP登录页面右下角点击“忘记密码”，通过绑定手机号获得验证码，设置新密码。'
                }
            }

            $(function () {

                mui.init({
                    swipeBack: false //启用右滑关闭功能
                });

                (function (mui, $) {
                    // srcoll
                    mui('.mui-scroll-wrapper').scroll({
                        indicators: false, //是否显示滚动条
                        bounce:false
                    });

                    getkftype();
                    function getkftype(){
                        $.post('../api/kftype', {}, function (data) {
                            if(data.s==200){
                                $('#service-content').html(template('service-list-tpl', data.d));    
                            }
                        }, 'json');
                    }
                    
                    function getkfquestion(id,title){
                        $.post('../api/kfquestion', {id:id}, function (data) {
                            if(data.s==200){
                                data.d.module = title;
                                $('#popover').html(template('service-popver-tpl', data.d));
                                mui('#popover').popover('show');
                            }
                        }, 'json');
                    }
                    /* 返回用户信息
                     * @return  ajaxData 获取后台返回的数据
                     */
                    function getuserinfoData() {
                        $.ajaxSetup({
                            async: false
                        });
                        var ajaxData;
                        $.post('../user/getuserinfo', {}, function (data) {
                            var data = JSON.parse(data);
                            if (data.s == 200) {
                                ajaxData = data;
                            } else {
                                ajaxData = 0; //未登录
                            }
                        });
                        return ajaxData;
                    }

                    

                    // ========================================================= AJAX =================================================
                    
                    
                    // 点击显示弹出框
                    mui('#service-content').on('tap', '.mui-table-view-cell li', function (e) {
                        var id = this.dataset.id,
                        title =  $(this).parent().prev().attr('data-name');
                        getkfquestion(id,title);
                    });
                    // 隐藏弹出框
                    mui('#popover').on('tap', '.mui-icon', function (e) {
                        mui('#popover').popover('hide');
                    });
                    mui('.custom-list-wrapper').on('tap', '#link-feedback', function (e) {
                        tools.route('APPfeedback');
                    });

                    var getuserinfo = getuserinfoData(); //用户信息
                    if (getuserinfo) {
                        // 客服
                        document.querySelector('#service').addEventListener('tap', function () {
                            tools.route('JIMChat');
                        });
                    } else {
                        // 登录
                        document.querySelector('#service').addEventListener('tap', function () {
                            tools.route('login');
                        });
                    }
                    

                    // ======================================================== 工具方法 ===========================================

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