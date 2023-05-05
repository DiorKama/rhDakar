<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::paginate(5);
    
        return view('admin.leaveType.index', ['leaveTypes' => $leaveTypes]);
    }

    public function create()
    {
        return view('admin.leaveType.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'active' => 'boolean',
        ]);
        $leaveTypes = new LeaveType([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'active' => isset($validatedData['active']) ? $validatedData['active'] : false,

        ]);
        
        $leaveTypes->save();
    
        return redirect('admin/leaveType/index');
    }
    
    public function edit(LeaveType $leaveType)
        {
            // model binding
            //$leaveTypes = LeaveType::find($id);

            return view(
                'admin.leaveType.edit',
                [
                    'leaveType' => $leaveType,
                ]
            );
        }

 public function update(Request $request, LeaveType $leaveType)
  {
    //$leaveTypes = LeaveType::findOrFail($id);
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'active' => 'boolean',
    ]);

    $leaveType->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'active' => isset($validatedData['active']) && $validatedData['active'] == '1',
    ]);

            return redirect('admin/leaveType/index');
        }


        public function delete(LeaveType $leaveType)
        {
            $leaveType->delete();
            return redirect()->route('admin.leaveType.index');
        }

        public function show(LeaveType $leaveType)
        {
            return view('admin.leaveType.show', ['leaveType' => $leaveType]);
        }
}
