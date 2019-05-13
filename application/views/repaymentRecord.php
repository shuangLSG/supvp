<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <title>还款记录</title>
        <style type="text/css">
          
            @font-face {
                font-family: pictos-web;
                src: url("<?= base_url() ?>public/fonts/pictos-web.Ttf");
            }
            .font-pictos{
                font-family: pictos-web;
            }
            .bg-page{
               background-color: #F9F9FC;
            }
            .font-gray{
                color:#999999;
            }
            .font-black{
                color:#222222;
            }
           
            .text-size-18{
                font-size:0.48rem;
            }
            .text-size-15{
                font-size:0.4rem;
            }
            .text-size-12{
                font-size:0.32rem;
            }
            .custom-flex-v,
            .custom-flex-c{
                display:flex;
                justify-content: center;
                align-items: center;
            }
            .custom-flex-v{
                flex-direction: column;
                align-items: flex-start;
            }
            .group-title {
                height: 1.25rem;
                font-size:0.346rem;
                color: #666;
            }
            .group-title span{
                margin-left:0.426rem;
            }
            .mui-table-view-cell{
                padding: 0.4rem 0.4rem .36rem;
                justify-content: space-between;
            }

            .mui-table-view-cell .cell-bd span:last-child,
            .mui-table-view-cell .cell-ft span:last-child{
                margin-top: 0.1rem;
            }
            .mui-table-view:after,
            .mui-table-view:before{
                height:0;
            }
            .mui-table-view-cell:after{
                background-color:#eee;
            }
    
            .nodata-box img{
                width: 3.68rem;
                margin-top: 4rem;
            }
        </style>
    </head>

    <body>
    <div id="pullrefresh" class="mui-scroll-wrapper mui-content mui-fullscreen bg-page">
        <div class="mui-scroll">
            
        </div>
    </div>
    <script id="list_tpl" type="text/html">
        {{each dataList  i index}}
        <div class="cells-group">
            <div class="group-title custom-flex-c">
                <span>{{i.time}}</span>
                <span>还款{{i.num}}笔</span>
                <span>还款金额{{i.total}}元</span>
            </div>
        </div>
        <ul class="mui-table-view bg-white">
            {{each i.children cell}}
            <li href="javascript:;" class="mui-table-view-cell custom-flex-c">
                <div class="cell-bd custom-flex-v">
                    <span class="font-black text-size-15">还款</span>
                    <span class="font-gray text-size-12">{{cell.payts| dateFormat 'MM/dd hh:mm'}}</span>
                </div>
                <div class="cell-ft custom-flex-v">
                    <strong class="font-black text-size-18 font-pictos">{{cell.principal}}</strong>
                    <span class="font-gray text-size-12">金额</span>
                </div>
            </li>
            {{/each}}
        </ul>
        {{/each}}
    </script>

    <script id="nodata_tpl" type="text/html">
        <div class="nodata-box mui-fullscreen mui-text-center">
            <img src="<?= base_url() ?>public/images/limit/pay_nodata.png" alt="">
            <p>无还款记录哦</p>
        </div> 
    </script>

    <script>
    function getTs(value){
        return  new Date(value).getTime();
    }
    </script>
    <script src="<?= base_url() ?>public/js/filter.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public//js/mui.min.js" type="text/javascript" charset="utf-8"></script>
    <script>
        $(function () {

            (function (mui, $) {

                setInterval(function(){
                    refreshToken();
                },2700000);

                //  获取资金流水
                var pagesize = 10;
                var pageNum = 1;
                var flage=true;
                function getListData() {
                    $.post('../user/instalmentItem', {
                        "state": 1,
                        "Page":pageNum
                    }, function (msg) {
                        var data = msg.d;
                        if (msg.s == 200) {
                            var data = msg.d;
                            if (data.list.length == 0 || data.list.length < pagesize) {
                                flage = false;
                            } else {
                                flage = true;
                                pageNum++;
                            }
                            mui('#pullrefresh').pullRefresh().endPullupToRefresh(!flage);
                            
                            if(data.list.length){
                                var res = setTree(data.list);
                                console.log(res)
                                $('.mui-scroll').html(template('list_tpl', {dataList:res}));
                            }else{
                                $('.mui-scroll').html(template('nodata_tpl'));                        
                            }
                        } else {
                            mui('#pullrefresh').pullRefresh().endPullUpToRefresh(true);
                        }
                    }, 'json');
                }
               
                // ============================================================ 下拉刷新,下拉加载 =================================================
                mui.init({
                    swipeBack: true, //启用右滑关闭功能
                    pullRefresh: {
                        container: '#pullrefresh',
                        up: {
                            auto: true,
                            contentrefresh: '正在加载...',
                            callback: pullup
                        }
                    }
                });
                function pullup(){
                    // 交易历史
                    setTimeout(function () {
                        getListData(pageNum);
                    }, 200);
                }




                // ============================================================ 创建DOM =================================================
                var hash = {};
                var i = 0;
                var res = [];
                function setTree(old){
                    
                    old.forEach(function (item,i) {
                        // var ts = new Date(item.payts);
                        var time = dateFormat(item.payts, 'yyyy年MM月');
                        if(hash[time]){
                            res[hash[time]-1].children.push(item); 
                            ++res[hash[time]-1].num;
                            res[hash[time]-1].total+= Number(item.principal);
                        }else{
                            hash[time] = ++i &&res.push({
                                time: time,
                                children: [item],
                                num:1,
                                total:Number(item.principal)
                            })
                        }
                    });
                    return res;
                }
            })(mui, jQuery);
        });

    </script>

    </body>

</html>