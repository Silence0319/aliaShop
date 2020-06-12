<?php
namespace app\admin\controller;
use app\admin\model\UserModel;
use app\admin\controller\Base;
use think\Db;
use think\Request;

class User extends Base
{
    //会员列表页面
    public function index()
    {
    	//会员查询
        if(request()->ispost())
        {
            $name=input('name');
            $user=db('user')->where('name','like',"%".$name."%")->order('id','desc')->paginate(5);
        }else{
            $user=db('user')->order('id','desc')->paginate(5);
        }
        $this->assign('user',$user);
        return $this->fetch('list');
    }
    //渲染添加页面
    public function add()
    {
        return $this->fetch();
    }
    
    //会员停用
    public function stop($id){
        db('user')->where('id',$id)->update(['status'=>2]);
    }
    //会员启用
    public function start($id){
        db('user')->where('id',$id)->update(['status'=>1]);
    }
    
    //会员编辑页面
    public function edit($id)
    {
        $user=db('user')->find($id);
        $this->assign('user',$user);
        return $this->fetch();
    }
    
    //会员密码修改页面
    public function password($id)
    {
        $user=db('user')->find($id);
        $this->assign('user',$user);
        return $this->fetch();
    }
    

}