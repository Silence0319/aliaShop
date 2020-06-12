<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Order extends Base
{
    public function index()
    {
        if(request()->ispost())
        {
            $start=input('start');
            $end=input('end');
            $status=input('status');
            $number=input('number');
            if($start!=NULL){
                    
                    $order=Db::table('tp_order')
                        ->alias('o')
                        ->join('tp_user u','u.id=o.u_id')
                        ->join('tp_address a','a.id=o.add_id')
                        ->field('o.*,u.name,a.name as aname,a.phone as aphone,a.code,a.province,a.city,a.area,a.address')
                        ->where('o.orderTime','between',[$start,$end])
                        ->order('o.orderTime','desc')
                        ->paginate(5);
            }else{
                //如果日期为空
                if($status!=NULL){
                    $order=Db::table('tp_order')
                        ->alias('o')
                        ->join('tp_user u','u.id=o.u_id')
                        ->join('tp_address a','a.id=o.add_id')
                        ->field('o.*,u.name,a.name as aname,a.phone as aphone,a.code,a.province,a.city,a.area,a.address')
                        ->where('o.status',$status)
                        ->order('o.orderTime','desc')
                        ->paginate(5);
                }else{
                    //如果状态为空
                    if($number!=NULL){
                       $order=Db::table('tp_order')
                        ->alias('o')
                        ->join('tp_user u','u.id=o.u_id')
                        ->join('tp_address a','a.id=o.add_id')
                        ->field('o.*,u.name,a.name as aname,a.phone as aphone,a.code,a.province,a.city,a.area,a.address')
                        ->where('o.number',$number)
                        ->order('o.orderTime','desc')
                        ->paginate(5); 
                    }
                }
            }
        }else{
            $order=Db::table('tp_order')
                ->alias('o')
                ->join('tp_user u','u.id=o.u_id')
                ->join('tp_address a','a.id=o.add_id')
                ->field('o.*,u.name,a.name as aname,a.phone as aphone,a.code,a.province,a.city,a.area,a.address')
                ->order('o.orderTime','desc')
                ->paginate(5);
        }
        $this->assign('order',$order);
    	return $this->fetch('list');
    }
    public function view($id)
    {
        $product=db('booking')->where('o_id',$id)->select();
        $this->assign('product',$product);
        return $this->fetch();
    }
    
}
