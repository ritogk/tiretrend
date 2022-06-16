<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;

/**
 * App\Models\Tire
 *
 * @property int $id
 * @property string $title タイトル
 * @property string $brand ブランド
 * @property string $series シリーズ
 * @property string $type タイプ
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $posted_at 投稿日時
 * @method static \Illuminate\Database\Query\Builder|Tire onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tire wherePostedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Tire withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Tire withoutTrashed()
 * @property string $maker メーカー
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereMaker($value)
 */
class Tire extends Model
{
    use SoftDeletes;

    protected $guarded = ['id', 'updated_at', 'created_at', 'deleted_at']; // ブラックリスト

    /**
     * 日時を日本時間に変換する
     * laravel7からtoArray, toJson内の日時がUTC固定になったので
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
