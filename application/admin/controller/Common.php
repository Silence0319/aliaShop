<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Common extends Base
{
    public function level($id)
    {
        $data=db('cate')->where('tid',$id)->select();
        return json_encode($data);
    }
    
}
