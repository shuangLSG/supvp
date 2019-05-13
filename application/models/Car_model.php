<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Car_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCar($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ShoppingCart/AppQuery", $param);
        return $res;
    }

    public function editCar($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ShoppingCart/AppUpdate", $param);
        return $res;
    }

    public function addCar($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ShoppingCart/AppAdd", $param);
        return $res;
    }

    public function delCar($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ShoppingCart/AppDel", $param);
        return $res;
    }

    public function delCars($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ShoppingCart/AppDels", $param);
        return $res;
    }

    public function getCarNum($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ShoppingCart/AppQueryCount", $param);
        return $res;
    }

}
