var app = {
    storageSave: function (key, value) {
        localStorage.setItem(key, JSON.stringify(value));
    },
    storageFetch: function (key) {
        return JSON.parse(localStorage.getItem(key)) || [];
    },
    storageClear: function () {
        localStorage.clear();
    },
    storageRemove: function (key) {
        localStorage.removeItem(key);
    },
}


// service
function promise(url = '', json = {}) {
    return new Promise((resolve, reject) => {
        $.post(url, json, function (res) {
            resolve(res);
        }, 'json');
    });
}



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




var zip = '?x-oss-process=image/resize,m_lfit,w_';
// 商品规格类型
function setTypeData(data) {
    var typeArr = [];
    if (data.color) {
        var colors = data.color.split(',');
        typeArr.push({
            name: '颜色',
            spec: 'color',
            list: colors
        })
    }
    if (data.size) {
        var sizes = data.size.split(',');
        typeArr.push({
            name: '尺码',
            spec: 'size',
            list: sizes
        })
    }
    if (data.network_type) {
        var network_types = data.network_type.split(',');
        typeArr.push({
            name: '网络类型',
            spec: 'network_type',
            list: network_types
        })
    }
    if (data.packages) {
        var packageArr = data.packages.split(',');
        typeArr.push({
            name: '套餐',
            spec: 'packages',
            list: packageArr
        })
    }
    if (data.norms) {
        var normses = data.norms.split(',');
        typeArr.push({
            name: '规格',
            spec: 'norms',
            list: normses
        })
    }
    if (data.capacity) {
        var capacities = data.capacity.split(',')
        typeArr.push({
            name: '容量',
            spec: 'capacity',
            list: capacities
        })
    }
    if (data.content) {
        var content = data.content.split(',');
        typeArr.push({
            name: '含量',
            spec: 'content',
            list: content
        })
    }
    return {
        typeArr
    };
}