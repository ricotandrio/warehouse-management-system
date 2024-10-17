<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUserRole (Request $request, User $user) {

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

        $updated_user = $user->update([
            'role' => $validated_data['role']
        ]);

        if(!$updated_user) {
            return redirect()->back()->with('error', 'Failed to update user role');
        }

        return redirect()->back()->with('success', 'User role updated successfully');
    }

    public function viewUserProfilePage() {
        return view('profile', ['user' => auth()->user()]);  
    }
}
