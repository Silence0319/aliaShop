<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

class All extends Controller
{
    //所有商品
    public function index()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //栏目分类查询
        $onelevel = db('cate')->where("level = 1")->order('scort ASC')->select();
        $twolevel = db('cate')->where("level = 2")->order('scort ASC')->select();
        $this->assign(array('onelevel' => $onelevel, 'twolevel' => $twolevel));

        $discussionNum = db('product')->count(); //数据总数
        $this->view->assign('discussionNum',$discussionNum);
        return $this->fetch('commodity');
    }
    public function son($id)
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //栏目分类查询
        $onelevel = db('cate')->where("level = 1")->order('scort ASC')->select();
        $twolevel = db('cate')->where("level = 2")->order('scort ASC')->select();
        $this->assign(array('onelevel' => $onelevel, 'twolevel' => $twolevel));
        //数据总数
        $discussionNum = db('product')->where('c_id',$id)->count(); 
        //栏目分类id
        $cid=$id;
        $this->view->assign([
            'discussionNum'=>$discussionNum,
            'cid'=>$cid
        ]);
        return $this->fetch();
    }
    //按销售量查询
    public function data(){
        $subject_chapter_no = $this->request->post('subject_chapter_no');
        $start = $this->request->post('start'); //当前页
        $size = $this->request->post('size'); //每页数据条数
        $discussionListPage = Db::table('tp_product')->order('saleNum','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //按价格查询
    public function dataPrice(){
        $subject_chapter_no = $this->request->post('subject_chapter_no');
        $start = $this->request->post('start'); //当前页
        $size = $this->request->post('size'); //每页数据条数
        $discussionListPage = Db::table('tp_product')->order('realPrice','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //按新品
    public function dataNewprod(){
        $subject_chapter_no = $this->request->post('subject_chapter_no');
        $start = $this->request->post('start'); //当前页
        $size = $this->request->post('size'); //每页数据条数
        $discussionListPage = Db::table('tp_product')->order('id','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //按收藏
    public function dataCollection(){
        $subject_chapter_no = $this->request->post('subject_chapter_no');
        $start = $this->request->post('start'); //当前页
        $size = $this->request->post('size'); //每页数据条数
        $discussionListPage = Db::table('tp_product')->order('collection','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //栏目分类--按销售量
    public function dataSon(){
        $subject_chapter_no = $this->request->post('subject_chapter_no');
        $start = $this->request->post('start'); //当前页
        $size = $this->request->post('size'); //每页数据条数
        $cid=$this->request->post('cid');
        $discussionListPage = Db::table('tp_product')->where('c_id',$cid)->order('saleNum','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }

    //栏目分类--按价格查询
    public function sonPrice($start,$size,$subject_chapter_no,$cid){
        $discussionListPage = Db::table('tp_product')->where('c_id',$cid)->order('realPrice','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //栏目分类--按新品
    public function sonNewprod($start,$size,$subject_chapter_no,$cid){
        $discussionListPage = Db::table('tp_product')->where('c_id',$cid)->order('id','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //栏目分类--按收藏
    public function sonCollection($start,$size,$subject_chapter_no,$cid){
        $discussionListPage = Db::table('tp_product')->where('c_id',$cid)->order('collection','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //搜索页面
    public function search($keyword)
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //数据总数
        $discussionNum = db('product')->where('name','like',"%".$keyword."%")->count(); 
        $this->view->assign([
            'discussionNum'=>$discussionNum,
            'keyword'=>$keyword
        ]);
        return $this->fetch();
    }
    //搜索数据
    public function searchdata($start,$size,$subject_chapter_no,$keyword){
        $discussionListPage = Db::table('tp_product')->where('name','like',"%".$keyword."%")->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //搜索数据--按价格
    public function searchPrice($start,$size,$subject_chapter_no,$keyword){
        $discussionListPage = Db::table('tp_product')->where('name','like',"%".$keyword."%")->order('realPrice','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //搜索数据--按销量
    public function searchVolume($start,$size,$subject_chapter_no,$keyword){
        $discussionListPage = Db::table('tp_product')->where('name','like',"%".$keyword."%")->order('saleNum','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //搜索数据--按新品
    public function searchNewprod($start,$size,$subject_chapter_no,$keyword){
        $discussionListPage = Db::table('tp_product')->where('name','like',"%".$keyword."%")->order('id','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //搜索数据--按收藏
    public function searchCollection($start,$size,$subject_chapter_no,$keyword){
        $discussionListPage = Db::table('tp_product')->where('name','like',"%".$keyword."%")->order('collection','desc')->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
}
