<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản lý vấn đề máy tính</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Liên kết Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/style_index.css') }}" rel="stylesheet">
    <script src="{{ asset('js/javascript.js') }}"></script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2><b>Quản lý phòng thực hành</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('issues.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm mới</span></a>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Mã vấn đề</th>
                            <th>Tên máy tính</th>
                            <th>Tên phiên bản</th>
                            <th>Người báo cáo sự cố</th>
                            <th>Thời gian báo cáo</th>
                            <th>Mức độ sự cố</th>
                            <th>Trạng thái hiện tại</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($issues as $issue)
                            <tr>
                                <td>{{ $issue->id }}</td>
                                <td>{{ $issue->computer->computer_name }}</td>
                                <td>{{ $issue->computer->model}}</td>
                                <td>{{ $issue->reported_by }}</td>
                                <td>{{ $issue->reported_date }}</td>
                                <td>{{ $issue->urgency }}</td>
                                <td>{{ $issue->status }}</td>
                                <td>
                                    <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary">Sửa</a>
            
                                    <!-- Nút xóa kèm modal xác nhận -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $issue->id }}">
                                        Xóa
                                    </button>
            
                                    <!-- Modal xác nhận xóa -->
                                    <div class="modal fade" id="deleteModal{{ $issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $issue->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $issue->id }}">Xác nhận xóa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa báo cáo này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="{{ route('issues.destroy', $issue->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </table>
                {{-- Phân trang nếu cần --}}
                <div class="d-flex justify-content-center">
                    {{ $issues->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>        
    </div>
</body>
</html>