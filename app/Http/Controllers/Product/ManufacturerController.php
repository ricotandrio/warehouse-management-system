<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function create(Request $request)
    {
        $validated_request = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:100', 'unique:manufacturers'],
            'email' => ['string', 'email', 'nullable'],
            'phone' => ['string', 'min:10', 'max:20', 'nullable'],
            'description' => ['string', 'nullable'],
            'profile_image' => ['string', 'nullable'],
            'website_link' => ['string', 'nullable'],
        ]);

        $manufacturer = Manufacturer::create([
            'name' => $validated_request['name'],
            'email' => $validated_request['email'] ?? null,
            'phone' => $validated_request['phone'] ?? null,
            'description' => $validated_request['description'] ?? null,
            'profile_image' => $validated_request['profile_iamge'] ?? null,
            'website_link' => $validated_request['website_link'] ?? null,
        ]);

        if(!$manufacturer) {
            return redirect()->back()->with('error', 'Failed to create manufacturer.');
        }

        return redirect()->back()->with('success', 'Manufacturer created successfully.');
    }

    public function viewCreateManufacturerPage()
    {
        return view('forms.create-manufacturer');
    }

    public function viewManufacturersPage()
    {
        $manufacturers = Manufacturer::orderBy('name')->get();
        $last_updated = Manufacturer::orderBy('updated_at', 'desc')->first();
        $last_created = Manufacturer::orderBy('created_at', 'desc')->first();

        $last_time = $last_updated->updated_at > $last_created->created_at ? $last_updated->updated_at : $last_created->created_at;

        return view('manufacturers', [
            'manufacturers' => $manufacturers,
            'last_time' => $last_time
        ]);
    }

    public function viewManufacturerProductPage(Manufacturer $manufacturer) {
        $products = $manufacturer->products()->orderBy('name')->get();

        if($products->isEmpty()) {
            return redirect()->back()->with('error', 'No products found for this manufacturer.');
        }

        $last_updated = $manufacturer->products()->orderBy('updated_at', 'desc')->first();
        $last_created = $manufacturer->products()->orderBy('created_at', 'desc')->first();

        if($last_updated && $last_created) {
            $last_time = $last_updated->updated_at > $last_created->created_at ? $last_updated->updated_at : $last_created->created_at;
        }
        
        if(!$last_updated && !$last_created) {
            $last_time = null;
        }

        if(!$last_updated) {
            $last_time = $last_created->created_at;
        }

        return view('manufacturer', [
            'manufacturer' => $manufacturer,
            'products' => $products,
            'last_time' => $last_time
        ]);
    }

    public function delete(Manufacturer $manufacturer)
    {
        $products = $manufacturer->products()->get();

        if(!$products->isEmpty()) {
            return redirect()->back()->with('error', 'Manufacturer has products associated with it, cannot be deleted.');
        }

        $manufacturer = $manufacturer->delete();

        if(!$manufacturer) {
            return redirect()->back()->with('error', 'Failed to delete manufacturer.');
        }

        return redirect()->back()->with('success', 'Manufacturer deleted successfully.');
    }
}
