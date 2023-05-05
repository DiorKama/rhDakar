<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index()
    {
        // users = User::all();
       

        return view('admin.users.index', [
            'users' => User::paginate(15)
        ]);
    }

    public function delete(User $user)
    {
       $user->delete();
       return redirect('admin/user/index');
    }

     public function edit(User $user) {
        $managers = User::whereNull('manager_id')->get();
        return view("admin.users.edit")
            ->with('status', 'Modification réussie')
            ->with(compact("user", "managers"));
    }

     public function update(Request $request, User $user)
     {
         $user->title = $request->input('title');
         $user->firstName= $request->input('firstName');
         $user->lastName= $request->input('lastName');
         $user->email= $request->input('email');
         $user->phone_number = $request->input('phone_number');
         $user->position = $request->input('position');
         $user->manager_id = (int)$request->input('manager') ;
          $user->update() ;
          return redirect('admin/user/index'); 
     }

     public function show(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function create()
    {
        $managers = User::whereNull('manager_id')->get();
        return view('admin.users.create',compact('managers'));
    }

    public function store(StoreUserRequest $request)
    {
       
        $validated = $request->validated();

        $user = new User;
        $user->title = Arr::get($validated, 'title');
        $user->firstName = Arr::get($validated, 'firstName');
        $user->lastName = Arr::get($validated, 'lastName');
        $user->email = Arr::get($validated, 'email');
        $user->password = Arr::get($validated, 'password');
        $user->phone_number = Arr::get($validated, 'phone_number');
        $user->position = Arr::get($validated, 'position');
        $user->manager_id = Arr::get($validated, 'manager_id');
        $user->save() ; 
       
        return redirect('admin/user/index');
    }
}
