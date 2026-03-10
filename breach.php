<?php
// لا يوجد منطق خلفي هنا - الفحص سيتم عبر AJAX
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Breach Checker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- الخط -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS العام -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- CSS خاص بالصفحة -->
    <link href="assets/css/breach.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<section class="breach-section py-5">
    <div class="container">
        <br>
        <h2 class="text-center fw-bold mb-4">
            Password Breach Checker
        </h2>

        <div class="card breach-card p-4">

            <!-- إدخال كلمة المرور -->
            <div class="mb-3">
                <label class="form-label">Enter Password</label>
                <input type="password" id="passwordInput" class="form-control form-control-lg hero-input" placeholder="Password to check">
            </div>

            <!-- زر الفحص -->
            <div class="d-grid mb-3">
                <button class="btn btn-primary btn-lg hero-btn" id="checkBtn">
                    Check Breach
                </button>
            </div>

            <!-- عرض النتيجة -->
            <div id="resultBox" class="mt-3"></div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Shared JS -->
<script src="assets/js/main.js"></script>
<script src="assets/js/nav.js"></script>

<!-- Page JS -->
<script src="assets/js/breach.js"></script>
</body>
</html>