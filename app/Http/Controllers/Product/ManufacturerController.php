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
}
