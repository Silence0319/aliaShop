<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\cate\list.html";i:1585880774;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>栏目分类</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="__PUBLIC__css/font.css">
        <link rel="stylesheet" href="__PUBLIC__css/xadmin.css">
        <script type="text/javascript" src="__PUBLIC__js/jquery.min.js"></script>
        <script src="__PUBLIC__lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="__PUBLIC__js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
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
                           
                                <div class="layui-input-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="oneAdd" onclick="xadmin.open('添加用户','<?php echo url('cate/oneadd'); ?>',850,700)"><i class="layui-icon"></i>增加</button>
                                </div>
                          
                            <hr>

                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()">
                                <i class="layui-icon"></i>批量删除</button>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th width="20">
                                    <input type="checkbox" name="" lay-skin="primary">
                                  </th>
                                  <th width="70">ID</th>
                                  <th>栏目名</th>
                                  <th width="50">排序</th>
                                  <th width="80">状态</th>
                                  <th width="250">操作</th>
                              </thead>
                              <tbody class="x-cate">
                          <?php if(is_array($onelevel) || $onelevel instanceof \think\Collection || $onelevel instanceof \think\Paginator): $k = 0; $__LIST__ = $onelevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                <tr cate-id='<?php echo $vo['id']; ?>' fid='0' >
                                  <td>
                                   <input type="checkbox" name="" lay-skin="primary">
                                  </td>
                                  <td><?php echo $vo['id']; ?></td>
                                  <td>
                                    
                                    <i class="layui-icon x-show" status='true'>&#xe623;</i><?php echo $vo['catename']; ?>
                                  </td>
                                  <td><input type="text" class="layui-input x-sort" name="order" value="<?php echo $vo['scort']; ?>"></td>
                                  <td>
                                    <input type="checkbox" name="switch"  lay-text="开启|停用"  checked="" lay-skin="switch">
                                  </td>
                                  <td class="td-manage">
                                    <button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','<?php echo url('cate/oneedit',array('id'=>$vo['id'])); ?>',850,700)" ><i class="layui-icon">&#xe642;</i>编辑</button>
                                    <button class="layui-btn layui-btn-warm layui-btn-xs"  onclick="xadmin.open('添加','<?php echo url('cate/twoadd',array('id'=>$vo['id'])); ?>',850,700)" ><i class="layui-icon">&#xe642;</i>添加子栏目</button>
                                    <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'<?php echo $vo['id']; ?>')" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
                                  </td>
                                </tr>
                            <?php if(is_array($twolevel) || $twolevel instanceof \think\Collection || $twolevel instanceof \think\Paginator): $k = 0; $__LIST__ = $twolevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k;if($vo['id'] == $vs['tid']): ?>
                                <tr cate-id='<?php echo $vs['id']; ?>' fid='<?php echo $vo['id']; ?>' >
                                  <td>
                                    <input type="checkbox" name="" lay-skin="primary">
                                  </td>
                                  <td><?php echo $vs['id']; ?></td>
                                  <td>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    ├<?php echo $vs['catename']; ?>
                                  </td>
                                  <td><input type="text" class="layui-input x-sort" name="order" value="<?php echo $vs['scort']; ?>"></td>
                                  <td>
                                    <input type="checkbox" name="switch"  lay-text="开启|停用"  checked="" lay-skin="switch">
                                  </td>
                                  <td class="td-manage">
                                    <button class="layui-btn layui-btn layui-btn-xs"  onclick="xadmin.open('编辑','<?php echo url('cate/twoedit',array('id'=>$vs['id'])); ?>',850,700)" ><i class="layui-icon">&#xe642;</i>编辑</button>
                                    
                                    <button class="layui-btn-danger layui-btn layui-btn-xs"  onclick="member_del(this,'<?php echo $vs['id']; ?>')" href="javascript:;" ><i class="layui-icon">&#xe640;</i>删除</button>
                                  </td>
                                </tr>
                              <?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                            
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                <!-- <div>
                                    <a class="prev" href="">&lt;&lt;</a>
                                    <a class="num" href="">1</a>
                                    <span class="current">2</span>
                                    <a class="num" href="">3</a>
                                    <a class="num" href="">489</a>
                                    <a class="next" href="">&gt;&gt;</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
          layui.use(['form','layer','jquery'], function(){
            $ = layui.jquery;
            var form = layui.form,
            layer=layui.layer;

          });
          
            

           /*栏目-删除*/
          function member_del(obj,id){
              layer.confirm('确认要删除吗？',function(index){
                  //发异步删除数据
                  $.get("<?php echo url('del/cate'); ?>",{id:id});
                  $(obj).parents("tr").remove();
                  layer.msg('已删除!',{icon:1,time:1000});
              });
          }

          // 分类展开收起的分类的逻辑
          // 
          $(function(){
            $("tbody.x-cate tr[fid!='0']").hide();
            // 栏目多级显示效果
            $('.x-show').click(function () {
                if($(this).attr('status')=='true'){
                    $(this).html('&#xe625;'); 
                    $(this).attr('status','false');
                    cateId = $(this).parents('tr').attr('cate-id');
                    $("tbody tr[fid="+cateId+"]").show();
               }else{
                    cateIds = [];
                    $(this).html('&#xe623;');
                    $(this).attr('status','true');
                    cateId = $(this).parents('tr').attr('cate-id');
                    getCateId(cateId);
                    for (var i in cateIds) {
                        $("tbody tr[cate-id="+cateIds[i]+"]").hide().find('.x-show').html('&#xe623;').attr('status','true');
                    }
               }
            })
          })

          var cateIds = [];
          function getCateId(cateId) {
              $("tbody tr[fid="+cateId+"]").each(function(index, el) {
                  id = $(el).attr('cate-id');
                  cateIds.push(id);
                  getCateId(id);
              });
          }
   
        </script>
    </body>
</html>
