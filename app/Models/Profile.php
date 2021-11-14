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

    /**
     * Get Permissions
     */

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Permission not linked with this profile
     */

    public function permissionsAvailable()
    {
        $permissions = Permission::whereNotIn('id', function ($query) {
            $query->select('permission_id')
                ->from('permission_profile')
                ->whereRaw("permission_profile.profile_id={$this->id}");
        })
            ->paginate();

        return $permissions;
    }
}
