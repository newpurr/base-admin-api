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
    # 切换国内镜像源
	@composer config -g repo.packagist composer https://packagist.phpcomposer.com; \
	# 安装依赖库
	@composer install -vvv; \
    # 安装base-admin-api
	@php artisan base-admin:install

# 复制env文件
define copy-env
	if [ ! -f ".env" ]; then \
		cp .env.example .env; \
	fi
endef

.PHONY: install

