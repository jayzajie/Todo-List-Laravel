<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }
    .container {
        margin-top: 50px;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
        background-color: #5A67D8;
        color: #fff;
        transition: background-color 0.3s ease;
    }
    .btn-custom:hover {
        background-color: #434190;
    }
    .btn-primary, .btn-danger {
        border-radius: 50px;
        transition: transform 0.2s ease;
    }
    .btn-primary:hover, .btn-danger:hover {
        transform: scale(1.1);
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s ease;
    }
    .modal-content {
        border-radius: 20px;
        padding: 20px;
    }
    .footer {
        background-color: #f1f1f1;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
        text-align: center;
        border-top: 1px solid #ddd;
    }
</style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <span class="text-muted">Created By @jayzie / Muhammad Surya Wijaya</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
