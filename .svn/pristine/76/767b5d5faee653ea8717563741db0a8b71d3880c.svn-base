<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Des {

    public function __construct() {
        //parent::__construct();
        $this->ci = &get_instance();
        $this->ci->load->library('encrypt');
        $this->ci->encrypt->set_cipher(MCRYPT_TRIPLEDES);
        $this->ci->encrypt->set_mode(MCRYPT_MODE_CBC);
    }

    /*
     * 解密
     */

    public function decode($str, $key = "") {
        $str = str_replace("@@", "/", $str);
        $str = str_replace("$$", "+", $str);
        $str = $this->ci->encrypt->decode($str, $key);
        $dec_str = json_decode($str);
        if (empty($dec_str)) {
            return $str;
        } else {
            return $dec_str;
        }
    }

    public function de($str, $key = "") {
        $str = str_replace("@@", "/", $str);
        $str = str_replace("$$", "+", $str);
        $str = $this->ci->encrypt->decode($str, $key);
        return $str;
    }

    /*
     * 加密
     */

    public function encode($str, $key = "") {
        $str = json_encode($str);
        $str = $this->ci->encrypt->encode($str, $key);
        $str = str_replace("/", "@@", $str);
        $str = str_replace("+", "$$", $str);
        return $str;
    }

    public function en($str, $key = "") {
        $str = $this->ci->encrypt->encode($str, $key);
        $str = str_replace("/", "@@", $str);
        $str = str_replace("+", "$$", $str);
        return $str;
    }

}
