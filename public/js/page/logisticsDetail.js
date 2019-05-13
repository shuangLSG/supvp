$(function () {

    document.title = "物流详情";
    mui.init();
    (function (mui, $) {
        // =======================================================  AJAX ========================================================
        var logistics = GetQueryString('logistics'),
            expressid = GetQueryString('expressid');
        
        /*getDetail();
        function getDetail() {
            $.post('../order/queryKd', {
                "logistics": logistics,
                "expressid":expressid,
            }, function (data) {
                if (data.s == 200) {
                    
                } else {
                    // mui.toast(data.d);
                }
            }, 'json');
        }*/
        mui('.mui-scroll-wrapper').scroll({
            indicators: false, //是否显示滚动条
            bounce: false //是否启用回弹
        });
      
    })(mui, jQuery);
})