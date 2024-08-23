<?php
    session_start();
    require_once 'connect.php';

    $pid = $_POST['pid'];
    $quantity = $_POST['quantity'];
    $user = $_SESSION['user'];

    $scan = "SELECT cid FROM cart WHERE cart.uid = ? AND cart.pid = ?";
    $stmt2 = $conn->prepare($scan);
    $stmt2->bind_param("ii", $user, $pid);
    $stmt2->execute();
    $result = $stmt2->get_result();
    if($result->num_rows > 0){
        echo '<script>alert("Product already in cart!);
        window.location.href = "home.php";</script>';
    }else{
    $sql = "INSERT INTO cart (uid, pid, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $user, $pid, $quantity);
    $stmt->execute();
    echo '<script>alert("Product Added Successfully!!! ");
    window.location.href = "cart.php";</script>';
    exit();
    }
?>