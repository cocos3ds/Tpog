<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
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
        $username = $this->request->param('username');
        $password1 = $this->request->param('password1');
        $password2 = $this->request->param('password2');
        if(empty($username)){
            $this->error('用户名不能为空');
        }
        if(empty($password1)){
            $this->error('密码不能为空');
        }

        if(empty($password2)){
            $this->error('确认密码不能为空');
        }

        if(!captcha_check($code)){
            $this->error('验证码错误');

        }
        if($password1 != $password2){
            $this->error('两次输入的密码不相同');
        }

        $this->reg($username,$password1);

    }

    private function reg($username,$password){
        $result = Db::table('user')->where('username',$username)->find();

        if($result != null){
            $this->error('用户名已存在');
        }

        $password = md5('tp'.$password);

        $data = ['username'=>$username,'password'=>$password];

        Db::table('user')->insert($data);

        $this->success('注册成功',url('admin/Login/index'));

    }


}
