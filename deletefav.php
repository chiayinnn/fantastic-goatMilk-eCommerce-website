<?php
require_once 'connect.php';

    $productId = $_POST['productId'];

    $sql = "DELETE FROM favourite WHERE pid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script>alert("Item was remove from favourite T_T");
        window.location.href = "favourite.php";</script>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
?>
