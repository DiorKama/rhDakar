<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules\Password;

class AdminPasswordController extends Controller
{
    
    /**
     * Update the user's password.
     */
    
      public function update(Request $request): RedirectResponse
     {
        $validated = $request->validate([
            'password' => ['required', Password::defaults(), 'confirmed'],
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::guard('admin')->user()->password)) {
                    return $fail(__('Le mot de passe actuel est incorrect.'));   
                }
            }]
        ]);
        
        $test = Auth::guard('admin')->user()->update([
        'password' => Hash::make($validated['password']), 
           ]);
            
            return back()->with('status', 'Votre mot de passe est modifié');
    }

     

}