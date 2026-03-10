<?php
// لا يوجد منطق خلفي الآن، مجرد صفحة معلومات
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About PasswordSec</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS عام -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- CSS خاص بالصفحة -->
    <link href="assets/css/about.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<?php include 'includes/nav.php'; ?>

<!-- Hero Section -->
<section class="hero-about d-flex align-items-center text-center py-5">
    <div class="container">
        <br><br>
        <h1 class="display-4 fw-bold mb-3">
            About PasswordSec
        </h1>
        <p class="lead mb-4">
            PasswordSec is designed to help users secure their passwords efficiently. 
            Analyze strength, generate secure passwords, and check for data breaches with ease.
        </p>
    </div>
</section>

<!-- Features Section -->
<section class="about-features py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card about-card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-shield-lock feature-icon"></i>
                    </div>
                    <h5 class="fw-bold">Security First</h5>
                    <p class="text-primary">
                        We prioritize your password security using advanced algorithms and AI.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="card about-card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-gear-fill feature-icon"></i>
                    </div>
                    <h5 class="fw-bold">Easy to Use</h5>
                    <p class="text-primary">
                        User-friendly interface ensures that everyone can secure their passwords easily.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="card about-card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-bar-chart-fill feature-icon"></i>
                    </div>
                    <h5 class="fw-bold">Insights & Analytics</h5>
                    <p class="text-primary">
                        Get detailed analysis of password strength and character composition.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer-section text-center py-4">
    <div class="container">
        <small>© <?php echo date("Y"); ?> PasswordSec. All rights reserved.</small>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/main.js"></script>
<script src="assets/js/nav.js"></script>

</body>
</html>