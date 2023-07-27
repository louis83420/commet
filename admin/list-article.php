<?php
date_default_timezone_set('Asia/Shanghai');
include '../config/database.php';
include '../include/Db.php';
$pdo = connect($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);
$rowset = select('coding_article AS a', ['fields' => 'a.id,subject,a.created_at,category_name,is_online', 'innerJoin' => [
    'table' => 'coding_category AS c',
    'on' => 'category_id = c.id',
]]);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <title>码农博客后台管理系统</title>
    <meta name="description" content="overview &amp; stats">
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
    <script>
        function destroyArticle(id) {
            if (window.confirm('确认要删除文章吗？\n\n删除后将无法恢复')) {
                location.href = 'destroy-article.php?id=' + id;
            }
        }

        function controlCheckboxClick() {
            var controlCheckboxEle = document.getElementById('control_checkbox');
            var articleCheckboxEles = document.getElementsByName('article_checkbox[]');

            for (var i = 0; i < articleCheckboxEles.length; i++) {
                var articleCheckboxEle = articleCheckboxEles[i];
                articleCheckboxEle.checked = controlCheckboxEle.checked;


            }
        }

        function getCheckedNum() {
            var count = 0;
            var articleCheckboxEles = document.getElementsByName('article_checkbox[]');
            for (var i = 0; i < articleCheckboxEles.length; i++) {
                var articleCheckboxEle = articleCheckboxEles[i];
                if (articleCheckboxEle.checked) {
                    count++;
                }
            }
            return count;
        }

        function articleCheckboxClick() {
            var controlCheckboxEle = document.getElementById('control_checkbox');
            var articleCheckboxEles = document.getElementsByName('article_checkbox[]');
            controlCheckboxEle.checked = articleCheckboxEles.length == getCheckedNum();

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
            try {
                ace.settings.loadState('main-container')
            } catch (e) {}
        </script>
        <div id="sidebar" class="sidebar  responsive ace-save-state">
            <script type="text/javascript">
                try {
                    ace.settings.loadState('sidebar')
                } catch (e) {}
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
                        <h1>文章列表</h1>
                    </div>
                    <div class="row">
                        <?php if (!$rowset) { ?>
                            <!-- 不存在文章时，显示的HTML代码段开始 -->
                            <div class="col-xs-12">
                                <table class="table  table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <td class="col-xs-1 center">序号</td>
                                            <td class="col-xs-1 center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace">
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>
                                            <td>文章标题</td>
                                            <td class="col-sm-2">文章分类</td>
                                            <td class="col-xs-2">发布日期</td>
                                            <td class="col-xs-1"></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="6">
                                                <a href="create-article.php">添加文章</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- 不存在文章时，显示的HTML代码段结束 -->
                        <?php } else { ?>
                            <!-- 存在文章时，显示的HTML代码段开始 -->
                            <div class="col-xs-12">
                                <form action="deleteSelectedArticle.php" method="post">
                                    <div class="form-group"><input type="submit" value="删除所选文章" class="btn btn-primary"></div>
                                    <table class="table  table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td class="col-xs-1 center">序号</td>
                                                <td class="col-xs-1 center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" id="control_checkbox" onclick="controlCheckboxClick()">
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td>文章标题</td>
                                                <td class="col-sm-2">文章分类</td>
                                                <td class="col-xs-2 text-right">发布日期</td>
                                                <td class="col-xs-2"></td>
                                            </tr>
                                        </thead>
                                        <!-- 文章列表表格主体开始 -->
                                        <tbody>
                                            <!-- 单一文章信息开始 -->
                                            <?php foreach ($rowset as $index => $row) { ?>
                                                <tr>
                                                    <td class="center"><?php echo $index + 1 ?></td>
                                                    <td class="center">
                                                        <label class="pos-rel">
                                                            <input type="checkbox" class="ace" name="article_checkbox[]" value="<?php echo $row['id'] ?>" onclick="articleCheckboxClick()">
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </td>
                                                    <td><a href="../varticle.php?id=<?php echo $row['id'] ?>" target="_blank"><?php echo $row['subject'] ?></a></td>
                                                    <td><?php echo $row['category_name'] ?></td>
                                                    <td class="text-right"><?php echo date($row['created_at']) ?></td>
                                                    <td class="text-center">
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="blue" href="../varticle.php?id=<?php echo $row['id'] ?>" title="查看" target="_blank">
                                                                <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                            </a>
                                                            <a class="green" href="edit-article.php?id=<?php echo $row['id'] ?>" title="编辑">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>
                                                            <?php if ($row['is_online'] == 0) { ?>
                                                                <a class="blue" href="online-article.php?id=<?php echo $row['id'] ?>" title="上线">
                                                                    <i class="ace-icon glyphicon glyphicon-eye-open"></i>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="blue" href="offline-article.php?id=<?php echo $row['id'] ?>" title="下线">
                                                                    <i class="ace-icon glyphicon glyphicon-eye-close"></i>
                                                                </a>
                                                            <?php } ?>
                                                            <a class="red" href="javascript:destroyArticle(<?php echo $row['id'] ?>)" title="删除">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <!-- 单一文章信息结束 -->

                                        </tbody>
                                        <!-- 文章列表表格主体结束 -->
                                    </table>
                                </form>
                                <!-- 文章列表表格结束 -->
                                <!-- 分页页码区域开始 -->
                                <ul class="pagination">
                                    <li>
                                        <a>共5页/第1页</a>
                                    </li>
                                    <li class="disabled" title="上一页">
                                        <a href="#">
                                            <i class="ace-icon fa fa-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li title="上一页">
                                        <a href="#">
                                            <i class="ace-icon fa fa-angle-double-left"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <a href="#">2</a>
                                    </li>
                                    <li>
                                        <a href="#">3</a>
                                    </li>
                                    <li>
                                        <a href="#">4</a>
                                    </li>
                                    <li>
                                        <a href="#">5</a>
                                    </li>
                                    <li title="下一页">
                                        <a href="#">
                                            <i class="ace-icon fa fa-angle-double-right"></i>
                                        </a>
                                    </li>
                                    <li class="disabled" title="下一页">
                                        <a href="#">
                                            <i class="ace-icon fa fa-angle-double-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- 分页页码区域结束 -->
                            </div>
                            <!-- 存在文章时，显示的HTML代码段结束 -->
                        <?php } ?>
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
        if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
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