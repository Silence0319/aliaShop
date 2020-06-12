<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Edit extends Base
{
    //一级栏目修改
    public function onelevel()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            $cate=[
                'catename'=>$data['catename'],
                'scort'=>$data['scort'],
                'tid'=>0,
                'level'=>1
            ];
            $res=db('cate')->where('id',$data['id'])->update($cate);
            if(!$res){
                $message='修改失败！';
            }else{
                $status=1;
                $message='修改成功！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //二级栏目修改
    public function twolevel()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            $cate=[
                'catename'=>$data['catename'],
                'scort'=>$data['scort'],
            ];
            $res=db('cate')->where('id',$data['id'])->update($cate);
            if(!$res){
                $message='修改失败！';
            }else{
                $status=1;
                $message='修改成功！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //会员信息修改
    public function user()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            $user=[
                'name'=>$data['name'],
                'trueName'=>$data['trueName'],
                'sex'=>$data['sex'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'province'=>$data['province'],
                'city'=>$data['city'],
                'area'=>$data['area'],
                'address'=>$data['address'],
            ];
            $edit=db('user')->where('id',$data['id'])->update($user);
            if(!$edit){
                $message='修改失败！';
            }else{
                $status=1;
                $message='修改成功！';
            }
        }   
        return ['status'=>$status,'message'=>$message];
    }
    //会员密码修改
    public function passCheck()
    {
        $status=0;
        if(request()->isAjax())
        {
            $data=$this->request->param();
            $res=db('user')->where('id',$data['id'])->update(['password'=>md5($data['newpass'])]);
            if(!$res){
                $message='密码重复！';
            }else{
                $status=1;
                $message='密码修改成功！';
            }           
        }
        return ['status'=>$status,'message'=>$message];
    }
    //管理员编辑
    public function admin()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            
            $admin=[
                'name'=>$data['name'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'IDnumber'=>$data['IDnumber'],
            ];
            $add=db('admin')->where('id',$data['id'])->update($admin);
            if(!$add){
                $message='修改失败！';
            }else{
                $status=1;
                $message='修改成功！';
            }
        }   
        return ['status'=>$status,'message'=>$message];
    }
    //管理员密码修改
    public function passAdmin()
    {
        $status=0;
        if(request()->isAjax())
        {
            $data=$this->request->param();
            $res=db('admin')->where('id',$data['id'])->update(['password'=>md5($data['newpass'])]);
            if(!$res){
                $message='密码重复！';
            }else{
                $status=1;
                $message='密码修改成功！';
            }           
        }
        return ['status'=>$status,'message'=>$message];
    }
    //登录管理员密码修改
    public function password()
    {
        $aid=session('aid');
        $status=0;
        if(request()->isAjax())
        {
            $data=$this->request->param();
            $pass=db('admin')->find($aid);
            if(md5($data['oldpass'])==$pass['password']){
                $res=db('admin')->where('id',$aid)->update(['password'=>md5($data['newpass'])]);
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
    //轮播图链接商品添加
    public function bannerLink($id,$imgSrc,$p_id)
    {
        $status=0;
        $data=[
            'p_id'=>$p_id,
            'pic'=>$imgSrc,
            'inTime'=>date('Y-m-d H:i:s',time()),
            'status'=>1
        ];
        $res=db('banner')->where('id',$id)->update($data);
        if($res){
            $status=1;
            $message='修改成功！';
        }else{
            $message='修改失败！';
        }
        return ['status'=>$status,'message'=>$message];
    }
    //轮播图替换
    public function upload()
    {
        $file = request()->file('file');
     // 移动到框架应用根目录/public/uploads/ 目录下
     if($file){
         $info = $file->move('./uploads');
         if($info){
            $result=[
                'code'=>1,
                'msg'=>'上传成功',
                'filename'=>'/uploads/'.str_replace('\\', '/', $info->getSaveName())
            ];
            return json_encode($result);
         }else{
            return false;
         }
     }else{
        return false;
     }  
    }
    //资讯编辑
    public function news()
    {
        $status=0;
        if(request()->isAjax())
        {
            $data=$this->request->param();
            $news=[
                'title'=>$data['title'],
                'c_id'=>$data['twolevel'],
                'url'=>$data['url'],
                'source'=>$data['source'],
                'content'=>$data['content']
            ];
            $res=db('news')->where('id',$data['id'])->update($news);
            if($res){
                $status=1;
                $message='修改成功！';
            }else{
                $message='修改失败！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //商品编辑
    public function product()
    {
        $status=0;
        if(request()->isAjax()){
            //$data=$this->request->param();
            $data=request()->put();
            $info=[
                'name'=>$data['name'],
                'c_id'=>$data['twolevel'],
                'num'=>$data['num'],
                'price'=>$data['price'],
                'realPrice'=>$data['realPrice'],
                'status'=>$data['status'],
                'pic'=>$data['pic'],
                'details'=>$data['details']
            ];
            $res=db('product')->where('id',$data['id'])->update($info);
            if($res){
                $status=1;
                $message='修改成功！';
            }else{
                $message='修改失败！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //商品图编辑
    public function picture()
    {
        $file = request()->file('file');
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move('./uploads');
            if($info){
                $result=[
                    'code'=>1,
                    'msg'=>'上传成功',
                    'filename'=>'/uploads/'.str_replace('\\', '/', $info->getSaveName())
                ];
                return json_encode($result);
                }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
