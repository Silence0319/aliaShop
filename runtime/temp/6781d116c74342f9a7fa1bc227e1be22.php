<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\info\orderlist.html";i:1587796449;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>

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


  <div class="content content-nav-base shopcart-content">
   
     <!-- 隐藏订单表id -->
     <input type="hidden" name="orderID" value="<?php echo $id; ?>" id="orderID">
    <div class="cart w1200" style="margin-top: 30px;">
    <?php if(is_array($order) || $order instanceof \think\Collection || $order instanceof \think\Paginator): $k = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
      <div class="cart-table-th">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <input class="check-all check" id="allCheckked" type="checkbox" value="true">
            </div>
          <label>&nbsp;&nbsp;</label>
          </div>
        </div>
        <div class="th th-item">
          <div class="th-inner">
            订单号：<?php echo $vo['number']; ?>
          </div>
        </div>
        <div class="th th-price">
          <div class="th-inner">
            单价
          </div>
        </div>
        <div class="th th-amount">
          <div class="th-inner">
            时间：<?php echo $vo['orderTime']; ?>
          </div>
        </div>
        <div class="th th-sum">
          <div class="th-inner">
            总计：￥<?php echo $vo['sumMoney']; ?>
          </div>
        </div>
        <div class="th th-op">
          <div class="th-inner">
            <input type="hidden" name="oid" class="oid" value="<?php echo $vo['id']; ?>">
            <a href="javascript:;" id="del">删除</a>
          </div>
        </div>  
      </div>
      <?php if(is_array($booking) || $booking instanceof \think\Collection || $booking instanceof \think\Paginator): $k = 0; $__LIST__ = $booking;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k;if($vo['id'] == $vs['o_id']): ?>
      <div class="OrderList" style="border-bottom: 1px solid #f5f5f5;">
        <div class="order-content" id="list-cont">
          
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">
                <div class="cart-checkbox">

                </div>
              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
                <a href="javascript:;"><img src="<?php echo $vs['pic']; ?>" alt=""></a>
                <div class="text">
                  <div class="title"><?php echo $vs['pname']; ?></div>
                  <p><span>订单号</span>  <span>130</span>cm</p>
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su">￥<?php echo $vs['realPrice']; ?></span>
            </li>
            <li class="th th-amount">
              <div class="box-btn layui-clear">
                <div class="less layui-btn">-</div>
                <input class="Quantity-input" type="" name="" value="<?php echo $vs['num']; ?>" disabled="disabled">
                <div class="add layui-btn">+</div>
              </div>
            </li>
            <li class="th th-sum">
              <span class="sum">￥<?php echo $vs['b_price']; ?></span>
            </li>

          </ul>
           
        </div>
      </div>
      <?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
    <div style="padding: 20px 0px 0 0;width: 300px;float:right;">
      <button class="layui-btn" id="pay">去结算</button>
      <button class="layui-btn layui-btn-warm" id="cancel">取消订单</button>
    </div>
    </div>

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
  }).use(['mm','jquery','element','car','layer'],function(){
    var mm = layui.mm,$ = layui.$,element = layui.element,car = layui.car;
    var layer=layui.layer;
    //删除
    $("#del").on('click',function(){
      var oid=$(".oid").val();
      //console.log(oid);
      //传入后台
      $.ajax({
        type:"post",
        url:"<?php echo url('del/order'); ?>",
        data:{id:oid},
        dataType:"json",
        success:function(res){
          console.log(oid);
          if(res.status==1){
            layer.msg(res.message,{icon:6},function(){
              window.location.reload();
            });
          }
        },
        error:function(res){
          console.log('发送请求失败！');
          layer.msg('发送请求失败！');
        }
      });
    });
    //结算
    $("#pay").on('click',function(){
      var orderID=$("#orderID").val();
      window.location.href="/public/index/index/account?id="+orderID;
    });
    //取消订单
    $("#cancel").on('click',function(){
      var orderID=$("#orderID").val();
      $.ajax({
        type:"post",
        url:"<?php echo url('del/cancelOrder'); ?>",
        data:{id:orderID},
        dataType:"json",
        success:function(res){
          if(res.status==1){
            layer.msg(res.message,{icon:6,time:1000},function(){
              window.location.href="<?php echo url('index/index'); ?>";
            });
          }else{
            layer.msg(res.message,{icon:5,time});
          }
        },
        error:function(res){
          layer.msg('发送请求失败！');
        }
      });
    });
});
</script>
</body>
</html>