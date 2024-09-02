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

    public function index(Request $request, Manufacturer $manufacturer)
    {
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);
        $order = $request->query('order', 'asc');

        $products = $this->productController->getProductsByManufacturer($manufacturer->id, $page, $limit, $order);

        return view(
            'manufacturer',
            [
                'manufacturer' => $manufacturer,
                'products' => $products
            ]
        );
    }

    public function createManufacturerPage()
    {
        return view('modals.create-manufacturer');
    }

    public function createManufacturer(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:manufacturers'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        Manufacturer::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard');
    }

    public function deleteManufacturer(Manufacturer $manufacturer)
    {   
        if ($manufacturer->products->count() > 0) {
            return redirect()->route('manufacturer', ["manufacturer" => $manufacturer])->with('error', 'Manufacturer has products associated with it, please delete all products first');
        }

        $manufacturer->delete();

        return redirect()->route('dashboard');
    }

    public function getAllManufacturers()
    {
        return Manufacturer::all();
    }

}
