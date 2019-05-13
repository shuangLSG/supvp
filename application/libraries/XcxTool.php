<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require APPPATH . 'third_party/XcxJieMi/wxBizDataCrypt.php';

class XcxTool {

    const APPID = "wx677d45099ed3d880";
    const APPSECRET = "a145fc3b0a57ac6224eadc56f768025c";

    public static function JieMi($encryptedData,$iv,$sessionKey) {    
        $pc = new WXBizDataCrypt(XcxTool::APPID, $sessionKey);
        $errCode = $pc->decryptData($encryptedData, $iv, $data);
        if ($errCode == 0) {
            return $data;
        } else {
            return $errCode;
        }
    }
}
