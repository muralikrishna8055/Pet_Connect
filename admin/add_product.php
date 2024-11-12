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
    $category = mysqli_real_escape_string($connection, $_POST['category']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    
    // Handle file upload
    $photo = $_FILES['product_picture']['name'];
    $photo_tmp = $_FILES['product_picture']['tmp_name'];
    $photo_folder = "uploads/product/" . $photo;

    // Check if the uploads/product folder exists, and create it if not
    if (!file_exists('uploads/product/')) {
        mkdir('uploads/product/', 0777, true);
    }

    // Validate that all fields are filled
    if (!empty($name) && !empty($category) && !empty($description) && !empty($photo) && !empty($price)) {

        // Check for file upload errors
        if ($_FILES['product_picture']['error'] !== UPLOAD_ERR_OK) {
            echo '<script>alert("Error uploading file.");</script>';
        } else {
            // Move the uploaded file to the uploads folder
            if (move_uploaded_file($photo_tmp, $photo_folder)) {
                // Insert product details into the database
                $query = "INSERT INTO product (name, category, description, price, image) 
                          VALUES ('$name', '$category', '$description', '$price', '$photo')";
                $query_run = mysqli_query($connection, $query);

                if ($query_run) {
                    echo '<script>alert("Product successfully added.");</script>';
                    echo '<script>location.replace("add_product.php");</script>';
                } else {
                    echo '<script>alert("Failed to save data to the database.");</script>';
                }
            } else {
                echo '<script>alert("Failed to upload image. Please check folder permissions.");</script>';
            }
        }
    } else {
        echo '<script>alert("Please fill in all the fields.");</script>';
        echo '<script>location.replace("add_product.php");</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PetConnect | Add Product</title>
  <meta content="Add new products to PetConnect's inventory." name="description">
  <meta content="PetConnect, Admin, Add Product, Dashboard" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|
    Nunito:300,300i,400,400i,600,600i,700,700i|
    Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- Existing Header Content (Search Bar, Notifications, Messages, Profile) -->

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
      <h1>Add New Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Products</li>
          <li class="breadcrumb-item active">Add Product</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Product Details</h5>

             <!-- Add Product Form -->
             <form action="" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="productName" class="col-sm-2 col-form-label">Product Name<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="productDescription" class="col-sm-2 col-form-label">Description<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="4" placeholder="Enter product description" required></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="productCategory" class="col-sm-2 col-form-label">Category<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <select class="form-select" name="category" required>
                      <option selected disabled value="">Choose category</option>
                      <option value="food">Pet Food</option>
                      <option value="toys">Toys</option>
                      <option value="accessories">Accessories</option>
                      <option value="health">Health & Wellness</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="productPrice" class="col-sm-2 col-form-label">Price ($)<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="price" placeholder="Enter product price" min="0" step="0.01" required>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="productImage" class="col-sm-2 col-form-label">Product Image<span class="text-danger">*</span></label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="product_picture" accept="image/*" required>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Add Product Form -->

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
    <div class="credits">
      Designed by <a href="">PetConnect</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Optional: Initialize TinyMCE for Rich Text Editing (if needed) -->
  <script>
    // Initialize TinyMCE (optional)
    tinymce.init({
      selector: '#productDescription',
      height: 300,
      menubar: false,
      plugins: [
        'advlist autolink lists link charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | bold italic backcolor | \
                alignleft aligncenter alignright alignjustify | \
                bullist numlist outdent indent | removeformat | help'
    });
  </script>

</body>

</html>
