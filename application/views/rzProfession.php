<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>职业认证</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/limitRZ.css" />

    </head>

    <body>
        <div class="mui-scroll-wrapper mui-content bg-white">
            <div class="mui-scroll page-section-60">
                <section class="limit-hd">
                    <h2 class="text-size-25 font-black">职业认证</h2>
                    <div class="limit-content">
                        <span class="font-SFU text-size-30 font-deep-purple">7,000</span>
                        <p class="font-purple tetx-size-12">最高可提升额度(元)</p>
                    </div>
                </section>

              

                <section class="limit-bd margin-h-10">
                    <form class="mui-input-group">
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">公司名称</label>
                            <input id="name" data-type="name" type="text" placeholder="请输入公司名称">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">职业类别</label>
                            <input id="profession" data-type="profession" type="text" placeholder="请输入职业类别">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">工作岗位</label>
                            <input id="station" data-type="station" type="text" placeholder="请输入工作岗位">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">税前月薪</label>
                            <input id="wage" data-type="wage" type="text" placeholder="请输入税前月薪(元)">
                        </div>
                        <div id="link-areaSelect" class="mui-input-row text-size-15">
                            <label class="font-black">公司地址</label>
                            <input id="area" data-type="area" type="text" placeholder="选择公司地址">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">公司详细地址</label>
                            <input id="address" data-type="address" type="text" placeholder="请输入公司详细地址">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">公司电话</label>
                            <input id="telephone" data-type="telephone" type="text" placeholder="请输入公司电话">
                        </div>
                    </form>
                    <div class="mui-button-row">
                        <small class="text-size-12 font-purple">所有信息仅用于提升额度，绝不对外提供</small>
                        <button id="submit" class="mui-btn mui-btn-block mui-btn-disabled text-size-16 custom-radius">确认并提交</button>
                    </div>
                </section>
            </div>
        </div>  


        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
       
        <script>

            $(function () {

                mui.init();                
                (function (mui, $) {
                    initPage();

                    // 登录按钮的禁用状态
                    $('input').on('input propertychange', function () {
                        listenInput();
                    });

                 
                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                    mui('form').on('tap','#link-areaSelect',function(){                        
                        var json = ajaxParam();
                        localStorage.setItem('areaSelection', JSON.stringify(json));
                        tools.route('../supvp/areaSelection');
                    });


                    // 提交认证
                    document.querySelector('#submit').addEventListener('tap', function () {
                        if($(this).hasClass('mui-btn-disabled')){
                            mui.toast('请完善信息');return;
                        }
                       
                        addProfession();
                    });

                    // ========================================== 工具方法 =======================================
                    function listenInput(){
                        var telephone = $('#telephone').val(),
                        name = $('#name').val(),
                        profession = $('#profession').val(),
                        station = $('#station').val(),
                        wage = $('#wage').val(),
                        area = $('#area').val(),
                        address = $('#address').val();
                        
                        if (telephone!== ""&& name!== ""&&profession!== ""&& station!== ""&& wage!== ""&&area!== ""&&address!=='') {
                            $('button').removeClass('mui-btn-disabled').addClass('custom-btn-gradient');
                        } else {
                            $('button').addClass('mui-btn-disabled').removeClass('custom-btn-gradient');
                        }
                    }
                    function ajaxParam(){
                        var json={};
                        $('.mui-input-group input').each(function(i,item){
                            var key = item.dataset.type;
                            json[key] = item.value;
                        });
                        return json;
                    }
                       
                    function addProfession(){
                        var json = ajaxParam();
             
                        $.post('../user/addProfession',json, function (res) {
                            if (res.s == 200) {
                                tools.route('../supvp/auditing');
                            }else{
                                mui.toast(res.d);
                            }
                        }, 'json');
                    }
                    function initPage(){
                        var info = storageFetch('areaSelection');
                        for(var key in info){
                            $('input[data-type="'+key+'"]').val(info[key]);
                        }
                       
                        listenInput(); 
                        storageRemove('areaSelection');
                    }
                    
                    function storageFetch(key) {
                        return JSON.parse(localStorage.getItem(key)) || [];
                    }
                    function storageRemove(key) {
                        localStorage.removeItem(key);
                    }
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