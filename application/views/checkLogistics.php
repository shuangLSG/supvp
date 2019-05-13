<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>查看物流</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" /> -->
        
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/checkLogistics.css">
       
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content page-bg">
            <div class="mui-scroll">
                
            </div>
        </div>
       
      
        



   

        <script id="logistics_tpl" type="text/html">
            {{each d.list card index}}
            <div class="custom-card-item">
                <div class="custom-card-header custom-orange text-size-13">
                    {{if card.confirmorder==0}}
                        <span>暂未发货</span>
                    {{else if card.confirmorder==1}}
                        <span>已发货</span>
                    {{else if card.confirmorder==2}}
                        <span>已签收</span>
                    {{/if}}

                    {{if index==0 && card.confirmorder!=0}}
                        <span class="mui-pull-right custom-black-2">快递单号：{{d.orderno}}</span>
                    {{/if}}
                </div>
                <div class="custom-card-content">
                    <ul class="mui-table-view" >
                        {{each card.children cell }}
                        <li data-logistics="{{cell.logistics}}"  data-state="{{card.confirmorder}}" data-expressid="{{cell.expressid}}" class="mui-table-view-cell">
                            <div class="mui-slider-handle custom-flex">
                                <div class="custom-list-box custom-flex">
                                    <img class="custom-list-pic" src="{{cell.cimg_750_1050+zip}}180" width="100%" alt="">
                                    <div class="custom-brand-info">
                                        <div class="custom-flex custom-flex-between">
                                            <h3 class="text-size-13">{{cell.cname}}</h3>
                                            <div class="custom-black-2 text-size-13 mui-text-right">
                                                <span> <small>&yen;</small><span class="monthly-price ">{{cell.cprice}}</span></span>
                                                <small class="custom-light-gray text-size-13">x{{cell.cnumber}}</small>
                                            </div>
                                        </div>
                                        <p class="custom-light-gray text-size-12">规格：
                                            {{each cell.l_type type}}
                                                <span>{{type.list[0]}}</span>
                                            {{/each}}
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{/each}}
                    </ul>
                </div>
            </div> 
            {{/each}}
            
        </script>     

    


     

      
        <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
            /**[
             *  {confirmorder:0,children:[{},{}]}
             *  {confirmorder:1,children:[{},{}]}
             * ]
             */
            var logistics= app.storageFetch('check_logistics');
            var res = setTree(logistics.list);
            logistics.list =res;
            $('.mui-scroll').html(template('logistics_tpl',{d:logistics,zip:zip}));


            // 跳转至物流详情
            mui('.mui-scroll').on('tap','li',function(){
                var logistics = this.dataset.logistics,
                    expressid = this.dataset.expressid, 
                    state = this.dataset.state
                    url ='logisticsDetail?logistics='+logistics+'&expressid='+expressid;
                if(state==0)return;
                mui.openWindow({
                    url: url
                });                
            });

            function setTree(old){
                var hash = {};
                var i = 0;
                var res = [];
                old.forEach(function (item,i) {
                    var confirmorder = item.confirmorder;
                    if(hash[confirmorder]){
                        res[hash[confirmorder]-1].children.push(item); 
                    }else{
                        hash[confirmorder] = ++i &&res.push({
                            confirmorder: confirmorder,
                            children: [item],
                        })
                    }
                });
                return res;
            }
        </script>
    </body>

</html>