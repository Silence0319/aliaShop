<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\info\address.html";i:1588905401;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\header.html";i:1589248378;s:84:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/index\view\common\footer.html";i:1584860727;}*/ ?>
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
<body id="list-cont">
  <div class="site-nav-bg">
    <div class="site-nav w1200">
      <p class="sn-back-home">
        <i class="layui-icon layui-icon-home"></i>
        <a href="<?php echo url('index/index'); ?>">首页</a>
      </p>
      <div class="sn-quick-menu">
        <?php if(\think\Request::instance()->session('uid') != null): ?>
        <div class="login"><a href="<?php echo url('info/index'); ?>"><?php echo \think\Request::instance()->session('user_info.name'); ?>！</a></div>
        <div class="login"><a href="javascript:;" id="logout">注销</a></div>
        <div class="sp-cart"><a href="<?php echo url('info/shopcart'); ?>">购物车</a><span id="carNum"><?php echo $carNum; ?></span></div>
        <?php else: ?>
        <div class="login"><a href="<?php echo url('login/index'); ?>">登录</a></div>
        <div class="sp-cart"><a href="<?php echo url('login/register'); ?>">注册</a></div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="header">
    <div class="headerLayout w1200">
      <div class="headerCon">
        <h1 class="mallLogo">
          <a href="<?php echo url('index/index'); ?>" title="零食商城">
            <img src="__PUBLIC__static/img/logo.png">
          </a>
        </h1>
        <div class="mallSearch">
          <form action="<?php echo url('all/search'); ?>" class="layui-form" novalidate>
            <input type="text" name="keyword" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
            <button class="layui-btn" lay-submit lay-filter="formDemo">
                <i class="layui-icon layui-icon-search"></i>
            </button>
            <!-- <input type="hidden" name="" value=""> -->
          </form>
        </div>
      </div>
    </div>
  </div>
 <script type="text/javascript">
   layui.config({
      base: '__PUBLIC__static/js/util' //你存放新模块的目录，注意，不是layui的模块目录
    }).use(['jquery','form'],function(){
          var $ = layui.$,form = layui.form;

    $("#logout").on('click',function(){
    $.ajax({
      type:'post',
      url:"<?php echo url('login/logout'); ?>",
      dataType:"json",
      success:function(res){
        if(res.status==1){
          //alert(res.message);
          layer.msg(res.message);
          setTimeout(function(){
            window.location.href="<?php echo url('login/index'); ?>";
          },1000);
        }else{
          //alert(res.message);
          layer.msg(res.message);
        }
      },
      error:function(res){
        layer.msg('发送请求失败！');
      }
    });
  });
  });
  </script>
  <div class="content content-nav-base commodity-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="<?php echo url('index/index'); ?>">首页</a>
            <a href="<?php echo url('all/index'); ?>">所有商品</a>
            <a href="<?php echo url('index/buytoday'); ?>">今日团购</a>
            <a href="<?php echo url('news/index'); ?>">零食资讯</a>
            <a href="<?php echo url('index/about'); ?>">关于我们</a>
          </div>

        </div>
      </div>
    </div>
    <div class="commod-cont-wrap">
      <div class="commod-cont w1200 layui-clear">
        <div class="left-nav">
          <div class="title">个人中心</div>
          <div class="list-box">
            
            <ul>
              <li><a href="<?php echo url('info/index'); ?>">个人信息</a></li>
              <li><a href="<?php echo url('info/order'); ?>">我的订单</a></li>
              <li><a href="<?php echo url('info/collect'); ?>">我的收藏</a></li>
              <li><a href="<?php echo url('info/address'); ?>">收货地址</a></li>
              <li><a href="<?php echo url('info/password'); ?>">修改密码</a></li>
            </ul>
          </div>
        </div>
        <div class="right-cont-wrap">
          <div class="right-cont" style="background-color: #fff;min-height: 500px;height: auto;padding: 0 10px 10px 0;width: 850px ">
              <div class="layui-tab">
                  <ul class="layui-tab-title">
                    <li class="layui-this">收货地址</li>
                  </ul>
                  <div class="layui-tab-content">
                    <!-- 基本信息 -->
                    <div class="layui-tab-item layui-show">
                       <form class="layui-form" action="" id="formData">
                        <div class="layui-form-item">
                          <label class="layui-form-label">收货人:</label>
                          <div class="layui-input-inline">
                            <input type="text" name="name" required  lay-verify="required" placeholder="请输入收货人" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        
                        <div class="layui-form-item">
                          <label class="layui-form-label">手机号:</label>
                          <div class="layui-input-block">
                            <input type="tel" name="phone" required  lay-verify="required" placeholder="请输入手机号" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <label class="layui-form-label">邮编:</label>
                          <div class="layui-input-inline">
                            <input type="text" name="code" required  lay-verify="required" placeholder="请输入邮编" autocomplete="off" class="layui-input">
                          </div>
                        </div>
                        
                        <div class="layui-form-item" id="area-picker">
                          <div class="layui-form-label">地址</div>
                          <div class="layui-input-inline" style="width: 200px;">
                            <select name="province" class="province-selector" data-value="" lay-filter="province-1">
                              <option value="">--选择省--</option>
                            </select>
                          </div>
                          <div class="layui-input-inline" style="width: 200px;">
                              <select name="city" class="city-selector" data-value="" lay-filter="city-1">
                                  <option value="">--选择市--</option>
                              </select>
                          </div>
                          <div class="layui-input-inline" style="width: 200px;">
                              <select name="area" class="county-selector" data-value="" lay-filter="county-1">
                                  <option value="">--选择区--</option>
                              </select>
                          </div>
                        </div>

                        <div class="layui-form-item layui-form-text">
                          <label class="layui-form-label">详细住址:</label>
                          <div class="layui-input-block">
                            <textarea name="address" placeholder="请输入内容" class="layui-textarea"></textarea>
                          </div>
                        </div>
                        <div class="layui-form-item">
                          <div class="layui-input-block">
                            <button class="layui-btn layui-btn-sm" lay-submit lay-filter="formDemo">立即提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
                          </div>
                        </div>
                      </form>
              <!-- 提示收货地址条数 -->
              <div style="width: 750px;background-color: #e3f2fd;margin:auto;padding: 5px 20px 20px 20px;color: #666">
                <i class="layui-icon layui-icon-tips" style="color: #1E9FFF;"></i>
                已保存<?php echo $adNum; ?>了条地址，还能保存<?php echo $num; ?>条地址  
              </div>
              <div class="layui-form" style="width: 840px;margin:auto;">
                <table class="layui-table">
                  <colgroup>
                    <col width="80">
                    <col width="150">
                    <col width="200">
                    <col>
                  </colgroup>
                  <thead>
                    <tr>
                      <th>收货人</th>
                      <th>所在地区</th>
                      <th>详细地址</th>
                      <th>邮编</th>
                      <th>电话/手机号</th>
                      <th>操作</th>
                      <th></th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr>
                      <td><?php echo $vo['name']; ?></td>
                      <td><?php echo $vo['province']; ?> <?php echo $vo['city']; ?> <?php echo $vo['area']; ?></td>
                      <td><?php echo $vo['address']; ?></td>
                      <td><?php echo $vo['code']; ?></td>
                      <td><?php echo $vo['phone']; ?></td>
                      <td>
                        <a href="javascript:;" onclick="update('<?php echo $vo['id']; ?>')">修改</a> | <a href="javascript:;" onclick="del(this,'<?php echo $vo['id']; ?>')">删除</a>
                      </td>
                      <td align="center">
                        <?php if($vo['status'] == 1): ?>
                        默认地址
                        <?php elseif($vo['status'] == 0): ?>
                        <button style="display: block;width: 80px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ff5000;border-radius: 3px;background: #ffd6cc;color: #f30;">设为默认</button>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </tbody>
                </table>
              </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="footer">
    <div class="ng-promise-box">
      <div class="ng-promise w1200">
        <p class="text">
          <a class="icon1" href="javascript:;">7天无理由退换货</a>
          <a class="icon2" href="javascript:;">满99元全场免邮</a>
          <a class="icon3" style="margin-right: 0" href="javascript:;">100%品质保证</a>
        </p>
      </div>
    </div>
    <div class="mod_help w1200">                                     
      <p>
        <a href="<?php echo url('index/about'); ?>">关于我们</a>
        <span>|</span>
        <a href="javascript:;">帮助中心</a>
        <span>|</span>
        <a href="javascript:;">售后服务</a>
        <span>|</span>
        <a href="<?php echo url('index/information'); ?>">零食资讯</a>
        <span>|</span>
        <a href="<?php echo url('index/index'); ?>">关于货源</a>
      </p>
      <p class="coty">零食商城版权所有 &copy;豫ICP备19042362号-1 2019-2020 <br>豫公网安备 31010602002343号</p>
    </div>
  </div>

<script src="__PUBLIC__static/js/jquery.js"></script>
<script>
       //删除
        function del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.get("<?php echo url('del/address'); ?>",{id:id});
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
        }
      //修改
        function update(id){
          
              layer.open({
                type:2,
                area:['880px','600px'],
                content:'<?php echo url('info/addupdate'); ?>?id='+id
              })
             
        }
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
                        url: "<?php echo url('add/address'); ?>",
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
                                  //新增数据
                                   $(".layui-table").append(
                                    '<tr><td>'+data.field.name+
                                    '</td><td>'+data.field.province+data.field.city+data.field.area+
                                    '</td><td>'+data.field.address+
                                    '</td><td>'+data.field.code+
                                    '</td><td>'+data.field.phone+
                                    '<td><a href="">修改</a> | <a href="javascript:;">删除</a>'+
                                    '</td><td align="center"><button style="display: block;width: 80px;height: 30px;line-height: 30px;text-align: center;border: 1px solid #ff5000;border-radius: 3px;background: #ffd6cc;color: #f30;">设为默认</button></td></tr>'
                                    );
                                });
                            }else{
                                layer.alert(res.message,{
                                    icon:5
                                },
                                function(){
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
                
            });
</script>


</body>
</html>