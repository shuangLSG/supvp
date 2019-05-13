<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>在线客服</title>
    <link rel="stylesheet" href="<?= base_url() ?>public/css/mui.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/JIMChat.css">
    <link rel="stylesheet" href="<?= base_url() ?>public/css/app.css">

    <style>
        body {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            -webkit-overflow-scrolling: touch;/* 解决ios滑动不流畅问题 */
        }
        .mui-bar-nav~.mui-content {
            padding-top: 1.6rem !important;
        }
    </style>
</head>

<body>
    <header id="header" class="mui-bar custom-bg-color-white custom-page-nav mui-hidden"></header>

    <div id="pullrefresh" class="mui-scroll-wrapper mui-content bg-gray">
        <div class="mui-scroll message">
            <div class="mui-loading custom-flex">
                <div class="mui-spinner">
                </div>
            </div>
        </div>
    </div>

    <footer class="mui-bar mui-bar-tab">
        <div class="action">
            <textarea id="textarea" class="margin-l-26"></textarea>
            <img id="menu-btn" class="margin-h-26 mui-icon" src="<?= base_url() ?>public/images/Icon/add_icon.png" alt="">
            <!-- <span id="menu-btn" class="mui-icon mui-icon-plus margin-h-26"></span> -->
            <button id="test-send" type="button" class="mui-btn mui-btn-primary">发送</button>
        </div>
        <div id="room-container">
            <!--class="menu-showed" -->

            <div id="menu-wrapper" class="menu-wrapper hidden">
                <div id="menu" class="menu">
                    <div class="room-panel-message-input">
                        <div class="room-panel-send-file">
                            <div class="room-panel-item">
                                <label title="图片" for="sendPic2" class="room-panel-singlePic-label">
                                    <input type="file" name="file" accept="image/*" id="sendPic2" class="room-panel-singlePic">
                                    <img src="<?= base_url() ?>public/images/Icon/photo@2x.png" alt="">
                                    <p>图片</p>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="menu-backdrop" class="menu-backdrop"></div>
    <div id="mask" class="mask-box"></div>

    <!-- 商品详情 -->
    <script id="goods_detail" type="text/html">
        <div class="custom-list-box custom-flex">
            <img class="custom-list-pic" src="{{d.img_750_1050+zip}}100" alt="">
            <div class="custom-brand-info">
                <h4 class="custom-white-space">{{d.name}}</h4>
                <p class="custom-brand-price">
                    <span class="custom-pink">￥</span><span data-price="1100" class="market custom-pink">{{d.activity_price}}</span>
                </p>
            </div>
        </div>
    </script>
    <!-- 时间 -->
    <script id="room-panel-time" type="text/html">
        <p class="time">  
            {{if time_show==='year'}}
            <span>{{ ctime_ms |dateFormat 'yyyy年MM月dd日 hh:mm'}}</span>
            {{else if time_show==='month'}}
            <span>{{ ctime_ms |dateFormat 'MM月dd日 hh:mm'}}</span>
            {{else if time_show==='day'}}
            <span>{{ ctime_ms |dateFormat 'dd日 hh:mm'}}</span>
            {{else if time_show==='the day before'}}
            <span>前天 {{ ctime_ms |dateFormat 'hh:mm'}}</span>
            {{else if time_show==='yesterday'}}
            <span>昨天 {{ ctime_ms |dateFormat 'hh:mm'}}</span>
            {{else if time_show==='today'}}
            <span>{{ ctime_ms |dateFormat 'hh:mm'}}</span>
            {{/if}}
        </p>
    </script>
    <script id="test" type="text/html">
        {{each msgs i index}}
                {{if i.content && global.username != i.content.from_id && i.msg_type !== 5}}
                    <li>
                        {{if i.content.msg_type === 'text' && (!i.content.msg_body.extras || !i.content.msg_body.extras.businessCard)}}
                            {{include 'room-panel-time' i}}
                            <div>
                                <div class="avatar-box">
                                    <img class="avatar" src="{{i.content.avatarUrl?i.content.avatarUrl:'<?= base_url() ?>public/images/logo.png'}}" />
                                </div>   
                                <div class="text"><p>{{i.content.msg_body.text}}</p></div>
                            </div>
                        {{else if i.content.msg_type === 'image'}}
                            {{include 'room-panel-time' i}}
                            <div>
                                <div class="avatar-box">
                                    <img class="avatar" src="{{i.content.avatarUrl ? i.content.avatarUrl : '<?= base_url() ?>public/images/logo.png'}}" />
                                </div> 
                                <div class="image {{!i.content.msg_body.loading?'img-loading':''}}"
                                style="width:{{i.content.msg_body.width > 219 || i.content.msg_body.height > 300?
                                (i.content.msg_body.width/i.content.msg_body.height > 219/300 ? 3 + 'rem' :i.content.msg_body.width/i.content.msg_body.height*3 + 'rem')
                                :i.content.msg_body.width/37.5/2+'rem'}};
                                height:{{i.content.msg_body.width > 219 || i.content.msg_body.height > 300 ? 
                                    (i.content.msg_body.width/i.content.msg_body.height < 219/300 ?3+'rem' : i.content.msg_body.height/i.content.msg_body.width * 219/37.5/2 + 'rem') 
                                    : i.content.msg_body.height/37.5/2+'rem'}}">
                                    <img  title="点击查看大图" data-msg_id="{{i.msg_id}}" class="chat-panel-message-img" src="{{i.content.msg_body.media_url}}" data-preview-src="" alt="">
                                </div>
                            </div>
                        {{/if}}
                    </li>
                {{else}}
                    <li>
                        {{if i.content.msg_type === 'text' && (!i.content.msg_body.extras || !i.content.msg_body.extras.businessCard)}}
                            {{include 'room-panel-time' i}}
                            <div class="self">
                                <div class="avatar-box">
                                    <img class="avatar" src="{{i.content.avatarUrl?i.content.avatarUrl:'<?= base_url() ?>public/images/logo.png'}}" />
                                </div> 
                                <div class="text"><p>{{i.content.msg_body.text}}</p></div>
                            </div>
                        {{else if i.content.msg_type === 'image' }}
                            {{include 'room-panel-time' i}}
                            <div class="self">
                                <div class="avatar-box">
                                    <img class="avatar" src="{{i.content.avatarUrl ? i.content.avatarUrl : '<?= base_url() ?>public/images/logo.png'}}" />
                                </div> 
                                <div class="image {{!i.content.msg_body.loading?'img-loading':''}}"
                                style="width:{{i.content.msg_body.width > 219 || i.content.msg_body.height > 300?
                                (i.content.msg_body.width/i.content.msg_body.height > 219/300 ? 3 + 'rem' :i.content.msg_body.width/i.content.msg_body.height*3 + 'rem')
                                :i.content.msg_body.width/37.5/2+'rem'}};
                                height:{{i.content.msg_body.width > 219 || i.content.msg_body.height > 300 ? 
                                    (i.content.msg_body.width/i.content.msg_body.height < 219/300 ?3+'rem' : i.content.msg_body.height/i.content.msg_body.width * 219/37.5/2 + 'rem') 
                                    : i.content.msg_body.height/37.5/2+'rem'}}">
                                    <img title="点击查看大图" data-msg_id="{{i.msg_id}}" class="chat-panel-message-img" src="{{i.content.msg_body.media_url}}" data-preview-src=""  alt="">
                                </div>
                            </div>
                        {{/if}}
                    </li>
                {{/if}}
            {{/each}}
    </script>

    <!-- 别人发送的消息 -->
    <script id="recivemsg" type="text/html">
        <li>
            {{if content.msg_type === 'text' && (!content.msg_body.extras || !content.msg_body.extras.businessCard)}}
                {{include 'room-panel-time' i}}
                <div >
                    <div class="avatar-box">
                        <img class="avatar" src="{{content.avatarUrl ? content.avatarUrl : '<?= base_url() ?>public/images/logo.png'}}" />
                    </div> 
                    <div class="text"><p>{{content.msg_body.text}}</p></div>
                </div> 
            {{else if content.msg_type === 'image' || (content.msg_body.extras && !content.msg_body.extras.kLargeEmoticon)}}
                {{include 'room-panel-time' i}}
                <div>
                    <div class="avatar-box">
                        <img class="avatar" src="{{content.avatarUrl ? content.avatarUrl : '<?= base_url() ?>public/images/logo.png'}}" />
                    </div> 
                    <div class="image {{!content.msg_body.loading?'img-loading':''}}"
                    style="width:{{content.msg_body.width > 219 || content.msg_body.height > 300?
                    (content.msg_body.width/content.msg_body.height > 219/300 ? 3 + 'rem' :content.msg_body.width/content.msg_body.height * 300 + 'px')
                    :content.msg_body.width/37.5/2+'rem'}};
                    height:{{content.msg_body.width > 219 || content.msg_body.height > 300 ? 
                    (content.msg_body.width/content.msg_body.height < 219/300 ? 300 + 'px' : content.msg_body.height/content.msg_body.width * 219 + 'px') 
                    : content.msg_body.height/37.5/2+'rem'}}">
                        <img (load)="imgLoaded(i)" title="点击查看大图" (click)="imageViewerShow(i)" class="chat-panel-message-img" src="{{content.msg_body.media_url}}" alt="">
                    </div>
                </div>   
            {{/if}}
        </li>
    </script>

    
    <!-- 自己发送的消息 -->
    <script id="send_singlemsg_text" type="text/html">
        <li>
            {{if (content.msg_type &&content.msg_type === 'text') && (!content.msg_body.extras || !content.msg_body.extras.businessCard)}}
                {{include 'room-panel-time' i}}
                <div class="self">
                    <div class="avatar-box">
                        <img class="avatar" src="{{avatarUrl ? avatarUrl : '<?= base_url() ?>public/images/logo.png'}}" />
                    </div> 
                    <div class="text"><p>{{content.msg_body.text}}</p></div>
                </div>  
            {{/if}}
        </li>
    </script>
    <script id="send_singlemsg_img" type="text/html">
        <li>
            {{if !content.msg_body.extras || (content.msg_body.extras && !content.msg_body.extras.kLargeEmoticon)}}
                {{include 'room-panel-time' i}}
                <div class="self">
                    <div class="avatar-box">
                        <img class="avatar" src="{{avatarUrl ? avatarUrl : '<?= base_url() ?>public/images/logo.png'}}" />
                    </div> 
                    <div class="image {{!content.msg_body.loading?'img-loading':''}}"
                        style="width:{{content.msg_body.width > 219 || content.msg_body.height > 300?
                        (content.msg_body.width/content.msg_body.height > 219/300 ? 3 + 'rem' :content.msg_body.width/content.msg_body.height*3 + 'rem')
                        :content.msg_body.width/37.5/2+'rem'}};
                        height:{{content.msg_body.width > 219 || content.msg_body.height > 300 ? 
                            (content.msg_body.width/content.msg_body.height < 219/300 ?3+'rem' : content.msg_body.height/content.msg_body.width * 219/37.5/2 + 'rem') 
                            : content.msg_body.height/37.5/2+'rem'}}">
                        <img  title="点击查看大图" data-msg_id="{{msg_id}}" class="chat-panel-message-img" src="{{content.msg_body.media_url}}" data-preview-src="" alt="">
                    </div>
                </div>
            {{/if}}
        </li>
    </script>

    <div class="empty">
        <img src="<?= base_url() ?>public/images/Icon/empty@2x.png">
    </div>
    <!-- <div id="__MUI_PREVIEWIMAGE" class="mui-slider mui-preview-image mui-fullscreen mui-preview-in" data-slider="3" style="display: block;">
