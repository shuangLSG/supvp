<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>社交认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />

        <style>
            .page-section-60{
                padding-bottom:0;
            }
            
            
        </style>
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll rzSocialContact-container ">
                <section class="limit-hd page-section-60">
                    <h2 class="text-size-25 font-black">社交认证</h2>
                    
                </section>

                <section class="limit-bd page-section-30">
                    <ul class="mui-table-view line-none">
                        
                    </ul>
                </section>
                
            </div>
        </div>  


        <script id="list_tpl" type="text/html">
            {{each  d cell}} 
                <li data-state="{{cell.status}}" class="mui-table-view-cell custom-flex">
                    <img class="logo" src="<?= base_url() ?>public/images/icons/{{cell.img}}" alt="">
                    {{if cell.text}}
                        <span class="text-size-15">{{cell.text}}</span>
                    {{else}}
                        <span class="text-size-15">{{cell.socialcontact|setName cell.account}}</span>
                    {{/if}}

                    {{if cell.text}}
                        <img class="arrow" src="<?= base_url() ?>public/images/icons/social_arrow.png" alt="">
                    {{else}}
                        <span class="{{cell.status|setInfoColor}} state">{{cell.status|setInfoType}}</span>
                    {{/if}}
                </li>
            {{/each}}
        </script>

        <script id="top_tpl" type="text/html">
            {{if s==200}}
                <div class="limit-content success">
                    <span class="font-SFU text-size-30">0</span>
                    <p class="font-purple tetx-size-12">成功获取额度(元)</p>
                </div>
            {{else}}
                <div class="limit-content">
                    <span class="font-SFU text-size-30 font-deep-purple">3,000</span>
                    <p class="font-purple tetx-size-12">最高可提升额度(元)</p>
                </div>
            {{/if}}
        </script>    

        <script>
            function setInfoType(type) {
                var format = '';
                switch (type) {
                    case '1':
                        format = "认证中";
                        break;
                    case '2':
                        format = "认证失败";
                        break;
                    case '3':
                        format = "已认证";
                        break;
                }
                return format;               
            }
            function setInfoColor(type) {
                var format = '';
                switch (type) {
                    case '1':
                        format = "font-turmeric";
                        break;
                    case '2':
                        format = "font-red";
                        break;
                    case '3':
                        format = "font-blue";
                        break;
                }
                return format;               
            }
            function setName(type,account) {
                var format = '';
                switch (type) {
                    case 'wx':
                        format = "微信";
                        break;
                    case 'zfb':
                        format = "支付宝";
                        break;
                    case 'email':
                        format = "电子邮箱";
                        break;
                    case 'qq':
                        format = "QQ号";
                        break;
                    case 'weibo':
                        format = "微博";
                        break;
                    case 'douyin':
                        format = "抖音";
                        break;
                }
                
                return format+'账号:'+ account;               
            }
        </script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
       
        <script>
            var list=[{
                'socialcontact':'wx',
                'img':'social_1.png',
                'text':'微信认证额度+1000'
            },{
                'socialcontact':'zfb',
                'img':'social_2.png',
                'text':'支付宝认证额度+3000'
            },{
                'socialcontact':'email',
                'img':'social_3.png',
                'text':'电子邮箱认证额度+500'
            },{
                'socialcontact':'qq',
                'img':'social_4.png',
                'text':'QQ号认证额度+3000'
            },{
                'socialcontact':'weibo',
                'img':'social_5.png',
                'text':'微博认证额度+500'
            },{
                'socialcontact':'douyin',
                'img':'social_6.png',
                'text':'抖音认证额度+500'
            }]
            $(function () {

                mui.init();                
                (function (mui, $) {

                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                    mui('.mui-table-view').on('tap','li',function(){
                        var pages=['rzWX','rzZFB','rzEmail','rzQQ','rzWeiBo','rzDouYin']
                        var index = $(this).index();
                        var state = this.dataset.state;

                        if(state == '1'){//审核
                            tools.route('auditing'); 
                        }else if(state == '2'){//拒绝
                            tools.route('rzFailed?page='+pages[index]); 
                        }else if(state == '3'){ //通过                  
                        
                        }else{
                            // tools.route(pages[index]);

                            var pages=['wx','zfb','email','qq','weibo','douyin']
                            tools.route('rzSocialContactItem?type='+pages[index]);
                        }
                    });
                         

                    // ========================================== 工具方法 =======================================

                  

                    $.post('../user/querySocialContact', {}, function (res) {
                        
                        $('h2').after(template('top_tpl',res));
                        
                        if (res.s == 200) {
                            var limit=0;
                            for(var key in res.d) {
                                list.forEach(item=>{
                                    if(key == item.socialcontact && !$.isEmptyObject(res.d[key])){
                                        delete item.text;
                                        Object.assign(item,res.d[key]);
                                        limit+= Number(res.d[key]['limit']);
                                    }
                                });
                            }     
                            $('.limit-content .font-SFU').text(limit);
                            $('ul.mui-table-view').html(template('list_tpl',{d:list}));
                            
                        }else{
                            $('ul.mui-table-view').html(template('list_tpl',{d:list}))
                        }
                    }, 'json');



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