<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
       /*  #p_header th{
           border-color: #eff2f7;
           font-size: 16px;
           margin-bottom: 30px;
           margin-right: 30px;
           width: ;
           font-weight: 300;
       } */
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
    </style>
    <script type="text/javascript" src="/zky/zky/Public/libs/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/zky/zky/Public/libs/ueditor/ueditor.all.js"></script>
    <script type="text/javascript" src="/zky/zky/Public/libs/jquery/jquery.min.js"></script>
</head>
<body>
    <font color="#777777"><strong>用户名称：</strong></font>
    <a href="/zky/zky/index.php/Admin/Message/studenttdetail"><?php echo (session('username')); ?></a>
    <table>
            <div class="panel">
                <thead>
                <!-- <div id='p_header'>
                <tr>
                                    <th>序号</th>
                        <th>链接名称</th>
                        <th>上传日期</th>
                        <th>管理菜单</th>
                    </tr>
                </div> -->
                </thead>
                <div id='p_body'>
                    <form action="/zky/zky/index.php/Admin/Equipment/do_add" method="post" enctype="multipart/form-data" name="myForm">
                        <tr>
                            <td>仪器分类</td>
                            <td><!-- 选择一个下拉表 -->
                                <select name="class">
                                    <option value= 1>质谱仪器</option>
                                    <option value= 2>色谱仪器</option>
                                    <option value= 3>光谱仪器</option>
                                    <option value= 4>生化分离分析仪器</option>
                                    <option value= 5>显微镜及图像仪</option>
                                    <option value= 6>品质分析仪器</option>
                                    <option value= 7>其他</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>仪器图片：</td>
                            <td><input type="file" name = "file"></td>
                        </tr>
                        <tr>
                            <td>仪器序号：</td>
                            <td><input type="text" name = "eid"> </td>
                        </tr>
                        <tr>
                            <td>资产编号：</td>
                            <td><input type="text" name = "eoutid"></td>
                        </tr>
                        <tr>
                            <td>仪器名称：</td>
                            <td><input type="text" name = "ecname"></td>
                        </tr>
                        <tr>
                            <td>仪器型号：</td>
                            <td><input type="text" name = "etype"></td>
                        </tr>
                        <tr>
                            <td>单价：</td>
                            <td><input type="text" name = "eprice"></td>
                        </tr>
                        <tr>
                            <td>现状：</td>
                            <td><input type="text" name = "now"></td>
                        </tr>
                        <tr>
                            <td>领用单位：</td>
                            <td><input type="text" name = "eblong"></td>
                        </tr>
                        <tr>
                            <td>存放地：</td>
                            <td><input type="text" name = "elocation"></td>
                        </tr>
                        
                        <tr>
                            <td>供应商：</td>
                            <td><input type="text" name = "ecmanufactor"></td>
                        </tr>
                        
                        <tr>
                            <td>仪器简介</td>
                            <td><input type="text" name = "introduction"></td>
                        </tr>
                        <tr>
                            <div id="buttom" >
                               <button type = "submit" value ="添加">添加</button>
                               <button type="reset" value = "重置">重置</button>
                            </div>
                        </tr>
                        
                    </form>
                </div>
            </div>
    </table>
</body>
</html>