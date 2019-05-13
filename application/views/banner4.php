<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/banner.css" />
    </head>
    <body>
        <div>
            <div class="div1">
                <img width="100%" src="http://image.bfy100.com/1555330478.png" alt="">
                <div class="input-box">
                    <div class="input-group">
                        <input id="mobile" type="text" placeholder="请输入手机号码"/>
                    </div>
                    <div class="input-group input-group-button">
                        <input id="code" type="text" class="text-size-17" placeholder="请输入验证码">
                        <button id="send-code" class="custom-pink text-size-17">获取验证码</button>
                    </div>
             
                    <div id="login" class="button-box">
                        <img style="width: 6.8rem" src="<?= base_url() ?>public/images/pmj/huodong3/注册按钮@2x.png"/>
                    </div>
                    <p class="tip"> *已注册用户直接购物即可</p>
                </div>
                
            </div>
            <div class="div2 list-container">
                <img class="title-img" src="<?= base_url() ?>public/images/pmj/huodong3/new_title.png" alt="">
                <ul class="mui-table-view"></ul>
            </div>

            <div class="tip-container">
                <div class="tip-hb mui-text-center">
                    <h4 class="text-size-15">活动规则</h4>
                    <span class="text-size-12">(仅限APP用户参加)</span>
                </div>
                <ol class="tip-bd">
                    <li>礼包只能在SUPVP手机APP端领取：注册成功后，在App端“我的优惠券”中查看；</li>
                    <li>活动时间：即日起至2019年4月15日24:00；</li>
                    <li>本活动仅限 SUPVP 新注册用户参与，每个手机号仅限参加1次；</li>
                    <li>新人礼包数量有限，先到先得；</li>
                    <li> 如发现用户存在批量注册等违规行为，SUPVP有权取消用户资格，此活动最终解释权归SUPVP所有。</li>
                    <p class="mui-text-center">
                        *本次活动最终解释权归SUPVP所有
                    </p>
                </ol>
            </div>
        </div>


        <div class="popup-container">
            <div class="coupon-box">
                <div class="mui-scroll-wrapper">
                    <div class="mui-scroll">
                       <ul></ul>
                    </div>
                </div>
                <img class="coupon-img" src="<?= base_url() ?>public/images/pmj/huodong3/coupon_bg-b.png" alt="">
            </div>
            <img class="close-img" src="<?= base_url() ?>public/images/pmj/huodong3/close.png" alt="">
        </div>



        <script id="list_tpl" type="text/html">
            {{each d cell}}
                <li data-id="{{cell.id}}" data-share="{{cell.share}}" data-app="{{cell.url}}" id="goods_{{cell.id}}" class="mui-table-view-cell">
                    <div class="mui-slider-handle custom-flex">
                        <div class="custom-list-box custom-flex">
                            <img class="custom-list-pic" src="{{cell.img_750_1050+zip}}210" width="100%" alt="">
                            <div class="custom-brand-info">
                                <h3 class="text-size-13 custom-white-space-2">{{cell.name}}</h3>
                                <div class="position-bottom">  
                                    <p class="font-black "><small class="text-size-9">&yen;</small><span class="font-MarkPro text-size-12">{{cell.price}}</span></p>
                                    <div class="badges-box">
                                        <span class="mui-badge text-size-13">0首付</span>
                                        <span class="font-red text-size-13">月供<small>&yen;</small><span class="font-MarkPro">{{cell.amortize}}</span>起 </span>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </li>
            {{/each}}
        </script>



        <script id="coupon_tpl" type="text/html">
            {{each d item}}
                <li>
                    <img src="<?= base_url() ?>public/images/pmj/huodong3/{{item.src}}" alt="">
                </li>
            {{/each}}
        </script>

    </body>
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

    <script>
        var data=[{src:'coupon_1.png'},
        {src:'coupon_2.png'},
        {src:'coupon_3.png'},
        {src:'coupon_4.png'},
        {src:'coupon_5.png'},
        {src:'coupon_6.png'},
        {src:'coupon_7.png'}]
       
        var title = decodeURIComponent(GetQueryString('title'));
        document.title=title;
        ;(function () {
           
            var id = GetQueryString('id');
            $.post('../ActivityH5/h5Banner', {
                    'id':id
                }, function (res) {
                    if (res.s == 200) {
                        var data = res.d;
                        data.forEach((item, i) => {
                            item.l_type = setTypeData(item).typeArr;
                        });  
                        $('.div2 ul').html(template('list_tpl',{d:data,zip:zip}))
                    }
            }, 'json');
           
            // 登录
            document.getElementById('login').addEventListener('tap', toRegister, false);
            // 获取验证码
            document.getElementById('send-code').addEventListener('tap',getCode,false);
            // 关闭弹框
            document.querySelector('.close-img').addEventListener('tap',closePopup,false);
            // 商品详情
            mui('.list-container').on('tap','li',function(){
                var id=this.dataset.id,
                    appLink=this.dataset.app,
                    share=this.dataset.share;
                linkToDetail(id,appLink,share);
            });

            $('.coupon-box ul').html(template('coupon_tpl',{d:data}));

            mui('.mui-scroll-wrapper').scroll({
                deceleration: 0.0005 
            });

            // h5/App 活动中商品详情的跳转
            function linkToDetail(id,url,shareUrl){
                var type=GetQueryString('type');

                if(type=='web'){
                    mui.openWindow({
                        url: '../supvp/goodsDetail?id='+id
                    });
                    return;
                }
                if (isAndroid_ios()) {
                    window.javaScriptInterface.activityLinkToDetail(url,shareUrl);
                } else {
                    activityLinkToDetail(url,shareUrl);
                }
            }

           

            // (判断Android 或 ios)
            function isAndroid_ios() {
                var u = navigator.userAgent,
                    app = navigator.appVersion;
                var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器  
                var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端  
                return isAndroid == true ? true :false;
            }
            // 注册
            function toRegister() {
                $(document).find('input').blur();
                // 禁止状态
                if ($('#mobile').val() == "" && $('#code').val() == "") {
                    return;
                }
                
                var mobile = $('#mobile').val();
                var code = $('#code').val();
                $.post('../login/webRegister', {
                    "mobile": mobile,
                    "code": code
                }, function (data) {
                    if (data.s == 200) {
                        app.storageSave('nopwdlogin',{mobile:mobile,flag:0});
                        closePopup();

                    } else {
                        if(data.s ==1003){
                            mui.toast('您之前已成功注册，请前往"我的"页面查看');
                            return;
                        }
                        mui.toast(data.d, {type: 'div'});
                    }
                }, 'json');
            }
            
            // 获取验证码
            function getCode(){
                var mobile = $('#mobile').val();
                var self = this;
                if (mobile == ""){ 
                    mui.toast('请输入手机号');
                    return;
                }
                
                $.post('../user/regsend', {
                    "mobile": mobile
                }, function (data) {
                    if (data.s == 200) {
                        mui.toast('发送成功');
                        SetRemainTime(self, 60);
                    } else {
                        mui.toast(data.d);
                    }
                }, 'json');
            }
            //遮罩禁止滑动
            // var handler = function (event) {
            //     event.preventDefault();
            //     event.stopPropagation();
            // };
            // document.querySelector('.popup-container').addEventListener("touchmove", handler, false);//禁止页面滑动
            
            function closePopup(){
                if($('.popup-container').hasClass('mui-active')){
                    $('.popup-container').removeClass('mui-active');
                }else{
                    $('.popup-container').addClass('mui-active');
                }
            }

            //倒计时
            var InterValObj;

            function SetRemainTime(el, second, fn) {
                // 防止多次点击，生成多个定时器
                if (InterValObj) {
                    clearInterval(InterValObj);
                }
                InterValObj = setInterval(function () {
                    if (second > 0) {
                        second = second - 1;

                        $(el).text(second + "s").attr('disabled', true);
                    } else {
                        clearInterval(InterValObj);
                        $(el).text('获取验证码').removeAttr('disabled');

                        if (fn) {
                            fn();
                        }
                    }
                }, 1000)
            }
        }
        )()
    </script>  
</html>