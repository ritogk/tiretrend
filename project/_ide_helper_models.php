<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tire whereDeletedAt($value)
 */
	class Tire extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

