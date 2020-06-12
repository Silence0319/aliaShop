<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class Add extends Base
{
    //一级栏目添加
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
            $res=db('cate')->insert($cate);
            if(!$res){
                $message='添加失败！';
            }else{
                $status=1;
                $message='添加成功！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //二级栏目添加
    public function twolevel()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            $cate=[
                'catename'=>$data['catename'],
                'scort'=>$data['scort'],
                'tid'=>$data['tid'],
                'level'=>2
            ];
            $res=db('cate')->insert($cate);
            if(!$res){
                $message='添加失败！';
            }else{
                $status=1;
                $message='添加成功！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //用Ajax添加会员
    public function userAdd()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            
            $user=[
                'name'=>$data['name'],
                'trueName'=>$data['trueName'],
                'password'=>md5($data['password']),
                'sex'=>$data['sex'],
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'inTime'=>time(),
                'province'=>$data['province'],
                'city'=>$data['city'],
                'area'=>$data['area'],
                'address'=>$data['address'],
                'status'=>$data['status']
            ];
            $add=db('user')->insert($user);
            if(!$add){
                $message='添加失败！';
            }else{
                $status=1;
                $message='添加成功！';
            }
        }   
        return ['status'=>$status,'message'=>$message];
    }
    //管理员添加
    public function admin()
    {
        $status=0;
        if(request()->isAjax()){
            $data=$this->request->param();
            
            $admin=[
                'name'=>$data['name'],
                'username'=>$data['username'],
                'password'=>md5($data['password']),
                'phone'=>$data['phone'],
                'email'=>$data['email'],
                'inTime'=>date('Y-m-d H:i:s',time()),
                'IDnumber'=>$data['IDnumber'],
                'status'=>1
            ];
            $add=db('admin')->insert($admin);
            if(!$add){
                $message='添加失败！';
            }else{
                $status=1;
                $message='添加成功！';
            }
        }   
        return ['status'=>$status,'message'=>$message];
    }
    //轮播图添加
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
    //轮播图链接商品添加
    public function bannerLink($imgSrc,$p_id)
    {
        $data=[
            'p_id'=>$p_id,
            'pic'=>$imgSrc,
            'inTime'=>date('Y-m-d H:i:s',time()),
            'status'=>1
        ];
        $res=db('banner')->insert($data);
        if($res){
            $status=1;
            $message='添加成功！';
        }else{
            $status=0;
            $message='添加失败！';
        }
        return ['status'=>$status,'message'=>$message];
    }
    //资讯添加
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
                'putTime'=>date('Y-m-d H:i:s',time()),
                'source'=>$data['source'],
                'content'=>$data['content']
            ];
            $res=db('news')->insert($news);
            if($res){
                $status=1;
                $message='添加成功！';
            }else{
                $message='添加失败！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //商品添加
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
                'putTime'=>date('Y-m-d H:i:s',time()),
                'status'=>$data['status'],
                'pic'=>$data['pic'],
                'details'=>$data['details']
            ];
            $res=db('product')->insert($info);
            if($res){
                $status=1;
                $message='添加成功！';
            }else{
                $message='添加失败！';
            }
        }
        return ['status'=>$status,'message'=>$message];
    }
    //商品图添加
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
    //加入今日团购,type=>0为正常销售商品,type=>1为今日团购,type=>2为明日预售
    public function todaybuy($id)
    {
        db('product')->where('id',$id)->update(['type'=>1]);
    }
    //明日预售
    public function tomorrow($id)
    {
        db('product')->where('id',$id)->update(['type'=>2]);
    }
}
