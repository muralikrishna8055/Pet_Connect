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
    echo '<script>location.replace("doctors.php");</script>';
    exit();
}
// Check if 'id' is set in the GET request
if (isset($_POST['doc'])) {
    $doc = $_POST['doc'];
   //echo $doc;
}
else{
    echo '<script>location.replace("doctors.php");</script>';
}


// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Ensure all required fields are set and not empty
    $doctor_id = isset($_POST['doctor_id']) ? htmlspecialchars($_POST['doctor_id']) : null;
    $user_id = isset($_POST['user_id']) ? htmlspecialchars($_POST['user_id']) : null;
    $pet_name = isset($_POST['petName']) ? htmlspecialchars($_POST['petName']) : null;
    $pet_type = isset($_POST['petType']) ? htmlspecialchars($_POST['petType']) : null;
    $appointment_date = isset($_POST['appointmentDate']) ? htmlspecialchars($_POST['appointmentDate']) : null;
    $appointment_time = isset($_POST['appointmentTime']) ? htmlspecialchars($_POST['appointmentTime']) : null;
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : null;

    // Check if any required fields are empty
    if (empty($doctor_id) || empty($user_id) || empty($pet_name) || empty($pet_type) || empty($appointment_date) || empty($appointment_time)) {
        echo "<p class='alert alert-danger'>Please fill in all required fields.</p>";
    } else {
        // Prepare the SQL insert statement
        $sql = "INSERT INTO appointments (doctor_id, user_id, pet_name, pet_type, appointment_date, appointment_time, message) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement and bind parameters to avoid SQL injection
        if ($stmt = $connection->prepare($sql)) {
            $stmt->bind_param("sssssss", $doctor_id, $user_id, $pet_name, $pet_type, $appointment_date, $appointment_time, $message);


            // Execute the statement and check for success
            if ($stmt->execute()) {
               // echo "<p class='alert alert-success'>Appointment submitted successfully!</p>";
                echo '<script>alert("Appointment submitted successfully!");</script>';
                echo '<script>location.replace("doctors.php");</script>'; // Redirect
            } else {
                echo "<p class='alert alert-danger'>Error: " . $stmt->error . "</p>";
                echo '<script>location.replace("doctors.php");</script>'; // Redirect
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "<p class='alert alert-danger'>Error preparing the statement.</p>";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect - Appointment Scheduling</title>
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
    <!-- Navbar End     <input  class="form-control" id="phone" name="phone"type="tel" pattern="[0-9]{10}" placeholder="e.g., 1234567890" required>
               -->      

    <!-- Appointment Scheduling Start -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Schedule an Appointment</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card p-4">
                    <form action="" method="post">
                        
                            <input type="hidden" value="<?php echo $doc ?>"  name="doctor_id" required>
                            <input type="hidden" value="<?php echo $_SESSION['usr']?>"   name="user_id" required>
        
                        <div class="mb-3">
                            <label for="petName" class="form-label">Pet's Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="petName" name="petName" required>
                        </div>
                        <div class="mb-3">
                            <label for="petType" class="form-label">Pet Type<span class="text-danger">*</span></label>
                            <select class="form-select" id="petType" name="petType" required>
                                <option value="">Select Pet Type</option>
                                <option value="Dog">Dog</option>
                                <option value="Cat">Cat</option>
                                <option value="Bird">Bird</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="appointmentDate" class="form-label">Preferred Date<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" min="<?= date('Y-m-d'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="appointmentTime" class="form-label">Preferred Time<span class="text-danger">*</span></label>
                            <input type="time" class="form-control" id="appointmentTime" name="appointmentTime" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Additional Information or Special Requests</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="e.g., Your pet has anxiety during visits."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit"  class="btn btn-primary">Submit Appointment</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Appointment Scheduling End -->

    <!-- Footer Start -->
    <footer class="container-fluid bg-light mt-5 py-5">
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
