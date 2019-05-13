<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll rzSuccess-container">
                <section class="limit-hd page-section-60 padding-bt-0">
                    <h2 class="text-size-25 font-black">恭喜您，认证成功</h2>
                    <div class="limit-content">
                        <span class="font-SFU text-size-30">2,0000</span>
                        <p class="font-purple text-size-12">成功获取额度(元)</p>
                    </div>
                </section>

                <section class="limit-bd margin-h-10">
                    <ul class="mui-table-view">
                       
                    </ul>
                </section>

                <p class="re-certification mui-text-center mui-hidden font-gray text-size-13">重新认证?</p>
                
            </div>
        </div>  

        <script id="taobao_tpl" type="text/html">
            <li data-state="{{cell.status}}" class=" mui-table-view-cell custom-flex">
                <img class="logo" src="<?= base_url() ?>public/images/limit/taobao.png" alt="">
                <span class="text-size-15">淘宝账户:{{cell.account}}</span>
                <span class="{{cell.status|setInfoColor}} state">{{cell.status|setInfoType}}</span>
            </li>
        </script>


        <script id="jd_tpl" type="text/html">
            <li data-state="{{cell.status}}" class="mui-table-view-cell custom-flex">
                <img class="logo" src="<?= base_url() ?>public/images/limit/JD.png" alt="">
                <span class="text-size-15">京东账户:{{cell.account}}</span>
                <span class="{{cell.status|setInfoColor}} state">{{cell.status|setInfoType}}</span>
            </li>
        </script>

        <!-- 职业认证-->
        <script id="profession_tpl" type="text/html">
            <li class="mui-table-view-cell font-gray">
                公司名称<span class="mui-pull-right font-black">{{d.name}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                职业类别<span class="mui-pull-right font-black">{{d.profession}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                工作岗位<span class="mui-pull-right font-black">{{d.station}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                税前月薪(元)<span class="mui-pull-right font-black">{{d.wage}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                公司地址<span class="mui-pull-right font-black">{{d.area}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                详细地址<span class="mui-pull-right font-black">{{d.address}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                公司电话<span class="mui-pull-right font-black">{{d.telephone}}</span>
            </li>
        </script>

        <!-- 家庭认证-->
        <script id="family_tpl" type="text/html">
            <li class="mui-table-view-cell font-gray">
                所在地区<span class="mui-pull-right font-black">{{d.area}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                详细地址<span class="mui-pull-right font-black">{{d.address}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                婚姻状况<span class="mui-pull-right font-black">{{d.marital==1?'已婚':'未婚'}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                子女情况<span class="mui-pull-right font-black">{{d.children==1?'有':'无'}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                直系亲属1<span class="mui-pull-right font-black">{{d.linkman|setLinkman 0}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                直系亲属2<span class="mui-pull-right font-black">{{d.linkman|setLinkman 1}}</span>
            </li>
        </script>

        <!-- 教育查询 -->
        <script id="education_tpl" type="text/html">
            <li class="mui-table-view-cell font-gray">
                最高学历<span class="mui-pull-right font-black">{{d.educational}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                毕业学校<span class="mui-pull-right font-black">{{d.school}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                毕业年份<span class="mui-pull-right font-black">{{d.year}}</span>
            </li>
        </script>

        <!-- 公积金 -->
        <script id="reserved_tpl" type="text/html">
            <li class="mui-table-view-cell font-gray">
                缴纳公积金所在城市<span class="mui-pull-right font-black">{{d.city}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                公积金查询账户<span class="mui-pull-right font-black">{{d.account}}</span>
            </li>
        </script>

        <!-- 社保 -->
        <script id="social_security_tpl" type="text/html">
            <li class="mui-table-view-cell font-gray">
                缴纳社保所在城市<span class="mui-pull-right font-black">{{d.city}}</span>
            </li>
            <li class="mui-table-view-cell font-gray">
                社保查询账户<span class="mui-pull-right font-black">{{d.account}}</span>
            </li>
        </script>

        <script>
            function setLinkman(jsonstr,i){
                var json = JSON.parse(jsonstr);
                return json[i]['relations']+'-'+json[i]['name']+'-'+json[i]['mobile'];
            }
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
        </script>
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>

            $(function () {

                mui.init();
                (function (mui, $) {


                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });


                    // ========================================== 工具方法 =======================================

                    var tools = {
                        route: function (url) {
                            mui.openWindow({
                                url: url
                            });
                        },
                        GetQueryString: function(param, url) {
                            var currentUrl = url || window.location.href; //获取当前链接
                            var arr = currentUrl.split("?"); //分割域名和参数界限
                            if (arr.length > 1) {
                                arr = arr[1].split("&"); //分割参数
                                for (var i = 0; i < arr.length; i++) {
                                    var tem = arr[i].split("="); //分割参数名和参数内容
                                    if (tem[0] == param) {
                                        return tem[1];
                                    }
                                }
                                return null;
                            } else {
                                return null;
                            }
                        },
                        queryRZ:function(callback) {
                            var rz = this.GetQueryString('rz');
                            var api = this.setAjaxUrl(rz),
                                url='../user/'+api;
                            
                            $.post(url,{}, function (res) {
                                if (res.s == 200) {
                                    callback(res);
                                }
                            }, 'json');
                        },
                        setAjaxUrl:function(rz){
                            var url='';
                            if(rz=='social_security'){
                                url='querySocialSecurity';
                            }else if(rz=='reserved'){
                                url='queryReserved';
                            }else if(rz=='profession'){
                                url='queryProfession';
                            }else if(rz=='family'){
                                url='queryFamily';
                            }else if(rz=='education'){
                                url='queryEducation';
                            }else if(rz=='taobao'){
                                url='queryTaobao';
                            }else if(rz=='jd'){
                                url='queryJD';
                            }
                            return url;
                        }
                    }

                    tools.queryRZ(function(res){
                        var rz = tools.GetQueryString('rz');
                        
                        $('.limit-content span').text(res.d.limit); // 认证额度  

                        if(rz=='profession'||rz=='family'){//职业认证
                            $('ul').html(template(rz+'_tpl',res));
                            $('.re-certification').removeClass('mui-hidden');  

                        }else if(rz=='taobao'){
                            
                            $('ul').addClass('line-none').html(template('taobao_tpl',{cell:res.d}));
                            $('.limit-bd').addClass('other'); 

                        }else if(rz=='jd'){
                            $('ul').html(template('jd_tpl',{'cell':res.d}));
                            $('.limit-bd').addClass('other'); 
                        }
                        
                        
                       
                        $('ul').html(template(rz+'_tpl',res));
                    });
                    
                    // 重新认证
                    document.querySelector('.re-certification').addEventListener('tap',reCertification)

                    function reCertification(){
                        var rz = tools.GetQueryString('rz');
                        var url = 'rz'+ rz.replace(/( |^)[a-z]/g, (L) => L.toUpperCase());
                        if(!$('.re-certification').hasClass('mui-hidden')){
                            tools.route(url); // PS: rzProfession
                        }
                    }
                   
                })(mui, jQuery);
            })
        </script>
    </body>

</html>