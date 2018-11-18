/*
 Navicat Premium Data Transfer

 Source Server         : laradock
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : 127.0.0.1:3306
 Source Schema         : admin_base_com

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 18/11/2018 22:22:22
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ba_attachments
-- ----------------------------
DROP TABLE IF EXISTS `ba_attachments`;
CREATE TABLE `ba_attachments`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_uid` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `owner_uid`(`owner_uid`) USING BTREE,
  INDEX `updated_at`(`updated_at`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '附件表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_attachments
-- ----------------------------
INSERT INTO `ba_attachments` VALUES (14, '2018-11/6gsuKbC4aVB069XP5nir8bGOPf4QyWhMHusG3VHb.png', 'image/png', 0, '2018-11-06 13:37:36', '2018-11-06 13:37:36');
INSERT INTO `ba_attachments` VALUES (15, '2018-11/Y8jP3kAG3Ew6VZXcNl6a8iZogKAe5LLnh7ccvC9Q.png', 'image/png', 0, '2018-11-06 13:37:43', '2018-11-06 13:37:43');
INSERT INTO `ba_attachments` VALUES (16, '2018-11/PeC1430EW9s54UBjKyTcDaeuJGsWrj7d2pZpiUkX.png', 'image/png', 0, '2018-11-06 13:38:25', '2018-11-06 13:38:25');
INSERT INTO `ba_attachments` VALUES (17, '2018-11/9fUHhy6MgR1bu6X8apsUr634cy7Tg43zjSvGnCdV.jpeg', 'image/jpeg', 0, '2018-11-06 13:39:03', '2018-11-06 13:39:03');
INSERT INTO `ba_attachments` VALUES (18, '2018-11/yOaFSRtvMHUWMFOapPPO50970eXLxrVsiknLkxIW.png', 'image/png', 0, '2018-11-06 13:39:24', '2018-11-06 13:39:24');
INSERT INTO `ba_attachments` VALUES (19, '2018-11/d4Fdo1tuXjNK647Jce4N7MuqebimXORGYwA6hUct.png', 'image/png', 0, '2018-11-06 14:18:40', '2018-11-06 14:18:40');
INSERT INTO `ba_attachments` VALUES (20, '2018-11/NrIpTd0MiBwGt3MAbO7XPciznJV6FmngbHnOHNJg.png', 'image/png', 0, '2018-11-06 14:19:09', '2018-11-06 14:19:09');
INSERT INTO `ba_attachments` VALUES (21, '2018-11/XTzFCN8riHG1IGi9RTByXVeezU8dA8dWi8akbLQ6.png', 'image/png', 0, '2018-11-06 14:20:32', '2018-11-06 14:20:32');
INSERT INTO `ba_attachments` VALUES (22, '2018-11/ypOE8ykkVwWGsddoEuAxKKNs1tU7M3bEYgM5Mxdt.jpeg', 'image/jpeg', 0, '2018-11-06 14:23:02', '2018-11-06 14:23:02');
INSERT INTO `ba_attachments` VALUES (23, '2018-11/OjA21ZoRc5pnSoBIDh5HsnfNUbcLrNrbCfcKA9EZ.png', 'image/png', 0, '2018-11-06 14:25:17', '2018-11-06 14:25:17');
INSERT INTO `ba_attachments` VALUES (24, '2018-11/amyS3eRLETT572Ujj3Cu5MDioPT1JZxokanOmP8v.png', 'image/png', 0, '2018-11-06 14:25:39', '2018-11-06 14:25:39');
INSERT INTO `ba_attachments` VALUES (25, '2018-11/Mf7qj9y7xay27KLDKLLhizAjkjv9qWpviyQgvMjW.png', 'image/png', 0, '2018-11-07 13:19:51', '2018-11-07 13:19:51');
INSERT INTO `ba_attachments` VALUES (26, '2018-11/V0ZeocWzLJsHJMwxJgExK9FzbRQM3qqbMpJvArD4.jpeg', 'image/jpeg', 0, '2018-11-07 14:55:18', '2018-11-07 14:55:18');
INSERT INTO `ba_attachments` VALUES (27, '2018-11/SK7bSIFxGHKTuidlhLuMYiFpmojRSrGZIHBXL3OC.png', 'image/png', 0, '2018-11-16 17:09:08', '2018-11-16 17:09:08');
INSERT INTO `ba_attachments` VALUES (28, '2018-11/X8yX3QwykYBR0tkOvVF7m2bmRIcse2fHYquTVqVh.jpeg', 'image/jpeg', 0, '2018-11-16 17:09:08', '2018-11-16 17:09:08');
INSERT INTO `ba_attachments` VALUES (29, '2018-11/rqADGlX882C4C9YzeNZExXkKCfP3m0CQLsqVdZab.png', 'image/png', 0, '2018-11-16 17:09:37', '2018-11-16 17:09:37');
INSERT INTO `ba_attachments` VALUES (30, '2018-11/Cwtz5i555NFyVSTqYJmhTIX01hvpMHJi2oRDFQQ0.jpeg', 'image/jpeg', 0, '2018-11-16 17:09:37', '2018-11-16 17:09:37');
INSERT INTO `ba_attachments` VALUES (31, '2018-11/EYY2TaW9RKrKEHmJWRcufNrox4L5lSuxYi86U82i.png', 'image/png', 0, '2018-11-16 17:10:05', '2018-11-16 17:10:05');
INSERT INTO `ba_attachments` VALUES (32, '2018-11/qEiwqG2pxdADqFZmdfPehAaxAHU9TNPOr0kJNJkc.jpeg', 'image/jpeg', 0, '2018-11-16 17:10:05', '2018-11-16 17:10:05');

-- ----------------------------
-- Table structure for ba_migrations
-- ----------------------------
DROP TABLE IF EXISTS `ba_migrations`;
CREATE TABLE `ba_migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_migrations
-- ----------------------------
INSERT INTO `ba_migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `ba_migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `ba_migrations` VALUES (7, '2018_09_01_033216_create_ba_migrations_table', 0);
INSERT INTO `ba_migrations` VALUES (8, '2018_09_01_033216_create_ba_password_resets_table', 0);
INSERT INTO `ba_migrations` VALUES (9, '2018_09_01_033216_create_ba_permissions_table', 0);
INSERT INTO `ba_migrations` VALUES (10, '2018_09_01_033216_create_ba_role_permissions_table', 0);
INSERT INTO `ba_migrations` VALUES (11, '2018_09_01_033216_create_ba_roles_table', 0);
INSERT INTO `ba_migrations` VALUES (12, '2018_09_01_033216_create_ba_users_table', 0);
INSERT INTO `ba_migrations` VALUES (13, '2018_09_02_141900_create_ba_migrations_table', 0);
INSERT INTO `ba_migrations` VALUES (14, '2018_09_02_141900_create_ba_password_resets_table', 0);
INSERT INTO `ba_migrations` VALUES (15, '2018_09_02_141900_create_ba_permissions_table', 0);
INSERT INTO `ba_migrations` VALUES (16, '2018_09_02_141900_create_ba_role_permissions_table', 0);
INSERT INTO `ba_migrations` VALUES (17, '2018_09_02_141900_create_ba_roles_table', 0);
INSERT INTO `ba_migrations` VALUES (18, '2018_09_02_141900_create_ba_users_table', 0);

-- ----------------------------
-- Table structure for ba_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `ba_password_resets`;
CREATE TABLE `ba_password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
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
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'GET' COMMENT '请求方法',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '描述',
  `per_type` smallint(5) UNSIGNED NOT NULL COMMENT '权限类型 1-API 2-菜单/页面 3-按钮',
  `parent_id` int(11) UNSIGNED NOT NULL COMMENT '父级权限ID',
  `is_deleted` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否删除:0-未删除 1-已删除',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `updated_at`(`updated_at`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 554 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '权限表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_permissions
-- ----------------------------
INSERT INTO `ba_permissions` VALUES (482, '根对象', '/', 'GET', '根对象', 2, 0, 0, '2018-09-01 14:21:15', '2018-09-02 14:14:55');
INSERT INTO `ba_permissions` VALUES (483, 'permission', '/permission', 'GET', '权限测试页', 2, 482, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (484, 'PagePermission', '/permission/page', 'GET', '页面权限', 2, 483, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (485, 'DirectivePermission', '/permission/directive', 'GET', '指令权限', 2, 483, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (486, 'Icons', '/icon', 'GET', '图标', 2, 482, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (487, 'Icons', '/icon/index', 'GET', '图标', 2, 486, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (488, 'ComponentDemo', '/components', 'GET', '组件', 2, 482, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (489, 'TinymceDemo', '/components/tinymce', 'GET', '富文本编辑器', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (490, 'MarkdownDemo', '/components/markdown', 'GET', 'Markdown', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (491, 'JsonEditorDemo', '/components/json-editor', 'GET', 'JSON编辑器', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (492, 'SplitpaneDemo', '/components/splitpane', 'GET', 'Splitpane', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (493, 'AvatarUploadDemo', '/components/avatar-upload', 'GET', '头像上传', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (494, 'DropzoneDemo', '/components/dropzone', 'GET', 'Dropzone', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (495, 'StickyDemo', '/components/sticky', 'GET', 'Sticky', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (496, 'CountToDemo', '/components/count-to', 'GET', 'CountTo', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (497, 'ComponentMixinDemo', '/components/mixin', 'GET', '小组件', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (498, 'BackToTopDemo', '/components/back-to-top', 'GET', '返回顶部', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (499, 'DragDialogDemo', '/components/drag-dialog', 'GET', '拖拽 Dialog', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (500, 'DndListDemo', '/components/dnd-list', 'GET', '列表拖拽', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (501, 'DragKanbanDemo', '/components/drag-kanban', 'GET', '可拖拽看板', 2, 488, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (502, 'Charts', '/charts', 'GET', '图表', 2, 482, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (503, 'KeyboardChart', '/charts/keyboard', 'GET', '键盘图表', 2, 502, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (504, 'LineChart', '/charts/line', 'GET', '折线图', 2, 502, 0, '2018-09-01 14:21:15', '2018-09-01 14:21:15');
INSERT INTO `ba_permissions` VALUES (505, 'MixChart', '/charts/mixchart', 'GET', '混合图表', 2, 502, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (506, 'Nested', '/nested', 'GET', '路由嵌套', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (507, 'Menu1', '/nested/menu1', 'GET', '菜单1', 2, 506, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (508, 'Menu1-1', '/menu1/menu1-1', 'GET', '菜单1-1', 2, 507, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (509, 'Menu1-2', '/menu1/menu1-2', 'GET', '菜单1-2', 2, 507, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (510, 'Menu1-2-1', '/menu1-2/menu1-2-1', 'GET', '菜单1-2-1', 2, 509, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (511, 'Menu1-2-2', '/menu1-2/menu1-2-2', 'GET', '菜单1-2-2', 2, 509, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (512, 'Menu1-3', '/menu1/menu1-3', 'GET', '菜单1-3', 2, 507, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (513, 'Menu2', '/nested/menu2', 'GET', '菜单2', 2, 506, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (514, 'Table', '/table', 'GET', 'Table', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (515, 'DynamicTable', '/table/dynamic-table', 'GET', '动态Table', 2, 514, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (516, 'DragTable', '/table/drag-table', 'GET', '拖拽Table', 2, 514, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (517, 'InlineEditTable', '/table/inline-edit-table', 'GET', 'Table内编辑', 2, 514, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (518, 'TreeTableDemo', '/table/tree-table', 'GET', '树形表格', 2, 514, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (519, 'CustomTreeTableDemo', '/table/custom-tree-table', 'GET', '自定义树表', 2, 514, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (520, 'ComplexTable', '/table/complex-table', 'GET', '综合Table', 2, 514, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (521, 'Example', '/example', 'GET', '综合实例', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (522, 'CreateArticle', '/example/create', 'GET', '创建文章', 2, 521, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (523, 'EditArticle', '/example/edit/:id(\\d+)', 'GET', '编辑文章', 2, 521, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (524, 'ArticleList', '/example/list', 'GET', '文章列表', 2, 521, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (525, 'Tab', '/tab', 'GET', 'Tab', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (526, 'Tab', '/tab/index', 'GET', 'Tab', 2, 525, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (527, 'ErrorPages', '/error', 'GET', '错误页面', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (528, 'Page401', '/error/401', 'GET', '401', 2, 527, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (529, 'Page404', '/error/404', 'GET', '404', 2, 527, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (530, 'ErrorLog', '/error-log', 'GET', '错误日志', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (531, 'ErrorLog', '/error-log/log', 'GET', '错误日志', 2, 530, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (532, 'Excel', '/excel', 'GET', 'Excel', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (533, 'ExportExcel', '/excel/export-excel', 'GET', 'Export Excel', 2, 532, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (534, 'EelectExcel', '/excel/export-selected-excel', 'GET', 'Export Selected', 2, 532, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (535, 'UploadExcel', '/excel/upload-excel', 'GET', 'Upload Excel', 2, 532, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (536, 'ExportZip', '/zip', 'GET', 'Zip', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (537, 'ExportZip', '/zip/download', 'GET', 'Export Zip', 2, 536, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (538, 'Theme', '/theme', 'GET', '换肤', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (539, 'Theme', '/theme/index', 'GET', '换肤', 2, 538, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (540, 'ClipboardDemo', '/clipboard', 'GET', 'Clipboard', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (541, 'ClipboardDemo', '/clipboard/index', 'GET', 'Clipboard', 2, 540, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (542, 'I18n', '/i18n', 'GET', '国际化', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (543, 'I18n', '/i18n/index', 'GET', '国际化', 2, 542, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (544, 'Permission', '/permission2', 'GET', '综合实例', 2, 482, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (545, 'PermissionList', '/permission2/list', 'GET', '权限列表', 2, 544, 0, '2018-09-01 14:21:16', '2018-09-01 14:21:16');
INSERT INTO `ba_permissions` VALUES (546, 'ComponentDemo', '/components/components', 'GET', 'ComponentDemo', 2, 488, 0, '2018-09-06 14:05:10', '2018-09-06 14:05:10');
INSERT INTO `ba_permissions` VALUES (547, 'DirectivePermission', '/permission/directive/permission/directive', 'GET', 'DirectivePermission', 2, 485, 0, '2018-09-06 14:15:39', '2018-09-06 14:15:39');
INSERT INTO `ba_permissions` VALUES (548, 'Example', '/role', 'GET', '角色管理', 2, 482, 0, '2018-09-21 13:14:56', '2018-11-06 13:12:47');
INSERT INTO `ba_permissions` VALUES (549, 'createRole', '/role/create', 'GET', 'createRole', 2, 548, 0, '2018-09-21 13:14:56', '2018-09-21 13:14:56');
INSERT INTO `ba_permissions` VALUES (550, 'editRole', '/role/edit/:id(\\d+)', 'GET', 'editRole', 2, 548, 0, '2018-09-21 13:14:56', '2018-09-21 13:14:56');
INSERT INTO `ba_permissions` VALUES (551, 'roleList', '/role/list', 'GET', '角色列表', 2, 548, 0, '2018-09-21 13:14:56', '2018-11-06 13:12:47');
INSERT INTO `ba_permissions` VALUES (552, 'Example', '/upload', 'GET', 'upload', 2, 482, 0, '2018-11-06 13:12:47', '2018-11-06 13:12:47');
INSERT INTO `ba_permissions` VALUES (553, 'uploadDemo', '/upload/demo', 'GET', 'uploadDemo', 2, 552, 0, '2018-11-06 13:12:47', '2018-11-06 13:12:47');

-- ----------------------------
-- Table structure for ba_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `ba_role_permissions`;
CREATE TABLE `ba_role_permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL COMMENT '角色ID',
  `permission_id` int(10) UNSIGNED NOT NULL COMMENT '权限ID',
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_permissions_role_id_index`(`role_id`) USING BTREE,
  INDEX `role_permissions_permission_id_index`(`permission_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3281 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '角色-权限关联表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_role_permissions
-- ----------------------------
INSERT INTO `ba_role_permissions` VALUES (3238, 2, 482, '2018-09-24 12:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3239, 2, 544, '2018-09-24 12:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3240, 2, 545, '2018-09-24 12:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3241, 2, 548, '2018-09-24 12:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3242, 2, 551, '2018-09-24 12:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3245, 3, 482, '2018-09-25 14:08:40', NULL);
INSERT INTO `ba_role_permissions` VALUES (3246, 3, 544, '2018-09-25 14:08:40', NULL);
INSERT INTO `ba_role_permissions` VALUES (3247, 3, 545, '2018-09-25 14:08:40', NULL);
INSERT INTO `ba_role_permissions` VALUES (3248, 3, 548, '2018-09-25 14:08:40', NULL);
INSERT INTO `ba_role_permissions` VALUES (3249, 3, 551, '2018-09-25 14:08:40', NULL);
INSERT INTO `ba_role_permissions` VALUES (3262, 5, 482, '2018-10-08 13:33:25', NULL);
INSERT INTO `ba_role_permissions` VALUES (3263, 5, 544, '2018-10-08 13:33:25', NULL);
INSERT INTO `ba_role_permissions` VALUES (3264, 5, 545, '2018-10-08 13:33:25', NULL);
INSERT INTO `ba_role_permissions` VALUES (3265, 5, 548, '2018-10-08 13:33:25', NULL);
INSERT INTO `ba_role_permissions` VALUES (3266, 5, 551, '2018-10-08 13:33:25', NULL);
INSERT INTO `ba_role_permissions` VALUES (3272, 4, 548, '2018-11-04 13:50:44', NULL);
INSERT INTO `ba_role_permissions` VALUES (3273, 4, 551, '2018-11-04 13:50:44', NULL);
INSERT INTO `ba_role_permissions` VALUES (3274, 1, 482, '2018-11-06 13:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3275, 1, 544, '2018-11-06 13:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3276, 1, 545, '2018-11-06 13:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3277, 1, 548, '2018-11-06 13:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3278, 1, 551, '2018-11-06 13:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3279, 1, 552, '2018-11-06 13:12:49', NULL);
INSERT INTO `ba_role_permissions` VALUES (3280, 1, 553, '2018-11-06 13:12:49', NULL);

-- ----------------------------
-- Table structure for ba_roles
-- ----------------------------
DROP TABLE IF EXISTS `ba_roles`;
CREATE TABLE `ba_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '角色名称',
  `state` tinyint(3) UNSIGNED NOT NULL DEFAULT 2 COMMENT '启用状态 1-启用 2-禁用',
  `is_deleted` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否删除: 0-未删除 1-已删除',
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `updated_at`(`updated_at`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '角色表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_roles
-- ----------------------------
INSERT INTO `ba_roles` VALUES (1, '超级管理员', 1, 0, '2018-09-19 20:36:02', '2018-11-18 14:10:06');
INSERT INTO `ba_roles` VALUES (2, '普通管理员', 1, 0, '2018-09-19 20:36:26', '2018-11-18 13:45:59');
INSERT INTO `ba_roles` VALUES (3, '普通管理员21', 1, 0, '2018-09-24 10:36:59', '2018-11-18 13:45:59');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci COMMENT = '用户表' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
