<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>APP体验反馈</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>

            .mui-table-view-cell .content li,
            .mui-table-view-cell .content.problem-des p{
                color:#a6a6a6;
            }
            .ctm-radio img{
                width: 0.42rem;
                margin-right: 0.1rem;                
                vertical-align: text-top;
            }
            .ctm-radio input{
                position:absolute;
                opacity: 0;
            }
            .mui-table-view-cell{
                padding-left: 0.75rem;
                padding-right: 0.75rem;
            }
            .mui-table-view-cell h3{
                font-size: 0.4rem;
                padding: 0.26rem 0;
                justify-content: start;
            }
            .mui-table-view-cell h3 img{
                width: 0.24rem;
                height: 0.24rem;
            }
            
            .mui-table-view-cell .content{
                margin-top: 0.28rem;
            }
            .mui-table-view-cell .content li{
                float:left;
                width: 33.3%;
                color:#a6a6a6;
                margin-bottom: 0.2rem;
            }
            .mui-table-view:after{
                height:0;
            }
            .mui-table-view-cell .content.problem-des{
                background-color: #f5f5f5;
                height: 3.5rem;
                padding: 0.3rem;
            }
            .mui-table-view-cell .content.problem-des textarea{
                background-color: transparent;
                border:none;
                height: 2.4rem;
            }
            .mui-table-view-cell .content.problem-des p{
                text-align: right;
                font-size: 0.3rem;
                line-height: 2;
            }
            .mui-table-view-cell .content input{    
                background-color: #f5f5f5;
                border: none;
            }
            .mui-table-view-cell .imgviewer li{
                position: relative;
                float:left;
                width: 1.8rem;
                margin-right: 0.4rem;
                background: #f5f5f5;
             } 
             .mui-table-view-cell .imgviewer {
                width: 8.8rem;
                /* overflow: hidden; */
             } 
             .mui-table-view-cell .imgviewer li {
                display: flex;
                align-items: center;
                height: 1.8rem;
            }
            .mui-table-view-cell .imgviewer li div{
                overflow: hidden;
                height: 100%;
            }
             .mui-table-view-cell .imgviewer li.loading:before{
                content: '';
                position: absolute;
                background-color: rgba(0,0,0,0.3);
                width: 100%;
                height: 100%;
             } 
             .mui-table-view-cell .imgviewer li img:first-child{
                 width:100%;
             }
             .mui-table-view-cell .imgviewer li .delete-icon{
                position: absolute;
                width: 1rem;
                top: -0.4rem;
                right: -0.4rem;
                font-size: 0.6rem;
                padding:0.2rem;
             }
            .file-uploads {
                overflow: hidden;
                position: relative;
                text-align: center;
                display: inline-block;
            }
            .file-uploads input{
                display:none;
            }
            .icon-addF {
                width: 1.8rem;
                height: 1.8rem;
                border: 1px solid #ccc;
            }
            .icon-addF i{
                font-size: 1.2rem;
                margin-top: 0.1rem;
            }
            .icon-addF p{
                font-size: 0.32rem;
                color: #000;
                position: absolute;
                bottom: 0.05rem;
                width: 100%;
            }
            .btn-box{
                padding-bottom:0.5rem;
            }
            /* .btn-box button.mui-btn:disabled{
                opacity: .25;
            } */
            .disabled-btn{
                opacity: .25;
            }
            button.mui-btn{
                width: 8.6rem;
                border-radius: 0;
                line-height: 1;
                background-color: #000;
            }
            .mui-btn:enabled:active{
                background-color: #000;
                color:#fff !important;
            }
        </style>
    </head>
    <body>
        <div id="pullrefresh" class="mui-scroll-wrapper mui-content custom-bg-color-white">
            <div class="mui-scroll message">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell">
                        <h3 class="custom-flex">
                            <strong class="custom-margin-right-16">反馈类型</strong><img src="<?= base_url() ?>public/images/Icon/asterisk.png"/>
                        </h3>
                        <ol id="feedback-box" class="mui-cleafix content">
                            
                        </ol>
                    </li>
                    <li class="mui-table-view-cell">
                        <h3 class="custom-flex">
                            <strong class="custom-margin-right-16">问题描述</strong><img src="<?= base_url() ?>public/images/Icon/asterisk.png"/>
                        </h3>
                        <div class="content problem-des">
                            <textarea id="textarea" name="problem" rows="4" placeholder="请填写5-300字的具体问题描述"></textarea>  
                            <p><span id="text-count">0</span>/300</p>  
                        </div>
                    </li>
                    <li class="mui-table-view-cell">
                        <h3 class="custom-flex">
                            <strong class="custom-margin-right-16">上传图片</strong>
                        </h3>
                        
                        <div class="content imgviewer">
                            <label class="icon-addF file-uploads file-uploads-html5"> 
                                <input type="file" name="file" id="file2" multiple="multiple">
                                <i class="mui-icon mui-icon-plusempty"></i>
                                <p>最多4张</p>
                            </label>
                        </div>
                    </li>
                    <li class="mui-table-view-cell">
                        <h3 class="custom-flex">
                            <strong class="custom-margin-right-16">联系方式</strong><img src="<?= base_url() ?>public/images/Icon/asterisk.png"/>
                        </h3>
                        <div class="content">
                            <input type="number" id="phoneNum" placeholder="请输入手机号"/>
                        </div>
                    </li>
                </ul>
                <div class="btn-box">
                    <button id="submit_feedback"   data-loading-text="提交中" type="button" class="mui-btn custom-block-btn disabled-btn">提交反馈</button>
                </div>        
            </div>
        </div>

        <script id="feedback-tpl" type="text/html">
                {{each d item index}}
                <li>
                    <label class="ctm-radio" data-type="{{item.type}}">
                        <img src="<?= base_url() ?>public/images/Icon/checkbox_1.png"/>
                        <input class="single-hook" name="radio" type="radio" >
                        {{item.name}}
                    </label>
                </li>
                {{/each}}
        </script>
         
        
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/app.js"></script>
        <script src="<?= base_url() ?>public/js/template.js"></script>        
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
              
        var feedbackTypes={
               d:[{
                   name:'操作问题',
                   type:1,
                    checked:false
               },{
                   name:'页面问题',
                   type:2,
                    checked:false
               },{
                   name:'闪退卡顿',
                   type:3,
                    checked:false
               },{
                   name:'优化建议',
                   type:4,
                    checked:false
               },{
                   name:'其他',
                   type:0,
                    checked:false
               },]
           }
            $(function () {

                mui.init({
                    swipeBack: false //启用右滑关闭功能
                });

                (function (mui, $) {
                    /* =======================   AJAX  =======================*/
                     
                    // 反馈类型
                    $('#feedback-box').html(template('feedback-tpl', feedbackTypes));  

                    $.post('../user/getuserinfo', {}, function (data) {
                        var data = JSON.parse(data);
                        if (data.s == 200) {
                            var phoneStr = data.d[0].mobile;
                            phone = app.storageFetch('authInfo').mobile;
                            $('#phoneNum').attr({'type':'text','data-phone':phone,'disabled':true}).val(phoneStr);
                        }
                    });
                    // 提交反馈
                    function sendFeedback(info){
                        $.post('../user/feedback', info, function (data) {
                            if(data.s==200){
                                mui.toast('提交成功');
                            }else{
                                mui.toast('提交失败');
                            }
                            mui('#submit_feedback').button('reset');                            
                        }, 'json');
                    }

                    /* =======================   Event  =======================*/
                    

                    //初始化滚动组件
                    var deceleration = mui.os.ios ? 0.003 : 0.0009;
                    mui('.mui-scroll-wrapper').scroll({
                        bounce: true,
                        indicators: false, //是否显示滚动条
                        deceleration: deceleration
                    });
                    //禁止页面滑动
                    document.querySelector('.mui-scroll-wrapper').addEventListener("scroll", function(){
                        if(document.activeElement ==$('#textarea')[0] ){
                            $('#textarea').blur();
                        }else if(document.activeElement ==$('#phoneNum')[0] ){
                            $('#phoneNum').blur();
                        }
                    }, false);

                    
                    /* 
                    * type:选中的反馈类型
                    * isUse: 手机号是否满足条件
                    * noLoading: 上传图片，是否加载完毕
                    */
                    var type=-1,isUse= false,noLoading=true;
                    
                    // 选择反馈类型  
                    singleChecked();
                    mui('#feedback-box').on('tap','li',function(){
                        // 反馈类型
                        feedbackTypes.d.forEach((item,j)=>{
                            if($(this).index() ==j){
                                type = item.type;
                            }
                        });
                        if(type!==-1 && isUse&&$('#textarea').val().length>=5){
                            $('#submit_feedback').removeClass('disabled-btn');
                        }else {
                            $('#submit_feedback').addClass('disabled-btn');
                        }
                    });

                    // 发送图片信息
                    changeFileInputEvent();

                    // 监听按钮是否禁用
                    isDisableBtn('#textarea', '#phoneNum','#submit_feedback');
                           
                    // 提交反馈
                    mui('.btn-box').on('tap','#submit_feedback',function(){

                        if($('#submit_feedback').hasClass('disabled-btn')){
                            if(!isUse){
                                mui.toast("手机号码有误，请重填");  
                            }
                            if($('#textarea').val().length<5){
                                mui.toast("问题描述至少5个字");  
                            }
                            return;
                        }
                        if(!noLoading){
                            mui.toast("正在上传图片");  
                            return;
                        }

                        
                        mui('#submit_feedback').button('loading');
                        var text=$("#textarea").val(),
                            phone = $('#phoneNum').val(),
                            dataPhone=$('#phoneNum').attr('data-phone'),
                            feedbackMsg={};
                        // 若用户已登录则获取自定义属性值
                        if(dataPhone){
                            phone =dataPhone;
                        }   
                        // 上传图片返回的url
                        if($('.imgviewer ul').length){
                            var oLi= $('.imgviewer ul li'),imgSrcStr='';
                            $.each(oLi,function(index,item){
                                var imgSrc= $(item).find('img').attr('data-src');
                                if(index == (oLi.length-1)){
                                    imgSrcStr+=imgSrc;
                                }else{
                                    imgSrcStr+=(imgSrc+';');
                                }
                            })
                        }
                        feedbackMsg={
                            type,
                            content:text,
                            mobile:phone,
                            imgs:imgSrcStr
                        }
                        sendFeedback(feedbackMsg);
                    });

                    


                    // ========================== 工具方法 ==========================

                    /*字数限制*/  
                    function changeTextareaVal(el) {  
                        var $this = $(el),  
                            _val = $this.val(),  
                            count = "";  
                        if (_val.length > 300) {  
                            $this.val(_val.substring(0, 300));  
                        }  
                        count = $this.val().length;  
                        $("#text-count").text(count);  
                    };  
            
                    function testPhoneVal(el){
                        // 用户已登录，手机号已存在
                        if($(el).attr('data-phone')){
                            isUse=true;
                            return;
                        }
                        // 验证手机号
                        var phoneVal = $(el).val();
                        if(phoneVal&&(phoneVal.length==11|| (/^1(3|4|5|7|8)\d{9}$/.test($.trim(phoneVal))))){
                            isUse=true;
                        }else{
                            isUse=false;
                        }
                    }

                    // 按钮状态
                    function isDisableBtn(textarea, phone,btn) {
                        $('.mui-table-view').on('input propertychange', function (e) {
                            // 反馈类型
                            feedbackTypes.d.forEach((item,j)=>{
                                if(item.checked){
                                    type = j;
                                }
                            });
                            // textarea
                            if(e.target.id=='textarea'){
                                changeTextareaVal(e.target);
                            }
                            // input
                            testPhoneVal(phone);
                            if(type!==-1 &&isUse&&$('#textarea').val().length>=5){
                                $(btn).removeClass('disabled-btn');
                            }else {
                                $(btn).addClass('disabled-btn');
                            }
                        });
                    }

                    // 选择反馈类型                 
                    function singleChecked() {
                        var aRadio = $('.single-hook'),
                            unCheckedSrc = "<?= base_url() ?>public/images/Icon/checkbox_1.png",
                            checkedSrc="<?= base_url() ?>public/images/Icon/checkbox_2.png";
                        $.each(aRadio, function (i,item) {
                            this.onchange = function () {
                                var state = this.checked;
                                var oImg = $(this).parent().find('img');
                                if(state){
                                    oImg.next().attr('checked',true);
                                    oImg.attr('src',checkedSrc).closest('li').siblings().find('img').attr('src',unCheckedSrc).next().attr('checked',false);
                                    feedbackTypes.d.forEach((item,j)=>{
                                        item.checked=false;                                        
                                    });
                                    feedbackTypes.d[i].checked=true;
                                }
                            }
                        });
                    }
                    
                    
                    // 发送图片信息
                    function changeFileInputEvent(){                                                
                        var oimg = document.querySelector('#file2');
                        var PicURL = window.URL || window.webkitURL;
                        if (PicURL) {
                            
                            // 给input添加监听
                            $(oimg).change(function () {
                                var file = oimg;
                                imgReader(file,
                                () => console.error(isNotImage),
                                (res) => {
                                    var data = res.data;
                                    // 处理数据
                                    var imgSize = $('.imgviewer ul').children().size();
                                    data = data.length>4?data.slice(0,4): data;
                                    
                                    if(imgSize&&imgSize+data.length>4){
                                        var len = 4-imgSize;
                                        data = data.slice(0,len);
                                    }
                                    // Ajax
                                    if(data.length==1){
                                        uploadImg(data[0]);
                                    }else{
                                        uploadImgList(data);
                                    }
                                    var html='';
                                    for (var i = 0; i < data.length; i++) { 
                                        if (i == 4) break; 
                                        html +=`<li class="loading"><div class="custom-flex"><img class="upload-img" src="${data[i].src}" alt=""/></div><img class="delete-icon" src="<?= base_url() ?>public/images/Icon/delete-icon.png"/></li>`; 
                                    }
                                    if(!$('.imgviewer ul').length){
                                        $('.imgviewer').prepend('<ul>'+html+'</ul>')
                                    }else if(imgSize+data.length<=4){
                                        $('.imgviewer ul').prepend(html)                                    
                                    }

                                    if($('.imgviewer ul').children().size()>=4){
                                        $('.icon-addF').hide();
                                    }
                                    // event
                                    $('.imgviewer').on('click','.delete-icon',function(){
                                        $(this).closest('li').remove();
                                        if($('.imgviewer ul').children().size()<4){
                                            $('.icon-addF').show();
                                        }
                                    });
                                });
                            })
                        }
                    }
                    function uploadImg(img){
                        // 上传至服务器
                        noLoading = false;
                        $.ajax({
                            type: "post",
                            url: "../Upload/upload",
                            data: {
                                file:img.src,
                                type:`.jpeg`
                            },
                            dataType: "json",
                            success: function (data) {
                                if (data.s === 200){
                                    var src = data.d;
                                    $('.imgviewer ul li').eq(0).removeClass('loading').find('.upload-img').attr({'data-src':src,'src':src});
                                    noLoading = true;
                                }
                            }
                        })
                    }
                    function uploadImgList(imgList){
                            noLoading = false;
                        
                             var filelist='',
                             typelist=''
                           
                        $.each(imgList,function(i,item ){
                            if(i>4) return;
                            if(i==(imgList.length-1)){
                                filelist+=item.src.substring(23);
                                typelist+=`.jpeg`;
                            }else{
                                filelist+=item.src.substring(23)+',';
                                typelist+=`.jpeg,`;
                            }
                        })
                        // 上传至服务器
                        $.ajax({
                            type: "post",
                            url: "../Upload/uploadList",
                            data: {
                                filelist:filelist,
                                typelist:typelist
                            },
                            dataType: "json",
                            success: function (data) {
                                if (data.s === 200){
                                    var imgs = data.d;
                                    $('.imgviewer ul li').each(function(i,el ){
                                        console.log(imgs[i])
                                        $(el).removeClass('loading').find('.upload-img').attr({'data-src':imgs[i],'src':imgs[i]});
                                    });
                                    noLoading = true;
                                }
                            }
                        })
                    }
                    function imgReader(file, callback, callback2) {
                        dataArr = {
                            data: []
                        };
                        fd = new FormData();
                        let files = file.files;
                        for (let i = 0; i < files.length; i++) {
                            if (!files[i]) {
                                return false;
                            }
                            // if (!files[i].type || files[i].type === '' || !/image\/\w+/.test(files[i].type)) {
                            //     // callback();
                            //     return false;
                            // }
                            var reader = new FileReader();
                            fd.append(i, files[i]);
                            reader.readAsDataURL(files[i]); //转成base64

                            let img = new Image();
                            reader.onload = function (e) {
                                img.src = this.result;

                                let that = this;
                                img.onload = function () {

                                    let width = img.naturalWidth;
                                    let height = img.naturalHeight;
                                    const imgMsg = {
                                        src: that.result,
                                        type: files[i].type.split('/')[1],                                                                                
                                        width,
                                        height
                                    };
                                    dataArr.data.push(imgMsg);
                                    console.log(dataArr)
                                };
                            }
                        }
                        let promise = new Promise((resolve, reject) => {

                            setTimeout(function () {
                                console.log('执行完成');
                                resolve(dataArr);
                            },200)
                        });
                        promise.then((value) => {
                            callback2(value);
                        }).catch(() => {
                            // alert('Promise Rejected');
                        });
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



