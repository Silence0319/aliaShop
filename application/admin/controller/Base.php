<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Base extends Controller
{
//简单的权限认证，判断session
    public function _initialize(){
        if(!session('admin_info')){
            $this->error('请先登录系统！','Login/index');
        }
    }
}