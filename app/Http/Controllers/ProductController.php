<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts($page = 1, $limit = 10, $order = 'asc')
    {
        return Product::getAllProducts($page, $limit, $order);
    }

    public function getProductsByQuery($query)
    {
        return Product::getProductsByQuery($query);
    }

    public function getProductsByManufacturer($manufacturer_name, $page = 1, $limit = 10)
    {
        return Product::getProductsByManufacturer($manufacturer_name, $page, $limit);
    }

    public function createProduct(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:5'],
            'price' => ['required', 'numeric'],
            'image_url' => ['url', 'nullable'],
            'manufacturer_id' => ['required', 'numeric'],
        ]);

        Product::create([
            'name' => $validate['name'],
            'description' => $validate['description'],
            'price' => $validate['price'],
            'image_url' => $validate['image_url'] ?? '/',
            'manufacturer_id' => $validate['manufacturer_id'],
        ]);
        
        return redirect()->route('dashboard');
    }

    public function deleteProduct($product_id)
    {
        Product::destroy($product_id);

        return redirect()->route('dashboard');
    }

}
