<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //轮播图展示
        $banner=db('banner')->select();
        
        //今日必抢
        $today1=db('product')->where('type',1)->order('id','desc')->paginate(4);
        $today2=db('product')->where('type',1)->order('id','asc')->paginate(4);
        //促销大卖
        $tui=db('product')->where('type',1)->order('click','desc')->paginate(10);
        //饼干糕点
        $bggd=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->where(['c.tid'=>3])
        ->field('p.*')
        ->paginate(10);
        //坚果炒货
        $jgch=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->where(['c.tid'=>1])
        ->field('p.*')
        ->paginate(10);
        //巧克力糖果
        $qkltg=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->where(['c.tid'=>13])
        ->field('p.*')
        ->paginate(10);
        //更多推荐
        $more=db('product')->where('type',0)->paginate(10);
        $this->assign([
            'banner'=>$banner,
            'today1'=>$today1,
            'today2'=>$today2,
            'tui'=>$tui,
            'bggd'=>$bggd,
            'jgch'=>$jgch,
            'qkltg'=>$qkltg,
            'more'=>$more
            ]);
        return $this->fetch();
    }
    
    
    //商品详细信息
    public function details($id)
    {
        $uid=session('uid');
        //查询收藏
        $collect=db('collect')->where(['p_id'=>$id,'u_id'=>$uid])->find();
        //点击量加1
        db('product')->where('id',$id)->setInc('click');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign([
            'collect'=>$collect,
            'carNum'=>$carNum
            ]);
        //产品信息
        $product=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->field('p.*,c.catename')
        ->find($id);
        //热销推荐
        //查询此商品类型
        $cate=db('cate')->find($product['c_id']);
        //商品查询
        $hot=Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->where('c.tid',$cate['tid'])
        ->order('click','desc')
        ->field('p.*')
        ->paginate(6);

        $this->assign([
            'product'=>$product,
            'hot'=>$hot
        ]);
        return $this->fetch();
    }
    
    //关于我们
    public function about()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        return $this->fetch();
    }
    //结算页面
    public function account($id)
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        //收货地址
        $address=db('address')->where('u_id',$uid)->select();
        //订单详情
        $order=db('order')->find($id);
        $this->assign([
            'carNum'=>$carNum,
            'address'=>$address,
            'order'=>$order
        ]);
        return $this->fetch();
    }
    //今日团购页面
    public function buytoday()
    {
        $uid=session('uid');
        //购物车数量
        $carNum=db('car')->where('u_id',$uid)->count();
        $this->assign('carNum',$carNum);
        //今日团购数量
        $todayNum = db('product')->where('type',1)->count(); //数据总数
        $this->view->assign('todayNum',$todayNum);
        //明日预告数量
        $tomorrowNum = db('product')->where('type',1)->count(); //数据总数
        $this->view->assign('tomorrowNum',$tomorrowNum);
        //前三
        $top=db('product')->where('saleNum','desc')->paginate(3);
        $this->assign('top',$top);
        return $this->fetch();
    }
    //今日团购
    public function today(){
        $subject_chapter_no = $this->request->post('subject_chapter_no');
        $start = $this->request->post('start'); //当前页
        $size = $this->request->post('size'); //每页数据条数
        $discussionListPage = Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->field('p.*,c.catename')
        ->where('type',1)
        ->order('id','desc')
        ->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
    //明日预告
   public function tomorrow(){
        $subject_chapter_no = $this->request->post('subject_chapter_no');
        $start = $this->request->post('start'); //当前页
        $size = $this->request->post('size'); //每页数据条数
        $discussionListPage = Db::table('tp_product')
        ->alias('p')
        ->join('tp_cate c','c.id=p.c_id')
        ->field('p.*,c.catename')
        ->where('type',2)
        ->order('id','desc')
        ->paginate($size,false,[
            'page'  => $start, //当前页
        ]);
        return $discussionListPage;
    }
}
