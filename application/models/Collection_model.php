<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Collection_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCollection($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Collection/WebQuery", $param);
        return $res;
    }

    public function addCollection($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Collection/AppAdd", $param);
        return $res;
    }

    public function deleteCollection($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Collection/AppDelete", $param);
        return $res;
    }

    public function deleteCollectionall($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Collection/AppDeleteAll", $param);
        return $res;
    }

    public function isCollection($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Collection/AppQueryByID", $param);
        return $res;
    }

}
