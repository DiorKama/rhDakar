<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentType;

class AppointmentTypeController extends Controller
{
    public function index(){
        $appointmentTypes = AppointmentType::all();
        return view('admin.appointmentTypes.index',compact('appointmentTypes')); 

    }

    public function create()
    {
        $appointmentTypes = AppointmentType::all();
        return view('admin.appointmentTypes.create',compact('appointmentTypes'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'active' => 'boolean',
        ]);
    
        $appointmentTypes = new AppointmentType([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'active' => isset($validatedData['active']) && $validatedData['active'] == '1',
        ]);
        
        $appointmentTypes->save();
    
        return redirect('admin/appointmentType/index');
    }
    
    public function edit($id)
        {
            $appointmentTypes = AppointmentType::find($id);

            return view('admin.appointmentTypes.edit', compact('appointmentTypes'));
        }

 public function update(Request $request, $id)
  {
    $appointmentTypes = AppointmentType::findOrFail($id);
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'active' => 'boolean',
    ]);

    $appointmentTypes->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'active' => isset($validatedData['active']) && $validatedData['active'] == '1',
    ]);

            return redirect('admin/appointmentType/index');
        }


        public function delete(AppointmentType $appointmentType)
        {
            $appointmentType->delete();
            return redirect()->route('admin.appointmentType.index');
        }

        public function show(AppointmentType $appointmentType)
        {
            return view('admin.appointmentTypes.show', ['appointmentType' => $appointmentType]);
        }
}
