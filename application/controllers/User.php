<?php

defined('BASEPATH') or exit('No direct script access allowed');

class regsend {
    
}

class reg {
    
}

class updateuser {
    
}

class getuserinfo {
    
}

class getmyrecord {
    
}

class sendforget {
    
}

class doforget {
    
}


class IdentityCardById {
    
}

class feedback {
    
}

class zhimaInit {
    
} 

class zhimaQuery {
    
}

class limit {
    
}

class rz_send {
    
}

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
    }

    /**
     * 注册发送短信
     */
    public function regsend() {
        $mobile = $this->input->post('mobile');
        $activity = $this->input->post('activity');
        
        if ($mobile == '') {
            $this->error(Error::e1001);
        }
        if ($this->checkmobile($mobile) == false) {
            $this->error(Error::e1002);
        }
        $param = new regsend();
        
        if(!empty($activity)){
            $param->activity = 1;
        }
        $param->mobile = $mobile;
        $res = $this->decode($this->User_model->sendcode($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 注册
     */
    public function jregister() {
        $p = $this->input->post();
        if ($p['mobile'] == '') {
            $this->error(Error::e1001);
        }
        if ($this->checkmobile($p['mobile']) == false) {
            $this->error(Error::e1002);
        }
        if ($p['code'] == '') {
            $this->error(Error::e1005);
        }
        if ($p['password'] == '') {
            $this->error(Error::e1003);
        }
        if (strlen($p['password']) < 6 || strlen($p['password']) > 16) {
            $this->error(Error::e1004);
        }
        $param = new reg();
        $param->mobile = $p['mobile'];
        $param->code = $p['code'];
        $param->password = $p['password'];
        $res = $this->decode($this->User_model->register($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 修改用户信息
     */
    public function updateuser() {
        $p = $this->input->post();
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new updateuser();
            $param->userinfoid = $res->id;
            $result = $this->decode($this->User_model->getuserinfo($this->encode($param)));
            $param->nickname = !empty($p['nickname']) ? $p['nickname'] : $result->d[0]->nickname;
            $param->userphoto = !empty($p['userphoto']) ? $p['userphoto'] : $result->d[0]->userphoto;
            $param->sex = !empty($p['sex']) ? $p['sex'] : $result->d[0]->sex;
            $param->birthday = !empty($p['birthday']) ? $p['birthday'] : $result->d[0]->birthday;
            $res = $this->decode($this->User_model->updateuser($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 获取用户信息
     */
    public function getuserinfo() {
        session_start();
        $ss = $this->input->post('ss') == ""?session_id():$this->input->post('ss');
        $res = MyMemcache::share()->get('dianshangH5_' . $ss);
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new getuserinfo();
            $param->userinfoid = $res->id;
            if($this->input->post("bargain") == 1){
                 $param->activity = 1;
            }
            $result = $this->decode($this->User_model->getuserinfo($this->encode($param)));
            // if ($result->d[0]->sex == '1') {
            //     $result->d[0]->sex = '男';
            // } elseif ($result->d[0]->sex == '2') {
            //     $result->d[0]->sex = '女';
            // } else {
            //     $result->d[0]->sex = '';
            // }
            $result->d[0]->mobile = substr_replace($result->d[0]->mobile, '****', 3, 4);
            // if ($result->d[0]->identitycard == '-1') {
            //     $result->d[0]->identstatus = '未认证';
            // } elseif ($result->d[0]->identitycard == '0') {
            //     $result->d[0]->identstatus = '正在审核';
            // } elseif ($result->d[0]->identitycard == '1') {
            //     $result->d[0]->identstatus = '已认证';
            // } elseif ($result->d[0]->identitycard == '2') {
            //     $result->d[0]->identstatus = '审核失败';
            // }
            unset($result->d[0]->id);
            unset($result->d[0]->password);
            echo json_encode($result);
        }
    }

    /**
     * 获取我的记录
     */
    public function getmyrecord() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new getmyrecord();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->User_model->getmyrecord($this->encode($param)));
            echo json_encode($res);
        }
    }

    /**
     * 忘记密码发送短信
     */
    public function sendforget() {
        $p = $this->input->post();

        if ($this->checkmobile($p['mobile']) == false) {
            $this->error(Error::e1002);
        }
        $param = new sendforget();
        $param->mobile = $p['mobile'];
        $res = $this->decode($this->User_model->sendforget($this->encode($param)));
        echo json_encode($res);
    }

    /**
     * 忘记密码
     */
    public function doforget() {
        $p = $this->input->post();
        if ($p['mobile'] == '') {
            $this->error(Error::e1000);
        }
        if ($this->checkmobile($p['mobile']) == false) {
            $this->error(Error::e1002);
        }
        if ($p['code'] == '') {
            $this->error(Error::e1004);
        }
        if (strlen($p['password']) < 6 || strlen($p['password']) > 16) {
            $this->error(Error::e1004);
        }
        $param = new doforget();
        $param->mobile = $p['mobile'];
        $param->code = $p['code'];
        $param->password = $p['password'];
        $res = $this->decode($this->User_model->doforget($this->encode($param)));
        echo json_encode($res);
    }

  

    /**
     * 查询身份证审核结果
     */
    /*public function IdentityCardById() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new IdentityCardById();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->User_model->IdentityCardById($this->encode($param)));
            echo json_encode($res);
        }
    }*/

    // 反馈
    public function feedback() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());

        $type = $this->input->post('type');
        $content = $this->input->post('content');
        $mobile = $this->input->post('mobile');
        $imgs = $this->input->post('imgs');

        $param = new Feedback();
        $param->content = $content;
        $param->mobile = $mobile;
        $param->type = $type;
        $param->imgs = $imgs;
        $param->userinfoid = isset($res->id) ? $res->id : 0;
        $res = $this->decode($this->User_model->Feedback($this->encode($param)));
        echo json_encode($res);
    }

    public function zhimaInit() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());        
        $cert_name = $this->input->post('cert_name');
        $cert_no = $this->input->post('cert_no');
        $res->cert_name = $cert_name;
        $res->cert_no = $cert_no;
        
        MyMemcache::share()->set('dianshangH5_' . session_id(), $res, 24 * 60 * 60);
        $rurl = $res->rurl;
        if(stristr($rurl,'bargaincdetail') != false ){
            $zmurl = $rurl."&ss=".session_id()."&";
        }else if(stristr($rurl,'bargainDetail') != false ){
            $zmurl = $rurl."&ss=".session_id()."&";
        }else{
            $zmurl = "";
        }
        
        $source = $this->input->post('source');
        $bargain = $this->input->post('bargain');
        
        $param = new zhimaInit();
        if(!empty($bargain)){  //砍价部分
            $param->bargain = 1;
        }
        $param->cert_name = $cert_name;
        $param->cert_no = $cert_no;
        $param->source = $source;
        $param->userinfoid = isset($res->id) ? $res->id : 0;
        $param->session_id = session_id();
        $param->zmurl = $zmurl;       
        $res = $this->decode($this->User_model->zhimaInit($this->encode($param)));
        echo json_encode($res);
    }

    public function zhimaQuery() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        $p = $this->input->post();
        $param = new zhimaQuery();
        $param->address = $p['address'];
        $param->idcard = $res->cert_no;
        $param->biz_no = $p['biz_no'];
        $param->userinfoid = isset($res->id) ? $res->id : 0;
        $res = $this->decode($this->User_model->zhimaQuery($this->encode($param)));
        echo json_encode($res);
    }

    // 额度
    public function limit() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new limit();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->User_model->limit($this->encode($param)));
            echo json_encode($res);
        }
    }

    // 全部待还
    public function instalmentList() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new limit();
            $param->userinfoid = $res->id;
            $param->state = $p['state'];
            if ($p['Page'] == '') {
                $param->Page = 1;
            } else {
                $param->Page = $p['Page'];
            }
            $param->PageSize = 10;
            $res = $this->decode($this->User_model->instalmentList($this->encode($param)));
            echo json_encode($res);
        }
    }

    // 还款记录
    public function instalmentItem() {
    session_start();
    $res = MyMemcache::share()->get('dianshangH5_' . session_id());
    if ($res == null || count($res) == 0) {
        $this->error(Error::e9999);
    } else {
        $p = $this->input->post();
        $param = new limit();
        $param->userinfoid = $res->id;
        $param->state = $p['state'];
        if ($p['page'] == '') {
            $param->Page = 1;
        } else {
            $param->Page = $p['page'];
        }
        $param->PageSize = 10;
        $res = $this->decode($this->User_model->instalmentItem($this->encode($param)));
            echo json_encode($res);
        }
    }

    

    // 本周待还
    public function instalmentListByWeek() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new limit();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->User_model->instalmentListByWeek($this->encode($param)));
            echo json_encode($res);
        }
    }
    // 订单详情
    public function instalmentListByListNo() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new limit();
            $param->userinfoid = $res->id;
            $param->instalmentno = $p['instalmentno'];
            $res = $this->decode($this->User_model->instalmentListByListNo($this->encode($param)));
            echo json_encode($res);
        }
    }
    
    // 身份证认证
    public function addIdentityCard() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->realname = $p['realname'];
            $param->idcard = $p['idcard'];
            $param->idcards = $p['idcards'];
            $param->idcardz = $p['idcardz'];
            $param->address = $p['address'];
            $param->agreementinfo = $p['agreementinfo'];
            $param->agreementlimit = $p['agreementlimit'];
            $param->sex = '1';
            $param->nation = '汉族';
            $res = $this->de($this->User_model->addIdentityCard($this->encode($param)));
            echo $res;
        }
    }
    // 上传完身份证正面，获取服务协议
    public function IDContract() {
        $param = new rz_send();
        $param->phonenum = $this->input->post("phonenum");
        $param->name = $this->input->post("name");
        $param->identity = $this->input->post("identity");
        $param->os = config_item("channel");
        $param->token = config_item("token");
        $res = $this->decode($this->User_model->IDContract($this->encode($param)));
        $html[] = file_get_contents("https://hk2-word-view.officeapps.live.com/wv/ResReader.ashx?n=p_1_10.xml&v=00000000-0000-0000-0000-000000000802&usid=675178f2-45e7-4416-a028-7548f0361b66&build=16.0.11519.32652&WOPIsrc=http%3A%2F%2Fhk2%2Dview%2Dwopi%2Ewopi%2Elive%2Enet%3A808%2Foh%2Fwopi%2Ffiles%2F%40%2FwFileId%3FwFileId%3D".$res->d[0]."&access_token=1&access_token_ttl=0&z=a8ced41ba6abefc2cdd1e84f92f965acf2825f2c49203bd1751a2db16b2021fa&waccluster=HK2");                     
        $html[] = file_get_contents("https://hk2-word-view.officeapps.live.com/wv/ResReader.ashx?n=p_1_10.xml&v=00000000-0000-0000-0000-000000000802&usid=675178f2-45e7-4416-a028-7548f0361b66&build=16.0.11519.32652&WOPIsrc=http%3A%2F%2Fhk2%2Dview%2Dwopi%2Ewopi%2Elive%2Enet%3A808%2Foh%2Fwopi%2Ffiles%2F%40%2FwFileId%3FwFileId%3D".$res->d[1]."&access_token=1&access_token_ttl=0&z=a8ced41ba6abefc2cdd1e84f92f965acf2825f2c49203bd1751a2db16b2021fa&waccluster=HK2");                     
        $neirong = new rz_send();
        $neirong->url = $res->d;
        $neirong->word = $html;
        echo json_encode($neirong);
    }
    // 职业认证
    public function addProfession() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->name = $p['name'];
            $param->profession = $p['profession'];
            $param->station = $p['station'];
            $param->wage = $p['wage'];
            $param->name = $p['name'];
            $param->area = $p['area'];
            $param->address = $p['address'];
            $param->telephone = $p['telephone'];
            $res = $this->de($this->User_model->addProfession($this->encode($param)));
            echo $res;
        }
    }

    public function queryProfession() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->decode($this->User_model->queryProfession($this->encode($param)));
            echo json_encode($res);
        }
    }

    //信用卡认证
    public function addCreditCard() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->bank = $p['bank'];
            $param->cardno = $p['cardno'];
            $param->cardlimit = $p['cardlimit'];
            $res = $this->de($this->User_model->addCreditCard($this->encode($param)));
            echo $res;
        }
    }
    public function queryCreditCard() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->queryCreditCard($this->encode($param)));
            echo $res;
        }
    }
    
    //教育认证
    public function addEducation() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->educational = $p['educational'];
            $param->school = $p['school'];
            $param->year = $p['year'];
            $res = $this->de($this->User_model->addEducation($this->encode($param)));
            echo $res;
        }
    }
    public function queryEducation() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->queryEducation($this->encode($param)));
            echo $res;
        }
    }
    
    //淘宝认证
    public function addTaobao() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addTaobao($this->encode($param)));
            echo $res;
        }
    }
    public function queryTaobao() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->queryTaobao($this->encode($param)));
            echo $res;
        }
    }
    

    //京东认证
    public function addJD() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addJD($this->encode($param)));
            echo $res;
        }
    }
    public function queryJD() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->queryJD($this->encode($param)));
            echo $res;
        }
    }

    //公积金认证
    public function addReserved() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $param->city = $p['city'];
            $res = $this->de($this->User_model->addReserved($this->encode($param)));
            echo $res;
        }
    }
    public function queryReserved() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->queryReserved($this->encode($param)));
            echo $res;
        }
    }
    
    

    //社保认证
    public function addSocialSecurity() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $param->city = $p['city'];
            $res = $this->de($this->User_model->addSocialSecurity($this->encode($param)));
            echo $res;
        }
    }
    public function querySocialSecurity() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->querySocialSecurity($this->encode($param)));
            echo $res;
        }
    }
    

    //家庭认证
    public function addFamily() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->area = $p['area'];
            $param->address = $p['address'];
            $param->marital = $p['marital'];
            $param->children = $p['children'];
            $param->linkman = $p['linkman'];
            $res = $this->de($this->User_model->addFamily($this->encode($param)));
            echo $res;
        }
    }
    public function queryFamily() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->queryFamily($this->encode($param)));
            echo $res;
        }
    }
    // 社交认证查询
    public function querySocialContact() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $res = $this->de($this->User_model->querySocialContact($this->encode($param)));
            echo $res;
        }
    }
    //微信认证
    public function addWX() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addWX($this->encode($param)));
            echo $res;
        }
    }

    //支付宝认证
    public function addZFB() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addZFB($this->encode($param)));
            echo $res;
        }
    }

    //电子邮箱认证
    public function addEmail() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addEmail($this->encode($param)));
            echo $res;
        }
    }

    //QQ认证
    public function addQQ() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addQQ($this->encode($param)));
            echo $res;
        }
    }

    //微博认证
    public function addWeiBo() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addWeiBo($this->encode($param)));
            echo $res;
        }
    }

    //抖音认证
    public function addDouYin() {
        session_start();
        $res = MyMemcache::share()->get('dianshangH5_' . session_id());
        if ($res == null || count($res) == 0) {
            $this->error(Error::e9999);
        } else {
            $p = $this->input->post();
            $param = new rz_send();
            $param->userinfoid = $res->id;
            $param->account = $p['account'];
            $param->password = $p['password'];
            $res = $this->de($this->User_model->addDouYin($this->encode($param)));
            echo $res;
        }
    }

    // 身份证上传
    public function identityUpCreate() {
        $param = new rz_send();
        $param->phonenum = $this->input->post("phonenum");
        $param->face = $this->input->post("face");
        $param->file = $this->input->post("file");
        $param->type = $this->input->post("type");
        $res = $this->de($this->User_model->identityUpCreate($this->encode($param)));
        echo $res;
    }

}
