<?php

namespace Modules\Language\Entities;

use App\Traits\WithCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    use WithCache;

    protected static $cacheKey = '__languages__';

    protected $fillable = [
        'lang_name',
        'title',
        'slug',
        'status',
    ];

    public $timestamps = false;
}
