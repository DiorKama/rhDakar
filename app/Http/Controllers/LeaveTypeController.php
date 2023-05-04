<?php

namespace App\Http\Controllers;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index(){
        $leaveTypes = LeaveType::all();
        return view('admin.leaveType.index',compact('leaveTypes')); 

    }

    public function create()
    {
        $leaveTypes = LeaveType::all();
        return view('admin.leaveType.create',compact('leaveTypes'));
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
            'active' => isset($validatedData['active']) && $validatedData['active'] == '1',
        ]);
        
        $leaveTypes->save();
    
        return redirect('admin/leaveType/index');
    }
    
    public function edit($id)
        {
            $leaveTypes = LeaveType::find($id);

            return view('admin.leaveType.edit', compact('leaveTypes'));
        }

 public function update(Request $request, $id)
  {
    $leaveTypes = LeaveType::findOrFail($id);
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'active' => 'boolean',
    ]);

    $leaveTypes->update([
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
