<style>
    .heading {
    clear: both;
}

.pbox {
    display: inline-block;
    margin: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.pbox img {
    width: 280px;
    height: 300px;
}

.details-btn {
        padding: 10px 20px;
        background-color: #401F71;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .details-btn:hover {
        background-color: #FDAF7B;
    }

.heart-broken-btn {
    width: 40px;
    height: 40px;
    background-color: transparent;
    border: none;
    cursor: pointer;
    position: relative;
}

.heart-broken-btn:before,
.heart-broken-btn:after {
    content: "";
    position: absolute;
    width: 20px;
    height: 5px;
    background-color: #ff6666;
    border-radius: 2px;
}

.heart-broken-btn:before {
    transform: rotate(-45deg);
}

.heart-broken-btn:after {
    transform: rotate(45deg);
}


</style>

<?php
    require_once 'connect.php';
    include 'header.php'; 
?>

<h1 class="heading" style="margin-top: 80px;">Favourite Products</h1>

<?php

$query = "SELECT DISTINCT favourite.pid, products.name, products.image 
FROM favourite 
INNER JOIN products ON favourite.pid = products.pid";

$result = mysqli_query($conn, $query);

// Check if there are any favorite products
if (mysqli_num_rows($result) > 0) {
    // Loop through the results and display each product
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['pid'];
        $productName = $row['name'];
        $productImage = $row['image'];
?>
<div class="pbox">
    <img src="images/<?php echo $productImage; ?>" alt="Product Image">        
    <h3><?php echo $productName; ?></h3>     
    <form action="deletefav.php" method="POST">
        <input type="hidden" name="productId" value="<?php echo $productId; ?>">
        <button type="submit" class="heart-broken-btn"></button>
    </form>
    <a href="products.php?id=<?php echo $productId; ?>"><button type="button" class="details-btn">View Details</button></a>
    <br><br>
</div>
<?php
    }
} else {
    // Display a message if there are no favorite products
    echo "<h2>No favorite products found.</h2>";
}
?>