</div>  -->
    <script id="previewImg" type="text/html">
            <div class="mui-slider-group" style="transform: translate3d(0px, 0px, 0px) translateZ(0px);">
                <div class="mui-slider-item mui-zoom-wrapper mui-active" data-zoomer="4">
                    {{each imageViewer i index}}
                    <div class="mui-zoom-scroller">
                        <img src="{{i.img}}" data-preview-lazyload="" style="" class="mui-zoom"></div>
                    </div>
                    {{/if}}
                </div>
            </div>
        <div>
    </script>
    <script src="<?= base_url() ?>public/js/app.js"></script>
    
    <script src="<?= base_url() ?>public/js/rem.js"></script>
    <script src="<?= base_url() ?>public/js/template.js"></script>
    <script src="<?= base_url() ?>public/js/mui.min.js"></script>
    <script src="<?= base_url() ?>public/js/mui.zoom.js"></script>
    <script src="<?= base_url() ?>public/js/mui.previewimage.js"></script>
    <script src="<?= base_url() ?>public/js/mui.pullToRefresh.js"></script>
    <script src="<?= base_url() ?>public/js/mui.pullToRefresh.material.js"></script>
    <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/js/chatJIM/md5.js?t=0.01"></script>    
    <script src="<?= base_url() ?>public/js/chatJIM/jmessage-sdk-web.2.6.0.min.js?t=0.01"></script>
    <script src="<?= base_url() ?>public/js/chatJIM/services/api.service.js?t=0.01"></script>
    <script src="<?= base_url() ?>public/js/chatJIM/util.js?t=0.01"></script>
    <script src="<?= base_url() ?>public/js/chatJIM/filter.js?t=0.01"></script>
    <script src="<?= base_url() ?>public/js/chatJIM/chat-reducer.js?t=0.01"></script>
    <script src="<?= base_url() ?>public/js/chatJIM/chat-previewimage.js?t=0.03"></script>
    <script src="<?= base_url() ?>public/js/chatJIM/JIMChat.js?t=0.03"></script>
    <script>
        getGoodsDetail();
        function getGoodsDetail(){
            var id=GetQueryString('id');
            if(id){
                $.post('../api/getGoodsById', {'id': id}, function (data) {
                    if (data.s == 200) {
                        $('#header').removeClass('mui-hidden').addClass('mui-bar-nav').append(template('goods_detail',{d: data.detail.item[0],zip:zip}))
                    }
                }, 'json');
            }
        }
        
        
        
         //遮罩禁止滑动
         var handler = function (event) {
            event.preventDefault();
            event.stopPropagation();
        };
        // 底部操作菜单
        var menuWrapper = document.getElementById("menu-wrapper");
        var menu = document.getElementById("menu");
        var menuWrapperClassList = menuWrapper.classList;
        var backdrop = document.getElementById("menu-backdrop");

        backdrop.addEventListener('touchstart', toggleMenu);
        
        mui('.action').on('tap', '#menu-btn', function () {
            toggleMenu();
            hideSoftKeyboard();
            document.querySelector('#menu-wrapper').addEventListener("touchmove", handler, false);//禁止页面滑动
        });
        //下沉菜单中的点击事件
        mui('#menu').on('tap', 'a', function () {
            toggleMenu();
        });
        mui('.action').on('tap', 'textarea', function () {
            if (menuWrapperClassList.contains('mui-active')) {
                toggleMenuHide();
            }
            scrollBottom();
        });

        // 文字输入框
        $('#textarea').focus(function () {
            $('#mask').show();
        });
        // clickMask
        document.querySelector('#mask').addEventListener('touchstart', hideSoftKeyboard);
        function hideSoftKeyboard() {
            $('#textarea').blur();
            $('#mask').hide();
        }

        var busying = false;

        function toggleMenu() {
            if (busying) {
                return;
            }
            busying = true;
            if (menuWrapperClassList.contains('mui-active')) {
                toggleMenuHide();
            } else {
                toggleMenuShow();
            }
            setTimeout(function () {
                busying = false;
            }, 500);
        }

        function toggleMenuHide() {
            document.body.classList.remove('menu-open');
            menuWrapper.className = 'menu-wrapper fade-out-down animated';
            menu.className = 'menu bounce-out-down animated';
            setTimeout(function () {
                backdrop.style.opacity = 0;
                menuWrapper.classList.add('hidden');
                $('#room-container').removeClass('menu-showed');
                // 布局
                $('#pullrefresh').css('bottom', 0);
                mui('.mui-scroll-wrapper').scroll().reLayout();
                mui('.mui-scroll-wrapper').scroll().scrollToBottom(10);
            }, 100);
        }

        function toggleMenuShow() {
            document.body.classList.add('menu-open');
            menuWrapper.className = 'menu-wrapper fade-in-up animated mui-active';
            menu.className = 'menu bounce-in-up animated';
            backdrop.style.opacity = 1;
            $('#room-container').addClass('menu-showed');
            // 布局
            $('#pullrefresh').css('bottom', 7.23 + 'rem');
            mui('.mui-scroll-wrapper').scroll().reLayout();
            mui('.mui-scroll-wrapper').scroll().scrollToBottom(10);
        }
        function scrollBottom() {
            mui('#pullrefresh').pullRefresh().refresh(true);
            mui('.mui-scroll-wrapper').scroll().reLayout();
            mui('#pullrefresh').scroll().scrollToBottom(10);
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
    </script>
</body>

</html>