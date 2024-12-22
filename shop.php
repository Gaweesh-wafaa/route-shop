
<?php include 'header.php' ?>
<?php include 'navbar.php' ;
include "dbConnection.php";?>
<?php
session_start();

// Initialize the cart if not already done
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}



// Handle "Add to Cart" form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Fetch product details
    $sql = "SELECT * FROM products WHERE id = $productId";
    // $result = $conn->query($sql);
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        // Check if product already exists in the cart
        $found = false;
        foreach ($_SESSION['cart'] as $item) {
            if ($item['id'] == $productId) {
                $item['quantity'] += $quantity; // Increment quantity
                $found = true;
                break;
            }
        }

        if (!$found) {
            // Add new product to the cart
            $_SESSION['cart'][] = [
                'id' => $product['id'],
                'image' => $product['image'],
                'title' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'quantity' => $quantity,
            ];
        }

        echo "<p style='color:green;'>Product added to cart successfully!</p>";
    } else {
        echo "<p style='color:red;'>Product not found!</p>";
    }
}

?>


    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>
        <div class="pro-container">

        <?php 
        $selectProducts ="select * from `products`";
        $runSelectProducts=mysqli_query($conn,$selectProducts);
        $resultProducts=mysqli_fetch_all($runSelectProducts,MYSQLI_ASSOC);

        if(count($resultProducts)>0)
        {
            foreach($resultProducts as $product)
            { ?>
                <div class="pro">
                <!-- <form> -->
                <img src="admin/upload/<?php echo $product['image'] ;?>" alt="p1" />
                    <div class="des">
                    <h2><?php echo $product['name']; ?></h2>
                        <h5><?php echo $product['description']; ?></h5>
                        <div class="star ">
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star "></i>
                        </div>
                        <h4><?php echo $product['price']; ?></h4>
                        <!-- <input type="number" name="quantity"> -->
                        <!-- <button type="submit" name="submit"><a class="cart "><i class="fas fa-shopping-cart "></i></a></button> -->
                        <form method="post" action="">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <input type="number" name="quantity" min="1" value="1" required>
                            <button type="submit">Add to Cart</button>
                        </form>
                        </div>
                    </div>

            <?php }
        }
        ?>
                        
            </div>
        </div>
    </section>
    


    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

<p><a href="cart.php">View Cart</a></p>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.php' ?>
