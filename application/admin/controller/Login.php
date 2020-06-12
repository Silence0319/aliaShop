<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
     //登录功能
    public function check($username,$password)
    {
        $status=0;
        if(request()->isAjax())
        {
            $map=['username'=>$username];
            $admin=db('admin')->where($map)->find();
            if($admin){
                if(md5($password)==$admin['password']){
                    if($admin['status']==0){
                        $status=0;
                        $message='此账号已被禁用';
                    }else{
                       $status=1;
                        $message='登录成功！';
                        Session::set('aid',$admin['id']);
                        Session::set('admin_info',$admin); 
                    }
                }else{
                    $message='用户名或密码错误！';
                }
            }else{
                $message='用户名或密码错误！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //注销
    public function logout()
    {
        $status=0;
        $message="注销失败！";
        if(request()->isAjax())
        {
            session('aid',NULL);
            session('admin_info',NULL);
            $status=1;
            $message="注销成功！";
        }
        return ['status'=>$status,'message'=>$message];
    }
    
}
