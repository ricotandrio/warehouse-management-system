<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function viewCreateTransactionPage()
    {
        return view('forms.create-transaction', [
            'products' => Product::orderBy('name')->get(),
        ]);
    }

    public function create(Request $request) {
        $validated_request = $request->validate([
            'type' => ['required', 'string', 'in:IN,OUT'],
            'description' => ['string', 'nullable'],
        ]);

        $products = [];
        $quantities = [];

        /**
         * This is logic to loop entire request data that contains product 
         * and quantity data in format product#{product_id} and quantity#{product_id}
         */
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'product#') !== false) {
                $index = explode('#', $key)[1];
                $products[$index] = $value;
            }
            
            if (strpos($key, 'quantity#') !== false) {
                $index = explode('#', $key)[1];
                $quantities[$index] = $value;
            }
        }

        if (empty($products)) {
            return redirect()->back()->with('error', 'Please select at least one product.');
        }

        if (empty($quantities)) {
            return redirect()->back()->with('error', 'Please input quantity for each product.');
        }

        if (count($products) !== count($quantities)) {
            return redirect()->back()->with('error', 'Please input quantity for each product.');
        }
        
        $transaction_header = TransactionHeader::create([
            'type' => $validated_request['type'],
            'description' => $validated_request['description']
        ]);

        if (!$transaction_header) {
            return redirect()->back()->with('error', 'Failed to create transaction.');
        }

        foreach ($products as $index => $product) {
            if (!isset($quantities[$index])) {
                return redirect()->back()->with('error', 'Please input quantity for each product.');
            }

            if($transaction_header->type === "IN"){
                $product_update = Product::find($product);
                $product_update->update([
                    'stock_quantity' => $product_update->stock_quantity + $quantities[$index]
                ]);
            } else {
                $product_update = Product::find($product);
                $product_update->update([
                    'stock_quantity' => $product_update->stock_quantity - $quantities[$index]
                ]);
            }

            /**
             * fresh() is used to get the latest data from the database.
             * This is to ensure that the transaction header is already saved in the database.
             */
            TransactionDetail::create([
                'transaction_id' => $transaction_header->fresh()->id,
                'product_id' => $product,
                'quantity' => $quantities[$index]
            ]);

        }

        return redirect()->back()->with('success', 'Transaction created successfully.');
    }
}
