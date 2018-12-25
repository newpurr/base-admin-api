/*
 Navicat Premium Data Transfer

 Source Server         : laradock
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : 127.0.0.1:3306
 Source Schema         : admin_base_com

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 25/12/2018 22:09:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ba_admins
-- ----------------------------
DROP TABLE IF EXISTS `ba_admins`;
CREATE TABLE `ba_admins`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '账号',
  `nickname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '昵称',
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '手机号',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 2 COMMENT '启用状态 1-启用 2-禁用',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除:0-未删除 1-已删除',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_account_unique`(`account`) USING BTREE,
  UNIQUE INDEX `admin_nickname_unique`(`nickname`) USING BTREE,
  UNIQUE INDEX `admin_mobile_unique`(`mobile`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_admins
-- ----------------------------
INSERT INTO `ba_admins` VALUES (1, 'luotao2', 'luota2o', '18581405482', '$2y$10$PKnuGXL5TLXHCQrwHz5EE.U1wPrW/WU2vEnJKesBUiqeuLvGwITcW', 1, 0, '2018-12-23 09:10:34', '2018-12-25 13:36:20');
INSERT INTO `ba_admins` VALUES (2, 'luotao', 'admin3', '18581405483', '$2y$10$DR4U4BoYcqJnKRN5sXuDCOUmwpQOGNTkmAT98Q.o5XaIZedNOWBue', 1, 0, '2018-12-23 09:12:05', '2018-12-25 09:02:37');

-- ----------------------------
-- Table structure for ba_assigned_roles
-- ----------------------------
DROP TABLE IF EXISTS `ba_assigned_roles`;
CREATE TABLE `ba_assigned_roles`  (
  `assigned_id` int(11) UNSIGNED NOT NULL COMMENT '用户ID',
  `role_id` int(11) UNSIGNED NOT NULL COMMENT '角色ID',
  UNIQUE INDEX `idx_uid_roleid`(`assigned_id`, `role_id`) USING BTREE,
  UNIQUE INDEX `idx_roleid_uid`(`role_id`, `assigned_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_assigned_roles
-- ----------------------------
INSERT INTO `ba_assigned_roles` VALUES (1, 1);
INSERT INTO `ba_assigned_roles` VALUES (1, 2);
INSERT INTO `ba_assigned_roles` VALUES (1, 4);
INSERT INTO `ba_assigned_roles` VALUES (1, 6);
INSERT INTO `ba_assigned_roles` VALUES (1, 7);

-- ----------------------------
-- Table structure for ba_attachments
-- ----------------------------
DROP TABLE IF EXISTS `ba_attachments`;
CREATE TABLE `ba_attachments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_uid` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `owner_uid`(`owner_uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_attachments
-- ----------------------------
INSERT INTO `ba_attachments` VALUES (1, '2018-12/H5Nnjmts0NcFQMzaFZdRL7mDdwFw93Hp2YG6uZZq.png', 'image/png', 0, '2018-12-23 07:27:38', '2018-12-23 07:27:38');
INSERT INTO `ba_attachments` VALUES (2, '2018-12/ciD8ywaRM4zL4IyUCyzLA7uCxbAyET1pXA7dpEyF.jpeg', 'image/jpeg', 0, '2018-12-23 07:27:38', '2018-12-23 07:27:38');
INSERT INTO `ba_attachments` VALUES (3, '2018-12/VcGtw1I8DQptBvtix481bCsSyVGs8M9g4alpW242.png', 'image/png', 0, '2018-12-23 07:32:10', '2018-12-23 07:32:10');
INSERT INTO `ba_attachments` VALUES (4, '2018-12/FwZ26tUD4Ner3WdAVjDV8uzzgFsAq7Xu5tB5xdT9.jpeg', 'image/jpeg', 0, '2018-12-23 07:32:11', '2018-12-23 07:32:11');
INSERT INTO `ba_attachments` VALUES (5, '2018-12/Dfi8eCDuNDBw4OjRXbRQyXnJLVWfYIHLUPFMGOi7.png', 'image/png', 0, '2018-12-23 07:32:48', '2018-12-23 07:32:48');
INSERT INTO `ba_attachments` VALUES (6, '2018-12/RAodd37q6p1nxLUcF95T5sZ46bcgcvu1WRDFMieW.jpeg', 'image/jpeg', 0, '2018-12-23 07:32:49', '2018-12-23 07:32:49');
INSERT INTO `ba_attachments` VALUES (7, '2018-12/zV3t3J2sAAha3ztEUTRjcaUNDVg0I9ml4aGem7ym.png', 'image/png', 0, '2018-12-23 07:33:54', '2018-12-23 07:33:54');
INSERT INTO `ba_attachments` VALUES (8, '2018-12/qxlBiBB1Oe8ZEe8jAIqLW1zFkhmDSpgyIissJlC5.png', 'image/png', 0, '2018-12-23 07:37:17', '2018-12-23 07:37:17');
INSERT INTO `ba_attachments` VALUES (9, '2018-12/iSOm89TrBZW8Q2m2BVWTQRjOsHOuHW551r13Pq7n.png', 'image/png', 0, '2018-12-23 07:38:33', '2018-12-23 07:38:33');

-- ----------------------------
-- Table structure for ba_migrations
-- ----------------------------
DROP TABLE IF EXISTS `ba_migrations`;
CREATE TABLE `ba_migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_migrations
-- ----------------------------
INSERT INTO `ba_migrations` VALUES (1, '2018_12_21_145133_create_ba_attachments_table', 1);
INSERT INTO `ba_migrations` VALUES (2, '2018_12_21_145133_create_ba_password_resets_table', 1);
INSERT INTO `ba_migrations` VALUES (3, '2018_12_21_145133_create_ba_permissions_table', 1);
INSERT INTO `ba_migrations` VALUES (4, '2018_12_21_145133_create_ba_role_permissions_table', 1);
INSERT INTO `ba_migrations` VALUES (5, '2018_12_21_145133_create_ba_roles_table', 1);
INSERT INTO `ba_migrations` VALUES (6, '2018_12_21_145133_create_ba_users_table', 1);
INSERT INTO `ba_migrations` VALUES (7, '2018_12_22_064408_create_admins_table', 2);

-- ----------------------------
-- Table structure for ba_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `ba_password_resets`;
CREATE TABLE `ba_password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for ba_permissions
-- ----------------------------
DROP TABLE IF EXISTS `ba_permissions`;
CREATE TABLE `ba_permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '权限名称',
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '权限path',
  `method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GET' COMMENT '请求方法',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `per_type` smallint(5) UNSIGNED NOT NULL COMMENT '权限类型 1-API 2-菜单/页面 3-按钮',
  `parent_id` int(10) UNSIGNED NOT NULL COMMENT '父级权限ID',
  `state` tinyint(1) NOT NULL DEFAULT 2 COMMENT '启用状态 1-启用 2-禁用',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除:0-未删除 1-已删除',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 556 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_permissions
-- ----------------------------
INSERT INTO `ba_permissions` VALUES (482, '根对象', '/', 'GET', '根对象', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-25 10:31:05');
INSERT INTO `ba_permissions` VALUES (483, 'permission', '/permission', 'GET', '权限测试页', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (484, 'PagePermission', '/permission/page', 'GET', '页面权限', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (485, 'DirectivePermission', '/permission/directive', 'GET', '指令权限', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (486, 'Icons', '/icon', 'GET', '图标', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (487, 'Icons', '/icon/index', 'GET', '图标', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (488, 'ComponentDemo', '/components', 'GET', '组件', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (489, 'TinymceDemo', '/components/tinymce', 'GET', '富文本编辑器', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (490, 'MarkdownDemo', '/components/markdown', 'GET', 'Markdown', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (491, 'JsonEditorDemo', '/components/json-editor', 'GET', 'JSON编辑器', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (492, 'SplitpaneDemo', '/components/splitpane', 'GET', 'Splitpane', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (493, 'AvatarUploadDemo', '/components/avatar-upload', 'GET', '头像上传', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (494, 'DropzoneDemo', '/components/dropzone', 'GET', 'Dropzone', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (495, 'StickyDemo', '/components/sticky', 'GET', 'Sticky', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (496, 'CountToDemo', '/components/count-to', 'GET', 'CountTo', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (497, 'ComponentMixinDemo', '/components/mixin', 'GET', '小组件', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (498, 'BackToTopDemo', '/components/back-to-top', 'GET', '返回顶部', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (499, 'DragDialogDemo', '/components/drag-dialog', 'GET', '拖拽 Dialog', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (500, 'DndListDemo', '/components/dnd-list', 'GET', '列表拖拽', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (501, 'DragKanbanDemo', '/components/drag-kanban', 'GET', '可拖拽看板', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (502, 'Charts', '/charts', 'GET', '图表', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (503, 'KeyboardChart', '/charts/keyboard', 'GET', '键盘图表', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (504, 'LineChart', '/charts/line', 'GET', '折线图', 2, 0, 1, 0, '2018-09-01 14:21:15', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (505, 'MixChart', '/charts/mixchart', 'GET', '混合图表', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (506, 'Nested', '/nested', 'GET', '路由嵌套', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (507, 'Menu1', '/nested/menu1', 'GET', '菜单1', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (508, 'Menu1-1', '/menu1/menu1-1', 'GET', '菜单1-1', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (509, 'Menu1-2', '/menu1/menu1-2', 'GET', '菜单1-2', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (510, 'Menu1-2-1', '/menu1-2/menu1-2-1', 'GET', '菜单1-2-1', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (511, 'Menu1-2-2', '/menu1-2/menu1-2-2', 'GET', '菜单1-2-2', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (512, 'Menu1-3', '/menu1/menu1-3', 'GET', '菜单1-3', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (513, 'Menu2', '/nested/menu2', 'GET', '菜单2', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (514, 'Table', '/table', 'GET', 'Table', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (515, 'DynamicTable', '/table/dynamic-table', 'GET', '动态Table', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (516, 'DragTable', '/table/drag-table', 'GET', '拖拽Table', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (517, 'InlineEditTable', '/table/inline-edit-table', 'GET', 'Table内编辑', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (518, 'TreeTableDemo', '/table/tree-table', 'GET', '树形表格', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (519, 'CustomTreeTableDemo', '/table/custom-tree-table', 'GET', '自定义树表', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (520, 'ComplexTable', '/table/complex-table', 'GET', '综合Table', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (521, 'Example', '/example', 'GET', '综合实例', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (522, 'CreateArticle', '/example/create', 'GET', '创建文章', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (523, 'EditArticle', '/example/edit/:id(\\d+)', 'GET', '编辑文章', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (524, 'ArticleList', '/example/list', 'GET', '文章列表', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (525, 'Tab', '/tab', 'GET', 'Tab', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (526, 'Tab', '/tab/index', 'GET', 'Tab', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (527, 'ErrorPages', '/error', 'GET', '错误页面', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (528, 'Page401', '/error/401', 'GET', '401', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (529, 'Page404', '/error/404', 'GET', '404', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (530, 'ErrorLog', '/error-log', 'GET', '错误日志', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (531, 'ErrorLog', '/error-log/log', 'GET', '错误日志', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (532, 'Excel', '/excel', 'GET', 'Excel', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (533, 'ExportExcel', '/excel/export-excel', 'GET', 'Export Excel', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (534, 'EelectExcel', '/excel/export-selected-excel', 'GET', 'Export Selected', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (535, 'UploadExcel', '/excel/upload-excel', 'GET', 'Upload Excel', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (536, 'ExportZip', '/zip', 'GET', 'Zip', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (537, 'ExportZip', '/zip/download', 'GET', 'Export Zip', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (538, 'Theme', '/theme', 'GET', '换肤', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (539, 'Theme', '/theme/index', 'GET', '换肤', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (540, 'ClipboardDemo', '/clipboard', 'GET', 'Clipboard', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (541, 'ClipboardDemo', '/clipboard/index', 'GET', 'Clipboard', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (542, 'I18n', '/i18n', 'GET', '国际化', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (543, 'I18n', '/i18n/index', 'GET', '国际化', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (544, 'Permission', '/permission2', 'GET', '综合实例', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (545, 'PermissionList', '/permission2/list', 'GET', '权限列表', 2, 0, 1, 0, '2018-09-01 14:21:16', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (546, 'ComponentDemo', '/components/components', 'GET', 'ComponentDemo', 2, 0, 1, 0, '2018-09-06 14:05:10', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (547, 'DirectivePermission', '/permission/directive/permission/directive', 'GET', 'DirectivePermission', 2, 0, 1, 0, '2018-09-06 14:15:39', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (548, 'Example', '/role', 'GET', '角色管理', 2, 0, 1, 0, '2018-09-21 13:14:56', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (549, 'createRole', '/role/create', 'GET', 'createRole', 2, 0, 1, 0, '2018-09-21 13:14:56', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (550, 'editRole', '/role/edit/:id(\\d+)', 'GET', 'editRole', 2, 0, 1, 0, '2018-09-21 13:14:56', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (551, 'roleList', '/role/list', 'GET', '角色列表', 2, 0, 1, 0, '2018-09-21 13:14:56', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (552, 'Example', '/upload', 'GET', 'upload', 2, 0, 1, 0, '2018-11-06 13:12:47', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (553, 'uploadDemo', '/upload/demo', 'GET', 'uploadDemo', 2, 0, 1, 0, '2018-11-06 13:12:47', '2018-12-14 13:40:05');
INSERT INTO `ba_permissions` VALUES (555, '测试权限9', '/cs1', 'GET', 'dsadsadsadsad', 1, 0, 2, 0, '2018-12-25 09:26:22', '2018-12-25 09:28:06');

-- ----------------------------
-- Table structure for ba_roles
-- ----------------------------
DROP TABLE IF EXISTS `ba_roles`;
CREATE TABLE `ba_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `state` tinyint(1) NOT NULL DEFAULT 0 COMMENT '启用状态 1-启用 2-禁用',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否删除: 0-未删除 1-已删除',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_roles
-- ----------------------------
INSERT INTO `ba_roles` VALUES (1, '超级管理员', 1, 0, '2018-09-19 20:36:02', '2018-11-18 14:10:06');
INSERT INTO `ba_roles` VALUES (2, '普通管理员', 1, 0, '2018-09-19 20:36:26', '2018-12-08 09:46:50');
INSERT INTO `ba_roles` VALUES (3, '普通管理员21', 1, 1, '2018-09-24 10:36:59', '2018-12-11 14:11:32');
INSERT INTO `ba_roles` VALUES (4, '名字长一点11111', 1, 0, '2018-12-08 14:28:00', '2018-12-09 06:01:26');
INSERT INTO `ba_roles` VALUES (5, '测试', 2, 0, '2018-12-16 14:05:46', '2018-12-16 14:05:46');
INSERT INTO `ba_roles` VALUES (6, '测试22', 1, 0, '2018-12-16 14:05:57', '2018-12-16 14:19:31');
INSERT INTO `ba_roles` VALUES (7, '测试111', 1, 0, '2018-12-16 14:16:52', '2018-12-16 14:19:31');

-- ----------------------------
-- Table structure for ba_roles_permissions
-- ----------------------------
DROP TABLE IF EXISTS `ba_roles_permissions`;
CREATE TABLE `ba_roles_permissions`  (
  `role_id` int(10) UNSIGNED NOT NULL COMMENT '角色ID',
  `permission_id` int(10) UNSIGNED NOT NULL COMMENT '权限ID',
  UNIQUE INDEX `role_permissions_role_id_index`(`role_id`, `permission_id`) USING BTREE,
  INDEX `role_permissions_permission_id_index`(`permission_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_roles_permissions
-- ----------------------------
INSERT INTO `ba_roles_permissions` VALUES (1, 482);
INSERT INTO `ba_roles_permissions` VALUES (2, 482);
INSERT INTO `ba_roles_permissions` VALUES (5, 482);
INSERT INTO `ba_roles_permissions` VALUES (1, 483);
INSERT INTO `ba_roles_permissions` VALUES (1, 484);
INSERT INTO `ba_roles_permissions` VALUES (1, 485);
INSERT INTO `ba_roles_permissions` VALUES (1, 486);
INSERT INTO `ba_roles_permissions` VALUES (1, 487);
INSERT INTO `ba_roles_permissions` VALUES (1, 488);
INSERT INTO `ba_roles_permissions` VALUES (1, 489);
INSERT INTO `ba_roles_permissions` VALUES (1, 490);
INSERT INTO `ba_roles_permissions` VALUES (1, 491);
INSERT INTO `ba_roles_permissions` VALUES (1, 492);
INSERT INTO `ba_roles_permissions` VALUES (1, 493);
INSERT INTO `ba_roles_permissions` VALUES (1, 494);
INSERT INTO `ba_roles_permissions` VALUES (1, 495);
INSERT INTO `ba_roles_permissions` VALUES (1, 496);
INSERT INTO `ba_roles_permissions` VALUES (1, 497);
INSERT INTO `ba_roles_permissions` VALUES (1, 498);
INSERT INTO `ba_roles_permissions` VALUES (1, 499);
INSERT INTO `ba_roles_permissions` VALUES (1, 500);
INSERT INTO `ba_roles_permissions` VALUES (1, 501);
INSERT INTO `ba_roles_permissions` VALUES (1, 502);
INSERT INTO `ba_roles_permissions` VALUES (1, 503);
INSERT INTO `ba_roles_permissions` VALUES (1, 504);
INSERT INTO `ba_roles_permissions` VALUES (1, 505);
INSERT INTO `ba_roles_permissions` VALUES (1, 506);
INSERT INTO `ba_roles_permissions` VALUES (1, 507);
INSERT INTO `ba_roles_permissions` VALUES (1, 508);
INSERT INTO `ba_roles_permissions` VALUES (1, 509);
INSERT INTO `ba_roles_permissions` VALUES (1, 510);
INSERT INTO `ba_roles_permissions` VALUES (1, 511);
INSERT INTO `ba_roles_permissions` VALUES (1, 512);
INSERT INTO `ba_roles_permissions` VALUES (1, 513);
INSERT INTO `ba_roles_permissions` VALUES (1, 514);
INSERT INTO `ba_roles_permissions` VALUES (1, 515);
INSERT INTO `ba_roles_permissions` VALUES (1, 516);
INSERT INTO `ba_roles_permissions` VALUES (1, 517);
INSERT INTO `ba_roles_permissions` VALUES (1, 518);
INSERT INTO `ba_roles_permissions` VALUES (1, 519);
INSERT INTO `ba_roles_permissions` VALUES (1, 520);
INSERT INTO `ba_roles_permissions` VALUES (1, 521);
INSERT INTO `ba_roles_permissions` VALUES (1, 522);
INSERT INTO `ba_roles_permissions` VALUES (1, 523);
INSERT INTO `ba_roles_permissions` VALUES (1, 524);
INSERT INTO `ba_roles_permissions` VALUES (1, 525);
INSERT INTO `ba_roles_permissions` VALUES (1, 526);
INSERT INTO `ba_roles_permissions` VALUES (1, 527);
INSERT INTO `ba_roles_permissions` VALUES (1, 528);
INSERT INTO `ba_roles_permissions` VALUES (1, 529);
INSERT INTO `ba_roles_permissions` VALUES (1, 530);
INSERT INTO `ba_roles_permissions` VALUES (1, 531);
INSERT INTO `ba_roles_permissions` VALUES (1, 532);
INSERT INTO `ba_roles_permissions` VALUES (1, 533);
INSERT INTO `ba_roles_permissions` VALUES (1, 534);
INSERT INTO `ba_roles_permissions` VALUES (1, 535);
INSERT INTO `ba_roles_permissions` VALUES (1, 536);
INSERT INTO `ba_roles_permissions` VALUES (1, 537);
INSERT INTO `ba_roles_permissions` VALUES (1, 538);
INSERT INTO `ba_roles_permissions` VALUES (1, 539);
INSERT INTO `ba_roles_permissions` VALUES (1, 540);
INSERT INTO `ba_roles_permissions` VALUES (1, 541);
INSERT INTO `ba_roles_permissions` VALUES (1, 542);
INSERT INTO `ba_roles_permissions` VALUES (1, 543);
INSERT INTO `ba_roles_permissions` VALUES (1, 544);
INSERT INTO `ba_roles_permissions` VALUES (2, 544);
INSERT INTO `ba_roles_permissions` VALUES (5, 544);
INSERT INTO `ba_roles_permissions` VALUES (1, 545);
INSERT INTO `ba_roles_permissions` VALUES (2, 545);
INSERT INTO `ba_roles_permissions` VALUES (5, 545);
INSERT INTO `ba_roles_permissions` VALUES (1, 546);
INSERT INTO `ba_roles_permissions` VALUES (1, 547);
INSERT INTO `ba_roles_permissions` VALUES (1, 548);
INSERT INTO `ba_roles_permissions` VALUES (2, 548);
INSERT INTO `ba_roles_permissions` VALUES (3, 548);
INSERT INTO `ba_roles_permissions` VALUES (4, 548);
INSERT INTO `ba_roles_permissions` VALUES (5, 548);
INSERT INTO `ba_roles_permissions` VALUES (1, 549);
INSERT INTO `ba_roles_permissions` VALUES (1, 550);
INSERT INTO `ba_roles_permissions` VALUES (1, 551);
INSERT INTO `ba_roles_permissions` VALUES (2, 551);
INSERT INTO `ba_roles_permissions` VALUES (3, 551);
INSERT INTO `ba_roles_permissions` VALUES (4, 551);
INSERT INTO `ba_roles_permissions` VALUES (5, 551);
INSERT INTO `ba_roles_permissions` VALUES (1, 552);
INSERT INTO `ba_roles_permissions` VALUES (3, 552);
INSERT INTO `ba_roles_permissions` VALUES (1, 553);
INSERT INTO `ba_roles_permissions` VALUES (3, 553);

-- ----------------------------
-- Table structure for ba_users
-- ----------------------------
DROP TABLE IF EXISTS `ba_users`;
CREATE TABLE `ba_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_users
-- ----------------------------
INSERT INTO `ba_users` VALUES (3, 'admin', '18581405481', '$2y$10$MqEbgzBKj9flgX2YlrLnA.OyyQxljx63N.kR4H66KDfcICqsG1kv2', NULL, '2018-12-22 07:40:46', '2018-12-22 07:40:46');

SET FOREIGN_KEY_CHECKS = 1;
