<?php
include 'config/database.php';
include 'include/Db.php';
$pdo = connect($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);
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
        <?php include 'include/header.php'?>
        <!-- 头部区域结束 -->
        <!-- 文章评论区域开始 -->
        <div id="special-article-comment">
            <div id="special-article-comment-wrapper">
                <h1 class="article-title">
                <a href="varticle.php" target="_blank">统一战线如何开展新时代对台工作?这个会议告诉你</a>
                </h1>
                <!-- 评论表单开始 -->
                <div id="special-article-comment-form">
                    <div id="special-article-comment-header">
                        <div class="special-comment-title"><i class="icon-comment"></i>&nbsp;我来说两句</div>
                        <div class="special-comment-count">0条评论</div>
                    </div>

                    <div id="special-article-comment-body">
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
                <!-- 评论表单结束 -->
                <!-- 评论列表开始 -->
                <div id="special-article-comment-list">
                    <div class="special-article-comment-list-title">
                        <span>最热评论</span>
                    </div>
                    <div class="special-article-comment-item">
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
                    <div class="special-article-comment-item">
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
                <!-- 评论列表结束 -->
            </div>
            <div id="special-article-comment-slide">
                <h2 class="top-ranking">热评排行</h2>
                <ul class="top-ranking-list">
                    <li>
                        <div class="index">01</div>
                        <div class="txts"><a href="#" target="_blank">加拿大人谢伦伯格因犯走私毒品罪被判死刑</a></div>
                        <div class="nums">71993</div>
                    </li>
                    <li>
                        <div class="index">02</div>
                        <div class="txts"><a href="#" target="_blank">加拿大人谢伦伯格因犯走私毒品罪被判死刑</a></div>
                        <div class="nums">71993</div>
                    </li>
                    <li>
                        <div class="index">03</div>
                        <div class="txts"><a href="#" target="_blank">加拿大人谢伦伯格因犯走私毒品罪被判死刑</a></div>
                        <div class="nums">71993</div>
                    </li>
                    <li>
                        <div class="index">04</div>
                        <div class="txts"><a href="#" target="_blank">加拿大人谢伦伯格因犯走私毒品罪被判死刑</a></div>
                        <div class="nums">71993</div>
                    </li>
                    <li>
                        <div class="index">05</div>
                        <div class="txts"><a href="#" target="_blank">加拿大人谢伦伯格因犯走私毒品罪被判死刑</a></div>
                        <div class="nums">71993</div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 文章评论区域结束 -->
        <!-- 页脚区域开始 -->
        <?php include 'include/footer.php'?>
        <!-- 页脚区域结束 -->
    </body>
</html>
