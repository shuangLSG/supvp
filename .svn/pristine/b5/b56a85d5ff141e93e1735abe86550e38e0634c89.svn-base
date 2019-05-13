<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>上传证件照片</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>
            html,
            body {
                height: 100%;
            }

            a:active {
                color: #fff;
            }

            h3 {
                height: 1.52rem;
                line-height: 1.52rem;
                font-size: 0.38rem !important;
                text-align: center;
            }

            .ID-card-wrapper {
                margin: 0 auto 0.8rem;
                position: relative;
            }

            .ID-card,
            .ID-card-wrapper,
            input[name="sendpic"] {
                width: 6.46rem;
                height: 3.8rem;
            }

            input[name="sendpic"] {
                position: absolute;
                bottom: 0;
                left: 0;
                opacity: 0;
            }

            .tip-wrapper {
                padding-bottom: 0.56rem;
            }

            .upload-btn {
                margin: 0.45rem auto 0;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">
        <h3>请上传本人身份证照片</h3>
        <div class="ID-card-wrapper">
            <img id="photo1" class="ID-card" data-src="<?= base_url() ?>public/images/use/upload1.png" src="<?= base_url() ?>public/images/use/upload1.png" alt="">
            <input type="file" name="sendpic" id="ID-card-1" multiple="multiple">
            <input type="hidden" value="" id="getphoto1">
        </div>
        <div class="ID-card-wrapper">
            <img id="photo2" class="ID-card" data-src="<?= base_url() ?>public/images/use/upload2.png" src="<?= base_url() ?>public/images/use/upload2.png" alt="">
            <input type="file" name="sendpic" id="ID-card-2" multiple="multiple">
            <input type="hidden" value="" id="getphoto2">
        </div>

        <div class="custom-bg-color-white tip-wrapper">
            <img src="<?= base_url() ?>public/images/use/tip.png" width="100%" alt="">
            <a id="upload" class="upload-btn custom-block-btn" href="javascript:;">确认上传</a>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script>

            $(function () {

                mui.init({
                    swipeBack: true //启用右滑关闭功能
                });

                (function (mui, $) {
                    $("#ID-card-1").change(function (e) {
                        var filepath = $("#ID-card-1").val();
                        var extStart = filepath.lastIndexOf(".");
                        var type = filepath.substring(extStart, filepath.length).toLowerCase();
                        var reader = new FileReader();
                        reader.onload = function () {
                            $.ajax({
                                type: "post",
                                url: "../Upload/upload",
                                data: "file=" + encodeURIComponent(this.result) + "&type=" + type,
                                dataType: "json",
                                success: function (data) {
                                    if (data.s === 200){
                                        $("#photo1").attr('src', data.d);
                                        $('#getphoto1').val(data.d);
                                    }
                                }
                            });
                        };
                        reader.readAsDataURL(this.files[0]);
                    });

                    $("#ID-card-2").change(function (e) {
                        var filepath = $("#ID-card-2").val();
                        var extStart = filepath.lastIndexOf(".");
                        var type = filepath.substring(extStart, filepath.length).toLowerCase();
                        var reader = new FileReader();
                        reader.onload = function () {
                            $.ajax({
                                type: "post",
                                url: "../Upload/upload",
                                data: "file=" + encodeURIComponent(this.result) + "&type=" + type,
                                dataType: "json",
                                success: function (data) {
                                    if (data.s === 200){
                                        $("#photo2").attr('src', data.d);
                                        $('#getphoto2').val(data.d);
                                    }
                                }
                            });
                        };
                        reader.readAsDataURL(this.files[0]);
                    });

                    // 确认上传按钮
                    document.getElementById('upload').addEventListener('tap', function () {
                        var photo1 = $('#getphoto1').val();
                        var photo2 = $('#getphoto2').val();
                        if (photo1 == '' || photo2 == '') {
                            mui.toast('请上传相关照片', { type: 'div'});
                            return false;
                        }
                        var users = app.storageFetch('userbind');
                        var name = users.user;
                        var number = users.userid;
                        $.post('../user/addIdentityCard', {'realname': name, 'idcard': number, 'idcards': photo1, 'idcardz': photo2}, function (data) {
                            if (data.s == 200) {
                                mui.toast('提交成功', {type: 'div' });
                                setTimeout(function () {
                                    tools.route('mine');
                                }, 3000);
                            } else {
                                mui.toast(data.d, { type: 'div'});
                            }
                        }, 'json');
                    });

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