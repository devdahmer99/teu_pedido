<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method paginate()
 * @method create(array $all)
 */
class Profile extends Model
{
    protected $fillable = ['name', 'description'];
}
