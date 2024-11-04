<?php
include('db_con.php'); 
// Query to fetch hospitals
$sql = "SELECT id, logo, name, description, location, contact_number FROM hospital";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PetConnect | View Hospitals</title>
  <meta content="View, update, and delete hospitals in PetConnect's inventory." name="description">
  <meta content="PetConnect, Admin, View Hospitals, Dashboard" name="keywords">

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
      <h1>View Hospitals</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Veterinaries</li>
          <li class="breadcrumb-item active">View Hospitals</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hospital List</h5>

              <!-- Hospitals Table -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '    <th scope="row">' . htmlspecialchars($row["id"]) . '</th>';
                          echo '    <td><img src="uploads/product/' . htmlspecialchars($row["logo"]) . '" alt="' . htmlspecialchars($row["name"]) . '" class="img-thumbnail" style="width: 100px;"></td>';
                          echo '    <td>' . htmlspecialchars($row["name"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["location"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["contact_number"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["description"]) . '</td>';
                          echo '    <td>
                                    <form action="edit_hosp.php" method="POST" style="display:inline;">
                                      <button type="submit" name="id" class="btn btn-sm btn-success" value="' . htmlspecialchars($row['id']) . '"><i class="bi bi-pencil-square"></i> Edit</button>
                                    </form>
                                    <form action="del_hosp.php" method="POST" style="display:inline;">
                                       <button type="submit" name="id" class="btn btn-sm btn-danger" value="' . htmlspecialchars($row['id']) . '"><i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                  </td>';
                          echo '</tr>';
                      }
                  } else {
                      echo '<tr><td colspan="7" class="text-center">No hospitals found.</td></tr>';
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
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
