function dateFormat(date, format) {
    if (date.length < 13) {
        date = date * 1000;
    }
    date = new Date(date);
    var map = {
        "M": date.getMonth() + 1, //月份 
        "d": date.getDate(), //日 
        "h": date.getHours(), //小时 
        "m": date.getMinutes(), //分 
        "s": date.getSeconds(), //秒 
        "q": Math.floor((date.getMonth() + 3) / 3), //季度 
        "S": date.getMilliseconds() //毫秒 
    };
    format = format.replace(/([yMdhmsqS])+/g, function (all, t) {
        var v = map[t];
        if (v !== undefined) {
            if (all.length > 1) {
                v = '0' + v;
                v = v.toString().substr(v.length - 2);
            }
            return v;
        } else if (t === 'y') {
            return (date.getFullYear() + '').substr(4 - all.length);
        }
        return all;
    });
    return format;
}

function dateFormatTime(date) {
    return date * 1000;
}

function phoneFormat(mobile){
    var reg = new RegExp("(\\d{3})(\\d{4})(\\d{4})");
    return mobile.replace(reg, "$1****$3");
}

function couponType(num) {
    var type = '';
    switch (num) {
        case 0:
            type = '全场通用';
            break;
        case 1:
            type = '品牌专用优惠券';
            break;
        case 2:
            type = '品类专用';
        case 3:
            type = '活动专用';
            break;
    }

    return type;
}