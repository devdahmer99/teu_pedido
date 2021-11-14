<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method where(string $string, $url)
 * @method create(array $data)
 */
class Plan extends Model
{
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details(): HasMany
    {
      return $this->hasMany(DetailPlan::class);
    }

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%{$filter}%")
        ->orWhere('description', 'LIKE', "%{$filter}%")
        ->paginate();

        return $results;
    }

}
