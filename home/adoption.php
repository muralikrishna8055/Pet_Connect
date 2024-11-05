<?php
session_start(); 
include('db_con.php'); 

// Query to fetch pets for adoption
$sql = "SELECT id, pet_image, pet_name, breed, age, description, contact_number, stat FROM pets_for_adoption WHERE stat = '2'";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect - Pet Adoption & Rehoming</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Pet Adoption, Rehoming Pets, Pets for Sale, Animal Lovers" name="keywords">
    <meta content="Find loving homes for pets or adopt your new best friend through PetConnect." name="description">
    
    <!-- Favicon, Fonts, and Stylesheets -->
    <link href="img/favicon.ico" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
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


    <!-- Pet Adoption/Rehoming Start -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Pet Adoption & Rehoming</h2>
        <p class="text-center mb-5">Find your new best friend or help a pet find a loving home through our adoption and rehoming services.</p>
        <div class="row">

            <?php
            if ($result->num_rows > 0) {
                // Output data for each pet
                while($row = $result->fetch_assoc()) {
                    echo '
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="../user/uploads/product/' . $row["pet_image"] . '" class="card-img-top" alt="' . htmlspecialchars($row["pet_name"]) . '">
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($row["pet_name"]) . '</h5>
                                <p class="card-text"><strong>Breed:</strong> ' . htmlspecialchars($row["breed"]) . '</p>
                                <p class="card-text"><strong>Age:</strong> ' . htmlspecialchars($row["age"]) . ' years</p>
                                <p class="card-text">' . htmlspecialchars($row["description"]) . '</p>
                                <hr>
                                <h6>Owner Contact Information:</h6>
                                <p class="card-text"><i class="bi bi-telephone me-2"></i>' . htmlspecialchars($row["contact_number"]) . '</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p class="text-center">No pets available for adoption at this time.</p>';
            }
            ?>
            
        </div>
    </div>
    <!-- <a href="contact.html" class="btn btn-primary">Adopt ' . htmlspecialchars($row["pet_name"]) . '</a> Pet Adoption/Rehoming End -->

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

    