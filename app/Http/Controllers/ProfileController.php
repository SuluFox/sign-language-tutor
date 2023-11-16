<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    /** 
     * 
     */
    public function updateName(Request $request)
    {
        $user = User::find(Auth::user()->id); 

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user->update(['name' => $request->name]);

        return redirect()->route('profile')->with('success', 'Name updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $user =
        User::find(Auth::user()->id); 

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->update(['password' => Hash::make($request->new_password)]);
            return redirect()->route('profile')->with('success', 'Password updated successfully');
        } else {
            return redirect()->route('profile')->with('error', 'Current password is incorrect');
        }
    }
}