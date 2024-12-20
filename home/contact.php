<?php
include('db_con.php'); 
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize it
    $email = $connection->real_escape_string($_POST['email']);
    $subject = $connection->real_escape_string($_POST['subject']);
    $message = $connection->real_escape_string($_POST['message']);

    // Insert data into messages table
    $sql = "INSERT INTO user_messages ( email, subject, message) VALUES ( '$email', '$subject', '$message')";

    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Messages sent successfully!");</script>';
        echo '<script>location.replace("contact.php");</script>'; // Redirect
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect</title>
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

   
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Contact Us</h6>
                <h1 class="display-5 text-uppercase mb-0">Get in Touch with PetConnect</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-7">
     <?php              // Check if user session is set
         if (isset($_SESSION['usr'])):
    ?>

        <form action="" method="post"> <!-- Replace with your backend script -->
           <div class="row g-3">
              <input type="hidden" name="email" value="<?php echo $_SESSION['usr']; ?>" style="height: 55px;">
        
           <div class="col-12">
             <input type="text" name="subject" class="form-control bg-light border-0 px-4" placeholder="Subject" required style="height: 55px;">
           </div>
        
           <div class="col-12">
            <textarea name="message" class="form-control bg-light border-0 px-4 py-3" rows="8" placeholder="Message" required></textarea>
          </div>
        
          <div class="col-12">
            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
         </div>
       </div>
   </form>

 <?php
else:
    echo "<p><h2>Please log in to send a message.</h2></p>";
endif;

?>
                </div>
                <div class="col-lg-5">
                    <div class="bg-light mb-5 p-5">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt text-primary fs-1 me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Our Office</h6>
                                <span>456 Pet Lane, Animal City, Kochi</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-open text-primary fs-1 me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Email Us</h6>
                                <span>support@petconnect.com</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-phone-vibrate text-primary fs-1 me-3"></i>
                            <div class="text-start">
                                <h6 class="text-uppercase mb-1">Call Us</h6>
                                <span>+91 43 456 7890</span>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

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
                    <a class="btn btn-outline-primary btn-square me-2" href=""><i class="bi bi-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square me-2" href=""><i class="bi bi-facebook"></i></a>
                    <a class="btn btn-outline-primary btn-square me-2" href=""><i class="bi bi-linkedin"></i></a>
                    <a class="btn btn-outline-primary btn-square" href=""><i class="bi bi-instagram"></i></a>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
    
    </html>
