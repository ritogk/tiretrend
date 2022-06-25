<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tire;

class TireScrapingAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:tire-scraping-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '指定サイトからタイヤ情報のスク入れピングを行います。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 4000アイテム以降は表示されなかった。
        $item_cnt = 0;
        $page = 1;
        while (True) {
            $url = sprintf(config('scraping.tire_url'), $page);
            $crawler = \Goutte::request('GET', $url);
            $crawler->filter('.pr_search_result_box .item-common')->each(function ($node) use (&$item_cnt) {
                $tire = new Tire();
                $tire->title = $node->filter('.title')->text();
                $tire->maker = $node->filter('.maker td')->text();

                $brand_node = $node->filter('.brand td');
                $tire->brand = count($brand_node) >= 1 ? $brand_node->text() : 'その他';

                $series_node = $node->filter('.series td');
                $tire->series = count($series_node) >= 1 ? $series_node->text() : 'その他';

                $tire->type = $node->filter('.tiretype td')->text();

                $date_node = $node->filter('.date');
                $tire->posted_at = count($date_node) >= 1 ? \DateTime::createFromFormat('Y年m月d日', $date_node->text()) : '9999/01/01';

                $url_node = $node->filter(".contents-bottom");
                $tire->url = count($url_node) >= 1 ? $url_node->attr("href") : 'その他';

                $tire->save();
                $item_cnt++;
            });
            $page++;
            if ($item_cnt >= 4000) break;
        }
        return 0;
    }
}
