<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>地区选择</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <!-- <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" /> -->
        <style>
            .bg-white{
                background-color:#fff;
            }
            .page-bg{
                background-color:#F9F9FC;
            }
            html,body,.mui-row,.mui-col-xs-6{
                height:100%
            }
            .font-purple{
                color:#5E677B;
            } 
        
            .text-size-15{
                font-size: 0.4rem;
            }

            li{
                position:relative;
                height: 1.333rem;
                line-height: 1.333rem;
            }
            li.active{
                color:#367DF8;
            }
            li.active:before{
                content:'';
                position:absolute;
                left:0.44rem;
                top:32%;
                height:0.4rem;
                width:0.08rem;
                background-color:#366BFE;
            }
        </style>
    </head>

    <body>
        <div class="mui-content mui-row">
			<div id="capitailControls" class="mui-col-xs-6">
                <div  class="mui-scroll-wrapper mui-content bg-white">
                    <div class="mui-scroll">
                        
                    </div>
                </div>
            </div>
           
			<div id="cityControls" class="mui-col-xs-6">
                <div class="mui-scroll-wrapper mui-content page-bg">
                    <div class="mui-scroll">
                    </div>
                </div>
			</div>
		</div>  


        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/areaSelection.js" type="text/javascript" charset="utf-8"></script>
       
        <script>

            $(function () {

                mui.init();

                mui('.mui-scroll-wrapper').scroll({
                    deceleration: 0.0005
                });
                    
               
                var plugin = new CustomPlugin(); 
                var data = plugin.ajaxData;
                var urlParam = '';

                $('.mui-content').on('tap','li',function(){
                    $(this).addClass('active').siblings().removeClass('active');
                    if($(this).closest('.mui-col-xs-6').attr('id') == 'capitailControls'){
                        var id = this.dataset.id;        
                        plugin.showCity(id,data);
                    }
                });
                $('#cityControls').on('tap','li',function(){
                    setUrlParam();
                });
            
                function setUrlParam(){
                    var capital =  $('#capitailControls').find('.active').text(),
                        city =  $('#cityControls').find('.active').text();
                        urlParam = capital+city;
                    var info = storageFetch('areaSelection');
                    info['city'] = urlParam;
                    info['area'] = urlParam;
                    localStorage.setItem('areaSelection', JSON.stringify(info));
                    

                    window.history.go(-1);  
                    location.replace(document.referrer);//刷新
                }   
                function storageFetch(key) {
                    return JSON.parse(localStorage.getItem(key)) || [];
                } 
            })
        </script>
    </body>

</html>