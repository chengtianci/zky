<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
	<head>
		<title>新闻中心</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="zh-CN" />
		<meta name="Author" content="网页作者" /> 
		<meta name="Copyright" content="网站版权" /> 
		<meta name="keywords" content="网站关键字" />
		<meta name="description" content="网站描述" />
		<link rel="shortcut icon" href="/zky/zky/logo.ico" type="image/x-icon" />
		<link rel="stylesheet" type='text/css' href="/zky/zky/Public/Css/news.css" />
		<link rel="stylesheet" href="/zky/zky/Public/Css/public.css" />
		<script type="text/javascript" src="/zky/zky/Public/Js/jquery-3.1.1.min.js"></script>
		<script src="/zky/zky/Public/Js/public.js"></script>
		<script>
		function f1(){
				$.post("/zky/zky/index.php/Home/Login/do_login", {
					username:$("#l_txtName").val(),
					password:$("#l_txtPwd").val()
				},function(text){
					if(text=="pass"){
						window.location.href="/zky/zky/index.php/Home/Index/main";
					}else{
						$("#suggest").html(text);
					}
				});
			}
			
			function f2(){
				$.post("/zky/zky/index.php/Admin/Login/do_login", {
					username:$("#a_txtName").val(),
					password:$("#a_txtPwd").val()
				},function(text){
					if(text=="pass"){
						window.location.href="/zky/zky/index.php/Admin/Index/admin";
					}else{
						$("#suggest").html(text);
					}
				});
			}

			
		</script>
		<script src="/zky/zky/Public/Js/main.js"></script>
		
	</head>
	<body>
		<!-- 这里是登录弹出窗口 -->
		<div id="LoginBox">
	        <div class="row1">
	            登录<a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="l_closeBtn">×</a>
	        </div>
	        <form>
		        <span id="suggest"> &nbsp;</span>
		        <div class="row">
		            账号: 
		            	<span >
		                	<input class="inputBox" type="text" id="l_txtName" placeholder="账号" />
		            	</span>
		        </div>
		        <div class="row">
		            密码:
		            <span >
		                <input class="inputBox" type="password" id="l_txtPwd" placeholder="密码" />
		           	</span>
		        </div>
		        <div class="row">
		            	<a href="#" id="l_loginbtn" onclick="f1();">登录</a>
	        	</div>
	        </form>
	    </div>
		
		<!-- 结束登陆弹出窗口 -->
		<!-- 管理登录 -->
		<div id="AdminBox">
	        <div class="row1">
	            后台登录<a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="a_closeBtn">×</a>
	        </div>
	        <form>
		        <span id="suggest"> &nbsp;</span>
		        <div class="row">
		            账号: 
		            	<span >
		                	<input class="inputBox" type="text" id="a_txtName" placeholder="管理员账号" />
		            	</span>
		        </div>
		        <div class="row">
		            密码:
		            <span >
		                <input class="inputBox" type="password" id="a_txtPwd" placeholder="密码" />
		           	</span>
		        </div>
		        <div class="row">
		            	<a href="#" id="a_loginbtn" onclick="f2();">登录</a>
	        	</div>
	        </form>
	    </div>
	     <!-- 结束管理登录窗口 -->
		<div id='header'>
			<div class="contain" >
				<img src="/zky/zky/Public/Pic/top.jpg" alt="" style="width:100%;" />
			</div>
		</div>
		<div id='navi'>
			<div class="contain">
				<a href="/zky/zky/index.php/Home/Index/main" class="navi_a">首页</a>
				<a href="/zky/zky/index.php/Home/Inform/news" class="navi_a">新闻通知</a>
				<a href="/zky/zky/index.php/Home/Equipment/equipment" class="navi_a">仪器介绍</a>
				<a href="/zky/zky/index.php/Home/Regulation/regulation" class="navi_a">规章制度</a>
				<a href="/zky/zky/index.php/Home/File/document" class="navi_a">文档下载</a>
				<a href="/zky/zky/index.php/Home/Message/conmunication" class="navi_a">讨论区</a>
				<a href="/zky/zky/index.php/Home/Index/about_us" class="navi_a">关于我们</a>
				<div id='na_log'>
					<span>欢迎</span>
					<?php if(($_SESSION['username']) == ""): ?><span><a href="#" id='login'>登录</a></span>
					<?php else: ?>	<SPAN><?php echo (session('username')); ?></SPAN>
						<a href="/zky/zky/index.php/Home/Login/login_out" style=''>退出</a><?php endif; ?>
				</div>
			</div>
		</div>
		<div id='main'>
			<div class="contain">
				<div id="showlist">
					<div id="main_navi">
						<h2 >最新消息</h2>
						<div class="main_navi_header"><img src="/zky/zky/Public/Pic/home.png" alt="" />当前位置 ：<a href="/zky/zky/index.php/Home/Index/main">首页 </a> <span> > 新闻通知</span></div>
					</div>
					
					<div id="list">
						<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "暂时没有通知" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/zky/zky/index.php/Home/Inform/showitems/id/<?php echo ($vo["id"]); ?>" class="news_list">
									<p><?php echo ($vo["title"]); ?>
										<span><?php echo ($vo["date"]); ?></span></p>
									<br />
									<!--<p><?php echo ($vo["content"]); ?>/zky/zky/index.php/Home/Inform/showitems/id/<?php echo ($vo["id"]); ?></p><br /> <br />-->
								</a><?php endforeach; endif; else: echo "暂时没有通知" ;endif; ?>
					</div>
				</div>
			</div>

		</div>
		<div class="contain">
			<div id="footer">
			    <p>
			    CopyRight©2016  植物科学技术学院
			    <a href="#" id='admin' >管理</a>
			    </p>
			    <p>地址：华中农业大学主楼东附楼二楼   邮编：430070   </p>
			    <p>
			      技术支持：
			      <a href="http://www.52feidian.com/">华中农业大学 沸点工作室</a>
			    </p>
			</div>
		</div>
	
	</body>
</html>