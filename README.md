## base-admin-api
[![Build Status](https://travis-ci.org/michaelliao/openweixin.svg?branch=master)](https://www.travis-ci.org/SuperHappysir/base-admin-api)

[TOC]
### 介绍
`base-admin-api`是基于 `larave` + `swoole` 开发的管理后台API接口,在享受laravel优雅的开发模式的同时使用swoole加速,让编码变成一种享受。

开发本项目的初衷是想践行面向对象开发的原则，将自己学习到的面向对象设计、领域分层等知识做一个基础的实现，将零散知识做一个整合, 同时开发出一套基础管理后台供大家使用。

本项目分为控制器层、Service层、Repostitory层、领域模型层,各层之间依赖于契约接口而不依赖于底层实现,实现了基础业务之间的的解耦与复用。

### 技术栈
本项目站在前人的肩膀上开发,使用了如下包或技术

- laravel
- swooletw/laravel-swoole(目前仅使用swoole来加速、未使用其他swoole特性)
- unicodeveloper/laravel-password
- prettus/l5-repository
- tymon/jwt-auth
- barryvdh/laravel-cors
- jellybool/flysystem-upyun

### 基础安装

1. clone 项目

    ```shell
    git clone https://github.com/SuperHappysir/base-admin-api.git
    
    cd base-admin-api
    
    composer install -vvv
    cp .env.example .env
    ```

2. 生成app key 

     ```shell
     php artisan config:cache
     php artisan key:generate
     ```

3. 生成jwt secret

     `php artisan jwt:secret`

4. 表迁移 
     1. 在.env配置自己的数据库链接
     2. 创建数据库(您需要手动创建您配置的数据库,`php artisan migrate`不会自动创建数据库)
     3. 执行迁移`php artisan migrate`

5. 填充数据 

     `php artisan db:seed`

6. 运行项目
 
    1. nginx反向代理
    
        > 配置nginx vhost
        ```nginx
        server
        {
            listen 80;
            # 需要替换成你自己的host
            server_name you.host;
            root /you/path/to/base-admin-api/public/;
            index index.html index.htm index.php;
            error_page  500 502 503 504  /error_page.htm;
            location /
            {
                proxy_set_header Host $http_host;
                proxy_set_header Scheme $scheme;
                proxy_set_header SERVER_PORT $server_port;
                proxy_set_header REMOTE_ADDR $remote_addr;
                proxy_set_header Connection "keep-alive";
                proxy_set_header X-Real-IP $remote_addr;
                proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
                # 需要替换成你自己的env文件里面的SWOOLE_HTTP_PORT
                proxy_pass http://127.0.0.1:SWOOLE_HTTP_PORT;
            }
        }
        ```
        > 启动/重启nginx
        
        `nginx` / `nginx -s reload`
    2. 启动swoole服务 `php artisan swoole:http start`

