<?php
// start the session so we can access session variables
session_start();

// retrieve the password that was stored earlier when the user
// submitted the form. Use null coalesce in case it isn't set.
$password = $_SESSION['password_to_analyze'] ?? '';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detailed Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Global CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link href="assets/css/nav.css" rel="stylesheet"> -->

    <!-- Page CSS -->
    <link href="assets/css/report.css" rel="stylesheet">
</head>
<body>

<?php include 'includes/nav.php'; ?>

<section class="report-section py-5">
    <div class="container">
        <br>
        <h2 class="text-center fw-bold mb-4">
            Password Analysis Report
        </h2>

        <!-- Summary Card -->
        <!-- Displays the plain-text password (escaped) along with the
             calculated length and entropy which will be filled by JavaScript. -->
        <div class="card report-card p-4 mb-4">
            <h5 class="mb-3">Summary</h5>
            <p><strong>Password:</strong> <?php echo htmlspecialchars($password); ?></p>
            <p><strong>Length:</strong> <span id="lengthValue">0</span></p>
            <p><strong>Entropy Score:</strong> <span id="entropyValue">0</span></p>
            <p><strong>Stregth Level:</strong> <span id="aiScore"></span></p>

            <!-- visual strength bar updated based on entropy -->
            <div class="progress mt-3">
                <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%">
                </div>
            </div>
        </div>

        <!-- Chart Card -->
        <!-- The chart below will display how many of each character
             type (letters, numbers, symbols, etc.) appear in the password. -->
        <div class="card report-card p-4">
            <h5 class="mb-3">Character Distribution</h5>
            <canvas id="charChart"></canvas>
        </div>

    </div>
</section>

<footer class="footer-section text-center py-4">
    <div class="container">
        <small>© <?php echo date("Y"); ?> PasswordSec</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // transfer the password from PHP to the front-end JS code. addslashes
    // ensures quotes/non-printables are escaped in the string literal.
    const passwordFromPHP = "<?php echo addslashes($password); ?>";
</script>

<script src="assets/js/re.js"></script>

</body>
</html>