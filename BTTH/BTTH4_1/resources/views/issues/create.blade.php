<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Thêm Báo Cáo Vấn Đề</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 50px auto;
        }
        h1 {
            text-align: center;
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        label {
            font-weight: bold;
            color: #495057;
        }
        textarea.form-control {
            resize: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm Báo Cáo Vấn Đề Mới</h1>
        <form action="{{ route('issues.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="computer_id" class="form-label">Máy tính</label>
                <select class="form-control" id="computer_id" name="computer_id" required>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->computer_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="reported_by" class="form-label">Người báo cáo</label>
                <input type="text" class="form-control" id="reported_by" name="reported_by" required>
            </div>
            <div class="mb-3">
                <label for="reported_date" class="form-label">Ngày báo cáo</label>
                <input type="date" class="form-control" id="reported_date" name="reported_date" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả vấn đề</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="urgency" class="form-label">Mức độ ưu tiên</label>
                <select class="form-control" id="urgency" name="urgency" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Resolved">Resolved</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Thêm Báo Cáo</button>
        </form>
    </div>
</body>
</html>
