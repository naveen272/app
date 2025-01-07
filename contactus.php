<?php
// Database configuration
$host = 'localhost';
$db = 'demo';
$user = 'root';
$password = ''; //Local
//$password = 'admin1234'; //Prod

// Connect to the database
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables for form values and errors
$name = $email = $contact_number = $address = $comments = "";
$success_message = $error_message = "";
$show_popup = false;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $comments = $conn->real_escape_string($_POST['comments']);

    // Validation
    if (!empty($name) && !empty($email)) {
        // Insert into database
        $sql = "INSERT INTO contacts (name, email, contact_number, address, comments) 
                VALUES ('$name', '$email', '$contact_number', '$address', '$comments')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Thank you! Your message. Our team will contact you shortly.";
            $show_popup = true; // Trigger the popup
            // Reset form values
            $name = $email = $contact_number = $address = $comments = "";
        } else {
            $error_message = "An error occurred: " . $conn->error;
        }
    } else {
        $error_message = "Please fill out the required fields (Name and Email).";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
@media (max-width: 768px) {
    body {
        background: url('background-mobile.jpg') no-repeat center center scroll;
        background-size: cover;
    }
}

        .container {
            max-width: 500px;
            margin: 10px auto;
            padding: 10px;
            background: rgba(255, 255, 255, 0.9); /* Add slight transparency to container */
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007BFF;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, textarea, button {
            width: 100%;
            padding: 2px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        @media (max-width: 768px) {
            .container {
                margin: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>

        <!-- Display error message -->
        <?php if ($error_message): ?>
            <p class="error" style="color: red; text-align: center;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <!-- Contact form -->
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Your Full Name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Your Email Address" required>
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" placeholder="Your Contact Number">
            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Your Address"><?php echo htmlspecialchars($address); ?></textarea>
            <label for="comments">Comments:</label>
            <textarea id="comments" name="comments" placeholder="Your Comments"><?php echo htmlspecialchars($comments); ?></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <footer class="w3-container">
        Powered by <a href="https://naveen.ddns.net/" target="_blank">Naveen</a>
        <a> © Copyright 2025</a> 
    </footer>

    <!-- JavaScript for Popup -->
    <?php if ($show_popup): ?>
    <script>
        alert("<?php echo $success_message; ?>");
        window.location.href = "index.php"; // Redirect to index page after clicking OK
    </script>
    <?php endif; ?>
</body>
</html>