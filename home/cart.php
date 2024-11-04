<?php
session_start(); // Start the session
include('db_con.php'); // Include the database connection

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check if the user is logged in
if (!isset($_SESSION['usr'])) {
    // If the user is not logged in, redirect to index.php
    echo '<script>location.replace("product.php");</script>';
    exit();
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the product ID from the form
    $product_id = mysqli_real_escape_string($connection, $_POST['submit']);
    $user_id = $_SESSION['usr']; // Assuming you store user ID in the session

    // Prepare the SQL statement to insert into the cart table
    $sql = "INSERT INTO cart (id,user_id, product_id) VALUES (0,'$user_id', '$product_id')";

    // Execute the query
    if (mysqli_query($connection, $sql)) {
        // Redirect or show success message
        echo '<script>alert("Product added to cart successfully!");</script>';
        echo '<script>location.replace("product.php");</script>'; // Redirect to the cart page
        exit();
    } else {
        // Display error message if the query fails
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>
