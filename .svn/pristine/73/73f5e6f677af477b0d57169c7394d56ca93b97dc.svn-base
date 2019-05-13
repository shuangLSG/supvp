<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <style>
            
            .page-content{
                position: relative;
            }
            button{
                position: absolute;
                bottom: 0;
                left:0;                
                width: 100%;
                height: 1.466rem;
                color: #fff;
                font-size:0.426rem;
                background-color:#1B2A47;
                border: none;
            }
        </style>       
    </head>
    <body>
        <div class="page-content">
            <img width="100%" src="http://image.bfy100.com/1555332509.png" alt="">
            <button class="">立即认证获取额度</button>
        </div>
    </body>
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>  
    <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
     
    <script>

        var title = decodeURIComponent(GetQueryString('title'));
        document.title=title;

        
        document.querySelector('button').addEventListener('tap', toAuthentication, false);
        

        // App 活动中商品详情的跳转
        function toAuthentication(){
            var type=GetQueryString('type');
            if(type=='web'){
                mui.openWindow({
                    url: "../supvp/rzIdentityCard"
                });
                return;
            }
            if(isAndroid_ios()){
                window.javaScriptInterface.linkToAuthentication();
            }else {
                linkToAuthentication();
            }
        }
        // (判断Android 或 ios)
        function isAndroid_ios() {
            var u = navigator.userAgent,
                app = navigator.appVersion;
            var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器  
            var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端  
            return isAndroid == true ? true : false;
        }
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
    </script>
</html>