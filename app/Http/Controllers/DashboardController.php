<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManufacturerController;

class DashboardController extends Controller
{
    protected $productController;
    protected $manufacturerController;

    public function __construct(ProductController $productController, ManufacturerController $manufacturerController)
    {
        $this->productController = $productController;
        $this->manufacturerController = $manufacturerController;
    }
    
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);
        $order = $request->query('order', 'asc');
        $createProduct = $request->query('createProduct', 'false');
        
        $products = $this->productController->getAllProducts($page, $limit, $order);
        
        $manufacturers = [];
        if($createProduct == 'true') {
            $manufacturers = $this->manufacturerController->getAllManufacturers();
        }

        return view('dashboard', [
            'products' => $products,
            'createProduct' => $createProduct,
            'manufacturers' => $manufacturers,
        ]);
    }
}
