<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/banner.css" />
        
        <style>
            .bg-2{
                background-image: url("http://image.bfy100.com/1555330432.png");
                background-size: 100% 100%;
                background-repeat:no-repeat;    
                height: 100%;
            }
            .bg-3{
                background-image: url("http://image.bfy100.com/1555330454.png");
                background-size: 100% 100%;
                background-repeat:no-repeat;    
                height: 150%;
            }
            .mui-table-view{
                padding: 0 0.26rem;
                box-sizing: border-box;
            }
            .mui-table-view li{
                margin-bottom:0.453rem;
                padding: 0 !important;
                background-color: rgba(255,255,255,0.6);
            }
            .pull-left{
                float:left;
            }
            .pull-right{
                float:right;
            }
            .font-black{
                color:#372521;
            }
            .font-red{
               color: #80373B !important;
            }
            .font-red span{
                font-size:0.586rem;
            }
            .padding-top-75{
                padding-top: 1rem;
            }
            .mui-table-view-cell img{
                width: 4rem;
                height: 4rem;
                margin:0;
            }
            .custom-list-box .custom-brand-info{
                padding: 0.5rem 0.4rem 0 0.4rem;
                /* 0.56rem */
            }
            .custom-list-box .custom-brand-info h3{
                line-height: 1.3;
                text-decoration: underline;
            }
            .custom-list-box .custom-brand-info p.text-size-12 {
                margin-top: 0.1rem;
                margin-bottom: 0.1rem;
                line-height: 1.2;
            }
            .custom-list-box .position-bottom{
                bottom: 0.26rem;
                width: 85%;
            }
            .custom-list-box .custom-brand-info .action-box{
                padding: 0.14rem 0;
                overflow: hidden;
                clear:both;
            }
            .custom-list-box .custom-brand-info .action-box >span{
                position: relative;
                top: 0.3rem
            }
            p.text-size-12>span:last-child{
                margin-left:0.2rem;
                text-decoration: line-through;
                color:#928683;
            }
            button{
                width:2.293rem;
                height:0.8rem;
                font-size:0.373rem;
                color:#fff !important;
                background:rgba(128,55,59,1);
                border-radius: 0;
                border: none;
                outline: none;
                -webkit-appearance: none;
                -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            }
        </style>       
    </head>
    <body>

        <img width="100%" src="http://image.bfy100.com/1555330410.png" alt="">

        <!--start 商品展示列表 -->
        <ul class="mui-table-view bg-2 padding-top-75">
            
        </ul>

        <ul class="mui-table-view bg-3">
            
        </ul>
        <!--end 商品展示列表 -->



        <script id="page_tpl" type="text/html">
            {{each d item}}
            <li data-id="{{item[0].id}}" data-share="{{item[0].share}}" data-app="{{item[0].url}}" class="mui-table-view-cell">
               <div class="custom-list-box custom-flex">
                    <img style=" " src="{{item[0].img_750_1050+zip}}300"/>
                    <div class="custom-brand-info"> 
                        <h3 class="text-size-16 custom-white-space-2">{{item[0].name}}</h3>
                        <p class="text-size-12 font-black">
                            {{each item[0].l_type type}}
                                {{type.list[0]}}&nbsp;
                            {{/each}}
                        </p>
                        <div class="position-bottom">
                            <p class="font-black text-size-12"><span><small class="text-size-9">&yen;</small>{{item[0].activity_price}}</span><span><small class="text-size-9">¥</small>{{item[0].price}}</span></p>
                            <div class="action-box">
                                <span class="font-red text-size-12">月供<small>&yen;</small><span class="font-MarkPro">{{item[0].amortize}}</span></span>
                                <button class="pull-right">立即购买</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li data-id="{{item[1].id}}"  data-share="{{item[1].share}}" data-app="{{item[1].url}}" class="mui-table-view-cell">
                <div class="custom-list-box custom-flex"> 
                    <div class="custom-brand-info"> 
                        <h3 class="text-size-16 custom-white-space-2">{{item[1].name}}</h3>
                        <p class="text-size-12 font-black">
                            {{each item[1].l_type type}}
                                {{type.list[0]}}&nbsp;
                            {{/each}}
                        </p>
                        <div class="position-bottom">
                            <p class="font-black text-size-12"><span ><small class="text-size-9">&yen;</small>{{item[0].activity_price}}</span><span><small class="text-size-9">¥</small>{{item[0].price}}</span></p>
                            <div class="action-box">
                                <span class="font-red text-size-12">月供<small class="text-size-9">&yen;</small><span class="font-MarkPro">{{item[1].amortize}}</span></span>
                                <button class="pull-right">立即购买</button>
                            </div>
                        </div></div>
                    <img style=" " src="{{item[1].img_750_1050+zip}}300"/>
                </div>
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

        $(function () {

            mui.init();

            var title = decodeURIComponent(GetQueryString('title'));
            document.title=title;
            (function (mui, $) {

                var id = GetQueryString('id');
                $.post('../ActivityH5/h5Activity', {
                    'activity_id':id
                }, function (res) {
                    if (res.s == 200) {
                        var data = res.d,newArr=[];
                        data.forEach((item, i) => {
                            item.l_type = setTypeData(item).typeArr;
                            var arr=[];
                            if((i+1)%2==0){
                                arr.push(data[i-1]);
                                arr.push(data[i]);
                                newArr.push(arr);
                            }
                        });  
                        console.log(newArr)
                  
                        $('.mui-table-view:eq(0)').html(template('page_tpl',{d:newArr.slice(0,2),zip:zip}));
                        $('.mui-table-view:eq(1)').html(template('page_tpl',{d:newArr.slice(3,4),zip:zip}))
                    }
                }, 'json');


                // 商品详情
                mui('.mui-table-view').on('tap','button',function(){
                    var $parent=this.closest('li');
                    var id=$parent.dataset.id,
                        appLink=$parent.dataset.app,
                        share=$parent.dataset.share;
                    linkToDetail(id,appLink,share);
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
                    return isAndroid == true ? true : false;
                }
                
                var tools = {
                    route: function (url) {
                        mui.openWindow({
                            url: url
                        });
                    }
                }
            })(mui, jQuery);
        });   

    </script>
</html>