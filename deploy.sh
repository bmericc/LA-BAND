#!/usr/bin/env bash
# LA-BAND tema deploy: yerel main'i push eder, sunucuda çeker, cache temizler.
# Kullanım: ./deploy.sh
set -euo pipefail

SERVER="bmericc@192.168.0.82"
THEME_DIR="/root/wordpress/sites/bahricanli/wp-content/themes/LA-BAND"
WP_PATH="/root/wordpress/sites/bahricanli"

echo "▶ Yerel değişiklikler push ediliyor..."
git push origin main

echo "▶ Sunucuda güncelleniyor..."
ssh "$SERVER" "sudo bash -c 'cd $THEME_DIR && git fetch origin -q && git reset --hard origin/main && WP_PATH=$WP_PATH wp cache flush'"

echo "✅ Deploy tamamlandı."
