<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class getOrder {
    
}

class cancelOrder {
    
}

class orderDetail {
    
}

class waitGoods {
    
}

class Completed {
    
}

class historyOrder {
    
}

class writeOrder {
    
}

class confirmOrder {
    
}



class returnOrder {
    
}

class queryKd {
    
}

class waitOrderPay{}
class getAmortize{}
class getOrderCoupon{}
class getAllOrder{}
class shipments{}    

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Order_model');
        $this->load->model('City_model');
    }

    /**
     * 月供查询
     */
    public function getAmortize() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new getAmortize();
            $param->userinfoid = $res->id;
            $param->free = $p['free'];
            $param->nofree = $p['nofree'];
            $res = $this->decode($this->Order_model->getamortize($this->encode($param)));
            echo json_encode($res);
        }
    }

    public function getOrderCoupon() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new getOrderCoupon();
            $param->userinfoid = $res->id;
            $param->list = $p['list'];
            $res = $this->decode($this->Order_model->getOrderCoupon($this->encode($param)));
            echo json_encode($res);
        }
    }
    
    /**
     * 全部
     */
    public function getAllOrder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $page = $this->input->post('Page');
            $param = new getAllOrder();
            $param->userinfoid = $res->id;
            if ($page == '') {
                $param->Page = 1;
            } else {
                $param->Page = $page;
            }
            $param->PageSize = 10;
            $res = $this->decode($this->Order_model->getAllOrder($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 待付款
     */
    public function getOrder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $page = $this->input->post('Page');
            $param = new getOrder();
            $param->userinfoid = $res->id;
            if ($page == '') {
                $param->Page = 1;
            } else {
                $param->Page = $page;
            }
            $param->PageSize = 10;
            $res = $this->decode($this->Order_model->getOrder($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 取消订单
     */
    public function cancelOrder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $orderno = $this->input->post('orderno');
            $param = new cancelOrder();
            $param->userinfoid = $res->id;
            $param->orderno = $orderno;
            $res = $this->decode($this->Order_model->cancelOrder($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 订单详情
     */
    public function orderDetail() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $orderno = $this->input->post('orderno');
            $param = new orderDetail();
            $param->userinfoid = $res->id;
            $param->orderno = $orderno;
            $res = $this->decode($this->Order_model->orderDetail($this->encode($param)));
            $param->cityid = $res->d[0]->city;
            $param->capitalid = $res->d[0]->capital;
            $rescity = $this->decode($this->City_model->cityById($this->encode($param)));
            $rescapital = $this->decode($this->City_model->capitalById($this->encode($param)));
            $res->d[0]->city = $rescity->d[0]->name;
            $res->d[0]->capital = $rescapital->d[0]->name;
            echo json_encode($res);
        }
    }
    
    /**
     * 待发货
     */
    public function shipments() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            // $orderno = $this->input->post('orderno');
            $page = $this->input->post('Page');
            $param = new shipments();
            $param->userinfoid = $res->id;
            // $param->orderno = $orderno;
            if ($page == '') {
                $param->Page = 1;
            } else {
                $param->Page = $page;
            }
            $param->PageSize = 10;
            $res = $this->decode($this->Order_model->shipments($this->encode($param)));
            $p = new shipments();
            foreach ($res->d as $k => $v) {
                $param->cityid = $res->d[0]->list[0]->city;
                $param->capitalid = $res->d[0]->list[0]->capital;
                $rescity = $this->decode($this->City_model->cityById($this->encode($param)));
                $rescapital = $this->decode($this->City_model->capitalById($this->encode($param)));
                $res->d[$k]->address = $rescapital->d[0]->name . ' ' . $rescity->d[0]->name . ' ' . $res->d[0]->list[0]->address;
            }
            echo json_encode($res);
        }
    }

    /**
     * 待收货
     */
    public function waitGoods() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            // $orderno = $this->input->post('orderno');
            $page = $this->input->post('Page');
            $param = new waitGoods();
            $param->userinfoid = $res->id;
            // $param->orderno = $orderno;
            if ($page == '') {
                $param->Page = 1;
            } else {
                $param->Page = $page;
            }
            $param->PageSize = 10;
            $res = $this->decode($this->Order_model->waitGoods($this->encode($param)));
            $p = new waitGoods();
            foreach ($res->d as $k => $v) {
                $param->cityid = $res->d[0]->list[0]->city;
                $param->capitalid = $res->d[0]->list[0]->capital;
                $rescity = $this->decode($this->City_model->cityById($this->encode($param)));
                $rescapital = $this->decode($this->City_model->capitalById($this->encode($param)));
                $res->d[$k]->address = $rescapital->d[0]->name . ' ' . $rescity->d[0]->name . ' ' . $res->d[0]->list[0]->address;
            }
            echo json_encode($res);
        }
    }

    /**
     * 售后
     */
    public function Completed() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $orderno = $this->input->post('orderno');
            $page = $this->input->post('Page');
            $param = new Completed();
            $param->userinfoid = $res->id;
            $param->orderno = $orderno;
            if ($page == '') {
                $param->Page = 1;
            } else {
                $param->Page = $page;
            }
            $param->PageSize = 10;
            $res = $this->decode($this->Order_model->Completed($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 历史订单
     */
    public function historyOrder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $orderno = $this->input->post('orderno');
            $page = $this->input->post('Page');
            $param = new historyOrder();
            $param->userinfoid = $res->id;
            $param->orderno = $orderno;
            if ($page == '') {
                $param->Page = 1;
            } else {
                $param->Page = $page;
            }
            $param->PageSize = 10;
            $res = $this->decode($this->Order_model->historyOrder($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 填写订单
     */
    public function writeOrder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new writeOrder();
            $param->userinfoid = $res->id;
            $item = explode(',', rtrim($p['list'], ','));
            foreach ($item as $k => $v) {
                $items = explode('_', $v);
                $param->list[$k]->id = $items[0];
                $param->list[$k]->cnumber = $items[1];
            }
            $res = $this->decode($this->Order_model->writeOrder($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 用户确认订单
     */
    public function confirmOrder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $orderno = $this->input->post('orderno');
            $param = new confirmOrder();
            $param->userinfoid = $res->id;
            $param->orderno = $orderno;
            $res = $this->decode($this->Order_model->confirmOrder($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 退货详情
     */
    public function returnOrder() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new returnOrder();
            $param->userinfoid = $res->id;
            $param->orderno = $p['orderno'];

            $res = $this->decode($this->Order_model->returnOrder($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 查询快递
     */
    public function queryKd() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new queryKd();
            $param->logistics = $p['logistics'];
            $param->expressid = $p['expressid'];
            $res = $this->decode($this->Order_model->queryKd($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 待付款支付
     */
    /*public function waitOrderPay() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $orderno = $this->input->post('orderno');
            $param = new waitOrderPay();
            $param->orderno = $orderno;
            $param->userinfoid = $res->id;
            $openid = MyMemcache::share()->get('dianshangH5_openid_' . $res->id . "_" . session_id());
            $param->openid = $openid;

            $res = $this->decode($this->Order_model->waitOrderPay($this->encode($param)));
            echo json_encode($res);
        }
    }*/

    public function xcxwaitOrderPay() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $orderno = $this->input->post('orderno');
            $openid = $this->input->post('openid');
            $param = new waitOrderPay();
            $param->orderno = rtrim($orderno, ',');
            $param->userinfoid = $res->id;
            $param->openid = $openid;   
            $res = $this->Order_model->xcxwaitOrderPay($this->encode($param));
            var_dump($res);
            echo json_encode($res);
        }
    }

}
