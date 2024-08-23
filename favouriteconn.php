<?php
session_start();
require_once 'connect.php';
$user = $_SESSION['user'];

// Check if product ID is provided in the POST request
if(isset($_POST['pid'])) {
    // Get product ID from POST request
    $productId = $_POST['pid'];

    // Example query to insert data into favourite table
    $query = "INSERT INTO favourite (uid, pid) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Assuming you have a user ID stored in $userId variable
    $userId = 123; // Example user ID, replace with actual user ID
    mysqli_stmt_bind_param($stmt, "ii", $user, $productId);

    // Execute the prepared statement
    if(mysqli_stmt_execute($stmt)) {
        // Insertion successful
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        // Redirect to favourite.php
        echo '<script>alert("Item insert successfully!");
        window.location.href = "favourite.php";</script>';
    } else {
        // Insertion failed
        echo '<script>alert("Error inserting item...");
        window.location.href = "home.php";</script>';
        exit();
    }
}
?>
