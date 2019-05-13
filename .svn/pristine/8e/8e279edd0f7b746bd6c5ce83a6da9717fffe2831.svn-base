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
            <div class="mui-scroll  page-section-60 rzCreditCardSuccess-container">
                <section class="limit-hd padding-bt-0">
                    <h2 class="text-size-25 font-black">恭喜您，认证成功</h2>
                    <div class="limit-content">
                        <span class="font-SFU text-size-30">0</span>
                        <p class="font-purple text-size-12">最高可提升额度(元)</p>
                    </div>
                </section>

                <section class="limit-bd margin-h-10">
                    <ul class="mui-table-view">
                       
                    </ul>
                </section>

                <p class="re-certification mui-text-center mui-hidden font-gray text-size-13">重新认证?</p>
                
            </div>
        </div>  


        <!-- 职业认证-->
        <script id="credit_card_tpl" type="text/html">
        {{each d cell}}
            <li class="mui-table-view-cell mui-text-center">
                <span class="font-SFU">{{cell.cardno}}</span>   
                <p class="{{cell.status |setInfoColor}} text-size-15">{{cell.bank|setBank cell.status}}</p>
            </li>
        {{/each}}  
            <li id="link-rzCreditCard" class="mui-table-view-cell mui-text-center">
                <img style="width:1.253rem" src="<?= base_url() ?>public/images/limit/credit_card_add.png" alt="">   
                <p class="font-black text-size-15">继续添加信用卡提升额度</p>
            </li>  
        </script>


        <script>
            function setBank(value,status){
                var result = '';
                if(status=='1'){
                    result='认证中';
                }else if(status=='3'){
                    result= value;
                }
                return result;
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
                        format = "font-black";
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
                            $.post('../user/queryCreditCard',{}, function (res) {
                                if (res.s == 200) {
                                    callback(res);
                                }
                            }, 'json');
                        },
                    }

                    tools.queryRZ(function(res){
                        var limit = 0;
                        res.d.forEach(item=>{
                            limit+= Number(item.limit);
                        });
                        $('.limit-content span').text(limit); // 认证额度  

                        $('ul').html(template('credit_card_tpl',res));                        
                    });
                    
                    // 重新认证
                    mui('ul').on('tap','#link-rzCreditCard',function(){
                        tools.route('rzCreditCard');
                    })

                    
                   
                })(mui, jQuery);
            })
        </script>
    </body>

</html>