<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h1>Your cart is empty.</h1>";
    echo '<a href="shop.php">Continue Shopping</a>';
    exit;
}

$total = 0;
?>

<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Edit</td>
                    <td>Remove</td>
                    <!-- <td>Edit</td> -->
                </tr>
            </thead>
   
            <tbody>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><img src="admin/upload/<?php  echo $item['image'] ?>" alt="product1"></td>
                    <td><?php echo $item['title'] ?></td>
                    <td><?php echo $item['description'] ?></td>
                    <td><?php echo $item['quantity'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><?php echo $item['price'] * $item['quantity']; ?></td>
                    
                    <!-- <td></td> -->
                    
                    <!-- Remove any cart item  -->
                    <td><button type="submit"  class="btn btn-primary">edit</button></td>
                    <td><button type="submit"  class="btn btn-danger">Remove</button></td>
                    
                </tr>
                <?php $total += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </tbody>
            <h3>Total: $<?php echo $total; ?></h3>
            <a href="shop.php">Continue Shopping</a>
            <!-- confirm order  -->
            <td><button type="submit" name="" class="btn btn-success">Confirm</button></td>
            
        </table>
    </section>

    

    <!-- <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$118.25</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$118.25</strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section> -->

    <?php include "footer.php" ?>

