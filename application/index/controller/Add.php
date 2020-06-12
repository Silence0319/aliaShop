<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
class Add extends Controller
{
    //收货地址添加
    public function address()
    {
        $uid=session('uid');
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            $address=[
                'u_id'=>$uid,
                'name'=>$data['name'],
                'phone'=>$data['phone'],
                'code'=>$data['code'],
                'province'=>$data['province'],
                'city'=>$data['city'],
                'area'=>$data['area'],
                'address'=>$data['address'],
                'status'=>2,
            ];
            $res=db('address')->insert($address);
            if(!$res){
                $message='添加失败！';
            }else{
                $status=1;
                $message='添加成功！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    
    //加购物车
    public function car($pid,$goodNum)
    {
        $status=0;
        $uid=session('uid');
        //商品查询
         $pro=db('product')->find($pid);
         if($uid){
            if(request()->isAjax())
            {
                 //判断商品是否存在
                 $map=[
                     'p_id'=>$pid,
                     'u_id'=>$uid
                 ];
                 $result=db('car')->where($map)->find();
                 if(!$result){
                     $data=[
                         'p_id'=>$pid,
                         'u_id'=>$uid,
                         'num'=>$goodNum,
                         'inTime'=>date('Y-m-d H:i:s',time()),
                         'sumPrice'=>$pro['realPrice']*$goodNum
                     ];
                     $res=db('car')->insert($data);
                     if($res){
                         //查询购物车数量
                         $carNum=db('car')->where('u_id',$uid)->count();
                         $status=1;
                         $message='添加购物车成功！';
                     }else{
                         $message='添加失败！';
                     }
                }else{
                    $cid=$result['id'];
                    $res=db('car')->where('id',$cid)->setInc('num',$goodNum);
                    //查询需要更新的那一条数据
                    $new=db('car')->find($cid);
                    //更新价格
                    db('car')->where('id',$cid)->update(['sumPrice'=>$new['num']*$pro['realPrice']]);
                    //查询购物车数量
                    $carNum=db('car')->where('u_id',$uid)->count();
                    if($res){$status=1;$message='添加成功';}
                 } 
            }
         }else{
             $message='请先登录';
         }
        
        $carNum=1;
        return ['status'=>$status,'message'=>$message,'carNum'=>$carNum];
    }
    //加入收藏
    public function collect($pid)
    {
        $status=0;
        $uid=session('uid');
        if($uid){
            //检查是否被收藏
            $info=[
                'p_id'=>$pid,
                'u_id'=>$uid
            ];
            $result=db('collect')->where($info)->find();
            if($result){
                if($result['status']==0){
                    $res=db('collect')->where('id',$result['id'])->update(['status'=>1]);
                    //商品添加收藏次数
                    db('product')->where('id',$pid)->setInc('collection',1);
                    if($res){
                        $status=1;
                        $message='已收藏！';
                    }
                }else if($result['status']==1){
                    $res=db('collect')->where('id',$result['id'])->update(['status'=>0]);
                    //商品减少收藏次数
                    db('product')->where('id',$pid)->setDec('collection',1);
                    if($res){
                        $status=2;
                        $message='已取消收藏！';
                    }
                }
            }else{
                $data=[
                    'p_id'=>$pid,
                    'u_id'=>$uid,
                    'status'=>1
                ];
                $res=db('collect')->insert($data);
                //商品添加收藏次数
                    db('product')->where('id',$pid)->setInc('collection',1);
                if($res){
                    $status=1;
                    $message='已收藏！';
                }else{
                    $message='收藏失败';
                }
            }
            
        }else{
            $message='请先登录';
        }
        return ['status'=>$status,'message'=>$message];
    }
    //立即购买
    public function buyNow($pid,$goodNum)
    {
        $uid=session('uid');
        $status=0;
        $oid=0;
        $message='';
        //查询商品信息
        $pro=db('product')->find($pid);
        if($uid){
            if(request()->isAjax())
        {
            //订单表信息
            $order=[
                'u_id'=>$uid,
                'number'=>time(),
                'sumMoney'=>$goodNum*$pro['realPrice'],
                'orderTime'=>date('Y-m-d H:i:s',time()),
                'status'=>0
            ];
            //插入订单信息
            db('order')->insert($order);
            //查询最新订单表信息
            $newOrder=db('order')->limit(1)->order('id','desc')->find();
            //订单商品表信息
            $booking=[
                'p_id'=>$pid,
                'o_id'=>$newOrder['id'],
                'b_price'=>$goodNum*$pro['realPrice'],
                'num'=>$goodNum,
                'pic'=>$pro['pic'],
                'pname'=>$pro['name'],
                'realPrice'=>$pro['realPrice'],
                'status'=>0
            ];
            //插入订单商品表
            $res=db('booking')->insert($booking);
            if($res){
                $status=1;
                $oid=$newOrder['id'];
            }
        }
        }else{
            $status=2;
            $message='请先登录';
        }
        
        return ['status'=>$status,'oid'=>$oid,'message'=>$message];
    }
    //提交购物车订单
    //订单状态  0是未付款 1是已付款，待发货 2是已选择收货地址  3是取消订单 4是完成交易
    public function orders($cids)
    {
        $uid=session('uid');
        $status=0;
        $oid=0;
        if(request()->isAjax())
        {
            //先创建总订单表
            $info=[
                'u_id'=>$uid,
                'number'=>time(),
                'orderTime'=>date('Y-m-d H:i:s',time()),
                'status'=>0
            ];
            //插入
            db('order')->insert($info);
            //查询订单表信息
            $newOrder=db('order')->limit(1)->order('id','desc')->find();
            $num=count($cids); 
            for($i=0;$i<$num;$i++)
            {
                $car=db('car')->find($cids[$i]);
                //商品信息查询
                $pro=db('product')->find($car['p_id']);
                $booking=[
                    'p_id'=>$cids[$i],
                    'o_id'=>$newOrder['id'],
                    'b_price'=>$car['sumPrice'],
                    'num'=>$car['num'],
                    'pic'=>$pro['pic'],
                    'pname'=>$pro['name'],
                    'realPrice'=>$pro['realPrice'],
                    'status'=>0
                ];
                //插入订单商品表
                db('booking')->insert($booking);
                //删除购物车
                db('car')->delete($cids[$i]);
            }
            $sumPrice=db('booking')->where(['o_id'=>$newOrder['id']])->sum('b_price');
            //更新订单总价
            $res=db('order')->where('id',$newOrder['id'])->update(['sumMoney'=>$sumPrice]);
            //订单id
            $oid=$newOrder['id'];
            if($res){
                $status=1;
                $message="加入订单成功";
            }
        }
        return ['status'=>$status,'message'=>$message,'oid'=>$oid];
    }
    //给订单添加收货地址
    ////订单状态  0是未付款 1是已付款，待发货 2是已选择收货地址  3是取消订单 5是完成交易
    public function addPay($o_id,$add_id)
    {
        db('order')->where('id',$o_id)->update(['add_id'=>$add_id,'status'=>2]);
        return ['status'=>1];
    }
    //完成付款
    public function finishPay($o_id)
    {
        db('order')->where('id',$o_id)->update(['status'=>1]);

        return ['status'=>1];
    }
    //确认收货
    public function confirmOrder($id)
    {
        db('order')->where('id',$id)->update(['status'=>5]);
    }
    // public function test($o_id)
    // {
    //     //销售量+1
    //     $booking=db('booking')->where('o_id',$o_id)->field('p_id')->select();
    //     print_r($booking);
        
    // }
    
}
