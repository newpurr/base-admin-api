<?php

return [
    //===============系统管理=================
    'system'                      => '系统管理',
    'system.health'               => '服务健康',
    
    //===============管理员管理===============
    'admin'                       => '管理员管理',
    'admin.index'                 => '分页列表',
    'admin.show'                  => '用户详情',
    'admin.store'                 => '创建用户',
    'admin.update'                => '更新用户',
    'admin.destroy'               => '删除用户',
    'admin.batchEnable'           => '批量启用',
    'admin.batchDisabled'         => '批量禁用',
    'admin.allotRole'             => '授予角色',
    'admin.getRoleByRoleId'       => '拥有角色',
    'admin.auth.login'            => '登陆',
    'admin.auth.logout'           => '退出',
    'admin.auth.refresh'          => '刷新登陆',
    'admin.auth.user'             => '当前用户',
    
    //================权限管理================
    'permission'                  => '权限管理',
    'permission.index'            => '分页列表',
    'permission.show'             => '权限详情',
    'permission.store'            => '创建权限',
    'permission.update'           => '更新权限',
    'permission.destroy'          => '删除权限',
    'permission.batchEnable'      => '批量启用',
    'permission.batchDisabled'    => '批量禁用',
    'permission.theFrontEndPath'  => '前端路径',
    
    //================角色管理================
    'roles'                       => '角色管理',
    'roles.index'                 => '分页列表',
    'roles.show'                  => '角色详情',
    'roles.store'                 => '创建角色',
    'roles.update'                => '更新角色',
    'roles.destroy'               => '删除角色',
    'roles.batchEnable'           => '批量启用',
    'roles.batchDisabled'         => '批量禁用',
    'roles.allotPermission'       => '分配权限',
    'roles.getPermissionByRoleId' => '拥有权限',
];
