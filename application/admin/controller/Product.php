<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Product extends Base
{
    public function index()
    {
        //栏目分类
        $cate=db('cate')->where('level',1)->select();
        if(request()->ispost()){
            $start=input('start');
            $end=input('end');
            $c_id=input('c_id');
            //商品名
            $name=input('name');
            if($start!=NULL){
                $product=Db::table('tp_product')
                ->alias('p')
                ->join('tp_cate c','c.id=p.c_id')
                ->field('p.*,c.catename')
                ->where('p.putTime','between',[$start,$end])
                ->order('p.id','desc')
                ->paginate(4);
            }else{
                if($c_id!=NULL){
                    //如果日期为空,搜索一级栏目
                    $product=Db::table('tp_product')
                    ->alias('p')
                    ->join('tp_cate c','c.id=p.c_id')
                    ->join('tp_cate s','c.tid=s.id')
                    ->where('s.id',$c_id)
                    ->field('p.*,c.catename')
                    ->order('p.id','desc')
                    ->paginate(4);
                }else{
                    if($name!=NULL){
                        $product=Db::table('tp_product')
                        ->alias('p')
                        ->join('tp_cate c','c.id=p.c_id')
                        ->field('p.*,c.catename')
                        ->where('p.name','like',"%".$name."%")
                        ->order('p.id','desc')
                        ->paginate(4);
                    }
                }
            }
        }else{
            $product=Db::table('tp_product')
            ->alias('p')
            ->join('tp_cate c','c.id=p.c_id')
            ->field('p.*,c.catename')
            ->order('p.id','desc')
            ->paginate(4);
        }
        $this->assign([
            'product'=>$product,
            'cate'=>$cate
            ]);
        return $this->fetch('list');
    }
    public function add()
    {
        $onelevel=db('cate')->where('level',1)->select();
        $this->assign('onelevel',$onelevel);
        return $this->fetch();
    }
    public function edit($id)
    {
        $product=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->field('p.*,c.catename')
        ->find($id);
        //分类，二级联动
        $onelevel=db('cate')->where('level',1)->select();
        //二级分类查询
        $twoCate=db('cate')->find($product['c_id']);
        //一级分类查询
        $cate=db('cate')->find($twoCate['tid']);
        $this->assign([
            'product'=>$product,
            'onelevel'=>$onelevel,
            'cate'=>$cate
        ]);
        return $this->fetch();
    }
    //今日团购
    public function today()
    {
        //栏目分类
        $cate=db('cate')->where('level',1)->select();
        $today=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->field('p.*,c.catename')
        ->where('type',1)
        ->order('id','desc')
        ->paginate(4);
        $this->assign([
            'today'=>$today,
            'cate'=>$cate
        ]);
        return $this->fetch();
    }
    //明日预告
    public function tomorrow()
    {
        //栏目分类
        $cate=db('cate')->where('level',1)->select();
        $tomorrow=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->field('p.*,c.catename')
        ->where('type',2)
        ->order('id','desc')
        ->paginate(4);
        $this->assign([
            'tomorrow'=>$tomorrow,
            'cate'=>$cate
        ]);
        return $this->fetch();
    }
    //产品停用
    public function stop($id){
        db('product')->where('id',$id)->update(['status'=>0]);
    }
    //产品启用
    public function start($id){
        db('product')->where('id',$id)->update(['status'=>1]);
    }
}
