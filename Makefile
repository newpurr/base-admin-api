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
    # 安装base-admin-api
	@php artisan base-admin:install

# 复制env文件
define copy-env
	if [ ! -f ".env" ]; then \
		cp .env.example .env; \
	fi
endef

.PHONY: install

