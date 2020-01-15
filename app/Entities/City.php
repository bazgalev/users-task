<?php

namespace App\Entities;

use App\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\City
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entities\City whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\User[] $users
 * @property-read int|null $users_count
 */
class City extends Model
{

    protected $fillable = [
        'name'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
