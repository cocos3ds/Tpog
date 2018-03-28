<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $articles = Db::table('article')->select();
        foreach($articles as &$article){
            $article['create_time'] = date('Y-m-d',$article['create_time']);
        }

        $this->assign('articles',$articles);

        return $this->fetch();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
