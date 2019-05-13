$(function () {

    var brandname = decodeURIComponent(GetQueryString('brandname'));
    document.title=brandname;

    (function (mui, $) {

        mui.init({
            swipeBack: true, //启用右滑关闭功能
            pullRefresh: {
                container: '#offCanvasContentScroll',
                up: {
                    // auto: true, //可选,默认false.首次加载自动下拉刷新一次
                    contentdown: "下拉可以刷新", //可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
                    contentover: "释放立即刷新", //可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
                    contentrefresh: "正在刷新...", //可选，正在刷新状态时，下拉刷新控件上显示的标题内容
                    callback: pullupRefresh, // ajax 具体操作
                }
            }
        });
        var pageNum = 2;
        var flage = true; //判断条件  
        function pullupRefresh() {
            var keyword = decodeURIComponent(GetQueryString('keyword')); // 搜索页传来的关键字
            
            if(keyword&&keyword!='null'){
                moreSearchGoods(keyword);
            }else{
                moreCommodity();
            }
            
        }
        // srcoll
        mui('.mui-scroll-wrapper').scroll({
            indicators: false, //是否显示滚动条
        });
   

        // ========================================================= AJAX ============================================================

        function initajax() {
            var brandid = GetQueryString('brandid');
            var selectid = GetQueryString('selectid');
            var keyword = decodeURIComponent(GetQueryString('keyword')); // 搜索页传来的关键字
            
            if (brandid) {
                // 根据品牌id
                getData({
                    brandid: brandid
                });
            } else if (selectid) {
                // 根据分类id
                getData({
                    selectid: selectid
                });
            } else if (keyword) {
                // 根据搜索的关键字
                searchGoods(keyword)
            }
        }
        initajax();

        // 加载更多二级分类
        function moreCommodity(){
            var brandid = GetQueryString('brandid');
            var selectid = GetQueryString('selectid');

            setTimeout(function () {
                $.post('../api/commodity', {
                    Page: pageNum,
                    brandid: brandid || '',
                    selectid: selectid || '',
                }, function (res) {
                    if (res.s == 200) {
                        $('#grid-container ul').append(template('menu1_tpl', {
                            d: res.branddata,
                            zip: zip
                        }));

                        $('#list-container ul').append(template('menu2_tpl', {
                            d: res.branddata,
                            zip: zip
                        }));

                        if (res.branddata.length == 0 || res.branddata.length < res.PageSize) { // 获取到第3页的数据就结束上拉操作
                            flage = false;
                        } else {
                            flage = true;
                            pageNum++;
                        }

                        console.log(pageNum);
                        mui('#offCanvasContentScroll').pullRefresh().endPullupToRefresh(!flage);

                    }
                }, 'json');

            }, 1000);
        }
        function getData(json,isrefresh) {
            $.post('../api/commodity', json, function (res) {
                if (res.s == 200) {
                    $('#grid-container ul').html(template('menu1_tpl', {
                        d: res.branddata,
                        zip: zip
                    }));
                    $('#list-container ul').html(template('menu2_tpl', {
                        d: res.branddata,
                        zip: zip
                    }));
                    
                    mui('.mui-scroll-wrapper').scroll().scrollTo(0, 0, 0);
                }
            }, 'json');
        }
        

        /**
         * @function getData( param )
         *  all      综合  1
         *  sales    销量  1
         *  price    价格  2最高到最低    1是最低到最高
         *  new      最新  1
         */
        function clickTabToRefresh(el) {
            var name = $(el).attr('id');
            var brandid = GetQueryString('brandid');
            var selectid = GetQueryString('selectid');
            var json = {};
            if (brandid) {
                json.brandid = brandid;
            } else {
                json.selectid = selectid;
            }
            if (name == 'all-brand') {
                json.all = 1
            }
            if (name == 'sales-brand') {
                json.sales = 1
            }
            if (name == 'priceFilter') {
                var status = $(el).find('.active').attr('val');

                if (status == 0) {
                    json.price = '2';
                } else {
                    json.price = '1';
                }
            }
            if (name == 'new-brand') {
                json.new = 1;
            }
            pageNum = 2;   // 加载更多从第二页开始
            getData(json);
        }


        /**
         *  @function searchGoods( param ) 商品搜索
         *  @param  {strign}  keywords 关键字  
         */
        function searchGoods(keywords) {
            
            $.post('../api/searchGoods', {
                'keyword': keywords
            }, function (res) {
                html = '';
                if (res.s == 200) {
                    if (res.d.length == 0) {
                        $('.page-nodata').removeClass('mui-hidden');
                        return;
                    }
                    $('#grid-container ul').html(template('menu1_tpl', {
                        d: res.d,
                        zip: zip
                    }));
                    $('#list-container ul').html(template('menu2_tpl', {
                        d: res.d,
                        zip: zip
                    }));
                    mui('.mui-scroll-wrapper').scroll().scrollTo(0, 0, 100);
                }
            }, 'json');
        }
        function moreSearchGoods(keywords){

            setTimeout(function () {
                $.post('../api/searchGoods', {
                    'keyword': keywords,
                    'Page':pageNum
                }, function (res) {
                    if (res.s == 200) {
                        $('#grid-container ul').append(template('menu1_tpl', {
                            d: res.d,
                            zip: zip
                        }));

                        $('#list-container ul').append(template('menu2_tpl', {
                            d: res.d,
                            zip: zip
                        }));

                        if (res.d.length == 0 || res.d.length < res.PageSize) { // 获取到第3页的数据就结束上拉操作
                            flage = false;
                        } else {
                            flage = true;
                            pageNum++;
                        }
                        mui('#offCanvasContentScroll').pullRefresh().endPullupToRefresh(!flage);
                    }
                }, 'json');

            }, 1000);
        }
        // ======================================================  页面操作 ==========================================================


        // 顶部导航tab
        mui('.custom-nav').on('tap', 'a', function (e) {
            var name = $(this).attr('id');
            if (name == 'menu') {
                if (this.dataset.togrid == 1) { // 不是宫格模式,重置滚动条位置
                    $('#mode-grid').hide().next().show();
                    $('#grid-container').hide().next().show();
                    $(this).attr('data-togrid', 0);
                } else {
                    $('#mode-grid').show().next().hide();
                    $('#grid-container').show().next().hide();
                    $(this).attr('data-togrid', 1);
                }
                mui('.mui-scroll-wrapper').scroll().scrollTo(0, 0, 100);
                return;
            }

            tab(this);

            clickTabToRefresh(this)
            mui('#offCanvasContentScroll').pullRefresh().refresh(true);
        });


        // 价格 (筛选)
        document.getElementById('priceFilter').addEventListener('tap', function () {
            tools.priceFilter();
        });


        // ================================================== 搜索 ==============================================
        document.querySelector('#search').addEventListener('tap', function () {
            tools.route('search');
        });

        // ================================================== tab ===============================================
        function tab(targetTab) {
            var activeTab;
            var className = 'active';
            var CLASS_TAB_ITEM = "custom-tab-item";
            var classSelector = '.' + className;
            var segmentedControl = targetTab.parentNode;

            // 添加 .active 类名
            activeTab = segmentedControl.querySelector(classSelector + '.' +
                CLASS_TAB_ITEM);
            if (activeTab) {
                activeTab.classList.remove(className);
            }
            targetTab.classList.add(className);
        }

        // ======================================================== 页面跳转 ===========================================
        $('#brandlist').on('tap', '.mui-table-view-cell', function () {
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
        })

        // ======================================================== 工具方法 ===========================================


        var tools = {
            route: function (url) {
                mui.openWindow({
                    url: url
                });
            },

            // 价格筛选
            priceFilter: function () {
                var aTriangle = $('.triangle-wrapper span');
                var triangleUp = aTriangle.eq(0);
                if (triangleUp.hasClass('active')) {
                    triangleUp.removeClass('active').next().addClass('active');
                } else {
                    triangleUp.addClass('active').next().removeClass('active');
                }
            }
        }
    })(mui, jQuery);
})