<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    // Hiển thị danh sách các báo cáo vấn đề CÓ PHÂN TRANG
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10); 
        return view('issues.index', compact('issues'));
    }

    // Hiển thị form tạo báo cáo vấn đề mới
    public function create()
    {
        $computers = Computer::all(); 
        return view('issues.create', compact('computers'));
    }

    // Lưu báo cáo vấn đề mới
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id', 
            'reported_by' => 'required|max:50', 
            'reported_date' => 'required|date',
            'description' => 'required', 
            'urgency' => 'required|in:Low,Medium,High', 
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Báo cáo vấn đề đã được thêm thành công!');
    }

    // Hiển thị form chỉnh sửa báo cáo vấn đề
    public function edit($id)
    {
        $issue = Issue::findOrFail($id); 
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    // Cập nhật thông tin báo cáo vấn đề
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|max:50',
            'reported_date' => 'nullable|date',
            'description' => 'nullable',
            'urgency' => 'nullable|in:Low,Medium,High',
            'status' => 'nullable|in:Open,In Progress,Resolved',
        ]);

        $issue = Issue::findOrFail($id);
        $issue->update($request->all());

        return redirect()->route('issues.index')->with('success', 'Báo cáo vấn đề được cập nhật thành công!');
    }

    // Xóa báo cáo vấn đề
    public function destroy($id)
    {
        $issue = Issue::findOrFail($id); 
        $issue->delete();

        return redirect()->route('issues.index')->with('success', 'Báo cáo vấn đề đã được xóa thành công!');
    }
}
