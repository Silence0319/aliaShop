<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
class Login extends Controller
{
    public function index()
    {
        return $this->fetch('login');
    }
    //注册
    public function register()
    {
    	return $this->fetch();
    }
    //登录功能
    public function check()
    {
        $status=0;
        if(request()->isAjax())
        {
            $data=$this->request->param();
            $phone=$data['phone'];
            $password=$data['password'];
            $map=['phone'=>$phone];
            $user=db('user')->where($map)->find();
            if($user){
                if(md5($password)==$user['password']){
                    if($user['status']==2){
                        $status=0;
                        $message='此账号已被禁用';
                    }else{
                        $status=1;
                        $message='登录成功！';
                        Session::set('uid',$user['id']);
                        Session::set('user_info',$user);
                    }
                }else{
                    $message='手机号或密码错误！';
                }
            }else{
                $message='手机号或密码错误！';
            }
            //$uid=session('uid');
        }
        return ['status'=>$status,'message'=>$message];
    }
    //注册功能
    public function reg()
    {
        $status=0;
        if(request()->isAjax())
        {
            $data=$this->request->param();
            $phone=$data['phone'];
            $search=db('user')->where('phone',$phone)->select();
            if(!$search){
                $user=[
                'name'=>$data['name'],
                'phone'=>$data['phone'],
                'password'=>md5($data['password']),
                'inTime'=>date('Y-m-d H:i:s',time()),
                'sex'=>1,
                'status'=>1
                ];
                $res=db('user')->insert($user);
                if(!$res){
                    $message='注册失败！';
                }else{
                    $status=1;
                    $message='注册成功';
                }
            }else{
                $message='此手机号已被注册，请更换手机号！';
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
            //Session::delete('uid','user_info');
            session('uid',NULL);
            session('user_info',NULL);
            $status=1;
            $message="注销成功！";
        }
        return ['status'=>$status,'message'=>$message];
    }
}
