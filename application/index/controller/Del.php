<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
class Del extends Controller
{
    public function car($id)
    {
        $res=db('car')->delete($id);
        if($res){
            $status=1;
            $message='删除成功';
        }else{
            $status=0;
            $message='删除失败';
        }
    	return ['status'=>$status,'message'=>$message];
    }

    public function carAll($id)
    {
        $res=db('car')->delete($id);
        if($res){
            $status=1;
            $message='删除成功';
        }else{
            $status=0;
            $message='删除失败';
        }
        return ['status'=>$status,'message'=>$message];
    }
    //删除订单
    public function order($id)
    {
        db('booking')->where('o_id',$id)->delete();
        $res=db('order')->delete($id);
        if($res){
            $status=1;
            $message='删除成功';
        }else{
            $status=0;
            $message='删除失败';
        }
        return ['status'=>$status,'message'=>$message];
    }
    //取消订单
    //订单状态  0是未付款 1是已付款，待发货 2是已选择收货地址  3是取消订单 4是完成交易
    public function cancelOrder($id)
    {
        $res=db('order')->where('id',$id)->update(['status'=>3]);
        if($res){
            $status=1;
            $message='取消订单成功';
        }
        return ['status'=>$status,'message'=>$message];
    }
    //取消收藏
    public function cancelCollect($id)
    {
        db('collect')->where('id',$id)->update(['status'=>0]);
    }
    //删除收货地址
    public function address($id)
    {
        db('address')->delete($id);
    }
}
