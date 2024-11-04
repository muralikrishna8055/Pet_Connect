<?php
session_start();
include('db_con.php');

// Check if the user is logged in
if (!isset($_SESSION['usr'])) {
    echo '<script>location.replace("../home/index.php");</script>'; // Redirect to login page
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['usr'];

// Query to fetch missing pets with `stat = 1`
$sql = "SELECT id, pet_image, pet_name, description, breed,age,contact_number FROM pets_for_adoption WHERE stat = '1'";
$result = $connection->query($sql);

// Handle approval or rejection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['submit'];

    if ($action === 'approve') {
        // Set status to 2 for approved missing pets
        $stmt = $connection->prepare("UPDATE pets_for_adoption SET stat = 2 WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Approved successfully.";
        } else {
            echo "Error approving: " . $connection->error;
        }
        $stmt->close();
    } elseif ($action === 'reject') {
        // Delete the pet entry for rejected records
        $stmt = $connection->prepare("DELETE FROM pets_for_adoption  WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Deleted successfully.";
        } else {
            echo "Error deleting: " . $connection->error;
        }
        $stmt->close();
    }

    // Redirect after action
    header("Location: approve_adoption.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PetConnect | View Adoption</title>
  <meta content="View, update, and delete products in PetConnect's inventory." name="description">
  <meta content="PetConnect, Admin, View Products, Dashboard" name="keywords">

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
        <span class="d-none d-lg-block">PetConnect Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- Existing Header Content (Search Bar, Notifications, Messages, Profile) -->

  </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
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
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Orders</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Orders</span>
            </a>
          </li>                        
         
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Shipped Orders</span>
            </a>
          </li>
        
        </ul>
      </li>
</aside><!-- End Sidebar -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>View Adoption</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Missing</li>
          <li class="breadcrumb-item active">View Adoption Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Adoption Posts</h5>

              <!-- Products Table -->
              <table class="table table-striped ">
                <thead>
                  <tr>
                    <th scope="col">Pet Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Breed</th>
                    <th scope="col">age</th>
                    <th scope="col">Description</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '    <td><img src="../user/uploads/product/' . htmlspecialchars($row["pet_image"]) . '" alt="' . htmlspecialchars($row["name"]) . '" class="img-thumbnail" style="width: 100px;"></td>';
                          echo '    <td>' . htmlspecialchars($row["pet_name"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["breed"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["age"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["description"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["contact_number"]) . '</td>';
                          echo '  <td>                                  
                                    <form action="" method="POST" style="display:inline-block;">
                                      <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                                      <button type="submit" name="submit" value="approve" class="btn btn-sm btn-success">Approve</button>
                                  </form>
                                  <form action="" method="POST" style="display:inline-block;">
                                      <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                                      <button type="submit" name="submit" value="reject" class="btn btn-sm btn-danger">Reject</button>
                                  </form>

                                  </td>'; 

                          echo '</tr>';
                      }
                  } else {
                      echo '<tr><td colspan="6" class="text-center">No products found.</td></tr>';
                  }
                  ?>
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

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
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
