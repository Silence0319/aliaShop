<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\news\add.html";i:1587196422;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
			.layui-form{
				margin-right: 30%;
			}
		</style>
<script type="text/javascript" src="__PUBLIC__ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="__PUBLIC__ueditor/ueditor.all.js"></script>
<script type="text/javascript" src="__PUBLIC__ueditor/lang/zh-cn/zh-cn.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__ueditor/themes/default/css/ueditor.css" rel="external nofollow">
	</head>

	<body>
		<div class="cBody" style="margin-top: 20px;">
			<form class="layui-form" action="" id="formData">
				<div class="layui-form-item">
					<label class="layui-form-label">标题</label>
					<div class="layui-input-inline shortInput">
						<input type="text" name="title" required lay-verify="title" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">所属分类</label>
	                <div class="layui-input-inline" style="position: relative;z-index: 10000;">
	                    <select name="c_id" id="onelevel" lay-filter="onelevel">
	                    	<option value="">一级分类</option>
	                    	<?php if(is_array($onelevel) || $onelevel instanceof \think\Collection || $onelevel instanceof \think\Paginator): $i = 0; $__LIST__ = $onelevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	                    	<option value="<?php echo $vo['id']; ?>"><?php echo $vo['catename']; ?></option>
	                    	<?php endforeach; endif; else: echo "" ;endif; ?>
	                    </select>
	                </div>
	                <div class="layui-input-inline" style="position: relative;z-index: 10000;">
	                    <select name="twolevel" id="twolevel" lay-filter="twolevel">
	                        <option value="">二级分类</option>
	                    </select>
	                </div>
				</div>
				 
				<div class="layui-form-item">
					<label class="layui-form-label">链接</label>
					<div class="layui-input-inline shortInput">
						<input type="text" name="url" required lay-verify="url" placeholder="" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">来源</label>
					<div class="layui-input-inline shortInput">
						<input type="text" name="source" required lay-verify="source" placeholder="" autocomplete="off" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">内容</label>
					<div class="layui-input-inline shortInput">
						<textarea name="content" id="editor" type="text/plain" style="width: 900px; height:400px;"></textarea>
					</div>
				</div>
				 
				
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit lay-filter="submitBut">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
	</body>
<script>
	layui.use(['form','jquery'],
		function(){
			$ = layui.jquery;
			form=layui.form;

			//二级联动
			form.on('select(onelevel)',function(data){
				console.log(data.value);
				var one_id=data.value;
				$.ajax({
					type:"post",
					url:"<?php echo url('common/level'); ?>",
					data:{'id':one_id},
					dataType:"json",
					success:function(res){
						var obj=JSON.parse(res);
						$("select[name='twolevel']").empty();
						var html="<option value='0'>二级分类</option>";
						console.log(obj);
						 $(obj).each(function(v,k){
						 	html +="<option value='"+k.id+"'>"+k.catename+"</option>";
						 });
						//把遍历的数据放到select表里
						$("select[name='twolevel']").append(html);
						form.render('select');
					},
					error:function(res){
						layer.alert('发送请求失败');
					}
				});
			});

			//表单监听
			form.on('submit(submitBut)',
			function(data){
				console.log(data);
				$.ajax({
					type:"post",
					url:"<?php echo url('add/news'); ?>",
					data:$("#formData").serialize(),
					dataType:'json',
					async:false,
					success:function(res){
						if(res.status==1){
							layer.alert(res.message,{
								icon:6
							},
							function(){
								xadmin.close();
								xadmin.father_reload();
							});
						}else{
							layer.alert(res.message,{
								icon:5
							},
							function(){
								xadmin.close();
								xadmin.father_reload();
							});
						}
					},
					error:function(res){
						layer.alert('发送请求失败');
					}
				});
				return false;
			});
		});
</script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

</script>
</html>