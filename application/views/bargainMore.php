<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>0元砍价免费拿</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/bargain.css" />
        <style>
            .bg-red{
                background-color:#EB4744;
            }
            .logo{
                width: 4.8rem;
                position: absolute;
                left: 50%;
                transform: translate(-2.4rem);
            }
            .address-box{
                justify-content: center;
            }
        </style>
    </head>

    <body>
        <!-- 顶部img 我的砍价商品btn-->
        <img id="link-home" class="suspend-btn" src="<?= base_url() ?>public/images/bargain/go_home.png" alt="">
                
        <div class="mui-scroll-wrapper mui-content bg-red">
            <div class="mui-scroll bargin-detail bargin-more">
                <!-- logo -->
                <img class="logo" src="<?= base_url() ?>public/images/bargain/logo_bg.png" alt="">
                
                <div class="main-content">
                   
                    <div id="infotitle" class="custom-card-info">
                        <img id="head-icon" src="">
                        <div class="custom-card-info-box">                           
                            <h4 id="phone"></h4>
                            <p>我发现可以免费拿的好东西，快来帮我砍一下</p>
                        </div>                           
                    </div>
                    
                </div>
            </div>
        </div>

        <div id="address_popover" class="mui-popover mui-popover-action mui-popover-bottom custom-popover">
            <div class="mui-card address-box">
                <div class="mui-card-header">
                    <strong>配送至</strong>
                    <i class="mui-icon mui-icon-closeempty"></i>
                </div>
                <div class="mui-card-content">
                    <div class="mui-card-content-inner">
                        <div class="content-wrapper">
                            <ul class="mui-table-view mui-text-left">
                                {{include 'address_tpl' d}}
                            </ul>
                            <div class="custom-flex-c to-addaddress"><strong class="font-red text-size-15">+新增收货地址</stro></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script id="address_tpl" type="text/html">
        {{each d cell}}
            <li data-id="{{cell.id}}" data-address="{{cell.address}}" data-capital="{{cell.capital}}" data-city="{{cell.city}}" id="address_{{cell.id}}" class="mui-table-view-cell">
                <div class="mui-input-row  mui-radio">
                    <label data-id="1" data-price="300">
                        <div class="address-content">
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
            </li>
            {{/each}}
        </script>

        <script id="card_tpl" type="text/html">
             {{each d cell index}}
             <div data-state="{{state}}" id="goods_{{cell.id}}" class="mui-card">
                <div class="mui-card-header">
                    <div class="skill-timer custom-flex-c">
                        {{if cell.state==2&&deliver==1}}
                            <span class="font-yellow">等待发货中，请注意查收</span>
                        {{else if cell.stock==0}}
                            <span data-state="{{cell.stock}}">已售罄</span>
                        {{else}}
                            {{if state=='finish'}}
                                <span class="font-red">砍价成功&nbsp;</span>
                            {{else if state=='past'}}
                                <span class="font-red">已失效&nbsp;</span>
                            {{else}}
                                <span>任务倒计时：</span>
                            {{/if}}
                            <section data-index="{{index}}" class="countDownTime-box"><div class="time"><span>00</span>时<span>00</span>分</div></section>
                        {{/if}}
                    </div>
                </div>
                <div class="mui-card-content">
                    <!-- 商品列表 -->
                    <div class="list-container">
                        <ul class="mui-table-view">
                            {{include 'list_tpl' cell}}
                        </ul>
                    </div>
                </div>
            </div>
        {{/each}}
        </script>


         <script id="list_tpl" type="text/html">
            <li data-commodityid="{{commodityid}}" data-bargainactivityid="{{bargainactivityid}}" data-bargainid="{{id}}" class="mui-table-view-cell">
                <div class="mui-slider-handle custom-flex">
                    <div class="custom-list-box custom-flex">
                        {{if past==1}}    
                            <img class="custom-list-pic failed" src="<?= base_url() ?>public/images/bargain/failed.png" width="100%" alt="">
                        {{/if}}
                        <img class="custom-list-pic" src="{{img}}" width="100%" alt="">
                        <div class="custom-brand-info">
                            <h3 class="text-size-13 custom-white-space-2"><strong>{{name}}</strong> </h3>
                            <div class="position-bottom">
                            {{if state==2&&deliver==1}}
                                <span class="font-red">已填写收货地址</span>
                            {{else if state==1&&deliver==1}}
                                <button class="mui-btn add-address">请及时填写收货地址</button>
                            {{else}}
                                <div class="progress-box">
                                    <div class="progress">
                                        <span style="width:{{percent}}"></span>
                                    </div>
                                    <p id="bargainprice" class="mui-text-center">已砍<span class="font-red">{{bargainprice}}</span>元,还差<span id="newprice" class="font-red">{{newprice}}</span>元</p>
                                </div>
                            {{/if}}   
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </script>


        <script>
            var zip = '?x-oss-process=image/resize,m_lfit,w_';
            function isNum2(val) {
                var number,val = val.toString(); 
                if (val.indexOf(".") != -1 && (val.substring(val.indexOf("."), val.length).length > 3)) {
                    var point = val.indexOf(".");
                    number = val.substring(0,point+3);
                } else {
                    number = val;
                }
                return number;
            }
        </script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript" charset="utf-8"></script>
        
        <script>	 
            $(function () {

                mui.init();
                (function (mui, $) {

              
                    /** 
                     * 商品列表展示
                     * commodityid   商品id
                     * bargainid     砍价id
                    */
              
                    $.post('../bargainh5/queryAllBargain', {
                            'bargainactivityid':1
                        }, function (res) {
                            if (res.s == 200) {
                                var data = res.d,
                                info = data.info;
                                
                                var allData = [];
                                for(var key in data){
                                    if(key == 'going' || key == 'finish'|| key == 'past'){
                                        for(var children in data[key]){
                                            allData.push(data[key][children]);
                                        }
                                    }
                                }
                                $.each(allData,function(i,item){
                                    var bargainprice = isNum2((Number(item.oldprice) - Number(item.newprice))),
                                        percent = (bargainprice/item.oldprice*100).toFixed(2)+'%';
                                    
                                    item.bargainprice = bargainprice;
                                    item.percent = percent;
                                });
                                
                                // 本人信息 
                                $('#head-icon').attr({'src':data.info.userphoto});
                                $('#phone').text(data.info.mobile);
                                
                                $('#infotitle').after(template('card_tpl',{d:data.going,zip:zip,state:'going'}));
                                $('#infotitle').after(template('card_tpl',{d:data.finish,zip:zip,state:'finish'}));
                                $('.main-content').append(template('card_tpl',{d:data.past,zip:zip,state:'past'}));

                                var $times = $('.countDownTime-box');
                                $.each($times,function(i,item){
                                    var state = $(item).closest('.mui-card').attr('data-state'),// 商品状态
                                        index = $(item).attr('data-index');// 对应不同状态下数据的索引
                                    if(state=='finish'){
                                        var finish = res.d.finish;
                                        setTimer(finish[index],$(item));
                                    }else if(state =='going'){
                                        var going = res.d.going;
                                        setTimer(going[index],$(item));
                                    }
                                })
                                
                            }

                    }, 'json');

                    // 展示地址的弹框
                    mui('.main-content').on('tap','.add-address',function(){
                        var bargainid = $(this).closest('li').attr('data-bargainid');
                        mui('#address_popover').popover('show');
                        $('#address_popover').attr('data-bargainid',bargainid);
                    });
                    mui('#address_popover').on('tap','.to-addaddress',function(){
                        var bargainid =$('#address_popover').attr('data-bargainid');
                        mui.openWindow({ //带入bargainid
                            url: '../supvp/newAddress?page='+bargainid
                        });
                    });  
                    // 查看砍价的详情
                    mui('.main-content').on('tap','.mui-card',function(e){
                        if(this.dataset.state=='going'){
                            var state = $(this).find('.skill-timer span').attr('data-state');
                            if(state=='0'){
                                mui.toast('已售罄');
                                return;
                            } 
                            
                            // 查看砍价中的详情
                            var  $li = $(this).find('li'),
                                bargainid = $li.attr('data-bargainid')
                                commodityid = $li.attr('data-commodityid');
                            mui.openWindow({ 
                                url: '../bargainh5/bargainDetail?bargainid='+bargainid+'&commodityid='+commodityid
                            }); 
                        }else if(this.dataset.state=='finish'&& e.target.tagName!='BUTTON'){
                            var state = $(this).find('.skill-timer span').attr('data-state');
                            if(state=='0'){
                                mui.toast('已售罄');
                                return;
                            } 
                            mui.toast('已砍价成功');
                        }else if(this.dataset.state=='past'){
                            mui.toast('已失效，无法查看详情');
                        }
                    }); 
                     
                   
                    // 左侧悬浮按钮
                    document.getElementById('link-home').addEventListener('tap', function () {
                        mui.openWindow({
                            url: '../bargainh5/bargainHome'
                        });
                    });
                    document.querySelector('#address_popover').addEventListener('tap',function(e){
                        var $target = e.target.classList;
                        if($target.contains('.to-addaddress')){
                            mui.openWindow({ 
                                url: '../supvp/editAddress'
                            });
                        }else if($target.contains('mui-icon-closeempty')){
                            mui('#address_popover').popover('hide');
                        }else if(e.target.tagName=="INPUT"){
                            editAddress(e.target);
                        }
                    });
                    
                    getAddress();
                    // 获取收货地址
                    function getAddress(){
                        $.post('../address/getAddress', {}, function (data) {
                            if (data.s == 200) {
                                $('#address_popover .mui-table-view').html(template('address_tpl',{d:data.d}));
                            }
                        }, 'json');
                    }
                    // 修改默认地址
                    
                    function editAddress(el){
                        var obj = $(el).closest('li'),
                            bargainid = $('#address_popover').attr('data-bargainid'),
                            capital = obj.attr('data-capital'),
                            city = obj.attr('data-city'),
                            address = obj.attr('data-address');
                            str = capital+','+city+','+address;
                
                        $.post('../bargainh5/bargainAddress',{
                            'address':str,
                            'bargainid':bargainid
                        },function(res){
                            if(res.s==200){
                                mui('#address_popover').popover('hide');
                                window.location.reload();
                            }
                        },'json');
                    }
                

                    /** 
                     * 帮好友砍价
                     * commodityid   商品id
                     * bargainid     砍价id
                     * bargainactivityid  后台活动id
                    */
                    function HelpCut(json){
                        $.post('../bargainh5/bargainHomeing', json, function (res) {
                            if (res.s == 200) {
                                $('#successPopup').find('.font-red').text(res.d.bargainprice);
                            
                                $('#successPopup').addClass('mui-popup-in').attr('data-type','home'); 
                                $('body').append(`<div class="mui-popup-backdrop mui-active" style="display: block;"></div>`);   
                            }else if(res.s == 9999){
                                var btnArray = ['取消','去首页看看']
                                mui.confirm('同一件商品只能砍价一次哦', '您已经砍过了', btnArray, function (e) {
                                    if (e.index == 1) {
                                        mui.openWindow({ 
                                            url: '../bargainh5/bargainHome'
                                        });
                                    } 
                                })
                            }else{
                                mui.toast(res.d);
                            }
                        }, 'json');
                    }
                    
                    function setTimer(going,obj){
                        setLeftTime(going,timer,obj);                                
                        var timer = setInterval(function(){
                            setLeftTime(going,timer,obj);
                        },1000);
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
                        }
                    }
                    
                  
                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                })(mui, jQuery);
            })
        </script>
    </body>

</html>