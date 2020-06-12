<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\info\index.html";i:1588905383;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>


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
          <div class="right-cont" style="background-color: #fff;min-height: 500px;height: auto;width: 850px">
            <!-- 订单 -->
            <div>
              <div class="layui-tab">
                  <ul class="layui-tab-title">
                    <li class="layui-this">基本信息</li>
                    <li>修改信息</li>
                  </ul>
                  <div class="layui-tab-content">
                    <!-- 基本信息 -->
                    <div class="layui-tab-item layui-show">
                      <form class="layui-form" action="">
                        <div class="layui-form-item" style="margin-bottom: 8px;">
                          <label class="layui-form-label">会员名:</label>
                          <div class="layui-input-inline" style="padding: 11px 0">
                            <p><?php echo $user['name']; ?></p>
                          </div>
                        </div>
                        <div class="layui-form-item" style="margin-bottom: 8px;">
                          <label class="layui-form-label">邮箱:</label>
                          <div class="layui-input-inline" style="padding: 11px 0">
                            <p><?php echo $user['email']; ?></p>
                          </div>
                        </div>
                        <div class="layui-form-item" style="margin-bottom: 8px;">
                          <label class="layui-form-label">手机号:</label>
                          <div class="layui-input-inline" style="padding: 11px 0">
                            <p><?php echo $user['phone']; ?></p>
                          </div>
                        </div>
                        <div class="layui-form-item" style="margin-bottom: 8px;">
                          <label class="layui-form-label">真实姓名:</label>
                          <div class="layui-input-inline" style="padding: 11px 0">
                            <p><?php echo $user['trueName']; ?></p>
                          </div>
                        </div>
                         
                        <div class="layui-form-item" style="margin-bottom: 8px;">
                          <label class="layui-form-label">性别:</label>
                          <div class="layui-input-inline" style="padding: 11px 0">
                            <p>
                              <?php if($user['sex'] == 1): ?>
                              男
                              <?php elseif($user['sex'] == 2): ?>
                              女
                              <?php endif; ?>
                            </p>
                          </div>
                        </div>
                        
                        <div class="layui-form-item" style="margin-bottom: 0px;">
                          <label class="layui-form-label">住址:</label>
                          <div class="layui-input-block" style="padding: 11px 0">
                            <p><?php echo $user['province']; ?><?php echo $user['city']; ?><?php echo $user['area']; ?><?php echo $user['address']; ?></p>
                          </div>
                        </div>
                        <div class="layui-form-item" style="margin-bottom: 8px;">
                          <label class="layui-form-label">加入时间:</label>
                          <div class="layui-input-block" style="padding: 11px 0">
                            <p><?php echo $user['inTime']; ?></p>
                          </div>
                        </div>
                         
                         
                      </form>
                    </div>
                    <!-- 修改信息 -->
                    <div class="layui-tab-item">
                      <form class="layui-form" action="" id="formData">
                        <div class="layui-form-item">
                          <label class="layui-form-label">会员名:</label>
                          <div class="layui-input-inline">
                            <input type="text" name="name" required  lay-verify="required" placeholder="请输入会员名" autocomplete="off" class="layui-input" value="<?php echo $user['name']; ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">邮箱:</label>
                          <div class="layui-input-block">
                            <input type="email" name="email" required  lay-verify="required" placeholder="请输入邮箱" autocomplete="off" class="layui-input" value="<?php echo $user['email']; ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">手机号:</label>
                          <div class="layui-input-block">
                            <input type="tel" name="phone" required  lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" value="<?php echo $user['phone']; ?>" disabled="">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">真实姓名:</label>
                          <div class="layui-input-inline">
                            <input type="text" name="trueName" required  lay-verify="required" placeholder="请输入真实姓名" autocomplete="off" class="layui-input" value="<?php echo $user['trueName']; ?>">
                          </div>
                        </div>
                       
                        <div class="layui-form-item">
                          <label class="layui-form-label">单选框:</label>
                          <div class="layui-input-block">
                            <?php if($user['sex'] == 1): ?>
                            <input type="radio" name="sex" value="1" title="男" checked>
                            <input type="radio" name="sex" value="2" title="女">
                            <?php elseif($user['sex'] == 2): ?>
                            <input type="radio" name="sex" value="1" title="男" >
                            <input type="radio" name="sex" value="2" title="女" checked>
                            <?php endif; ?>
                          </div>
                        </div>
                        
                        <div class="layui-form-item" id="area-picker">
                          <div class="layui-form-label">地址</div>
                          <div class="layui-input-inline" style="width: 200px;">
                            <select name="province" class="province-selector" data-value="" lay-filter="province-1">
                              <option value="">--选择省--</option>
                            </select>
                          </div>
                          <div class="layui-input-inline" style="width: 200px;">
                              <select name="city" class="city-selector" data-value="" lay-filter="city-1">
                                  <option value="">--选择市--</option>
                              </select>
                          </div>
                          <div class="layui-input-inline" style="width: 200px;">
                              <select name="area" class="county-selector" data-value="" lay-filter="county-1">
                                  <option value="">--选择区--</option>
                              </select>
                          </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                          <label class="layui-form-label">详细住址:</label>
                          <div class="layui-input-block">
                            <textarea name="address" placeholder="请输入内容" class="layui-textarea"><?php echo $user['address']; ?></textarea>
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <div class="layui-input-block">
                            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="submit">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
                          </div>
                        </div>
                      </form>
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


//表单验证
layui.use(['form','layedit','laydate','jquery'], function(){
  var form=layui.form
  ,layer=layui.layer
  ,layedit=layui.layedit
  ,laydate=layui.laydate
  ,$=layui.jquery;

  //日期
  laydate.render({
    elem: '#date'
  });
  
  //表单提交
  form.on('submit(submit)',function(data){
    console.log(data);
    $.ajax({
      type:"post",
      url:"<?php echo url('edit/info'); ?>",
      data:$("#formData").serialize(),
      dataType:"json",
      success:function(res){
        if(res.status==1){
          layer.msg(res.message);
        }
      },
      error:function(res)
      {
        layer.msg('发送请求失败');
      }
    });
  });

});

//三级联动，配置插件目录
        layui.config({
            base: '__PUBLIC__static/mods/'
            , version: '1.0'
        });
        //一般直接写在一个js文件中
        layui.use(['layer', 'form', 'layarea'], function () {
            var layer = layui.layer
                , form = layui.form
                , layarea = layui.layarea;

            layarea.render({
                elem: '#area-picker',
                change: function (res) {
                    //选择结果
                    console.log(res);
                }
            });
        });
 
 
</script>


</body>
</html>