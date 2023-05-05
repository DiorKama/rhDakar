<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AppointmentType;

class AppointmentTypeController extends Controller
{
    public function index(){
        return view(
            'admin.appointmentTypes.index',
            [
                'appointmentTypes' => AppointmentType::paginate(5),
            ]
        ); 

    }

    public function create()
    {
        
        return view('admin.appointmentTypes.create');
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
            'active' => isset($validatedData['active']) ? $validatedData['active'] : false,
        ]);
        
        $appointmentTypes->save();
    
        return redirect('admin/appointmentType/index');
    }
    
    public function edit(AppointmentType $appointmentType)
        {
            // $appointmentTypes = AppointmentType::find($id);

            return view(
                'admin.appointmentTypes.edit',
                [
                    'appointmentType' => $appointmentType,
                ]
            );
        }

 public function update(Request $request, AppointmentType $appointmentType)
  {
    // $appointmentTypes = AppointmentType::findOrFail($id);
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'active' => 'boolean',
    ]);

    $appointmentType->update([
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
