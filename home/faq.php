<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PetConnect - Terms and Conditions</title>
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


    <!-- FAQ Section -->
    <div class="container mt-5">
        <h1 class="mb-4">Frequently Asked Questions</h1>
        
        <div class="accordion" id="faqAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            What is the adoption process?
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                    <div class="card-body">
                        The adoption process involves filling out an application, meeting the pet, and completing an adoption contract.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How can I rehome my pet?
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                    <div class="card-body">
                        To rehome your pet, please fill out the rehoming form on our website, and our team will assist you.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Are there adoption fees?
                        </button>
                    </h2>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, there may be adoption fees that help cover the costs of vaccinations, spaying/neutering, and other care.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFour">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            What types of pets do you have available for adoption?
                        </button>
                    </h2>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                    <div class="card-body">
                        We have a variety of pets including dogs, cats, rabbits, and other small animals looking for forever homes.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingFive">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Can I adopt a pet if I live in an apartment?
                        </button>
                    </h2>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                    <div class="card-body">
                        Yes, many of our pets can adapt well to apartment living. It's best to check with our staff for specific pet needs.
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingSix">
                    <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            How do I prepare for a new pet?
                        </button>
                    </h2>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#faqAccordion">
                    <div class="card-body">
                        Preparing for a new pet includes ensuring you have the necessary supplies, a safe environment, and time to spend with your new companion.
                    </div>
                </div>
            </div>
        </div>
    </div>

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


<!-- Back to Top -->
<a href="#" class="btn btn-primary py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
