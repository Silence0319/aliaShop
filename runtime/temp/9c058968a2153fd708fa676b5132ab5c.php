<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\banner\list.html";i:1587022753;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
                           
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加用户','<?php echo url('banner/add'); ?>',800,600)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <!-- <th>排序</th> -->
                                    <th>图片</th>
                                    <th>尺寸(大小)</th>
                                    <th>链接商品</th>
                                    <th>加入时间</th>
                                    <th>状态</th>
                                    <th>操作</th></tr>
                                </thead>
                                <tbody>
                                  <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="id" value="<?php echo $vo['id']; ?>"   lay-skin="primary"> 
                                    </td>
                                    <!-- <td><?php echo $vo['scort']; ?></td> -->
                                    <td><img src="<?php echo $vo['pic']; ?>"></td>
                                    <td>1440x617</td>
                                    <td><?php echo $vo['name']; ?></td>
                                    <td><?php echo $vo['inTime']; ?></td>
                                    <td class="td-status">
                                      <?php if($vo['status'] == 1): ?>
                                      <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>
                                      <?php elseif($vo['status'] == 2): ?>
                                      <span class="layui-btn layui-btn-normal layui-btn-disabled layui-btn-mini">已停用</span>
                                      <?php endif; ?>
                                    </td>
                                    <td class="td-manage">
                                      <?php if($vo['status'] == 1): ?>
                                      <a onclick="member_stop(this,'<?php echo $vo['id']; ?>')" href="javascript:;"  title="停用">
                                        <i class="layui-icon">&#xe601;</i>
                                      </a>
                                      <?php elseif($vo['status'] == 2): ?>
                                      <a onclick="member_start(this,'<?php echo $vo['id']; ?>')" href="javascript:;"  title="启用">
                                        <i class="layui-icon">&#xe62f;</i>
                                      </a>
                                      <?php endif; ?>
                                      <a title="编辑"  onclick="xadmin.open('编辑','<?php echo url('banner/edit',array('id'=>$vo['id'])); ?>',800,600)" href="javascript:;">
                                        <i class="layui-icon">&#xe642;</i>
                                      </a>
                                    
                                      <a title="删除" onclick="member_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;">
                                        <i class="layui-icon">&#xe640;</i>
                                      </a>
                                    </td>
                                  </tr>
                                  <?php endforeach; endif; else: echo "" ;endif; ?>
                                  
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <div>
                                  <?php echo $banner->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;


        // 监听全选
        form.on('checkbox(checkall)', function(data){

          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });


      });

       /*轮播停用*/
      function member_stop(obj,id){
        if($(obj).attr('title')=='停用'){
          layer.confirm('确认要停用吗？',function(index){
            //发异步把轮播状态进行更改
            $.get("<?php echo url('banner/stop'); ?>",{id:id});
            $(obj).attr('title','启用')
            $(obj).find('i').html('&#xe62f;');
            $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
            layer.msg('已停用！',{icon: 5,time:1000});
          });
        }else if($(obj).attr('title')=='启用'){
          layer.confirm('确认要启用吗？',function(index){
          //发异步把轮播状态进行更改
          $.get("<?php echo url('banner/start'); ?>",{id:id});
          $(obj).attr('title','停用')
          $(obj).find('i').html('&#xe601;');
          $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
          layer.msg('已启用！',{icon: 6,time:1000});
        });
        }
      }
      /*轮播启用*/
      function member_start(obj,id){
        if($(obj).attr('title')=='启用'){
          layer.confirm('确认要启用吗？',function(index){
          //发异步把轮播状态进行更改
          $.get("<?php echo url('banner/start'); ?>",{id:id});
          $(obj).attr('title','停用')
          $(obj).find('i').html('&#xe601;');
          $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
          layer.msg('已启用！',{icon: 6,time:1000});
        });
        }else if($(obj).attr('title')=='停用'){
          layer.confirm('确认要停用吗？',function(index){
            //发异步把轮播状态进行更改
            $.get("<?php echo url('banner/stop'); ?>",{id:id});
            $(obj).attr('title','启用')
            $(obj).find('i').html('&#xe62f;');
            $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
            layer.msg('已停用！',{icon: 5,time:1000});
          });
        }
      }

      /*Banner-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.get("<?php echo url('del/banner'); ?>",{id:id});
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {
        var ids = [];

        // 获取选中的id 
        $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });
  
        layer.confirm('确认要删除吗？'+ids.toString(),function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
</html>