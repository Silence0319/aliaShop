<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\system\info.html";i:1588915232;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form" id="formData">
                  <div class="layui-form-item">
                      <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>登录名
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="username" value="<?php echo $admin['username']; ?>" required="" disabled="" lay-verify="nikename" autocomplete="off" class="layui-input">
                          <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
                      </div>
                  </div>
                  <div class="layui-form-item">
                      <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>真实姓名
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="username" name="name" value="<?php echo $admin['name']; ?>" required="" lay-verify="name"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-form-item">
                      <label for="phone" class="layui-form-label">
                          <span class="x-red">*</span>手机
                      </label>
                      <div class="layui-input-inline">
                          <input type="tel" id="phone" name="phone" value="<?php echo $admin['phone']; ?>" required="" lay-verify="phone"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  
                  <div class="layui-form-item">
                    <label class="layui-form-label">
                      <span class="x-red">*</span>身份证号
                    </label>
                    <div class="layui-input-inline">
                      <input type="text" name="IDnumber" value="<?php echo $admin['IDnumber']; ?>" lay-verify="identity" placeholder="" autocomplete="off" class="layui-input">
                    </div>
                  </div>

                  <div class="layui-form-item">
                      <label for="L_email" class="layui-form-label">
                          <span class="x-red">*</span>邮箱
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="L_email" name="email" value="<?php echo $admin['email']; ?>" required="" lay-verify="email"
                          autocomplete="off" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                      </div>
                  </div>
          
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="add" lay-submit="">
                          修改
                      </button>
                  </div>
              </form>
            </div>
        </div>
        <script>
          layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
                 

                //自定义验证规则
                form.verify({
                    nikename: function(value) {
                        if (value.length < 2) {
                            return '昵称至少得2个字符啊';
                        }
                    },
                    
                });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    $.ajax({
                      type: "POST",
                        url: "<?php echo url('edit/admin'); ?>",
                        data: $("#formData").serialize(),
                        dataType:"json",
                        async:false,
                        success:function(res){
                            if(res.status == 1){
                                layer.alert(res.message,{
                                    icon:6
                                },
                                function(){
                                    xadmin.close();
                                    // 可以对父窗口进行刷新 
                                    xadmin.father_reload();
                                });
                            }else{
                                layer.alert(res.message,{
                                    icon:5
                                },
                                function(){
                                    xadmin.close();
                                    // 可以对父窗口进行刷新 
                                    xadmin.father_reload();
                                });
                            }
                        },
                        error:function(res){
                            layer.alert('发送请求失败！');
                        }
                    });
                  
                    return false;
                });

            });
          </script>
    </body>

</html>
