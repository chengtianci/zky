<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html>
  <head>
    <title>首页名称</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="zh-CN" />
    <meta name="Author" content="网页作者" /> 
    <meta name="Copyright" content="网站版权" /> 
    <meta name="keywords" content="网站关键字" />
    <meta name="description" content="网站描述" />
    <link rel="shortcut icon" href="/zky/zky/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" type='text/css' href="/zky/zky/Public/Css/main.css" />
    <link rel="stylesheet" href="/zky/zky/Public/Css/public.css" />
    <script type="text/javascript" src="/zky/zky/Public/Js/jquery-1.8.3.min.js"></script>
    <script src="/zky/zky/Public/Js/public.js"></script>
    <script>
      var arr=new Array();
          arr[0]="/zky/zky/Public/Pic/11.jpg";
            arr[1]="/zky/zky/Public/Pic/22.jpg";
          arr[2]="/zky/zky/Public/Pic/33.jpg";
          arr[3]="/zky/zky/Public/Pic/44.jpg";
          arr[4]="/zky/zky/Public/Pic/55.png";
          arr[5]="/zky/zky/Public/Pic/66.jpg";
          arr[6]="/zky/zky/Public/Pic/77.jpg";
          arr[7]="/zky/zky/Public/Pic/88.jpg";
          arr[8]="/zky/zky/Public/Pic/99.jpg";
          // arr[6]="/zky/zky/Public/Pic/top.jpg";
        // 问题不在于ajax，而是点击按钮之后事件没有被触发
      // 登录按钮ajax操作
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

      function f3(){
        $.post("/zky/zky/index.php/Home/Register/do_register", {
          username:$("#r_txtName").val(),
          password:$("#r_txtPwd").val(),
          repassword:$("#re_txtPwd").val(),
          name:$("#ra_txtName").val(),
          verify:$("#c_txtPwd").val()
        },function(text){
          if(text=="pass"){
            window.location.href="/zky/zky/index.php/Home/Index/main";
          }else{
            $("#suggest2").html(text);
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
        <!-- 注册窗口 -->
    <div id="registerBox">
          <div class="row1">
              注册<a href="javascript:void(0)" title="关闭窗口" class="close_btn" id="r_closeBtn">×</a>
          </div>
          <form>
            <div class="row">
               <span id="suggest2"> &nbsp;</span>
            </div>
            <div class="row">
                账　　号: <span >
                    <input type="text" class="inputBox" id="r_txtName" placeholder="账号/邮箱" />
                </span>
            </div>
            <div class="row">
                用&nbsp;&nbsp;户&nbsp;&nbsp;名: <span >
                    <input type="text" class="inputBox" id="ra_txtName" placeholder="姓名" />
                </span>
            </div>
            <div class="row">
                密　　码: <span >
                    <input type="password" class="inputBox" id="r_txtPwd" placeholder="密码" />
                </span>
            </div>
            <div class="row">
                确认密码: <span >
                    <input type="password" class="inputBox" id="re_txtPwd" placeholder="确认密码" />
                </span>
            </div>
            <div class="row">
                验&nbsp;&nbsp;证&nbsp;&nbsp;码: <span >
                    <input type="text" class="inputBox" id="c_txtPwd" placeholder="验证码" />
                    <img src="/zky/zky/index.php/Home/Public/code" onclick = 'this.src = this.src+"?"+Math.random'/>
                </span>
            </div>
            <div class="row">
                
            </div>
            <div class="row">
                <a href="#" id="r_loginbtn" onclick="f3();">注册</a>
            </div>
        </form>
      </div>
    <!-- 结束注册窗口 -->
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
            <span><a href="#" id='register'>注册</a></span>
          <?php else: ?>  <SPAN><?php echo (session('username')); ?></SPAN>
            <a href="/zky/zky/index.php/Home/Login/login_out" >退出</a><?php endif; ?>
        </div>
      </div>
    </div>
    
    </div>
    <div id='main'>
      <div class="contain">
        <div id='left'>
          <div id='book'>
            <h2>　仪器预约系统</h2>
              <?php if(is_array($data0)): $i = 0; $__LIST__ = $data0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h4><a href="<?php echo ($vo["address"]); ?>"　><?php echo ($vo["name"]); ?></a></h4><?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- <br />
            <span>注意：只有本校学生才能预约</span>
                      </div> -->
            <hr />
            <div id='relational_a'>
              <h2>　相关链接</h2>
                <h4>学院内链接：</h4>
                  <?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["address"]); ?>"　>> <?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <h4>校内链接：</h4>
                  <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["address"]); ?>"　>> <?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <h4>校外链接：</h4>
                  <?php if(is_array($data3)): $i = 0; $__LIST__ = $data3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["address"]); ?>"　>> <?php echo ($vo["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
          </div>
        
      </div>
      <div id='right'>
        <div id="rup">
          <div id='js'>
            <img src="/zky/zky/Public/Pic/11.jpg"  alt="" id="obj" />
          </div>
          <div id='r_message'>
            <p class="rtitle">————<span class="rrr"> 平台简介 </span>————</p>
                        <?php echo ($data); ?>
          </div>
          <div class="clr"></div>
        </div><div class="clr"></div>
        <div id="rdown">
          <div class="rdown-left" style="width:45%;padding:10px;float:left;">
            <div class="hena"><font><b>&nbsp;&nbsp;最新通知</b></font><a href="/zky/zky/index.php/Home/Inform/news.html"></a></div>
            <div id="list">
            <?php if(is_array($data4)): $i = 0; $__LIST__ = array_slice($data4,0,6,true);if( count($__LIST__)==0 ) : echo "暂时没有通知" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/zky/zky/index.php/Home/Inform/showitems/id/<?php echo ($vo["id"]); ?>" class="news_list">
                  <p><?php echo ($vo["title"]); ?>
                  </p>
                
                </a><?php endforeach; endif; else: echo "暂时没有通知" ;endif; ?>
            </div>
          </div>
          <div class="rdown-right" style="width:45%;padding:10px;float:right;margin-left:10px;">
            <div class="hena"><font><b>&nbsp;&nbsp;文档下载</b></font><a href="/zky/zky/index.php/Home/File/document.html"></a></div>
            <div id="list">
            <?php if(is_array($data5)): $i = 0; $__LIST__ = array_slice($data5,0,6,true);if( count($__LIST__)==0 ) : echo "暂时没有文件" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/zky/zky/Uploads<?php echo ($vo["address"]); ?>" class="news_list" target="_blank" >
                  <p><?php echo ($vo["realname"]); ?>
                  </p>
                  
                </a><?php endforeach; endif; else: echo "暂时没有文件" ;endif; ?>
            </div>
        </div>
    </div>
  </div>

<!--  <div id='footer'>
    <div class="contain">
      <p class="footer_p">CopyRight©2016  植物科学技术学院 管理</p><br />
      <p class="footer_p">地址：华中农业大学主楼东附楼二楼<span>邮政编码：430070</span></p>
      <br />
      <p class="footer_p">华中农业大学 植物科学技术学院 版权所有<a href="http://www.52feidian.com/index.html">技术支持：沸点工作室</a> 
            <a href="#" id='admin' >管理</a></p>
    </div>
  </div>
 -->
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
  </body>
</html>