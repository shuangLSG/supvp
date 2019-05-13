<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Browse_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getBrowse($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Browse/WebQuery", $param);
        return $res;
    }

    public function addBrowse($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Browse/AppAdd", $param);
        return $res;
    }

    public function deleteBrowse($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Browse/AppDelete", $param);
        return $res;
    }

    public function deleteBrowseAll($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Browse/AppDeleteAll", $param);
        return $res;
    }

}
