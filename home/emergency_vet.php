<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
include('db_con.php'); 
// Query to fetch 
$sql = "SELECT id, logo, name, description,location, contact_number FROM hospital";
$result = $connection->query($sql);
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect | Emergency Veterinary Hospitals</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Pet Shop, Pets, Pet Care, Animal Lovers" name="keywords">
    <meta content="Your one-stop destination for all things pet care." name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
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
                <a href="doctors.php" class="nav-item nav-link">Doctors</a>
                <a href="product.php" class="nav-item nav-link">Shop</a>
                <a href="adoption.php" class="nav-item nav-link">Adoption</a>
                <a href="lostpet.php" class="nav-item nav-link">Missing</a>
                <a href="emergency_vet.php" class="nav-item nav-link">Clinics</a>
               

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                    <div class="dropdown-menu m-0">
                       <a href="faq.php" class="dropdown-item">Frequently asked questions</a>
                        <a href="resources.php" class="dropdown-item">Resources</a>
                        
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


    <!-- Page Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <h1 class="display-3 text-uppercase text-white mb-3">Emergency Veterinary Hospitals</h1>
            <div class="d-inline-flex text-white">
                <a class="text-white text-decoration-none" href="index.html">Home</a>
                <i class="bi bi-arrow-right text-white"></i>
                <span class="text-white">Emergency Veterinary Hospitals</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Emergency Veterinary Hospitals Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <h2 class="text-center mb-5">Find an Emergency Veterinary Hospital Near You</h2>
            <div class="row g-4">

                <!-- Hospital 1 -- Add more hospitals as needed -->

                <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-6 col-lg-4 mb-4">';
                echo '    <div class="card h-100">';
                echo '        <img src="../admin/uploads/product/' . $row['logo'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                echo '        <div class="card-body">';
                echo '            <h5 class="card-title">' . $row['name'] . '</h5>';
                echo '            <p class="card-text"><i class="bi bi-geo-alt-fill text-primary me-2"></i>' . $row['location'] . '</p>';
                echo '            <p class="card-text"><i class="bi bi-telephone-fill text-primary me-2"></i>' . $row['contact_number'] . '</p>';
                echo '            <p class="card-text">' . $row['description'] . '</p>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';
            }
        } else {
            echo '<p>No hospitals found.</p>';
        }
        ?>

            </div>
        </div>
    </div>
    <!-- Emergency Veterinary Hospitals End -->

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
                    <h4 class="text-uppercase mb-4">Get In Touch</h4>
                    <p class="mb-2"><i class="bi bi-geo-alt me-2"></i>123 Pet Lane, City, Country</p>
                    <p class="mb-2"><i class="bi bi-phone me-2"></i>+123 456 789</p>
                    <p class="mb-0"><i class="bi bi-envelope me-2"></i>info@petshop.com</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-6 col-lg-3">
                    <h4 class="text-uppercase mb-4">Quick Links</h4>
                    <a class="d-block mb-2" href="about.html">About Us</a>
                    <a class="d-block mb-2" href="service.html">Services</a>
                    <a class="d-block mb-2" href="product.html">Products</a>
                    <a class="d-block mb-2" href="blog.html">Blog</a>
                    <a class="d-block mb-2" href="contact.html">Contact Us</a>
                </div>

                <!-- Follow Us -->
                <div class="col-md-6 col-lg-3">
                    <h4 class="text-uppercase mb-4">Follow Us</h4>
                    <a class="d-block mb-2" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-linkedin me-2"></i>LinkedIn</a>
                </div>

                <!-- Subscribe Now -->
                <div class="col-md-6 col-lg-3">
                    <h4 class="text-uppercase mb-4">Subscribe Now</h4>
                    <p>Subscribe to our newsletter for the latest updates on pet care and exclusive offers!</p>
                    <div class="position-relative">
                        <input class="form-control border-0" type="email" placeholder="Your Email" required>
                        <button class="btn btn-primary position-absolute top-0 end-0">Subscribe</button>
                    </div>
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
</body>

</html>
