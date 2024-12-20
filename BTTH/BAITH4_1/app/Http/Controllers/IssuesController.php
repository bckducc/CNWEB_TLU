<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function index()
    {
        $issue = Issues::with('computer')->paginate(10);

        return view('issue.index', compact('issue'));
    }

    public function create()
    {
        $computer = Computer::all(); 
        return view('issue.create', compact('computer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);

        Issues::create($request->all());

        return redirect()->route('issue.index')->with('success', 'Máy tính được thêm thành cồng!');
    }

    public function edit($id)
    {
        $issue = Issues::findOrFail($id);
        $computer = Computer::all();
        return view('issue.edit', compact('issue', 'computer'));
    }

    public function update(Request $request, $id) {
        // Kiểm tra dữ liệu đầu vào (validation)
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required|max:50',
            'reported_date' => 'required|datetime',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ]);
    
        $issue = Issues::find($id);
        
        // Cập nhật thông tin
        $issue->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('issue.index')->with('success', 'Máy tính đươc cập nhập thành cồng!');
    }
    
    public function destroy($id)
    {
        $issue = Issues::findOrFail($id);
        $issue->delete();

        return redirect()->route('issue.index')->with('success', 'Máy tính được xóa thành công!');
    }
}
