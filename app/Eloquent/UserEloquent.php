<?php

namespace App\Eloquent;

use App\Eloquent\CityEloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $patronymic
 * @property int $city_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\UserEloquent whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Eloquent\CityEloquent $city
 */
class UserEloquent extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'patronymic', 'email', 'city_id'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(CityEloquent::class);
    }


}
