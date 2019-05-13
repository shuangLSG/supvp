<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    private $des;

    public function __construct() {
        parent::__construct();
        $this->des = new Des();
    }

    public function decode($str, $key = "") {
        return $this->des->decode($str, $key);
    }

    public function de($str, $key = "") {
        return $this->des->de($str, $key);
    }

    public function encode($str, $key = "") {
        $str->os = config_item("channel");
        $str->token = config_item("token");
        return $this->des->encode($str, $key);
    }

    public function en($str, $key = "") {
        return $this->des->en($str, $key);
    }

    public function right($parameter) {
        $arr = array(
            "s" => 200,
            "d" => "OK"
        );
        print_r($this->des->encode($arr));
    }

    public function error($parameter) {
        $parameter = explode("_", $parameter);
        $arr = array(
            "s" => $parameter[0],
            "d" => $parameter[1]
        );
        echo json_encode($arr);
        exit();
    }

    public function checkmobile($mobile) {
        if (preg_match("/^1[34578]{1}\d{9}$/", $mobile)) {
            return true;
        } else {
            return false;
        }
    }

    function Code($len) {
        $code = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
        $str = "";
        for ($i = 0; $i < $len; $i++) {
            $c = rand(0, count($code) - 1);
            $str = $str . $code[$c];
        }
        return $str;
    }

    function Post($url, $param, $timeout = 5) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($param != '') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return $file_contents;
    }

}
