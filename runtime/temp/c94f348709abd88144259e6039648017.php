<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:81:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\order\view.html";i:1588495063;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
                <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                                <thead>
                                    <tr>
                                         
                                        <th>商品名称</th>
                                        <th>图片</th>
                                        <th>数量</th>
                                        <th>单品价格</th>
                                        <th>总计</th>
                                         
                                         
                                </thead>
                                <tbody>
                                    <?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                       
                                        <td><?php echo $vo['pname']; ?></td>
                                        <td><img src="<?php echo $vo['pic']; ?>" alt="" width="100" height="100"></td>
                                        <td><?php echo $vo['num']; ?></td>
                                        <td><?php echo $vo['realPrice']; ?></td>
                                    
                                        <td><?php echo $vo['b_price']; ?></td> 
                                        
                                      
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //监听提交
                form.on('submit(save)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    $.ajax({
                        type: "POST",
                        url: "<?php echo url('edit/passAdmin'); ?>",
                        data: $("#formData").serialize(),
                        dataType:'json',
                        async:false,
                        success:function(res){
                            if(res.status == 1){
                                layer.alert(res.message,{icon:6},function(){
                                     // 获得frame索引
                                    var index = parent.layer.getFrameIndex(window.name);
                                    //关闭当前frame
                                    parent.layer.close(index);
                                });
                            }else{
                                layer.alert(res.message,{icon:5},function(){
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

            });</script>
      
    </body>

</html>