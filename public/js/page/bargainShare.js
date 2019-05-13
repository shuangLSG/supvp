setTimeout(function () {


    var goodsname = $('.list-container').find('li h3').text(),
        imgUrl = $('.list-container li').find('.custom-list-pic:not(".failed")').attr('src');


    var i = window.location.href.indexOf('&f=');
    url = window.location.href.substring(0, i);
    var wxData = {
        "imgUrl": imgUrl,
        "link": i == -1 ? window.location.href : url,
        "title": '砍价免费拿'+goodsname,
        "desc": '我在参加SUPVP官方砍价，帮我砍砍砍，砍到0元一起免费拿！'
    };

    // 通过config接口注入权限验证配置,参数由后台提供,
    wx.config({
        debug: false,
        appId: json["appId"], // 必填，公众号的唯一标识
        timestamp: json["timestamp"], // 必填，生成签名的时间戳
        nonceStr: json["nonceStr"], // 必填，生成签名的随机串
        signature: json["signature"], // 必填，签名，见附录1
        jsApiList: [
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
        ] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    wx.ready(function () {
        // 分享朋友圈代码
        wx.onMenuShareTimeline({
            title: wxData.title,
            link: wxData.link,
            imgUrl: wxData.imgUrl,
            success: function () {}
        });
        // 分享给朋友代码
        wx.onMenuShareAppMessage({
            title: wxData.title,
            desc: wxData.desc,
            link: wxData.link,
            imgUrl: wxData.imgUrl,
            type: 'link',
            dataUrl: '',
            success: function () {}
        });
        // 分享给朋友代码
        // wx.error(function (res) {
        //     console.log("errorMSG:" + res);
        // });

    });

    function setShareV() {
        var res = {};
        $.ajaxSetup({
            async: false
        });
        $.post('../bargainh5/share', {}, function (data) {
            res = data.signPackage
        }, 'json');
        return res;
    }

    function isWeiXin() {
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            return true;
        } else {
            return false;
        }
    }
}, 1000)