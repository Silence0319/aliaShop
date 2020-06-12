<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\info\order.html";i:1589355849;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>


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
<style>
.page {
    text-align: center;
}
.page .pagination li.active span {
    background: #009688;
    color: #fff;
    border: 1px solid #009688;
}
.page .pagination li {
    display: inline-block;
    margin-right: 5px;
    text-align: center;
}
.page span {
    display: inline-block;
    padding: 5px;
    min-width: 15px;
    border: 1px solid #E2E2E2;
}
.page a {
    display: inline-block;
    background: #fff;
    color: #888;
    padding: 5px;
    min-width: 15px;
    border: 1px solid #E2E2E2;
}
</style>

  <div class="content content-nav-base commodity-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="<?php echo url('index/index'); ?>">首页</a>
            <a href="<?php echo url('all/index'); ?>">所有商品</a>
            <a href="<?php echo url('index/buytoday'); ?>">今日团购</a>
            <a href="<?php echo url('news/index'); ?>">零食资讯</a>
            <a href="<?php echo url('index/about'); ?>">关于我们</a>
          </div>

        </div>
      </div>
    </div>
    <div class="commod-cont-wrap">
      <div class="commod-cont w1200 layui-clear">
        <div class="left-nav">
          <div class="title">个人中心</div>
          <div class="list-box">
            
            <ul>
              <li><a href="<?php echo url('info/index'); ?>">个人信息</a></li>
              <li><a href="<?php echo url('info/order'); ?>">我的订单</a></li>
              <li><a href="<?php echo url('info/collect'); ?>">我的收藏</a></li>
              <li><a href="<?php echo url('info/address'); ?>">收货地址</a></li>
              <li><a href="<?php echo url('info/password'); ?>">修改密码</a></li>
            </ul>
          </div>
        </div>
        <div class="right-cont-wrap">
          <div class="right-cont" style="background-color: #fff;min-height: 500px;height: auto;width: 850px;">
            <!-- 订单 -->
            <div>
              <div class="layui-tab">
                  <ul class="layui-tab-title">
                    <li class="layui-this">未付订单</li>
                    <li>历史订单</li>
                  </ul>
                  <div class="layui-tab-content">
                    <!-- 未付款订单 -->
                    <div class="layui-tab-item layui-show">
                      <!-- 订单列表 -->
                      <div style="border-left:1px solid #ececec;border-right:1px solid #ececec;width: 800px;margin-left: 10px;" class="cancelOrder">
                        <?php if(is_array($nopay) || $nopay instanceof \think\Collection || $nopay instanceof \think\Paginator): $k = 0; $__LIST__ = $nopay;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <!-- 表头 -->
                        <div style="background-color: #f5f5f5;padding: 5px 10px;height: 20px;">
                          <div style="float: left;margin-left: 20px;">订单号：<?php echo $vo['number']; ?></div>
                          <div style="float: left;margin-left: 130px;">单价</div>
                          <div style="float: left;margin-left: 90px;">数量</div>
                          <div style="float: left;margin-left: 88px;">金额</div>
                          <div style="float: left;margin-left: 90px;">
                            <!-- <a href="<?php echo url('index/account',array('id'=>$vo['id'])); ?>" title="结算">
                              结算
                            </a> -->
                          </div>
                          <div style="float: right;">
                            <a href="javascript:;" title="删除订单" onclick="orderDel(this,'<?php echo $vo['id']; ?>')">
                              <i class="layui-icon layui-icon-delete" style="font-size: 20px; color: #666;"></i>
                            </a>
                          </div>
                        </div>
                        <!-- 商品信息 -->
                        <?php if(is_array($nopayShop) || $nopayShop instanceof \think\Collection || $nopayShop instanceof \think\Paginator): $k = 0; $__LIST__ = $nopayShop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k;if($vo['id'] == $vs['o_id']): ?>
                        <div style="padding: 10px;">
                          <div style="float: left;">
                            <div style="float: left;width: 110px;">
                                <img src="<?php echo $vs['pic']; ?>" alt="" width="100" height="100">
                            </div>
                            <div style="float: left;width: 150px;line-height: 25px;margin-top: 30px;text-align: center;">
                              <div><?php echo $vs['pname']; ?></div>
                             <!--  <div>粉色 130cm</div> -->
                            </div>
                          </div>
                          <div style="float: left;margin-top: 30px;margin-left: 20px;width: 55px">￥<?php echo $vs['realPrice']; ?></div>
                          <div style="float: left;margin-left: 76px;margin-top: 30px;width: 10px;"><?php echo $vs['num']; ?></div>
                          <div style="float: left;margin-left: 90px;margin-top: 30px;width: 15px;">￥<?php echo $vs['b_price']; ?></div>
                        </div>
                        
                        <div style="clear: both;height: 10px;"></div><hr>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <div style="width: 270px;float: right;">
                          总计:￥<?php echo $vo['sumMoney']; ?>&nbsp;&nbsp;
                          <span class="layui-btn layui-btn-sm" style="width: 68px" onclick="post(this,'<?php echo $vo['id']; ?>')">结算</span>
                          <span class="layui-btn layui-btn-sm layui-btn-warm" onclick="cancel(this,'<?php echo $vo['id']; ?>')">取消订单</span>
                        </div>
                        <div style="clear: both;height: 10px;border-bottom: 1px solid #ccc;"></div>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                      
                      </div>
                      <!-- 分页 -->
                      <div class="page">
                        <?php echo $nopay->render(); ?>
                      </div>
                    </div>
                    <!-- 历史订单 -->
                    <div class="layui-tab-item">
                      <div style="border-left:1px solid #ececec;border-right:1px solid #ececec;width: 800px;margin-left: 10px;">
                        <?php if(is_array($pay) || $pay instanceof \think\Collection || $pay instanceof \think\Paginator): $k = 0; $__LIST__ = $pay;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                        <!-- 表头 -->
                        <div style="background-color: #f5f5f5;padding: 5px 10px;height: 20px;">
                          <div style="float: left;margin-left: 20px;">订单号：<?php echo $vo['number']; ?></div>
                          <div style="float: left;margin-left: 130px;">单价</div>
                          <div style="float: left;margin-left: 90px;">数量</div>
                          <div style="float: left;margin-left: 88px;">金额</div>
                          <div style="float: left;margin-left: 20px;line-height: 20px;width: 150px;text-align: center;">
                            <?php if($vo['status'] == 1): ?>
                            已付款，待发货
                            <?php elseif($vo['status'] == 0): ?>
                            未付款
                            <?php elseif($vo['status'] == 3): ?>
                            取消订单
                            <?php elseif($vo['status'] == 4): ?>
                            完成订单
                            <?php elseif($vo['status'] == 5): ?>
                            已发货，待收货
                            <?php endif; ?>
                          </div>
                          <div style="float: right;">
                            <a href="javascript:;" title="删除订单" onclick="orderDel(this,'<?php echo $vo['id']; ?>')">
                              <i class="layui-icon layui-icon-delete" style="font-size: 20px; color: #666;"></i>
                            </a>
                          </div>
                        </div>
                        <!-- 商品信息 -->
                        <?php if(is_array($shop) || $shop instanceof \think\Collection || $shop instanceof \think\Paginator): $k = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k;if($vo['id'] == $vs['o_id']): ?>
                        <div style="padding: 10px;">
                          <div style="float: left;">
                            <div style="float: left;width: 110px;">
                                <img src="<?php echo $vs['pic']; ?>" alt="" width="100" height="100">
                            </div>
                            <div style="float: left;width: 150px;line-height: 25px;margin-top: 30px;text-align: center;">
                              <div><?php echo $vs['pname']; ?></div>
                             <!--  <div>粉色 130cm</div> -->
                            </div>
                          </div>
                          <div style="float: left;margin-top: 30px;margin-left: 20px;width: 55px">￥<?php echo $vs['realPrice']; ?></div>
                          <div style="float: left;margin-left: 76px;margin-top: 30px;width: 10px;"><?php echo $vs['num']; ?></div>
                          <div style="float: left;margin-left: 90px;margin-top: 30px;width: 15px;">￥<?php echo $vs['b_price']; ?></div>
                        </div>
                        
                        <div style="clear: both;height: 10px;"></div><hr>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <div style="float: left;padding: 0 0 0 40px;line-height: 40px"><?php echo $vo['orderTime']; ?>&nbsp;&nbsp;</div>
                        <div style="width: 200px;float: right;">
                          
                          <b>总计:￥<?php echo $vo['sumMoney']; ?></b>
                          &nbsp;&nbsp;
                          <?php if($vo['status'] != 5): ?>
                          <span class="layui-btn layui-btn-sm" style="width: 68px;" onclick="confir(this,'<?php echo $vo['id']; ?>')">确认收货</span>
                          <?php endif; ?>
                        </div>
                        <div style="clear: both;height: 18px;border-bottom: 1px solid #ccc;"></div>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                      </div>  
                      <!-- 分页 -->
                      <div class="page">
                        <?php echo $pay->render(); ?>
                      </div>
                    </div>
                </div>
              </div>
            </div>
              
          
             
          </div>
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

