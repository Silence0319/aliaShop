<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

class News extends Controller
{
    //零食资讯
    public function index()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //栏目
        $cate=db('cate')->where('level',2)->select();
        //资讯
        $news=db('news')->order('id','desc')->paginate(20);
        $this->assign([
            'cate'=>$cate,
            'news'=>$news
        ]);
        return $this->fetch('information');
    }
    
    //资讯筛选
    public function news($id)
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //栏目
        $cate=db('cate')->where('level',2)->select();
        //资讯
        $news=db('news')->where('c_id',$id)->order('id','desc')->paginate(20);
        $this->assign([
            'cate'=>$cate,
            'news'=>$news
        ]);
        return $this->fetch('information');
    }
    public function newsinfo($id)
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //栏目
        $cate=db('cate')->where('level',2)->select();
        //资讯
        $news=Db::table('tp_news')
        ->alias('n')
        ->join('tp_cate c','c.id=n.c_id')
        ->field('n.*,c.catename')
        ->find($id);
        $this->assign([
            'cate'=>$cate,
            'news'=>$news
        ]);
        return $this->fetch();
    }
   
}
