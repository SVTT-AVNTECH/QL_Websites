<?php

namespace Modules\AvnWebsite\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AvnWebsite\Database\factories\AvnWebsiteCostFactory;

class AvnWebsiteCost extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'table_avn_website_costs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'website_id',
        'date',
        'title',
        'price',
        'type',
    ];

    protected static function newFactory(): AvnWebsiteCostFactory
    {
        //return AvnWebsiteCostFactory::new();
    }
}
