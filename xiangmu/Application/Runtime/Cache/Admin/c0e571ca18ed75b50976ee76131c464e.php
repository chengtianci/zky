<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="Css/style.css" />
    <script type="text/javascript" src="Js/jquery2.js"></script>
    <script type="text/javascript" src="Js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="Js/bootstrap.js"></script>
    <script type="text/javascript" src="Js/ckform.js"></script>
    <script type="text/javascript" src="Js/common.js"></script>

    <style type="text/css">
        body {
            font-size: 20px;
            padding-bottom: 40px;
            background-color:#e9e7ef;
        }
        table{
            margin:10px 2.5%; 
            width: 95%;
            border: 2px solid #2a8ba7;
            border-radius: 5px;
        }
        .panel{
            width: 100%;
            border: none;
            box-shadow: none;
        }
        #p_header{
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
            border-color: #eff2f7;
            font-size: 16px;
            font-weight: 300;
        }
       tr{
        width: 100%;
       }
       #contant{
        width: 70%;
       }
       td{
        padding: 10px;
       }
       td button,#buttom button{
        display: block;
        width: 75px;
        float: right;
        margin-right: 20px;
        border-radius: 4px;
       }
       #buttom button{
        margin:0 5% 5px ;
       }
        

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
        .pic{
            width: 50%;
            height: 100%;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="title">
        <font color="#777777"><strong>用户名称：</strong></font>
        <a href="/zky/zky/index.php/Admin/Message/studenttdetail"><?php echo (session('username')); ?></a>
    </div>
        <div style="float:left; width:20%; height:30%; text-align: center; margin-top: 7%">
            <a href="/zky/zky/Uploads/<?php echo ($vo["imagicaddress"]); ?>" target = "_blank"><img src="/zky/zky/Uploads<?php echo ($vo["imagicaddress"]); ?>" class = "pic" style="width:90%; height:85%; text-align: center;"/></a>
        </div>
        <div style="width: 70%; height: 100%; float: left; margin-right: 5%;">
        <table align="left" class="table" border="1px" cellpadding="1px">
            <div class="panel">
				<form action="/zky/zky/index.php/Admin/Equipment/do_update" method = "post" enctype="multipart/form-data">
					<input type="text" name = "id" value = "<?php echo ($vo["id"]); ?>" hidden>
	                <div id='p_body'>
                        <tr>
                            <th align="left" colspan="8" class="shang_center_search">
                                <span>设备基本信息</span>
                            </th>
                        </tr>
                        <tr>
                            <th align="center" nowrap="nowrap" width="100px">仪器分类</th>
                            <td width="100px" align="left">
                                <select name="class">
                                    <?php if(is_array($classtype)): $i = 0; $__LIST__ = $classtype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$la): $mod = ($i % 2 );++$i; if(($vo["class"]) == $la['id']): ?><option value="<?php echo ($la["id"]); ?>" selected="selected"> <?php echo ($la["name"]); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo ($la["id"]); ?>"> <?php echo ($la["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <th align="center" nowrap="nowrap" width="100px">仪器序号</th>
                            <td width="140px" align="left"><input type="text" name = "eid"  value = "<?php echo ($vo["eid"]); ?>"> </td>
                            <th align="center" nowrap="nowrap" width="100px">资产编号</th>
                            <td width="140px" align="left"><input type="text" name = "eoutid"  value = "<?php echo ($vo["eoutid"]); ?>"></td>
                        </tr>
                        <tr>
                            <th align="center" nowrap="nowrap" width="100px">仪器名称</th>
                            <td width="100px" align="left"><input type="text" name = "ecname"  value = "<?php echo ($vo["ecname"]); ?>"></td>
                            <th align="center" nowrap="nowrap" width="100px">仪器图片</th>
                            <td width="140px" align="left"><input type="file" name = "file" value = "<$vo.imagicaddress>"></td>
                            <th align="center" nowrap="nowrap" width="100px">仪器型号</th>
                            <td width="140px" align="left"><input type="text" name = "etype"  value = "<?php echo ($vo["etype"]); ?>"></td>
                        </tr>
                        <tr>
                            <th align="center" nowrap="nowrap" width="100px">单价</th>
                            <td width="100px" align="left"><input type="text" name = "eprice"  value = "<?php echo ($vo["eprice"]); ?>"></td>
                            <th align="center" nowrap="nowrap" width="100px">现状</th>
                            <td width="140px" align="left"><input type="text" name = "now"  value = "<?php echo ($vo["now"]); ?>"></td>
                            <th align="center" nowrap="nowrap" width="100px">领用单位</th>
                            <td width="140px" align="left"><input type="text" name = "eblong"  value = "<?php echo ($vo["eblong"]); ?>"></td>
                        </tr>
                        <tr>
                            <th align="center">存放地</th>
                            <td colspan="7px" align="center" style="width: 350px;"><input type="text" name = "elocation"  value = "<?php echo ($vo["elocation"]); ?>" style = "width: 100%"></td>
                        </tr>
                        
                        <tr>
                            <th align="center">供应商</th>
                            <td colspan="7px" align="center" style="width: 350px;"><input type="text" name = "ecmanufactor"  value = "<?php echo ($vo["ecmanufactor"]); ?>" style = "width: 100%"colspan="7px"></td>
                        </tr>
                        
                        <tr>
                            <th align="center">仪器简介</th>
                            <td colspan="7px" align="center" style="width: 350px;"><input type="text" name = "introduction"  value = "<?php echo ($vo["introduction"]); ?>" colspan="7px" style = "width: 100%"></td>
                        </tr>
                        <tr>
                            <th align="left" colspan="8" class="shang_center_search">
                                <span>设备特点介绍</span>
                            </th>
                        </tr>

                        <?php for($k = 0; $k < $vo['count'];$k++){ ?>
                                <tr>
                                    <th align="center" nowrap="nowrap" width="100px">特　　点
                                        <?php echo $k+1; ?>
                                    </th>
                                    <td width="140px" align="left" colspan="4">
                                        <?php echo $vo['management'][$k]['title']; ?>
                                    </td>
                                    <td width= "25% " rowspan="2" colspan="8">
                                        <div style="width: 100%; height: 45%; float: left;">
                                            <span><button type = "submit" style="margin-right: 30%; margin-bottom: 2%;"><a href="/zky/zky/index.php/Admin/Equipment/updateManagement/id/<?php echo $vo['management'][$k]['id'] ?>">修改</a></button></span>
                                        </div>
                                        <div style="width: 100%;height: 45%; float: left;">
                                            <span><button type = "reset" style="margin-right: 30%; margin-top: 2%;"><a href="/zky/zky/index.php/Admin/Equipment/deleteManagement/id/<?php echo $vo['management'][$k]['equipmentid'] ?>/eid/<?php echo $vo['management'][$k]['id']?>">删除</a></button></span>
                                        </div>
                                    </td> 
                                </tr>
                                <tr>
                                    <th align="center" nowrap="nowrap" width="100px">
                                        特点
                                        <?php echo $k+1; ?>
                                        介绍
                                        </th>
                                    <td width="140px" align="left" colspan="4">
                                        <?php echo htmlspecialchars_decode($vo['management'][$k]['content']); ?>
                                    </td>
                                </tr>
                            <?php } ?>
	                    <tr>
                            <th align="left" colspan="8" class="shang_center_search" style="padding-right: 2%;">
                                <span><button type = "submit" style="margin-left: 80%">提交</button></span>
                                <span style="padding-left: 5%;"><button type = "reset" style="margin-right: 2%">重置</button></span>
                            </th>
	                    </tr>
                        <tr>
                            <input type="text" name="count" value="<?php echo ($vo["count"]); ?>" hidden>
                        </tr>
	                </div>
            	</form>
            </div>
        </table>
        </div>
</body>
</html>