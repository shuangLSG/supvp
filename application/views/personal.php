<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>个人信息</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/cropper.min.css" />
        <style>
            body,
            html {
                height: 100%;
            }

            .custom-list-wrapper .mui-navigate-right.custom-flex {
                display: flex;
                justify-content: space-between;
            }

            .custom-list-wrapper .mui-navigate-right img {
                width: 1.49rem;
                height: 1.49rem;
                border-radius: 50%;
                margin-right: 0.69rem;
            }

            input[name="sendpic"] {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
            }


            .cropper-wrapper {
                position: fixed !important;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                background: #000;
                z-index: 2;
                display: none;
                position: relative;
            }
            .cropper-wrapper .cropper-action{
                height: 7%;
                z-index:22;
                background-color:#000;
            }
            .cropper-btn {
                /* position: absolute;
                bottom: 10%;
                right: 2%; */
                font-size: 0.4rem;
                color: #fff;
            }

            .cropper-box {
                height: 93%;
                width: 100%;
            }
        </style>
    </head>

    <body class="custom-bg-color-gray">
        <div class=" mui-content">
            <div class="custom-list-wrapper custom-margin-top-16">
                <ul class="mui-table-view">
                    <li id="link-use-info" class="mui-table-view-cell">
                        <a class="mui-navigate-right custom-flex">
                            头像
                            <img id="head-icon" src="" alt="">
                            <input type="file" name="sendpic" id="uploadfile" multiple="multiple">
                        </a>
                    </li>
                </ul>
            </div>
            <div id="name" class="custom-list-wrapper custom-margin-top-16">
                <ul class="mui-table-view">
                    <li class="mui-table-view-cell" data-index="0" id="username">
                        <a class="mui-navigate-right">用户名
                            <span class="mui-pull-right"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="cropper-wrapper">
            <div class="cropper-box">
                <img src="" id="photo">
            </div>
            <div class="cropper-action custom-flex">
                <span class="cropper-btn" id="cancle">取消</span>
                <span class="cropper-btn" id="confirm">选取</span>
            </div>
            
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/cropper.min.js" type="text/javascript"></script>       
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
            <!-- JIMChat -->
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.min.js"></script>
        <script src="<?= base_url() ?>public/js/chatJIM/util.js"></script>
        <script src="<?= base_url() ?>public/js/chatJIM/jmessage-sdk-web.2.6.0.min.js"></script>
        <script src="<?= base_url() ?>public/js/chatJIM/services/api.service.js"></script>
        <script src="<?= base_url() ?>public/js/chatJIM/main-canActive.js"></script>    
        <script src="<?= base_url() ?>public/js/chatJIM/self-info.js"></script>

    </body>

</html>