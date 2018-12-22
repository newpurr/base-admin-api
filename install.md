```php
############### 生成秘钥 ###############
# Set the application key
php artisan key:generate

# Set the JWTAuth secret key used to sign the tokens
jwt:secret

############### migrations与Seed逆向工具 ###############
# 逆向 migrations 生成
php artisan migrate:generate

# 逆向 Seed 生成
php artisan iseed 表名1,表名2(不带表前缀)

############### 迁移操作 ###############
# 创建迁移文件
php artisan make:migration create_users_table --create=users
# 执行迁移文件
php artisan migrate
# 回滚 --step指定回滚步数,非必选git
php artisan migrate:rollback --step=5

############### 迁移操作 ###############
# 生成Model并生成migration文件
php artisan make:model Models/Employee -m

############### 通过仓库生成数据 ###############
# 1.在项目\database\factories下编写数据生成规则
$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
# 2.生成数据
php artisan tinker
factory(\App\User::class, 20)->create();


############### ide-helper ###############
 ide-helper
  ide-helper:eloquent         Add \Eloquent helper to \Eloquent\Model
  ide-helper:generate         Generate a new IDE Helper file.
  ide-helper:meta             Generate metadata for PhpStorm
  ide-helper:models           Generate autocompletion for models
```
