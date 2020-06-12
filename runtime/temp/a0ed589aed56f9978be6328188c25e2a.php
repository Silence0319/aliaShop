<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\index\details.html";i:1588575745;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>

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

  <div class="content content-nav-base datails-content">
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
    <div class="data-cont-wrap w1200">
      <div class="crumb">
        <a href="<?php echo url('index/index'); ?>">首页</a>
        <span>></span>
        <a href="<?php echo url('all/index'); ?>">所有商品</a>
        <span>></span>
        <a href="javascript:;">产品详情</a>
      </div>
      <div class="product-intro layui-clear">
        <div class="preview-wrap">
          <a href="javascript:;"><img src="<?php echo $product['pic']; ?>" width="400" height="400"></a>
        </div>
        <div class="itemInfo-wrap">
          <div class="itemInfo">
            <div class="title">
              <h4><?php echo $product['name']; ?> </h4>
              <!-- 根据用户id判断是否收藏 以及颜色更改-->
              <a href="javascript:void(0);" id="collect">
                <?php if($collect['status'] == 1): ?>
                <span id="text"><i class="layui-icon layui-icon-rate-solid"></i>已收藏</span>
                <?php elseif($collect['status'] == 0): ?>
                <span id="text"><i class="layui-icon layui-icon-rate-solid" style="color: #ccc;"></i>收藏</span>
                <?php endif; ?>
                <input type="hidden" name="pid" id="pid" value="<?php echo $product['id']; ?>">
              </a>
            </div>
            <div class="summary">
              <p class="reference"><span>参考价</span> <del>￥<?php echo $product['price']; ?></del></p>
              <p class="activity">
                <span>活动价</span>
                <strong class="price">
                  <i>￥</i><?php echo $product['realPrice']; ?>
                </strong>
                <?php if($product['type'] == 1): ?>
                <span style="background-color: #fc9;padding: 2px 5px;color: #fff;margin-left: 9px">团购</span>
                <?php endif; ?>
              </p>
              <p class="address-box">
                <span>送&nbsp;&nbsp;&nbsp;&nbsp;至</span>
                <strong class="address">河南&nbsp;&nbsp;驻马店&nbsp;&nbsp;上蔡县</strong>
              </p>
            </div>
            <div class="choose-attrs">
              <div class="color layui-clear">
                <span class="title">类&nbsp;&nbsp;&nbsp;&nbsp;型</span> 
                <div class="color-cont">
                  <span class="btn"><?php echo $product['catename']; ?></span>
                </div>
              </div>
              <div class="number layui-clear">
                <span class="title">数&nbsp;&nbsp;&nbsp;&nbsp;量</span>
                <div class="number-cont">
                  <span class="cut btn">-</span>
                  <input maxlength="4" type="" name="" value="1" id="goodNum">
                    <span class="add btn">+</span>
                  </div>
                </div>
            </div>
            <div class="choose-btns">
              <button class="layui-btn layui-btn-primary purchase-btn" id="buyNow">立刻购买</button>
              <button class="layui-btn  layui-btn-danger car-btn" id="car"><i class="layui-icon layui-icon-cart-simple"></i>加入购物车</button>  
            </div>
          </div>
        </div>
      </div>
      <div class="layui-clear">
        <div class="aside">
          <h4>热销推荐</h4>
          <div class="item-list">
            <?php if(is_array($hot) || $hot instanceof \think\Collection || $hot instanceof \think\Paginator): $i = 0; $__LIST__ = $hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="item">
              <a href="<?php echo url('index/details',array('id'=>$vo['id'])); ?>">
                <img src="<?php echo $vo['pic']; ?>" width="280" height="280">
                <p><span><?php echo $vo['name']; ?></span><span class="pric">￥<?php echo $vo['realPrice']; ?></span></p>
              </a>
            </div>
           <?php endforeach; endif; else: echo "" ;endif; ?> 
          </div>
        </div>
        <div class="detail">
          <h4>详情</h4>
          <div class="item" style="">
            <img src="<?php echo $product['details']; ?>" width="800">
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

<script type="text/javascript">
  layui.config({
    base: '__PUBLIC__static/js/util/' //你存放新模块的目录，注意，不是layui的模块目录
  }).use(['mm','jquery'],function(){
      var mm = layui.mm,$ = layui.$;
      var cur = $('.number-cont input').val();
      $('.number-cont .btn').on('click',function(){
        if($(this).hasClass('add')){
          cur++;
        }else{
          if(cur > 1){
            cur--;
          }  
        }
        $('.number-cont input').val(cur);
        console.log($('.number-cont input').val());
        //商品数量
        var goodNum=$('.number-cont input').val();
      });
      //商品ID
      var pid=$("#pid").val();
      //商品价格
      var b_price="<?php echo $product['realPrice']; ?>";
      $("#car").click(function(){
        var num=$('.number-cont input').val();
        console.log(num);
          $.ajax({
          type:"post",
          url:"<?php echo url('add/car'); ?>",
          data:{pid: pid,goodNum: num},
          dataType:"json",
          async:false,
          success:function(res){
            if(res.status==1){
              layer.msg(res.message,{icon:6,time:1000},function(){
                $("#carNum").html(res.carNum);
              });
            }else{
              layer.msg(res.message,{icon:5,time:1000});
            }
          },
          error:function(res){
            layer.msg('发送请求失败！');
          }
        });
      });
      $("#buyNow").click(function(){
        var num=$('.number-cont input').val();
        console.log(num);
          $.ajax({
          type:"post",
          url:"<?php echo url('add/buyNow'); ?>",
          data:{pid: pid,goodNum: num},
          dataType:"json",
          async:false,
          success:function(res){
            if(res.status==1){
              window.location.href="/public/index/info/orderlist?id="+res.oid;
            }else if(res.status==2){
              layer.msg(res.message,{icon:5,time:1000});
            }
          },
          error:function(res){
            layer.msg('发送请求失败！');
          }
        });
      });

      //收藏
      $("#collect").on('click',function(){
        //alert('调用成功');
        $.ajax({
          type:"post",
          url:"<?php echo url('add/collect'); ?>",
          data:{pid:pid},
          dataType:"json",
          success:function(res){
            if(res.status==1){
              layer.msg(res.message,{icon:6,time:1000},function(){
                $("#text").html('<i class="layui-icon layui-icon-rate-solid"></i>已收藏');
              });
            }else if(res.status==2){
              layer.msg(res.message,{icon:6,time:1000},function(){
                $("#text").html('<i class="layui-icon layui-icon-rate-solid" style="color: #ccc;"></i>收藏');
              });
            }else{
              layer.msg(res.message,{icon:5,time:1000});
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