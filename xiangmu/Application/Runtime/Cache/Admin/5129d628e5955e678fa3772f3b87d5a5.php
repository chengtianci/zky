<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/zky/zky/Uploads/Css/public.css" />
    <link rel="stylesheet" type="text/css" href="/zky/zky/Uploads/Css/conmmunication.css" />

</head>
<body>
    <div class="title"><font color="#777777"><strong>用户名称：</strong></font>
    <a href="/zky/zky/index.php/Admin/Index/studentdetail" id=""><?php echo (session('username')); ?></a></div>
    <table>
                <tr>
                    <td>上传文件</td>
                </tr>
                <tr>
                    <td><form action="/zky/zky/index.php/Admin/Regulation/do_show" enctype="multipart/form-data" method="post" ></td>
                    <td id = "lalala"><input type="file" name = "file"></td> 
                    <td></td>
                    <td></td>            
                    <div id="buttom" >
                        <td><button type = "submit">添加</button></form></td>
                </tr>
    <table>
    <table >
                <?php if(is_array($data)): $k = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                        <td><?php echo ($k); ?></td>
                        <td><a href="/zky/zky/Uploads/<?php echo ($vo["address"]); ?>" target = "_blank"><?php echo ($vo["realname"]); ?></a></td>
                        <td> <a href="/zky/zky/index.php/Admin/Regulation/delete/id/<?php echo ($vo["id"]); ?>"><button type="submit">删除</button></a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo ($show); ?></td>
                </tr>   
    </table>
</body>
</html>