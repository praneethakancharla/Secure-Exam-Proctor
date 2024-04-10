<?php
// Replace these with your actual database details
$host = 'localhost';
$dbname = 'secureexamproctor';
$user = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password

try {
    // Establish a PDO database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect to the database. " . $e->getMessage());
}

if (isset($_GET['testid'])) {
    $testid = $_GET['testid'];

    // Use prepared statements to prevent SQL injection
    $stmt = $pdo->prepare("
        SELECT student_name, score, cheating_percentage
        FROM exam_results
        WHERE test_id = ?
    ");
    $stmt->execute([$testid]);

    // Fetch results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Display results in a table
    if (!empty($results)) {
        echo '<table border="1">';
        echo '<tr><th>Student Name</th><th>Score</th><th>Cheating Percentage</th></tr>';
        foreach ($results as $row) {
            echo "<tr><td>{$row['student_name']}</td><td>{$row['score']}</td><td>{$row['cheating_percentage']}</td></tr>";
        }
        echo '</table>';
    } else {
        echo 'No results found for the entered test ID.';
    }
}

// Close the database connection
$pdo = null;
?>
