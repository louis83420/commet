<?php
include '../config/database.php';
include '../include/Db.php';
$id = $_GET['id'];
$pdo = connect($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);

//获取文章详细信息
$row = selectOne('coding_article', ['fields' => 'id,subject,content,category_id', 'where' => 'id=' . $id]);
//获取所有的文章分类信息
$categoryRowset = select('coding_category', ['fields' => 'id,category_name']);
// print_r($categoryRowset);
// print_r($row);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta charset="utf-8">
        <title>码农博客后台管理系统</title>
        <meta name="description" content="overview &amp; stats" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- page specific plugin styles -->
        <!-- text fonts -->
        <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css">
        <!-- ace styles -->
        <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style">
        <link rel="stylesheet" href="assets/css/ace-skins.min.css">
        <link rel="stylesheet" href="assets/css/ace-rtl.min.css">
        <script src="assets/js/ace-extra.min.js"></script>
        <script src="ueditor/ueditor.config.js"></script>
        <script src="ueditor/ueditor.all.min.js"> </script>
        <script src="ueditor/lang/zh-cn/zh-cn.js"></script>
        <script>
        function checkForm(){
        var subjectEle = document.getElementById('subject');
        if(subjectEle.value === ''){
        window.alert('文章标题为必填项');
        return false;
        }
        if(!ue.hasContents()){
        window.alert('文章正文为必填项');
        return false;
        }
        return true;

        }
        </script>
    </head>
    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default  ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                <span class="sr-only">Toggle sidebar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <div class="navbar-header pull-left">
                    <a href="index.php" class="navbar-brand">
                        <small>
                        <i class="fa fa-leaf"></i>
                        码农博客后台管理系统
                        </small>
                    </a>
                </div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>欢迎光临,</small>
                                    Jason
                                </span>
                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>
                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="edit-user-profile.php">
                                        <i class="ace-icon fa fa-user"></i>
                                        修改个人资料
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="logout.php">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        退出
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>
            <div id="sidebar" class="sidebar  responsive ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>
                <ul class="nav nav-list">
                    <li>
                        <a href="index.php">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> 控制台 </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-desktop"></i>
                            <span class="menu-text">
                                文章分类
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="create-category.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    添加分类
                                </a>
                            </li>
                            <li>
                                <a href="list-category.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    分类列表
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="open active">
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text">
                                文章管理
                            </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="create-article.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    发表文章
                                </a>
                            </li>
                            <li class="active">
                                <a href="list-article.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    文章列表
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon glyphicon glyphicon-user"></i>
                            <span class="menu-text"> 用户管理 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="create-user.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    添加用户
                                </a>
                            </li>
                            <li>
                                <a href="list-user.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    用户列表
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-cutlery"></i>
                            <span class="menu-text"> 角色管理 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="list-role.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    角色列表
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon glyphicon glyphicon-info-sign"></i>
                            <span class="menu-text"> 个人资料 </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="edit-user-password.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    修改密码
                                </a>
                            </li>
                            <li>
                                <a href="edit-user-profile.php">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                    修改个人资料
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="index.php">首页</a>
                            </li>
                            <li class="active">文章管理</li>
                        </ul>
                    </div>
                    <div class="page-content">
                        <div class="page-header">
                            <h1>编辑文章</h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- 编辑文章表单区域开始 -->
                                <form action="update-article.php?id=<?php echo $id ?>" method="post" onsubmit="return checkForm()"  enctype="multipart/form-data">
                                    <table class="table  table-bordered">
                                        <tr>
                                            <td class="col-xs-2">文章标题</td>
                                            <td>
                                                <div class="col-xs-6">
                                                    <input type="text" name="subject" id="subject" class="form-control" value="<?php echo $row['subject'] ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>标题图片</td>
                                            <td>
                                                <div class="col-xs-6">
                                                    <input type="file" name="subject_image">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-xs-2">文章分类</td>
                                            <td>
                                                <div class="col-xs-6">
                                                    <select name="category_id" class="form-control">
                                                        <?php foreach ($categoryRowset as $categoryRow) {?>
                                                            <?php if ($categoryRow['id'] == $row['category_id']) {?>
                                                            <option selected value="<?php echo $categoryRow['id'] ?>"><?php echo $categoryRow['category_name'] ?></option>
                                                            <?php } else {?>
                                                        <option value="<?php echo $categoryRow['id'] ?>"><?php echo $categoryRow['category_name'] ?></option>
                                                            <?php }?>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>文章正文</td>
                                            <td>
                                                <div class="col-xs-12">
                                                    <script id="editor" type="text/plain" name="content" style="width:100%;height:350px;">
                                                        <?php echo $row['content'] ?>
                                                    </script>
                                                    <script type="text/javascript">
                                                    var ue = UE.getEditor('editor');
                                                    </script>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <button class="btn btn-primary" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                确认编辑
                                                </button>
                                                <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                放弃编辑
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <!-- 编辑文章表单区域结束 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- basic scripts -->
        <!--[if !IE]> -->
        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <!-- <![endif]-->
        <!--[if IE]>
        <script src="assets/js/jquery-1.11.3.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- page specific plugin scripts -->
        <script src="assets/js/jquery-ui.custom.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>
        <script src="assets/js/jquery.sparkline.index.min.js"></script>
        <script src="assets/js/jquery.flot.min.js"></script>
        <script src="assets/js/jquery.flot.pie.min.js"></script>
        <script src="assets/js/jquery.flot.resize.min.js"></script>
        <!-- ace scripts -->
        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>
    </body>
</html>
