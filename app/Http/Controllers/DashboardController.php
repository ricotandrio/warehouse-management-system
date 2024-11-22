<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboardPage()
    {
        return view('dashboard', [
            'products' => Product::orderBy('stock_quantity', 'asc')->get(),
        ]);
    }

    public function viewAdminDashboardPage(Request $request)
    {
        $selected = $request->query('selected', 'products');

        $products = [];
        $manufacturers = [];
        $categories = [];

        if($selected === 'products') {
            $products = Product::orderBy('name', 'asc')->get();
        } else if($selected === 'manufacturers') {
            $manufacturers = Manufacturer::orderBy('name', 'asc')->get();
        } else if($selected === 'categories') {
            $categories = ProductCategory::orderBy('name', 'asc')->get();
        }

        return view('admins.dashboard', [
            'products' => $products,
            'manufacturers' => $manufacturers,
            'categories' => $categories,
            'selected' => $selected,
        ]);
    }
}