<script>

  layui.config({
    base: '__PUBLIC__static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','laypage','jquery'],function(){
      var laypage = layui.laypage,$ = layui.$,
     mm = layui.mm;
       laypage.render({
        elem: 'demo0'
        ,count: 100 //数据总数
      });

    $('.sort a').on('click',function(){
      $(this).addClass('active').siblings().removeClass('active');
    });
    //初始化分类子列表隐藏
    $('.list-box dt').addClass('active').siblings('dd').hide();
    $('.list-box dt').attr('off',true);
    //点击隐藏/开启分类列表
    $('.list-box dt').on('click',function(){
      if($(this).attr('off')){
        $(this).removeClass('active').siblings('dd').show()
        $(this).attr('off','')
      }else{
        $(this).addClass('active').siblings('dd').hide()
        $(this).attr('off',true)
      }
    })

});
</script>
<script src="__PUBLIC__static/js/jquery.js"></script>
<script>
  //删除订单
  function orderDel(obj,id){
    layer.confirm('确认要取消删除吗？',function(index){
          //发异步删除数据
          $.get("<?php echo url('del/order'); ?>",{id:id});
          layer.msg('已删除!',{icon:1,time:1000},function(){
            parent.location.reload();
          });
      });
  }
  //取消订单
  function cancel(obj,id){
    layer.confirm('确认要取消订单吗？',function(index){
          //发异步数据
          $.get("<?php echo url('del/cancelOrder'); ?>",{id:id});
          layer.msg('已取消!',{icon:1,time:1000},function(){
            parent.location.reload();
          });
      });
  }
  //结算
  function post(obj,id){
    window.location.href="<?php echo url('index/account'); ?>?id="+id;
  }
  //取消订单
  function confir(obj,id){
    layer.confirm('确认已收货？',function(index){
          //发异步数据
          $.get("<?php echo url('add/confirmOrder'); ?>",{id:id});
          layer.msg('已确认!',{icon:1,time:1000},function(){
            parent.location.reload();
          });
      });
  }
</script>


</body>
</html>