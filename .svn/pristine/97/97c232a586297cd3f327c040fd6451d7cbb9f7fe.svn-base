<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require APPPATH . 'third_party/WxShare.Api.php';

class WxShare {

    const APPID = "wx4045a2c7b31aff65";
    const APPSECRET = "a145fc3b0a57ac6224eadc56f768025c";

    public static function GetSignPackage() {
        $jssdk = new WxShareApi(WxShare::APPID, WxShare::APPSECRET);
        $signPackage = $jssdk->GetSignPackage();
        return $signPackage;
    }

  

}
