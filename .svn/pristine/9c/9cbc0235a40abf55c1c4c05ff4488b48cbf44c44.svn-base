<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class getBrowse {
    
}

class deleteBrowse {
    
}

class deleteBrowseAll {
    
}

class Browse extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Browse_model');
    }

    /**
     * 获取浏览记录
     */
    public function getBrowse() {
        $p = $this->input->post();
        $PageSize = 10;
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $data['s'] = 200;
            $param = new getBrowse();
            if (!empty($p['Page'])) {
                $param->Page = $p['Page'];
            } else {
                $param->Page = 1;
            }
            $param->userinfoid = $res->id;
            $param->PageSize = $PageSize;
            $Browse = $this->decode($this->Browse_model->getBrowse($this->encode($param)));
            $data['Browsedata'] = $Browse->d->list;
            $data['Page'] = $param->Page;
            $data['PageSize'] = $param->PageSize;
            $data['count'] = $Browse->d->count;
            echo json_encode($data);
        }
    }

    /**
     * 删除单个浏览记录
     */
    public function deleteBrowse() {
        $p = $this->input->post();
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new deleteBrowse();
            $param->userinfoid = $res->id;
            $param->id = $p['id'];
            $res = $this->decode($this->Browse_model->deleteBrowse($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 删除所有浏览记录
     */
    public function deleteBrowseAll() {
        $p = $this->input->post();
        $data = array();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new deleteBrowseAll();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->Browse_model->deleteBrowseAll($this->encode($param)));
            echo json_encode($res);
        }
    }

}
