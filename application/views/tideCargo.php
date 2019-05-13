<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>必买清单</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/thumbnail.css" />
        <style>
            .list-container.mui-table-view{
                padding: 0.33rem;
            }
            .list-container.mui-table-view li{
                padding:0.266rem;
                margin-bottom:0.266rem;
                box-shadow:0px 0px 27px 0px rgba(112,112,112,0.09);
            }
            .mode2-box .custom-brand-info {
                width: calc(10rem - 4.6rem);
            }
            .position-bottom img{
                width:2.26rem;
                float:right;
            }
        </style>
   </head>

    <body>
        <div id="page" class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll">
                <ul class="mui-table-view list-container mode2-box none-line">
                </ul>
            </div>
        </div>



        <script id="list_tpl" type="text/html">
            {{each d cell}}
                <li data-id="{{cell.id}}"  data-share="{{cell.share}}" data-app="{{cell.url}}" id="goods_{{cell.id}}" class="mui-table-view-cell">
                    <div class="mui-slider-handle custom-flex">
                        <div class="custom-list-box custom-flex">
                            <img class="custom-list-pic w-230" src="{{cell.img_750_1050+zip}}210" width="100%" alt="">
                            <div class="custom-brand-info custom-cell-content">
                                <h3 class="text-size-16 text-line-1"><strong>{{cell.title}}</strong> </h3>
                                <p class="describe text-line3 custom-gray-2">{{cell.name}}</p>
                                <div class="position-bottom">  
                                   <img src="<?= base_url() ?>public/images/icons/cart1.png" alt="">
                                </div> 
                            </div>
                        </div>
                    </div>
                </li>
            {{/each}}
        </script>

       

        <script src="<?= base_url() ?>public/js/template.js"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
            //  推荐
            $.post('../api/getRecommend', {}, function (res) {
                var data = JSON.parse(res);
                var zip = '?x-oss-process=image/resize,m_lfit,w_';
                if(data.s==200){
                    $('.list-container').html(template('list_tpl',{d:data.d,zip:zip}))
                }
            });   

       
            
            
            mui('.buy-list-container').on('tap','.card-spec',function(){
                mui.openWindow({
                    url: ''
                });
            });

            mui('.children-container').on('tap','li',function(){
                mui.openWindow({
                    url: ''
                });
            });

            mui('.mui-scroll-wrapper').scroll({
                indicators: false, //是否显示滚动条
                bounce: false //是否启用回弹
            });


          
            $(function () {

                (function (mui, $) {

                  
                })(mui, jQuery);
            })
        </script>
    </body>

</html>