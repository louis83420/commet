<?php
include '../config/database.php';
include '../include/Db.php';
$pdo = connect($config['database']['hostname'], $config['database']['username'], $config['database']['password'], $config['database']['database']);
$ids = join(',', $_POST['article_checkbox']);
delete('coding_article', 'id in(' . $ids . ')');
//header
header('location:list-article.php');
