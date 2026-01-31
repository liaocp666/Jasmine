#!/usr/bin/env bash

# 使用方式：
#   ./jcms.sh up
#   ./jcms.sh down
#   ./jcms.sh package

set -euo pipefail

COMMAND="${1:-}"

case "$COMMAND" in
  up)
    echo "启动服务 (docker compose up -d) ..."
    docker compose up -d
    ;;

  down)
    echo "停止并移除容器 (docker compose down) ..."
    docker compose down
    ;;

  package)
    echo "开始打包 theme → Jasmine ..."

    SRC_DIR="theme"
    DEST_DIR="Jasmine"
    OUTPUT_FILE="Jasmine-theme-$(date +%Y%m%d-%H%M%S).zip"

    # 检查源目录是否存在
    if [[ ! -d "$SRC_DIR" ]]; then
      echo "错误：目录 $SRC_DIR 不存在！"
      exit 1
    fi

    # 创建目标目录（如果不存在）
    mkdir -p "$DEST_DIR"

    echo "复制 theme → Jasmine ..."
    # 使用 rsync 更安全（保留权限、排除 .git 等）
    rsync -a --delete \
      --exclude='.git' \
      --exclude='node_modules' \
      --exclude='.DS_Store' \
      --exclude='*.log' \
      "$SRC_DIR/" "$DEST_DIR/"

    echo "正在创建压缩包：$OUTPUT_FILE"

    if command -v zip >/dev/null 2>&1; then
      # 使用 zip 命令（macOS/Linux 常见）
      (cd "$DEST_DIR" && zip -r -q "../$OUTPUT_FILE" .)
    elif command -v 7z >/dev/null 2>&1; then
      # 如果有 7z 也可以用
      7z a -tzip "$OUTPUT_FILE" "$DEST_DIR/."
    else
      echo "错误：找不到 zip 或 7z 命令，无法创建 zip 文件"
      echo "请安装 zip 工具（例如：brew install zip / apt install zip）"
      exit 1
    fi

    echo "打包完成：${OUTPUT_FILE}"
    echo "文件大小：$(du -h "$OUTPUT_FILE" | cut -f1)"
    ;;

  "")
    echo "错误：缺少参数"
    echo "用法："
    echo "  $0 up      →  docker compose up -d"
    echo "  $0 down        →  docker compose down"
    echo "  $0 package     →  打包 theme → Jasmine → zip 文件"
    exit 1
    ;;

  *)
    echo "不支持的参数：$COMMAND"
    echo "可用命令：up / down / package"
    exit 1
    ;;
esac

echo "操作完成 ✓"