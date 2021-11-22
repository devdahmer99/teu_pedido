<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static first()
 */
class Tenant extends Model
{
    protected $fillable =
        [
        'cnpj', 'name', 'url', 'email', 'logo', 'active', 'subscription',
         'expires_at', 'subscription_id', 'subscription_active', 'subscription_suspended'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function plan(): HasMany
    {
        return $this->belongsTo(Tenant::class);
    }
}
