<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Admin extends Base
{
    public function index()
    {
        if(request()->ispost())
        {
            $name=input('name');
            $admin=db('admin')->where('status','<>',2)->where('name',"%".$name."%")->order('id','desc')->paginate(6);
        }else{
            //管理员列表篇
            $admin=db('admin')->where('status','<>',2)->paginate(6);
        }
        $this->assign('admin',$admin);
        return $this->fetch('list');
    }
    public function add()
    {
        return $this->fetch();
    }
    //管理员编辑页面
    public function edit($id)
    {
        $admin=db('admin')->find($id);
        $this->assign('admin',$admin);
        return $this->fetch();
    }
    //管理员停用
    public function stop($id){
        db('admin')->where('id',$id)->update(['status'=>0]);
    }
    //管理员启用
    public function start($id){
        db('admin')->where('id',$id)->update(['status'=>1]);
    }
    public function role()
    {
        return $this->fetch();
    }
    //会员密码修改页面
    public function password($id)
    {
        $admin=db('admin')->find($id);
        $this->assign('admin',$admin);
        return $this->fetch();
    }
}
