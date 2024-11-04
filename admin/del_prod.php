<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection
include('db_con.php');

// Start the session
session_start();

// Check if 'id' is set in the POST request
if (isset($_POST['id'])) {
    $vID = $_POST['id'];

    // Prepare the SQL delete query
    $stmt = $connection->prepare("DELETE FROM product WHERE id = ?");
    
    // Bind the parameter
    $stmt->bind_param("i", $vID); // Assuming 'id' is an integer

    // Execute the query
    if ($stmt->execute()) {
        echo "Product deleted successfully.";
        // Redirect or show a success message
        header("Location: view_product.php"); // Change to the page you want to redirect to
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

// Close the database connection
$connection->close();
?>
