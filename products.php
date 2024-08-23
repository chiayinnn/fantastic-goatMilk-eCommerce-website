<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }
        .product-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }
        .product-image {
            width: 100%;
            max-width: 400px;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 8px;
        }
        .product-details {
            text-align: center;
            margin: 20px 0;
        }
        .product-details h2 {
            margin-top: 0;
            color: #333;
        }
        .product-details p {
            margin: 5px 0;
            color: #666;
        }
        .add-to-cart-form {
            text-align: center;
        }
        .add-to-cart-form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .add-to-cart-form input[type="number"] {
            width: 60px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        .add-to-cart-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .add-to-cart-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="product-container">
        <?php
            require_once 'connect.php';
            include 'header.php'; 

            //$pid = $_POST['hidden input name'];
            $pid = $_GET['id'];

            $sql = "SELECT * FROM products WHERE pid = $pid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $fetch = $result->fetch_assoc();
        ?>
                <img class="product-image" src="images/<?php echo $fetch['image']; ?>" alt="Product Image">
                <div class="product-details">
                    <h2><?php echo $fetch['name']; ?></h2>
                    <p>Price: RM<?php echo $fetch['price']; ?></p>
                    <p>After Discount: RM<?php echo $fetch['discount']; ?></p>
                </div>
                <form class="add-to-cart-form" id="addcart" action="addtocart.php" method="POST">
                    <input type="hidden" name="pid" value="<?php echo $fetch['pid']; ?>">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" min="1" max="10" placeholder="0">
                    <button type="submit">Add to Cart</button>
                </form>
        <?php
            }
        ?>
    </div>
</body>
</html>
