<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Article extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if(session('username')){
            $this->assign('username',session('username'));
        }else{
            return $this->redirect(url('admin/login/index'));
        }
    }

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {

    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $content = input('post.m_content');

        echo $content;
    }

    /**
     * 文章的处理上传图片
     */
    public function uploadimg(){
        $file = request()->file('image');
        $info = $file->move('./uploads');
        if($info){
            $result = array('errno'=>'0');
            $data = array('http://'.request()->server('HTTP_HOST').'/uploads/'.$info->getSavename());
            $result['data']= $data;
            echo json_encode($result);
        }else{
            $result  = array('error'=>$file->getError());
            echo json_encode($result);
        }

    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
