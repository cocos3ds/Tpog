<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Register extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
       return $this->fetch();
    }


    public function check(){
        $code = $this->request->param('code');
        if(!captcha_check($code)){
            $this->error('验证码错误');
            exit();
        }.
    }


}
