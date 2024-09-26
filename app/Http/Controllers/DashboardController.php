<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboardPage()
    {
        // if(auth()->user()->role === 'admin') {
        //     return view('dashboard-admin', [
        //         'products' => Product::orderBy('name', 'asc')->get(),
        //     ]);
        // }

        return view('dashboard', [
            'products' => Product::orderBy('name', 'asc')->get(),
        ]);
    }
}
