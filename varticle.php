<?php
date_default_timezone_set('Asia/Shanghai');
$id = $_GET['id'];
include 'config/database.php';
include 'include/Db.php';
$pdo = connect($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);
//更新浏览次数
update('coding_article', ['browse_times' => 'raw(browse_times+1)'], 'id=' . $id);
//文章详细信息
$row = selectOne('coding_article AS a', ['fields' => 'a.id,subject,content,browse_times,comment_number,a.created_at,nick_name,admin_photo', 'where' => 'a.id=' . $id, 'innerJoin' => [
    'table' => 'coding_admin AS d',
    'on' => 'admin_id = d.id',
]]);
// print_r($row);
// echo $row['subject'];
// var_dump($row);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>码农博客-PHP技术交流博客</title>
    <link rel="stylesheet" href="public/styles/reset.css">
    <link rel="stylesheet" href="public/styles/fonts.css">
    <link rel="stylesheet" href="public/styles/coding.css">
    <link type="image/x-icon" href="public/images/global/favicon.ico" rel="icon">
</head>

<body>
    <!-- 头部区域开始 -->
    <?php include 'include/header.php' ?>
    <!-- 头部区域结束 -->
    <!-- 文章主要区域开始 -->
    <div id="article-main">
        <!-- 左侧文章内容区域开始 -->
        <div id="article-content">
            <h3 id="article-subject"><?php echo $row['subject'] ?></h3>
            <div id="article-info">
                <div class="author-mini-head">
                    <a href="#"><img src="public/images/head/<?php echo $row['admin_photo'] ?>" alt=""></a>
                </div>
                <span><?php echo $row['nick_name'] ?> 发表于 <?php echo $row['created_at'] ?></span>
                <div class="view-info">
                    <i class="icon-eye-open"></i>
                    <?php echo $row['browse_times'] ?>
                </div>
                <div class="comment-info">
                    <i class="icon-comment"></i>
                    <?php echo $row['comment_number'] ?>
                </div>
            </div>
            <!-- 文章正文开始 -->
            <div id="article-detail">
                <?php echo $row['content'] ?>
            </div>
            <!-- 文章正文结束 -->
            <!-- 评论表单区域开始 -->
            <div id="article-comment">
                <div id="article-comment-header">
                    <div class="comment-title"><i class="icon-comment"></i>&nbsp;我来说两句</div>
                    <div class="comment-count">
                        <a href="comment.php" target="_blank">0</a>
                        条评论
                    </div>
                </div>

                <div id="article-comment-body">
                    <!-- 用户没有登录的情况下显示的HTML代码段开始 -->
                    <div class="no-login-area">
                        <div class="no-login-tip">
                            <a href="login.php">登录</a>
                            后参与评论
                        </div>
                    </div>
                    <!-- 用户没有登录的情况下显示的HTML代码段结束 -->
                    <!-- 用户登录情况下显示的HTML代码开始 -->
                    <div class="comment-area">
                        <form action="jump.php" method="post">
                            <textarea name="comment" id="comment" cols="30" rows="10" placeholder="我有话说"></textarea>
                            <input type="submit" value="发表评论" id="btn-comment">
                        </form>
                    </div>

                    <!-- 用户登录情况下显示的HTML代码结束 -->
                </div>
            </div>
            <!-- 评论表单区域结束 -->
            <!-- 评论列表区域开始 -->
            <div id="article-comment-list">
                <div class="article-comment-item">
                    <div class="user-head">
                        <a href="#">
                            <img src="public/images/head/1503409013_2120.jpg" alt="">
                        </a>
                    </div>
                    <div class="comment-content">
                        <div class="username">
                            <a href="#">灵魂摆渡水灵灵</a>
                        </div>
                        <div class="comment-text">
                            习总书记大力改善民生，注重基层；让群众得到看得见、摸得着的实惠，可见习总始终把人民群众利益放在首位，支持习总
                        </div>
                        <div class="comment-time">
                            <i class="icon-time"></i>
                            今天15:50
                        </div>
                    </div>
                </div>
                <div class="article-comment-item">
                    <div class="user-head">
                        <a href="#">
                            <img src="public/images/head/1528704568_6104.jpg" alt="">
                        </a>
                    </div>
                    <div class="comment-content">
                        <div class="username">
                            <a href="#">灵魂摆渡水灵灵</a>
                        </div>
                        <div class="comment-text">
                            习总书记大力改善民生，注重基层；让群众得到看得见、摸得着的实惠，可见习总始终把人民群众利益放在首位，支持习总习总书记大力改善民生，注重基层；让群众得到看得见、摸得着的实惠，可见习总始终把人民群众利益放在首位，支持习总习总书记大力改善民生，注重基层；让群众得到看得见、摸得着的实惠，可见习总始终把人民群众利益放在首位，支持习总习总书记大力改善民生，注重基层；让群众得到看得见、摸得着的实惠，可见习总始终把人民群众利益放在首位，支持习总
                        </div>
                        <div class="comment-time">
                            <i class="icon-time"></i>
                            今天15:50
                        </div>
                    </div>
                </div>
            </div>
            <!-- 评论列表区域结束 -->
        </div>
        <!-- 左侧文章内容区域结束 -->
        <!-- 左侧侧边框区域开始 -->
        <div id="article-sidebar">
            <div class="common-slide">
                <div class="common-slide-title">热门标签</div>
                <ul>
                    <li class="blog-hot-tags">HTML5</li>
                    <li class="blog-hot-tags">CSS3</li>
                    <li class="blog-hot-tags">PDO类</li>
                    <li class="blog-hot-tags">MySQL数据库</li>
                    <li class="blog-hot-tags">PHP OOP</li>
                    <li class="blog-hot-tags">设计模式</li>
                    <li class="blog-hot-tags">ThinkPHP框架</li>
                    <li class="blog-hot-tags">Laravel框架</li>
                </ul>
            </div>
            <div class="common-slide">
                <div class="common-slide-title">博主推荐</div>
                <div class="blogger-recommend-list">
                    <div class="blogger-recommend-item">
                        <a href="#" class="blogger-recommend-author-image">
                            <img src="public/images/head/20161205170134_94058.png" alt="">
                        </a>
                        <div class="blogger-recommend-author-info">
                            <h3><a href="#">淘气的松鼠</a></h3>
                            <div class="blogger-recommend-detail">
                                <span>博客：300篇</span>
                            </div>
                        </div>
                    </div>
                    <div class="blogger-recommend-item">
                        <a href="#" class="blogger-recommend-author-image">
                            <img src="public/images/head/1516787980_8765.png" alt="">
                        </a>
                        <div class="blogger-recommend-author-info">
                            <h3><a href="#">桥</a></h3>
                            <div class="blogger-recommend-detail">
                                <span>博客：300篇</span>
                            </div>
                        </div>
                    </div>
                    <div class="blogger-recommend-item">
                        <a href="#" class="blogger-recommend-author-image">
                            <img src="public/images/head/20160909128468_74381.png" alt="">
                        </a>
                        <div class="blogger-recommend-author-info">
                            <h3><a href="#">麦田的稻草人</a></h3>
                            <div class="blogger-recommend-detail">
                                <span>博客：300篇</span>
                            </div>
                        </div>
                    </div>
                    <div class="blogger-recommend-item">
                        <a href="#" class="blogger-recommend-author-image">
                            <img src="public/images/head/1531447774_4034.jpg" alt="">
                        </a>
                        <div class="blogger-recommend-author-info">
                            <h3><a href="#">猫咪</a></h3>
                            <div class="blogger-recommend-detail">
                                <span>博客：300篇</span>
                            </div>
                        </div>
                    </div>
                    <div class="blogger-recommend-item">
                        <a href="#" class="blogger-recommend-author-image">
                            <img src="public/images/head/1503409013_2120.jpg" alt="">
                        </a>
                        <div class="blogger-recommend-author-info">
                            <h3><a href="#">木酱</a></h3>
                            <div class="blogger-recommend-detail">
                                <span>博客：300篇</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 左侧侧边框区域结束 -->
    </div>
    <!-- 文章主要区域结束 -->
    <!-- 页脚区域开始 -->
    <?php include 'include/footer.php' ?>
    <!-- 页脚区域结束 -->
</body>

</html>