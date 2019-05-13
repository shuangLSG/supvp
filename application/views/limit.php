<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>额度</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limit.css" />

</head>

<body>
    <div class="mui-scroll-wrapper custom-bg-color-white mui-content">
        <div class="mui-scroll">
            <div class="">

                <section class="limit-top mui-center">
                    
                </section>

                <!-- banner 图片轮播 -->
                <div class="activity-box">
                    <div id="bannerSlider" class="mui-slider">

                        <!--显示轮播图内容-->

                    </div>
                </div>
                

                <ul class="tab-box custom-flex">
                    <li data-price="0" class="tab-item custom-flex custom-flex-vc">
                        <div class="tab-item-content custom-flex">
                            <strong class="text-size-14">本周待还</strong>
                            <span id="week"  class="text-size-11">暂无待还</span>
                        </div>
                        <img src="<?= base_url() ?>public/images/limit/tab_1.png" alt="">
                    </li>
                    <li data-price="0" class="tab-item custom-flex custom-flex-vc">
                        <div class="tab-item-content custom-flex">
                            <strong class="text-size-14">全部待还</strong>
                            <span id="all" class="text-size-11">暂无待还</span>
                        </div>
                        <img src="<?= base_url() ?>public/images/limit/tab_2.png" alt="">
                    </li>
                    <li class="tab-item custom-flex custom-flex-vc">
                        <div class="tab-item-content custom-flex">
                            <strong class="text-size-14">交易记录</strong>
                            <span class="text-size-11">全部还款流水</span>
                        </div>
                        <img src="<?= base_url() ?>public/images/limit/tab_3.png" alt="">
                    </li>
                </ul>
            </div>
            <section class="section-authentication">
                <div class="module">
                    <div class="module-hd custom-flex custom-flex-vc">
                        <strong>深度认证</strong>
                    </div>
                    <div class="module-bd">
                        <div class="module-main-content custom-flex">
                            <ul class="mui-table-view mui-grid-view mui-grid-12">

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div id="authentication" class="mui-popup authentication-popup border-radius-0 mui-active">
        <div class="mui-popup-header border-radius-0">
            <img src="<?= base_url() ?>public/images/limit/popup_2.png" alt="">
            <i class="mui-icon mui-icon-closeempty"></i>
        </div>
        <div class="mui-popup-inner bg-white">
            <div class="mui-popup-text">
                <p class="text-size-13 mui-text-left">
                    你当前<span class="font-blue">未完成基础身份认证</span>，请先完成基础认证，然后才能进行深度认证
                    <span class="font-blue">获取更多额度</span>。  
                </p>
            </div>
        </div>
        <div class="mui-popup-buttons bg-white">
            <img class="authentication" src="<?= base_url() ?>public/images/limit/popup_1.png" alt="">
        </div>
    </div>

    <script id="limit_tpl" type="text/html">
        {{if s==200}}
            {{if d.limit.creditlimit==0}}
            <div class="signed-box">
                <span class="text-size-15">最高获额(元)</span>
                <h1 id="allPrice" class="font-MarkPro">10,000.00</h1>
                <img src="<?= base_url() ?>public/images/limit/limit_1_get.png">
            </div>
            {{else}}
            <div class="limit-box">
                <div class="text-size-14 font-light-blue2 custom-flex-hbetween">
                    <span>可用额度(元)</span>
                    <span class="link-limitMange">深度认证可快速提额</span> 
                </div>
                <h1 id="balancelimit" class="font-MarkPro">{{d.limit.balancelimit}}</h1>
                <div class="mui-row">
                    <div class="mui-col-xs-6">
                        <span class="text-size-13 font-light-blue2">总额度(元)</span>
                        <span id="creditlimit" class="font-MarkPro text-size-18">{{d.limit.creditlimit}}</span>
                    </div>
                    <div class="mui-col-xs-6">
                        <span class="text-size-13 font-light-blue2">月利率</span>
                        <span id="rate" class="font-MarkPro text-size-18">{{d.limit.rate}}%</span>
                    </div>
                </div>
            </div>
            {{/if}}
        {{else}}
            <div class="tologin-box">
                <h3 class="text-size-18">
                    <strong>零首付·额度高·欢乐购</strong>
                </h3>
                <p class="text-size-15 font-light-blue">先用后付&nbsp;&nbsp;分期还款</p>
                <img src="<?= base_url() ?>public/images/limit/limit_1_login.png">
            </div>
            
        {{/if}}
    </script>

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
                <div data-title="{{d[0].title}}" data-url="{{d[0].url}}" class="mui-slider-item mui-slider-item-duplicate">
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

    <script id="authentication_tpl" type="text/html">
        {{each d cell}}
        <li data-limit="{{cell.limit}}" class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3">
            <a href="#">
                <img class="mui-icon mui-icon-home" src="<?= base_url() ?>public/images/limit/{{cell.url}}" alt="">
                <div class="mui-media-body">{{cell.name}}</div>
            </a>
        </li>
        {{/each}}
    </script>

     <?php
        $this->load->view('share/footer');
    ?>


    <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/filter.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript"></script>

    <script>
        var data = [{
            url: 'rz_1.png',
            name: '职业认证',
            limit:'7,000'
        }, {
            url: 'rz_2.png',
            name: '家庭认证',
            limit:'7,000'
        }, {
            url: 'rz_3.png',
            name: '信用卡认证',
            limit:'7,000'
        }, {
            url: 'rz_4.png',
            name: '学历认证',
            limit:'7,000'
        }, {
            url: 'rz_5.png',
            name: '淘宝认证',
            limit:'7,000'            
        }, {
            url: 'rz_6.png',
            name: '京东认证',
            limit:'7,000'
        }, {
            url: 'rz_7.png',
            name: '公积金认证',
            limit:'7,000'
        }, {
            url: 'rz_8.png',
            name: '社保认证',
            limit:'7,000'
        }, {
            url: 'rz_9.png',
            name: '社交认证',
            limit:'3,000'
        },]
        $(function () {

            mui.init();
            
            // 生成深度认证列表
            $('.mui-grid-12').html(template('authentication_tpl', { d: data }));
            
            $.post('../user/limit', {}, function (res) {
                $('.limit-top').html(template('limit_tpl',res));
                
                if (res.s == 200) {
                    $('.limit-top').attr('data-idcard',res.d.info.idcard).html(template('limit_tpl',res));
                    
                    var limit=res.d.limit;
                    if(limit.week!=0){
                        $('#week').text(limit.week).closest('li').attr('data-price',limit.week); // 本周待还
                    }
                    if(limit.all!=0){
                        $('#all').text(limit.all).closest('li').attr('data-price',limit.all);// 全部待还
                    }
                    $('.limit-top').attr('creditlimit',limit.creditlimit);
                    // 认证状态
                    var info=res.d.info,index=0;
                    for(var key in info){
                        $('.mui-grid-12 li').each(function(i,li){
                            if(index==i){
                                $(this).attr({'data-rz':key,'data-state':info[key]});
                            }
                        });
                        index+=1;
                    }
                }else{
                    $('.limit-top').attr('data-islogin',0);
                }
            }, 'json');

            // 获取 banner
            $.post('../api/banner', {position:3}, function (data) {
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

            mui('.mui-scroll-wrapper').scroll();

            (function (mui, $) {


                // 查看待还
                mui('.tab-box').on('tap','li',function(){
                    // 未登录
                    var isLogin = $('.limit-top').attr('data-islogin');
                    if(isLogin=='0'){
                        tools.route('login');
                        return;
                    }
                    // idcard:0 为认证身份信息   3 已认证
                    var isidcard= $('.limit-top').attr('data-idcard');
                    if(isidcard==0){
                        $('#authentication').addClass('mui-popup-in'); 
                        $('body').append(`<div class="mui-popup-backdrop mui-active" style="display: block;"></div>`);   
                        return;
                    }

                    // 已登录
                    var pages=['weekRepaid','allRepaid','historyRepaid'];
                    var index = $(this).index();
                    var price = this.dataset.price;
                  
                    tools.route(pages[index]);
       
                });

                // 深度认证
                mui('.section-authentication').on('tap','li',function(){
                    // 未登录
                    var isLogin = $('.limit-top').attr('data-islogin');
                    if(isLogin=='0'){
                        tools.route('login');
                        return;
                    }
                    // 已登录
                    var pages=['rzProfession','rzFamily','rzCreditCard','rzEducation','rzTaobao','rzJD','rzReserved','rzSocialSecurity','rzSocialContact'];
                    var index = $(this).index();
                    var state = this.dataset.state;
                    var rzType = this.dataset.rz;
                        
                    // idcard:0 为认证身份信息   3 已认证
                    var isidcard= $('.limit-top').attr('data-idcard');
                    if(isidcard==0){
                        $('#authentication').addClass('mui-popup-in'); 
                        $('body').append(`<div class="mui-popup-backdrop mui-active" style="display: block;"></div>`);   
                        return;
                    }
                    
                    // 信用卡认证结果页
                    if(state == '3'&&rzType=='credit_card'){
                        tools.route('rzCreditCardSuccess'); 
                        return;
                    }

                    // 信用卡认证结果页
                    if(rzType=='social_contact'){
                        tools.route('rzSocialContact'); 
                        return;
                    }

                    if(state == '1'){//审核
                        tools.route('auditing'); 
                    }else if(state == '2'){//拒绝
                        tools.route('rzFailed?page='+pages[index]); 
                    }else if(state == '3'){ //通过                  
                        tools.route('rzSuccess?rz='+rzType); 
                    
                    }else{
                        tools.route(pages[index]);
                    }
                });

                // 弹框 去认证
                $('#authentication').on('click',function(e){
                    if(e.target.classList.contains('mui-icon')){
                        $('#authentication').removeClass('mui-popup-in');
                        $('.mui-popup-backdrop').remove(); 
                        return;
                    }
                    if(e.target.classList.contains('authentication')){
                       tools.route('rzIdentityCard');
                    }
                });
              
                // 顶部 身份证认证
                mui('.limit-top').on('tap','img',function(){

                    var $parent=$(this).parent(),
                        isidcard= $('.limit-top').attr('data-idcard');;
                    if($parent.hasClass('tologin-box')){
                        tools.route('login');
                        return;
                    }
                    if(isidcard==0){
                        $('#authentication').removeClass('mui-popup-in');
                        $('.mui-popup-backdrop').remove(); 
                        tools.route('rzIdentityCard');
                    }
                });
                // 选择城市跳转
                mui('.limit-top').on('tap','.link-limitMange',function(){
                    tools.route('limitMange');
                });
                // banner跳转
                mui('#bannerSlider').on('tap', '.mui-slider-item', function (e) {
                    var url = this.dataset.url,
                    title = this.dataset.title;
                    tools.route(url+'&type=web&title='+title);
                });
                

                /**
                 * ************ 芝麻认证查询结果
                 * */

                if(window.location.href.indexOf('?')!=-1){
                    var biz_no = getBizNo(window.location.href);   
                    var idinfo = app.storageFetch('ID');
                    idinfo['biz_no'] = biz_no;
                    saveZMResults(idinfo);            
                }
                /**
                * 查询芝麻认证的认证结果
                */
                function saveZMResults(json){
                    $.post('../user/zhimaQuery',json, function (data) {
                        if (data.s == 200) {
                            // $('body').append(`<p>${JSON.stringify(data.d)}</p>`)
                        } else {
                            mui.toast('扫码认证失败');
                        }
                    }, 'json');
                }
                /**
                * @param {url} 认证Url
                * @return  biz_no  开始认证接口返回url中的参数
                */
                function getBizNo(url){
                    var biz_content = decodeURIComponent(GetQueryString('biz_content',url));
                    return JSON.parse(biz_content).biz_no;
                }




                // ============== 底部 a链接页面跳转                    
                   
                activeFoot(2);
                function activeFoot(i) {
                    $('footer a').each(function (index, value) {
                        var changeImgUrl = this.dataset.url;

                        if (index == i) {
                            $('footer a').eq(i).addClass('mui-active').find('img').attr('src', changeImgUrl);
                        }
                    })
                }
                var pageArr = ['index', 'cart', 'limit', 'mine'];
                mui('.mui-bar').on('tap', 'a', function (e) {
                    var curPage = this.dataset.index;
                    for (let i = 0; i < pageArr.length; i++) {
                        if (curPage == i) {
                            tools.route('../supvp/' + pageArr[i])
                        }
                    }
                });

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