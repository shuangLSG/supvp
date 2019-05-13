<html>
    <button onclick="wx.onMenuShareAppMessage()">1111</button>    
    <br/>
    appId：<?= $signPackage["appId"] ?>
    <br/>
    timestamp：<?= $signPackage["timestamp"] ?>
    <br/>
    nonceStr：<?= $signPackage["nonceStr"] ?>
    <br/>
    signature：<?= $signPackage["signature"] ?>
</html>
<script type="text/JavaScript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script>

        wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: '<?= $signPackage["appId"] ?>', // 必填，公众号的唯一标识
            timestamp: "<?= $signPackage["timestamp"] ?>", // 必填，生成签名的时间戳
            nonceStr: '<?= $signPackage["nonceStr"] ?>', // 必填，生成签名的随机串
            signature: '<?= $signPackage["signature"] ?>', // 必填，签名，见附录1
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
            ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });

        wx.ready(function () {
            wx.onMenuShareAppMessage({
                title: '胶囊内镜检查图片', // 分享标题
                desc: '胶囊内镜检查图片', // 分享描述
                link: "", // 分享链接
                imgUrl: 'http://escloud-media.oss-cn-hangzhou.aliyuncs.com/escloud/newsmsg-small.png', // 分享图标
                type: 'link', // 分享类型,music、video或link，不填默认为link
                dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                success: function () {
                    // 用户确认分享后执行的回调函数
                },
                cancel: function () {
                    // 用户取消分享后执行的回调函数
                }
            });

            wx.error(function (res) {
                // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
                alert("errorMSG:" + res);
            });
        });
</script>
