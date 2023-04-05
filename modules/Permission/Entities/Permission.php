<?php

namespace Modules\Permission\Entities;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory, WithCache;

    protected $fillable = ['name', 'group', 'guard_name'];

    protected static $cacheKey = '__permission___';

    public static function groupList()
    {
        return self::select('group')->distinct()->pluck('group');
    }

    public static function groups()
    {
        $permissions = self::cacheData();
        $groupData = [];
        foreach ($permissions as $s) {
            $groupData[$s->group][] = $s;
        }

        return $groupData;
    }

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
