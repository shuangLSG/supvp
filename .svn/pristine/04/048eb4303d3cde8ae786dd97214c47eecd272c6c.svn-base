<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>账号设置</title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/cropper.min.css" />

        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/app.css" />
        <style>
            .logout-btn {
                width: 100%;
                border-radius: 0;
            }

            .module-name {
                font-size: 0.32rem;
                padding: 0.18rem 0.4rem;
                margin:0;
            }

            .custom-list-wrapper .mui-navigate-right.custom-flex {
                display: flex !important;
                justify-content: flex-start;
            }

            .custom-list-wrapper .mui-navigate-right {
                color: #222 !important;
            }

            #head-icon .mui-navigate-right{
                padding-top: 0.22rem;
                padding-bottom: 0.22rem;                
                line-height: 1rem;
            }
            input[name="sendpic"] {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 75%;
                opacity: 0;
            }
            .mui-table-view-cell img {
                width: 0.9rem;
                height: auto;
                border-radius: 50%;
                vertical-align: top;
            }
            .mui-btn{
                border:none;
                border-radius:0;
                font-weight:bold;
            }
            
            .mui-pull-right{
                margin-right: 0.64rem;
                font-size: 0.346rem;
                color: #A6A6A6;
            }
            .custom-orange{
                color:#FFAA00 !important;
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
                padding: 0.4rem;
                font-size: 0.4rem;
                color: #fff;
            }
            .cropper-wrapper .cropper-action {
                height: 7%;
                z-index: 22;
                background-color: #000;
                justify-content: space-between;
            }
            .cropper-box {
                height: 93%;
                width: 100%;
            }
        </style>
    </head>
    <body class="custom-bg-color-gray">
        <div class="mui-scroll-wrapper mui-content custom-bg-color-gray">
            <div class="mui-scroll setting-wrapper">
                <div class="custom-list-wrapper">
                    <ul class="mui-table-view">
                        <li id="head-icon" class="mui-table-view-cell">
                            <a class="mui-navigate-right">
                                <label for="uploadfile">
                                    <span>修改头像</span>
                                    <div class="mui-pull-right">
                                        <img src="" alt=""/>
                                    </div>
                                </label>
                                <input type="file" name="sendpic" id="uploadfile" multiple="multiple">
                            </a>
                        </li>
                        <li id="username" class="mui-table-view-cell">
                            <a class="mui-navigate-right">
                                <span>修改昵称</span>
                                <span class="mui-pull-right custom-light-gray"></span>
                            </a>
                        </li>
                    </ul>
                </div>
              
                <div class="custom-list-wrapper custom-margin-top-20">
                    <ul class="mui-table-view">
                        <li class="mui-table-view-cell" id="mobile">
                            <a class="">手机号
                                <span class="mui-pull-right"></span>
                            </a>
                        </li>
                        <li id="resetPSW" class="mui-table-view-cell">
                            <a class="mui-navigate-right">修改密码</a>
                        </li>
                    </ul>
                </div>
                <button type="button" id="loginout" class="mui-btn mui-btn-block custom-margin-top-20 text-size-16">安全退出</button>
                <!-- <a class="custom-margin-top-20 logout-btn custom-block-btn loginout" href="javascript:;">安全退出</a> -->
            </div>
        </div>

        <div class="cropper-wrapper">
            <div class="cropper-box">
                <img src="" id="photo">
            </div>
            <div class="cropper-action custom-flex">
                <span class="cropper-btn" id="cancle">取消</span>
                <span class="cropper-btn" id="cropper">选取</span>
            </div>
        </div>

        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/cropper.min.js" type="text/javascript"></script>       
        <script src="<?= base_url() ?>public/js/page/setting.js" type="text/javascript"></script>

    </body>

</html>