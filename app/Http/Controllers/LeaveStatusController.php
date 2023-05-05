<?php

namespace App\Http\Controllers;

use App\Models\LeaveStatus;
use Illuminate\Http\Request;

class LeaveStatusController extends Controller
{
    public function index(){
        $leaveStatuses = LeaveStatus::paginate(5);
    
        return view('admin.leaveStatuses.index', ['leaveStatuses' => $leaveStatuses]); 
    }

    public function edit(LeaveStatus $leaveStatus)
    {
        return view(
            'admin.leaveStatuses.edit',
            [
                'leaveStatus' => $leaveStatus,
            ]
        );
    } 
    
    public function update(Request $request, LeaveStatus $leaveStatus)
  {
    
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'active' => 'boolean',
    ]);

    $leaveStatus->update([
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        'active' => isset($validatedData['active']) && $validatedData['active'] == '1',
    ]);

            return redirect('admin/leaveStatus/index');
        }

        public function delete(LeaveStatus $leaveStatus)
        {
            $leaveStatus->delete();
            return redirect()->route('admin.leaveStatus.index');
        } 
        
        public function show(LeaveStatus $leaveStatus)
        {
            return view('admin.leaveStatuses.show', ['leaveStatus' => $leaveStatus]);
        }

        public function create()
        {
            
            return view('admin.leaveStatuses.create');
        }
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required',
                'active' => 'boolean',
            ]);
            $leaveStatuses = new LeaveStatus([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'active' => isset($validatedData['active']) ? $validatedData['active'] : false,
            ]);
            
            $leaveStatuses->save();
        
            return redirect('admin/leaveStatus/index');
        }
}
