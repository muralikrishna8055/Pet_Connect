<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Please log in as admin to access this page.');</script>";
    echo "<script>location.replace('admin_login.php');</script>";
    exit;
}
?>


<?php
include('db_con.php'); 

// Query to fetch doctors
$sql = "SELECT id, name, email, profile_picture, hospital_name, contact_number, stat FROM vet_doctors WHERE stat=1";
$result = $connection->query($sql);

// Handle approval or rejection
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $action = $_POST['action']; // 'approve' or 'reject'
    
    if ($action === 'approve') {
        // Set status to 2 for approved doctors
        $update_sql = "UPDATE vet_doctors SET stat = 2 WHERE id = $id";
        if ($connection->query($update_sql) === TRUE) {
            echo "Doctor approved successfully.";
        } else {
            echo "Error approving doctor: " . $connection->error;
        }
    } else {
        // Delete the doctor from the database for rejected doctors
        $delete_sql = "DELETE FROM vet_doctors WHERE id = $id";
        if ($connection->query($delete_sql) === TRUE) {
            echo "Doctor deleted successfully.";
        } else {
            echo "Error deleting doctor: " . $connection->error;
        }
    }
    
    // Redirect after action
    header("Location: view_doc.php"); 
    exit(); // Ensure the script stops after the redirect
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PetConnect | View Doctors</title>
  <meta content="View, approve, or reject doctors in PetConnect's system." name="description">
  <meta content="PetConnect, Admin, View Doctors, Dashboard" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Admin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
  </header>

   
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
      <h1>View Doctors</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Doctors List</h5>

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Profile Picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Hospital Name</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo '<tr>';
                          echo '    <th scope="row">' . htmlspecialchars($row["id"]) . '</th>';
                          echo '    <td><img src="../admin/uploads/product/' . htmlspecialchars($row["profile_picture"]) . '" alt="' . htmlspecialchars($row["name"]) . '" class="img-thumbnail" style="width: 100px;"></td>';
                          echo '    <td>' . htmlspecialchars($row["name"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["email"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["hospital_name"]) . '</td>';
                          echo '    <td>' . htmlspecialchars($row["contact_number"]) . '</td>';
                          echo '    <td>
                                    <form action="" method="POST" style="display:inline;">
                                      <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                                      <button type="submit" name="action" value="approve" class="btn btn-sm btn-success">Approve</button>
                                    </form>
                                    <form action="" method="POST" style="display:inline;">
                                      <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                                      <button type="submit" name="action" value="reject" class="btn btn-sm btn-danger">Reject</button>
                                    </form>
                                  </td>'; 
                          echo '</tr>';
                      }
                  } else {
                      echo '<tr><td colspan="7" class="text-center">No doctors found.</td></tr>';
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

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PetConnect</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="">PetConnect</a>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
