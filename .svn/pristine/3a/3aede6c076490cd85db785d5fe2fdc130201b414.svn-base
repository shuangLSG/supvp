// 登录
document.getElementById('login').addEventListener('tap', toRegister, false);
// 获取验证码
document.getElementById('send-code').addEventListener('tap', getCode, false);

// 隐藏登录弹框
document.querySelector('.mui-icon-closeempty').addEventListener('tap', hidePopover, false);


function hidePopover() {
    mui('#login_popover').popover('hide');
}



// 未认证提示框
function rzConfirm(ss) {
    var btnArray = ['取消', '去认证']
    mui.confirm('认证成功后才能砍价哦', '您尚未认证', btnArray, function (e) {
        if (e.index == 1) {
            var r = window.location.href;
            mui.openWindow({
                url: '../bargainh5/bargainRZ?ss=' + ss+"&rurl="+encodeURIComponent(r)
            });
        }
    })
}

// =========================== 用户注册 ===========================

// 注册
function toRegister() {
    $(document).find('input').blur();
    // 禁止状态
    if ($('#mobile').val() == "" && $('#code').val() == "") {
        return;
    }

    var mobile = $('#mobile').val();
    var code = $('#code').val();
    $.post('../login/webRegister', {
        "mobile": mobile,
        "code": code,
        "rurl": window.location.href // 芝麻认证回调地址
    }, function (data) {
        if (data.s == 200) {
            if (data.d.identitycard != 1) {
                mui.openWindow({
                    url: '../bargainh5/bargainRZ?ss=' + data.ss
                });
            } else {
                mui.toast('登录成功');
                hidePopover();
                window.location.reload()
            }
        } else {
            mui.toast(res.d);
        }
    }, 'json');
}

// 获取验证码
function getCode() {
    var mobile = $('#mobile').val();
    var self = this;
    if (mobile == "") {
        mui.toast('请输入手机号');
        return;
    }

    $.post('../user/regsend', {
        "mobile": mobile,
        "activity": 1
    }, function (data) {
        if (data.s == 200) {
            mui.toast('发送成功');
            SetRemainTime(self, 60);
        } else {
            mui.toast(data.d);
        }
    }, 'json');
}

//倒计时
var InterValObj;

function SetRemainTime(el, second, fn) {
    // 防止多次点击，生成多个定时器
    if (InterValObj) {
        clearInterval(InterValObj);
    }
    InterValObj = setInterval(function () {
        if (second > 0) {
            second = second - 1;

            $(el).text(second + "s").attr('disabled', true);
        } else {
            clearInterval(InterValObj);
            $(el).text('获取验证码').removeAttr('disabled');

            if (fn) {
                fn();
            }
        }
    }, 1000)
}


// =========================== 芝麻认证查询结果 ===========================



// 关闭认证成功遮罩
mui('#authentication').on('tap','#bargain',function(){
    $('#authentication').removeClass('mui-popup-in');
    $('.mui-popup-backdrop').remove();

    // 重定向 芝麻认证回调地址后的地址( 只保留原参数地址)
    var r = window.location.href;
    if(r.indexOf('&ss') != -1){
        var i = r.indexOf('&ss');
        r = r.substring(0, i);
        mui.openWindow({ 
            url: r
        });
    }
});


// 是否是芝麻认证回调地址
if (window.location.href.indexOf('?') != -1) {
    var ss = GetQueryString('ss', window.location.href);
    if (ss) {
        var biz_no = getBizNo(window.location.href);
        if(biz_no){
            bargainIdCard(ss, biz_no);
        }
    }
}

/**
 * 查询芝麻认证的认证结果
 */
function saveZMResults(json) {
    $.post('../user/zhimaQuery', json, function (data) {
        if (data.s == 200) {
            $('#authentication').addClass('mui-popup-in').attr('data-state',1);
            $('body').append(`<div class="mui-popup-backdrop mui-active" style="display: block;"></div>`);

        } else {
            mui.toast('认证失败');
        }
    }, 'json');
}

/**
 * @param {url} 认证Url
 * @return  biz_no  开始认证接口返回url中的参数
 */
function getBizNo(url) {
    var biz_content = decodeURIComponent(GetQueryString('biz_content', url));
    return JSON.parse(biz_content).biz_no;
}


function bargainIdCard(ss, biz_no) {
    $.post('../BargainH5/bargainIdCard', {
        ss: ss
    }, function (data) {
        if (data.s == 200) {

            saveZMResults({
                biz_no: biz_no
            });

        } else {
            mui.toast(data.d);
        }
    }, 'json');
}