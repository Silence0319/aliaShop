<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Del extends Base
{
    //栏目删除
    public function cate($id)
    {
        db('cate')->delete($id);
    }
    //会员删除
    public function user($id)
    {
        db('user')->delete($id);
    }
    //管理员删除
    public function admin($id)
    {
        db('admin')->delete($id);
    }
    //banner删除
    public function banner($id)
    {
        db('banner')->delete($id);
    }
    //资讯删除
    public function news($id)
    {
        db('news')->delete($id);
    }
    //商品删除
    public function product($id)
    {
        db('product')->delete($id);
    }
    //移除今日团购,type=>0为正常销售商品,type=>1为今日团购,type=>2为明日预售
    public function todaybuy($id)
    {
        db('product')->where('id',$id)->update(['type'=>0]);
    }
    //移除明日预售
    public function tomorrow($id)
    {
        db('product')->where('id',$id)->update(['type'=>0]);
    }
    //删除订单
    public function order($id)
    {
        db('booking')->where('o_id',$id)->delete();
        $res=db('order')->delete($id);
    }
}
