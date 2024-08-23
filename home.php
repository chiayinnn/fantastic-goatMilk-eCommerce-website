<style>
    #product {
        padding: 20px;
        text-align: center;
    }

    .heading {
        margin-bottom: 20px;
    }

    .pbox {
        display: inline-block;
        margin: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .pbox img {
        width: 280px;
        height: 300px;
    }

    .pcontent {
        padding: 10px;
    }

    .pcontent h3 {
        font-size: 18px;
    }

    .pcontent button {
        padding: 10px 20px;
        background-color: #401F71;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .pcontent button:hover {
        background-color: #FDAF7B;
    }

    .buttons {
        display: flex;
        justify-content: center; 
    }

    .heart-btn,
    .pcontent button {
        margin-left: 10px;
    }

    .heart-btn {
        background-color: transparent;
        border: none;
        cursor: pointer;
        font-size: 15px;
        color: #ff0000; /* Adjust color as needed */
    }

    .heart-btn:hover {
        color: #ff3333; /* Adjust hover color as needed */
    }
</style>

<?php include 'header.php'; ?>

<!--header section ends-->

<!--home section start-->

<section class="home" id="home">

    <div class="content">
        <h3>fresh goat Milk</h3>
        <span>100% natural & organic</span>
        <p>fresh and delicious</p>
        <a href="#product" class="btn">shop now</a>
    </div>
</section>

<!--home section ends-->

<!--about section starts-->
<section class="about" id="about">

    <h1 class="heading">about us</h1>

    <div class="row">
        <div class="video-container">
            <video src="images/IMG_0935.MP4" loop autoplay muted></video>
            <h3>Your best goat milk choice</h3>
        </div>

        <div class="content">
        <h3>why choose us?</h3>
        <p>
            Prepare nutritious and delicious 100% pure fresh goat milk for your family
        </p>
        <p>No mutton smell, no preservatives, no colour</p>
        <p>High in calcium and protein to increase immunity and reduce allergies</p>
        <a href="#" class="btn">learn more</a>
        </div>
        
    </div>
</section>
<!--about section end-->

<!--icons section starts-->

<section class="icons-container">

    <div class="icons">
    <img src="c:\Users\AcerNitro5\Documents\CAP image\vector-delivery-truck-icon 1.jpg" alt="">
        <div class="info">
            <h3>free delivery</h3>
            <span>selected area</span>
        </div>
    </div>

    <div class="icons">
        <img src="https://th.bing.com/th/id/OIP.pqjo2OZfln_eVHxSLEoJawHaHa?rs=1&pid=ImgDetMain" alt="">
        <div class="info">
            <h3>5 days refund</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="https://th.bing.com/th/id/OIP.P_ZPqB7-ZEEdugX8r6hBzwAAAA?w=250&h=250&rs=1&pid=ImgDetMain" alt="">
        <div class="info">
            <h3>offer & gift</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="https://i.pinimg.com/originals/ec/2e/aa/ec2eaa18dfbaef7ad250d0f750bb4b1b.jpg" alt="">
        <div class="info">
            <h3>secure payment</h3>
            <span>multi payemnt method</span>
        </div>
    </div>
</section>
<!--icons section ends-->

<!--product section start-->

<section id="product">
    <h1 class="heading">All Products</h1>
    <?php
    require_once 'connect.php';

    // Query to fetch the first three products from the database
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query); 

    // Loop through the results and display each product
    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['pid'];
        $ProductName = $row['name'];
        $price = $row['price'];
        $discount = $row['discount']; 
        $image = $row['image'];
    ?>
    <div class="pbox">
        <img src="images/<?php echo $image; ?>" alt="<?php echo $ProductName; ?>">
        
        <div class="pcontent">
            <h3><?php echo $ProductName; ?></h3>
            <div class="buttons">
                <form action="favouriteconn.php" method="POST">
                    <input type="hidden" name="pid" value="<?php echo $productId; ?>">
                    <button type="submit" class="heart-btn"><i class="fas fa-heart"></i></button>
                </form>
                <a href="products.php?id=<?php echo $productId; ?>"><button type="button">View Details</button></a>
            </div>
        </div>

    </div>
    <?php
    }
    ?>
</section>

 <!--products section end-->

<!--review section start-->

<section class="reviews" id="reviews">

    <h1 class="heading"> customer's <span>review</span></h1>

    <div class="box box-container">

        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Good delivery service</p>
            <div class="user">
                <img src="images/avator photo.png " alt="">
                <div class="user-info">
                    <h3>username</h3>
                    <span> happy customer </span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>

        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>I was quite pleased with the goat's milk I received!</p>
            <div class="user">
            <img src="images/avator photo.png " alt="">
                <div class="user-info">
                    <h3>username</h3>
                    <span> happy customer </span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>

        <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>My child loves their yogurt goat milk very much. We'll buy it again next time</p>
            <div class="user">
                <div class="user-info">
                <img src="images/avator photo.png " alt="">
                    <h3>username</h3>
                    <span> happy customer </span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>

    </div>
</section>
<!--review section end-->

<!--contact us section start-->
<section class="contact" id="contact">
    <h1 class="heading">contact details </h1>
            <div class="box-container">
    
                <div class="box">
                    <i class="fas fa-map-marker-alt"></i>
                    <div>
                        <h4>address</h4>
                        <p>Jalan Johor,86100 Ayer Hitam</p>
                    </div>
                </div>
    
                <div class="box">
                    <i class="fas fa-phone"></i>
                    <div>
                        <h4>phone number</h4>
                        <p>+60 12-234 567</p>
                    </div>
                </div>
    
                <div class="box">
                    <i class="fas fa-envelope"></i>
                    <div>
                        <h4>email</h4>
                        <p>goatthemilk@gmail.com</p>
                    </div>
                </div>
    
            </div>
</section>

<!--contact us section end-->


<!--footer section start-->

<section class="footer">

    <div class="box-container">
      
        <div class="box">
            <h3>quick links</h3>
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#products">products</a>
            <a href="#reviews">review</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#user">my account</a>
            <a href="#cart">my order</a>
            <a href="#favorite">my favorite</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <p>Ayer Hitam</p>
            <p>Simpang Renggam</p>
            <p>Johor Bahru</p>
            <p>Penang</p>
        </div>

        <div class="box">
            <h3>Newsletter</h3>
            <p>Sign Up for Newsletter</p>
            <div class="social-links">
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-whatsapp"></i>
            </div>
        </div>
    </div>
</section>

<!--footer section end-->

<!--my favorite section start-->

<section class="#favorite" id=" ">


    
</section>
<!--my favorite section ends-->
</body>
</html>