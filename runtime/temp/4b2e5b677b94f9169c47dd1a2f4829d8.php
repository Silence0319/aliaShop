<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpstudy_pro\WWW\www.alia.com\public/../application/admin\view\index\index.html";i:1589163869;}*/ ?>
<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>alia零食商城后台</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="__PUBLIC__css/font.css">
        <link rel="stylesheet" href="__PUBLIC__css/xadmin.css">
        <link rel="stylesheet" href="__PUBLIC__css/theme3193.min.css">
        <script src="__PUBLIC__lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="__PUBLIC__js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            // 是否开启刷新记忆tab功能
            // var is_remember = false;
        </script>
    </head>
    <body class="index">
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="<?php echo url('index/index'); ?>">alia零食商城后台</a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
            <ul class="layui-nav left fast-add" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;">+新增</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('最大化','javascript:;','','',true)">
                                <i class="iconfont">&#xe6a2;</i>弹出最大化</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出自动宽高','javascript:;')">
                                <i class="iconfont">&#xe6a8;</i>弹出自动宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出指定宽高','javascript:;',500,300)">
                                <i class="iconfont">&#xe6a8;</i>弹出指定宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开','javascript:;')">
                                <i class="iconfont">&#xe6b8;</i>在tab打开</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开刷新','javascript:;',true)">
                                <i class="iconfont">&#xe6b8;</i>在tab打开刷新</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;">admin</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('个人信息','<?php echo url('system/info'); ?>')">个人信息</a></dd>
                        <dd>
                            <a onclick="xadmin.open('切换帐号','javascript:;')">切换帐号</a></dd>
                        <dd>
                            <a href="javascript:;" onclick="logout()">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item to-index">
                    <a href="<?php echo url('Index/index/index'); ?>">前台首页</a></li>
            </ul>
        </div>
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="会员管理">&#xe6b8;</i>
                            <cite>会员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('会员列表','<?php echo url('user/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>会员列表</cite></a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="订单管理">&#xe723;</i>
                            <cite>订单管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('订单列表','<?php echo url('order/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>订单列表</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="分类管理">&#xe699;</i>
                            <cite>分类管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('多级分类','<?php echo url('cate/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>多级分类</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="Banner图管理">&#xe6a8;</i>
                            <cite>Banner图管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('Banner图效果','<?php echo url('banner/banner'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>Banner图效果</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('Banner图列表','<?php echo url('banner/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>Banner图列表</cite></a>
                            </li>
                             
                        </ul>
                    </li>
                    <?php if(\think\Request::instance()->session('admin_info.status') == 2): ?>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe726;</i>
                            <cite>管理员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('管理员列表','<?php echo url('admin/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>管理员列表</cite></a>
                            </li>
                           
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="商品管理">&#xe83b;</i>
                            <cite>商品管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('商品列表','<?php echo url('product/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>商品列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('今日团购','<?php echo url('product/today'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>今日团购</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('明日预告','<?php echo url('product/tomorrow'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>明日预告</cite></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="资讯管理">&#xe744;</i>
                            <cite>资讯管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('资讯列表','<?php echo url('news/index'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>资讯列表</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="系统设置">&#xe6ae;</i>
                            <cite>系统设置</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            
                            <li>
                                <a onclick="xadmin.add_tab('个人信息','<?php echo url('system/info'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>个人信息</cite></a>
                            </li>
                           <!--  <li>
                                <a onclick="xadmin.add_tab('更新日志','<?php echo url('system/log'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>更新日志</cite></a>
                            </li> -->
                            <li>
                                <a onclick="xadmin.add_tab('密码修改','<?php echo url('system/password'); ?>')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>密码修改</cite></a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="logout()">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>退出登录</cite></a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='<?php echo url('index/main'); ?>' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->
    </body>
<script>
    layui.use(['jquery','layer'],function(){
        var $=layui.jquery,layer=layui.layer;

    });
    function logout()
    {
        $.ajax({
            type:"post",
            url:"<?php echo url('login/logout'); ?>",
            dataType:"json",
            success:function(res){
                if(res.status==1){
                    layer.msg(res.message,{icon:6,time:1000},function(){
                        window.location.href="<?php echo url('login/index'); ?>";
                    });
                }
            },
            error:function(res){
                layer.msg('发送请求失败！');
            }
        });
    }
</script>
</html>