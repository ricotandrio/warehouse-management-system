<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request, Product $product)
    {
        $edit = $request->query('edit', 'false');
        
        $manufacturer = $product->manufacturer;
        $manufacturers = Manufacturer::all();
        
        return view('components.product-detail', [
            'product' => $product,
            'edit' => $edit,
            'manufacturer' => $manufacturer,
            'manufacturers' => $manufacturers,
        ]); 
    }

    public function getAllProducts($page = 1, $limit = 10, $order = 'asc')
    {
        return Product::getAllProducts($page, $limit, $order);
    }

    public function getProductsByQuery($query)
    {
        return Product::getProductsByQuery($query);
    }

    public function getProductsByManufacturer($manufacturer_id, $page = 1, $limit = 10)
    {
        return Product::getProductsByManufacturer($manufacturer_id, $page, $limit);
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
            'image_url' => $validate['image_url'] ?? '',
            'manufacturer_id' => $validate['manufacturer_id'],
        ]);
        
        return redirect()->route('dashboard');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard');
    }

    public function updateProduct(Product $product, Request $request)
    {
        $validate = $request->validate([
            'product_id' => ['numeric'],
            'name' => ['string', 'min:3'],
            'description' => ['string', 'min:5'],
            'price' => ['numeric'],
            'image_url' => ['url', 'nullable'],
            'manufacturer_id' => ['numeric'],
        ]);

        $product->update([
            'name' => $validate['name'] ?? $product->name,
            'description' => $validate['description'] ?? $product->description,
            'price' => $validate['price'] ?? $product->price,
            'image_url' => $validate['image_url'] ?? $product->image_url,
            'manufacturer_id' => $validate['manufacturer_id'] ?? $product->manufacturer_id,
        ]);

        return redirect()->route('dashboard');
    }

}
