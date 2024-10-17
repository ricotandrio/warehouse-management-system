<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewCreateProductPage()
    {
        return view('forms.create-product', [
            'manufacturers' => Manufacturer::orderBy('name')->get(),
            'categories' => ProductCategory::orderBy('name')->get(),
        ]);
    }

    public function create(Request $request)
    {
        $validated_data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100'],
            'sku' => ['required', 'string', 'min:3', 'max:100', 'unique:products'],
            'description' => ['string', 'nullable'],
            'price' => ['required', 'numeric'],
            'image' => ['image', 'mimes:png,jpg', 'max:2048'],
            'stock_quantity' => ['required', 'integer'],
            'manufacturer_id' => ['required', 'string', 'exists:manufacturers,id'],
            'category_id' => ['required', 'string', 'exists:product_categories,id'],
        ]);

        if($request->hasFile('image')){
            $validated_data['image'] = $request->file('image')->store('products');
        }

        $product = Product::create([
            'name' => $validated_data['name'],
            'sku' => $validated_data['sku'],
            'description' => $validated_data['description'] ?? null,
            'price' => $validated_data['price'],
            'image' => $validated_data['image'] ?? null,
            'stock_quantity' => $validated_data['stock_quantity'],
            'manufacturer_id' => $validated_data['manufacturer_id'],
            'category_id' => $validated_data['category_id'],
        ]);

        if (!$product) {
            return redirect()->back()->with('error', 'Failed to create product.');
        }

        return redirect()->back()->with('success', 'Product created successfully.');
    }

    public function viewProductDetailPage(Product $product) {

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $manufacturer = $product->manufacturer;
        $category = $product->category;

        if (!$manufacturer || !$category) {
            return redirect()->back()->with('error', 'Some product details cannot be shown.');
        }

        return view('product-detail', [
            'product' => $product,
            'manufacturer' => $manufacturer,
            'category' => $category,
        ]);
    }

    public function delete(Product $product)
    {
        $transaction_detail = TransactionDetail::where('product_id', $product->id)->first();

        if ($transaction_detail) {
            return redirect()->back()->with('error', 'Product is associated with transaction, cannot be deleted.');
        }

        $product = $product->delete();

        if (!$product) {
            return redirect()->back()->with('error', 'Failed to delete product.');
        }

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function updateStock(Request $request, Product $product)
    {
        $validated_data = $request->validate([
            'latest_stock_quantity' => ['required', 'integer'],
        ]);

        if(!$request->confirmation) {
            return redirect()->back()->with('error', 'Please confirm the action.');
        }

        if(!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
        
        if($product->stock_quantity == $validated_data["latest_stock_quantity"]) {
            return redirect()->back()->with('error', 'Latest Stock Quantity is same as Product Quantity.');
        }
        
        $transaction_header = TransactionHeader::create([
            'type' => $product->stock_quantity > $validated_data["latest_stock_quantity"] ? "OUT" : "IN"
        ]);

        if(!$transaction_header) {
            return redirect()->back()->with('error', 'Transaction Header Failed.');
        }
        
        $transaction_detail = TransactionDetail::create([
            'transaction_id' => $transaction_header->fresh()->id,
            'product_id' => $product->id,
            'quantity' => $validated_data["latest_stock_quantity"]
        ]);
        
        if(!$transaction_detail) {
            return redirect()->back()->with('error', 'Transaction Detail Failed.');
        }

        $product->update([
            'stock_quantity' => $validated_data["latest_stock_quantity"]
        ]);

        return redirect()->back()->with('success', 'Product stock successfully updated');
    }

    public function viewUpdateStockPage(Product $product) {

        if(!$product) {
            return redirect()->intended('/')->with('error', 'Product is not available.');
        }
        
        return view('forms.update-stock', [
            'product' => $product
        ]);
    }
}
