<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function create(Request $request)
    {
        $validated_request = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:product_categories'],
            'description' => ['string', 'nullable'],
        ]);

        $product_category = ProductCategory::create([
            'name' => $validated_request['name'],
            'description' => $validated_request['description'] ?? null,
        ]);

        if (!$product_category) {
            return redirect()->back()->with('error', 'Failed to create product category.');
        }

        return redirect()->back()->with('success', 'Product category created successfully.');
    }

    public function viewCreateProductCategoryPage()
    {
        return view('forms.create-product-category');
    }
}
