<?php

namespace App\Models;

use App\Traits\WithLog;
use App\Traits\WithUuid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, WithUuid, WithLog;

    protected $primaryKey = 'id';
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'sku',
        'description',
        'image',
        'price',
        'stock_quantity',
        'manufacturer_id',
        'category_id',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_uuid', 'uuid');
    }

    public static function toProductArray(Product $product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'manufacturer_uuid' => $product->manufacturer_uuid,
            'category_uuid' => $product->category_uuid,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'deleted_at' => $product->deleted_at,
        ];
    }

    public static function toMapProductsArrayFromArray(array $products)
    {
        return array_map(function (Product $product) {
            if (!$product->deleted_at) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'manufacturer_uuid' => $product->manufacturer_uuid,
                    'category_uuid' => $product->category_uuid,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                    'deleted_at' => null,
                ];
            }
        }, $products);
    }

    public static function toMapProductsArrayFromCollection(Collection $products)
    {
        return $products->map(function (Product $product) {
            if (!$product->deleted_at) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'manufacturer_uuid' => $product->manufacturer_uuid,
                    'category_uuid' => $product->category_uuid,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                    'deleted_at' => null,
                ];
            }
        });
    }
}
