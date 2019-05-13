<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>全部待还</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/repaid.css">
</head>

<body class="custom-bg-color-gray mui-ios mui-ios-11 mui-ios-11-0" style="font-size: 12px;">

    
    <div id="pullrefresh" class="mui-scroll-wrapper mui-content page-bg">
        <div class="mui-scroll">
            <div class="top-container custom-flex-c">
                <div class="mui-text-center">
                    <span class="text-size-12 font-light-blue">已用额度(元)</span>
                    <h2 id="allPrice" class="font-MarkPro">0</h2>
                </div>
            </div>

            <div class="list-container all-repaid">
                <ul class="mui-table-view custom-around-4 page-bg" id="goodslist"></ul>
            </div>

            <div class="custom-empty mui-text-center mui-hidden">
                <img src="<?= base_url() ?>public/images/limit/pay_nodata.png" alt="">
                <p class="text-size-15 font-gray">暂无待还</p>
            </div>
        </div>
    </div>





    <script id="list_tpl" type="text/html">
        {{each  d cell}}
            <li data-orderno="{{cell.orderno}}" data-allprice="{{cell.allprice}}" class="mui-table-view-cell custom-flex">
                <div class="cell-bd">
                    <h3 class="text-size-15">￥<strong class="text-size-25 font-MarkPro">{{cell.allprice}}</strong></h3>
                    <span class="text-size-13">使用额度</span>
                </div>
                <button class="mui-btn custom-round text-size-13">查看详情</button>
            </li>
        {{/each}}
    </script>

    <script src="<?= base_url() ?>public/js/template.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public//js/mui.min.js" type="text/javascript" charset="utf-8"></script>
    <script>
       
        $(function () {

            ;(function (mui, $) {

                // ============================================================ 下拉刷新,下拉加载 =================================================
                mui.init({
                    swipeBack: true, //启用右滑关闭功能
                    pullRefresh: {
                        container: '#pullrefresh',
                        up: {
                            auto:true,
                            contentrefresh: '正在加载...',
                            callback: pullupRefresh // ajax 具体操作
                        }
                    }
                });
              
                /**
                 * 上拉加载具体业务实现
                 */
                var pageNum = 1;
                var flage = true;//判断条件  
                function pullupRefresh() {
                    setTimeout(function () {
                        $.post('../user/instalmentList', {
                            "state": 0,
                            Page:pageNum
                        }, function (res) {
                            if (res.s == 200) {
                                var data = res.d;
                                if (pageNum*10==data.count || data.list.length == 0 || data.list.length < 10) {   // 获取到第3页的数据就结束上拉操作
                                    flage = false;
                                } else {
                                    flage = true;
                                    pageNum++;
                                }
                                
                                $('#allPrice').text(res.d.allprice?res.d.allprice:0.00);
                                $('.list-container ul').append(template('list_tpl', { d: data.list }))
                               
                                mui('#pullrefresh').pullRefresh().endPullupToRefresh(!flage);

                                if(pageNum==1 &&data.count==0){
                                    $('.custom-empty').removeClass('mui-hidden');
                                    $('.mui-pull-bottom-pocket').removeClass('mui-visibility');
                                }
                            }
                        }, 'json');
                    }, 1000);
                }

                // srcoll
                var scroller = mui('.mui-scroll-wrapper').scroll({
                    indicators: false, //是否显示滚动条
                });


                mui('.mui-table-view').on('tap','button',function(){
                    var $li = $(this).closest('li'),
                        orderno = $li.attr('data-orderno'),
                        allprice = $li.attr('data-allprice');
                        tools.route('instalmentItem?orderno='+orderno+'&allprice='+allprice);
                });
  

                // ==========================================================  工具方法 ===================================================
                /**
                 * @param {url} 地址
                 * @param {param} 参数名称key
                 * @return  value  对应参数的vaule
                 */
                function GetQueryString(param, url) {
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