<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

class Info extends Controller
{
    public function index()
    {
        $uid=session('uid');
        if($uid){
            //购物车数量
            $carNum=db('car')->where('u_id',$uid)->count();
            $this->assign('carNum',$carNum);
            //会员信息
            $user=db('user')->find($uid);
            $this->assign('user',$user);
            return $this->fetch();
        }else{
            $this->error('请先登录','login/index');
        }
        
    }    
    //购物车
    public function shopcart()
    {
        $uid=session('uid');
        if($uid){
            //购物车数量
            $carNum=db('car')->where('u_id',$uid)->count();
            $this->assign('carNum',$carNum);
            //购物车商品
            $car=Db::table('tp_car')
            ->alias('c')
            ->join('tp_user u','u.id=c.u_id')
            ->join('tp_product p','p.id=c.p_id')
            ->where('u.id',$uid)
            ->field('c.*,p.name,p.pic,p.realPrice,p.id as pid')
            ->order('inTime','desc')
            ->select();
            $this->assign('car',$car);
            return $this->fetch();
        }else{
            $this->error('请先登录','login/index');
        }
        
    }
    //个人中心--订单查看
    public function order()
    {
        $uid=session('uid');
        if($uid){
            //购物车数量
            $carNum=db('car')->where('u_id',$uid)->count();
            $this->assign('carNum',$carNum);
            //未付订单
            $nopay=db('order')->where(['u_id'=>$uid,'status'=>0])->paginate(3);
            //未付订单商品
            $nopayShop=db('booking')->select();
            //历史订单
            $pay=db('order')->where(['u_id'=>$uid])->where('status','<>','0')->paginate(3);
            $shop=db('booking')->select();
            $this->assign([
                'nopay'=>$nopay,
                'nopayShop'=>$nopayShop,
                'pay'=>$pay,
                'shop'=>$shop
            ]);
            return $this->fetch();
        }else{
            $this->error('请先登录','login/index');
        }
        
    }
    //我的收藏
    public function collect()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //收藏信息
        $collect=Db::table('tp_collect')
        ->alias('c')
        ->join('tp_product p','p.id=c.p_id')
        ->where(['c.u_id'=>$uid,'c.status'=>1])
        ->field('p.*,c.id as cid')
        ->select();
        $this->assign('collect',$collect);
        return $this->fetch();
    }
    //收货地址
    public function address()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //收货地址列表
        $address=db('address')->where('u_id',$uid)->select();
        $adNum=db('address')->where('u_id',$uid)->count();
        //剩余保存地址数
        $num=15-$adNum;
        $this->assign([
            'address'=>$address,
            'adNum'=>$adNum,
            'num'=>$num
        ]);
        return $this->fetch();
    }
    //密码修改
    public function password()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        return $this->fetch();
    }
    
    //下单列表
    public function orderlist($id)
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        if(!$id)
        {
            //查询订单信息
            $order=db('order')->where('u_id',$uid)->select();
            //查询订单商品信息
            $booking=db('booking')->select();
            $this->assign([
                'order'=>$order,
                'booking'=>$booking
            ]);
        
        }else{
            //查询订单信息
            $order=db('order')->where(['u_id'=>$uid,'id'=>$id])->select();
            //查询订单商品信息
            $booking=db('booking')->select();
            $this->assign([
                'order'=>$order,
                'booking'=>$booking,
                'id'=>$id
            ]);
        }
        
        return $this->fetch();
    }
    //订单列表查看
    public function ordershow()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //查询订单信息
            $order=db('order')->where('u_id',$uid)->select();
            //查询订单商品信息
            $booking=db('booking')->select();
            $this->assign([
                'order'=>$order,
                'booking'=>$booking
            ]);
        return $this->fetch();
    }
    //地址数据查询
    public function addupdate($id)
    {
        $info=db('address')->find($id);
        $this->assign('info',$info);
        return $this->fetch();
    }
}
