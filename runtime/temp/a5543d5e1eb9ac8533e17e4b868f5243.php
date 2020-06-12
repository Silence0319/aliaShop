<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\cate\oneadd.html";i:1585879405;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
                        <label for="L_username" class="layui-form-label">一级栏目名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="catename" value="" class="layui-input" placeholder="请输入一级栏目名" required="" lay-verify="catename" autocomplete="off">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="scort" class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="number" id="scort" name="scort" value="" class="layui-input" placeholder="例：1,2,3,4,5" required="" lay-verify="scort" autocomplete="off">
                        </div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="save" lay-submit="">新增</button></div>
                </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                form.verify({
                    catename: function(value){
                        if(value.length<2){
                            return '一级栏目名至少得2个字符！';
                        }
                    },
                    scort:[/(^[1-9]\d*$)/,'排序必须为正整数'],
                });
                //监听提交
                form.on('submit(save)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('add/onelevel'); ?>",
                        data: $("#formData").serialize(),
                        dataType:'json',
                        async:false,
                        success:function(res){
                            if(res.status == 1){
                                layer.alert(res.message,{icon:6},function(){
                                    xadmin.close();
                                    // 可以对父窗口进行刷新 
                                    xadmin.father_reload();
                                });
                            }else{
                                layer.alert(res.message,{icon:5},function(){
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

            });</script>
      
    </body>

</html>