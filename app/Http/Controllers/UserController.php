<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUserRole (Request $request) {

        $validated_data = $request->validate([
            'role' =>  ['required', 'string', 'in:ADMIN,VIEWER,EDITOR'],
            'confirmation' => ['required']
        ]);

        if(!$validated_data["confirmation"]) {
            return redirect()->back()->with('error', 'You must confirm the action');
        }

        if($validated_data['role'] === 'ADMIN' && $validated_data['confirmation'] === false) {
            return redirect()->back()->with('error', 'You cannot remove admin role from a user');
        }

        return redirect()->back()->with('success', 'User role updated successfully');
    }
}
