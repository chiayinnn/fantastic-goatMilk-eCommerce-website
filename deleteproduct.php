<?php
    require_once 'connect.php';

    $cart = $_POST['cid'];

    $sql = "DELETE FROM cart WHERE cid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $cart);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<script>alert("Record deleted successfully!! Mehhhhhh~~~");
            window.location.href = "cart.php";</script>';
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
?>