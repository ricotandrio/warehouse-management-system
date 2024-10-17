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

    public function viewProductCategoriesPage()
    {
        $product_categories = ProductCategory::orderBy('name')->get();

        if($product_categories->isEmpty()) {
            return redirect()->back()->with('error', 'No product categories found.');
        }

        $last_updated = ProductCategory::orderBy('updated_at', 'desc')->first();
        $last_created = ProductCategory::orderBy('created_at', 'desc')->first();

        if($last_updated && $last_created) {
            $last_time = $last_updated->updated_at > $last_created->created_at ? $last_updated->updated_at : $last_created->created_at;
        }
        
        if(!$last_updated && !$last_created) {
            $last_time = null;
        }

        if(!$last_updated) {
            $last_time = $last_created->created_at;
        }

        return view('product-categories', [
            'product_categories' => $product_categories,
            'last_time' => $last_time
        ]);
    }

    public function viewProductCategoryProductPage(ProductCategory $product_category)
    {
        $products = $product_category->products()->orderBy('name')->get();

        if($products->isEmpty()) {
            return redirect()->back()->with('error', 'No products found in this category.');
        }

        $last_updated = $product_category->products()->orderBy('updated_at', 'desc')->first();
        $last_created = $product_category->products()->orderBy('created_at', 'desc')->first();

        if($last_updated && $last_created) {
            $last_time = $last_updated->updated_at > $last_created->created_at ? $last_updated->updated_at : $last_created->created_at;
        }
        
        if(!$last_updated && !$last_created) {
            $last_time = null;
        }

        if(!$last_updated && $last_created) {
            $last_time = $last_created->created_at;
        }

        return view('product-category', [
            'product_category' => $product_category,
            'last_time' => $last_time,
            'products' => $products
        ]);
    }

    public function delete(ProductCategory $product_category)
    {
        $products = $product_category->products()->get();

        if (!$products->isEmpty()) {
            return redirect()->back()->with('error', 'Product category is associated with products, cannot be deleted.');
        }

        $product_category = $product_category->delete();

        if (!$product_category) {
            return redirect()->back()->with('error', 'Failed to delete product category.');
        }

        return redirect()->back()->with('success', 'Product category deleted successfully.');
    }
}
