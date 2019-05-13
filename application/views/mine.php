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
            .mui-bar-tab.order-nav p{
                color:#676871;
            }
            .mui-content{
                padding-bottom:1.33rem;
            }
            .custom-card-info{
                position:absolute;
                left:0.266rem;
                right:0;
            }
            
            .custom-card-wrapper{
                position:relative;
            }
            .card-bg >img{
                width:100%;
                z-index:1;
            }
            .custom-card-info{
                display:flex;
                align-items: center;
                top:1.12rem;
                margin: 0 0.48rem;
            }
            .custom-card-info .head-icon{
                width:1.6rem;
                height:1.6rem;
                margin-right:0.48rem;
                border-radius:50%;
                overflow: hidden;
            }
            .custom-card-info .custom-card-info-box h4{
                font-size: 0.48rem;
                color: #fff;
            }
            .custom-card-info .custom-card-info-box p{             
                color: #fff;
                font-size: 0.34rem;
                letter-spacing: 2px;
                line-height: 2;
                margin-top: 0.3rem;
                /* margin-bottom: 0.2rem; */
            }
            .custom-card-info .custom-badge-primay{
                font-size: 0.32rem;
                padding: 0.14rem 0.3rem;
            }

            .mui-popup-title {
                font-size: 0.34rem;
                color: #6d6d6d;
            }

            /* ========================= tab ===========================*/
            .mui-bar-tab img {
                height: 0.7rem;
                margin-top: 0.22rem;
            }

            .mui-bar-tab.order-nav{
                position: absolute;
                bottom: -0.813rem;
                height: 2.08rem;
                width: 93%;
                margin: auto;
                border-radius: 0.08rem;
                background:rgba(255,255,255,1);
                box-shadow:0px -6px 20px 0px rgba(207,112,0,0.15);
            }
            .mui-bar-tab.order-nav p{
                font-size: 0.346rem;
                margin-top: 0.1rem;
            }

            /* 九宫格 */
            .mui-grid-view.mui-grid-9{
                border-left:none;
            }
            .mui-grid-view.mui-grid-9 .mui-table-view-cell:nth-child(3n){
                border-right:none;
            }
            .mui-grid-view.mui-grid-9 li{
                width:33.33%;
            }
            .mui-grid-view.mui-grid-9 .mui-media{
                padding:0.2rem;
                height: 2.7rem;
            }
            .mui-grid-view.mui-grid-9 li img{
                width: 0.72rem;
            }
            .mui-table-view.mui-grid-view .mui-table-view-cell .mui-media-body{
                font-size: 0.34rem;
                margin-top: 0.26rem;
            }
            .mui-grid-9.mui-grid-view span{
                color:#a6a6a6;
                font-size: 0.32rem;
            }
            .mui-slider{
                height: 2.133rem;
            }
            .banner-container{
                height:auto;
                padding: 1.2rem 0.38rem 0.373rem;
            }
            .banner-container img{
                width:100%;
                height:auto;
            }
            .mui-slider-item .mui-active{
                transform: translate(0,-0.4rem);
            }
            .mui-table-view-cell:after{
                height: 0.013rem;
            }
            .mui-slider .mui-slider-group .mui-slider-item>a:not(.mui-control-item){
                padding: 0 0.04rem;
            }
        </style>
    </head>

    <body>
        <div class="mui-content mui-scroll-wrapper custom-bg-color-gray">
            <div class="mui-scroll">
                <div class="custom-card-wrapper card-bg">
                    <img src="<?= base_url() ?>public/images/mine_bg.png"/>
                 
                    <div id="infotitle" class="custom-card-info">
                        <img class="head-icon" src="<?= base_url() ?>public/images/Icon/mine_bg.png"/>
                        <div  class="custom-card-info-box">                           
                            <h4 id="userStatus">用户名</h4>
                            <p id="phone"></p>
                            <!-- <span class="mui-badge custom-badge-primay">普通用户</span> -->
                        </div>                           
                    </div> 

                    <nav id="orderView" class="order-nav mui-bar mui-bar-tab custom-bg-color-white">
                        <a data-index="0" class="mui-tab-item" href="javascript:;">
                            <img src="<?= base_url() ?>public/images/icons/order_1.png" alt="">
                            <p>待付款</p>
                        </a>
                        <a data-index="1" class="mui-tab-item" href="javascript:;">
                            <img src="<?= base_url() ?>public/images/icons/order_2.png" alt="">
                            <p>待发货</p>
                        </a>
                        <a data-index="2" class="mui-tab-item" href="javascript:;">
                            <img src="<?= base_url() ?>public/images/icons/order_3.png" alt="">
                            <p>待收货</p>
                        </a>
                        <a data-index="3" class="mui-tab-item" href="javascript:;">
                            <img src="<?= base_url() ?>public/images/icons/order_4.png" alt="">
                            <p>售后</p>
                        </a>
                        <a data-index="4" class="mui-tab-item" href="javascript:;">
                            <img src="<?= base_url() ?>public/images/icons/order_5.png" alt="">
                            <p>全部</p>
                        </a>
                    </nav>
                </div>
                
       
                <!-- banner 图片轮播 -->
                <div id="banner-container" class="banner-container custom-bg-color-white">
                    <div id="bannerSlider" class="mui-slider">
                        <!--显示轮播图内容-->
                    </div>
                </div>

                <ul id="grids" class="mui-table-view mui-grid-view mui-grid-9 custom-bg-color-white">
		            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
                        <a href="#">
                            <img src="<?= base_url() ?>public/images/icons/grid_1@2x.png" alt="">
                            <div class="mui-media-body custom-gray">我的收藏</div>
                            <span class="num" id="user-collect"></span>
                        </a>
                    </li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
                        <a href="#">
                            <img src="<?= base_url() ?>public/images/icons/grid_2@2x.png" alt="">
                            <div class="mui-media-body custom-gray">我的浏览</div>
                            <span class="num" id="user-browse"></span>
                        </a>
                    </li>
		            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
                        <a href="#">
                            <img src="<?= base_url() ?>public/images/icons/grid_3@2x.png" alt="">
                            <div class="mui-media-body custom-gray">优惠券</div>
                            <span class="num" id="user-conpon"></span>
                        </a>
                    </li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
                        <a href="#">
                            <img src="<?= base_url() ?>public/images/icons/grid_4@2x.png" alt="">
                            <div class="mui-media-body custom-gray">收货地址</div>
                        </a>
                    </li>
		           
		            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
                        <a href="#">
                            <img src="<?= base_url() ?>public/images/icons/grid_8@2x.png" alt="">
                            <div class="mui-media-body custom-gray">客服与帮助</div>
                        </a>
                    </li>
                     
                    <li class="mui-table-view-cell mui-media mui-col-xs-4 mui-col-sm-3">
                        <a href="#">
                            <img src="<?= base_url() ?>public/images/icons/grid_9@2x.png" alt="">
                            <div class="mui-media-body custom-gray">设置</div>
                        </a>
                    </li>
                </ul>
                
                <!--为你推荐-->
                <div class="module custom-margin-top-20 custom-bg-color-white">
                    <div class="module-hd custom-flex-c">
                        <strong> 为你推荐 </strong>
                    </div>
                    <div id="recommendlist">

                    </div>
                </div>
            </div>
        </div> 
        
        <!-- banner -->            
        <script  id="banner_tpl" type="text/html">
            {{if d.length==1}}
                <div data-title="{{d[0].title}}" data-url="{{d[0].url}}" class="mui-slider-item">
                    <img src="{{d[0].showimg}}" />
                </div>
            {{else}}
                <div class="mui-slider-group mui-slider-loop">
                    <!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
                    <div data-title="{{d[d.length-1].title}}" data-url="{{d[d.length-1].url}}" class="mui-slider-item mui-slider-item-duplicate">
                        <a href="#">
                            <img src="{{d[d.length-1].showimg}}">
                        </a>
                    </div>
                    <!-- 第一张 -->
                    {{each d i index}}
                        <div data-title="{{i.title}}" data-url="{{i.url}}" class="mui-slider-item">
                            <a href="#">
                                <img src="{{i.showimg}}">
                            </a>
                        </div>
                    {{/each}}
                    <!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
                    <div data-title="{{d[0].title}}" data-url="{{d[0].url}}" class="mui-slider-item mui-slider-item-duplicate" >
                        <a href="#">
                            <img src="{{d[0].showimg}}">
                        </a>
                    </div>
                </div>
                <div class="mui-slider-indicator">
                    {{each d i index}}
                        <div class="mui-indicator {{index==0?'mui-active':''}}"></div>
                    {{/each}}
                </div>
            {{/if}}
        </script>

        <!-- 为你推荐 -->
        <script id="recommend_tpl" type="text/html">
            <ul class="mui-table-view mui-grid-view recommend-box mode-2">
                {{each  d cell}}
                    <li id="goods_{{cell.id}}" class="mui-table-view-cell mui-media mui-col-xs-6 custom-cell">
                        <img class="mui-media-object" src="{{cell.img_750_1050+zip}}338,h_352">
                        <div class="custom-cell-content">
                            <p class="describe">{{cell.name}}</p> 
                            <div class="badges-box">
                                {{if cell.news==1}}
                                    <img class="badge-icon" src="<?= base_url() ?>public/images/icons/news.png" alt="">
                                {{/if}}
                                {{if cell.freeinterest==1}}
                                    <img class="badge-icon" src="<?= base_url() ?>public/images/icons/mx.png" alt="">
                                {{/if}}
                            </div>
                            <div class="pos-bottom">
                                <p class="custom-gray"><small class="scale">&yen;</small>{{cell.activity_price}} <small class="text-decoration">&yen;{{cell.price}}</small></p>                            
                                <p class="custom-pink">月供<small>&yen;</small><span class="monthly-price text-size-38">{{cell.amortize}}</span>起
                                    <small class="custom-light-gray">{{cell.sales}}付款</small>
                                </p>
                            </div>
                        </div>
                    </li>
                {{/each}}
            </ul>
        </script>


        <?php
        $this->load->view('share/footer');
        ?>

        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script> 
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>


            $(function () {
                document.title = "我的";
                mui.init({
                    swipeBack: false //启用右滑关闭功能
                });

                (function (mui, $) {
                    // srcoll
                    mui('.mui-scroll-wrapper').scroll({
                        indicators: false, //是否显示滚动条
                        bounce:false
                    });

                    // ========================================================= AJAX =================================================


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

                    var getuserinfo = getuserinfoData(); //用户信息
                    app.storageSave('userinfo', getuserinfo);
                    if (getuserinfo) {
                        var data = getuserinfo.d[0];
                       
                        $("#infotitle h4").html(data.nickname);
                        $("#infotitle img").attr('src', data.userphoto);
                        $('#phone').text(data.mobile);
                    } else {
                        $("#infotitle h4").html('登录/注册').attr('data-status', 'unregistered');
                        $("#infotitle img").attr('src', '<?= base_url() ?>public/images/logo.png');
                    }
          
                    // 获取我的记录
                    $.post('../user/getmyrecord', {}, function (data) {
                        var data = JSON.parse(data);
                        if (data.s == 200) {
                            $('#user-conpon').text(data.d.coupon||'');
                            $('#user-collect').text(data.d.collection||'');
                            $('#user-browse').text(data.d.browse||'');
                        }
                    });

                    //  推荐
                    function getRecommend() {
                        $.post('../api/getRecommend', {}, function (data) {
                            data = JSON.parse(data);
                            data.zip=zip;
                            $('#recommendlist').html(template('recommend_tpl',data));
                        });
                    }
                    getRecommend();


                    // 获取 banner
                    $.post('../api/banner', {position:2}, function (data) {
                        var data = JSON.parse(data);
                        if (data.s == 200) {
                            var list = data.d.list;
                            $('#bannerSlider').html(template('banner_tpl',{d:list}))
                            // slider 图片轮播
                            var bannerS = mui('#bannerSlider');
                            bannerS.slider({
                                interval: 4000 //自动轮播周期，若为0则不自动播放，默认为0；
                            });
                        }
                    });
                    // ========================================================== 页面跳转 ===========================================
                    // 点击头像登录
                    mui('#infotitle').on('tap', '.head-icon', function () {
                        // 未登录：页面跳转至 登录页
                        if (!getuserinfo) {
                            tools.route('login');
                            return;
                        }
                        tools.route('setting');
                    });
                    // 未登录状态，点击 【立即登录】
                    document.querySelector('#userStatus').addEventListener('tap', function () {
                        // 未登录：页面跳转至 登录页                   
                        if (this.dataset.status == 'unregistered') {
                            tools.route('login');
                        }
                    });
               
                    // banner详情页
                    mui('#bannerSlider').on('tap', '.mui-slider-item', function (e) {
                        var url = this.dataset.url,
                        title = this.dataset.title;
                        tools.route(url+'&type=web&title='+title);
                    });
                    // 为你推荐中，点击跳转至详情页
                    mui('#recommendlist').on('tap', 'li', function () {
                        var id = this.id.split('_')[1];
                        tools.route('goodsDetail?id=' + id);
                    });
                     
                    
                    // 页面跳转  (优惠券、收藏、浏览记录 )
                    var childPageArr = ['collect', 'browserHistory','coupon','address','serviceHelp','setting' ];
                    mui('#grids').on('tap', 'li', function (e) {
                        // 未登录：页面跳转至 登录页
                        let curPage = $(this).index();
                        if (!getuserinfo && curPage != 3) {
                            tools.route('../supvp/login');
                            return;
                        }
                        // 页面跳转
                        for (let i = 0; i < childPageArr.length; i++) {

                            if (curPage == i) {
                                tools.route('../supvp/' + childPageArr[i]);
                            }
                        }
                    });
                   


                    // 查看订单 
                    mui('#orderView').on('tap', 'a', function (e) {
                        var index = $(this).index();
                        // 未登录：页面跳转至 登录页
                        if (!getuserinfo) {
                            tools.route('login');
                            return;
                        }
                     
                        index = index ==4?0:index+1;// 全部订单对应 订单页第一个

                        tools.route('myOrder');
                        app.storageSave('myorder', {
                            item: index,
                        });
                    });


                    // ============== 底部 a链接页面跳转
                    // 当前页面为选中状态
                    activeFoot(3);
                    function activeFoot(i) {
                        $('footer a').each(function (index, value) {
                            var changeImgUrl = this.dataset.url;
                            if (index == i) {
                                $('footer a').eq(i).addClass('mui-active').find('img').attr('src', changeImgUrl);
                            } else {
                                $(this).siblings().removeClass('mui-active');
                            }
                        });
                    }

                    var pageArr = ['index', 'cart', 'limit', 'mine'];
                    mui('footer').on('tap', 'a', function (e) {
                        var curPage = this.dataset.index;
                        for (let i = 0; i < pageArr.length; i++) {
                            if (curPage == i) {
                                tools.route('../supvp/' + pageArr[i])
                            }
                        }
                    });

                   
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