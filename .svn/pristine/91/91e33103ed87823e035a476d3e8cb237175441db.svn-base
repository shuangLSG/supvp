<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class getCar {
    
}

class addCar {
    
}

class editCar {
    
}

class delCar {
    
}
class delCars {
    
}
class getCarNum {
    
}

class Car extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Car_model');
    }

    /**
     * 获取购物车
     */
    public function getCar() {
        $p = $this->input->post();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new getCar();
            $param->userinfoid = $res->id;
            $data = $this->decode($this->Car_model->getCar($this->encode($param)));
            echo json_encode($data);
        }
    }

    /**
     * 添加购物车
     */
    public function addCar() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new addCar();
            $param->userinfoid = $res->id;
            $param->commodityid = $p['commodityid'];
            $param->cnumber = $p['cnumber'];
            if (!empty($p['color'])) {
                $param->color = $p['color'];
            }
            if (!empty($p['size'])) {
                $param->size = $p['size'];
            }
            if (!empty($p['network_type'])) {
                $param->network_type = $p['network_type'];
            }
            if (!empty($p['package'])) {
                $param->package = $p['package'];
            }
            if (!empty($p['norms'])) {
                $param->norms = $p['norms'];
            }
            if (!empty($p['capacity'])) {
                $param->capacity = $p['capacity'];
            }
            if (!empty($p['content'])) {
                $param->content = $p['content'];
            }
            $res = $this->decode($this->Car_model->addCar($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 修改购物车
     */
    public function editCar() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new editCar();
            $param->userinfoid = $res->id;
            $param->commodityid = $p['commodityid'];
            $param->cnumber = $p['cnumber'];
            $param->shopid = $p['shopid'];
            
            $res = $this->decode($this->Car_model->editCar($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 删除购物车(单个)
     */
    public function delCar() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new delCar();
            $param->userinfoid = $res->id;
            $param->commodityid = $p['commodityid'];
            $param->shopid = $p['shopid'];
            $res = $this->decode($this->Car_model->delCar($this->encode($param)));
            echo json_encode($res);
        }
    }
    /**
     * 删除购物车(多个)
     */
    public function delCars() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new delCars();
            $param->userinfoid = $res->id;
            $param->commodityid = json_decode($p['commodityid']);
            $param->shopid =json_decode($p['shopid']);
            $res = $this->decode($this->Car_model->delCars($this->encode($param)));
            echo json_encode($res);
        }
    }
    /**
     * 选择性删除购物车
     
    public function delchoseCar() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new delCar();
            $item = explode('_', rtrim($p['list'], '_'));
            foreach ($item as $k => $v) {
                $items = explode(',', $v);
                $param->userinfoid = $res->id;
                $param->commodityid = $items[0];
                $param->tag1 = "";
                $param->tag2 = $items[1];
                $resurlt = $this->decode($this->Car_model->delCar($this->encode($param)));
            }
            echo json_encode($resurlt);
        }
    }*/

    /**
     * 获取购物车数量
     */
    public function getCarNum() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new getCarNum();
            $param->userinfoid = $res->id;
            $resurlt = $this->decode($this->Car_model->getCarNum($this->encode($param)));
            echo json_encode($resurlt);
        }
    }

}
