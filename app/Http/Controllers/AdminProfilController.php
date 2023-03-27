<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProfilUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminProfilController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::guard('admin')->user();
          $firstName = $user->name ?: 'Abdoulaye'; // utilise la valeur par défaut "John Doe" si le champ "name" est vide
          return view('profilAdmin.edit', ['user' => $user, 'name' => $firstName]);
        
    }

    /**
     * Update the user's profile information.
     */
    public function update(AdminProfilUpdateRequest $request): RedirectResponse
    {
        //dd(Auth::guard('admin')->user());

        $admin = Auth::guard('admin')->user();

        $admin->fill($request->validated());

        //dd($admin->isDirty('email'));

        /*if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }*/

        $admin->save();

        return Redirect::route('profile.admin.edit')->with('status', 'Votre profil a été modifié');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::guard('admin')->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
