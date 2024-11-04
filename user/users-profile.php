<?php
session_start();
// Check if the user session is not set
if (!isset($_SESSION['usr'])) {
  echo '<script>alert("LOGIN FIRST!");</script>';
  echo '<script>location.replace("../home/index.php");</script>'; // Redirect to the cart page
  exit(); // Terminate the script
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_con.php'; // Database connection file

// Assuming the user is logged in and their user ID is stored in the session
$userId = $_SESSION['usr'];

// Fetch user details from the database
$query = "SELECT name, id,email, contact_number, address, place, pincode, state FROM users WHERE email = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated details from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $place = $_POST['place'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $id=$_POST['id'];

    // Update query
    $updateQuery = "UPDATE users SET name = ?, email = ?, contact_number = ?, address = ?, place = ?, pincode = ?, state = ? WHERE id = ?";
    $updateStmt = $connection->prepare($updateQuery);
    $updateStmt->bind_param("sssssssi", $name, $email, $contact_number, $address, $place, $pincode, $state, $id);

    if ($updateStmt->execute()) {
        $message = "Profile updated successfully!";
        header("Refresh:0"); // Reload to show updated details
    } else {
        $message = "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PetConnect</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
        <span class="d-none d-lg-block">USER</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
     

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="" alt="" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">LOGOUT</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
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
              <hr class="dropdown-divider">
            </li>

            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
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



    
    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.php">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="pages-faq.php">
        <i class="bi bi-question-circle"></i>
        <span>F.A.Q</span>
      </a>
    </li><!-- End F.A.Q Page Nav -->
    
  </ul>

</aside><!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">


        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                   <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($user['name']); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"> <?= htmlspecialchars($user['email']); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone Number</div>
                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($user['contact_number']); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($user['address']); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Place</div>
                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($user['place']); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pincode</div>
                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($user['pincode']); ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">State</div>
                    <div class="col-lg-9 col-md-8"><?= htmlspecialchars($user['state']); ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
              
                   
                  <form method="POST" action="">
               
                    <div class="row mb-3">
                      <label for="ame" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="name" class="form-control" id="name" value="<?= htmlspecialchars($user['name']); ?>" required>
                      </div>
                    </div>

                    

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                     <input type="email" name="email" class="form-control" id="email" value="<?= htmlspecialchars($user['email']); ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="contact_number" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" name="contact_number" class="form-control" id="contact_number" value="<?= htmlspecialchars($user['contact_number']); ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="place" class="col-md-4 col-lg-3 col-form-label">Place</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" name="place" class="form-control" id="place" value="<?= htmlspecialchars($user['place']); ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" name="address" class="form-control" id="address" value="<?= htmlspecialchars($user['address']); ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Pincode</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" name="pincode" class="form-control" id="pincode" value="<?= htmlspecialchars($user['pincode']); ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
                      <div class="col-md-8 col-lg-9">
                      <input type="text" name="state" class="form-control" id="state" value="<?= htmlspecialchars($user['state']); ?>" required>
                      </div>
                    </div>

                    <div class="text-center">
                    <input type="hidden" name="id"value="<?= htmlspecialchars($user['id']); ?>">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

               

                

              </div><!-- End Bordered Tabs -->

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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>