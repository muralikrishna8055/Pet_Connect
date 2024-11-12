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



    <!-- Terms and Conditions Start -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Terms and Conditions</h2>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card p-4">
                    <h4 class="mb-3">1. Introduction</h4>
                    <p>Welcome to PetConnect! These terms and conditions outline the rules and regulations for the use of PetConnect's Website.</p>

                    <h4 class="mb-3">2. Acceptance of Terms</h4>
                    <p>By accessing this website we assume you accept these terms and conditions. Do not continue to use PetConnect if you do not agree to take all of the terms and conditions stated on this page.</p>

                    <h4 class="mb-3">3. Intellectual Property Rights</h4>
                    <p>
                        Unless otherwise stated, PetConnect and/or its licensors own the intellectual property rights for all material on PetConnect. All intellectual property rights are reserved. You may access this from PetConnect for your own personal use subjected to restrictions set in these terms and conditions.
                    </p>

                    <h4 class="mb-3">4. Restrictions</h4>
                    <p>You are specifically restricted from all of the following:</p>
                    <ul>
                        <li>Publishing any Website material in any other media;</li>
                        <li>Selling, sublicensing and/or otherwise commercializing any Website material;</li>
                        <li>Using this Website in any way that is or may be damaging to this Website;</li>
                        <li>Using this Website in any way that impacts user access to this Website;</li>
                        <li>Using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</li>
                        <li>Engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</li>
                        <li>Using this Website to engage in any advertising or marketing.</li>
                    </ul>

                    <h4 class="mb-3">5. Your Content</h4>
                    <p>
                        In these Website Standard Terms and Conditions, "Your Content" shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant PetConnect a non-exclusive, worldwide irrevocable, sublicensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.
                    </p>

                    <h4 class="mb-3">6. No warranties</h4>
                    <p>
                        This Website is provided "as is," with all faults, and PetConnect expresses no representations or warranties, of any kind related to this Website or the materials contained on this Website. Additionally, nothing contained on this Website shall be interpreted as advising you.
                    </p>

                    <h4 class="mb-3">7. Limitation of liability</h4>
                    <p>
                        In no event shall PetConnect, nor any of its officers, directors and employees, be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract. PetConnect, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
                    </p>

                    <h4 class="mb-3">8. Indemnification</h4>
                    <p>
                        You hereby indemnify to the fullest extent PetConnect from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.
                    </p>

                    <h4 class="mb-3">9. Severability</h4>
                    <p>
                        If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein.
                    </p>

                    <h4 class="mb-3">10. Variation of Terms</h4>
                    <p>
                        PetConnect is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.
                    </p>

                    <h4 class="mb-3">11. Assignment</h4>
                    <p>
                        PetConnect is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
                    </p>

                    <h4 class="mb-3">12. Entire Agreement</h4>
                    <p>
                        These Terms constitute the entire agreement between PetConnect and you in relation to your use of this Website, and supersede all prior agreements and understandings.
                    </p>

                    <h4 class="mb-3">13. Governing Law & Jurisdiction</h4>
                    <p>
                        These Terms will be governed by and interpreted in accordance with the laws of the State of [Your State], and you submit to the non-exclusive jurisdiction of the state and federal courts located in [Your State] for the resolution of any disputes.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Terms and Conditions End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">Connect with fellow pet lovers, find resources, and ensure the well-being of your pets through our supportive community.</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>456 Pet Lane, Animal City</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>info@petconnect.com</p>
                    <p class="mb-2"><i class="bi bi-telephone text-primary me-2"></i>(123) 456-7890</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <a class="d-block mb-2" href="index.html">Home</a>
                    <a class="d-block mb-2" href="about.html">About Us</a>
                    <a class="d-block mb-2" href="lost-pets.html">Lost & Found Pets</a>
                    <a class="d-block mb-2" href="rehoming.html">Rehome Pets</a>
                    <a class="d-block mb-2" href="blog.html">Blog</a>
                    <a class="d-block" href="contact.html">Contact Us</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Resources</h5>
                    <a class="d-block mb-2" href="resources.html#nutrition">Pet Nutrition</a>
                    <a class="d-block mb-2" href="resources.html#care">Pet Care</a>
                    <a class="d-block mb-2" href="resources.html#health">Medical Health</a>
                    <a class="d-block mb-2" href="vet-consultations.html">Veterinary Consultations</a>
                    <a class="d-block mb-2" href="resources.html#guides">Guides</a>
                    <a class="d-block" href="faq.html">FAQs</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Newsletter</h5>
                    <p class="mb-4">Subscribe to our newsletter to receive updates and tips on pet care.</p>
                    <form action="subscribe.html" method="post">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control p-3" placeholder="Your Email" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
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
