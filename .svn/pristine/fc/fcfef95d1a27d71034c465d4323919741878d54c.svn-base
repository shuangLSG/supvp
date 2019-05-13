<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>实名认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/rzIdentityCard.css?t=0.01" />
    </head>

    <body class="custom-bg-color-gray">
        <div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable mui-slide-in mui-active" >
			<!--侧滑菜单部分-->
			
            
		
            <aside id="offCanvasSide" class="mui-off-canvas-right mui-transitioning">
                <header class="mui-bar mui-bar-nav">
                    <div class="img-arrow mui-pull-left">
                        <img src="<?= base_url() ?>public/images/icons/back.png" alt="">
                    </div>
                    <h1 class="mui-title"></h1>
                </header>
                <div id="offCanvasSideScroll" class="mui-scroll-wrapper mui-content">
                    <div class="mui-scroll">
                        
                        <div class="content"></div>
                    </div>
                </div>
            </aside>

            <aside id="offCanvasSideArea" class="mui-off-canvas-right mui-transitioning">
                <div class="mui-content mui-row" style="height:100%">
                    <div id="capitailControls"  style="height:100%" class="mui-col-xs-6">
                        <div  class="mui-scroll-wrapper mui-content bg-white">
                            <div class="mui-scroll">
                                
                            </div>
                        </div>
                    </div>
                
                    <div id="cityControls" style="height:100%" class="mui-col-xs-6">
                        <div class="mui-scroll-wrapper mui-content page-bg">
                            <div class="mui-scroll">
                            </div>
                        </div>
                    </div>
                </div>  
            </aside>


            <div class="mui-inner-wrap mui-transitioning">
                    
                <div id="offCanvasContentScroll" class="mui-scroll-wrapper mui-content bg-transparent">
                    <div class="mui-scroll">
                        <div class="main-content">
                            <div class="step-box step1">
                                <div class="step-hd">
                                    <img src="<?= base_url() ?>public/images/limit/step1.png" alt="">
                                </div>
                                <div class="input-group">
                                    <input id="name"  type="text" placeholder="请输入身份证姓名">
                                </div>
                                <div class="input-group">
                                    <input id="identity" type="number" placeholder="请输入身份证号码">
                                </div>
                                <div id="link-areaSelect"  class="input-group">
                                    <input id="area" type="text" placeholder="请输入身份证地址">
                                </div>
                            </div>
                            <div class="step-box step2">
                                <div class="step-hd">
                                    <img src="<?= base_url() ?>public/images/limit/step2.png" alt="">
                                </div>
                                <div class="ID-card-wrapper ID-1 mui-center bg-white">
                                    <div class="ID-box custom-flex-c">
                                        <img class="position-c" src="<?= base_url() ?>public/images/limit/ID_3.png" alt="">
                                        <input type="file" name="sendpic" id="ID-card-1" accept="image/*" class="position-c">
                                        <img class="position-c Identity-img mui-hidden" src="" alt="sfz">
                                    </div>
                                    <p class="mui-text-center font-gray">上传或拍摄身份证正面</p>
                                </div>
                                <div class="ID-card-wrapper ID-2 mui-center">
                                    <div class="ID-box custom-flex-c">
                                        <img class="position-c" src="<?= base_url() ?>public/images/limit/ID_3.png" alt="">
                                        <input type="file" name="sendpic" id="ID-card-2"  accept="image/*" class="position-c">
                                        <img class="position-c Identity-img mui-hidden" src="" alt="sfz">
                                    </div>
                                    <p class="mui-text-center font-gray">上传或拍摄身份证反面</p>
                                </div>

                                <div id="protocol" class="mui-input-row mui-checkbox mui-left">
                                    <p  class="font-gray2 text-size-12">
                                        本人已阅读并同意
                                        <span id="agreementinfo" class="font-blue">《个人信息查询及使用授权书》</span>、
                                        <span id="agreementlimit" class="font-blue">《额度使用合同》</span>
                                    </p>
                                    <input id="agree" name="checkbox" type="checkbox" disabled/>
                                </div> 
                                <!--登录按钮-->
                                <div class="btn-box custom-flex">
                                    <button type="button" id="upload" class="mui-btn mui-btn-blue mui-btn-disabled mui-btn-block text-size-16">下一步</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/areaSelection.js" type="text/javascript" charset="utf-8"></script>
        
        <script>	 


            $(function () {

                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });
                mui('.mui-scroll-wrapper').scroll({
                    deceleration: 0.0005 
                });
                (function (mui, $) {
                    initPage();

                    $("#ID-card-1").on('change',function (e) {
                        IdentityUpload(this,'z');
                    });

                    $("#ID-card-2").change(function (e) {
                        IdentityUpload(this,'f');
                    });

                    /** 
                     * 确认上传按钮
                    */
                    document.getElementById('upload').addEventListener('tap', function () {
                        
                       
                        var name = $('#name').val();
                        var identity = $('#identity').val();
                        var address = $('#area').val();        
                        var Zface = $("#ID-card-1").siblings('.Identity-img').attr('src');
                        var Fface = $("#ID-card-2").siblings('.Identity-img').attr('src');
                        var agreementlimit = $('#agreementlimit').attr('data-protocol'),
                            agreementinfo = $('#agreementinfo').attr('data-protocol');
                        var json={
                            realname: name,   //姓名
                            idcard: identity, // 身份证号
                            idcards: Zface, // 身份证正面照url
                            idcardz: Fface, // 身份证反面照url
                            address: address,
                            agreementlimit: agreementlimit,// 协议url
                            agreementinfo:agreementinfo
                        }
                     
                        identityUp(json);
                        
                    });
                    // json={
                    //     realname: '刘双桂',
                    //     idcard: '340521199312274421',
                    //     idcards: 'http://image.bfy100.com/1555552691.jpg',
                    //     idcardz: 'http://image.bfy100.com/1555552696.jpg',
                    //     address: '广东省云浮市',
                    //     agreementinfo:'http://image.bfy100.com/axy182266390801555552698.docx',
                    //     agreementlimit:'http://image.bfy100.com/bxy182266390801555552698.docx'
                    // }
                    // identityUp(json);
                    
                    function identityUp(json){
                        $.post('../user/addIdentityCard',json, function (data) {
                            if (data.s == 200) {
                                var info={realName:json.realname,idcard:json.idcard,address:json.address}
                                app.storageSave('ID',info);
                                tools.route('faceRecognition');
                            } else {
                                mui.toast(data.d, { type: 'div'});
                            }
                        }, 'json');
                    }
                  
                    /**
                     *  按钮 状态
                     *  1.若姓名、身份证号、身份证正面照 存在 
                     *      查看协议   1.checkbox 未选中：则显示协议，
                     *                2. checkbox已选中：则取消选中效果
                     *    反之，不可点击查看协议,按钮禁止点击  
                     *  2.checkbox 选中后，并所需信息全部填写完成，按钮才可点击
                     * */
                    var old={
                        name:'',
                        identity:'',
                        Zface:''
                    };
                    function isDisableBtn() {
                        var name = $('#name').val();
                        var identity = $('#identity').val();
                        var address = $('#area').val();
                        
                        var Zface = $("#ID-card-1").siblings('.Identity-img').attr('src');
                        var Fface = $("#ID-card-2").siblings('.Identity-img').attr('src');
                        // Zface= 'http://image.bfy100.com/1555552691.jpg'
                        // Fface= 'http://image.bfy100.com/1555552696.jpg'

                        // step:1
                        if ( name!==''&& identity && Zface) {
                            $('input[type="checkbox"]').removeAttr('disabled');

                            // step:2
                            if($('#agree').prop('checked')&&Fface){
                                $('#upload').removeClass('mui-btn-disabled');
                            }else{
                                $('#upload').addClass('mui-btn-disabled');
                            }

                            if(old['name']==name && old['identity']==identity && old['Zface']==Zface)return;
                            setTimeout(() => {
                                getContract();
                            }, 1000);

                        } else {
                            $('input[type="checkbox"]').attr('disabled',true).prop('checked',false);
                            $('#upload').addClass('mui-btn-disabled');
                        }
                        
                        old={
                            name:name,
                            identity:identity,
                            Zface:Zface
                        };
                    }
                    
                    // 点击 协议弹框中的 ‘我已阅读’按钮，checkbox选中状态
                    $('#agree').on('click',function(){
                        isDisableBtn();
                    });
                  
                    // 查看协议是否可点击
                    $('#protocol span').on('tap',function(){

                        var url = $(this).attr('data-protocol'),
                        content = app.storageFetch('protocol').word,
                        i= $(this).index();

                        $('#offCanvasSide').find('.content').html(content[i]).end().addClass('mui-active');
                        $('#offCanvasSide').find('.mui-title').text($(this).text());
                        $('#offCanvasSide').refresh();
                    });

                    // 关闭侧滑菜单
                    mui('.mui-off-canvas-right').on('tap','.img-arrow',function(){
                        $('.mui-off-canvas-right').removeClass('mui-active');
                    });
                    
                  
                    // 上传身份证照片
                    function IdentityUpload(el,type){ 
                        var reader = new FileReader();
                        var phone = app.storageFetch('authInfo').mobile; 
                        reader.onload = function () { 
                            promise('../user/identityUpCreate',{
                                face:type,
                                phonenum:phone,
                                type:'.jpg',
                                file:this.result
                            }).then((res)=>{
                                if (res.s === 200){
                                    $(el).siblings('.Identity-img').attr('src',res.d).removeClass('mui-hidden');  
                                    
                                    isDisableBtn();                          
                                }
                            });
                        };

                        reader.readAsDataURL(el.files[0]);
                    }
                    
                    /** 
                     * 获取服务协议
                     * 
                     * */
                    function getContract(){
                        var name = $('#name').val();
                        var identity = $('#identity').val();
                        var phone = app.storageFetch('authInfo').mobile; 
                      
                        promise('../user/IDContract',{
                            phonenum:phone,
                            name:name,
                            identity:identity
                        }).then((res)=>{
                            if (res.url){
                                // 记录协议地址
                                $('#protocol span:eq(0)').attr('data-protocol',res.url[0]);
                                $('#protocol span:eq(1)').attr('data-protocol',res.url[1]);
                                app.storageSave('protocol',res);
                            }
                        });
                    }

                    function initPage(){
                       var area = app.storageFetch('areaSelection');
                       $('#area').val(area.city);
                       app.storageRemove('areaSelection');
                    }

                    // ===================== start: 地区选择
                    mui('.step1').on('tap', '#link-areaSelect', function () {
                        $(document).find('input').blur();
                        $('#offCanvasSideArea').addClass('mui-active');
                    });
               
                    var plugin = new CustomPlugin(); 
                    var data = plugin.ajaxData;
                    var urlParam = '';

                    $('#offCanvasSideArea').on('tap','li',function(){
                        $(this).addClass('active').siblings().removeClass('active');
                        if($(this).closest('.mui-col-xs-6').attr('id') == 'capitailControls'){
                            var id = this.dataset.id;        
                            plugin.showCity(id,data);
                        }
                    });
                    $('#cityControls').on('tap','li',function(){
                        var capital =  $('#capitailControls').find('.active').text(),
                            city =  $(this).text();
                            urlParam = capital+city;
                        $('#link-areaSelect input').val(urlParam);    
                        $('#offCanvasSideArea').removeClass('mui-active');
                        isDisableBtn();
                    });
                
                 
                    
                    // ===================== end: 地区选择
  

                    var tools = {
                        route: function (url) {
                            mui.openWindow({
                                url: url
                            });
                        }
                    }
                })(mui, jQuery);
            })
        </script>
    </body>

</html>