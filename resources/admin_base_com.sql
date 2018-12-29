/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1_3306
 Source Server Type    : MySQL
 Source Server Version : 80013
 Source Host           : 127.0.0.1:3306
 Source Schema         : admin_base_com

 Target Server Type    : MySQL
 Target Server Version : 80013
 File Encoding         : 65001

 Date: 29/12/2018 10:52:46
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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_admins
-- ----------------------------
INSERT INTO `ba_admins` VALUES (1, 'luotao2', 'luota2o', '18581405482', '$2y$10$PKnuGXL5TLXHCQrwHz5EE.U1wPrW/WU2vEnJKesBUiqeuLvGwITcW', 1, 0, '2018-12-23 09:10:34', '2018-12-25 13:36:20');
INSERT INTO `ba_admins` VALUES (2, 'luotao', 'admin3', '18581405483', '$2y$10$RxlncwuKRoL.M/HHch/Jjepcd0b4oEO44Wozk5cNOp4.YUuW16bHK', 1, 0, '2018-12-23 09:12:05', '2018-12-26 08:01:46');
INSERT INTO `ba_admins` VALUES (3, 'luotao3', 'luota2o1', '18581405485', '$2y$10$ZVTtXeWh6bqr4VCHJIl3q.YviLwzUja5cIobHWtMKXn.MZmtudAee', 2, 0, '2018-12-27 04:26:24', '2018-12-27 04:26:24');

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
INSERT INTO `ba_assigned_roles` VALUES (2, 1);
INSERT INTO `ba_assigned_roles` VALUES (2, 2);
INSERT INTO `ba_assigned_roles` VALUES (2, 4);
INSERT INTO `ba_assigned_roles` VALUES (2, 6);
INSERT INTO `ba_assigned_roles` VALUES (2, 7);

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `ba_migrations` VALUES (8, '2018_12_29_024329_create_ba_admins_table', 0);
INSERT INTO `ba_migrations` VALUES (9, '2018_12_29_024329_create_ba_assigned_roles_table', 0);
INSERT INTO `ba_migrations` VALUES (10, '2018_12_29_024329_create_ba_attachments_table', 0);
INSERT INTO `ba_migrations` VALUES (11, '2018_12_29_024329_create_ba_migrations_table', 0);
INSERT INTO `ba_migrations` VALUES (12, '2018_12_29_024329_create_ba_password_resets_table', 0);
INSERT INTO `ba_migrations` VALUES (13, '2018_12_29_024329_create_ba_permissions_table', 0);
INSERT INTO `ba_migrations` VALUES (14, '2018_12_29_024329_create_ba_roles_table', 0);
INSERT INTO `ba_migrations` VALUES (15, '2018_12_29_024329_create_ba_roles_permissions_table', 0);
INSERT INTO `ba_migrations` VALUES (16, '2018_12_29_024329_create_ba_users_table', 0);

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
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_permissions
-- ----------------------------
INSERT INTO `ba_permissions` VALUES (1, 'admin', 'admin', 'GET', '管理员管理', 1, 0, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:36:32');
INSERT INTO `ba_permissions` VALUES (2, 'admin.index', 'api/admin', 'GET|HEAD', '分页列表', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (3, 'admin.store', 'api/admin', 'POST', '创建用户', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (4, 'admin.batchDisabled', 'api/admin/_bulk/batchDisabled', 'POST', '批量禁用', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (5, 'admin.batchEnable', 'api/admin/_bulk/batchEnabled', 'POST', '批量启用', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (6, 'admin.auth.login', 'api/admin/auth/login', 'POST', '登陆', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (7, 'admin.auth.logout', 'api/admin/auth/logout', 'POST', '退出', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (8, 'admin.auth.refresh', 'api/admin/auth/refresh', 'POST', '刷新登陆', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (9, 'admin.auth.user', 'api/admin/auth/user', 'GET|HEAD', '当前用户', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (10, 'admin.show', 'api/admin/{admin}', 'GET|HEAD', '用户详情', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (11, 'admin.update', 'api/admin/{admin}', 'PUT|PATCH', '更新用户', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (12, 'admin.destroy', 'api/admin/{admin}', 'DELETE', '删除用户', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (13, 'admin.allotRole', 'api/admin/{uid}/roles', 'POST', '授予角色', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (14, 'admin.getRoleByRoleId', 'api/admin/{uid}/roles', 'GET|HEAD', '拥有角色', 1, 1, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (15, 'permission', 'permission', 'GET', '权限管理', 1, 0, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:36:33');
INSERT INTO `ba_permissions` VALUES (16, 'permission.store', 'api/permission', 'POST', '创建权限', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (17, 'permission.index', 'api/permission', 'GET|HEAD', '分页列表', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (18, 'permission.batchDisabled', 'api/permission/_bulk/batchDisabled', 'POST', '批量禁用', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (19, 'permission.batchEnable', 'api/permission/_bulk/batchEnable', 'POST', '批量启用', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (20, 'permission.theFrontEndPath', 'api/permission/frontend/path', 'GET|HEAD', '前端路径', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (21, 'permission.show', 'api/permission/{permission}', 'GET|HEAD', '权限详情', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (22, 'permission.update', 'api/permission/{permission}', 'PUT|PATCH', '更新权限', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (23, 'permission.destroy', 'api/permission/{permission}', 'DELETE', '删除权限', 1, 15, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (24, 'roles', 'roles', 'GET', '角色管理', 1, 0, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:36:33');
INSERT INTO `ba_permissions` VALUES (25, 'roles.index', 'api/roles', 'GET|HEAD', '分页列表', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (26, 'roles.store', 'api/roles', 'POST', '创建角色', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (27, 'roles.batchDisabled', 'api/roles/_bulk/batchDisabled', 'POST', '批量禁用', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (28, 'roles.batchEnable', 'api/roles/_bulk/batchEnable', 'POST', '批量启用', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (29, 'roles.allotPermission', 'api/roles/{roleid}/permission', 'POST', '分配权限', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (30, 'roles.getPermissionByRoleId', 'api/roles/{roleid}/permission', 'GET|HEAD', '拥有权限', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (31, 'roles.update', 'api/roles/{role}', 'PUT|PATCH', '更新角色', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (32, 'roles.destroy', 'api/roles/{role}', 'DELETE', '删除角色', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (33, 'roles.show', 'api/roles/{role}', 'GET|HEAD', '角色详情', 1, 24, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');
INSERT INTO `ba_permissions` VALUES (34, 'system', 'system', 'GET', '系统管理', 1, 0, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:36:33');
INSERT INTO `ba_permissions` VALUES (35, 'system.health', 'api/system/health', 'GET|HEAD', '服务健康', 1, 34, 1, 0, '2018-12-28 14:35:08', '2018-12-28 14:35:08');

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
INSERT INTO `ba_roles_permissions` VALUES (1, 1);
INSERT INTO `ba_roles_permissions` VALUES (1, 2);
INSERT INTO `ba_roles_permissions` VALUES (1, 3);
INSERT INTO `ba_roles_permissions` VALUES (1, 4);
INSERT INTO `ba_roles_permissions` VALUES (1, 5);
INSERT INTO `ba_roles_permissions` VALUES (1, 6);
INSERT INTO `ba_roles_permissions` VALUES (1, 7);
INSERT INTO `ba_roles_permissions` VALUES (1, 8);
INSERT INTO `ba_roles_permissions` VALUES (1, 9);
INSERT INTO `ba_roles_permissions` VALUES (1, 10);
INSERT INTO `ba_roles_permissions` VALUES (1, 11);
INSERT INTO `ba_roles_permissions` VALUES (1, 12);
INSERT INTO `ba_roles_permissions` VALUES (1, 13);
INSERT INTO `ba_roles_permissions` VALUES (1, 14);
INSERT INTO `ba_roles_permissions` VALUES (1, 15);
INSERT INTO `ba_roles_permissions` VALUES (1, 16);
INSERT INTO `ba_roles_permissions` VALUES (1, 17);
INSERT INTO `ba_roles_permissions` VALUES (1, 18);
INSERT INTO `ba_roles_permissions` VALUES (1, 19);
INSERT INTO `ba_roles_permissions` VALUES (1, 20);
INSERT INTO `ba_roles_permissions` VALUES (1, 21);
INSERT INTO `ba_roles_permissions` VALUES (1, 22);
INSERT INTO `ba_roles_permissions` VALUES (1, 23);
INSERT INTO `ba_roles_permissions` VALUES (1, 24);
INSERT INTO `ba_roles_permissions` VALUES (1, 25);
INSERT INTO `ba_roles_permissions` VALUES (1, 26);
INSERT INTO `ba_roles_permissions` VALUES (1, 27);
INSERT INTO `ba_roles_permissions` VALUES (1, 28);
INSERT INTO `ba_roles_permissions` VALUES (1, 29);
INSERT INTO `ba_roles_permissions` VALUES (1, 30);
INSERT INTO `ba_roles_permissions` VALUES (1, 31);
INSERT INTO `ba_roles_permissions` VALUES (1, 32);
INSERT INTO `ba_roles_permissions` VALUES (1, 33);
INSERT INTO `ba_roles_permissions` VALUES (1, 34);
INSERT INTO `ba_roles_permissions` VALUES (1, 35);

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ba_users
-- ----------------------------
INSERT INTO `ba_users` VALUES (3, 'admin', '18581405481', '$2y$10$MqEbgzBKj9flgX2YlrLnA.OyyQxljx63N.kR4H66KDfcICqsG1kv2', NULL, '2018-12-22 07:40:46', '2018-12-22 07:40:46');

SET FOREIGN_KEY_CHECKS = 1;
