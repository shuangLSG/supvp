<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>认证</title>

    <link rel="stylesheet" href="<?= base_url() ?>public/css/mui.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/login.css">
  
    <style>
        .mui-control-content{
            display: block;
            margin-top: 1rem;
        }
        .btn-wrapper{
            margin: 0 1rem;
        }
        .btn-wrapper button{
            padding: 0.2rem; 
        }
    </style>
</head>

<body>
    <div id="item1" class="mui-control-content">
        <div class="input-group">
            <label for="">真实姓名</label>
            <input id="name" type="text" placeholder="请输入真实姓名">
        </div>
        <div class="input-group">
            <label for="">身份证号</label>
            <input id="ID" type="text" placeholder="身份证号">
        </div>
        <div  class="custom-center btn-wrapper"> 
            <button  id="nextBtn" class="mui-btn mui-btn-warning mui-btn-block">下一步</button>
        </div>
        
    </div>
    <script src="<?= base_url() ?>public/js/mui.min.js"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/js/rem.js"></script>
    <script src="https://gw.alipayobjects.com/as/g/h5-lib/alipayjsapi/3.1.1/alipayjsapi.inc.min.js"></script>
    <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
    
    <script>
    
        // 芝麻认证初始化 340521199312274421
        $('#nextBtn').click(function(){
            zmInit();
        });

        if(window.location.href.indexOf('?')!=-1){
            var biz_no = getBizNo(window.location.href);                    
            app.storageSave('biz_no', {"biz_no":biz_no});
            saveZMResults(biz_no);            
        }
        /**
        * 芝麻认证开始
        */
        function zmInit() {
            var name = $('#name').val();
            var cardID = $('#ID').val();
            name='刘双桂';
            cardID='340521199312274421'
            // 禁止状态
            if (name == "" && cardID == "") {
                return;
            }
            $.post('../user/zhimaInit', {
                "cert_name": name,
                "cert_no": cardID,
                "source":'web'
            }, function (data) {
                if (data.s == 200) {
                    var url = data.d.replace(/&amp;/g,"&");                   
                    mui.openWindow({
                        url: url
                    });
                } else {
                    mui.toast(data.d, {
                        type: 'div'
                    });
                }
            }, 'json'); 
        }
        /**
        * 查询芝麻认证的认证结果
        */
        function saveZMResults(flag){
            $.post('../user/zhimaQuery', {
                "biz_no":flag,
                address: "广东省云浮市",
                cid: 18,
                identity: "340521199312274421",
                realName: "刘双桂"
            }, function (data) {
                if (data.s == 200) {
                    $('body').append(`<p>${JSON.stringify(data.d)}</p>`)
                } else {
                    mui.toast(data.d, {
                        type: 'div'
                    });
                }
            }, 'json');
        }
        
        /**
        * @param {url} 地址
        * @param {param} 参数名称key
        * @return  value  对应参数的vaule
        */
        function GetQueryString(url,param) { 
            var currentUrl = url||window.location.href; //获取当前链接
            var arr = currentUrl.split("?");//分割域名和参数界限
            if (arr.length > 1) {
                arr = arr[1].split("&");//分割参数
                for (var i = 0; i < arr.length; i++) {
                    var tem = arr[i].split("="); //分割参数名和参数内容
                    if (tem[0] == param) {
                        return tem[1];
                    }
                }
                return null;
            }
            else {
                return null;
            }
        }
        /**
        * @param {url} 认证Url
        * @return  biz_no  开始认证接口返回url中的参数
        */
        function getBizNo(url){
            var biz_content = decodeURIComponent(GetQueryString(url,'biz_content'));
            return JSON.parse(biz_content).biz_no;
            console.log(decodeURIComponent(url))
        }
        /*var url = 'http://web.bfy100.com/supvp/supvp/zm1?biz_content=%7B%22biz_no%22%3A%22ZM201902283000000767600364093529%22%2C%22passed%22%3A%22true%22%7D&sign=peVy%2F4ifRX4pw44brP%2BNsJKWopttSRXJk4pyiVtMTMOh0xwDklbxlIqsnIDVtIBcvsb7BhqrczD%2B5sJe8PDsV4OzMacKZZ8EdzmwGsgAKnvY%2FXYXku3UcPqrBVORGtbHlU%2FYib8uCHvNZVAZP9RFJsZudTyotu%2Ftyu3x6xas%2BKSDP9uCW9rNPHKK2NZQ9Mq6Lg75m3bjvV7dd5NCYq9lHqTKTZBfI2d6sdv72vdRf7ePn%2FzhxMbamWi7VM569rVJIPlQBm14kRamvWzsQDJhigTss8ILirxNIS%2FKqbwqSiVPi8hOYXQ6tl%2FZHzSFHu%2FKUsmxjcOh1hpc8HklciAhGw%3D%3D'
        url = url.replace(/&amp;/g,"&")
        var biz_content = decodeURIComponent(GetQueryString(url,'biz_content'));
            console.log(decodeURIComponent(url))
            console.log(JSON.parse(biz_content).biz_no)
        */
    </script>
</body>

</html>