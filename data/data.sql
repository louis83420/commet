-- 创建数据库 - coding
CREATE DATABASE IF NOT EXISTS coding DEFAULT CHARACTER SET 'utf8';

-- 打开数据库
USE coding;

-- 分类表

CREATE TABLE coding_category(
    id SMALLINT UNSIGNED NOT NULL KEY AUTO_INCREMENT COMMENT '分类ID,主键且自增',
    category_name VARCHAR(30) NOT NULL COMMENT '分类名称',
    sort_number SMALLINT UNSIGNED NOT NULL DEFAULT 0 COMMENT '分类排序数字,越大越靠前',
    created_at INT UNSIGNED NOT NULL COMMENT '创建时间',
    updated_at INT UNSIGNED NOT NULL COMMENT '更新时间'
) COMMENT '分类表';

-- 管理员角色表

CREATE TABLE coding_admin_role(
	id SMALLINT UNSIGNED NOT NULL KEY AUTO_INCREMENT COMMENT '角色ID,主键且自增',
	role_name VARCHAR(30) NOT NULL UNIQUE KEY COMMENT '角色名称,唯一',
	created_at INT  UNSIGNED NOT NULL COMMENT '创建时间',
	updated_at INT UNSIGNED NOT NULL COMMENT '更新时间'
) COMMENT '管理员角色表';


-- 管理员表

CREATE TABLE coding_admin(
	id SMALLINT UNSIGNED NOT NULL KEY AUTO_INCREMENT COMMENT '管理员ID,主键且自增',
    username VARCHAR(30) NOT NULL UNIQUE KEY COMMENT '管理员用户名,唯一',
    password CHAR(32) NOT NULL COMMENT '管理员密码',
    nick_name VARCHAR(30) NOT NULL COMMENT '管理员昵称',
    admin_photo VARCHAR(40) NOT NULL COMMENT '管理员头像路径',
    role_id SMALLINT UNSIGNED NOT NULL COMMENT '外键,管理员角色ID',
 	created_at INT  UNSIGNED NOT NULL COMMENT '创建时间',
	updated_at INT UNSIGNED NOT NULL COMMENT '更新时间'   
) COMMENT '管理员表';

-- 手动添加管理员

INSERT coding_admin(username,password,nick_name,admin_photo,role_id,created_at,updated_at) VALUES('root',MD5('root'),'河蟹','1502964137_1106.jpg',1,1568857166,1568857166);
INSERT coding_admin(username,password,nick_name,admin_photo,role_id,created_at,updated_at) VALUES('admin',MD5('admin'),'洪水已逝','1503409013_2120.jpg',1,1568857167,1568857167);
INSERT coding_admin(username,password,nick_name,admin_photo,role_id,created_at,updated_at) VALUES('test',MD5('test'),'淘气的松鼠','1528704568_6104.jpg',1,1568857168,1568857168);


-- 文章表

CREATE TABLE coding_article(
	id INT UNSIGNED NOT NULL KEY AUTO_INCREMENT COMMENT '文章ID,主键且自增',
	subject VARCHAR(100) NOT NULL COMMENT '文章标题',
	content MEDIUMTEXT NOT NULL COMMENT '文章正文',
	subject_picture VARCHAR(50) NOT NULL COMMENT '标题图片',
	browse_times INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '浏览次数',
	comment_number INT UNSIGNED NOT NULL DEFAULT 0 COMMENT '评论数量',
	is_online BOOLEAN NOT NULL DEFAULT 1 COMMENT '是否上线,默认为1,即上线',
	category_id SMALLINT UNSIGNED NOT NULL COMMENT '外键,参照文章分类表ID',
	admin_id SMALLINT UNSIGNED NOT NULL COMMENT '外键,参照管理员表ID',
 	created_at INT  UNSIGNED NOT NULL COMMENT '创建时间',
	updated_at INT UNSIGNED NOT NULL COMMENT '更新时间'  	
) COMMENT '文章表';

-- 普通用户表

CREATE TABLE coding_user(
	id MEDIUMINT UNSIGNED NOT NULL KEY AUTO_INCREMENT COMMENT '用户ID,主键且自增',
	username VARCHAR(30) NOT NULL UNIQUE KEY COMMENT '用户名,唯一',
	password CHAR(32) NOT NULL COMMENT '密码',
	nick_name VARCHAR(30) NOT NULL COMMENT '用户昵称',
	user_photo VARCHAR(50) NOT NULL DEFAULT '' COMMENT '用户头像',
 	created_at INT  UNSIGNED NOT NULL COMMENT '创建时间',
	updated_at INT UNSIGNED NOT NULL COMMENT '更新时间'  	
) COMMENT '普通用户表';

-- 评论表

CREATE TABLE coding_comment(
	id INT UNSIGNED NOT NULL KEY AUTO_INCREMENT COMMENT '评论ID,主键且自增',
	comment TEXT NOT NULL COMMENT '评论内容',
	user_id MEDIUMINT UNSIGNED NOT NULL COMMENT '外键,参照普通用户表ID',
	article_id INT UNSIGNED NOT NULL COMMENT '外键,参照文章表ID',
 	created_at INT  UNSIGNED NOT NULL COMMENT '创建时间',
	updated_at INT UNSIGNED NOT NULL COMMENT '更新时间'  	
) COMMENT '评论表';