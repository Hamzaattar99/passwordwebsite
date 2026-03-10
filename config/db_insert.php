<?php
// simple helper for storing analysis results; assumes caller has
// already included/required this file or will use its functions.

require_once __DIR__ . '/db.php';

/**
 * Insert a password report and its associated analysis into the
 * database.  The schema is assumed to have two tables:
 *
 *   reports (id AUTO_INCREMENT, pssword_hash, hash_type)
 *   analysis (id AUTO_INCREMENT, report_id, length,
 *             has_uppercase, has_lowercase, has_numbers,
 *             has_symbols, entropy_score, strength_level)
 *
 * @param string $password   Plain text password (will be hashed)
 * @param array  $analysis   Associative array containing the
 *                           numerical fields listed above.
 */
function store_analysis_record(string $password, array $analysis)
{
    global $conn;

    if (!isset($conn) || $conn->connect_error) {
        // connection not available, bail silently
        return;
    }

    // create report entry
    $hash      = hash('sha256', $password);
    $hash_type = 'sha256';

    $stmt = $conn->prepare(
        "INSERT INTO reports (password_hash, hash_type) VALUES (?, ?)"
    );
    if ($stmt) {
        $stmt->bind_param('ss', $hash, $hash_type);
        $stmt->execute();
        $report_id = $stmt->insert_id;
        $stmt->close();
    } else {
        return;
    }


    // تحويل الحقول العددية إلى 0 أو 1 حسب وجودها
    $has_uppercase = !empty($analysis['features']['num_upper']) ? 1 : 0;
    $has_lowercase = !empty($analysis['features']['num_lower']) ? 1 : 0;
    $has_numbers   = !empty($analysis['features']['num_digits']) ? 1 : 0;
    $has_symbols   = !empty($analysis['features']['num_special']) ? 1 : 0;



    // insert analysis row
    $stmt = $conn->prepare(
        "INSERT INTO analysis (report_id, length, has_uppercase, has_lowercase, has_numbers, has_symbols, entropy_score, strength_level) " .
        "VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
    );

    if ($stmt) {
        $stmt->bind_param(
            'iiiiiddi',
            $report_id,
            $analysis['features']['length'],
            $has_uppercase,
            $has_lowercase,
            $has_numbers,
            $has_symbols,
            $analysis['entropy'],
            $analysis['strength_label']
        );
        $stmt->execute();
        $stmt->close();
    }
}
