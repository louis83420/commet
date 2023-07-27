<?php
include 'include/Common.php';
include 'config/database.php';
include 'include/Db.php';
$cid = $_GET['cid'];
$pdo = connect($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);
//获取总记录数
$rowCount = counts('coding_article', 'id', 'is_online=1' . ($cid ? ' AND category_id=' . $cid : null));
//指定每页显示的记录数
$pagesize = 5;
//计算总页数
$pageCount = ceil($rowCount / $pagesize);
//输出页码并且获取当前页码
$page = (int) $_GET['page'] ?: 1;
//计算偏移值
$offset = ($page - 1) * $pagesize;
$rowset = select('coding_article', ['fields' => 'id,subject,content,subject_picture,created_at,browse_times,comment_number', 'where' => 'is_online=1' . ($cid ? ' AND category_id=' . $cid : null), 'limit' => $offset . ',' . $pagesize]);
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
    <script>
        function gotoPage() {
            var txtEle = document.getElementById('blog_page');
            var page = txtEle.value;
            location.href = 'index.php?cid=<?php echo $cid ?>&page=' + page;
        }
    </script>
</head>

<body>
    <!-- 头部区域开始 -->
    <?php include 'include/header.php' ?>
    <!-- 头部区域结束 -->
    <!-- 主要区域开始 -->
    <div id="main">
        <?php if ($rowset) { ?>
            <ul class="article-list">
                <!-- 单一文章信息开始 -->
                <?php foreach ($rowset as $row) { ?>
                    <li class="article-item">
                        <div class="article-item-image">
                            <a href="varticle.php?id=<?php echo $row['id'] ?>" target="_blank">
                                <img src="public/images/thumbs/<?php echo $row['subject_picture'] ?>" alt="" title="<?php echo $row['subject'] ?>">
                            </a>
                        </div>
                        <div class="article-item-content">
                            <a href="varticle.php?id=<?php echo $row['id'] ?>" class="article-item-title" title="<?php echo $row['subject'] ?>" target="_blank"><?php echo $row['subject'] ?></a>
                            <div class="article-item-text">
                                <?php echo mb_substr(trim(strip_tags($row['content'])), 0, 50) ?>...
                            </div>
                            <div class="article-item-info">
                                <span class="article-item-time"><?php //echo formatDate($row['created_at']) 
                                                                ?></span>
                                <span class="article-item-browse">
                                    <i class="icon-eye-open"></i>
                                    <?php echo $row['browse_times'] ?>
                                </span>
                                <span class="article-item-comment">
                                    <i class="icon-comment"></i>
                                    <?php echo $row['comment_number'] ?>
                                </span>
                            </div>
                        </div>
                    </li>
                <?php } ?>
                <!-- 单一文章信息结束 -->
            </ul>
            <div class="page-customize">
                <!--  -->
                <div class="pages">
                    <div class="aui-pager">
                        <span class="ucd-pager-count">总条数: <?php echo $rowCount ?></span>
                        <ul class="ucd-pager-pages">
                            <?php if ($page == 1) { ?>
                                <li class="ucd-pager-btn ucd-pager-prev disabled"><span></span></li>
                            <?php } else { ?>
                                <li class="ucd-pager-btn ucd-pager-prev"><a href="index.php?cid=<?php echo $cid ?>&page=<?php echo $page - 1 ?>"></a></li>
                            <?php } ?>
                            <?php for ($p = 1; $p <= $pageCount; $p++) { ?>
                                <?php if ($p == $page) { ?>
                                    <li class="ucd-pager-page active"><a href="#"><?php echo $p ?></a></li>
                                <?php } else { ?>
                                    <li class="ucd-pager-page"><a href="index.php?page=<?php echo $p ?>&cid=<?php echo $cid ?>"><?php echo $p ?></a></li>
                                    <?php } ?><?php
                                            } ?>
                                    <li class="ucd-pager-page page_disable disabled"><span>...</span></li>
                                    <li class="ucd-pager-page"><a href="index.php?cid=<?php echo $cid ?>&page=<?php echo $pageCount ?>"><?php echo $pageCount ?></a></li>
                                    <?php if ($page == $pageCount) { ?>
                                        <li class="ucd-pager-btn ucd-pager-next disabled"><span></span></li>
                                    <?php } else { ?>
                                        <li class="ucd-pager-btn ucd-pager-next"><a href="index.php?cid=<?php echo $cid ?>&page=<?php echo $page + 1 ?>"></a></li>
                                    <?php } ?>
                        </ul>
                        <span class="ucd-pager-goto">
                            到第<input type="text" class="ucd-pager-goto-page" id="blog_page" value="1">页
                            <button class="ucd-pager-trigger" id="blog_go" onclick="gotoPage()">确定</button>
                        </span>
                    </div>
                </div>
                <!--  -->
            </div>
        <?php } else { ?>
            <div class="error-404">
                <img src="public/images/global/404-Error.png">
            </div>
        <?php } ?>
    </div>
    <!-- 主要区域结束 -->
    <!-- 页脚区域开始 -->
    <?php include 'include/footer.php' ?>
    <!-- 页脚区域结束 -->
</body>

</html>