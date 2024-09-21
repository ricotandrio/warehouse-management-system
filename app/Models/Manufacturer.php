<?php

namespace App\Models;

use App\Traits\WithLog;
use App\Traits\WithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory, WithUuid, WithLog;

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'description',
        'profile_image',
        'website_link',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'manufacturer_uuid', 'uuid');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'manufacturer_uuid', 'uuid');
    }

    public static function uuid(string $id)
    {   
        return self::where('id', $id)->value('uuid');
    }

}
