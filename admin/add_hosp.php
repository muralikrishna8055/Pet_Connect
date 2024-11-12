<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Please log in as admin to access this page.');</script>";
    echo "<script>location.replace('admin_login.php');</script>";
    exit;
}
?>

<?php
include('db_con.php'); // Include your database connection file

if (isset($_POST['submit'])) {
    // Sanitize input data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $location = mysqli_real_escape_string($connection, $_POST['location']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);

    // Handle file upload (if needed for hospital logo)
    $logo = $_FILES['hospital_logo']['name'];
    $logo_tmp = $_FILES['hospital_logo']['tmp_name'];
    $logo_folder = "uploads/product/" . $logo;

    // Check if the uploads/hospital folder exists, and create it if not
    if (!file_exists('uploads/product/')) {
        mkdir('uploads/product/', 0777, true);
    }

    // Validate that all fields are filled
    if (!empty($name) && !empty($location) && !empty($description) && !empty($contact_number) && !empty($logo)) {

        // Check for file upload errors
        if ($_FILES['hospital_logo']['error'] !== UPLOAD_ERR_OK) {
            echo '<script>alert("Error uploading file.");</script>';
        } else {
            // Move the uploaded file to the uploads folder
            if (move_uploaded_file($logo_tmp, $logo_folder)) {
                // Insert hospital details into the database
                $query = "INSERT INTO hospital (name, location, description, contact_number, logo) 
                          VALUES ('$name', '$location', '$description', '$contact_number', '$logo')";
                $query_run = mysqli_query($connection, $query);

                if ($query_run) {
                    echo '<script>alert("Hospital successfully added.");</script>';
                    echo '<script>location.replace("add_hosp.php");</script>';
                } else {
                    echo '<script>alert("Failed to save data to the database.");</script>';
                }
            } else {
                echo '<script>alert("Failed to upload logo. Please check folder permissions.");</script>';
            }
        }
    } else {
        echo '<script>alert("Please fill in all the fields.");</script>';
        echo '<script>location.replace("add_hosp.php");</script>';
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PetConnect | Add Hospital</title>
    <meta content="Add new hospitals to PetConnect's inventory." name="description">
    <meta content="PetConnect, Admin, Add Hospital, Dashboard" name="keywords">

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
                <span class="d-none d-lg-block"> Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
    </header><!-- End Header -->

   <!-- ======= Sidebar ======= -->
   <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="view_msg.php">
      <i class="bi bi-person"></i>
      <span>Contact msgs</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_product.php">
          <i class="bi bi-circle"></i><span>Addproduct</span>
        </a>
      </li>                        
     
      <li>
        <a href="view_product.php">
          <i class="bi bi-circle"></i><span>ViewProduct</span>
        </a>
      </li>
    
    </ul>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Vetinarys</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="add_hosp.php">
          <i class="bi bi-circle"></i><span>Add Hospial</span>
        </a>
      </li>                        
     
      <li>
        <a href="view_hosp.php">
          <i class="bi bi-circle"></i><span>View Hospital</span>
        </a>
      </li>
    
    </ul>
  </li> 

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="view_doc.php">
          <i class="bi bi-circle"></i><span>Approve Doctors</span>
        </a>
      </li>                        
     
      <li>
        <a href="view_all_doc.php">
          <i class="bi bi-circle"></i><span>View Doctors</span>
        </a>
      </li>
    
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Adoption</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="approve_adoption.php">
          <i class="bi bi-circle"></i><span>Approve Adoption</span>
        </a>
      </li>                        
     
      <li>
        <a href="view_all_adoption.php">
          <i class="bi bi-circle"></i><span>View Adoptions</span>
        </a>
      </li>
    
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Missing</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="approve_miss.php">
          <i class="bi bi-circle"></i><span>Approve Missing</span>
        </a>
      </li>                        
     
      <li>
        <a href="view_missingPets.php">
          <i class="bi bi-circle"></i><span>View Missing</span>
        </a>
      </li>
    
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="">
      <i class="bi bi-menu-button-wide"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="oder.php">
          <i class="bi bi-circle"></i><span>Orders</span>
        </a>
      </li>                        
    </ul>
  </li>

</ul>

</aside><!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Add New Hospital</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hospital Details</h5>

                            <!-- Add Hospital Form -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="hospitalName" class="col-sm-2 col-form-label">Hospital Name<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="Enter hospital name" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="hospitalLocation" class="col-sm-2 col-form-label">Location<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="location" placeholder="Enter hospital location" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="hospitalDescription" class="col-sm-2 col-form-label">Description<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" rows="4" placeholder="Enter hospital description" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="hospitalContact" class="col-sm-2 col-form-label">Contact Number<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_number" placeholder="Enter contact number" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="hospitalLogo" class="col-sm-2 col-form-label">Hospital Logo<span class="text-danger">*</span></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="hospital_logo" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">Add Hospital</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End Add Hospital Form -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

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
