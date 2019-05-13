<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>学历认证</title>
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
                    <h2 class="text-size-25 font-black">学历认证</h2>
                    <div class="limit-content">
                        <span class="font-SFU text-size-30 font-deep-purple">7,000</span>
                        <p class="font-purple tetx-size-12">最高可提升额度(元)</p>
                    </div>
                </section>



                <section class="limit-bd margin-h-10">
                    <form class="mui-input-group">
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">最高学历</label>
                            <input id="educational" type="text" placeholder="请输入最高学历">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">毕业学校</label>
                            <input id="school" type="text" placeholder="请输入毕业学校">
                        </div>
                        <div class="mui-input-row text-size-15">
                            <label class="font-black">毕业年份</label>
                            <input id="year" type="text" placeholder="请输入毕业年份如2019">
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

                    // 登录按钮的禁用状态
                    $('input').on('input propertychange', function () {
                        var educational = $('#educational').val(),
                                school = $('#school').val(),
                                year = $('#year').val()
                        if (educational !== "" && school !== "" && year !== "") {
                            $('button').removeClass('mui-btn-disabled').addClass('custom-btn-gradient');
                        } else {
                            $('button').addClass('mui-btn-disabled').removeClass('custom-btn-gradient');
                        }
                    });


                    mui('.mui-scroll-wrapper').scroll({
                        deceleration: 0.0005
                    });

                    mui('form').on('tap', '#link-areaSelect', function () {
                        tools.route('../supvp/areaSelection');
                    });


                    // 提交认证
                    document.querySelector('#submit').addEventListener('tap', function () {
                        if ($(this).hasClass('mui-btn-disabled')) {
                            mui.toast('请完善信息');
                            return;
                        }

                        addProfession();
                    });

                    // ========================================== 工具方法 =======================================

                    function addProfession() {
                        var educational = $('#educational').val();
                        var school = $('#school').val();
                        var year = $('#year').val();
                        var json = {
                            'educational': educational,
                            'school': school,
                            'year': year,
                        }


                        $.post('../user/addEducation', json, function (res) {
                            if (res.s == 200) {
                                tools.route('../supvp/auditing');
                            }else{
                                mui.toast(res.d);
                            }
                        }, 'json');
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