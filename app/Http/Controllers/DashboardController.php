<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

class DashboardController extends Controller
{
    protected $productController;
    

    public function __construct(ProductController $productController)
    {
        $this->productController = $productController;
    }

    public function getDashboardView($page = 1, $limit = 10)
    {
        $numberOfProducts = $this->productController->getNumberOfProducts() ?? 0;
        $productsList = $this->productController->getListOfProducts($page, $limit) ?? [];
        
        return view('dashboard', [
            'number_of_products' => $numberOfProducts,
            'products_list' => $productsList,
            'total_pages' => ceil($numberOfProducts / $limit),
            'page' => $page,
            'limit' => $limit,
        ]);
    }

    public function getDashboardQueryView($query = '', $page = 1, $limit = 10)
    {
        return 'Query: ' . $query . ' Page: ' . $page . ' Limit: ' . $limit;
    }
    
}