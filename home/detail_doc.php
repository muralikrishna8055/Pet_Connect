<?php    
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}  
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('db_con.php');


// Check if 'id' is set in the POST request
if (isset($_POST['id'])) {
    $vID = $_POST['id'];
     
    // Prepare the SQL query
    $sql = mysqli_query($connection, "SELECT * FROM vet_doctors WHERE id = '$vID'");

    // Check for query error
    if (!$sql) {
        die("Query failed: " . mysqli_error($connection));
    }
    
    if ($sql->num_rows > 0) {
        $data = mysqli_fetch_array($sql);
        $name = $data['name'];
        $phone = $data['contact_number'];
        $email = $data['email'];
        $hospital_name = $data['hospital_name'];
        $image = $data['profile_picture']; // Assuming there's an image field
    } else {
        echo "No doctor found with this ID.";
    }
} else {
    echo "<script>location.replace('doctors.php');</script>";
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PetConnect | Doctor Profile</title>
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


    <!-- Doctor Profile Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="doctors.php">Doctors</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
                </ol>
            </nav>

            <div class="row gx-5">
                <!-- Doctor Image and Contact Details -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="position-relative">
                        <img class="img-fluid w-100 rounded" src="../admin/uploads/product/<?php echo $image; ?>" alt="Doctor Image">
                    </div>
                    <div class="mt-4">
                        <h3 class="mb-2"><?php echo $name; ?></h3>
                        <p class="mb-2"><i class="bi bi-phone text-primary me-2"></i><?php echo $phone; ?></p>
                        <p class="mb-2"><i class="bi bi-envelope text-primary me-2"></i><?php echo $email; ?></p>
                        <p class="mb-2"><i class="bi bi-building text-primary me-2"></i><?php echo $hospital_name; ?></p>
                    </div>
                </div>

                <!-- Doctor Qualifications and Actions -->
                <div class="col-lg-6">
                    <h2 class="text-uppercase mb-4">Doctor Qualifications</h2>
                    <p class="mb-4">DVM, MSc in Veterinary Sciences</p>
                    <h4 class="text-uppercase mb-4">About the Doctor</h4>
                    <p class="mb-4">Dr. <?php echo $name; ?> has over 10 years of experience in veterinary care, specializing in pet health and wellness. Her passion for animals drives her dedication to providing top-quality care for pets and their families.</p>

                    <!-- Action Buttons -->
                    <div class="d-flex mb-4">
                        <form action="appionment.php" method="POST">
                           <button type="submit"  name="doc" class="btn btn-primary py-3 px-5 me-3" value="<?php echo $email; ?>">Get Appointment</button>
                       </form>';

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Doctor Profile End -->

    <!-- Footer Start -->
    <footer class="bg-light py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Get In Touch</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>123 Pet Lane, City, Country</p>
                    <p class="mb-2"><i class="bi bi-phone text-primary me-2"></i>+123 456 789</p>
                    <p class="mb-0"><i class="bi bi-envelope text-primary me-2"></i>info@petshop.com</p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Quick Links</h5>
                    <a class="d-block mb-2" href="about.html">About Us</a>
                    <a class="d-block mb-2" href="service.html">Services</a>
                    <a class="d-block mb-2" href="product.html">Products</a>
                    <a class="d-block mb-2" href="blog.html">Blog</a>
                    <a class="d-block mb-2" href="contact.html">Contact Us</a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Follow Us</h5>
                    <a class="d-block mb-2" href="#"><i class="bi bi-facebook me-2"></i>Facebook</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-twitter me-2"></i>Twitter</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-instagram me-2"></i>Instagram</a>
                    <a class="d-block mb-2" href="#"><i class="bi bi-linkedin me-2"></i>LinkedIn</a>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="text-uppercase mb-4">Subscribe Now</h5>
                    <p>Subscribe to our newsletter for the latest updates on pet care and exclusive offers!</p>
                    <form action="">
                        <div class="input-group">
                            <input type="email" class="form-control p-3" placeholder="Your Email" required>
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <p class="mb-0">&copy; <a class="text-white" href="#">PetConnect</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-0" class="text-end">Designed by YourName</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>
