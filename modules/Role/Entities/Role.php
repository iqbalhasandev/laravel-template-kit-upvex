<?php

namespace Modules\Role\Entities;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory, WithCache;

    protected static $cacheKey = '__role___';

    protected $fillable = [
        'name',
        'guard_name',
    ];

    /**
     * Get the created at attribute.
     *
     * @return string
     */
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d M Y H:i:s');
    }

    /**
     * Get the updated at attribute.
     *
     * @return string
     */
    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->format('d M Y H:i:s');
    }
}
