<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>额度管理</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitMange.css" />
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll page-section-30">
                <section class="limit-card">
                    <div>
                        <p class="font-light-blue text-size-15">已获取总额度(元)</p>
                        <span id="creditlimit" class="font-SFU text-size-39">0.00</span>
                    </div>    
                    <div>
                        <p class="font-light-blue text-size-13">可用额度(元)</p>
                        <span id="balancelimit" class="font-SFU text-size-23">0.00</span>                        
                    </div>
                </section>

                <section class=" banner-box">
                    <img width="100%" src="<?= base_url() ?>public/images/limit/go.png" alt="">
                </section>

                <section class="margin-h-10">
                    <div class="limit-hd">
                        <img width="100%" src="<?= base_url() ?>public/images/limit/title.png" alt="">
                    </div>
                    <ul class="mui-table-view authentication-box">

                    </ul>
                </section>
            </div>
        </div>  


        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
       
        <script>

            $(function () {

                mui.init();

                ;
                (function (mui, $) {

                
                  
                    $.post('../user/limit', {}, function (res) {
                        if (res.s == 200) {
                            var limit = res.d.limit;
                            var info = res.d.info;
                           $('#creditlimit').text(limit.creditlimit);
                           $('#balancelimit').text(limit.balancelimit);
                           creatDom(info)
                        }
                    }, 'json');
                    
                  
 
                    

                    // ========================================== 清空历史记录 =======================================
                 
                 
                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005 //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006
                    });

                    mui('.authentication-box').on('tap','li',function(){
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

                    mui('.banner-box').on('tap','img',function(){
                        tools.route('index');
                    });
                    // ========================================== 工具方法 =======================================
                    function creatDom(data){
                        var html='',index=1;
                        for(var key in data){
                            if(key=='idcard'){
                                html+='';
                            }else{
                                html+=`<li data-state="${data[key]}" data-rz="${key}" class="mui-table-view-cell">
                                    <a class="mui-navigate-right text-size-15">
                                        <img src="<?= base_url() ?>public/images/limit/limit_${index}.png">
                                        ${setInfoName(key)}
                                        <span class="mui-pull-right text-size-13 ${setInfoColor(data[key])}">${key=='social_contact'?data[key]+'/6':setInfoType(data[key])}</span>
                                    </a>
                                </li>`;
                                index++;
                            }
                        }   
                         $('ul').html(html);
                    }
                    function setInfoType(type) {
                        var format = '';
                        switch (type) {
                            case '0':
                                format = "待认证";
                                break;
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
                            case '0':
                                format = "font-blue";
                                break;
                            case '1':
                                format = "font-turmeric";
                                break;
                            case '2':
                                format = "font-red";
                                break;
                            case '3':
                                format = "font-purple";
                                break;
                        }
                        return format;               
                    }
                    function setInfoName(name) {
                        var format = '';
                        switch (name) {
                            case 'profession':
                                format = "职业认证";
                                break;
                            case 'family':
                                format = "家庭认证";
                                break;
                            case 'credit_card':
                                format = "信用卡认证";
                                break;
                            case 'education':
                                format = "学历认证";
                                break;
                            case 'taobao':
                                format = "淘宝认证";
                                break;
                            case 'jd':
                                format = "京东认证";
                                break;
                            case 'reserved':
                                format = "公积金认证";
                                break;
                            case 'social_security':
                                format = "社保认证";
                                break;
                            case 'social_contact':
                                format = "社交认证";
                                break;
                        }
                        return format;               
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