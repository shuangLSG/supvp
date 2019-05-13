$(function () {

    document.title = "浏览历史";
    (function (mui, $) {

        // ============================================================ 下拉刷新,下拉加载 =================================================
        mui.init({
            swipeBack: true, //启用右滑关闭功能
            pullRefresh: {
                container: '#pullrefresh',
                up: {
                    auto: true,
                    contentrefresh: '正在加载...',
                    callback: pullupRefresh // ajax 具体操作
                }
            }
        });



        /**
         * 上拉加载具体业务实现
         */
        var pageNum = 1;
        var flage = true; //判断条件  
        function pullupRefresh() {
            setTimeout(function () {
                $.post('../browse/getBrowse', {
                    "Page": pageNum
                }, function (data) {
                    if (data.s == 200) {

                        $('.collect-box').append(creatDom(data));
                        // 在点击编辑的状态下 新加载的商品也表示编辑状态
                        if (isEdit) {
                            $('.icon-delete').show();
                            $('#pullrefresh li').addClass('custom-list-edit');
                        }

                        if (data.Browsedata == null ||data.Browsedata.length == 0 || data.Browsedata.length < data.PageSize) { // 获取到第3页的数据就结束上拉操作
                            flage = false;
                        } else {
                            flage = true;
                            pageNum++;
                        }

                        mui('#pullrefresh').pullRefresh().endPullupToRefresh(!flage);
                        
                        if ((data.Browsedata == null || data.Browsedata.length == 0) && pageNum==1) {
                            $('.page-nodata').show();
                        }

                        actionEvent();
                    }
                }, 'json');
            }, 1000);
        }

        // srcoll
        var scroller = mui('.mui-scroll-wrapper').scroll({
            indicators: false, //是否显示滚动条
        });

        // =============================================================== Dom 元素生成 ==============================================

        function creatDom(data) {
            if(data.Browsedata == null || data.Browsedata.length == 0)return;
            var html = "",
                browsedata = data.Browsedata;

            html += template('browser_tpl', {
                d: browsedata,
                zip: zip
            });
            return html;
        }

        // 商品详情页
        mui('.collect-box').on('tap', 'li', function (e) {
            if (this.classList.contains('custom-list-edit'))
                return;
            var id = this.id.split('_')[1];
            tools.route('goodsDetail?id=' + id);
        });

        // ======================================================= checkbox具体操作 ====================================================


        // 编辑操作 checkbox
        var isEdit = false;

        function edit() {
            tools.edit();
        }
        
        function actionEvent(){
            if($('.mui-scroll ul').children().length){
                // 编辑
                document.getElementById('edit').addEventListener("tap", edit, false);
                // 清空
                document.getElementById('clear').addEventListener("tap", clear, false);
            } else{
                document.getElementById('edit').removeEventListener("tap", edit);
                document.getElementById('clear').removeEventListener("tap", clear, false);
            }
        }
        function clear(){
            mui.confirm('', '确定清空收藏记录？', ['取消','确定'], function (val) {
                if (val.index == 1) {
                    tools.deleteAll();
                }
            });
        }
        

        // ==========================================================  工具方法 ===================================================

        // 显示无相关内容
        function showEmpty() {
            if ($('#pullrefresh').find('li').length == 0) {
                $('.page-nodata').show();
                $('.mui-scroll').remove();
                // 编辑的状态下
                $('#footer').hide();
                $('#edit').text('编辑').next().show();
                document.getElementById('edit').removeEventListener("tap", edit);
            }
        }
        var tools = {
            selectArr: [], // 存储 被选中商品id
            data: app.storageFetch('collectionData'), // 存放 ajax 请求回来的数据            
            route: function (url) {
                mui.openWindow({
                    url: url
                });
            },
            edit: function () {

                if (isEdit) {
                    // 隐藏checkbox
                    $('#pullrefresh li').removeClass('custom-list-edit mui-checkbox');
                    $(' #pullrefresh li .mui-checkbox').hide();
                    $('#edit').text('编辑').next().show();
                    $('#footer').hide();

                    // 切换回来要清空 数组(存放被选中商品的id)，并取消选中状态
                    tools.selectArr = [];
                    var oCheckAll = document.getElementById('checkboxAll');
                    tools.selectAll(oCheckAll);

                } else {

                    $('#footer').show();

                    // 显示 左侧 checkbox
                    $('#pullrefresh li').addClass('custom-list-edit mui-checkbox')
                    $('#pullrefresh li .mui-checkbox').css('display', 'flex');

                    $('#edit').text('完成').next().hide();

                    // 全选
                    tools.checkAllChecked();
                    // 单个checkbox选中
                    tools.singleChecked();
                    // 底部删除按钮
                    document.getElementById('delete').addEventListener("tap", function () {
                        tools.deleteLi(tools.selectArr);
                    });
                }
                isEdit = !isEdit;
            },
            deleteLi: function (arr) {
                var idStr = '';
                arr.forEach(item => {
                    idStr += item + ',';
                });

                idStr = idStr.substr(0, idStr.toString().length - 1);
                $.post('../browse/deleteBrowse', {
                    "id": idStr
                }, function (res) {
                    if (res.s == 200) {
                        arr.forEach(item => {
                            $('#car_' + item).remove();
                        });
                        tools.selectArr = [];
                        scroller.refresh();
                        showEmpty();
                        document.getElementById('checkboxAll').checked = false;
                    }

                }, 'json');
            },
            deleteAll: function (id) {
                $.post('../browse/deleteBrowseAll', {
                    "id": id
                }, function (res) {
                    if (res.s == 200) {
                        $('.mui-scroll ul').remove();
                        actionEvent();
                        $('.page-nodata').show();
                    }
                }, 'json');
            },
            checkAllChecked: function () {
                var aCheckbox = document.getElementsByName('checkbox');
                var oCheckAll = document.getElementById('checkboxAll');
                oCheckAll.onchange = function () {
                    // 选中全部 checkbox
                    tools.selectAll(oCheckAll);

                    var flag = oCheckAll.checked;
                    tools.selectArr = [];
                    $('input[name=checkbox]').each(function () {
                        if (flag) {
                            tools.cacheGoodsId(this);
                        }
                    });
                }
            },
            // 循环遍历为每一个checkbox添加一个onchange事件
            singleChecked: function () {
                $('input[name=checkbox]').each(function () {
                    this.onchange = function () {
                        tools.cacheGoodsId(this);
                        tools.isSelectAll();
                    }
                });
            },
            cacheGoodsId: function (obj) {
                var index = obj.dataset.id;
                if (obj.checked) {
                    tools.selectArr.push(index);
                } else {
                    tools.deleteArr(index);
                }
                console.log(tools.selectArr)
            },
            deleteArr: function (index) {
                for (var i = 0; i < tools.selectArr.length; i++) {
                    if (tools.selectArr[i] == index) {
                        tools.selectArr.splice(i, 1);
                    }
                }
            },
            // 检测是否要全选
            isSelectAll: function () {
                var isSelected = true; //全选是否会选中
                var allCheck = document.getElementById('checkboxAll');
                var aCheckbox = document.getElementsByName('checkbox');
                for (var j = 0, len = aCheckbox.length; j < len; j++) {
                    if (aCheckbox[j].checked == false) {
                        isSelected = false;
                        break;
                    }
                }
                allCheck.checked = isSelected;
            },
            selectAll: function (selectAll) {
                var aCheckbox = document.getElementsByName('checkbox');
                for (var i = 0, len = aCheckbox.length; i < len; i++) {
                    aCheckbox[i].checked = selectAll.checked;
                }
            },
        }

    })(mui, jQuery);
})