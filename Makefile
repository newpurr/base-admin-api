file := .env
real_file := $(wildcard $(file))

all: install
	@echo
	@echo "Build complete."
	@echo

# install
install:
	# 复制env文件
	@$(copy-env); \
	# 安装依赖库
	@composer install -vvv; \
    # 清除缓存
	@php artisan config:cache; \
    # 生成app key
	@php artisan key:generate; \
    # 生成jwt secretphp
	@php artisan jwt:secret

mysql:
	# 请创建数据库
	mysql -uroot -p

# 复制env文件
define copy-env
	if [ ! -f ".env" ]; then \
		cp .env.example .env; \
	fi
endef

.PHONY: install

