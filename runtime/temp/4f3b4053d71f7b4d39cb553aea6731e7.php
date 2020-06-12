<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\index\buytoday.html";i:1589445354;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>

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

  <div class="content content-nav-base buytoday-content">
    <div id="list-cont">
      <div class="main-nav">
        <div class="inner-cont0">
          <div class="inner-cont1 w1200">
            <div class="inner-cont2">
            <a href="<?php echo url('index/index'); ?>">首页</a>
              <a href="<?php echo url('all/index'); ?>">所有商品</a>
              <a href="<?php echo url('index/buytoday'); ?>"  class="active">今日团购</a>
              <a href="<?php echo url('news/index'); ?>">零食资讯</a>
              <a href="<?php echo url('index/about'); ?>">关于我们</a>
            </div>
          </div>
        </div>
      </div>
      <div class="banner-box">
        <div class="banner"></div>
      </div>
      <div class="product-list-box">
        <div class="product-list w1200">  
          <div class="tab-title">
            <a href="javascript:;" class="active tuang" data-content="tuangou">今日团购</a>
            <a href="javascript:;" data-content="yukao">明日预告</a>
          </div>
          <div class="list-cont" cont = 'tuangou'>
            <!-- 今日团购 -->
            <div class="item-box layui-clear" id="today"></div>
            <!-- 分页 -->
            <div id="todayPage" style="text-align: center;"></div>
          </div>
          <div class="list-cont layui-hide" cont = 'yukao'>
            <!-- 明日预告 -->
            <div class="item-box layui-clear" id="tomorrow"></div>
            <!-- 分页 -->
            <div id="tomorrowPage" style="text-align: center;"></div>
          </div>
        </div>  
      </div>
      <div class="footer-wrap">
        <div class="footer w1200">
          <div class="title">
            <h3>团购销量榜</h3>
          </div>
          <div class="list-box layui-clear" id="footerList">
            <div class="item">
              <img src="__PUBLIC__static/img/s_img2.jpg" alt="" width="320" height="400">
              <div class="text">
                <div class="right-title-number">1</div>
                <div class="commod">
                  <p>黄小鸭</p>
                  <span>￥100.00</span>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="__PUBLIC__static/img/s_img3.jpg" alt="" width="320" height="400">
              <div class="text">
                <div class="right-title-number">2</div>
                <div class="commod">
                  <p>芝士</p>
                  <span>￥100.00</span>
                </div>
              </div>
            </div>
            <div class="item">
              <img src="__PUBLIC__static/img/s_img4.jpg" alt="" width="320" height="400">
              <div class="text">
                <div class="right-title-number">3</div>
                <div class="commod">
                  <p>黄黄小鸭</p>
                  <span>￥100.00</span>
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
      var laypage = layui.laypage,$ = layui.$;
     mm = layui.mm;
       
      $('body').on('click','*[data-content]',function(){
        $(this).addClass('active').siblings().removeClass('active')
        var dataConte = $(this).attr('data-content');
        $('*[cont]').each(function(i,item){
          var itemCont = $(item).attr('cont');
          console.log(item)
          if(dataConte === itemCont){
            $(item).removeClass('layui-hide');
          }else{
            $(item).addClass('layui-hide');
          }
        })
      })

//初始化
function today(start,size){
        $.ajax({
            type:"post",
            url:"<?php echo url('index/today'); ?>",
            data:{start: start,size: size,subject_chapter_no: "<?php echo $todayNum; ?>"},
            timeout:10000,
            error:function (){
                alert('发送请求超时，请稍后重试');
                //console.log("请求失败");
            },
            success:function(result){
                $("#today").empty();
                $.each(result.data,function (index,value) {
                    $("#today").append(
                      '<a href="/public/index/index/details?id='+value.id+'">'+
                        '<div class="item">'+
                          '<img src="'+value.pic+'" alt="" width="290" height="320">'+
                          '<div class="text-box">'+
                            '<p class="title">'+value.name+'</p>'+
                            '<p class="plic">'+
                              '<span class="ciur-pic">￥'+value.realPrice+'</span>'+
                              '<span class="Ori-pic">￥'+value.price+'</span>'+
                              '<span class="discount">秒杀价</span>'+
                          '</div>'+
                      '</a>'
                    );
                });
            }
        });
    }

var pageSize = 20;  //每页显示的条数
var discussionNum = '<?php echo $todayNum; ?>'; //数据总数
 
//layui分页样式
layui.use(['laypage', 'layer'], function(){
    var laypage = layui.laypage
    ,layer = layui.layer;
    //总页数大于页码总数
    laypage.render({
        elem: 'todayPage'//标签ID
        ,limit: pageSize  //每页显示的条数
        ,count: discussionNum //数据总数
        ,jump: function(obj){
            //console.log(obj.curr);
            today(obj.curr,pageSize); //通过obj.curr传递当前页
        }
    });
});
//初始化
function tomorrow(start,size){
        $.ajax({
            type:"post",
            url:"<?php echo url('index/tomorrow'); ?>",
            data:{start: start,size: size,subject_chapter_no: "<?php echo $tomorrowNum; ?>"},
            timeout:10000,
            error:function (){
                alert('发送请求超时，请稍后重试');
                //console.log("请求失败");
            },
            success:function(result){
                $("#tomorrow").empty();
                $.each(result.data,function (index,value) {
                    $("#tomorrow").append(
                        '<div class="item">'+
                          '<img src="'+value.pic+'" alt="" width="290" height="320">'+
                          '<div class="text-box">'+
                            '<p class="title">'+value.name+'</p>'+
                            '<p class="plic">'+
                              '<span class="ciur-pic">￥'+value.realPrice+'</span>'+
                              '<span class="Ori-pic">￥'+value.price+'</span>'+
                              '<span class="discount">秒杀价</span>'+
                          '</div>'
                    );
                });
            }
        });
    }

var pageSize = 20;  //每页显示的条数
var discussionNum = '<?php echo $tomorrowNum; ?>'; //数据总数
 
//layui分页样式
layui.use(['laypage', 'layer'], function(){
    var laypage = layui.laypage
    ,layer = layui.layer;
    //总页数大于页码总数
    laypage.render({
        elem: 'tomorrowPage'//标签ID
        ,limit: pageSize  //每页显示的条数
        ,count: discussionNum //数据总数
        ,jump: function(obj){
            //console.log(obj.curr);
            tomorrow(obj.curr,pageSize); //通过obj.curr传递当前页
        }
    });
});
});
</script>


</body>
</html>