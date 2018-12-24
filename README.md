[TOC]

### 介绍
base-admin-api是一个基于larave5.6l开发的后台基础管理API接口平台。

开发这个项目的初衷是践行面向对象开发的原则，将自己学习到的封装、领域分层等知识做一个基础的实现，将自己学习的零散知识做一个整合。这个项目分为控制器层、Service层、Repostitory层、领域模型层,各层之间依赖于契约接口而不依赖于底层实现,实现了基础业务之间的的解耦与复用。

### 安装

1. 生成表结构 

     `php artisan migrate`

2. 填充数据 

     `php artisan db:seed`

3. 生成app key 

     `php artisan key:generate`

4. 生成jwt秘钥

     `php artisan jwt:secret`


