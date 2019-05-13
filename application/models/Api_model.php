<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Api_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function banner($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Banner/AppQuery", $param);
        return $res;
    }
    public function classify($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Selection/AppQuery", $param);
        return $res;
    }
    public function activity($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Activity/AppQuery", $param);
        return $res;
    }
    public function commodity($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppList", $param);
        return $res;
    }
    
    public function queryCoupon($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Coupon/AppQuery", $param);
        return $res;
    }
   
    public function getCoupons($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Coupon/GetCoupon", $param);
        return $res;
    }
    
    // 商品详情获取优惠券
    public function getCommodityCoupons($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Coupon/CommodityQuery", $param);        
        return $res;
    }
    



    
    public function searchGoods($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppSearch", $param);
        return $res;
    }

    public function getGoodsType($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppCommType", $param);
        return $res;
    }

    public function queryGoodsTypeCount($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppCommTypeCount", $param);
        return $res;
    }

    public function getRecommend($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppRecommend", $param);
        return $res;
    }

    public function buyGold($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppBuyGoldCard", $param);
        return $res;
    }

    /*public function selectionquery($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Selection/AppQuery", $param);
        return $res;
    }

    public function commodityquery($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppAQuery", $param);
        return $res;
    }

    public function commoditypagequery($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppAPageQuery", $param);
        return $res;
    }

    public function getBrand($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Brand/AppQuery", $param);
        return $res;
    }

    public function getBrandById($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppBQuery", $param);
        return $res;
    }*/

    public function getBrandScreen($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "BrandTag/AppQuery", $param);
        return $res;
    }

    public function getGoodsById($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppQueryByID", $param);
        return $res;
    }

    public function AppCommType($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Commodity/AppCommType", $param);
        return $res;
    }

    public function kftype($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "KfType/AppQuery", $param);
        return $res;
    }

    public function kfquestion($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "KfQuestion/AppQueryByID", $param);
        return $res;
    }
    
}
