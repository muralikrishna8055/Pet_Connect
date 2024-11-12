<?php
session_start(); // Start the session


unset($_SESSION['doctor_id']); // Unset the user session variable

// Redirect to the login page (or index.php)
echo "<script>location.replace('login.php');</script>";
exit; // Exit to ensure no further code is executed
?>