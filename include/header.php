<?php
$categoryRowset = select('coding_category', ['fields' => 'id,category_name', 'order' => 'sort_number desc']);
?>
<div id="header">
    <div class="header-wrapper">
        <div class="header-logo">
            <a href="index.php" title="码农博客">首页</a>
        </div>
        <ul class="header-nav">
            <?php if ($cid) {?>
            <li><a href="index.php">首页</a></li>
            <?php } else {?>
             <li class="active"><a href="index.php">首页</a></li>
            <?php }?>
            <?php foreach ($categoryRowset as $categoryRow) {?>
                <?php if ($categoryRow['id'] == $cid) {?>
                    <li class="active"><a href="index.php?cid=<?php echo $categoryRow['id'] ?>"><?php echo $categoryRow['category_name'] ?></a></li>
                <?php } else {?>
            <li><a href="index.php?cid=<?php echo $categoryRow['id'] ?>"><?php echo $categoryRow['category_name'] ?></a></li>
                <?php }?>
            <?php }?>
        </ul>
        <ul class="header-tools">
            <li class="header-login"><a href="login.php">登录</a></li>
            <li class="header-register"><a href="register.php">注册</a></li>
            <li class="header-profile"><img src="public/images/head/1516787980_8765.png" alt=""><a href="common-setting.php">常规设置</a></li>
            <li><a href="change-password.php">密码修改</a></li>
            <li class="header-logout"><a href="jump.php">退出</a></li>
        </ul>
    </div>
</div>
