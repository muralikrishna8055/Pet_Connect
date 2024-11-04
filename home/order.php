<?php
include('db_con.php'); // Include the database connection
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = $connection->real_escape_string($_POST['name']);
    $address = $connection->real_escape_string($_POST['address']);
    $city = $connection->real_escape_string($_POST['city']);
    $state = $connection->real_escape_string($_POST['state']);
    $zip = $connection->real_escape_string($_POST['zip']);
    $email = $connection->real_escape_string($_POST['email']);
    $phone = $connection->real_escape_string($_POST['phone']);
    $product_name = $connection->real_escape_string($_POST['product_name']);
    $product_id = $connection->real_escape_string($_POST['product_id']); 
    $quantity = (int)$_POST['quantity'];
    $price = (float)$_POST['price']; // Assuming it's passed in POST
    $total_price = $quantity * $price;

    // Insert data into the `orders` table
    $sql = "INSERT INTO orders (fullname, address, city, state, zip, email, phone, product_name, quantity, price, total_price,product_id)
            VALUES ('$name', '$address', '$city', '$state', '$zip', '$email', '$phone', '$product_name', $quantity, $price, $total_price,$product_id)";
    
    if ($connection->query($sql) === TRUE) {
        echo '<script>alert("Order placed successfully!");</script>';
        echo '<script>location.replace("product.php");</script>'; // Redirect page
        exit();
    } else {
        echo '<script>location.replace("product.php");</script>'; // Redirect page
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>
