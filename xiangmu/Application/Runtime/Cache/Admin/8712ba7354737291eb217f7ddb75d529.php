<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/zky/zky/Uploads/Css/public.css" />
    <link rel="stylesheet" type="text/css" href="/zky/zky/Uploads/Css/equipment.css" />
</head>
<body>
    <div class="title">
        <font color="#777777"><strong>用户名称：</strong></font>
        <a href="/zky/zky/index.php/Admin/Message/studenttdetail"><?php echo (session('username')); ?></a>
    </div>
    <div>共有<?php echo ($count); ?>个仪器</div>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="min-height: 400px;">
            <div id="eqp_pic" >
                    <a id="eqp_pic_a" href="/zky/zky/Uploads/<?php echo ($vo["imagicaddress"]); ?>" target = "_blank" ><img src="/zky/zky/Uploads<?php echo ($vo["imagicaddress"]); ?>" class = "pic" alt="无图片" /></a>           
            </div>

            <div id="eqp_con">
                <table  id="eqp_con_tab">
                            <tr>
                                <th   style="width: 250px;" colspan="3">
                                    <span>设备基本信息</span>
                                </th>
                            </tr>
                            <tr>
                                <th   >仪器编号</th>
                                <td  ><?php echo ($vo["eid"]); ?></td>
                                <th  >资产编号</th>
                                <td  ><?php echo ($vo["eoutid"]); ?></td>
                                <th  >名　　称</th>
                                <td  ><?php echo ($vo["ecname"]); ?></td>
                            </tr>
                            <tr>
                                <th   >型　　号</th>
                                <td  ><?php echo ($vo["etype"]); ?></td>
                                <th  >单　　价</th>
                                <td  ><?php echo ($vo["eprice"]); ?></td>
                                <th  >现　　状</th>
                                <td  ><?php echo ($vo["now"]); ?></td>
                            </tr>

                            <tr>
                                <th   >领用单位</td>
                                <td  ><?php echo ($vo["eblong"]); ?></td>
                                <th  >存放地</td>
                                <td  ><?php echo ($vo["elocation"]); ?></td>
                                <th  >供应商</td>
                                <td  ><?php echo ($vo["ecmanufactor"]); ?></td>
                            </tr>
                           
                            <tr>
                                <th >仪器简介</td>
                                <td  ><?php echo ($vo["introduction"]); ?></td>
                            </tr>
                            <?php for($k = 0; $k < $vo['count'];$k++){ ?>
                                <tr>
                                    <th >特　　点
                                    <!--     <?php echo $k+1; ?> -->
                                    </th>
                                    <td  >
                                        <?php echo $vo['management'][$k]['title']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th >
<!--                                         <?php echo $k+1; ?> -->
                                        介　　绍</th>
                                    <td  >
                                        <?php echo htmlspecialchars_decode($vo['management'][$k]['content']); ?>
                                    </td>
                                </tr>
                            <?php } ?>
                </table>
            </div>
            <div class="clr"></div>
            <div id="eqp_option">
                    <a class="eqp_option_a" href="/zky/zky/index.php/Admin/Equipment/update/id/<?php echo ($vo["id"]); ?>"><button>修改</button></a> 
                    <a class="eqp_option_a" href="/zky/zky/index.php/Admin/Equipment/delete/id/<?php echo ($vo["id"]); ?>"><button>删除</button></a> 
                    <a class="eqp_option_a" href="/zky/zky/index.php/Admin/Equipment/add_management/id/<?php echo ($vo["id"]); ?>"><button>添加介绍</button></a> 
            </div>
            <div class="clr"></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>