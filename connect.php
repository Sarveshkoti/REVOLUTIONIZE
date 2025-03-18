<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data and sanitize it
    $name = htmlspecialchars($_POST['name']);
    $recycle_device = htmlspecialchars($_POST['recycle_device']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $location = htmlspecialchars($_POST['location']);
    $pickup_time = htmlspecialchars($_POST['pickup-time']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // Store the data in a file (you can replace this with a database or other methods)
    $file = 'recycling_requests.txt';

    // Create a string with all the collected data
    $request_data = "Name: $name\nDevice: $recycle_device\nQuantity: $quantity\nLocation: $location\nPickup Time: $pickup_time\nEmail: $email\nPhone: $phone\n\n";
    
    // Append the data to the file
    file_put_contents($file, $request_data, FILE_APPEND);

    // Optionally, you can send an email confirmation here

    // Redirect to a confirmation page or display a success message
    echo "<script>alert('Your recycling request has been submitted successfully!'); window.location.href = 'thank_you.html';</script>";
} else {
    // If the form is not submitted via POST, redirect to the homepage or form page
    header("Location: index.html");
    exit;
}
?>
