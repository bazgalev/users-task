<?php

namespace App\Eloquent;

use App\Eloquent\UserEloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\City
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\CityEloquent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\CityEloquent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\CityEloquent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\CityEloquent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\CityEloquent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\CityEloquent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Eloquent\CityEloquent whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eloquent\UserEloquent[] $users
 * @property-read int|null $users_count
 */
class CityEloquent extends Model
{

    protected $fillable = [
        'name'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(UserEloquent::class);
    }
}
