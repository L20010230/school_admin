/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:3306
 Source Schema         : xhadmin

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 02/03/2022 15:21:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cd_access
-- ----------------------------
DROP TABLE IF EXISTS `cd_access`;
CREATE TABLE `cd_access`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分组ID',
  `purviewval` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '分组对应权限值',
  `role_id` smallint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `group_id`(`role_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2984 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cd_action
-- ----------------------------
DROP TABLE IF EXISTS `cd_action`;
CREATE TABLE `cd_action`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(9) NOT NULL COMMENT '模块ID',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '动作名称',
  `action_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '动作名称',
  `type` tinyint(4) NOT NULL,
  `icon` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'icon图标',
  `pagesize` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '20' COMMENT '每页显示数据条数',
  `is_view` tinyint(4) NULL DEFAULT 0 COMMENT '是否按钮',
  `button_status` tinyint(4) NULL DEFAULT NULL COMMENT '按钮是否显示列表',
  `sql_query` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'sql数据源',
  `block_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '注释',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '打开页面尺寸',
  `fields` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '操作的字段',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `lable_color` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '按钮背景色',
  `relate_table` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关联表',
  `relate_field` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关联字段',
  `list_field` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '查询的字段',
  `bs_icon` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '按钮图标',
  `sortid` mediumint(9) NULL DEFAULT 0 COMMENT '排序',
  `orderby` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '配置排序',
  `default_orderby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '默认排序',
  `tree_config` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jump` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '按钮跳转地址',
  `is_controller_create` tinyint(4) NULL DEFAULT 1 COMMENT '是否生成控制其方法',
  `is_service_create` tinyint(4) NULL DEFAULT NULL COMMENT '是否生成服务层方法',
  `is_view_create` tinyint(4) NULL DEFAULT NULL COMMENT '视图生成',
  `cache_time` mediumint(9) NULL DEFAULT NULL COMMENT '缓存时间',
  `log_status` tinyint(4) NULL DEFAULT NULL COMMENT '是否生成日志',
  `api_auth` tinyint(4) NULL DEFAULT NULL COMMENT '接口是否鉴权',
  `sms_auth` tinyint(4) NULL DEFAULT NULL COMMENT '短信验证',
  `captcha_auth` tinyint(4) NULL DEFAULT NULL COMMENT '列表选中方式 1多选 2单选',
  `request_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '请求类型',
  `do_condition` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作条件',
  `select_type` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_id`(`menu_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2427 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_action
-- ----------------------------
INSERT INTO `cd_action` VALUES (78, 18, '首页数据列表', 'index', 1, '', '', 0, 0, 'select a.*,group_concat(b.name) as role_name from pre_user as a left join pre_role as b on find_in_set(b.role_id,a.role_id)  group by a.user_id', '', '', '', '', 'primary', '', '', '', '', 1, '', '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', 2);
INSERT INTO `cd_action` VALUES (80, 18, '添加', 'add', 3, '', '20', 1, 0, '', '添加账户', '800px|550px', 'name,user,pwd,role_id,note,status,create_time', '', 'primary', '', '', '', 'fa fa-plus', 3, '', '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (81, 18, '修改', 'update', 4, '', '', 1, 1, '', '修改账户', '800px|500px', 'name,user,role_id,note,status,create_time', '', 'success', '', '', '', 'fa fa-edit', 4, '', '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (82, 18, '修改密码', 'updatePassword', 9, '', '', 1, 0, '', '修改密码', '600px|300px', 'pwd', '', 'warning', '', '', '', '', 6, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (85, 19, '首页数据列表', 'index', 1, '', '', 0, 0, '', '', '600px|250px', '', '', 'primary', '', '', '', '', 1, '', '', 'pid,name', '', 1, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', 1);
INSERT INTO `cd_action` VALUES (87, 19, '添加', 'add', 3, '', '', 1, 0, '', '添加分组', '800px|400px', 'pid,name,status,description', '', 'primary', '', '', '', 'fa fa-plus', 3, '', '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (88, 19, '修改', 'update', 4, '', '', 1, 1, '', '修改分组', '800px|400px', 'pid,name,status,description', '', 'primary', '', '', '', 'fa fa-edit', 4, '', '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (2131, 19, '修改状态', 'updateExt', 16, NULL, '', 0, 0, '', '修改排序开关按钮操作', '', '', NULL, 'primary', '', '', '', '', 324, NULL, '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (2132, 19, '设置权限', 'auth', 11, NULL, '', 1, 1, '', '弹窗连接', '100%|100%', '', NULL, 'primary', '', '', '', 'fa fa-plus', 2131, NULL, '', '', '/Base/auth', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '', 2);
INSERT INTO `cd_action` VALUES (106, 19, '查看用户', 'viewUser', 11, '', '', 1, 1, '', '弹窗连接', '100%|100%', 'status', '', 'success', '', '', '', 'fa fa-eye', 8, '', '', '', '/User/index', 1, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', 2);
INSERT INTO `cd_action` VALUES (324, 19, '删除', 'delete', 5, NULL, '', 1, 1, '', '删除数据', '', '', NULL, 'danger', '', '', '', 'fa fa-trash', 2132, '', '', '', '', 0, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (462, 18, '删除', 'delete', 5, NULL, '', 1, 1, '', '删除数据', '', '', NULL, 'danger', '', '', '', 'fa fa-trash', 462, NULL, '', '', '', 0, 1, 1, NULL, NULL, NULL, NULL, 0, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (2133, 18, '修改状态', 'updateExt', 16, NULL, '', 0, 0, '', '修改排序开关按钮操作', '', '', NULL, 'primary', '', '', '', '', 2133, NULL, '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL);
INSERT INTO `cd_action` VALUES (2140, 670, '首页数据列表', 'index', 1, NULL, '20', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2160, 673, '删除', 'delete', 5, NULL, '20', 1, 1, NULL, '删除', '', '', NULL, 'danger', NULL, NULL, NULL, 'fa fa-trash', 2160, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2159, 673, '修改', 'update', 4, NULL, '20', 1, 1, NULL, '修改', '800px|500px', 'title,upload_replace,thumb_status,thumb_width,thumb_height,thumb_type', NULL, 'success', NULL, NULL, NULL, 'fa fa-pencil', 2159, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2144, 670, '删除', 'delete', 5, NULL, '20', 1, 1, NULL, '删除', '', '', NULL, 'danger', NULL, NULL, NULL, 'fa fa-trash', 2144, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2145, 670, '查看详情', 'view', 15, NULL, '20', 1, 0, '', '查看详情', '800px|600px', 'application_name,username,url,ip,useragent,content,errmsg,type,create_time', NULL, 'info', '', '', '', 'fa fa-eye', 2145, NULL, '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);
INSERT INTO `cd_action` VALUES (2146, 670, '导出', 'dumpData', 12, NULL, '20', 1, 0, NULL, '导出', '', '', NULL, 'warning', NULL, NULL, NULL, 'fa fa-download', 2146, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2158, 673, '添加', 'add', 3, NULL, '20', 1, 0, NULL, '添加', '800px|500px', 'title,upload_replace,thumb_status,thumb_width,thumb_height,thumb_type', NULL, 'primary', NULL, NULL, NULL, 'fa fa-plus', 2158, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2157, 673, '修改排序开关按钮操作', 'updateExt', 16, NULL, '20', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2156, 673, '首页数据列表', 'index', 1, NULL, '20', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `cd_action` VALUES (2275, 41, '首页方法', 'index', 1, NULL, '', 1, 0, '', '', '', '', NULL, 'primary', '', '', '', '', 2275, NULL, '', '', '', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);

-- ----------------------------
-- Table structure for cd_application
-- ----------------------------
DROP TABLE IF EXISTS `cd_application`;
CREATE TABLE `cd_application`  (
  `app_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `app_dir` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(4) NULL DEFAULT NULL,
  `app_type` tinyint(4) NULL DEFAULT NULL,
  `login_table` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `login_fields` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `domain` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pk` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '登录表主键',
  PRIMARY KEY (`app_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 211 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_application
-- ----------------------------
INSERT INTO `cd_application` VALUES (1, '后台管理', 'admin', 1, 1, '', '', '', NULL);

-- ----------------------------
-- Table structure for cd_config
-- ----------------------------
DROP TABLE IF EXISTS `cd_config`;
CREATE TABLE `cd_config`  (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `data` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_config
-- ----------------------------
INSERT INTO `cd_config` VALUES ('water_status', '0');
INSERT INTO `cd_config` VALUES ('site_title', '后台管理系统');
INSERT INTO `cd_config` VALUES ('keyword', '一键生成,不写一行代码');
INSERT INTO `cd_config` VALUES ('description', '停车管理系统');
INSERT INTO `cd_config` VALUES ('site_logo', '/uploads/admin/202101/5ff40b8d7fbd2.jpg');
INSERT INTO `cd_config` VALUES ('file_size', '100');
INSERT INTO `cd_config` VALUES ('copyright', '');
INSERT INTO `cd_config` VALUES ('file_type', 'gif,png,jpg,jpeg,doc,docx,xls,xlsx,csv,pdf,rar,zip,txt,mp4,flv');
INSERT INTO `cd_config` VALUES ('domain', '');
INSERT INTO `cd_config` VALUES ('water_position', '5');
INSERT INTO `cd_config` VALUES ('water_logo', '');

-- ----------------------------
-- Table structure for cd_field
-- ----------------------------
DROP TABLE IF EXISTS `cd_field`;
CREATE TABLE `cd_field`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(9) NOT NULL COMMENT '模块ID',
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '字段名称',
  `field` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` smallint(4) NOT NULL COMMENT '表单类型1输入框 2下拉框 3单选框 4多选框 5上传图片 6编辑器 7时间',
  `list_show` tinyint(4) NULL DEFAULT NULL COMMENT '列表显示',
  `search_show` tinyint(4) NULL DEFAULT NULL COMMENT '搜索显示',
  `search_type` tinyint(4) NULL DEFAULT NULL COMMENT '1精确匹配 2模糊搜索',
  `config` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '下拉框或者单选框配置',
  `is_post` tinyint(4) NULL DEFAULT NULL COMMENT '是否前台录入',
  `is_field` tinyint(4) NULL DEFAULT NULL,
  `align` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '表格显示位置',
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '提示信息',
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '错误提示',
  `validate` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '验证方式',
  `rule` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '验证规则',
  `sortid` mediumint(9) NULL DEFAULT 0 COMMENT '排序号',
  `sql` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '字段配置数据源sql',
  `tab_menu_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所属选项卡名称',
  `default_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `datatype` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '字段数据类型',
  `length` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '字段长度',
  `indexdata` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '索引',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `menu_id`(`menu_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2720 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_field
-- ----------------------------
INSERT INTO `cd_field` VALUES (134, 18, '编号', 'user_id', 1, 1, 0, 0, '', 0, 1, 'center', '', '', '', '', 1, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (135, 18, '真实姓名', 'name', 1, 1, 0, 0, '', 1, 1, 'center', '', '用户名不能为空', 'notEmpty', '', 2, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (136, 18, '用户名', 'user', 1, 1, 1, 0, '', 1, 1, 'center', '', '用户名不能为空', 'notEmpty', '', 3, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (137, 18, '密码', 'pwd', 5, 0, 0, 0, '', 1, 1, 'center', '', '6-21位数字字母组合', 'notEmpty', '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/', 4, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (138, 18, '所属分组', 'role_id', 27, 0, 1, 0, '', 1, 1, 'center', '', '', '', '', 5, 'select role_id,name,pid from pre_role', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (140, 18, '备注', 'note', 1, 1, 0, 0, '', 1, 1, 'center', '', '', '', '', 7, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (141, 18, '状态', 'status', 23, 1, 1, 0, '开启|1,关闭|0', 1, 1, 'center', '', '', '', '', 7, '', '', '', 'tinyint', '4', '');
INSERT INTO `cd_field` VALUES (142, 18, '创建时间', 'create_time', 12, 1, 0, 0, '', 1, 1, 'center', '', '', '', '', 8, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (143, 18, '所属分组', 'role_name', 1, 1, 0, 0, '', 0, 0, 'center', '', '', '', '', 5, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (144, 19, '编号', 'role_id', 1, 1, 0, NULL, '', 0, 0, 'center', '', '', '', '', 1, '', '', NULL, NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (145, 19, '角色', 'name', 1, 1, 0, 0, '', 1, 0, 'left', '', '名称不能为空', 'notEmpty', '', 3, '', '', '', '', '', '');
INSERT INTO `cd_field` VALUES (146, 19, '状态', 'status', 23, 1, 0, 0, '开启|1,关闭|0', 1, 0, 'center', '', '', '', '', 2387, '', '', '', 'tinyint', '4', '');
INSERT INTO `cd_field` VALUES (2388, 19, '描述', 'description', 6, 0, 0, 0, '', 1, 1, 'center', '', '', '', '', 2388, '', '', '', 'text', '0', '');
INSERT INTO `cd_field` VALUES (2411, 673, '编号', 'id', 1, 1, 0, NULL, NULL, 0, 0, 'center', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'int', '11', NULL);
INSERT INTO `cd_field` VALUES (2412, 673, '配置名称', 'title', 1, 1, 1, 0, NULL, 1, 0, 'center', NULL, NULL, NULL, NULL, 2412, NULL, NULL, NULL, 'varchar', '250', NULL);
INSERT INTO `cd_field` VALUES (2413, 673, '覆盖同名文件', 'upload_replace', 23, 1, 0, 0, '开启|1,关闭|0', 1, 0, 'center', '', '', '', '', 2414, '', '', '', 'tinyint', '4', '');
INSERT INTO `cd_field` VALUES (2414, 673, '缩图开关', 'thumb_status', 23, 1, 0, 0, '开启|1,关闭|0', 1, 0, 'center', '', '', '', '', 2413, '', '', '', 'tinyint', '4', '');
INSERT INTO `cd_field` VALUES (2415, 673, '缩放宽度', 'thumb_width', 1, 1, 0, 0, '', 1, 0, 'center', '单位px', '', '', '', 2415, '', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (194, 41, '站点名称', 'site_title', 1, 0, 0, NULL, '', 1, 0, 'center', '', '', 'notEmpty', '', 194, '', '基本设置', '', '', '', '');
INSERT INTO `cd_field` VALUES (195, 41, '关键词站点', 'keyword', 28, 0, 0, NULL, '', 1, 0, 'center', '', '', '', '', 196, '', '基本设置', '', NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (196, 41, '站点描述', 'description', 6, 0, 0, NULL, '', 1, 0, 'center', '', '', '', '', 197, '', '基本设置', NULL, NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (198, 41, '站点LOGO', 'site_logo', 8, 0, 0, NULL, '', 1, 0, 'center', '', '', '', '', 195, '', '基本设置', NULL, NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (200, 41, '上传文件大小', 'file_size', 1, 0, 0, 0, '', 1, 0, 'center', '', '', '', '', 200, '', '上传配置', NULL, NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (1462, 41, '站点版权', 'copyright', 1, NULL, 0, NULL, '', 1, NULL, 'center', '', '', '', '', 700, NULL, '基本设置', '', NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (488, 41, '文件类型', 'file_type', 6, 0, 0, 0, '', 1, 0, 'center', '', '', '', '', 488, '', '上传配置', NULL, NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (700, 41, '绑定域名', 'domain', 1, 0, 0, 0, '', 1, 1, 'center', '上传目录绑定域名访问，请解析域名到 /public/upload目录  前面带上http://  非必填项', '', '', '', 2144, '', '上传配置', '', '', '', '');
INSERT INTO `cd_field` VALUES (2143, 41, '水印位置', 'water_position', 29, NULL, NULL, NULL, '左上角水印|1,上居中水印|2,右上角水印|3,左居中水印|4,居中水印|5,右居中水印|6,左下角水印|7,下居中水印|8,右下角水印|9', 1, NULL, 'center', '', '', '', '', 2142, '', '上传配置', '', NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (2142, 41, '水印状态', 'water_status', 3, NULL, NULL, NULL, '正常|1|success,禁用|0|danger', 1, NULL, 'center', '', '', '', '', 1462, '', '上传配置', '0', NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (2144, 41, '水印图片', 'water_logo', 8, NULL, NULL, NULL, '', 1, NULL, 'center', '', '', '', '', 2143, '', '上传配置', '', NULL, NULL, NULL);
INSERT INTO `cd_field` VALUES (2416, 673, '缩放高度', 'thumb_height', 1, 1, 0, 0, '', 1, 0, 'center', '单位px', '', '', '', 2416, '', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (2417, 673, '缩图方式', 'thumb_type', 2, 1, 1, 0, '等比例缩放|1,缩放后填充|2,居中裁剪|3,左上角裁剪|4,右下角裁剪|5,固定尺寸缩放|6', 1, 0, 'center', '', '', '', '', 2417, '', '', '', 'smallint', '6', '');
INSERT INTO `cd_field` VALUES (2401, 670, '创建时间', 'create_time', 12, 1, 1, 0, '', 1, 1, 'center', '', '', '', '', 2402, '', '', '', 'int', '11', '');
INSERT INTO `cd_field` VALUES (2400, 670, '异常信息', 'errmsg', 1, 0, 0, 0, '', 1, 1, 'center', '', '', '', '', 2400, '', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (2402, 670, '类型', 'type', 3, 1, 1, 0, '登录日志|1|primary,操作日志|2|success,异常日志|3|danger', 1, 1, 'center', '', '', '', '', 2401, '', '', '', 'smallint', '6', '');
INSERT INTO `cd_field` VALUES (2399, 670, '请求内容', 'content', 6, 0, 0, 0, '', 1, 1, 'center', '', '', '', '', 2399, '', '', '', 'text', '0', '');
INSERT INTO `cd_field` VALUES (2397, 670, 'ip', 'ip', 1, 1, 1, 0, '', 1, 1, 'center', '', '', '', '', 2397, '', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (2398, 670, 'useragent', 'useragent', 1, 0, 0, 0, '', 1, 1, 'center', '', '', '', '', 2398, '', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (2396, 670, '请求url', 'url', 1, 1, 1, 0, '', 1, 1, 'center', '', '', '', '', 2396, '', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (2394, 670, '应用名称', 'application_name', 2, 1, 1, 0, '', 1, 1, 'center', '', '', '', '', 2394, 'select app_dir,app_dir from cd_application', '', '', 'varchar', '50', '');
INSERT INTO `cd_field` VALUES (2395, 670, '操作用户', 'username', 1, 1, 1, 0, '', 1, 1, 'center', '', '', '', '', 2395, '', '', '', 'varchar', '250', '');
INSERT INTO `cd_field` VALUES (2387, 19, '所属父类', 'pid', 2, 0, 0, 0, '', 1, 1, 'center', '', '', '', '', 2, 'select role_id,name,pid from cd_role', '', '', 'smallint', '6', '');
INSERT INTO `cd_field` VALUES (2393, 670, '编号', 'id', 1, 1, 0, NULL, NULL, 0, 1, 'center', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'int', '11', NULL);

-- ----------------------------
-- Table structure for cd_file
-- ----------------------------
DROP TABLE IF EXISTS `cd_file`;
CREATE TABLE `cd_file`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filepath` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片路径',
  `hash` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文件hash值',
  `create_time` int(10) NULL DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 99 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_file
-- ----------------------------
INSERT INTO `cd_file` VALUES (69, 'http://img.xhadmin.me/admin/202007/5f05d4a737b6b.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594217639);
INSERT INTO `cd_file` VALUES (70, 'http://img.xhadmin.me/admin/202007/5f05d4a73cd34.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594217639);
INSERT INTO `cd_file` VALUES (71, 'http://img.xhadmin.me/admin/202007/5f05d4a83ff8d.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594217640);
INSERT INTO `cd_file` VALUES (72, '/uploads/admin/202007/5f05d4ce5a34a.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594217678);
INSERT INTO `cd_file` VALUES (73, '/uploads/admin/202007/5f05d4ce5a61e.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594217678);
INSERT INTO `cd_file` VALUES (74, '/uploads/admin/202007/5f05d4cf45564.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594217679);
INSERT INTO `cd_file` VALUES (75, '/uploads/admin/202007/5f05d4d89ccbb.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594217688);
INSERT INTO `cd_file` VALUES (76, '/uploads/admin/202007/5f05d4d8a25ed.jpg', 'bd835163b61fa2dd11579b2de70023fc', 1594217688);
INSERT INTO `cd_file` VALUES (77, '/uploads/admin/202007/5f05d58192e56.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594217857);
INSERT INTO `cd_file` VALUES (78, '/uploads/admin/202007/5f05d599ddca5.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594217881);
INSERT INTO `cd_file` VALUES (79, '/uploads/admin/202007/5f05d5a0ebb7a.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594217889);
INSERT INTO `cd_file` VALUES (80, '/uploads/admin/202007/5f05dc907946b.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594219664);
INSERT INTO `cd_file` VALUES (81, '/uploads/admin/202007/5f05dc989d51b.jpg', '4523359ec4ba32f807b1de8f213cf188', 1594219672);
INSERT INTO `cd_file` VALUES (82, '/uploads/admin/202007/5f05de555679b.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594220117);
INSERT INTO `cd_file` VALUES (83, '/uploads/admin/202007/5f05de56958f7.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594220118);
INSERT INTO `cd_file` VALUES (84, '/uploads/admin/202007/5f05de8849a03.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594220168);
INSERT INTO `cd_file` VALUES (85, '/uploads/admin/202007/5f05dec747bf5.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594220231);
INSERT INTO `cd_file` VALUES (86, '/uploads/admin/202007/5f05df084e461.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594220296);
INSERT INTO `cd_file` VALUES (87, '/uploads/admin/202007/5f05df1c0fdea.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594220316);
INSERT INTO `cd_file` VALUES (88, '/uploads/admin/202007/5f05df49693c4.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594220361);
INSERT INTO `cd_file` VALUES (89, '/uploads/admin/202007/5f05df4973491.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594220361);
INSERT INTO `cd_file` VALUES (90, '/uploads/admin/202007/5f05e08de96e4.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594220685);
INSERT INTO `cd_file` VALUES (91, '/uploads/admin/202007/5f05e0947050f.jpg', 'c435098ccf06e4248d918f91ed0992c8', 1594220692);
INSERT INTO `cd_file` VALUES (92, '/uploads/admin/202007/5f05e0947035e.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594220692);
INSERT INTO `cd_file` VALUES (93, '/uploads/admin/202007/5f05e0947d33f.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594220692);
INSERT INTO `cd_file` VALUES (94, '/uploads/admin/202007/5f05e0a33dc81.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594220707);
INSERT INTO `cd_file` VALUES (95, '/uploads/admin/202007/5f05e0ab5bfd3.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594220715);
INSERT INTO `cd_file` VALUES (96, '/uploads/admin/202007/5f05e0b8cb991.jpg', '9b6adf5c5f23ff87b3d9873809052831', 1594220728);
INSERT INTO `cd_file` VALUES (97, '/uploads/admin/202007/5f05e0b8e2a48.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594220728);
INSERT INTO `cd_file` VALUES (98, '/uploads/admin/202007/5f05e23895351.jpg', '9053bb860fb23722497df4bc2c25eaa3', 1594221112);

-- ----------------------------
-- Table structure for cd_log
-- ----------------------------
DROP TABLE IF EXISTS `cd_log`;
CREATE TABLE `cd_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '应用名称',
  `username` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '操作用户',
  `url` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '请求url',
  `ip` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ip',
  `useragent` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'useragent',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '请求内容',
  `errmsg` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '异常信息',
  `create_time` int(11) NULL DEFAULT NULL COMMENT '创建时间',
  `type` smallint(6) NULL DEFAULT NULL COMMENT '类型',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8310 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for cd_menu
-- ----------------------------
DROP TABLE IF EXISTS `cd_menu`;
CREATE TABLE `cd_menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` mediumint(9) NULL DEFAULT 0 COMMENT '父级id',
  `controller_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '模块名称',
  `title` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '模块标题',
  `pk_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '主键名',
  `table_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '模块数据库表',
  `is_create` tinyint(4) NULL DEFAULT NULL COMMENT '是否允许生成模块',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '0隐藏 10显示',
  `sortid` mediumint(9) NULL DEFAULT 0 COMMENT '排序号',
  `table_status` tinyint(4) NULL DEFAULT NULL COMMENT '是否生成数据库表',
  `is_url` tinyint(4) NULL DEFAULT NULL COMMENT '是否只是url链接',
  `url` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `menu_icon` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'icon字体图标',
  `tab_menu` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'tab选项卡菜单配置',
  `app_id` int(11) NULL DEFAULT NULL COMMENT '所属模块',
  `is_submit` tinyint(4) NULL DEFAULT NULL COMMENT '是否允许投稿',
  `upload_config_id` smallint(5) NULL DEFAULT NULL COMMENT '上传配置id',
  `connect` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '数据库连接',
  PRIMARY KEY (`menu_id`) USING BTREE,
  INDEX `controller_name`(`controller_name`) USING BTREE,
  INDEX `module_id`(`app_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 730 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_menu
-- ----------------------------
INSERT INTO `cd_menu` VALUES (12, 0, 'System', '系统管理', '', '', 0, 1, 1000, 0, 0, '', 'fa fa-gears', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (17, 12, '', '后台首页', '', '', 0, 1, 1, 0, 1, 'admin/Index/main', 'fa fa-home', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (18, 12, 'User', '用户管理', 'user_id', 'user', 1, 1, 4, 1, 0, '', 'fa fa-user-secret', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (19, 12, 'Role', '角色管理', 'role_id', 'role', 1, 1, 5, 1, 0, '', 'fa fa-user', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (21, 12, '', '菜单管理', '', '', 0, 1, 3, 0, 1, 'admin/Sys.Menu/index', '', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (41, 12, 'Config', '系统配置', '', '', 1, 1, 525, 0, 0, 'admin/Base/config', 'glyphicon glyphicon-cog', '基本设置|上传配置', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (80, 12, 'Application', '应用管理', '', '', 0, 1, 2, 0, 0, 'admin/Sys.Application/index', '', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (670, 12, 'Log', '日志管理', 'id', 'log', 1, 1, 673, 1, NULL, '', '', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (673, 12, 'UploadConfig', '上传配置', 'id', 'upload_config', 1, 1, 722, 0, NULL, '', '', '', 1, 0, 0, NULL);
INSERT INTO `cd_menu` VALUES (722, 12, '', '修改密码', '', '', 0, 0, 692, 0, NULL, 'admin/Base/password', '', '', 1, 0, 0, '');

-- ----------------------------
-- Table structure for cd_role
-- ----------------------------
DROP TABLE IF EXISTS `cd_role`;
CREATE TABLE `cd_role`  (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分组名称',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '状态 10正常 0禁用',
  `pid` smallint(6) NULL DEFAULT NULL COMMENT '所属父类',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '描述',
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_role
-- ----------------------------
INSERT INTO `cd_role` VALUES (1, '超级管理员', 1, 0, '超级管理员');

-- ----------------------------
-- Table structure for cd_upload_config
-- ----------------------------
DROP TABLE IF EXISTS `cd_upload_config`;
CREATE TABLE `cd_upload_config`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '配置名称',
  `upload_replace` tinyint(4) NULL DEFAULT NULL COMMENT '覆盖同名文件',
  `thumb_status` tinyint(4) NULL DEFAULT NULL COMMENT '缩图开关',
  `thumb_width` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '缩放宽度',
  `thumb_height` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '缩放高度',
  `thumb_type` smallint(6) NULL DEFAULT NULL COMMENT '缩图方式',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_upload_config
-- ----------------------------
INSERT INTO `cd_upload_config` VALUES (1, '默认配置', 0, 1, '600', '400', 3);

-- ----------------------------
-- Table structure for cd_user
-- ----------------------------
DROP TABLE IF EXISTS `cd_user`;
CREATE TABLE `cd_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '真实姓名',
  `user` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户名',
  `pwd` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `role_id` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所属分组',
  `note` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `status` tinyint(4) NULL DEFAULT NULL COMMENT '状态',
  `create_time` int(11) NULL DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cd_user
-- ----------------------------
INSERT INTO `cd_user` VALUES (1, '寒塘冷月', 'admin', '28372f999aa543a778ffb4d806c20de2', '1', '超级管理员', 1, 1548558919);

SET FOREIGN_KEY_CHECKS = 1;
