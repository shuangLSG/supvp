<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Upload_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function upload($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Upload/upload", $param);
        return $res;
    }
    public function uploadList($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Upload/uploadList", $param);
        return $res;
    }
}
