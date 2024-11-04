<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
include('db_con.php'); 
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the user is logged in
if (!isset($_SESSION['usr'])) {
    echo '<script>location.replace("product.php");</script>';
    exit();
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the product ID from the form
    $product_id = mysqli_real_escape_string($connection, $_POST['submit']);
    $user_id = $_SESSION['usr']; 

    $sq = mysqli_query($connection, "SELECT * FROM users WHERE email = '$user_id'");
    if (!$sq) {
        die("Query failed: " . mysqli_error($connection));
    }

    if ($sq->num_rows > 0) {
        $dat = mysqli_fetch_array($sq);
        $name = $dat['name'];
        $email = $dat['email'];
        $number = $dat['contact_number'];
        $address = $dat['address'];
        $place = $dat['place'];
        $pincode = $dat['pincode'];
        $state = $dat['state'];
        $id = $dat['id'];
    } else {
        echo "No records found for this user.";
    }

    $sql = mysqli_query($connection, "SELECT * FROM product WHERE id = '$product_id'");
    if (!$sql) {
        die("Query failed: " . mysqli_error($connection));
    }

    if ($sql->num_rows > 0) {
        $data = mysqli_fetch_array($sql);
        $pname = $data['name'];
        $price = $data['price'];
    } else {
        echo "No products found with this ID.";
    }
} else {
    echo "<script>location.replace('product.php');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PetConnect | Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
   
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand ms-lg-5">
            <h1 class="m-0 text-uppercase text-dark"><i class="bi bi-paw fs-1 text-primary me-3"></i>PetConnect</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="product.php" class="nav-item nav-link">Shop</a>
                <?php if (isset($_SESSION['usr'])): ?>
                    <a href="../user/index.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">DASHBOARD<i class="bi bi-arrow-right"></i></a>
                <?php else: ?>
                    <a href="usr_Login.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">SIGNUP<i class="bi bi-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Checkout Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <h1 class="display-5 text-uppercase text-center mb-5">Checkout</h1>
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">User Details</h4>
        <form method="POST" action="order.php">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $name;?>"id="fullname" placeholder="John Doe" required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address"value="<?php echo $address;?>" id="address" placeholder="123 Pet Lane" required>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="city"value="<?php echo $place;?>" id="city" placeholder="New York" required>
                        </div>
                        <div class="col-md-4">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" name="state"value="<?php echo $state;?>" id="state" placeholder="New York" required>
                        </div>
                        <div class="col-md-2">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" name="pincode" class="form-control" value="<?php echo $pincode;?>" id="zip" placeholder="10001" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $email;?>" placeholder="john.doe@example.com" readonly required>
                        </div>
                        <div class="col-12">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-control" id="phone" value="<?php echo $number;?>" placeholder="+1 234 567 8901" required>
                        </div>
                    </div>
               
                </div>

                <!-- Order Details -->
                <div class="col-lg-6">
                    <h4 class="text-uppercase mb-4">Your Order</h4>
                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $pname; ?></td>
                                    <td><input type="number" name="quantity" class="form-control" value="1" min="1" max="10" id="quantity" onchange="updateTotal()"></td>
                                    <td id="productPrice"><?php echo $price; ?></td>
                                    <td><input type="hidden" name="price"value="<?php echo $price; ?>"></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Total</td>
                                    <td></td>
                                    <td class="fw-bold" id="totalPrice">$<?php echo $price; ?></td>
                                    <input type="hidden" name="product_id"value="<?php echo $product_id; ?>">
                                    <td><input type="hidden" name="product_name"value="<?php echo $pname; ?>"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                       <!-- Payment Method -->
                <h4 class="text-uppercase mb-4">Payment Method</h4>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="cod" value="cod" checked>
                        <label class="form-check-label" for="cod">
                            Cash on Delivery
                        </label>
                    </div>                 
                </div>
                <button type="submit" name="placeOrder" class="btn btn-primary">Place Order</button>
             </div>
        </form>
            </div>
        </div>
    </div>

    <script>
        function updateTotal() {
            const quantity = parseInt(document.getElementById('quantity').value);
            const price = parseFloat(document.getElementById('productPrice').innerText);
            const total = quantity * price;
            document.getElementById('totalPrice').innerText = `$${total.toFixed(2)}`;
        }
    </script>
</body>
</html>


    <!-- Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h6 class="text-dark text-uppercase">Special Offer</h6>
                        <h1 class="display-5 text-uppercase text-white mb-0">Save 50% on your first order!</h1>
                    </div>
                    <p class="text-white mb-4">Don’t miss out on our amazing deals! Enjoy a 50% discount on all items for your first order. Explore our range of products designed to keep your pets happy and healthy.</p>
                    <a href="product.html" class="btn btn-light py-md-3 px-md-5 me-3">Shop Now</a>
                    <a href="about.html" class="btn btn-outline-light py-md-3 px-md-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Footer Start -->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Get In Touch -->
                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Get In Touch</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Pet Lane, City, Country</p>
                    <p class="mb-2"><i class="bi bi-phone text-primary me-2"></i>+123 456 789</p>
                    <p class="mb-0"><i class="bi bi-envelope text-primary me-2"></i>info@petshop.com</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Quick Links</h5>
                    <a class="d-block mb-2" href="about.html">About Us</a>
                    <a class="d-block mb-2" href="service.html">Services</a>
                    <a class="d-block mb-2" href="product.html">Products</a>
                    <a class="d-block mb-2" href="blog.html">Blog</a>
                    <a class="d-block mb-2" href="contact.html">Contact Us</a>
                </div>

                <!-- Follow Us -->
                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Follow Us</h5>
                    <a class="d-block mb-2" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-linkedin me-2"></i>LinkedIn</a>
                </div>

                <!-- Newsletter -->
                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Subscribe Now</h5>
                    <p>Subscribe to our newsletter for the latest updates on pet care and exclusive offers!</p>
                    <form action="">
                        <div class="input-group">
                            <input type="email" class="form-control border-0" placeholder="Your Email" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>

                <!-- Footer Bottom Links -->
                <div class="col-12 text-center text-body mt-4">
                    <a class="text-body me-3" href="terms.html">Terms & Conditions</a>
                    <span>|</span>
                    <a class="text-body mx-3" href="privacy.html">Privacy Policy</a>
                    <span>|</span>
                    <a class="text-body mx-3" href="support.html">Customer Support</a>
                    <span>|</span>
                    <a class="text-body mx-3" href="payments.html">Payments</a>
                    <span>|</span>
                    <a class="text-body mx-3" href="help.html">Help</a>
                    <span>|</span>
                    <a class="text-body mx-3" href="faq.html">FAQs</a>
                </div>
            </div>
        </div>
    </footer>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">PetConnect</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white" href="#">PetConnect</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Additional JavaScript for Payment Method Toggle -->
   
</body>

</html>
