<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Cate extends Base
{
    public function index()
    {
    	//栏目分类查询
        $onelevel = db('cate')->where("level = 1")->order('scort ASC')->select();
        $twolevel = db('cate')->where("level = 2")->order('scort ASC')->select();
        $this->assign(array('onelevel' => $onelevel, 'twolevel' => $twolevel));
        return $this->fetch('list');
    }
    //一级栏目添加页面
    public function oneadd(){
        return $this->fetch();
    }
    //一级栏目编辑页面
    public function oneedit($id){
        $cate=db('cate')->find($id);
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    
    //二级栏目添加页面
    public function twoadd($id){
        $cate=db('cate')->find($id);
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    //二级栏目编辑页面
    public function twoedit($id)
    {
        $cate=Db::table('tp_cate')
        ->alias('c')
        ->join('tp_cate t','c.tid=t.id')
        ->field('c.*,t.catename as catenames')
        ->where('c.id',$id)
        ->find();
        $this->assign('cate',$cate);
        return $this->fetch();
    }
    
    
}
