<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class System extends Base
{
    public function index()
    {
    	return $this->fetch();
    }
    public function info()
    {
        $aid=session('aid');
        $admin=db('admin')->find($aid);
        $this->assign('admin',$admin);
        return $this->fetch();
    }
    public function log()
    {
        return $this->fetch();
    } 
    public function password()
    {
        return $this->fetch();
    } 
    
}
