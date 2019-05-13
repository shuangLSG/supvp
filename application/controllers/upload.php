<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_add {

    public $file;
    public $type;

}

class Uploadlist_add {

    public $filelist;
    public $typelist;

}

class Upload extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Upload_model");
    }

    public function upload() {
        $file = $this->input->post("file");
        $type = $this->input->post("type");
        $param = new Upload_add();
        $param->file = $file;
        $param->type = $type;
        $res = $this->de($this->Upload_model->upload($this->encode($param)));
        echo $res;
    }

    public function uploadList() {
        $filelist = $this->input->post("filelist");
        $typelist = $this->input->post("typelist");
        $param = new Uploadlist_add();
        $param->filelist = $filelist;
        $param->typelist = $typelist;
        $res = $this->de($this->Upload_model->uploadList($this->encode($param)));
        echo $res;
    }
    public function upload2($file, $type) {
        $param = new Upload_add();
        $param->file = $file;
        $param->type = $type;
        $res = $this->decode($this->Upload_model->upload($this->encode($param)));
        return $res->d;
    }
}
