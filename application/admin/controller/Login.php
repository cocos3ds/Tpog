<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class Login extends Controller{

    public function index(){
        return $this->fetch();
    }

    public function check(){

        $code = $this->request->param('code');
        $username = $this->request->param('username');
        $password = $this->request->param('password');

        if(empty($username)){
            $this->error('用户名不能为空');
        }
        if(empty($password)){
            $this->error('密码不能为空');
        }
        if(!captcha_check($code)){
            $this->error('验证码错误');
        }

        $result = Db::table('user')->where('username',$username)->where('password',md5('tp'.$password))->find();

        if($result != null){
            session('username',$username);
            $this->success('登录成功',url('admin/index/index'));
        }
    }

    public function logout(){
        if(!session('username')){
            $this->error('请登录');
        }

        session('username',null);
        $this->success('已退出');
    }


}
