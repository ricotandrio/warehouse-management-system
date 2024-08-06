<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getNumberOfProducts()
    {
        return Product::count();
    }

    public function getListOfProducts($offset, $limit)
    {
        return Product::offset($offset)->limit($limit)->get();
    }
}
