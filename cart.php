<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            margin-top: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .cancel-button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .cancel-button:hover {
            background-color: #cc0000;
        }
        #billing-info {
            margin-top: 20px;
            display: none;
            border: 1px solid #dddddd;
            padding: 20px;
            background-color: #f9f9f9;
        }
        #billing-info h2 {
            margin-top: 0;
        }
        #payment {
            padding: 5px;
            width: 100%;
            font-size: 16px;
        }
        #payment-button {
            background-color: #29a6d2;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        #payment-button:hover {
            background-color: #45a049;
        }
    </style>
<body>
    <div class="container">
    <h1>Cart List</h1>
    <table id="cart-list" border="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price per unit (RM)</th>
                <th>Quantity</th>
                <th>Cancel Product</th>
                <th>Total Price (RM)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            require_once 'connect.php';
            include 'header.php'; 
            if (!isset($_SESSION['user'])) {
                echo "<script>alert('Please login to view product details.'); window.close();";
                echo 'window.location.href = "home.php";</script>';
                exit();
            }

            $user = $_SESSION['user'] ;
            $finalprice = 0;
            $totalprice = 0;
            $no = 1;

            $sql = "SELECT * FROM cart INNER JOIN products ON cart.pid = products.pid WHERE cart.uid = ? AND cart.quantity > 0";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $priceunit = $row['discount'];
                    $totalprice = $priceunit * $row['quantity'];
                    $finalprice += $totalprice;
                    ?>

                    <tr onclick="window.location.href = 'product.php?id=<?php echo $row['pid']; ?>';" style="cursor: pointer;"> 
                    <?php
                    echo "<td>{$no}</td>";
                    echo "<td><img src='images/" . $row['image'] . "' width='100' height='100'></td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>". number_format($priceunit, 2) . "</td>";
                    echo "<td>{$row['quantity']}</td>";
                    echo "<td>";?>
                    <form action = "deleteproduct.php" method="POST">
                            <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>">
                            <button type="submit">Cancel</button>
                        </form>
                    <?php echo "</td>";
                    echo "<td>" . number_format($totalprice, 2) . "</td>";
                    ?>
                    </tr>
                    <?php

                    $no++;
                }
                echo "<tr>";
                echo "<td colspan='6' style='text-align: right;'>Total</td>";
                echo "<td>". number_format($finalprice, 2) . "</td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='7'>No items in the cart.</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table><br/><br/>
    <button onclick="togglePaymentSection()">Proceed</button>
        <div id="billing-info">
            <h2>Payment Information</h2>
            <hr>
            <form id="billingForm" action="delete.php" method="POST">
                <label for="payment">Pay by:</label>
                <select name="payment" id="payment">
                    <option value="Debit">Debit</option>
                    <option value="Credit">Credit</option>
                </select>
                <br>
                <button id="payment-button" type="submit">Pay</button>
            </form>
        </div>
    </div>
    <script>
        function togglePaymentSection() {
            var billingInfo = document.getElementById("billing-info");
            billingInfo.style.display = "block";
        }
    </script>
</body>
</html>