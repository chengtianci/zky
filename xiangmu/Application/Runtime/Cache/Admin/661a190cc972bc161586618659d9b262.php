<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/zky/Uploads/Css/public.css" />
    <link rel="stylesheet" type="text/css" href="/zky/Uploads/Css/conmmunication.css" />
</head>
<body> 
    <div class="title"><font><caption>当前登录管理员</caption></font></div>
     <table>
       
         <tr></tr>
        <tr></tr>
        <div class='panel'>
            <div id='p_body'>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo (session('name')); ?> &nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo (session('username')); ?> 
                    <a href="/zky/index.php/Admin/Message/studenttail/id/<?php echo ($vo["id"]); ?>">详细信息</a>  &nbsp;&nbsp;&nbsp;&nbsp;   
                    <a href="/zky/index.php/Admin/Index/pass_update">修改密码</a></td>
                </tr>
            </div>
        </div>
    </table>
    <table>
        <caption>所有管理员用户信息</caption>
        <tr></tr>
        <tr></tr>
            <tr>
                <th>工号</th>
                <th>用户名</th>
            </tr>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <th><?php echo ($vo["username"]); ?></th>
                <th><?php echo ($vo["name"]); ?></th>
                <th><a href="/zky/index.php/Admin/Message/studenttail/id/<?php echo ($vo["id"]); ?>">详细信息</a></th>
                <neq name="vo.id" value="Think.session.">
                    <th><a href="/zky/index.php/Admin/Index/unaddAdmin/id/<?php echo ($vo["id"]); ?>">撤销管理员</a></th>
                </eq>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
        <table>
                <caption>所有普通用户信息</caption>
                <tr></tr>
                <tr></tr>
                    <tr>
                        <th>工号</th>
                        <th>用户名</th>
                    </tr>
                    <tr>
                        
                    </tr>
                <?php if(is_array($data1)): $i = 0; $__LIST__ = $data1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <th><?php echo ($vo["username"]); ?></th>
                        <th><?php echo ($vo["name"]); ?></th>
                        <th><a href="/zky/index.php/Admin/Message/studenttail/id/<?php echo ($vo["id"]); ?>">详细信息</a></th>
                        <?php if(($_SESSION['name']) == "2015317200402"): ?><th><a href="/zky/index.php/Admin/Index/addAdmin/id/<?php echo ($vo["id"]); ?>">添加为管理员</a></th><?php endif; ?>
                        <?php if(($_SESSION['name']) == ""): ?><th><a href="/zky/index.php/Admin/Index/unaddAdmin/id/<?php echo ($vo["id"]); ?>">撤销管理员</a></th><?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- </div> -->
        <!-- </div> -->
    </table>
</body>
</html>