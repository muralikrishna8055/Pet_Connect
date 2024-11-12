<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect </title>
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

    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-1 text-uppercase text-dark mb-lg-4">PetConnect</h1>
                    <h1 class="text-uppercase text-white mb-lg-4">Connecting Pet Lovers Everywhere</h1>
                    <p class="fs-4 text-white mb-lg-4">Join our community to find lost pets, rehome your beloved companions, access valuable resources, and consult with veterinary professionals.</p>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="signup.html" class="btn btn-outline-light border-2 py-md-3 px-md-5 me-5">Get Started</a>
                        <!-- Optional: Add a video button if needed
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="font-weight-normal text-white m-0 ms-4 d-none d-sm-block">Watch Video</h5>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Introduction Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" alt="About Us" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">About Us</h6>
                        <h1 class="display-5 text-uppercase mb-0">Connecting Pet Lovers for a Better Community</h1>
                    </div>
                    <h4 class="text-body mb-4">PetConnect is dedicated to fostering a supportive network where pet owners, veterinary professionals, and animal enthusiasts can collaborate to ensure the well-being of pets everywhere.</h4>
                    <div class="bg-light p-4">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100 active" id="pills-mission-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-mission" type="button" role="tab" aria-controls="pills-mission"
                                    aria-selected="true">Our Mission</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100" id="pills-vision-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-vision" type="button" role="tab" aria-controls="pills-vision"
                                    aria-selected="false">Our Vision</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-mission" role="tabpanel" aria-labelledby="pills-mission-tab">
                                <p class="mb-0">Our mission is to create a compassionate and resourceful community where pet owners can find support, share information, and access essential services to keep their pets happy and healthy.</p>
                            </div>
                            <div class="tab-pane fade" id="pills-vision" role="tabpanel" aria-labelledby="pills-vision-tab">
                                <p class="mb-0">We envision a world where every pet has a loving home, and owners have the resources and community support they need to provide the best care possible.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Features</h6>
                <h1 class="display-5 text-uppercase mb-0">What PetConnect Offers</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="feature-item bg-light d-flex p-4">
                        <i class="bi bi-geo-alt-fill display-4 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Lost & Found Pets</h5>
                            <p>Quickly post about lost pets and help the community in search and recovery efforts.</p>
                            <a class="text-primary text-uppercase" href="lost-pets.html">Learn More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-item bg-light d-flex p-4">
                        <i class="bi bi-house-fill display-4 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Rehome Pets</h5>
                            <p>Find new loving homes for pets through our streamlined rehoming platform.</p>
                            <a class="text-primary text-uppercase" href="rehoming.html">Learn More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-item bg-light d-flex p-4">
                        <i class="bi bi-journal-text display-4 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Resources</h5>
                            <p>Access a wealth of resources on pet care, nutrition, and health to ensure your pets thrive.</p>
                            <a class="text-primary text-uppercase" href="resources.html">Learn More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-item bg-light d-flex p-4">
                        <i class="bi bi-heart-fill display-4 text-primary me-4"></i>
                        <div>
                            <h5 class="text-uppercase mb-3">Veterinary Consultations</h5>
                            <p>Connect with veterinary professionals for expert advice and treatment options.</p>
                            <a class="text-primary text-uppercase" href="vet-consultations.html">Learn More <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Special Offer Start -->
    <div class="container-fluid bg-offer my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5 justify-content-start">
                <div class="col-lg-7">
                    <div class="border-start border-5 border-dark ps-5 mb-5">
                        <h6 class="text-dark text-uppercase">Join Us Today</h6>
                        <h1 class="display-5 text-uppercase text-white mb-0">Become a Part of the PetConnect Community</h1>
                    </div>
                    <p class="text-white mb-4">Sign up now to start connecting with fellow pet lovers, access exclusive resources, and ensure the well-being of your pets with professional veterinary support.</p>
                    <a href="signup.html" class="btn btn-light py-md-3 px-md-5 me-3">Sign Up</a>
                    <a href="about.html" class="btn btn-outline-light py-md-3 px-md-5">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Special Offer End -->


    <!-- Testimonials Start -->
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
    <!-- Testimonials End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Latest Blog</h6>
                <h1 class="display-5 text-uppercase mb-0">Insights and Tips from Our Community</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="blog-item">
                        <div class="row g-0 bg-light overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="img/blog-1.jpg" alt="Blog Post 1" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="bi bi-bookmarks me-2"></i>Pet Care</small>
                                        <small><i class="bi bi-calendar-date me-2"></i>10 Oct, 2024</small>
                                    </div>
                                    <h5 class="text-uppercase mb-3">10 Tips for Keeping Your Pet Healthy</h5>
                                    <p>Discover essential tips and best practices to ensure your pet stays happy and healthy throughout the year.</p>
                                    <a class="text-primary text-uppercase" href="blog-detail.html">Read More <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="blog-item">
                        <div class="row g-0 bg-light overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100" src="img/blog-2.jpg" alt="Blog Post 2" style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-center">
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="bi bi-bookmarks me-2"></i>Community</small>
                                        <small><i class="bi bi-calendar-date me-2"></i>15 Oct, 2024</small>
                                    </div>
                                    <h5 class="text-uppercase mb-3">How to Effectively Use PetConnect</h5>
                                    <p>Learn how to make the most out of PetConnect's features to benefit you and your pets.</p>
                                    <a class="text-primary text-uppercase" href="blog-detail.html">Read More <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add more blog posts as needed -->
            </div>
        </div>
    </div>
    <!-- Blog End -->


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
