<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\banner\edit.html";i:1587029040;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
    <style>
.file {
    position: relative;
    display: inline-block;
    background:#48b0f7;
    border-color: #48b0f7;
    border-radius: 2px;
    padding: 10px 15px;
    overflow: hidden;
    color: #fff;
    text-decoration: none;
    text-indent: 0;
    line-height: 20px;
}
.file input {
    position: absolute;
    font-size: 100px;
    right: 0;
    top: 0;
    opacity: 0;
}
.file:hover {
    background: #46b8da;
    border-color: #46b8da;
    color: #fff;
    text-decoration: none;
}
</style>
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-card">
                <div class="layui-card-body"><h2>Banner图效果查看</h2></div>
                <div class="layui-row" style="background-color: #fff;">
              <div class="layui-container" >
                <div class="layui-row">
                  <div class="layui-col-md6 layui-col-sm6 layui-col-xs6 layui-col-md-offset3">
                    <form class="layui-form" action="" method="post" enctype="multipart/form-data"> 
                    <div class="layui-form-item" id="img">
                        <label class="layui-form-label">
                            <span class="x-red">*</span>Banner图
                        </label>
                        <button type="button" class="layui-upload-drag" id="upload_img_icon">
                            <img id="imgSrc" src="<?php echo $banner['pic']; ?>" style="width:180px;height:90px;"/><input type="hidden" value="<?php echo $banner['pic']; ?>" name="imagepath"/>
                        </button>
                    </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">链接商品</label>
                        <div class="layui-input-block">
                            <input type="hidden" name="id" id="pid" value="<?php echo $banner['id']; ?>">
                          <select name="p_id" id="p_id" lay-verify="required">
                            <option value="<?php echo $banner['p_id']; ?>"><?php echo $banner['name']; ?></option>
                            <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-offset-3 col-md-offset-4">
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" type="button" lay-submit lay-filter="formDemo">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
                </div>
            </div>
        </div>
        <script>
        layui.use(['upload','form','layer','laydate'], function() {
            var form = layui.form;
            var upload = layui.upload;
            var layer = layui.layer;
            var $=layui.jquery;
            form.verify({
                //number:[/[\S]+/, "必填项不能为空"],
            });
            form.on('submit(formDemo)', function(data){
                var imgSrc=encodeURIComponent($("#imgSrc").attr("src"));
                var p_id=$("#p_id").serialize();
                var id=$("#id").serialize();
                $.ajax({
                    type:'post',
                    url:'<?php echo url('edit/bannerLink'); ?>?imgSrc='+imgSrc+'&'+p_id+'&'+id,
                    dateType:'json',
                    contentType: "application/json",
                    data:JSON.stringify(data.field),//json数据格式
                    async:false,   //是否异步请求，如果是true代表异步，那么不等服务器返回，函数就向下运行。
                    cache:false,
                    success:function (result) {
                        if(result.static==1){
                            layer.alert(result.message,{
                                    icon:6
                                },
                                function(){
                                    xadmin.close();
                                    // 可以对父窗口进行刷新 
                                    xadmin.father_reload();
                                });
                        }else{
                            layer.alert(result.message,{
                                    icon:6
                                },
                                function(){
                                    xadmin.close();
                                    // 可以对父窗口进行刷新 
                                    xadmin.father_reload();
                                });
                        }
                    }
                });
                return false;
            });
            //拖拽上传
            upload.render({
                elem: '#upload_img_icon', //绑定元素
                url: '<?php echo url('edit/upload'); ?>',
                size: 5242880,
                before: function(res){
                    console.log(res.filename);      
                },
                done: function(res){
                    console.log(res.filename);
                    $('#img').append('<img id="imgSrc" src="/public'+res.filename+'" style="width:250px;height:100px;"/><input type="hidden" value="'+res.filename+'" name="imagepath"/>');
                    $("#upload_img_icon").remove();
                },
                error:function(res){
                    layer.alert('发送请求失败！');
                }
            });
        });
    </script>
    </body>

</html>
