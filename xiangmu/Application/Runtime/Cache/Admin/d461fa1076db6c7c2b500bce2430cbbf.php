<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/zky/zky/Uploads/Css/public.css" />
    <link rel="stylesheet" type="text/css" href="/zky/zky/Uploads/Css/conmmunication.css" />

</head>
<body>
    <div class="title"><font color="#777777"><strong>管理员：
        <a href="/zky/zky/index.php/Admin/Index/studentdetail" id=""><?php echo (session('username')); ?></a>
    </strong></font></div>
    <table>
        
        <tr>
            <td>发布留言</td>
        </tr>
        <tr>
            <td>留言主题：<form action="/zky/zky/index.php/Admin/Message/do_addmessage" method = "post"></td>
            <td><input type="text" name = "title"></td>
        </tr>
        <tr>
            <td>详细内容：</td>
            <td><textarea name="content" id = "content"></textarea></td>
        </tr>
        <tr>
            <div id="buttom" >
                <td><button type = "submit">发布</button></a></td>
                <td><button type = "reset">取消</button></form></td>
            </div>
        </tr>
    </table>
    <table >
        <div class='panel'>
            <div id='p_body'>
                <tr>
                    <td>留言主题</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($vo["title"]); ?></td>
                        <td><a href="/zky/zky/index.php/Admin/Message/do_see/id/<?php echo ($vo["id"]); ?>"><button>详细信息</button></a></td>
                        <td> <a href="/zky/zky/index.php/Admin/Message/do_delete/id/<?php echo ($vo["id"]); ?>"><button>删除</button></a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td><?php echo ($show); ?></td>
                </tr>
            </div>
        </div>
    </table>
</body>
</html>