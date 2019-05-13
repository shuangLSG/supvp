<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
    <head>
        <title>支付</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
        <script type="text/javascript" src="<?= base_url() ?>public/js/wyb/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/js/qrcode.js"></script>
        <style>
            span{
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div id="qrcode" style="width:200px; height:200px; padding: 18%"></div>
        <div>
            <span>请保存二维码至手机相册，并使用支付宝"扫一扫"功能，扫描二维码即可充值。</span>
        </div>
        <script type="text/javascript">
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                width: 200,
                height: 200
            });
            qrcode.makeCode('<?= $url ?>');
        </script>
    </body>