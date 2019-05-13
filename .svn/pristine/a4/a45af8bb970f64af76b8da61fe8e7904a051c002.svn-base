<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Address_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAddress($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Address/AppQuery", $param);
        return $res;
    }

    public function addAddress($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Address/AppAdd", $param);
        return $res;
    }

    public function editAddress($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Address/AppUpdate", $param);
        return $res;
    }

    public function delAddress($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Address/AppDel", $param);
        return $res;
    }

}
