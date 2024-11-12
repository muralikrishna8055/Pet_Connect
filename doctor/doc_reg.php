<?php
include('db_con.php'); // Include your database connection file

if (isset($_POST['submit'])) {
    // Sanitize input data
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $hospital_name = mysqli_real_escape_string($connection, $_POST['hospital_name']);
    $contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);

    // Handle file upload (for doctor profile picture)
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_tmp = $_FILES['profile_picture']['tmp_name'];
    $profile_folder = "../admin/uploads/product/" . $profile_picture;
    $stat = 1;

    // Check if the uploads/doctors folder exists, and create it if not
    if (!file_exists('../admin/uploads/product/')) {
        mkdir('../admin/uploads/product/', 0777, true);
    }

    // Validate that all fields are filled
    if (!empty($name) && !empty($email) && !empty($password) && !empty($hospital_name) && !empty($contact_number) && !empty($profile_picture)) {

        // Check for file upload errors
        if ($_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK) {
            echo '<script>alert("Error uploading profile picture.");</script>';
        } else {
            // Check if the email already exists in the database
            $email_check_query = "SELECT * FROM vet_doctors WHERE email = '$email' LIMIT 1";
            $result = mysqli_query($connection, $email_check_query);
            $doctor = mysqli_fetch_assoc($result);

            if ($doctor) { // If a doctor with the email exists
                echo '<script>alert("Email already exists. Please use a different email.");</script>';
                echo '<script>location.replace("doc_reg.php");</script>'; // Redirect back to the form
            } else {
                // Move the uploaded profile picture to the uploads folder
                if (move_uploaded_file($profile_tmp, $profile_folder)) {
                    // Hash the password before saving
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                    // Insert doctor details into the database
                    $query = "INSERT INTO vet_doctors (name, email, password, profile_picture, hospital_name, contact_number, stat) 
                              VALUES ('$name', '$email', '$hashed_password', '$profile_picture', '$hospital_name', '$contact_number', $stat)";
                    $query_run = mysqli_query($connection, $query);

                    if ($query_run) {
                        echo '<script>alert("Doctor successfully registered.");</script>';
                        echo '<script>location.replace("login.php");</script>'; // Redirect to doctor list page after success
                    } else {
                        echo '<script>alert("Failed to save data to the database.");</script>';
                    }
                } else {
                    echo '<script>alert("Failed to upload profile picture. Please check folder permissions.");</script>';
                }
            }
        }
    } else {
        echo '<script>alert("Please fill in all the fields.");</script>';
        echo '<script>location.replace("doc_reg.php");</script>'; // Redirect back to the form
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

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Doctor</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form action="" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
    <div class="col-12">
        <label for="yourName" class="form-label">Your Name</label>
        <input type="text" name="name" class="form-control" id="yourName" required>
        <div class="invalid-feedback">Please, enter your name!</div>
    </div>

    <div class="col-12">
        <label for="yourEmail" class="form-label">Your Email</label>
        <input type="email" name="email" class="form-control" id="yourEmail" required>
        <div class="invalid-feedback">Please enter a valid Email address!</div>
    </div>

    <div class="col-12">
        <label for="yourPassword" class="form-label">Password</label>
        <input type="password" name="password" minlength="8" class="form-control" id="yourPassword" required>
        <div class="invalid-feedback">Please enter your password!</div>
    </div>

    <div class="col-12">
        <label for="profilePicture" class="form-label">Profile Picture</label>
        <input type="file" name="profile_picture" class="form-control" id="profilePicture" required>
        <div class="invalid-feedback">Please upload your profile picture!</div>
    </div>

    <div class="col-12">
        <label for="hospitalName" class="form-label">Hospital Name</label>
        <input type="text" name="hospital_name" class="form-control" id="hospitalName" required>
        <div class="invalid-feedback">Please enter the hospital name!</div>
    </div>

    <div class="col-12">
        <label for="contactNumber" class="form-label">Contact Number</label>
        <input type="tel" pattern="[0-9]{10}" name="contact_number" class="form-control" id="contactNumber" required>
        <div class="invalid-feedback">Please enter a valid contact number!</div>
    </div>

   
    <div class="col-12">
        <button class="btn btn-primary w-100" name="submit" type="submit">Create Account</button>
    </div>

    <div class="col-12">
        <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
    </div>
</form>

          
                  

                   

                </div>
              </div>

              <div class="credits">
                
                Designed by <a href="">PetConnect</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

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