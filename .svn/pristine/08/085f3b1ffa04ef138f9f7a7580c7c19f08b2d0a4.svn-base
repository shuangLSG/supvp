$(function () {
    mui.init({
        swipeBack: true //启用右滑关闭功能
    });

    // ================================================ 头像裁剪 
    var cropBoxData; // 裁剪框数据 
    var canvasData; // 生成canvas的数据
    var sWidth = window.screen.width;
    var initCropper = function (img, input) {
        var $image = img;
        var options = {
            background: false, //是否在容器上显示网格背景 
            aspectRatio: 1, // 纵横比
            viewMode: 0, // 原图的缩放 Options: 0,1,2,3
            autoCropArea: 1, //0.8代表整个图片的80%都处于截取框内
            dragMode: 'move', //在裁剪框外拖动鼠标会移动原图。
            cropBoxMovable: false, //是否允许移动裁剪框
            cropBoxResizable: false, //是否允许通过拖动裁剪框的边框来调整裁剪框的大小
            zoomOnTouch: true, //是否允许在移动端上使用双指触摸缩放原图。

            minCanvasHeight: sWidth,
            minCanvasWidth: sWidth,
            minCropBoxHeight: sWidth,
            minCropBoxWidth: sWidth,
        };

        // Cropper
        $image.cropper(options);

        var $inputImage = input;
        var uploadedImageURL;
        var URL = window.URL || window.webkitURL;
        if (URL) {
            // 给input添加监听
            $inputImage.change(function () {
                var files = this.files;
                var file;
                if (!$image.data('cropper')) {
                    return;
                }
                if (files && files.length) {
                    $('.cropper-wrapper').show();
                    file = files[0];
                    // 判断是否是图像文件
                    if (/^image\/\w+$/.test(file.type)) {
                        // 如果URL已存在就先释放
                        if (uploadedImageURL) {
                            URL.revokeObjectURL(uploadedImageURL);
                        }
                        uploadedImageURL = URL.createObjectURL(file);
                        // 销毁cropper后更改src属性再重新创建cropper
                        $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                        $inputImage.val('');
                    } else {
                        // window.alert('请选择一个图像文件！');
                    }
                }
            });
        } else {
            $inputImage.prop('disabled', true).addClass('disabled');
        }
    }

    var crop = function () {
        var $image = $('#photo');
        var $target = $('#head-icon');
        var cs = $image.cropper('getCroppedCanvas', { // 裁剪后的长宽！！
            width: 300,
            height: 300
        })

        // 上传至服务器
        var base64 = cs.toDataURL('image/jpeg'); // 转换为base64  
        var type = ".jpeg";
        $.ajax({
            type: "post",
            url: "../Upload/upload",
            data: {
                type:'.jpeg',                
                file:base64
            },
            dataType: "json",
            success: function (data) {

                if (data.s === 200) {
                    var src = data.d;
                    $.post('../user/updateuser', {
                        'userphoto': data.d
                    }, function (data) {

                        if (data.s == 200) {
                            $("#head-icon").find('img').attr('src', src);
                        }
                    }, 'json');
                }
            }
        })
        $('.cropper-wrapper').hide();
    }
    var cancleFn = function () {
        $('.cropper-wrapper').hide();
    }
    // 取消裁剪
    $('#cancle').on('click', function () {
        cancleFn();
    });
    // 裁剪图片
    $('#cropper').on('click', function () {
        crop();
    })
    initCropper($('#photo'), $('#uploadfile'));




    (function (mui, $) {
        $.post('../user/getuserinfo', {}, function (data) {
            if (data.s == 200) {
                $('#head-icon img').attr('src', data.d[0].userphoto);
                $('#username .mui-pull-right').text(data.d[0].nickname);
                $('#mobile span').text(data.d[0].mobile);
                
                var info = app.storageFetch('nopwdlogin');
                if(info && info.flag==0){
                    $('#resetPSW a').attr('data-ispwd',0).append('<span class="mui-pull-right custom-orange">登录密码未设置</span>');
                }
            } else {
                location.href = '../supvp/login';
            }
        }, 'json');


        // ======================================================= 显示输入对话框 ============================================
        mui('#username').on('tap', 'a', function (e) {
            e.detail.gesture.preventDefault(); //修复iOS 8.x平台存在的bug，使用plus.nativeUI.prompt会造成输入法闪一下又没了
            var iIndex = this.parentNode.dataset.index;
            var value = this.children[0].innerHTML;
            tools.prompt(this, value, '修改用户名');
        });

        // 6.修改密码
        document.getElementById('resetPSW').addEventListener('tap', function () {
            var flag = $(this).find('a').attr('data-ispwd');
            if(flag==0){
                tools.route('../supvp/setLoginPwd?flag=0') ; 
            }else{
                tools.route('../supvp/setLoginPwd') ; 
            }
        });

        

        $('#loginout').click(function () {
            mui.confirm('', '确认要退出当前账号吗？', ['取消', '确定'], function (e) {
                if (e.index == 1) {
                    $.post('../login/loginout', {}, function () {
                        tools.route('mine');
                        app.storageRemove('userinfo');
                    }, 'json');
                } else {
                    // '你点了取消按钮';
                }
            })
        });
        // ======================================================== 工具方法 =========================================================
        var tools = {
            // 图片上传
            getObjectURL: function (file) {
                var url = null;
                if (window.createObjectURL != undefined) { // basic
                    url = window.createObjectURL(file);
                } else if (window.URL != undefined) { // mozilla(firefox)
                    url = window.URL.createObjectURL(file);
                } else if (window.webkitURL != undefined) { // webkit or chrome
                    url = window.webkitURL.createObjectURL(file);
                }
                return url;
            },
            // 输入对话框
            prompt: function (el, defaultVal, title) {
                var btnArray = ['取消', '确定'];
                mui.prompt('', defaultVal, title, btnArray, function (e) {
                    if (e.index == 1) {
                        $.post('../user/updateuser', {
                            nickname: e.value
                        }, function (data) {
                            if (data.s == 200) {
                                $('#username .mui-pull-right').text(e.value);
                            }
                        }, 'json')
                    } else {
                        // '你点了取消按钮';
                    }
                })
            },
            route: function (url) {
                mui.openWindow({
                    url: url
                });
            }
        }
    })(mui, jQuery);
})