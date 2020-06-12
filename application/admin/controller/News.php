<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Db;

class News extends Base
{
    public function index()
    {
        if(request()->ispost())
        {
            $start=input('start');
            $end=input('end');
            $title=input('title');
            if($start!=NULL)
            {
                $news=Db::table('tp_news')
                ->alias('n')
                ->join('tp_cate c','c.id=n.c_id')
                ->field('n.*,c.catename')
                ->where('n.putTime','between',[$start,$end])
                ->paginate(10);
            }else{
                $news=Db::table('tp_news')
                ->alias('n')
                ->join('tp_cate c','c.id=n.c_id')
                ->field('n.*,c.catename')
                ->where('n.title','like',"%".$title."%")
                ->paginate(10);                
            }
        }else{
            $news=Db::table('tp_news')
            ->alias('n')
            ->join('tp_cate c','c.id=n.c_id')
            ->field('n.*,c.catename')
            ->paginate(10);
        }
    	$this->assign('news',$news);
        return $this->fetch('list');
    }
    public function add()
    {
        //二级联动，一级分类查询
        $onelevel=db('cate')->where('level',1)->select();
        $this->assign('onelevel',$onelevel);
        return $this->fetch();
    } 

    public function edit($id)
    {
        //分类
        $onelevel=db('cate')->where('level',1)->select();
        //资讯查询
        $news=Db::table('tp_news')
        ->alias('n')
        ->join('tp_cate c','c.id=n.c_id')
        ->field('n.*,c.catename')
        ->find($id);
        //二级分类查询
        $twoCate=db('cate')->find($news['c_id']);
        //一级分类查询
        $cate=db('cate')->find($twoCate['tid']);
        $this->assign([
            'onelevel'=>$onelevel,
            'news'=>$news,
            'cate'=>$cate
        ]);
        return $this->fetch();
    }
    
}
