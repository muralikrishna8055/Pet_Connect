<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect</title>
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


   <!-- About Start -->
   <div class="container-fluid py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="border-start border-5 border-primary ps-5 mb-5">
                    <h6 class="text-primary text-uppercase">About Us</h6>
                    <h1 class="display-5 text-uppercase mb-0">Your Pet's Happiness is Our Priority</h1>
                </div>
                <h4 class="text-body mb-4">At Pet Shop, we believe every pet deserves love, care, and the best products. Our dedicated team is here to ensure your pets are always happy and healthy.</h4>
                
                                             
                
                
                <div class="bg-light p-4">
                    <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item w-50" role="presentation">
                            <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                aria-selected="true">Our Mission</button>
                        </li>
                        <li class="nav-item w-50" role="presentation">
                            <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                aria-selected="false">Our Vission</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                            <p class="mb-0">Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna</p>
                        </div>
                        <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                            <p class="mb-0">Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore. Amet erat amet et magna</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- About End -->



   


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
                    <a href="" class="btn btn-light py-md-3 px-md-5 me-3">Shop Now</a>
                    <a href="" class="btn btn-outline-light py-md-3 px-md-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

   

    <!-- Footer Start -->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3">
                    <h4 class="text-uppercase mb-4">Get In Touch</h4>
                    <p class="mb-2"><i class="bi bi-geo-alt me-2"></i>123 Pet Lane, City, Country</p>
                    <p class="mb-2"><i class="bi bi-phone me-2"></i>+123 456 789</p>
                    <p class="mb-2"><i class="bi bi-envelope me-2"></i>info@petshop.com</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="text-uppercase mb-4">Quick Links</h4>
                    <a class="d-block mb-2" href="about.html">About Us</a>
                    <a class="d-block mb-2" href="service.html">Services</a>
                    <a class="d-block mb-2" href="product.html">Products</a>
                    <a class="d-block mb-2" href="blog.html">Blog</a>
                    <a class="d-block mb-2" href="contact.html">Contact Us</a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="text-uppercase mb-4">Follow Us</h4>
                    <a class="d-block mb-2" href="#">Facebook</a>
                    <a class="d-block mb-2" href="#">Twitter</a>
                    <a class="d-block mb-2" href="#">Instagram</a>
                    <a class="d-block mb-2" href="#">LinkedIn</a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="text-uppercase mb-4">Subscribe Now</h4>
                    <p>Subscribe to our newsletter for the latest updates on pet care and exclusive offers!</p>
                    <div class="position-relative">
                        <input class="form-control border-0" type="text" placeholder="Your email">
                        <button class="btn btn-primary position-absolute top-0 end-0">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
