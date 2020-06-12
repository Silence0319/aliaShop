<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Banner extends Base
{
    public function index()
    {
        $banner=Db::table('tp_banner')
        ->alias('b')
        ->join('tp_product p','p.id=b.p_id')
        ->field('b.*,p.name')
        ->paginate(8);
        $this->assign('banner',$banner);
        return $this->fetch('list');
    }
    public function banner()
    {
        $banner=db('banner')->select();
        $this->assign('banner',$banner);
        return $this->fetch();
    }
    public function add()
    {
        $product=db('product')->paginate(10);
        $this->assign('product',$product);
        return $this->fetch();
    }
    //Banner图编辑
    public function edit($id)
    {
        $product=db('product')->paginate(10);
        $this->assign('product',$product);

        $banner=Db::table('tp_banner')
        ->alias('b')
        ->join('tp_product p','p.id=b.p_id')
        ->field('b.*,p.name')
        ->find($id);
        $this->assign('banner',$banner);
        return $this->fetch();
    }
    //停用
    public function stop($id){
        db('banner')->where('id',$id)->update(['status'=>2]);
    }
    //启用
    public function start($id){
        db('banner')->where('id',$id)->update(['status'=>1]);
    }
}
