<?php

namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Request;

class Index extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        if(session('username')){
            $this->assign('username',session('username'));
            return $this->fetch();
        }else{
            return $this->redirect(url('admin/login/index'));
        }
    }

    public function login(){
        return '登录';
    }

    /**
     * 验证码函数
     * @return \think\Response
     */
    public function verify(){
        $captcha = new Captcha();
        return $captcha->entry();
    }


}
