<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\login\index.html";i:1589163214;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="__PUBLIC__css/font.css">
        <link rel="stylesheet" href="__PUBLIC__css/xadmin.css">
        <script src="__PUBLIC__lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="__PUBLIC__js/xadmin.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="__PUBLIC__css/login.css">
</head>
<body>
  <div class="container">
    <div class="login-wrapper">
      <div class="header">登录</div>
      <div class="form-wrapper">
        <input type="text" name="username" id="username" placeholder="用户名" class="input-item">
        <input type="password" name="password" id="password" placeholder="密码" class="input-item">
        <div class="btn" id="login" style="cursor: pointer;">登录</div>
      </div>
      <div class="msg">

      </div>
    </div>
  </div>
  <script>
    layui.use(['jquery','layer'],function(){
      var $=layui.jquery,layer=layui.layer;

      $("#login").on('click',function(){
        //layer.msg('sss');
        var username=$("#username").val();
        var password=$("#password").val();
        $.ajax({
          type:"post",
          url:"<?php echo url('login/check'); ?>",
          data:{username:username,password:password},
          dataType:"json",
          success:function(res){
            if(res.status==1){
              layer.msg(res.message,{icon:6,time:1000},function(){
                window.location.href="<?php echo url('index/index'); ?>";
              });
            }else{
              layer.msg(res.message,{icon:5,time:1000})
            }
          }
        });
      });
    });
  </script>
</body>
</html>