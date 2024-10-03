<?php
// login.php

// Memasukkan konfigurasi database
include 'connect/config.php';

// Variabel untuk menyimpan pesan kesalahan
$error_message = "";

// Mengecek jika form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = MD5($_POST['password']); // Menggunakan MD5 untuk password

    // Menciptakan query untuk mengecek user
    $sql = "SELECT id, username, role FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    // Mengecek jika user ditemukan
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $role);
        $stmt->fetch();

        // Set session untuk login
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect berdasarkan role
        if ($role == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: users.php");
        }
        exit(); // Pastikan script berhenti setelah redirect
    } else {
        $error_message = "Username atau password salah.";
    }

    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c757d, #e9ecef); /* Gradien abu-abu yang lembut */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 400px;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .error {
            color: #dc3545;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <?php if ($error_message): ?>
                <p class='error'><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
