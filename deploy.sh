#!/usr/bin/env bash
# LA-BAND tema deploy: yerel main'i push eder, sunucuda çeker, cache temizler.
# Kullanım: ./deploy.sh
set -euo pipefail

SERVER="bmericc@192.168.0.82"
SITE_DIR="/root/wordpress/sites/bahricanli"
THEME_DIR="$SITE_DIR/wp-content/themes/LA-BAND"

echo "▶ Yerel değişiklikler push ediliyor..."
git push origin main

echo "▶ Sunucuda güncelleniyor (git pull + WP cache + WP Fastest Cache)..."
ssh "$SERVER" "sudo bash -c '
    cd $THEME_DIR && git fetch origin -q && git reset --hard origin/main
    WP_PATH=$SITE_DIR wp cache flush
    rm -rf $SITE_DIR/wp-content/cache/all/* $SITE_DIR/wp-content/cache/wpfc-minified/* 2>/dev/null
    echo \"cache temizlendi\"
'"

echo "✅ Deploy tamamlandı."
