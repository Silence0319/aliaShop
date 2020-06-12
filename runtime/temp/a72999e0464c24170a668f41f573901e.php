<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\index\about.html";i:1589440828;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Alia零食商城</title>
  <link rel="stylesheet" type="text/css" href="__PUBLIC__static/css/main.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__layui/css/layui.css">
  <script type="text/javascript" src="__PUBLIC__layui/layui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
</head>
<body id="list-cont">
  <div class="site-nav-bg">
    <div class="site-nav w1200">
      <p class="sn-back-home">
        <i class="layui-icon layui-icon-home"></i>
        <a href="<?php echo url('index/index'); ?>">首页</a>
      </p>
      <div class="sn-quick-menu">
        <?php if(\think\Request::instance()->session('uid') != null): ?>
        <div class="login"><a href="<?php echo url('info/index'); ?>"><?php echo \think\Request::instance()->session('user_info.name'); ?>！</a></div>
        <div class="login"><a href="javascript:;" id="logout">注销</a></div>
        <div class="sp-cart"><a href="<?php echo url('info/shopcart'); ?>">购物车</a><span id="carNum"><?php echo $carNum; ?></span></div>
        <?php else: ?>
        <div class="login"><a href="<?php echo url('login/index'); ?>">登录</a></div>
        <div class="sp-cart"><a href="<?php echo url('login/register'); ?>">注册</a></div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="header">
    <div class="headerLayout w1200">
      <div class="headerCon">
        <h1 class="mallLogo">
          <a href="<?php echo url('index/index'); ?>" title="零食商城">
            <img src="__PUBLIC__static/img/logo.png">
          </a>
        </h1>
        <div class="mallSearch">
          <form action="<?php echo url('all/search'); ?>" class="layui-form" novalidate>
            <input type="text" name="keyword" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
            <button class="layui-btn" lay-submit lay-filter="formDemo">
                <i class="layui-icon layui-icon-search"></i>
            </button>
            <!-- <input type="hidden" name="" value=""> -->
          </form>
        </div>
      </div>
    </div>
  </div>
 <script type="text/javascript">
   layui.config({
      base: '__PUBLIC__static/js/util' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['jquery','form'],function(){
          var $ = layui.$,form = layui.form;

    $("#logout").on('click',function(){
    $.ajax({
      type:'post',
      url:"<?php echo url('login/logout'); ?>",
      dataType:"json",
      success:function(res){
        if(res.status==1){
          //alert(res.message);
          layer.msg(res.message);
          setTimeout(function(){
            window.location.href="<?php echo url('login/index'); ?>";
          },1000);
        }else{
          //alert(res.message);
          layer.msg(res.message);
        }
      },
      error:function(res){
        layer.msg('发送请求失败！');
      }
    });
  });
  });
  </script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=tGC5IX8lXi9EmPl8UYRkdZkVFqlZf9sr"></script>
<script src="http://d1.lashouimg.com/static/js/release/jquery-1.4.2.min.js" type="text/javascript"></script>  
<style type="text/css">  
    #container{height:450px;width:1100px;} 
</style>
  <div class="content content-nav-base about-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="<?php echo url('index/index'); ?>">首页</a>
            <a href="<?php echo url('all/index'); ?>">所有商品</a>
            <a href="<?php echo url('index/buytoday'); ?>">今日团购</a>
            <a href="<?php echo url('news/index'); ?>">零食资讯</a>
            <a href="<?php echo url('index/about'); ?>"  class="active">关于我们</a>
          </div>
        </div>
      </div>
    </div>
    <div class="banner-box">
      
    </div>
    
    <div style="width: 1100px;margin:auto;padding: 40px 0 0 0;">
      <!-- <h4 style="font-size: 40px;color: #555;letter-spacing: 8px;padding: 0px 0 60px 0;text-align: center;">地址</h4> -->
       <div id="container"></div> 
    </div>
     <!-- <div style="clear: both;height: 20px"></div> -->
    <!-- <div class="after-sale w1200">
      <h4>配送售后</h4>
      <div class="item-box">
        <div class="item item1">
          <div class="img-box">
            <img src="__PUBLIC__static/img/us_icon1.png" width="45" height="50">
          </div>
          <p>7天无理由退换货</p>
        </div>
        <div class="item item2">
          <div class="img-box">
            <img src="__PUBLIC__static/img/us_icon2.png" width="50" height="40">
          </div>
          <p>全场满99元顺丰包邮</p>
        </div>
        <div class="item item3">
          <div class="img-box">
            <img src="__PUBLIC__static/img/us_icon3.png" width="45" height="45">
          </div>
          <p>优质客服服务</p>
        </div>
      </div>
    </div> -->
    <div style="height: 80px;"></div>
  </div>

  <div class="footer">
    <div class="ng-promise-box">
      <div class="ng-promise w1200">
        <p class="text">
          <a class="icon1" href="javascript:;">7天无理由退换货</a>
          <a class="icon2" href="javascript:;">满99元全场免邮</a>
          <a class="icon3" style="margin-right: 0" href="javascript:;">100%品质保证</a>
        </p>
      </div>
    </div>
    <div class="mod_help w1200">                                     
      <p>
        <a href="<?php echo url('index/about'); ?>">关于我们</a>
        <span>|</span>
        <a href="javascript:;">帮助中心</a>
        <span>|</span>
        <a href="javascript:;">售后服务</a>
        <span>|</span>
        <a href="<?php echo url('index/information'); ?>">零食资讯</a>
        <span>|</span>
        <a href="<?php echo url('index/index'); ?>">关于货源</a>
      </p>
      <p class="coty">零食商城版权所有 &copy;豫ICP备19042362号-1 2019-2020 <br>豫公网安备 31010602002343号</p>
    </div>
  </div>

<script type="text/javascript">

layui.config({
    base: '__PUBLIC__static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm'],function(){
      var
     mm = layui.mm;
});
</script>
<script type="text/javascript">  
    var x=115.688569;
    var y=34.42273;

    //地图初始化
    var map = new BMap.Map("container");          // 创建地图实例  
    var point = new BMap.Point(x , y);  // 创建点坐标  
    var marker=new BMap.Marker(point);//创建标注
    map.addOverlay(marker);
    map.centerAndZoom(point, 15);// 初始化地图，设置中心点坐标和地图级别   
    map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
    var opts={
      width:200,
      height:100,
      title:"名代商城(工学院分店)",
      enableMessage:true,
      message:"分店"
    }
    var infoWindow=new BMap.InfoWindow("地址：商丘市梁园区睢阳大道和长江路交叉口往东30米路南 "+"<br>"+" 联系方式：18336053182",opts);
    //marker.addEventListener("click",function(){
      map.openInfoWindow(infoWindow,point);
    //});
</script>
</body>
</html>