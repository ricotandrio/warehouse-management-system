<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public static function getAllManufacturers() 
    {
        return Manufacturer::all();
    }

    public static function getManufacturerById($id) 
    {
        return Manufacturer::find($id);
    }

    public static function getManufacturerByName($name) 
    {
        return Manufacturer::where('name', $name)->first();
    }
}
