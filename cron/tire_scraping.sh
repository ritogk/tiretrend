cd $HOME/tiretrend/project
# cron経由で実行するとphpのパスが通らいのでフルパス指定
/usr/bin/php7.4 artisan command:tire-scraping > /dev/null 2>&1
