<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }
    public function main()
    {
        $adminInfo=session('admin_info');
        //用户统计
        $userNum=db('user')->count();
        //print_r($user);exit();
        //商品统计
        $productNum=db('product')->count('name');
        //浏览统计
        $productClick=db('product')->sum('click');
        //订单统计
        $orderNum=db('order')->count();
        //管理员列表篇
        $admin=db('admin')->where('status',1)->paginate(6);
        $this->assign([
            'adminInfo'=>$adminInfo,
            'userNum'=>$userNum,
            'productNum'=>$productNum,
            'productClick'=>$productClick,
            'orderNum'=>$orderNum,
            'admin'=>$admin
            ]);

        return $this->fetch();
    }
    
    
}
