<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\info\addupdate.html";i:1588904241;}*/ ?>
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
<body>
  <div class="content content-nav-base commodity-content">
   
    <div class="commod-cont-wrap">
      <div class="commod-cont w1200 layui-clear">
         
        <div class="right-cont-wrap">
          <div class="right-cont" style="background-color: #fff;min-height: 500px;height: auto;padding: 0px 10px 10px 0;width: 850px;margin-top: -50px">
              <div class="layui-tab">
                   
                  <div class="layui-tab-content">
                    <!-- 基本信息 -->
                    <div class="layui-tab-item layui-show">
                       <form class="layui-form" action="" id="formData">
                        <div class="layui-form-item">
                          <label class="layui-form-label">收货人:</label>
                          <div class="layui-input-inline">
                            <input type="text" name="name" required  lay-verify="required" placeholder="请输入收货人" autocomplete="off" class="layui-input" value="<?php echo $info['name']; ?>">
                            <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                          </div>
                        </div>
                        
                        <div class="layui-form-item">
                          <label class="layui-form-label">手机号:</label>
                          <div class="layui-input-block">
                            <input type="tel" name="phone" required  lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input" value="<?php echo $info['phone']; ?>">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">邮编:</label>
                          <div class="layui-input-inline">
                            <input type="text" name="code" required  lay-verify="required" placeholder="请输入邮编" autocomplete="off" class="layui-input" value="<?php echo $info['code']; ?>">
                          </div>
                        </div>
                        
                        <div class="layui-form-item" id="area-picker">
                          <div class="layui-form-label">地址</div>
                          <div class="layui-input-inline" style="width: 200px;">
                            <select name="province" class="province-selector" data-value="" lay-filter="province-1">
                              <option value="<?php echo $info['province']; ?>"><?php echo $info['province']; ?></option>
                            </select>
                          </div>
                          <div class="layui-input-inline" style="width: 200px;">
                              <select name="city" class="city-selector" data-value="" lay-filter="city-1">
                                  <option value="<?php echo $info['city']; ?>"><?php echo $info['city']; ?></option>
                              </select>
                          </div>
                          <div class="layui-input-inline" style="width: 200px;">
                              <select name="area" class="county-selector" data-value="" lay-filter="county-1">
                                  <option value="<?php echo $info['area']; ?>"><?php echo $info['area']; ?></option>
                              </select>
                          </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                          <label class="layui-form-label">详细住址:</label>
                          <div class="layui-input-block">
                            <textarea name="address" placeholder="请输入内容" class="layui-textarea"><?php echo $info['address']; ?></textarea>
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <div class="layui-input-block">
                            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="formDemo">修改</button>
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
  
 
<script src="__PUBLIC__static/js/jquery.js"></script>
<script>
      
</script>
<script>
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

 layui.use(['form', 'layer','jquery'],
            function() {
                $ = layui.jquery;
                form = layui.form;
                layer = layui.layer;
            
                //监听提交
                form.on('submit(formDemo)',
                function(data) {
                    console.log(data.field);
                    //发异步，把数据提交给php
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('edit/address'); ?>",
                        data: $("#formData").serialize(),
                        dataType:"json",
                        async:false,
                        success:function(res){
                            if(res.status == 1){
                                layer.msg(res.message,{
                                    icon:6,
                                    time:2000
                                },
                                function(){
                                   // 获得frame索引
                                    var index = parent.layer.getFrameIndex(window.name);
                                    //关闭当前frame
                                    parent.layer.close(index);
                                    self.opener.location.reload();
                                });
                            }else{
                                layer.alert(res.message,{
                                    icon:5
                                },
                                function(){
                                     // 获得frame索引
                                    var index = parent.layer.getFrameIndex(window.name);
                                    //关闭当前frame
                                    parent.layer.close(index);
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