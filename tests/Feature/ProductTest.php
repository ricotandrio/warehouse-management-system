<?php

namespace Tests\Feature;

use App\Http\Controllers\ProductController;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testGetAllProducts()
    {
        $productController = $this->app->make(ProductController::class);

        $products = $productController->getAllProducts();

        $this->assertIsObject($products);
        $this->assertIsArray($products->items());
    }

    public function testGetProductsByQuery()
    {
        $productController = $this->app->make(ProductController::class);

        $products = $productController->getProductsByQuery('test');
        
        $this->assertIsObject($products);
    }

    public function testGetProductsByManufacturer()
    {
        $productController = $this->app->make(ProductController::class);

        $products = $productController->getProductsByManufacturer('test');

        $this->assertIsObject($products);
        $this->assertIsArray($products->items());
    }

    public function testCreateProduct() 
    {
        $productController = $this->app->make(ProductController::class);

        $request = new Request([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100,
            'manufacturer_id' => 1,
        ]);

        $productController->createProduct($request);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100,
            'manufacturer_id' => 1,
        ]);
        
    }
}
