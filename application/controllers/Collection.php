<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class getCollection {
    
}

class addCollection {
    
}

class deleteCollection {
    
}

class deleteCollectionAll {
    
}

class choseAddCollection {
    
}

class Collection extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Collection_model');
    }

    /**
     * 获取收藏记录
     */
    public function getCollection() {
        $p = $this->input->post();
        $PageSize = 12;
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $data['s'] = 200;
            $param = new getCollection();
            if (!empty($p['Page'])) {
                $param->Page = $p['Page'];
            } else {
                $param->Page = 1;
            }
            $param->userinfoid = $res->id;
            $param->PageSize = $PageSize;
            $Collection = $this->decode($this->Collection_model->getCollection($this->encode($param)));
            $data['Collectiondata'] = $Collection->d->list;
            foreach ($data['Collectiondata'] as $key => $val) {
                if ($res->isgold == 1) {
                    $data['Collectiondata'][$key]->price = $val->vip;
                } else {
                    $data['Collectiondata'][$key]->price = $val->market;
                }
            }
            $data['Page'] = $param->Page;
            $data['PageSize'] = $param->PageSize;
            $data['count'] = $Collection->d->count;
            echo json_encode($data);
        }
    }

    /**
     * 添加收藏
     */
    public function addCollection() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $id = $this->input->post('id');
            $param = new addCollection();
            $param->userinfoid = $res->id;
            $param->commodityid = $id;
            $res = $this->decode($this->Collection_model->addCollection($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 删除单个收藏记录
     */
    public function deleteCollection() {
        $p = $this->input->post();
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new deleteCollection();
            $param->userinfoid = $res->id;
            $param->id = $p['id'];
            $res = $this->decode($this->Collection_model->deleteCollection($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 清空收藏记录
     */
    public function deleteCollectionAll() {
        $p = $this->input->post();
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new deleteCollectionAll();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->Collection_model->deleteCollectionAll($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 添加多个收藏记录
     */
    public function choseAddCollection() {
        $p = $this->input->post();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new choseAddCollection();
            $param->userinfoid = $res->id;
            $item = explode(',', rtrim($p['item'], ','));
            foreach ($item as $k => $v) {
                $items = explode(',', $v);
                $param->userinfoid = $res->id;
                $param->commodityid = $items[0];
                $resurlt = $this->decode($this->Collection_model->addCollection($this->encode($param)));
            }
            echo json_encode($resurlt);
        }
    }

}
