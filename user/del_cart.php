<?php
session_start(); // Start the session
include('db_con.php'); // Include the database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is logged in
if (!isset($_SESSION['usr'])) {
    echo '<script>alert("You must be logged in to remove items from the cart.");</script>';
    echo '<script>location.replace("../home/index.php");</script>'; // Redirect to the login page
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $product_id = intval($_POST['id']); // Get the product ID from the form submission
    $user_id = $_SESSION['usr']; // Get the user ID (email) from the session

    // Prepare the SQL statement to delete the item from the cart
    $sql = "DELETE FROM cart WHERE user_id = ? AND product_id = ?";
    $stmt = $connection->prepare($sql);
    
    // Since user_id is VARCHAR, we bind it as a string
    $stmt->bind_param("si", $user_id, $product_id); // "s" for string (user_id), "i" for integer (product_id)

    if ($stmt->execute()) {
        // Deletion successful
        echo '<script>alert("Product removed from cart successfully.");</script>';
    } else {
        // Deletion failed
        echo '<script>alert("Error removing product from cart. Please try again.");</script>';
    }

    // Redirect back to the cart page
    echo '<script>location.replace("view_Cart.php");</script>';
    exit();
}

// Close the database connection
$connection->close();
?>
