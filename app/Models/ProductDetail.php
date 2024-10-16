<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    public static function toMapProductDetailsArrayFromArray(array $productDetails)
    {
        return array_map(function (ProductDetail $productDetail) {
            if(!$productDetail->deleted_at) {
                return [
                    'id' => $productDetail->id,
                    'product_id' => $productDetail->product_id,
                    'name' => $productDetail->name,
                    'description' => $productDetail->description,
                    'created_at' => $productDetail->created_at,
                    'updated_at' => $productDetail->updated_at,
                    'deleted_at' => null,
                ];
            }
        }, $productDetails);
    }
}
