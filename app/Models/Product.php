<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'manufacturer_id',
    ];

    protected $attributes = [
        'image_url' => '/',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

    public static function getAllProducts($page = 1, $limit = 10, $order = 'asc'): LengthAwarePaginator
    {
        return self::orderBy('name', $order)->paginate($limit, ['*'], 'page', $page);
    }

    public static function getProductsByQuery($query): LengthAwarePaginator
    {
        return self::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orWhereHas('manufacturer', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->get();
    }

    public static function getProductsByManufacturer($manufacturer_id, $page = 1, $limit = 10, $order = 'asc'): LengthAwarePaginator
    {
        return self::orderBy('name', $order)->whereHas('manufacturer', function ($q) use ($manufacturer_id) {
            $q->where('id', $manufacturer_id);
        })->paginate($limit, ['*'], 'page', $page);
    }
}
