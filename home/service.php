<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect - Resources</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Connect with a community dedicated to the well-being of pets." name="description">
    <meta content="PetConnect, Pets, Resources, Veterinarians, Shelters, Pet Care" name="keywords">

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

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Our Features</h6>
                <h1 class="display-5 text-uppercase mb-0">Comprehensive PetConnect Services</h1>
            </div>
            <!-- Services Grid -->
            <div class="row g-5">
                <!-- Service Item 1 -->
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi bi-geo-alt-fill display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Lost & Found Pets</h5>
                            <p>Quickly post about lost pets and help the community in search and recovery efforts.</p>
                            <a class="text-primary text-uppercase" href="lost-pets.html">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Service Item 2 -->
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi bi-house-fill display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Rehome Pets</h5>
                            <p>Find new loving homes for pets through our streamlined rehoming platform.</p>
                            <a class="text-primary text-uppercase" href="rehoming.html">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Service Item 3 -->
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi bi-heart-fill display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Veterinary Consultations</h5>
                            <p>Connect with veterinary professionals for expert advice and treatment options.</p>
                            <a class="text-primary text-uppercase" href="vet-consultations.html">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Service Item 4 -->
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi bi-journal-text display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Pet Care Guides</h5>
                            <p>Access comprehensive guides on pet nutrition, grooming, training, and overall care.</p>
                            <a class="text-primary text-uppercase" href="pet-care-guides.html">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Service Item 5 -->
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi bi-chat-dots-fill display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Community Support</h5>
                            <p>Join our community to share experiences, ask questions, and support fellow pet owners.</p>
                            <a class="text-primary text-uppercase" href="community.html">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Service Item 6 -->
                <div class="col-md-6">
                    <div class="service-item bg-light d-flex p-4">
                        <i class="bi bi-calendar-check-fill display-1 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Pet Adoption Events</h5>
                            <p>Stay updated with upcoming pet adoption events and find your new best friend.</p>
                            <a class="text-primary text-uppercase" href="adoption-events.html">Read More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-testimonial py-5" style="margin: 45px 0;">
        <div class="container py-5">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel bg-white p-5">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-4">
                                <img class="img-fluid mx-auto rounded-circle" src="img/testimonial-1.jpg" alt="Client 1">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                    <i class="bi bi-chat-square-quote text-primary"></i>
                                </div>
                            </div>
                            <p>PetConnect has been a lifesaver in finding our lost dog. The community is incredibly supportive and responsive.</p>
                            <hr class="w-25 mx-auto">
                            <h5 class="text-uppercase">Jane Doe</h5>
                            <span>Pet Owner</span>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-4">
                                <img class="img-fluid mx-auto rounded-circle" src="img/testimonial-2.jpg" alt="Client 2">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                                    <i class="bi bi-chat-square-quote text-primary"></i>
                                </div>
                            </div>
                            <p>The veterinary consultations on PetConnect provided us with excellent advice for our pet's health concerns.</p>
                            <hr class="w-25 mx-auto">
                            <h5 class="text-uppercase">John Smith</h5>
                            <span>Veterinary Professional</span>
                        </div>
                        <!-- Add more testimonials as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Pricing Plan Start -->
    <!-- (Optional: Uncomment and update if needed) -->
    <!--
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Pricing Plan</h6>
                <h1 class="display-5 text-uppercase mb-0">Competitive Pricing For Pet Services</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="bg-light text-center pt-5 mt-lg-5">
                        <h2 class="text-uppercase">Basic</h2>
                        <h6 class="text-body mb-5">The Best Choice</h6>
                        <div class="text-center bg-primary p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>49<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/
                                    Mo</small>
                            </h1>
                        </div>
                        <div class="text-center p-4">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Basic Support</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Access to Resources</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Community Access</span>
                                <i class="bi bi-x fs-4 text-danger"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Monthly Webinars</span>
                                <i class="bi bi-x fs-4 text-danger"></i>
                            </div>
                            <a href="" class="btn btn-primary text-uppercase py-2 px-4 my-3">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light text-center pt-5">
                        <h2 class="text-uppercase">Standard</h2>
                        <h6 class="text-body mb-5">The Best Choice</h6>
                        <div class="text-center bg-dark p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>99<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/
                                    Mo</small>
                            </h1>
                        </div>
                        <div class="text-center p-4">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Priority Support</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Unlimited Resources</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Community Access</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Monthly Webinars</span>
                                <i class="bi bi-x fs-4 text-danger"></i>
                            </div>
                            <a href="" class="btn btn-primary text-uppercase py-2 px-4 my-3">Order Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light text-center pt-5 mt-lg-5">
                        <h2 class="text-uppercase">Extended</h2>
                        <h6 class="text-body mb-5">The Best Choice</h6>
                        <div class="text-center bg-primary p-4 mb-2">
                            <h1 class="display-4 text-white mb-0">
                                <small class="align-top"
                                    style="font-size: 22px; line-height: 45px;">$</small>149<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/
                                    Mo</small>
                            </h1>
                        </div>
                        <div class="text-center p-4">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>24/7 Support</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>All Resources</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Community Access</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <span>Monthly Webinars</span>
                                <i class="bi bi-check2 fs-4 text-primary"></i>
                            </div>
                            <a href="" class="btn btn-primary text-uppercase py-2 px-4 my-3">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- Pricing Plan End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <!-- Get In Touch -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Get In Touch</h5>
                    <p class="mb-4">Connect with fellow pet lovers, find resources, and ensure the well-being of your pets through our supportive community.</p>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>456 Pet Lane, Animal City, USA</p>
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>support@petconnect.com</p>
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+123 456 7890</p>
                </div>
                <!-- Quick Links -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="index.html"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                        <a class="text-body mb-2" href="about.html"><i class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                        <a class="text-body mb-2" href="resources.html"><i class="bi bi-arrow-right text-primary me-2"></i>Resources</a>
                        <a class="text-body mb-2" href="veterinarians.html"><i class="bi bi-arrow-right text-primary me-2"></i>Veterinarians</a>
                        <a class="text-body mb-2" href="blog.html"><i class="bi bi-arrow-right text-primary me-2"></i>Blog</a>
                        <a class="text-body" href="contact.html"><i class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                    </div>
                </div>
                <!-- Popular Links -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Popular Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="veterinarians.html"><i class="bi bi-arrow-right text-primary me-2"></i>Veterinarians</a>
                        <a class="text-body mb-2" href="shelters.html"><i class="bi bi-arrow-right text-primary me-2"></i>Shelters</a>
                        <a class="text-body mb-2" href="pet-care-guides.html"><i class="bi bi-arrow-right text-primary me-2"></i>Pet Care Guides</a>
                        <a class="text-body mb-2" href="nutrition.html"><i class="bi bi-arrow-right text-primary me-2"></i>Nutrition</a>
                        <a class="text-body mb-2" href="health.html"><i class="bi bi-arrow-right text-primary me-2"></i>Medical Health</a>
                        <a class="text-body" href="faq.html"><i class="bi bi-arrow-right text-primary me-2"></i>FAQs</a>
                    </div>
                </div>
                <!-- Newsletter -->
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
                        <a class="btn btn-outline-primary btn-square me-2" href="https://twitter.com/petconnect"><i class="bi bi-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="https://facebook.com/petconnect"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-outline-primary btn-square me-2" href="https://linkedin.com/company/petconnect"><i class="bi bi-linkedin"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="https://instagram.com/petconnect"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <!-- Footer Links -->
                <div class="col-12 text-center text-body">
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
    <!-- Footer End -->


    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">PetConnect</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a></p>
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
