<?php
session_start(); // Start the session


unset($_SESSION['admin']); // Unset the user session variable

// Redirect to the login page (or index.php)
echo "<script>location.replace('admin_login.php');</script>";
exit; // Exit to ensure no further code is executed
?>