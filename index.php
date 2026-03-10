<?php
// لا يوجد منطق خلفي الآن
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Security - Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link href="assets/css/nav.css" rel="stylesheet">  -->
</head>
<body>

<!-- Navbar -->
<?php include 'includes/nav.php'; ?>  <!-- استخدام الملف المستقل -->

<!-- Hero Section -->
<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">
            Secure Your Passwords with Confidence
        </h1>
        <p class="lead mb-4">
            Analyze strength, calculate entropy, generate secure passwords, and check for breaches.
        </p>

        <!-- Form لادخال الباسورد -->
        <form id="passwordForm" class="d-flex flex-column flex-md-row justify-content-center gap-2" method="POST" action="report.php">
            <input type="password" name="password" class="form-control form-control-lg hero-input" placeholder="Enter a password to analyze" required>
            <button type="submit"  class="btn btn-primary btn-lg hero-btn">
                Analyze Now
            </button>
        </form>
    </div>
</section>

<!-- Features Section -->
<section class="features-section py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card feature-card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-graph-up feature-icon"></i>
                    </div>
                    <h5 class="fw-bold">Detailed Analysis</h5>
                    <p class="text-primary">
                        View length, character diversity, entropy score, and strength level.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="card feature-card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-key-fill feature-icon"></i>
                    </div>
                    <h5 class="fw-bold">Password Generator</h5>
                    <p class="text-primary">
                        Create strong, randomized passwords with customizable options.
                    </p>
                </div>
            </div>

            <div class="col">
                <div class="card feature-card h-100 text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-shield-exclamation feature-icon"></i>
                    </div>
                    <h5 class="fw-bold">Breach Checker</h5>
                    <p class="text-primary">
                        Check if your password has appeared in known data breaches.
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
<script src="assets/js/nav.js"></script> <!-- Navbar JS منفصل -->

</body>
</html>