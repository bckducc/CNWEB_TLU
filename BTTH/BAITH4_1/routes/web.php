<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssuesController;

// Đường dẫn hiển thị danh sách đồ án (trang chủ)
Route::get('/', [IssuesController::class, 'index'])->name('issue.index');

// Đường dẫn để tạo mới một đồ án (hiển thị form thêm mới)
Route::get('/issue/create', [IssuesController::class, 'create'])->name('issue.create');

// Đường dẫn để lưu dữ liệu đồ án mới (thực hiện thêm mới)
Route::post('/issue', [IssuesController::class, 'store'])->name('issue.store');

// Đường dẫn để hiển thị chi tiết một đồ án cụ thể (tuỳ chọn)
Route::get('/issue/{id}', [IssuesController::class, 'show'])->name('issue.show');

// Đường dẫn để chỉnh sửa thông tin đồ án (hiển thị form chỉnh sửa)
Route::get('/issue/{id}/edit', [IssuesController::class, 'edit'])->name('issue.edit');

// Đường dẫn để cập nhật thông tin đồ án (thực hiện cập nhật)
Route::put('/issue/{id}', [IssuesController::class, 'update'])->name('issue.update');

// Đường dẫn để xóa đồ án (thực hiện xóa sau khi có modal xác nhận)
Route::delete('/issue/{id}', [IssuesController::class, 'destroy'])->name('issue.destroy');
