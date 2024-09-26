<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboardPage()
    {
        return view('dashboard', [
            'products' => Product::orderBy('name', 'asc')->get(),
        ]);
    }

    public function viewAdminDashboardPage(Request $request)
    {
        $selected = $request->query('selected', 'products');
        // if(!auth()->check()) {
        //     return redirect()->route('login');
        // }

        // if(auth()->user()->role !== 'admin') {
        //     return redirect()->route('dashboard');
        // }

        return view('admins.dashboard', [
            'products' => Product::orderBy('name', 'asc')->get(),
            'selected' => $selected,
        ]);
    }
}
