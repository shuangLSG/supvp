<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class banner{}

class classify{}

class activity{}

class commodity{}

class getGoodsById {}













class getCoupon {
    
}

class searchGoods {
    
}

class getGoodsType {
    
}

class queryGoodsTypeCount {
    
}

class getRecommend {
    
}

class buyGold {
    
}


class getBrandScreeen {
    
}



class kftype{

}
class mineBanner{}
class kfquestion{}
class Api extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Api_model');
        $this->load->model('Browse_model');
        $this->load->model('Collection_model');
    }


    /**
     * @param 1:首页banner  2:我的banner
     */
    public function banner() {
        $position = $this->input->post('position');
        $param = new banner();
        $param->position = $position;
        $res = $this->decode($this->Api_model->banner($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 分类
     * @param lv 1:1级分类 2:2级分类
     * @param Page 页码
     * @param PageSize 数目
     * @param parent : 6 (取1级分类的返回值 id字段)
     */
    public function classify() {
        $lv = $this->input->post('lv');
        $flag = $this->input->post('flag');
        $parent = $this->input->post('parent');
        $param = new classify();
        $param->lv = $lv;
        if ($flag!='') {
            $param->Page = 1;        
            $param->PageSize = 9;
        } else {
            $param->Page = 0;        
            $param->PageSize = 0;
        }
        if($parent!=''){
            $param->parent = $parent;
        }
        $res = $this->decode($this->Api_model->classify($this->encode($param)));
        echo json_encode($res);
    }
    
    public function activity() {
        $param = new activity();
        $res = $this->decode($this->Api_model->activity($this->encode($param)));
        echo json_encode($res);
    }

    public function commodity() {
        $p = $this->input->post();
        $param = new commodity();
        $param->brandid = $p['brandid'];
        $param->selectid = $p['selectid'];
        if (!empty($p['all'])) {
            $param->all = $p['all'];
        }
        if (!empty($p['sales'])) {
            $param->sales = $p['sales'];
        }
        if (!empty($p['price'])) {
            if ($p['price'] == 2) {
                $param->price = '0';
            } else {
                $param->price = '1';
            }
        }
        if (!empty($p['new'])) {
            $param->new = $p['new'];
        }
        if (!empty($p['minprice'])) {
            $param->minprice = $p['minprice'];
        }
        if (!empty($p['maxprice'])) {
            $param->maxprice = $p['maxprice'];
        }
        if (!empty($p['type'])) {
            $param->type = $p['type'];
        }
        if (!empty($p['object'])) {
            $param->object = $p['object'];
        }
        if (!empty($p['server'])) {
            $param->server = $p['server'];
        }
     
        if (!empty($p['Page'])) {
            $param->Page = $p['Page'];
        } else {
            $param->Page = 1;
        }
        $param->PageSize = 10;
        $branddata = $this->decode($this->Api_model->commodity($this->encode($param)));
        $data['branddata'] = $branddata->d;
        $data['s'] = $branddata->s;
        $data['PageSize'] = $param->PageSize;
        echo json_encode($data);
    }
    










    /**
     * title和轮播
     */
    public function jselectionquery() {
        $send1 = new jselectionquery();
        $send1 = $this->de($this->Api_model->selectionquery($this->encode($send1)));
        echo $send1;
    }

    /**
     * 甄选分类详情
     */
    public function jcommodityquery() {
        $send1 = new jcommodityquery();
        $send1->selectid = $this->input->post("selectid");
        $send1 = $this->de($this->Api_model->commodityquery($this->encode($send1)));
        echo $send1;
    }

    public function jcommoditypagequery() {
        $send1 = new jcommoditypagequery();
        $send1->selectid = $this->input->post("selectid");
        $send1->Page = $this->input->post("Page");
        $send1 = $this->de($this->Api_model->commoditypagequery($this->encode($send1)));
        echo $send1;
    }

    /**
     * 获取用户购物券
     */
    public function queryCoupon() {
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $data['s'] = 200;
            $p = $this->input->post();
            $param = new getCoupon();
            $param->isdel = $p['isdel'];
            $param->userinfoid = $res->id;    
            if ($p['page'] == '') {
                $param->Page = 1;
            } else {
                $param->Page = $page;
            }
            $param->PageSize = 10;     
            $Coupon = $this->decode($this->Api_model->queryCoupon($this->encode($param)));
            $data['Conpondata'] = $Coupon->d;
            echo json_encode($data);
        }
    }

    public function getCoupons() {
        
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        $p = $this->input->post();

        $param = new getCoupon();
        $param->userinfoid = ($res != null && count($res) != 0 ? $res->id : (!empty($p['userinfoid'])?$p['userinfoid']:0));
        $param->id = $p['id'];

        $Coupon = $this->decode($this->Api_model->getCoupons($this->encode($param)));
        echo json_encode($Coupon);

    }

    public function getCommodityCoupons() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        $p = $this->input->post();
        $param = new getCoupon();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        $param->userinfoid = ($res != null? $res->id : (!empty($p['userinfoid'])? $p['userinfoid'] : 0));
        $param->id = $p['id'];
        $Coupon = $this->de($this->Api_model->getCommodityCoupons($this->encode($param)));        
        echo $Coupon;
    }
    
    
    /**
     * 商品搜索
     */
    public function searchGoods() {
        $p = $this->input->post();
        $param = new searchGoods();
        $param->keyword = $p['keyword'];
        if ($p['Page'] == '') {
            $param->Page = 1;
        } else {
            $param->Page = $p['Page'];
        }
        $param->PageSize = 10;
        $res = $this->decode($this->Api_model->searchGoods($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 获取商品型号
     */
    public function getGoodsType() {
        $id = $this->input->post('id');
        $param = new getGoodsType();
        $param->commodityid = $id;
        $res = $this->decode($this->Api_model->getGoodsType($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 查询商品型号数量
     */
    public function queryGoodsTypeCount($param) {
        $p = $this->input->post();
        $param = new queryGoodsTypeCount();
        $param->commodityid = $p['commodityid'];
        $param->tag1 = "";
        $param->tag2 = $p['tag1'];
        $res = $this->decode($this->Api_model->queryGoodsTypeCount($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 推荐产品
     */
    public function getRecommend() {
        $param = new getRecommend();
        $res = $this->decode($this->Api_model->getRecommend($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 购买金卡
     */
    public function buyGold() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $data['s'] = 200;
            $param = new buyGold();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->Api_model->buyGold($this->encode($param)));
            echo json_encode($res);
        }
    }

    /*public function getBrand() {
        $param = new getBrand();
        $branddata = $this->decode($this->Api_model->getBrand($this->encode($param)));
        echo json_encode($branddata);
    }*/

    

    public function getBrandScreeen() {
        $id = $this->input->get_post('id');
        $param = new getBrandScreeen();
        $param->selectid = $id;
        $res = $this->decode($this->Api_model->getBrandScreen($this->encode($param)));
        echo json_encode($res);
    }

    public function getGoodsById() {
        $id = $this->input->post('id');
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        $param = new getGoodsById();
        $param->id = $id;
        $param->commodityid = $id;
        $param->userinfoid = ($res != null)?$res->id:0;
        $result = $this->decode($this->Api_model->getGoodsById($this->encode($param)));
        if ($res != null) {
            $param->userinfoid = $res->id;
            $param->commodityid = $id;
            if (count($result->d->item) != 0) {
                $param->selectionid = $result->d->item[0]->selection1;
                $this->decode($this->Browse_model->addBrowse($this->encode($param)));
            }
            $isCollection = $this->decode($this->Collection_model->isCollection($this->encode($param)));
            $data['isCollection'] = $isCollection->d;
        } else {
            $data['isCollection'] = '0';
        }
        if (count($result->d->item) == 0) {
            $data['s'] = 250;
            $data['judge'] = '1';
            echo json_encode($data);
        } else {
            $data['s'] = 200;
            $data['judge'] = '2';
            $data['detail'] = $result->d;
            echo json_encode($data);
        }
    }

    public function xcxGetOpenId() {
        $code = $this->input->post('code');
        if (!$code) {
            $this->error(Error::e1015);
        }
        $this->load->library('WxPay');
        $res = WxPay::XcxOpenID($code);
        echo json_encode($res);
    }


    public function xcxJieMi() {
        $encryptedData = $this->input->post('encryptedData');
        $iv = $this->input->post('iv');
        $sessionKey = $this->input->post('sessionKey');

        if (!$encryptedData) {
            $this->error(Error::e1015);
        }
        $this->load->library('XcxTool');
        $res = XcxTool::JieMi($encryptedData,$iv,$sessionKey);
        echo json_encode($res);
    }


    public function kftype() {
        $param = new kftype();
        $param->os = config_item("channel");
        $param->token = config_item("token");
        $branddata = $this->decode($this->Api_model->kftype($this->encode($param)));
        echo json_encode($branddata);
    }

    public function kfquestion() {
        $param = new kfquestion();
        $param->os = config_item("channel");
        $param->token = config_item("token");
        $param->id = $this->input->post("id");
        $branddata = $this->decode($this->Api_model->kfquestion($this->encode($param)));
        echo json_encode($branddata);
    }

    // public function mineBanner() {
    //     $param = new mineBanner();
    //     $param->os = config_item("channel");
    //     $param->token = config_item("token");
    //     $res = $this->decode($this->Api_model->mineBanner($this->encode($param)));
    //     echo json_encode($res);
    // }
    
}
