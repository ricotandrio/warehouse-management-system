<?php

namespace App\Models;

use App\Traits\WithLog;
use App\Traits\WithUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory, WithUuid, WithLog;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    
    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_uuid', 'uuid');
    }
}
