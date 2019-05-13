var authInfo = app.storageFetch('authInfo');
if (authInfo) {
    global.username = authInfo.mobile;
    global.password = authInfo.password;

    window.JIM = new JMessage({
        debug: true
    });
    init();
}

var targetUser = {
    across_user: 'supvp1'
}
var across_appkey = '63a89786fa3f8f54130ee01b';

function register() {
    JIM.register({
        ...global

    }).onSuccess(function (data) {
        console.log('注册 success:----------------------------------')
        console.log(data);
    }).onFail(function (data) {
        console.log('error:' + JSON.stringify(data))
    });
}

function init(isRegister) {
    var timestamp = new Date().getTime();
    var authPayload = {
        appkey: '63a89786fa3f8f54130ee01b',
        randomStr: '022cd9fd995849b58b3ef0e943421ed9',
        masterSecret: '56727ef56e0dd5f30e6504fd'
    }

    JIM.init({
        "appkey": authPayload.appkey,
        "random_str": authPayload.randomStr,
        "signature": Util.createSignature(authPayload),
        "timestamp": timestamp,
        "flag": 1
    }).onSuccess(function (data) {
        register();
        login();
    }).onFail(function (data) {
        console.log('error:' + JSON.stringify(data))
    });
}

  //登录
  function login() {
    console.log({ ...global
    })
    JIM.login({
        ...global
    }).onSuccess(function (data) {

    })
}