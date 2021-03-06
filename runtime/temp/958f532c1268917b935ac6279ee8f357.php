<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\user\edit.html";i:1585879043;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>添加会员</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="__PUBLIC__css/font.css">
        <link rel="stylesheet" href="__PUBLIC__css/xadmin.css">
        <script type="text/javascript" src="__PUBLIC__js/jquery.min.js"></script>
        <script type="text/javascript" src="__PUBLIC__lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="__PUBLIC__js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
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
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>会员名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="name" value="<?php echo $user['name']; ?>" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>"l>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>真实姓名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="trueName" value="<?php echo $user['trueName']; ?>" required="" lay-verify="truename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="phone" class="layui-form-label">
                            <span class="x-red">*</span>手机号</label>
                        <div class="layui-input-inline">
                            <input type="tel" id="phone" name="phone" value="<?php echo $user['phone']; ?>" lay-verify="required|phone" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_email" class="layui-form-label">邮箱</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_email" name="email" value="<?php echo $user['email']; ?>" lay-verify="email" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">性别</label>
                        <div class="layui-input-block">
                            <?php if($user['sex'] == 1): ?>
                            <input type="radio" name="sex" value="1" title="男" checked="">
                            <input type="radio" name="sex" value="2" title="女">
                            <?php elseif($user['sex'] == 2): ?>
                            <input type="radio" name="sex" value="1" title="男">
                            <input type="radio" name="sex" value="2" title="女" checked="">
                            <?php endif; ?>
                        </div>
                    </div>
                     
                   
                    <div class="layui-form-item x-city" id="end">
                        <label class="layui-form-label">城市联动</label>
                        <div class="layui-input-inline">
                            <select name="province" lay-filter="province">
                              <option value="">请选择省</option>
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <select name="city" lay-filter="city">
                              <option value="">请选择市</option>
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <select name="area" lay-filter="area">
                              <option value="">请选择县/区</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                      <label class="layui-form-label">详细地址</label>
                      <div class="layui-input-block">
                        <textarea placeholder="请输入内容" class="layui-textarea" name="address"><?php echo $user['address']; ?></textarea>
                      </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-submit lay-filter="add">修改</button>
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="__PUBLIC__js/xcity.js"></script>
<script>
            layui.use(['form', 'layer','jquery','code'],
            function() {
                $ = layui.jquery;
                form = layui.form;
                layer = layui.layer;
                layui.code();
                $('#end').xcity('<?php echo $user['province']; ?>','<?php echo $user['city']; ?>','<?php echo $user['area']; ?>');

                //自定义验证规则
                form.verify({
                    nikename: function(value) {
                        if (value.length < 2) {
                            return '昵称至少得5个字符啊';
                        }
                    },
                    pass: [/(.+){6,12}$/, '密码必须6到12位'],
                    repass: function(value) {
                        if ($('#L_pass').val() != $('#L_repass').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('edit/user'); ?>",
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