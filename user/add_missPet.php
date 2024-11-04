<?php
session_start();
include('db_con.php'); // Include your database connection file


// Check if the user is logged in
if (!isset($_SESSION['usr'])) {
    echo '<script>location.replace("../home/index.php");</script>'; // Redirect to login page
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['usr'];


if (isset($_POST['submit'])) {
    // Sanitize input data
    $pet_name = mysqli_real_escape_string($connection, $_POST['pet_name']);
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
    $stat=1;


    // Handle file upload for pet image
    $pet_image = $_FILES['pet_image']['name'];
    $image_tmp = $_FILES['pet_image']['tmp_name'];
    $image_folder = "uploads/product/" . $pet_image;
 
    // Check if the uploads/pets folder exists, and create it if not
    if (!file_exists('uploads/product/')) {
        mkdir('uploads/product/', 0777, true);
    }

    // Validate that all fields are filled
    if (!empty($pet_name) && !empty($location) && !empty($description) && !empty($contact_number) && !empty($pet_image)) {

        // Check for file upload errors
        if ($_FILES['pet_image']['error'] !== UPLOAD_ERR_OK) {
            echo '<script>alert("Error uploading file.");</script>';
        } else {
            // Move the uploaded file to the uploads folder
            if (move_uploaded_file($image_tmp, $image_folder)) {
                // Insert pet details into the database
                $query = "INSERT INTO missing_pets (pet_name, location, description, contact_number, pet_image,stat,uid) 
                          VALUES ('$pet_name', '$location', '$description', '$contact_number', '$pet_image','$stat','$user_id')";
                $query_run = mysqli_query($connection, $query);

                if ($query_run) {
                    echo '<script>alert("Missing pet details successfully added.");</script>';
                    echo '<script>location.replace("add_missPet.php");</script>';
                } else {
                    echo '<script>alert("Failed to save data to the database.");</script>';
                }
            } else {
                echo '<script>alert("Failed to upload pet image. Please check folder permissions.");</script>';
            }
        }
    } else {
        echo '<script>alert("Please fill in all the fields.");</script>';
        echo '<script>location.replace("add_missPet.php");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PetConnect | Report Missing Pet</title>
    <meta content="Report a missing pet on PetConnect." name="description">
    <meta content="PetConnect, Missing Pet, Report Pet" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">USER</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="usr_logout.php" data-bs-toggle="dropdown">
        <img src="" alt="" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">LOGOUT</span>
      </a><!-- End Profile Image Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="usr_logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>
      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="../home/index.php">
      <i class="bi bi-grid"></i>
      <span>HOME</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="View_order.php">
      <i class="bi bi-menu-button-wide"></i><span>ORDERS</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="view_order.php">
          <i class="bi bi-circle"></i><span>MY ORDERS</span>
        </a>
      </li>
      <li>
        <a href="view_Cart.php">
          <i class="bi bi-circle"></i><span>CART</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#missing-pets-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>MISSING PETS</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="missing-pets-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_missPet.php">
          <i class="bi bi-circle"></i><span>ADD MISSING PETS</span>
        </a>
      </li>
      <li>
        <a href="view_missing.php">
          <i class="bi bi-circle"></i><span>VIEW MISSING POST</span>
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#adoption-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>ADOPTION</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="adoption-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_adopt.php">
          <i class="bi bi-circle"></i><span>ADD ADOPTION</span>
        </a>
      </li>
      <li>
        <a href="view_adopt.php">
          <i class="bi bi-circle"></i><span>VIEW ADOPTIONS</span>
        </a>
      </li>
    </ul>
  </li>
</ul>

</aside><!-- End Sidebar -->

    <!-- Header and Sidebar remain the same -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Report Missing Pet</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Missing Pet Details</h5>

                            <!-- Missing Pet Form -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Pet Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="pet_name" placeholder="Enter pet name" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Location<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="location" placeholder="Enter last seen location" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Description<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" rows="4" placeholder="Enter pet description" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Contact Number<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_number" placeholder="Enter contact number" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Pet Image<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="pet_image" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Report Missing Pet</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Missing Pet Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- Footer and Vendor JS Files remain the same -->
      <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>PetConnect</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>

