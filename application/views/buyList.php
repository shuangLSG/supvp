<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>必买清单</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/buyList.css" />
    </head>

    <body>
        <div id="page" class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll">
                <ul class="mui-table-view mui-grid-view buy-list-container">
                </ul>
            </div>
        </div>


   


        <script id="card_tpl" type="text/html">
            {{each d cell}}
                <li id="card_{{cell.id}}" class="mui-table-view-cell mui-text-left">
                    <div class="card-spec">
                        <h3 class="text-line-1"><strong>{{cell.name}}</strong></h3>
                        <p class="card-spec-words text-line-2">{{cell.spec}}</p>
                    </div>
                    <ol class="mui-table-view mui-grid-view children-container">
                        {{each cell.list children}}
                        <li data-id="{{children.id}}" class="mui-table-view-cell">
                            <img src="{{children.img}}" alt="">
                            <p class="custom-pink">月供<small>&yen;</small><span class="font-MarkPro monthly-price">{{children.amortize}}</span></p>
                        </li> 
                        {{/each}}
                    </ol>
                </li>
            {{/each}}
        </script>

       

        <script src="<?= base_url() ?>public/js/template.js"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
            var data = [
                {name:'手表手表手表手表手手表手表手表手手表手表手表手手表手表手表手',
                    spec:'手表手表手表手手表手表手表手手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表',
                    list:[
                        {
                            id:'1',
                            img:'http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280',
                            amortize:64.2
                        },
                        {
                            id:'2',
                            img:'http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280',
                            amortize:64.2
                        },
                        {
                            id:'2',
                            img:'http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280',
                            amortize:64.2
                        }
                    ]
                },
                {name:'手表',spec:'手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表手表',
                    list:[
                        {
                            id:'1',
                            img:'http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280',
                            amortize:64.2
                        },
                        {
                            id:'2',
                            img:'http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280',
                            amortize:64.2
                        },
                        {
                            id:'2',
                            img:'http://image.bfy100.com/1554369856.png?x-oss-process=image/resize,m_lfit,w_280',
                            amortize:64.2
                        }
                    ]
                },
            ]

       
            $('.buy-list-container').html(template('card_tpl',{d:data}))
            
            
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