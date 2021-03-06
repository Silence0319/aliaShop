<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\product\edit.html";i:1587108228;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
			.layui-form-label{
				width: 100px;
			}
			.layui-input-block{
				margin-left: 130px;
			}
			.layui-form{
				margin-right: 30%;
			}
		</style>

	</head>

	<body>
		<div class="cBody" style="margin-top: 20px;">
			<form id="formData" class="layui-form" action="">
				<div class="layui-form-item">
					<label class="layui-form-label">商品名称</label>
					<div class="layui-input-block">
						<input type="text" name="name" value="<?php echo $product['name']; ?>" required lay-verify="required" autocomplete="off" class="layui-input" placeholder="商品名称">
						<input type="hidden" name="id" value="<?php echo $product['id']; ?>">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">商品图</label>
					<div class="layui-upload-drag" id="pic">
					  <img id="pics" src="<?php echo $product['pic']; ?>" style="width:200px;height:200px;" />
					  <!-- <img src="/public/static/index/static/img/xiangqing3.jpg" alt="" width="100" height="151"> -->
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">单位</label>
					<div class="layui-input-block">
						<input type="text" name="num" value="<?php echo $product['num']; ?>" required lay-verify="required" autocomplete="off" class="layui-input" placeholder="输入数字">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">参考价格</label>
					<div class="layui-input-block">
						<input type="text" name="price" value="<?php echo $product['price']; ?>" required lay-verify="required|number" autocomplete="off" class="layui-input" placeholder="参考价格">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">售出价格</label>
					<div class="layui-input-block">
						<input type="text" name="realPrice" value="<?php echo $product['realPrice']; ?>" required lay-verify="required|number" autocomplete="off" class="layui-input" placeholder="售出价格">
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">分类</label>
	                <div class="layui-input-inline">
	                    <select name="c_id" id="onelevel" lay-filter="onelevel">
	                        <option value="<?php echo $cate['id']; ?>"><?php echo $cate['catename']; ?></option>
					  		<?php if(is_array($onelevel) || $onelevel instanceof \think\Collection || $onelevel instanceof \think\Paginator): $i = 0; $__LIST__ = $onelevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	                    	<option value="<?php echo $vo['id']; ?>"><?php echo $vo['catename']; ?></option>
	                    	<?php endforeach; endif; else: echo "" ;endif; ?>
	                    </select>
	                </div>
	                <div class="layui-input-inline">
	                    <select name="twolevel" id="twolevel" lay-filter="twolevel">
	                        <option value="<?php echo $product['c_id']; ?>"><?php echo $product['catename']; ?></option>
	                    </select>
	                </div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">商品详情图</label>
					<div class="layui-upload-drag" id="details">
					 <img id="detail" src="<?php echo $product['details']; ?>" style="width:200px;height:200px;" />
					  <!-- <img src="/public/static/index/static/img/xiangqing3.jpg" alt="" width="100" height="151"> -->
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">状态</label>
					<div class="layui-input-block">
						<?php if($product['status'] == 1): ?>
						<input type="radio" name="status" value="1" title="上架" checked>
						<input type="radio" name="status" value="0" title="下架">
						<?php elseif($product['status'] == 0): ?>
						<input type="radio" name="status" value="1" title="上架">
						<input type="radio" name="status" value="0" title="下架" checked>
						<?php endif; ?>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit lay-filter="submitBut">立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
			
			
			<script>
				layui.use(['upload','form','jquery'], function() {
					var form = layui.form;
					var upload = layui.upload;
					var layer = layui.layer;
					$ = layui.jquery;
					//监听提交
					form.on('submit(submitBut)', function(data) {
						console.log(data);
						var pic=$("#pics").attr("src");
						var details=$("#detail").attr("src");
						data.field.pic=pic;
						data.field.details=details;
						$.ajax({
							type:'post',
							url:"<?php echo url('edit/product'); ?>",
							dataType:'json',
							contentType:"application/json",
							data:JSON.stringify(data.field),
							async:false,
							success:function(res){
								if(res.status==1){
									layer.alert(res.message,{icon:6},function(){
										xadmin.close();
										xadmin.father_reload();
									});
								}else{
									layer.alert(res.message,{icon:5},function(){
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
					form.verify({
						//数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
					  	ZHCheck: [
						    /^[\u0391-\uFFE5]+$/
						    ,'只允许输入中文'
					  	] 
					});
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

					//商品图片上传
					upload.render({
						elem: '#pic',
						url: '<?php echo url('edit/picture'); ?>',
						before:function(res){
							console.log(res.filename);
						},
						done: function(res) {
						  	console.log(res.filename);
						  	$('#pics').attr('src','/public'+res.filename);
						  	 
						}
					});
					//详情图上传
					//拖拽上传
					upload.render({
						elem: '#details',
						url: '<?php echo url('edit/picture'); ?>',
						before:function(res){
							console.log(res.filename);
						},
						done: function(res) {
						  	console.log(res.filename);
						  	$('#detail').attr('src','/public'+res.filename);
						}
					});
				});
			</script>

		</div>
	</body>

</html>