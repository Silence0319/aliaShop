<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\product\list.html";i:1589444127;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
        <div class="x-nav">
            <span class="layui-breadcrumb">
                <a href="">首页</a>
                <a href="">演示</a>
                <a>
                    <cite>导航元素</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5" method="post" action="">
                                <div class="layui-input-inline layui-show-xs-block">
                                    <input class="layui-input" placeholder="开始日" name="start" id="start"></div>
                                <div class="layui-input-inline layui-show-xs-block">
                                    <input class="layui-input" placeholder="截止日" name="end" id="end"></div>
                              
                                <div class="layui-input-inline layui-show-xs-block">
                                    <select name="c_id">
                                        <option value="">商品分类</option>
                                        <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['catename']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                                <div class="layui-input-inline layui-show-xs-block">
                                    <input type="text" name="name" placeholder="请输入商品名" autocomplete="off" class="layui-input"></div>
                                <div class="layui-input-inline layui-show-xs-block">
                                    <button class="layui-btn" lay-submit="" lay-filter="sreach">
                                        <i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()">
                                <i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加订单','<?php echo url('product/add'); ?>')">
                                <i class="layui-icon"></i>添加</button></div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="" lay-skin="primary">
                                        </th>
                                        <th>商品名称</th>
                                        <th>图片</th>
                                        <th>参考价格</th>
                                        <th>实际价格</th>
                                        <th>所属类型</th>
                                        <th>库存</th>
                                        <th>点击量</th>
                                        <th>上架时间</th>
                                        <th>状态</th>
                                        <th>操作</th></tr>
                                </thead>
                                <tbody>
                                	<?php if(is_array($product) || $product instanceof \think\Collection || $product instanceof \think\Paginator): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="" lay-skin="primary"></td>
                                        <td><?php echo $vo['name']; ?></td>
                                        <td><img src="<?php echo $vo['pic']; ?>" alt="" width="100" height="100"></td>
                                        <td><?php echo $vo['price']; ?></td>
                                        <td><?php echo $vo['realPrice']; ?></td>
                                        <td><?php echo $vo['catename']; ?></td>
                                        <td><?php echo $vo['num']; ?></td>
                                        <td><?php echo $vo['click']; ?></td>
                                        <td><?php echo $vo['putTime']; ?></td>
                                        <td class="td-status" style="text-align: center;">
                                            <?php if($vo['status'] == 1): ?>
                                    		<span>已上架</span>
                                            <?php elseif($vo['status'] == 0): ?>
                                            <span>已下架</span>
                                            <?php endif; ?>
                                            <br>
                                            <?php if($vo['type'] == 1): ?>
                                            <p>今日团购</p>
                                            <?php elseif($vo['type'] == 2): ?>
                                            <p>明日预告</p>
                                            <?php else: ?>
                                            <p></p>
                                            <?php endif; ?>
                                    	</td>
                                        <td class="td-manage">
                                        	<?php if($vo['status'] == 1): ?>
                                            <a onclick="product_stop(this,'<?php echo $vo['id']; ?>')" href="javascript:;"  title="下架">
                                                <i class="layui-icon">&#xe601;</i>
                                            </a>
                                            <?php elseif($vo['status'] == 0): ?>
                                            <a onclick="product_start(this,'<?php echo $vo['id']; ?>')" href="javascript:;"  title="上架">
                                                <i class="layui-icon">&#xe62f;</i>
                                            </a>
                                            <?php endif; ?>
                                            
                                            <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('product/edit',array('id'=>$vo['id'])); ?>')" href="javascript:;">
                                                <i class="layui-icon">&#xe642;</i>
                                            </a>
                                            <a title="删除" onclick="product_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;">
                                                <i class="layui-icon">&#xe640;</i>
                                            </a><br>&nbsp;&nbsp;
                                            <a title="今日团购" onclick="today_buy(this,'<?php echo $vo['id']; ?>')" href="javascript:;">
                                                <i class="icon iconfont">&#xe6f3;</i>
                                            </a>
                                            <a title="明日预告" onclick="tomorrow_buy(this,'<?php echo $vo['id']; ?>')" href="javascript:;">
                                                <i class="icon iconfont">&#xe70e;</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <?php echo $product->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>layui.use(['laydate', 'form'],
        function() {
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
                elem: '#start' //指定元素
            });

            //执行一个laydate实例
            laydate.render({
                elem: '#end' //指定元素
            });
        });

       /*商品下架*/
      function product_stop(obj,id){
        if($(obj).attr('title')=='下架'){
          layer.confirm('确认要下架吗？',function(index){
            //发异步把用户状态进行更改
            $.get("<?php echo url('product/stop'); ?>",{id:id});
            $(obj).attr('title','上架')
            $(obj).find('i').html('&#xe62f;');
            $(obj).parents("tr").find(".td-status").find('span').html('已下架');
            layer.msg('已下架！',{icon: 5,time:1000});
          });
        }else if($(obj).attr('title')=='上架'){
          layer.confirm('确认要上架吗？',function(index){
          //发异步把用户状态进行更改
          $.get("<?php echo url('product/start'); ?>",{id:id});
          $(obj).attr('title','下架')
          $(obj).find('i').html('&#xe601;');
          $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已上架');
          layer.msg('已上架！',{icon: 6,time:1000});
        });
        }
      }
      /*商品上架*/
      function product_start(obj,id){
        if($(obj).attr('title')=='上架'){
          layer.confirm('确认要上架吗？',function(index){
          //发异步把用户状态进行更改
          $.get("<?php echo url('product/start'); ?>",{id:id});
          $(obj).attr('title','下架')
          $(obj).find('i').html('&#xe601;');
          $(obj).parents("tr").find(".td-status").find('span').html('已上架');
          layer.msg('已上架！',{icon: 6,time:1000});
        });
        }else if($(obj).attr('title')=='下架'){
          layer.confirm('确认要下架吗？',function(index){
            //发异步把用户状态进行更改
            $.get("<?php echo url('product/stop'); ?>",{id:id});
            $(obj).attr('title','上架')
            $(obj).find('i').html('&#xe62f;');
            $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已下架');
            layer.msg('已下架！',{icon: 5,time:1000});
          });
        }
      }

        /*商品-删除*/
        function product_del(obj, id) {
            layer.confirm('确认要删除吗？',
            function(index) {
                //发异步删除数据
                $.get("<?php echo url('del/product'); ?>",{id:id});
                $(obj).parents("tr").remove();
                layer.msg('已删除!', {
                    icon: 1,
                    time: 1000
                });
            });
        }
        /*加入今日团购*/
        function today_buy(obj, id) {
            layer.confirm('确认要加入今日团购吗？',
            function(index) {
                //发异步删除数据
                $.get("<?php echo url('add/todaybuy'); ?>",{id:id});
                //$(obj).parents("tr").remove();
                $(obj).parents("tr").find(".td-status").find('p').html('今日团购');
                layer.msg('已加入今日团购!', {
                    icon: 1,
                    time: 1000
                });
            });
        }
        /*加入明日预告*/
        function tomorrow_buy(obj, id) {
            layer.confirm('确认要加入明日预告吗？',
            function(index) {
                //发异步删除数据
                $.get("<?php echo url('add/tomorrow'); ?>",{id:id});
                //$(obj).parents("tr").remove();
                $(obj).parents("tr").find(".td-status").find('p').html('明日预告');
                layer.msg('已加入明日预告!', {
                    icon: 1,
                    time: 1000
                });
            });
        }

        function delAll(argument) {

            var data = tableCheck.getData();

            layer.confirm('确认要删除吗？' + data,
            function(index) {
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', {
                    icon: 1
                });
                $(".layui-form-checked").not('.header').parents('tr').remove();
            });
        }</script>

</html>