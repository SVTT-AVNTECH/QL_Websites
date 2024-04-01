<?php

namespace Modules\AvnWebsite\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\AvnWebsite\Database\Factories\CheckErrFactory;

class CheckErr extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'websites';
    protected $fillable = [
            'id',
            'status_code',
            'website_id',
        ];

    protected static function newFactory(): CheckErrFactory
    {
        return CheckErrFactory::new();
    }
}

