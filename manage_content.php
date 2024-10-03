<?php
// manage_content.php

// Memulai session
session_start();

// Mengecek apakah pengguna sudah login dan memiliki peran admin
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
include 'connect/config.php';

// Variabel untuk menyimpan pesan
$message = "";

// Proses penambahan artikel
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_article'])) {
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $author = $_POST['author'];
    $preview = $_POST['preview'];
    $content = $_POST['content'];
    $seo_meta = $_POST['seo_meta'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];

    // Proses upload gambar
    $image = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image = 'uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
            // Gambar berhasil diupload
        } else {
            $message = "Gagal mengunggah gambar.";
        }
    }

    if ($title && $content) {
        $sql = "INSERT INTO articles (title, image, release_date, author, preview, content, seo_meta, category, tags) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $title, $image, $release_date, $author, $preview, $content, $seo_meta, $category, $tags);

        if ($stmt->execute()) {
            $message = "Artikel berhasil ditambahkan!";
        } else {
            $message = "Terjadi kesalahan saat menambahkan artikel.";
        }

        $stmt->close();
    } else {
        $message = "Judul dan konten artikel harus diisi.";
    }
}

// Proses pengeditan artikel
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM articles WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $article = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}

// Proses pembaruan artikel
// Proses pembaruan artikel
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_article'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $release_date = $_POST['release_date'];
    $author = $_POST['author'];
    $preview = $_POST['preview'];
    $content = $_POST['content'];
    $seo_meta = $_POST['seo_meta'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];

    // Proses upload gambar
    $image = $article['image']; // Gambar lama
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Hapus gambar lama jika ada
        if ($image && file_exists($image)) {
            unlink($image);
        }

        // Upload gambar baru
        $image = 'uploads/' . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
            // Gambar berhasil diupload
        } else {
            $message = "Gagal mengunggah gambar.";
        }
    }

    if ($title && $content) {
        // Inisialisasi ulang $stmt sebelum digunakan kembali
        $stmt = $conn->prepare("UPDATE articles SET title = ?, image = ?, release_date = ?, author = ?, preview = ?, content = ?, seo_meta = ?, category = ?, tags = ? WHERE id = ?");
        $stmt->bind_param("sssssssssi", $title, $image, $release_date, $author, $preview, $content, $seo_meta, $category, $tags, $id);

        if ($stmt->execute()) {
            $message = "Artikel berhasil diperbarui!";
            header("Location: manage_content.php");
            exit();
        } else {
            $message = "Terjadi kesalahan saat memperbarui artikel.";
        }

        $stmt->close();
    } else {
        $message = "Judul dan konten artikel harus diisi.";
    }
}


// Proses penghapusan artikel
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "SELECT image FROM articles WHERE id = ?";
    $stmt->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $image = $stmt->get_result()->fetch_assoc()['image'];
    $stmt->close();

    $sql = "DELETE FROM articles WHERE id = ?";
    $stmt->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Hapus file gambar jika ada
        if ($image && file_exists($image)) {
            unlink($image);
        }
        $message = "Artikel berhasil dihapus!";
    } else {
        $message = "Terjadi kesalahan saat menghapus artikel.";
    }

    $stmt->close();
}

// Mengambil daftar artikel
$sql = "SELECT id, title, image, release_date, author, preview FROM articles";
$result = $conn->query($sql);

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Articles</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/uzwdpduq7x4mfxtgqfl4issa7xuq5vx5noqz3muhd98uq7ym/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#content',
        menubar: false,
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      });
    </script>

    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin-top: 40px;
            max-width: 900px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #0066cc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #004a99;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            font-size: 14px;
            color: #666;
        }

        .alert-info {
            background-color: #e9f5ff;
            color: #31708f;
            border: 1px solid #bce8f1;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #0066cc;
            box-shadow: none;
        }

        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Articles</h1>
        
        <?php if ($message): ?>
            <div class="alert alert-info"><?php echo $message; ?></div>
        <?php endif; ?>

        <!-- Form untuk menambah atau mengedit artikel -->
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($article) ? $article['title'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <?php if (isset($article) && $article['image']): ?>
                    <img src="<?php echo $article['image']; ?>" alt="Article Image" width="100">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="<?php echo isset($article) ? $article['release_date'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo isset($article) ? $article['author'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="preview">Preview</label>
                <textarea class="form-control" id="preview" name="preview"><?php echo isset($article) ? $article['preview'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content"><?php echo isset($article) ? $article['content'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="seo_meta">SEO Meta</label>
                <input type="text" class="form-control" id="seo_meta" name="seo_meta" value="<?php echo isset($article) ? $article['seo_meta'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo isset($article) ? $article['category'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" value="<?php echo isset($article) ? $article['tags'] : ''; ?>">
            </div>
            <?php if (isset($article)): ?>
                <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
                <button type="submit" class="btn btn-secondary" name="update_article">Update Article</button>
            <?php else: ?>
                <button type="submit" class="btn btn-custom" name="add_article">Add Article</button>
            <?php endif; ?>
        </form>

        <hr>

        <!-- Daftar artikel -->
        <h2>Articles List</h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="row">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Article Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                <p class="card-text"><?php echo $row['preview']; ?></p>
                                <a href="manage_content.php?edit=<?php echo $row['id']; ?>" class="btn btn-secondary">Edit</a>
                                <a href="manage_content.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>No articles found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
