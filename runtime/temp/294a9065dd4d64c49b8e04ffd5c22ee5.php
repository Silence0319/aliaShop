<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\all\commodity.html";i:1587455234;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>


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

  <div class="content content-nav-base commodity-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="<?php echo url('index/index'); ?>">首页</a>
            <a href="<?php echo url('all/index'); ?>"  class="active">所有商品</a>
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
          <div class="title">所有分类</div>
          <div class="list-box">
            <?php if(is_array($onelevel) || $onelevel instanceof \think\Collection || $onelevel instanceof \think\Paginator): $k = 0; $__LIST__ = $onelevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
            <dl>
             <dt><?php echo $vo['catename']; ?></dt>
             <?php if(is_array($twolevel) || $twolevel instanceof \think\Collection || $twolevel instanceof \think\Paginator): $k = 0; $__LIST__ = $twolevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k;if($vo['id'] == $vs['tid']): ?>
             <dd><a href="javascript:;" onclick="window.location.href='<?php echo url('all/son',array('id'=>$vs['id'])); ?>'"><?php echo $vs['catename']; ?></a></dd>
             <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
           
          </div>
        </div>
        <div class="right-cont-wrap">
          <div class="right-cont">
            <div class="sort layui-clear">
              <a class="active" href="javascript:;" event = 'volume' id="volume">销量</a>
              <a href="javascript:;" event = 'price' id="price">价格</a>
              <a href="javascript:;" event = 'newprod' id="newprod">新品</a>
              <a href="javascript:;" event = 'collection' id="collection">收藏</a>
            </div>
            <div class="prod-number">
              <!-- 商品个数统计 js控制-->
              <span id="num"><?php echo $discussionNum; ?>个</span>
            </div>
            <!-- 商品展示区 -->
            <div class="cont-list layui-clear" id="list-conts"></div>
            <!-- 分页 -->
            <div id="disscussionListPage" style="text-align: center;"></div>
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
  }).use(['mm','laypage','jquery','layer','laytpl'],function(){
      var laypage = layui.laypage,$ = layui.$,laytpl=layui.laytpl,
      mm = layui.mm;

$(document).ready(function(){
  $("#price").click(function(){
    //按价钱
    function list(start,size){
        $.ajax({
            type:"post",
            url:"<?php echo url('all/dataPrice'); ?>",
            data:{start: start,size: size,subject_chapter_no: "<?php echo $discussionNum; ?>"},
            timeout:10000,
            error:function (){
                alert('发送请求超时，请稍后重试');
                //console.log("请求失败");
            },
            success:function(result){
                $("#list-conts").empty();
                $.each(result.data,function (index,value) {
                    $("#list-conts").append(
                        '<div class="item"><div class="img"><a href="/public/index/index/details?id='+value.id+'">' +
                            '<img src="' +value.pic+'" width="280" height="280"></a></div><div class="text"><p class="title">'+value.name+'</p><p class="price"><span class="pri">￥'+value.realPrice+'</span><span class="nub">'+value.saleNum+'付款</span></p></div></div>'
                    );
                });
            }
        });
    }
    var pageSize = 9;  //每页显示的条数
    var discussionNum = '<?php echo $discussionNum; ?>'; //数据总数
    //layui分页样式
    layui.use(['laypage', 'layer'], function(){
    var laypage = layui.laypage
    ,layer = layui.layer;
    //总页数大于页码总数
    laypage.render({
        elem: 'disscussionListPage'//标签ID
        ,limit: pageSize  //每页显示的条数
        ,count: discussionNum //数据总数
        ,jump: function(obj){
            //console.log(obj.curr);
            list(obj.curr,pageSize); //通过obj.curr传递当前页
        }
      });
    });
  });
  $("#volume").click(function(){
    //按销量
    function list(start,size){
        $.ajax({
            type:"post",
            url:"<?php echo url('all/data'); ?>",
            data:{start: start,size: size,subject_chapter_no: "<?php echo $discussionNum; ?>"},
            timeout:10000,
            error:function (){
                alert('发送请求超时，请稍后重试');
                //console.log("请求失败");
            },
            success:function(result){
                $("#list-conts").empty();
                $.each(result.data,function (index,value) {
                    $("#list-conts").append(
                        '<div class="item"><div class="img"><a href="/public/index/index/details?id='+value.id+'">' +
                            '<img src="' +value.pic+'" width="280" height="280"></a></div><div class="text"><p class="title">'+value.name+'</p><p class="price"><span class="pri">￥'+value.realPrice+'</span><span class="nub">'+value.saleNum+'付款</span></p></div></div>'
                    );
                });
            }
        });
    }
    var pageSize = 9;  //每页显示的条数
    var discussionNum = '<?php echo $discussionNum; ?>'; //数据总数
    //layui分页样式
    layui.use(['laypage', 'layer'], function(){
    var laypage = layui.laypage
    ,layer = layui.layer;
    //总页数大于页码总数
    laypage.render({
        elem: 'disscussionListPage'//标签ID
        ,limit: pageSize  //每页显示的条数
        ,count: discussionNum //数据总数
        ,jump: function(obj){
            //console.log(obj.curr);
            list(obj.curr,pageSize); //通过obj.curr传递当前页
        }
      });
    });
  });
  $("#newprod").click(function(){
    //按新品
    function list(start,size){
        $.ajax({
            type:"post",
            url:"<?php echo url('all/dataNewprod'); ?>",
            data:{start: start,size: size,subject_chapter_no: "<?php echo $discussionNum; ?>"},
            timeout:10000,
            error:function (){
                alert('发送请求超时，请稍后重试');
                //console.log("请求失败");
            },
            success:function(result){
                $("#list-conts").empty();
                $.each(result.data,function (index,value) {
                    $("#list-conts").append(
                        '<div class="item"><div class="img"><a href="/public/index/index/details?id='+value.id+'">' +
                            '<img src="' +value.pic+'" width="280" height="280"></a></div><div class="text"><p class="title">'+value.name+'</p><p class="price"><span class="pri">￥'+value.realPrice+'</span><span class="nub">'+value.saleNum+'付款</span></p></div></div>'
                    );
                });
            }
        });
    }
    var pageSize = 9;  //每页显示的条数
    var discussionNum = '<?php echo $discussionNum; ?>'; //数据总数
    //layui分页样式
    layui.use(['laypage', 'layer'], function(){
    var laypage = layui.laypage
    ,layer = layui.layer;
    //总页数大于页码总数
    laypage.render({
        elem: 'disscussionListPage'//标签ID
        ,limit: pageSize  //每页显示的条数
        ,count: discussionNum //数据总数
        ,jump: function(obj){
            //console.log(obj.curr);
            list(obj.curr,pageSize); //通过obj.curr传递当前页
        }
      });
    });
  });
  $("#collection").click(function(){
    //收藏量
    function list(start,size){
        $.ajax({
            type:"post",
            url:"<?php echo url('all/dataCollection'); ?>",
            data:{start: start,size: size,subject_chapter_no: "<?php echo $discussionNum; ?>"},
            timeout:10000,
            error:function (){
                alert('发送请求超时，请稍后重试');
                //console.log("请求失败");
            },
            success:function(result){
                $("#list-conts").empty();
                $.each(result.data,function (index,value) {
                    $("#list-conts").append(
                        '<div class="item"><div class="img"><a href="/public/index/index/details?id='+value.id+'">' +
                            '<img src="' +value.pic+'" width="280" height="280"></a></div><div class="text"><p class="title">'+value.name+'</p><p class="price"><span class="pri">￥'+value.realPrice+'</span><span class="nub">'+value.saleNum+'付款</span></p></div></div>'
                    );
                });
            }
        });
    }
    var pageSize = 9;  //每页显示的条数
    var discussionNum = '<?php echo $discussionNum; ?>'; //数据总数
    //layui分页样式
    layui.use(['laypage', 'layer'], function(){
    var laypage = layui.laypage
    ,layer = layui.layer;
    //总页数大于页码总数
    laypage.render({
        elem: 'disscussionListPage'//标签ID
        ,limit: pageSize  //每页显示的条数
        ,count: discussionNum //数据总数
        ,jump: function(obj){
            //console.log(obj.curr);
            list(obj.curr,pageSize); //通过obj.curr传递当前页
        }
      });
    });
  });
});
//初始化
function list(start,size){
        $.ajax({
            type:"post",
            url:"<?php echo url('all/data'); ?>",
            data:{start: start,size: size,subject_chapter_no: "<?php echo $discussionNum; ?>"},
            timeout:10000,
            error:function (){
                alert('发送请求超时，请稍后重试');
                //console.log("请求失败");
            },
            success:function(result){
                $("#list-conts").empty();
                $.each(result.data,function (index,value) {
                    $("#list-conts").append(
                        '<div class="item"><div class="img"><a href="/public/index/index/details?id='+value.id+'">' +
                            '<img src="' +value.pic+'" width="280" height="280"></a></div><div class="text"><p class="title">'+value.name+'</p><p class="price"><span class="pri">￥'+value.realPrice+'</span><span class="nub">'+value.saleNum+'付款</span></p></div></div>'
                    );
                });
            }
        });
    }

var pageSize = 9;  //每页显示的条数
var discussionNum = '<?php echo $discussionNum; ?>'; //数据总数
 
//layui分页样式
layui.use(['laypage', 'layer'], function(){
    var laypage = layui.laypage
    ,layer = layui.layer;
    //总页数大于页码总数
    laypage.render({
        elem: 'disscussionListPage'//标签ID
        ,limit: pageSize  //每页显示的条数
        ,count: discussionNum //数据总数
        ,jump: function(obj){
            //console.log(obj.curr);
            list(obj.curr,pageSize); //通过obj.curr传递当前页
        }
    });
});


    //列表功能
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


</body>
</html>