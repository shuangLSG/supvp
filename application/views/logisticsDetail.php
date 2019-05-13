<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/mui.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/page/logisticsDetail.css">
    </head>

    <body>
        <?php if(empty($queryKd->info)) {?>
        <div class="custom-empty mui-text-center">
            <img src="<?= base_url() ?>public/images/home/empty2.png" alt="">
            <p>暂无物流信息</p>
        </div>
        <?php }?>
        
        <div id="scroll1" class="mui-scroll-wrapper mui-content custom-bg-color-gray">
            <div class="mui-scroll page-bg">
                <ul id="order_status_info" class="mui-table-view">
                    <li class="mui-table-view-cell mui-media address-info" data-capital="上海市" data-city="浦东新区" data-address="川沙">
                        <a href="javascript:;">
                            <img class="mui-media-object mui-pull-left" src="<?= base_url() ?>public/images/icons/order_6.png">
                            <div class="mui-media-body custom-black-4">
                                <p class="text-size-14">物流公司：<span id="logistics_id"><?= $queryKd->name?></span></p>
                                <p class="mui-ellipsis text-size-14 custom-light-gray">物流单号：<span id="logistics_num"><?= $queryKd->logistics?></span></p>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="custom-timeline-wrapper">
                    <h3 class="text-size-15">订单跟踪</h3>
                    <ul>
                        <img src="<?= base_url() ?>public/images/icons/logic.png">
                        
                        <?php
                        $i = 0;
                        foreach ($queryKd->info as $item) {
                            ?>
                            <li <?= $i == 0 ? 'class="custom-current"' : "" ?>>                                   
                                <div class="custom-timeline-content">
                                    <div class="custom-timeline-info">                                           
                                        <p class="text-size-13"><?= $item->context ?></p>
                                        <p class="text-size-12"><?= $item->time ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php
                            $i++;
                        }
                        ?> 
                    </ul>
                </div>
            </div>
        </div>
        
        <script src="<?= base_url() ?>public/js/rem.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/app.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>public/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>public/js/mui.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="<?= base_url() ?>public/js/page/logisticsDetail.js" type="text/javascript" charset="utf-8"></script>
    </body>

</html>