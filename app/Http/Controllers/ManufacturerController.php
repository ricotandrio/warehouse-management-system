<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    protected $productController;

    public function __construct(ProductController $productController)
    {
        $this->productController = $productController;
    }

    public function index(Request $request)
    {
        $manufacturer_id = $request->query('manufacturer_id', '');
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);
        $order = $request->query('order', 'asc');

        $manufacturer = Manufacturer::findOrFail($manufacturer_id);

        $products = $this->productController->getProductsByManufacturer($manufacturer->name, $page, $limit, $order);

        return view(
            'manufacturer',
            [
                'manufacturer' => $manufacturer,
                'products' => $products
            ]
        );
    }

    public function getAllManufacturers()
    {
        return Manufacturer::all();
    }
}
