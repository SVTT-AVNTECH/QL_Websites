<?php

namespace Modules\AvnWebsite\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\AvnWebsite\Database\factories\AvnWebsitesFactory;
use Modules\AvnWebsite\App\Models\AvnWebsiteCost;
use App\Models\User;
class AvnWebsites extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'table_avn_websites';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'url',
        'domain_date_register',
        'domain_date_expried',
        'domain_info',
        'hosting_date_register',
        'hosting_date_expried',
        'hosting_info',
        'note',
        'user_id',
    ];

    protected static function newFactory(): AvnWebsitesFactory
    {
        //return AvnWebsitesFactory::new();
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function costs()
    {
        return $this->hasMany(AvnWebsiteCost::class, 'website_id', 'id');
    }
    public function domain_costs()
    {
        return $this->hasMany(AvnWebsiteCost::class, 'website_id', 'id')->where('type', 'domain');
    }
    public function hosting_costs()
    {
        return $this->hasMany(AvnWebsiteCost::class, 'website_id', 'id')->where('type', 'hosting');
    }
}
