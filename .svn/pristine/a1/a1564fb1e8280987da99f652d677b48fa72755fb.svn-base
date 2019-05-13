<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <style>
            body{
                margin:0;
            }
        </style>
    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content mui-slider-indicatorcode mui-segmented-control mui-segmented-control-inverted">
            <div class="mui-scroll">
                <div class="mui-loading">
                    <div class="mui-spinner">
                    </div>
                </div>
            </div>
        </div>


        
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script>
            window.onload=function(){
                document.title = "尺码对照表";
                var url = GetQueryString('url');
                $('.mui-scroll').html(`<img src='${url}' alt="">`);
            }

            function GetQueryString(param) { 
                var currentUrl = window.location.href; //获取当前链接
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

            localStorage.setItem('page', JSON.stringify({page:'sizeTable'}));
        </script>
    </body>

</html>