
$(function () {
  
    
    
    (function (mui, $) {
      
        mui('.mui-scroll-wrapper').scroll({
            indicators: false, //是否显示滚动条
            bounce: false //是否启用回弹
        });
        var flag = GetQueryString('pwd');
        if(flag=='0'){
            mui.confirm('为了方便您下次登录请及时设置登录密码', '您未设置登录密码', ['取消', '立即设置'], function (e) {
                if (e.index == 1) {
                    tools.route('../supvp/setLoginPwd?flag=0') ; 
                }else{
                    // nopwdlogin['reject']=1;
                    // app.storageSave('nopwdlogin',nopwdlogin);
                }
            });
        }
       

        // ============================================================ AJAX ============================================================
        // 获取 banner
        $.post('../api/banner', {position:1}, function (data) {
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
        
        // 获取分类
        $.post('../api/classify', {
            lv:1,
            flag:1
        }, function (data) {
            var data = JSON.parse(data);
            if (data.s == 200) {
                $('#classify_box').html(template('classify_tpl', {d:data.d}));
            }
        });
        
        // 获取活动
        $.post('../api/activity', {}, function (res) {
            var res = JSON.parse(res);
            if (res.s == 200) {
                var data = res.d;
                var zip = '?x-oss-process=image/resize,m_lfit,w_';
                if(Object.keys(data.flash_sale).length!=0){
                    // 数据结构 [ [{},{},{}],[{},{},{}] ]
                    var newArr =[];
                    var list = data.flash_sale.commodity_list;
                    list.forEach((item,i)=>{
                        if((i+1)%3==0){
                            newArr.push( list.slice((i+1)-3, (i+1)) )
                        }
                    });
                    if(list.length%3!=0){
                        newArr.push(list.slice((parseInt(list.length/3)*3), list.length));
                    }
                    data.flash_sale.commodity_list = newArr;
                    $('.section-SecKill').html(template('SecKill_tpl', {d:data.flash_sale,zip:zip}));

                    // 倒计时
                    var starttime =data.flash_sale.starttime*1000;//2019/3/1 18:29:12
                    var endtime =data.flash_sale.endtime*1000;//2019/4/30 18:29:10
                    var nowtime = data.flash_sale.nowtime;
                    setLeftTime(starttime,endtime,nowtime*1000,timer);                                
                    var timer=setInterval(function(){
                        nowtime=(nowtime+1);
                        setLeftTime(starttime,endtime,nowtime*1000,timer);
                    },1000);
                    
                    // slider初始化
                    var SecKillS = mui('#SecKillSlider');
                    SecKillS.slider({
                        interval: 0 
                    });
                }
                // 精选分期
                if(Object.keys(data.instalment).length!=0){

                    $('.section-stage').html(template('showGoods_tpl', {d:data.instalment,zip:zip}));
                }
               
                //专题推荐
                if(Object.keys(data.subject).length!=0){
                    var html=`
                    <section class="custom-bg-color-white page-section-26">
                        <div class="module section-main-brand subject">
                            
                        </div>
                    </section>`;
                    $('#wrapper-scroll .section-stage').parent().after(html);
                    $('.subject').append(template('showGoods_tpl', {d:data.subject,zip:zip}));
                }
                
                // 品牌专题
                if(Object.keys(data.recommend).length!=0){
                    var html=`
                    <section class="custom-bg-color-white page-section-26">
                        <div class="module section-main-brand recommend">
                            
                        </div>
                    </section>`;
                    $('#wrapper-scroll .section-stage').parent().after(html);
                    $('.recommend').html(template('showGoods_tpl', {d:data.recommend,zip:zip}))
                }
            }
        });


        //  推荐
        $.post('../api/getRecommend', {}, function (res) {
            // console.log(res)
            var data = JSON.parse(res);
            var zip = '?x-oss-process=image/resize,m_lfit,w_';
            if(data.s==200){
                $('#recommendlist').html(template('recommend_tpl',{d: data.d,zip:zip}));

            }
        });
        
        /**
         * 秒杀倒计时
         * @param times 指的是时间开始时间或结束时间，
         * @param nowTime 只的是当前的时间
         */
        // var end_time= new Date(new Date().setHours(23, 59, 59, 999)).getTime()+1;
        function lastTime(times,nowTime) {   
            
            var leftTime=(times-nowTime);
            var day=Math.floor(leftTime/(1000*60*60*24));
            var hour = Math.floor(leftTime / (1000 * 3600)) - (day * 24);
            var minute = Math.floor(leftTime / (1000 * 60)) - (day * 24 * 60) - (hour * 60);
            var second = Math.floor(leftTime / (1000)) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
     
            if(day){
                $('#countDownTime').html('<strong>'+day+'<span>天</span></strong><div class="time"><span>'+(hour<10?"0"+hour:hour)+'</span><small>:</small><span>'+(minute<10?"0"+minute:minute)+'</span><small>:</small><span>'+(second<10?"0"+second:second)+'</span></div>')
            }else{
                $('#countDownTime').html('<div class="time"><span>'+(hour<10?"0"+hour:hour)+'</span><small>:</small><span>'+(minute<10?"0"+minute:minute)+'</span><small>:</small><span>'+(second<10?"0"+second:second)+'</span></div>')
            }
        } 
        function setLeftTime(start_time,end_time,now_Time,timer) {
            // var now_Time= new Date().getTime();

            if(now_Time<start_time){  
                //当现在的时间小于开始的时间 ("距离抽奖还有")
                lastTime(start_time,now_Time);
            }else if(now_Time<end_time){
                //当现在的时间大于开始的时间小于现在结尾的时间("距离抽奖结束还有")
                lastTime(end_time,now_Time)
            }else {  
                //当现在的时间大于结束的时间，说明活动结束。("敬请期待")
                lastTime(now_Time,now_Time);
                clearInterval(timer);
            }
        }
        

        
        /* ==================================================== 页面跳转 ==================================================*/
    

        // 底部 a链接页面跳转
        // 当前页面为选中状态
        activeFoot(0);
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

        // 跳转至分类
        mui('#classify_box').on('tap', 'li', function (e) {
            var id = this.id.split('_')[1],
                index = $(this).index(),
                brandname = $(this).find('span').text();

            if(index == $('#classify_box li').length-1){
                var firstId = $('#classify_box li:eq(0)').attr('id').split('_')[1];
                tools.route('classify?id='+firstId);
                return;
            }
            tools.route('brandItem?selectid='+id+'&brandname='+brandname);
        });

        // 商品详情页
        mui('.module').on('tap', 'li.mui-media', function (e) {
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
        });  
        mui(document).on('tap', '.section-main-brand li', function (e) {
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
        });                 
        mui('.module').on('tap', '.module-main-commodity', function (e) {
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
        });
        
        // banner详情页
        mui('#bannerSlider').on('tap', '.mui-slider-item', function (e) {
            var url = this.dataset.url,
            title = this.dataset.title;
            tools.route(url+'&type=web&title='+title);
        });
        // 活动详情
        $(document).on('tap', '.module-big-img img', function () {
            var url = this.dataset.url,
            title = this.dataset.title;
            tools.route(url+'&type=web&title='+title);
        });
        // 搜索
        $(document).on('tap', '.mm-search', function () {
            tools.route('../supvp/search');
        });
        
        var tools = {
            route: function (url) {
                mui.openWindow({
                    url: url
                });
            }
           
        }
    })(mui, jQuery);
});