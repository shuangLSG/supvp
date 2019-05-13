<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ident {
    
}

class IdentityCardById {
    
}

class pay {
    
}
class Electricity_send{}
class supvp extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Api_model');
        $this->load->model('User_model');
        $this->load->model('Order_model');
    }

    public function classify(){
        $this->load->view("classify");
    }


    public function address() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("address");
        }
    }


    public function authinfo() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $param = new IdentityCardById();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->User_model->IdentityCardById($this->encode($param)));
            if ($res->d[0]->status == 1) {
                $this->load->view("authInfo");
            } else {
                redirect('/supvp/certification');
            }
        }
    }

    public function checkLogistics() {
        $this->load->view("checkLogistics");
    }
    public function servicehelp() {
        $this->load->view("serviceHelp");
    }
    public function appfeedback() {
        $this->load->view("APPfeedback");
    }                
    public function JIMChat() {
        $this->load->view("JIMChat");
    }  
    public function zm1(){
        $this->load->view("zm1");
    }
    public function limitMange(){
        $this->load->view("limitMange");
    }
    public function rzProfession(){
        $this->load->view("rzProfession");
    }
    public function areaSelection(){
        $this->load->view("areaSelection");
    }
    public function rzIdentityCard(){
        $this->load->view("rzIdentityCard");
    }
    public function rzCreditCard(){
        $this->load->view("rzCreditCard");
    }
    public function rzEducation(){
        $this->load->view("rzEducation");
    }
    public function rzTaobao(){
        $this->load->view("rzTaobao");
    }
    public function rzJD(){
        $this->load->view("rzJD");
    }
    public function rzReserved(){
        $this->load->view("rzReserved");
    }
    public function rzSocialSecurity(){
        $this->load->view("rzSocialSecurity");
    }
    public function rzSocialContact(){
        $this->load->view("rzSocialContact");
    }
    public function rzSocialContactItem(){
        $this->load->view("rzSocialContactItem");
    }

    public function rzFamily(){
        $this->load->view("rzFamily");
    }
   
    public function faceRecognition(){
        $this->load->view("faceRecognition");
    }
    public function auditing(){
        $this->load->view("auditing");
    }
    public function limit(){
        $this->load->view("limit");
    }
    public function allRepaid(){
        $this->load->view("allRepaid");
    }
    
    public function historyRepaid(){
        $this->load->view("historyRepaid");
    }
    
    // 还款记录
    public function repaymentRecord(){
        $this->load->view("repaymentRecord");
    }
    // 认证成功
    public function rzSuccess(){
        $this->load->view("rzSuccess");
    }
    public function rzCreditCardSuccess(){
        $this->load->view("rzCreditCardSuccess");
    }
    public function agreement(){
        $this->load->view("agreement");
    }
    
    
    // 认证失败
    public function rzFailed(){
        $this->load->view("rzFailed");
    }


    public function qrpay() {
        $data["url"] = $this->input->get("url");
        $this->load->view("qrpay", $data);
    }


    public function browserhistory() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("browserHistory");
        }
    }

    public function cart() {
        $this->load->view("cart");
    }

    public function certification() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("certification");
        }
    }

    public function sizeTable(){
        $this->load->view("sizeTable");
    }

   

    public function collect() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("collect");
        }
    }

    public function coupon() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("coupon");
        }
    }

    public function editaddress() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("editaddress");
        }
    }

    

    public function orderdetail() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("orderDetail");
        }
    }

    

    public function mine() {
        $this->load->view("mine");
    }

    public function goodsdetail() {
        $this->load->library('WxShare');
        $SignPackage = WxShare::GetSignPackage();      
        $data["signPackage"]=$SignPackage;
        $this->load->view("goodsdetail",$data);
    }

    public function appDetail() {
        $param = new Electricity_send();
        $userinfo = MyMemcache::share()->get('dianshangH5_' . session_id());
        $param->id = $this->input->get("id");
        // $param->userinfoid = $this->input->get("r");
        $param->os = config_item("channel");
        $param->token = config_item("token");
        $res = $this->decode($this->Api_model->getGoodsById($this->encode($param)));
        $item = count($res->d->item) > 0 ? $res->d->item[0] : null;
        unset($item->cinfo);
        unset($item->details);
        $data["item"] = $item;      
        $data["list"] = $res->d->list;
        $this->load->view("appDetail", $data);
    }

    public function index() {
        $this->load->view("index");
    }

    public function login() {
        $this->load->view("login");
    }
    public function codeLogin() {
        $this->load->view("codeLogin");
    }
    public function setLoginPwd() {
        $this->load->view("setLoginPwd");
    }
    
    public function logisticsdetail() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $param = new ident();
            $param->logistics = $this->input->get("logistics");
            $param->expressid = $this->input->get("expressid");
            $res = $this->decode($this->Order_model->queryKd($this->encode($param)));
            $data["queryKd"] = $res->d;
     
            $this->load->view("logisticsDetail", $data);
        }
    }

    

    public function newaddress() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("newAddress");
        }
    }

    

    public function personal() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("personal");
        }
    }

    /*public function realnameauthentication() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $param = new IdentityCardById();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->User_model->IdentityCardById($this->encode($param)));
            if ($res->d[0]->status == 1) {
                $this->load->view("realNameAuthentication");
            } else {
                redirect('/supvp/certification');
            }
        }
    }*/

    public function register() {
        $this->load->view("register");
    }

    public function resetpSW() {
        $this->load->view("resetPSW");
    }

    public function review() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("review");
        }
    }

    public function search() {
        $this->load->view("search");
    }

    public function setting() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("setting");
        }
    }

    public function share() {
        $this->load->view("share");
    }

    public function uploadphoto() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("uploadPhoto");
        }
    }

    public function usecoupon() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->view("useCoupon");
        }
    }

    public function brandItem() {
        $data["brandname"] = $this->input->get("brandname");
        $this->load->view('brandItem', $data);
    }

    public function pays() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            MyMemcache::share()->delete('dianshangH5_openid_' . $res->id. "_" . session_id());
            $this->load->view('pays');
        }
    }

    public function instalmentItem() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
           $this->load->library('WxPay');
           $openid = WxPay::GetOpenid();   
           MyMemcache::share()->set('dianshangH5_openid_' . $res->id. "_" . session_id(), $openid, 24 * 60 * 60);
            
           $this->load->view("instalmentItem");
        }
    }
    public function weekRepaid() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
           $this->load->library('WxPay');
           $openid = WxPay::GetOpenid();
           MyMemcache::share()->set('dianshangH5_openid_' . $res->id. "_" . session_id(), $openid, 24 * 60 * 60);
            $this->load->view("weekRepaid");
        }
    }

    public function myorder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
            $this->load->library('WxPay');
            $openid = WxPay::GetOpenid();
            MyMemcache::share()->set('dianshangH5_openid_' . $res->id. "_" . session_id(), $openid, 24 * 60 * 60);
            $this->load->view("myOrder");
        }
    }

    public function fillorder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('/supvp/login');
        } else {
           $this->load->library('WxPay');
           $openid = WxPay::GetOpenid();
           MyMemcache::share()->set('dianshangH5_openid_' . $res->id. "_" . session_id(), $openid, 24 * 60 * 60);
           $this->load->view("fillOrder");
        }
    }
    
    // 微信支付
    public function wxPay() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            if ($p['couponid'] == '') {
                $param->couponid = '';
            } else {
                $param->couponid = $p['couponid'];
            }
            $param->addressid = $p['addressid'];
            $param->userinfoid = $res->id;
            $param->invoice = $p['invoice'];
            $param->leavemsg = $p['leavemsg'];
            $param->list = $p['list'];
            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id. "_" . session_id());
            // $openid = 'ovcgb5BgwSAWtQgHq4P7';
            $param->openid = $openid;
            $res = $this->decode($this->Order_model->WxPay($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
    * 生成订单
    */
    // 分期支付addOrderPay
    public function addOrderPay() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            if ($p['couponid'] == '') {
                $param->couponid = '';
            } else {
                $param->couponid = $p['couponid'];
            }
            $param->addressid = $p['addressid'];
            $param->userinfoid = $res->id;
            $param->invoice = $p['invoice'];
            $param->leavemsg = $p['leavemsg'];
            $param->list = $p['list'];
            $param->allissues = $p['allissues'];

            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id. "_" . session_id());
            $param->openid = $openid;

            $res = $this->decode($this->Order_model->addOrderPay($this->encode($param)));
   
            echo json_encode($res);
        }
    }

    // 支付宝支付
    public function webAddOrder() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            if ($p['couponid'] == '') {
                $param->couponid = '';
            } else {
                $param->couponid = $p['couponid'];
            }
            $param->addressid = $p['addressid'];
            $param->userinfoid = $res->id;
            $param->invoice = $p['invoice'];
            $param->leavemsg = $p['leavemsg'];
            $param->list = $p['list'];

            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id. "_" . session_id());
            $param->openid = $openid;

            $res = $this->decode($this->Order_model->webAddOrder($this->encode($param)));
            echo json_encode($res);
        }
    }


    /**
    * 订单详情 下 的支付
    */

    // 支付宝支付
    public function H5ZFBPayOrder() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            $param->orderno = $p['orderno'];
            $param->userinfoid = $res->id;

            $res = $this->decode($this->Order_model->H5ZFBPayOrder($this->encode($param)));
            echo json_encode($res);
        }
    }
    // 分期支付
    public function addPayOrder() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            $param->orderno = $p['orderno'];
            $param->allissues = $p['allissues'];
            $param->userinfoid = $res->id;

            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id. "_" . session_id());
            $param->openid = $openid;

            $res = $this->decode($this->Order_model->addPayOrder($this->encode($param)));
            echo json_encode($res);
        }
    }
    public function WXPayOrder() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            $param->orderno = $p['orderno'];
            $param->userinfoid = $res->id;

            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id. "_" . session_id());
            $param->openid = $openid;

            $res = $this->decode($this->Order_model->WXPayOrder($this->encode($param)));
            echo json_encode($res);
        }
    }


    // 还款 支付

    public function WXPayLimit() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            $param->orderno = $p['orderno'];
            $param->userinfoid = $res->id;

            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id. "_" . session_id());
            $param->openid = $openid;

            $res = $this->decode($this->Order_model->WXPayLimit($this->encode($param)));
            echo json_encode($res);
        }
    }
    public function ZFBPayLimit() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            redirect('supvp/login');
        } else {
            $p = $this->input->post();
            $param = new pay();
            $param->orderno = $p['orderno'];
            $param->userinfoid = $res->id;

            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id. "_" . session_id());
            $param->openid = $openid;

            $res = $this->decode($this->Order_model->ZFBPayLimit($this->encode($param)));
            echo json_encode($res);
        }
    }
    
}
