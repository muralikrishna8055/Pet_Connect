<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session if not already started
}
include('db_con.php'); 

// Query to fetch doctors with stat = 2
$sql = "SELECT id, profile_picture, name, hospital_name, contact_number FROM vet_doctors WHERE stat = 2";
$stmt = $connection->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $connection->error);
}

$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Execution failed: " . $stmt->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PET Connect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
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
               

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Features</a>
                    <div class="dropdown-menu m-0">
                        <a href="appionment.php" class="dropdown-item">Appionment</a>
                        <a href="emergency_vet.php" class="dropdown-item">Emergency Vets</a>
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



<!-- Team Start -->
<section class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Team Members</h6>
            <h1 class="display-5 text-uppercase mb-0">Qualified Pets Care Professionals</h1>
        </div>
        <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="team-item">';
                    echo '    <div class="position-relative overflow-hidden">';
                    echo '        <img class="img-fluid w-100" src="../admin/uploads/product/' . htmlspecialchars($row["profile_picture"]) . '" alt="Profile picture of ' . htmlspecialchars($row["name"]) . '">';
                    echo '        <div class="team-overlay">';
                    echo '            <div class="d-flex align-items-center justify-content-start">';
                    echo '                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-twitter"></i></a>';
                    echo '                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-facebook"></i></a>';
                    echo '                <a class="btn btn-light btn-square mx-1" href="#"><i class="bi bi-linkedin"></i></a>';
                    echo '            </div>';
                    echo '        </div>';
                    echo '    </div>';
                    echo '    <div class="bg-light text-center p-4">';
                    echo '        <h5 class="text-uppercase">' . htmlspecialchars($row["name"]) . '</h5>';
                    echo '        <p class="m-0">' . htmlspecialchars($row["hospital_name"]) . '</p>';
                    echo '        <p>Contact: ' . htmlspecialchars($row["contact_number"]) . '</p>';
                  
                    echo '           <form action="detail_doc.php" method="POST">';
                    echo '               <button type="submit"  name="id" class="btn btn-primary mt-3" value="' . htmlspecialchars($row['id']) . '">CONTACT</button>';
                    echo '           </form>';

                    echo '    </div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No doctors found.</p>';
            }

            // Close the result set
            $result->free();

            // Close connection
            $connection->close();
            ?>
        </div>
    </div>
</section>
<!-- Team End -->
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


