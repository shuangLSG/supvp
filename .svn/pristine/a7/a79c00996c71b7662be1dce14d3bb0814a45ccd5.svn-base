<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/AppLogin", $param);
        return $res;
    }

    public function xcxLogin($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/XcxLogin", $param);
        return $res;
    }

    public function loginSend($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/LoginSend", $param);
        return $res;
    }
    public function codeLogin($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/CodeLogin", $param);
        return $res;
    }
    public function AppSetPassword($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "UserInfo/AppSetPassword", $param);
        return $res;
    }
    // 拉新注册
    public function webRegister($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/WebRegister", $param);
        return $res;
    }
    
}
