```php
# Set the application key
php artisan key:generate

# Set the JWTAuth secret key used to sign the tokens
jwt:secret

# 逆向 migrations 生成
php artisan migrate:generate

# 逆向 Seed 生成
php artisan iseed 表名1,表名2(不带表前缀)

############### 迁移操作 ###############
# 创建迁移文件
php artisan make:migration create_users_table --create=users
# 执行迁移文件
php artisan migration
# 回滚 --step指定回滚步数,非必选
php artisan migrate:rollback --step=5
```
