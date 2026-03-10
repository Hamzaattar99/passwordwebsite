<?php
// لا يوجد منطق خلفي هنا لأن التوليد سيتم عبر JavaScript
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- الخط -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- CSS العام -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- CSS خاص بالصفحة -->
    <link href="assets/css/generator.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<section class="generator-section py-5">
    <div class="container">
        <br>        
        <h2 class="text-center fw-bold mb-4">
            Secure Password Generator
        </h2>

        <div class="card generator-card p-4">

            <!-- طول كلمة المرور -->
            <div class="mb-3">
                <label class="form-label">Password Length</label>
                <input type="range" min="6" max="32" value="12" id="lengthRange" class="form-range">
                <div class="text-end">
                    <span id="lengthValue">12</span> characters
                </div>
            </div>

            <!-- خيارات التوليد -->
            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeUpper" checked>
                        <label class="form-check-label">Uppercase Letters</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeLower" checked>
                        <label class="form-check-label">Lowercase Letters</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeNumbers" checked>
                        <label class="form-check-label">Numbers</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="includeSymbols">
                        <label class="form-check-label">Symbols</label>
                    </div>
                </div>
            </div>

            <!-- زر التوليد -->
            <div class="d-grid mb-3">
                <button class="btn btn-primary" id="generateBtn">
                    Generate Password
                </button>
            </div>

            <!-- عرض النتيجة -->
            <div class="input-group">
                <input type="text" id="generatedPassword" class="form-control" readonly>
                <button class="btn btn-outline-secondary" id="copyBtn">
                    <i class="bi bi-clipboard"></i>
                </button>
            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Shared JS -->
<script src="assets/js/main.js"></script>
<script src="assets/js/nav.js"></script>

<!-- Page JS -->
<script src="assets/js/generator.js"></script>
</body>
</html>