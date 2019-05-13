<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Test extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function t1() {
        $data = array("Title" => "微信公众平台开发实践", "Description" => "本书共分10章，案例程序采用广泛流行的PHP、MySQL、XML、CSS、JavaScript、HTML5等程序语言及数据库实现。", "PicUrl" => 'https://images0.cnblogs.com/i/340216/201404/301756448922305.jpg', "Url" => 'http://www.cnblogs.com/txw1958/p/weixin-development-best-practice.html');
        $this->load->library('WxShare');
        $SignPackage = WxShare::GetSignPackage();
        $data["signPackage"] = $SignPackage;
        $this->load->view("Test/t1", $data);
    }

}
