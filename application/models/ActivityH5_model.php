<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ActivityH5_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function h5Activity($param) {
        $param = "p=" . $param;        
        $res = $this->Post(config_item('supvp_url') . "Activity/h5Activity", $param);
        return $res;
    }
    
    public function h5Banner($param) {
        $param = "p=" . $param;        
        $res = $this->Post(config_item('supvp_url') . "banner/h5Banner", $param);
        return $res;
    }
    

}
