<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\index\account.html";i:1589251403;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>

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
<link href="__PUBLIC__step-lay/step.css" rel="stylesheet">
<style>
.layui-form-radio>i {
    margin-right: 0px;
    font-size: 15px;
    color: #009688;
}
</style>
  <div class="content">
     
    <div class="layui-fluid">
        <div class="layui-card">
            <div class="layui-card-body" style="padding-top: 40px;">
                <div class="layui-carousel" id="stepForm" lay-filter="stepForm" style="margin: 0 auto;">
                    <div carousel-item>
                        
                        <div id="address">
                            <form class="layui-form" style="margin: 0 auto;max-width: 860px;padding-top: 40px;">
                                 <input type="hidden" name="o_id" id="o_id" value="<?php echo $order['id']; ?>">
                                 <!-- 隐藏订单状态 -->
                        <input type="hidden" name="status" id="status" value="<?php echo $order['status']; ?>">
                                <div class="layui-form-item" style="border-bottom: 1px solid #ccc;"></div>
                                <table class="layui-table" style=" border-collapse: collapse;">
                                  <thead>
                                    <tr>
                                      <th></th>
                                      <th>收货人</th>
                                      <th>所在地区</th>
                                      <th>详细地址</th>
                                      <th>邮编</th>
                                      <th>电话/手机号</th>
                                      <th></th>
                                    </tr> 
                                  </thead>
                                  <tbody>
                                    <?php if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                      <td>
                                        <?php if($vo['status'] == 1): ?>
                                        <input type="radio" name="select" id="" value="<?php echo $vo['id']; ?>" checked="">
                                        <?php else: ?>
                                        <input type="radio" name="select" id="" value="<?php echo $vo['id']; ?>">
                                        <?php endif; ?>
                                      </td>
                                      <td><?php echo $vo['name']; ?></td>
                                      <td><?php echo $vo['province']; ?> <?php echo $vo['city']; ?> <?php echo $vo['area']; ?></td>
                                      <td><?php echo $vo['address']; ?></td>
                                      <td><?php echo $vo['code']; ?></td>
                                      <td><?php echo $vo['phone']; ?></td>
                                      <td>
                                        <?php if($vo['status'] == 1): ?>
                                        <button style="display: block;width: 80px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ff5000;border-radius: 3px;background: #ffd6cc;color: #f30;">默认地址</button>
                                        <?php endif; ?>
                                      </td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                  </tbody>
                                </table>
                                
                                <div class="layui-form-item">
                                    <div class="layui-input-block" style="width: 100px;margin-left: 360px;margin-top:20px;">
                                        <button class="layui-btn" lay-submit lay-filter="formStep">
                                            &emsp;下一步&emsp;
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <form class="layui-form" style="margin: 0 auto;max-width: 460px;padding-top: 40px;">
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <div class="layui-form-mid layui-word-aux" style="margin-left: 30px;">
                                          <img src="__PUBLIC__static/img/pay.jpg" width="150" height="150" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item" style="font-size: 16px;margin-left: 110px">
                                    <label class="layui-form-label">总计：</label>
                                    <div class="layui-input-block">
                                        <div class="layui-form-mid layui-word-aux"><a style="color:red"><?php echo $order['sumMoney']; ?></a><a style="color: #000">元</a></div>
                                    </div>
                                </div>
                               
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button type="button" class="layui-btn layui-btn-primary pre">上一步</button>
                                        <button class="layui-btn" lay-submit lay-filter="formStep2">
                                            &emsp;已付款&emsp;
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <div style="text-align: center;margin-top: 90px;">
                                <i class="layui-icon layui-circle"
                                   style="color: white;font-size:30px;font-weight:bold;background: #52C41A;padding: 20px;line-height: 80px;">&#xe605;</i>
                                <div style="font-size: 24px;color: #333;font-weight: 500;margin-top: 30px;">
                                    付款成功
                                </div>
                                <div style="font-size: 14px;color: #666;margin-top: 20px;">24个小时内发货，请耐心等待！</div>
                            </div>
                            <div style="text-align: center;margin-top: 50px;">
                                <button class="layui-btn" lay-submit lay-filter="nextBuy">继续购买</button>
                                <button class="layui-btn layui-btn-primary">查看订单</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
               
            </div>
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

<script src="__PUBLIC__step-lay/step.js"></script>
  <script type="text/javascript">

layui.config({
    base: '__PUBLIC__static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','carousel'],function(){
      var carousel = layui.carousel,
     mm = layui.mm;
      
    
});

layui.config({
            base:'__PUBLIC__step-lay/'
        }).use([ 'form', 'step'], function () {
            var $ = layui.$
                , form = layui.form
                , step = layui.step;

            step.render({
                elem: '#stepForm',
                filter: 'stepForm',
                width: '100%', //设置容器宽度
                stepWidth: '750px',
                height: '500px',
                stepItems: [{
                    title: '选择收货地址'
                }, {
                    title: '扫码付款'
                }, {
                    title: '完成'
                }]
            });

//初始页面
$(function(){
  var status=$("#status").val();
  if(status==2){
    step.next('#stepForm');
    layer.msg('扫码付款');
    return false;
  }
});
            form.on('submit(formStep)', function (data) {
                //判断是否选中单选框
                var val=$('input:radio[name="select"]:checked').val();
                if(val==null){
                  layer.msg('请选择发货地址！',{time:1500});
                }else{
                  step.next('#stepForm');
                  console.log(data.field);
                  $.ajax({
                    type:"post",
                    url: "<?php echo url('add/addPay'); ?>",
                    data:{add_id:data.field.select, o_id:data.field.o_id},
                    dataType:"json",
                    success:function(res){
                      if(res.status==1){
                        layer.msg('扫码付款',{time:1000});
                      }
                    },
                    error:function(res){
                      layer.msg('发送请求失败！');
                    }
                  });  
                }
                
                return false;
            });

            form.on('submit(formStep2)', function (data) {
                step.next('#stepForm');
                var o_id=$("#o_id").val();
                $.ajax({
                    type:"post",
                    url: "<?php echo url('add/finishPay'); ?>",
                    data:{o_id:o_id},
                    dataType:"json",
                    success:function(res){
                      if(res.status==1){
                        layer.msg('完成付款，24小时内发货',{icon:6,time:1000});
                      }
                    },
                    error:function(res){
                      layer.msg('发送请求失败！');
                    }
                  });
                return false;
            });

            $('.pre').click(function () {
                step.pre('#stepForm');
            });

            $('.next').click(function () {
                step.next('#stepForm');
            });
    //继续购买
    form.on('submit(nextBuy)',function(){
      window.location.href="<?php echo url('index/index'); ?>";
    });
        });

  </script>
</body>
</html>