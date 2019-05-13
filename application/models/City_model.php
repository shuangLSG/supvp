<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class City_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function city($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Area/query", $param);
        return $res;
    }

    public function getCityById($param){
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Area/queryById", $param);
        return $res;
    }

    public function capitalById($param){
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Area/capitalById", $param);
        return $res;
    }

    public function cityById($param){
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Area/cityById", $param);
        return $res;
    }

    public function getCity($param){
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Init/GetCity", $param);
        return $res;
    }


}
