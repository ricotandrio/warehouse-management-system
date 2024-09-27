<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function viewCreateTransactionPage()
    {
        return view('forms.create-transaction', [
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function create(Request $request) 
    {

    }
}
