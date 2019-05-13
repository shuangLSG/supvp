<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User_model extends MY_Model {

    public function __construct() {
        parent::__construct();
    }

    public function sendcode($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/AppSend", $param);
        return $res;
    }

    public function register($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/AppRegister", $param);
        return $res;
    }

    public function sendforget($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/AppForgotSend", $param);
        return $res;
    }

    public function updateuser($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "UserInfo/AppUpdateUser", $param);
        return $res;
    }

    public function getuserinfo($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "UserInfo/AppQueryByID", $param);
        return $res;
    }

    public function getmyrecord($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "UserInfo/AppMyRecord", $param);
        return $res;
    }

    public function doforget($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Registered/AppForgotPassword", $param);
        return $res;
    }

    public function addIdentityCard($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "IdentityCard/AppAdd", $param);
        return $res;
    }

    public function IDContract($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Contract/Create", $param);
        return $res;
    }

    public function IdentityCardById($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "IdentityCard/AppQueryByID", $param);
        return $res;
    }

    public function Feedback($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Feedback/addfeedback", $param);
        return $res;
    }

    public function zhimaInit($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ZMscore/zhimaInit", $param);
        return $res;
    }

    public function zhimaQuery($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ZMscore/zhimaQuery", $param);
        return $res;
    }

    public function limit($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "UserInfo/AppQueryLimit", $param);
        return $res;
    }

    // 全部待还
    public function instalmentList($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "InstalmentList/Query", $param);
        return $res;
    }

    // 还款记录
    public function instalmentItem($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "InstalmentItem/Query", $param);
        return $res;
    }
    

    // 本周待还
    public function instalmentListByWeek($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "InstalmentItem/QueryByWeek", $param);
        return $res;
    }
    // 订单详情
    public function instalmentListByListNo($param)
    {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "InstalmentItem/QueryByListNo", $param);
        return $res;
    }
  

    // 职业认证
    public function addProfession($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Profession/AppAdd", $param);
        return $res;
    }
    public function queryProfession($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Profession/AppQuery", $param);
        return $res;
    }

    // 信用卡认证
    public function addCreditCard($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "CreditCard/AppAdd", $param);
        return $res;
    }
    public function queryCreditCard($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "CreditCard/AppQuery", $param);
        return $res;
    }
    

    // 教育认证
    public function addEducation($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Education/AppAdd", $param);
        return $res;
    }
    public function queryEducation($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Education/AppQuery", $param);
        return $res;
    }
    

    // 淘宝认证
    public function addTaobao($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Taobao/AppAdd", $param);
        return $res;
    }
    public function queryTaobao($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Taobao/AppQuery", $param);
        return $res;
    }
    
    // 京东认证
    public function addJD($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "JD/AppAdd", $param);
        return $res;
    }
    public function queryJD($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "JD/AppQuery", $param);
        return $res;
    }

    // 公积金认证
    public function addReserved($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Reserved/AppAdd", $param);
        return $res;
    }
    public function queryReserved($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Reserved/AppQuery", $param);
        return $res;
    }
    

    // 社保认证
    public function addSocialSecurity($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "SocialSecurity/AppAdd", $param);
        return $res;
    }
    public function querySocialSecurity($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "SocialSecurity/AppQuery", $param);
        return $res;
    }
   
    

    // 家庭认证
    public function addFamily($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Family/AppAdd", $param);
        return $res;
    }
    public function queryFamily($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Family/AppQuery", $param);
        return $res;
    }
    
    // 社交认证查询
    public function querySocialContact($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Authentication/QuerySocialContact", $param);
        return $res;
    }
    // 微信认证
    public function addWX($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "WX/AppAdd", $param);
        return $res;
    }

    // 支付宝认证
    public function addZFB($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "ZFB/AppAdd", $param);
        return $res;
    }

    // 电子邮箱认证
    public function addEmail($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "Email/AppAdd", $param);
        return $res;
    }

    // QQ认证
    public function addQQ($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "QQ/AppAdd", $param);
        return $res;
    }

    //微博认证
    public function addWeiBo($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "WeiBo/AppAdd", $param);
        return $res;
    }

    //抖音认证
    public function addDouYin($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "DouYin/AppAdd", $param);
        return $res;
    }

    // 上传身份证照片
    public function identityUpCreate($param) {
        $param = "p=" . $param;
        $res = $this->Post(config_item('supvp_url') . "IdentityUp/Create", $param);
        return $res;
    }
}
