<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Please log in as admin to access this page.');</script>";
    echo "<script>location.replace('admin_login.php');</script>";
    exit;
}
?>

<?php
session_start(); // Start the session
include('db_con.php'); // Include the database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Prepare the SQL statement to prevent SQL injection
$sql = "SELECT product_name,id, total_price, order_date, quantity, product_id,fullname,state,address,zip,phone,status FROM orders ";
$stmt = $connection->prepare($sql);
$stmt->execute();
$product_result = $stmt->get_result();

// Close the statement and connection
$stmt->close();



// Check if form was submitted and an ID is provided
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    // Sanitize and fetch the order ID from the form
    $orderId = intval($_POST['id']);
    
    // Update the order's status to "Shipped" in the database
    $updateQuery = "UPDATE orders SET status = 'Shipped' WHERE id = ?";
    $stmt = $connection->prepare($updateQuery);
    $stmt->bind_param("i", $orderId);
    
    // Execute and check if the update was successful
    if ($stmt->execute()) {
        echo '<script>alert("Updated successfully!");</script>';
            echo '<script>location.replace("oder.php");</script>'; // Redirect
    } else {
        echo "<p class='alert alert-danger'>Error updating order status. Please try again.</p>";
        echo '<script>location.replace("oder.php");</script>'; // Redirect
    }
    $stmt->close();
}




$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PetConnect | View Products</title>
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
      <h1>View Order</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Orders</li>
          <li class="breadcrumb-item active">View Order</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">order</h5>

            <!-- Products Table -->
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price ($)</th>
            <th scope="col">Order Date</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
           
        </tr>
    </thead>
    <tbody>
        <?php
        if ($product_result->num_rows > 0) {
            while ($product = $product_result->fetch_assoc()) {
                echo '<tr>';
                echo '    <td>' . htmlspecialchars($product["product_name"]) . '</td>';
                echo '    <td>' . htmlspecialchars($product["quantity"]) . '</td>';
                echo '    <td>$' . htmlspecialchars(number_format($product["total_price"], 2)) . '</td>';
                echo '    <td>' . htmlspecialchars($product["order_date"]) . '</td>';
                echo '    <td>' . htmlspecialchars($product["fullname"]) . '</td>';
                echo '    <td>' . htmlspecialchars($product["address"]) . '</td>';
                echo '    <td>' . htmlspecialchars($product["phone"]) . '</td>';

                // Display the "Shipped" button if the order status is not already "Shipped"
                echo '    <td>';
                if ($product["status"] != "Shipped") {
                    echo '<form action="" method="POST">
                              <button type="submit" name="id" class="btn btn-sm btn-success" value="' . htmlspecialchars($product['id']) . '">
                                  <i class="bi bi-pencil-square"></i> Shipped
                              </button>
                          </form>';
                } else {
                    echo 'Shipped';
                }
                echo '    </td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="9" class="text-center">Your Order is Empty</td></tr>';
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




