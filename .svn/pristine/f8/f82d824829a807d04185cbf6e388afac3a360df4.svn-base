<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Order_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getamortize($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppGetamortize", $param);
        return $res;
    }
    
    public function getAllOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppAllOrder", $param);
        return $res;
    }
    public function getOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppPayment", $param);
        return $res;
    }

    public function cancelOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppCancelOrder", $param);
        return $res;
    }

    public function orderDetail($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppOrderDetails", $param);
        return $res;
    }

    public function shipments($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppShipments", $param);
        return $res;
    }

    

    public function waitGoods($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppTakeDelivery", $param);
        return $res;
    }

    public function Completed($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppCustomerService", $param);
        return $res;
    }

    public function historyOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppHistory", $param);
        return $res;
    }

    public function writeOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppFillInOrder", $param);
        return $res;
    }

    public function confirmOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppConfirmOrder", $param);
        return $res;
    }

    public function returnOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppReturnOrder", $param);
        return $res;
    }

    public function queryKd($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppQueryLogistics", $param);
        return $res;
    }

    public function addorder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/WebAddOrder", $param);
        return $res;
    }

    public function WxPay($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/H5WXAddOrder", $param);
        return $res;
    }

    public function xcxwaitOrderPay($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/XcxWXPayOrder", $param);
        return $res;
    }

    public function getOrderCoupon($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Coupon/OrderQuery", $param);
        return $res;
    }

    /* 生成订单*/

    // 分期支付
    public function addOrderPay($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/InstalmentAddOrder", $param);
        return $res;
    }
    // 对应支付宝
    public function webAddOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/WebAddOrder", $param);
        return $res;
    }

    // 支付订单
    public function addPayOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/AppInstalmentPayOrder", $param);
        return $res;
    }
    public function WXPayOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/H5WXPayOrder", $param);
        return $res;
    }
    
    public function H5ZFBPayOrder($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "MyOrder/H5ZFBPayOrder", $param);
        return $res;
    }

    // 还款 支付

    public function WXPayLimit($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "InstalmentItem/WebWXPayOrder", $param);
        return $res;
    }
    public function ZFBPayLimit($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "InstalmentItem/WebZFBPayOrder", $param);
        return $res;
    }
    
}
