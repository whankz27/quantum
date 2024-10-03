<?php
// Memulai session
session_start();

// Mengecek apakah pengguna sudah login dan memiliki peran admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa; /* Warna latar belakang yang lembut */
        }
        .container {
            margin-top: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 4px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Admin Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <p class="card-text">View and manage user accounts.</p>
                        <a href="manage_users.php" class="btn btn-custom">Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Articles</h5>
                        <p class="card-text">View and Manage Articles</p>
                        <a href="manage_content.php" class="btn btn-custom">Manage Articles</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
