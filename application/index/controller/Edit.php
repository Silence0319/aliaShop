<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;
class Edit extends Controller
{
    //个人信息编辑
    public function info()
    {
        $status=0;
        $uid=session('uid');
        if(request()->isAjax()){
            $data=$this->request->param();
            
            $res=db('user')->where('id',$uid)->update($data);
            if(!$res){
                $message='编辑失败！';
            }else{
                $status=1;
                $message='编辑成功！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //收货地址编辑
    public function address()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            
            $res=db('address')->update($data);
            if(!$res){
                $message='修改失败！';
            }else{
                $status=1;
                $message='修改成功！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //修改密码
    public function password()
    {
        $uid=session('uid');
        $status=0;
        if(request()->isAjax())
        {
            $data=$this->request->param();
            $pass=db('user')->find($uid);
            if(md5($data['oldpass'])==$pass['password']){
                $res=db('user')->where('id',$uid)->update(['password'=>md5($data['newpass'])]);
                if(!$res){
                    $message='密码重复！';
                }else{
                    $status=1;
                    $message='密码修改成功！';
                }  
            }else{
                $status=2;
                $message='旧密码错误';
            }       
        }
        return ['status'=>$status,'message'=>$message];
    }
    
}
