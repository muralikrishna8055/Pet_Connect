<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
include('db_con.php'); 

if (isset($_POST['submit'])) {
    // Sanitize input data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Encrypt the password
    $contact_number = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $place = mysqli_real_escape_string($connection, $_POST['place']);
    $pincode = mysqli_real_escape_string($connection, $_POST['pincode']);
    $state = mysqli_real_escape_string($connection, $_POST['state']);

    // Check if email already exists
    $checkEmailQuery = "SELECT id FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('This email is already registered. Please use a different email.');</script>";
    }  else {
        // Insert query
        $sql = "INSERT INTO users (name, email, password, contact_number, address, place, pincode, state) 
                VALUES ('$name', '$email', '$hashed_password', '$contact_number', '$address', '$place', '$pincode', '$state')";

        if (mysqli_query($connection, $sql)) {
            //header("Location: success.php"); // Redirect to a success page
            echo '<script>location.replace("usr_Login.php");</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }

    // Close the database connection
    mysqli_close($connection);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PetConnect - Login & Register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .form-container h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
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
                <a href="doctors.php" class="nav-item nav-link">Doctors</a>
                <a href="product.php" class="nav-item nav-link">Shop</a>
                <a href="adoption.php" class="nav-item nav-link">Adoption</a>
                <a href="lostpet.php" class="nav-item nav-link">Missing</a>
               

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                    <div class="dropdown-menu m-0">
                        <a href="appionment.php" class="dropdown-item">Appionment</a>
                        <a href="emergency_vet.php" class="dropdown-item">Emergency Vets</a>
                        <a href="faq.php" class="dropdown-item">Frequently asked questions</a>
                        <a href="resources.php" class="dropdown-item">Resources</a>
                        <a href="blog.php" class="dropdown-item">Blog</a>
                        <a href="terms.php" class="dropdown-item">Terms and Conditions</a>
                    </div>
                </div>
                <a href="service.php" class="nav-item nav-link">Our Services</a>
                <a href="about.php" class="nav-item nav-link">About Us</a>\
                <a href="contact.php" class="nav-item nav-link">ContactUs</a>
                <!--<a href="usr_Login.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">SIGNUP<i class="bi bi-arrow-right"></i></a>-->
                <?php if (isset($_SESSION['usr'])): ?>
                    <a href="../user/index.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">DASHBOARD<i class="bi bi-arrow-right"></i></a>
               <?php else: ?>
                  <a href="usr_Login.php" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">SIGNUP<i class="bi bi-arrow-right"></i></a>
               <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


<!-- Registration Form Start -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-container">
                <h3 class="text-uppercase mb-4 text-center">User Registration</h3>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="place" class="form-label">Place</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Enter your place" required>
                    </div>
                    <div class="mb-3">
                        <label for="pincode" class="form-label">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Enter your pincode" required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select" id="state" name="state" required>
                            <option value="">Select your state</option>
                            <option value="Alappuzha">Alappuzha</option>
                            <option value="Ernakulam">Ernakulam</option>
                            <option value="Idukki">Idukki</option>
                            <option value="Kannur">Kannur</option>
                            <option value="Kasaragod">Kasaragod</option>
                            <option value="Kollam">Kollam</option>
                            <option value="Kottayam">Kottayam</option>
                            <option value="Kozhikode">Kozhikode</option>
                            <option value="Malappuram">Malappuram</option>
                            <option value="Palakkad">Palakkad</option>
                            <option value="Pathanamthitta">Pathanamthitta</option>
                            <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                            <option value="Thrissur">Thrissur</option>
                            <option value="Wayanad">Wayanad</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
                    <p class="text-center mt-3">Already have an account? <a href="usr_Login.php">Sign in here</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Registration Form End -->

<!-- Footer Start -->
<div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">Connect with fellow pet lovers, find resources, and ensure the well-being of your pets through our supportive community.</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>456 Pet Lane, Animal City, USA</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>support@petconnect.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+123 456 7890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="index.html"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="about.html"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-body mb-2" href="lost-pets.html"><i class="bi bi-arrow-right text-primary me-2"></i>Lost & Found Pets</a>
                        <a class="text-body mb-2" href="rehoming.html"><i class="bi bi-arrow-right text-primary me-2"></i>Rehome Pets</a>
                        <a class="text-body mb-2" href="blog.html"><i class="bi bi-arrow-right text-primary me-2"></i>Blog</a>
                        <a class="text-body" href="contact.html"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Resources</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="resources.html#nutrition"><i class="bi bi-arrow-right text-primary me-2"></i>Pet Nutrition</a>
                        <a class="text-body mb-2" href="resources.html#care"><i class="bi bi-arrow-right text-primary me-2"></i>Pet Care</a>
                        <a class="text-body mb-2" href="resources.html#health"><i class="bi bi-arrow-right text-primary me-2"></i>Medical Health</a>
                        <a class="text-body mb-2" href="vet-consultations.html"><i class="bi bi-arrow-right text-primary me-2"></i>Veterinary Consultations</a>
                        <a class="text-body mb-2" href="resources.html#guides"><i class="bi bi-arrow-right text-primary me-2"></i>Guides</a>
                        <a class="text-body" href="faq.html"><i class="bi bi-arrow-right text-primary me-2"></i>FAQs</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Newsletter</h5>
                    <form action="subscribe.html" method="post">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control p-3" placeholder="Your Email" required>
                            <button class="btn btn-primary">Subscribe</button>
                        </div>
                    </form>
                    <h6 class="text-uppercase mt-4 mb-3">Follow Us</h6>
                    <div class="d-flex">
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-linkedin"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
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
    </div>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">PetConnect</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white" href="">PetConnect</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->



<!-- Bootstrap Bundle with Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
