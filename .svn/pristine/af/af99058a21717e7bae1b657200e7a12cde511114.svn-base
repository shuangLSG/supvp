<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class H5Activity {
    
}


class ActivityH5 extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('ActivityH5_model');
    }
   
    public function activity() {
        $id = $this->input->get('id');
        $this->load->view("activity".$id);
    }

    public function h5Activity() {
        $id = $this->input->post('activity_id');
        $param = new H5Activity();
        $param->activity_id = $id;
        $data = $this->de($this->ActivityH5_model->h5Activity($this->encode($param)));
        echo $data;
    }

    public function banner(){
        $id = $this->input->get('id');
        $param = new H5Activity();
        $param->id = $id;
        $res = $this->decode($this->ActivityH5_model->h5Banner($this->encode($param)));
        if (count($res->d) > 0) {
            $send = $res->d;
            $data["banner"] = $send;
            $share = new H5Activity();
            $share->logo = "http://www.bfy100.com/supvp.png";
            $share->content = $send->content;
            $share->profile = "";
            $share->title = $send->title;
            $share->url = $send->url;
            $share->image = "http://www.bfy100.com/supvp.png";
            $data["share"] = json_encode($share);
        } else {
            $data["share"] = "";
        }
        if(property_exists($data['banner'],'h5_commoditys') && empty($data['banner']->h5_commoditys)){
            if(in_array($id,array(6,7))){
                $this->load->view("banner".$id);
            }else{
                $this->load->view("banner",$data);
            }
        }else{
            $this->load->view("banner".$id);
        }
    }


    
    public function h5Banner() {
        $id = $this->input->post('id');
        $param = new H5Activity();
        $param->id = $id;
        $data = $this->de($this->ActivityH5_model->h5Banner($this->encode($param)));
        echo $data;
    }
    
}
