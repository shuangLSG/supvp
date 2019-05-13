// $(function () {

    mui.init();
    (function (mui, $) {
        // 左侧悬浮按钮
        document.getElementById('link-home').addEventListener('tap', function () {
            mui.openWindow({
                url: '../bargainh5/bargainHome'
            });
        });
        // 隐藏去分享遮罩
        document.querySelector('.tip-popup').addEventListener('tap', function () {
            $('.to-share').addClass('mui-hidden');
        });
      
       
        // 隐藏登录弹框
        document.querySelector('.mui-icon-closeempty').addEventListener('tap',hidePopover,false);
        // $('#successPopup').addClass('mui-popup-in');
            
        // 砍价成功弹框
        mui(document).on('tap', '#successPopup img', function () {
            var isSelf = $('#head-icon').attr('data-self');

            if(this.classList.contains('popup-btn')){
                if (isSelf=='0') {
                    mui.openWindow({
                        url: '../bargainh5/bargainHome'
                    });
                } else{
                    // 去分享
                    if(!isWeiXin()){
                        $('.to-share').find('img').remove();
                    }
                    var p = $('#bargainprice span:eq(0)').text();
                    $('.to-share').removeClass('mui-hidden').find('.font-red').text(p);
                    
                }
            }
           
            if (this.classList.contains('popup-close') || this.classList.contains('popup-btn')) {
                if(isSelf=='0'){
                    window.location.reload()
                }
                $('#successPopup').removeClass('mui-popup-in');
                $('.mui-popup-backdrop').remove();
                sessionStorage.setItem('closed', JSON.stringify({type:1}));
            }
        });
    

        // 用户是否登录
        var ss = GetQueryString('ss',window.location.href);
        $.post('../user/getuserinfo', {'bargain':1,'ss':ss == null?'':ss}, function (res) {
            if (res.s == 9999) {
                $('#infotitle').attr('data-state',1);
            }
        }, 'json');
    

        // 页面按钮
        mui('.action-box').on('tap', 'img', function () {
            if (this.id == 'help_cut') {

                var flag = $('#infotitle').attr('data-state');
                if (flag) {
                    // 去登录
                    mui('#login_popover').popover('show');
                    return;
                }
               
                // 帮好友砍一刀
                var commodityid = $('.list-container li').attr('data-commodityid'),
                    bargainid = $('.list-container li').attr('data-bargainid'),
                    bargainactivityid = $('.list-container li').attr('data-bargainactivityid');
                var json = {
                    commodityid: commodityid,
                    bargainid: bargainid,
                    bargainactivityid: bargainactivityid
                }
                HelpCut(json);
            } else if (this.classList.contains('link-home')) {
                mui.openWindow({
                    url: '../bargainh5/bargainHome'
                });
            } else {
                // 去分享
                if(!isWeiXin()){
                    $('.to-share').find('img').remove();
                }
                var p = $('#bargainprice span:eq(0)').text();
                $('.to-share').removeClass('mui-hidden').find('.font-red').text(p);
            }
        });

        // 商品详情
        mui('.list-container').on('tap','li',function(){
            var commodityid = this.dataset.commodityid,
                bargainactivityid = this.dataset.bargainactivityid;
            mui.openWindow({ 
                url: '../bargainh5/bargaincdetail?commodityid='+commodityid+'&bargainactivityid='+bargainactivityid
            });
        });
    
        /** 
         * 商品列表展示
         * commodityid   商品id
         * bargainid     砍价id
         */
        var bargainid = GetQueryString('bargainid'),
            commodityid = GetQueryString('commodityid');
        $.post('../bargainh5/bargainQueryById', {
            'bargainid': bargainid,
            'commodityid': commodityid
        }, function (res) {
            if (res.s == 200) {
                var data = res.d,
                    info = data.info;
    
                // 砍价成功的弹框  显示按钮： 【邀请好友】 或 【去首页】
                var isInit = GetQueryString('f'),
                    price = GetQueryString('p');
                var popupHt = template('popup_tpl', {
                    price: price,
                    self: data.info.self
                });

                var isclosed = JSON.parse(sessionStorage.getItem('closed'));
                $('body').append(popupHt);
                // 展示发起砍价成功的弹框   
                if (isInit&&!isclosed&&data.info.self) {
                    $('#successPopup').addClass('mui-popup-in');
                    $('body').append(`<div class="mui-popup-backdrop mui-active" style="display: block;"></div>`);
                }
    

                // 本人信息 
                $('#head-icon').attr({
                    'src': data.info.userphoto,
                    'data-self': data.info.self
                });
                $('#phone').text(data.info.mobile);
    
                
                // var bargainprice = isNum2((Number(info.oldprice) - Number(info.newprice)));
                $('#bargainprice').find('span:eq(0)').text(info.aprice)
                    .end().find('span:eq(1)').text(info.newprice);
    
    
                $('.progress span').css('width', info.aprice / info.oldprice * 100 + '%');
                // 显示按钮： 【邀请好友】 或 【帮好友砍一刀】
                if(data.info.stock!=0){
                    $('.action-box').html(template('bargainbtn_tpl', {
                        d: data.info,
                        zip: zip
                    }));

                    // 倒计时
                    setTimer(res, '.countDownTime-box');
                }else{
                    $('.skill-timer').html('已售罄');
                }
               
                $('.list-container ul').html(template('list_tpl', {
                    cell: data.info,
                    zip: zip
                }))
                $('.billboard .mui-card-content ul').html(template('billboard_tpl', {
                    d: data.list,
                    zip: zip
                }))
    
                var json = {
                    'bargainactivityid': info.bargainactivityid,
                    'commodityid': info.commodityid
                }
                winners(json, info.name);
                
            }else{
                mui.toast('该页面已失效');
                setTimeout(function(){
                    mui.openWindow({
                        url: '../bargainh5/bargainHome'
                    });
                },1000);
               
            }
        }, 'json');
    
        function isWeiXin() {
            var ua = window.navigator.userAgent.toLowerCase();
            if (ua.match(/MicroMessenger/i) == 'micromessenger') {
                return true;
            } else {
                return false;
            }
        }
    
        /** 
         * 文字滚动
         * commodityid         商品id
         * bargainactivityid   后台活动id
         */
        function winners(json, name) {
            $.post('../bargainh5/bargainWinners', json, function (res) {
                if (res.s == 200) {
                    var data = res.d;

                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<li class="mui-table-view-cell">' + data[i] + '刚刚获得' + name + '</li>'
                    }
                    $('.text-scroll').html(html);
                }
            }, 'json');
        }
    
    
        function autoScroll(obj){ 
            var obj ='#textScroll'; 
            var height = $(obj).find("ul").find("li:first").height(); 
            $(obj).find("ul").animate({  
    
                marginTop : -height
    
            },500,function(){  
    
                $(this).css({marginTop : "0px"}).find("li:first").appendTo(this);  
    
            })  
        }  
        setInterval(autoScroll,2000);
    
      
    
        /** 
         * 帮好友砍价
         * commodityid   商品id
         * bargainid     砍价id
         * bargainactivityid  后台活动id
         */
        function HelpCut(json) {
            $.post('../bargainh5/bargaining', json, function (res) {
                if (res.s == 200) {

                    $('#successPopup').find('.font-red').text(res.d.bargainprice);
                    $('#successPopup').addClass('mui-popup-in');
                    $('body').append(`<div class="mui-popup-backdrop mui-active" style="display: block;"></div>`);
                  
                } else if (res.s == 999) {
                    var btnArray = ['取消', '去首页看看']
                    mui.confirm('同一件商品只能砍价一次哦', '您已经砍过了', btnArray, function (e) {
                        if (e.index == 1) {
                            mui.openWindow({
                                url: '../bargainh5/bargainHome'
                            });
                        }
                    })
                } else if (res.s == 1022){
                    rzConfirm(res.ss);
                }else{
                    mui.toast(res.d);
                }
            }, 'json');
        }
    
        function setTimer(res, obj) {
            // 倒计时
            var info = res.d.info;
     
            setLeftTime(info, timer, obj);
            var timer = setInterval(function () {
                setLeftTime(info, timer, obj);
            }, 1000);
        }
    
        /**
         * 秒杀倒计时
         * @param times 指的是时间开始时间或结束时间，
         * @param nowTime 只的是当前的时间
         */
        function lastTime(times,nowTime,callback) {   
            
            var leftTime=(times-nowTime);
            var hour = Math.floor(leftTime / (1000 * 3600)) ;
            var minute = Math.floor(leftTime / (1000 * 60))  - (hour * 60);
            var second = Math.floor(leftTime / (1000))  - (hour * 60 * 60) - (minute * 60);
            hour = hour<10?'0'+hour:hour;
            minute = minute<10?'0'+minute:minute;
            if(callback){
                callback(hour,minute,second);
            }
        } 
        function setLeftTime(info,timer,obj) {
            var start_time = new Date(info.bargaintime.replace(/-/g,'/')).getTime();
            
            var end_time = start_time + 48*60*60*1000;
            var now_Time = new Date().getTime();
            
            if(now_Time<start_time){  
                //当现在的时间小于开始的时间 ("距离抽奖还有")
                lastTime(start_time,now_Time);
            }else if(now_Time<end_time){
                //当现在的时间大于开始的时间小于现在结尾的时间("距离抽奖结束还有")
                lastTime(end_time,now_Time,function(hour,minute,second){
                
                    $(obj).html('<div class="time"><span>'+hour+'</span>时<span>'+minute+'</span>分</div>')
                });

            }else {  
                //当现在的时间大于结束的时间，说明活动结束。("敬请期待")
                lastTime(now_Time,now_Time);
                clearInterval(timer);
                $(obj).html('<div class="time"><span>00</span>时<span>00</span>分</div>')
                .siblings('span').addClass('font-red').html('已失效&nbsp;')
                $(obj).closest('.mui-card').find('.failed').removeClass('mui-hidden');
                $('.action-box').remove();
            }
        }
    
        mui('.mui-scroll-wrapper').scroll({
            deceleration: 0.0005
        });
      
        
    })(mui, jQuery);
    // })