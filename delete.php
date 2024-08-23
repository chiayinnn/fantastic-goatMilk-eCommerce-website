<?php
    session_start();
    require_once 'connect.php';

    $user = $_SESSION['user'];

    $sql = "DELETE FROM cart WHERE cart.uid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo '<script>alert("Payment Successfully!! Mehhhhhhhh~~");
        window.location.href = "home.php";</script>';
    }else{
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->cloce();
    $conn->close();
?>