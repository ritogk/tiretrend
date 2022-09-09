cd $HOME/app/tiretrend/project
# cron経由で実行するとphpのパスが通らいのでフルパス指定
/usr/local/bin/php74cli artisan command:tire-scraping > /dev/null 2>&1
