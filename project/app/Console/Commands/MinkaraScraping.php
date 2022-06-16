<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tire;
use Carbon\Carbon;

class MinkaraScraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:minkara-scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'みんからから今日日付のタイヤ情報のスクレイピングを行います。';

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
        $page = 1;
        while (True) {
            $url = sprintf("https://minkara.carview.co.jp/partsreview/?bi=1&ci=2&pn=%d", $page);
            $crawler = \Goutte::request('GET', $url);
            $has_not_now_item = false;
            $crawler->filter('.pr_search_result_box .item-common')->each(function ($node) use (&$has_not_now_item) {
                $date = \DateTime::createFromFormat('Y年m月d日', $node->filter('.date')->text());
                $dt = new Carbon($date);
                if ($dt->isToday()) {
                    $tire = new Tire();
                    $tire->title = $node->filter('.title')->text();
                    $tire->maker = $node->filter('.maker td')->text();
                    $brand = $node->filter('.brand td');
                    $tire->brand = count($brand) >= 1 ? $brand->text() : 'その他';
                    $tire->series = $node->filter('.series td')->text();
                    $tire->type = $node->filter('.tiretype td')->text();
                    $tire->posted_at = $date;
                    $tire->save();
                } else {
                    $has_not_now_item = true;
                }
            });
            if ($has_not_now_item) break;
            $page++;
        }
        return 0;
    }
}
