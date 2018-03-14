<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Login extends Controller{

    public function index(){
        return $this->fetch();
    }

    public function check(){

        $code = $this->request->param('code');

        if(!captcha_check($code)){
            $this->error('验证码错误');
        }else{
            $this->success('验证码正确');
        }
    }
}
