<?php
include 'connect/config.php';

// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ambil ID artikel dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data artikel dari database
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $article = $result->fetch_assoc();
    $title = htmlspecialchars($article['title']);
    $release_date = htmlspecialchars(date('d F Y', strtotime($article['release_date'])));
    $author = htmlspecialchars($article['author']);
    $content = htmlspecialchars_decode($article['content']);
    // $image = !empty($article['image']) ? 'uploads/' . basename(htmlspecialchars($article['image'])) : 'uploads/default.jpg';
} else {
    die("Article not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags and CSS Links -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <title>Erdigma Indonesia</title>
    <link rel="icon" href="assets/img/erdigma.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/vendor/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>

    <!-- Header Section -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/erdigma.png" alt="">
                <h1>Erdigma</h1>
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="careers.php">Careers</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="article.php">Article</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header><!-- End Header -->

    <!-- Breadcrumbs -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/hero.jpeg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade"></div>
    </div><!-- End Breadcrumbs -->

    <!-- Article Detail Section -->
    <section id="article-detail" class="article-detail">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-item position-relative">
                        <div class="post-content">
                            <h3 class="post-title"><?php echo $title; ?></h3>
                            
                            <div class="meta d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <span class="ps-2"><a href="article.php"><i class="bi bi-arrow-left">Kembali</a></i></span>
                                </div>
                                <span class="ps-2">|</span>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person"></i> <span class="ps-2"><?php echo $author; ?></span>
                                </div>
                                <span class="ps-2">|</span>
                                <span class="ps-2"><?php echo $release_date; ?></span>
                            </div>
                            <div class="post-text mt-3">
                                <p><?php echo $content; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End article detail -->
        </div>
    </section><!-- End Article Detail Section -->

    <!-- Footer -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Erdigma Indonesia</h3>
                            <p>
                                Jl. Raya Mayjen Sungkono No.KM 5, Dusun 1, Blater, <br>
                                Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371 <br><br>
                                <strong>Phone:</strong> (0281) 8905948<br>
                                <strong>Email:</strong> career@erdigma.co.id<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <!--<a href="#" class="d-flex align-items-center justify-content-center" target="_blank"><i-->
                                <!--        class="bi bi-twitter"></i></a>-->
                                <a href="https://www.facebook.com/erdigma.id/"
                                    class="d-flex align-items-center justify-content-center" target="_blank"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/erdigma.id/" target="_blank"
                                    class="d-flex align-items-center justify-content-center"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/erdigma/mycompany/"
                                    class="d-flex align-items-center justify-content-center" target="_blank"><i
                                        class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->

                    <div class="col-lg-2 col-md-3 footer-links">

                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">

                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">

                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4></h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="careers.php">Careers</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    PT. Erhanesia Digima Mukitama
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>&copy; <span>Copyright</span> <strong class="px-1">UpConstruction</strong> <span>All Rights
                    Reserved</span>
            </p>
            <div class="credits">
                Designed by<a href="https://bimaaziri.com/">Bima Aziri</a>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos.js"></script>
    <script src="assets/vendor/glightbox.min.js"></script>
    <script src="assets/vendor/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter_vanilla.js"></script>
    <script src="assets/js/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

<script type="text/javascript">
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
            nav.classList.add('bg-dark', 'shadow');
        } else {
            nav.classList.remove('bg-dark', 'shadow');
        }
    });
</script>
</html>
