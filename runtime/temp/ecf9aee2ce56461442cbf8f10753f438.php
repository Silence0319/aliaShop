<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\banner\banner.html";i:1587023544;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\common\header.html";i:1585637248;}*/ ?>
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
                       <div class="layui-card-body"></div>
                        <div class="layui-card-header">
                           
                            <button class="layui-btn" onclick="xadmin.open('添加用户','<?php echo url('banner/add'); ?>',800,600)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body ">
                          <div class="layui-carousel" id="test10" style="margin:auto;">
                            <div carousel-item="">
                              <?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                              <div><img src="<?php echo $vo['pic']; ?>"></div>
                              <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                          </div> 
                         </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
<script>
   //轮播图
  layui.use(['carousel','form'],function(){
    var carousel=layui.carousel
    ,form=layui.form;
    carousel.render({
      elem:'#test10'
      ,width:'1200px'
      ,height:'400px'
      ,interval:3500
    });
    //事件
    carousel.on('change(test4)',function(res){
      console.log(res)
    });
    var $=layui.$, active={
      set:function(othis){
        var THIS='layui-bg-normal'
        ,key=othis.fata('key')
        ,options={};

        othis.css('background-color','#5EB878').siblings().removeAttr('style');
        opyions[key]=othis.data('value');
        ins3.reload(options);
      }
    };
    //监听开关
  form.on('switch(autoplay)', function(){
    ins3.reload({
      autoplay: this.checked
    });
  });
  
  $('.demoSet').on('keyup', function(){
    var value = this.value
    ,options = {};
    if(!/^\d+$/.test(value)) return;
    
    options[this.name] = value;
    ins3.reload(options);
  });
  });
</script>
</html>