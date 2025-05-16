<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars($_POST['fullName'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $dob = htmlspecialchars($_POST['dob'] ?? '');
    $location = htmlspecialchars($_POST['location'] ?? '');
    $zipCode = htmlspecialchars($_POST['zipCode'] ?? '');
    $preferredCities = htmlspecialchars($_POST['preferredCities'] ?? '');
    $terms = isset($_POST['terms']) ? 'Agreed' : 'Not Agreed';

    echo "<h1>Form Submission Received</h1>";
    echo "<p><strong>Full Name:</strong> $fullName</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>Location:</strong> $location</p>";
    echo "<p><strong>Zip Code:</strong> $zipCode</p>";
    echo "<p><strong>Preferred City:</strong> $preferredCities</p>";
    echo "<p><strong>Terms and Conditions:</strong> $terms</p>";
} else {
    echo "<p>Invalid request method.</p>";
}
?>
