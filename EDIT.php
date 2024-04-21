<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lavender;
        }

        .wrapper {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-form input[type="text"],
        .contact-form input[type="number"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .contact-form textarea {
            height: 100px;
        }

        .contact-form button[type="submit"] {
            background-color: #6a5acd; /* lavender */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-form button[type="submit"]:hover {
            background-color: #483d8b; /* darkslateblue */
        }
    </style>
</head>



<?php
// Database connection parameters
$servername = 'localhost';
$dbname = 'new';    
$username = 'root';
$password = ''; 

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if it's an edit mode
$edit_mode = isset($_GET['edit']);

// Initialize variables to store form data
$name = '';
$phone = '';
$email = '';
$message = '';

// If it's in edit mode, retrieve existing data
if ($edit_mode) {
    // Retrieve information from the database or wherever you store it
    // For this example, I assume you have a function to fetch data based on an ID
    $id = $_GET['id']; // Assuming you pass the ID through GET method
    $sql = "SELECT name, phone, email, message FROM book WHERE id = $id";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $message = $row['message'];
    }
}

?>


<div class="wrapper">
<form action="<?php echo $edit_mode ? 'UPDATE.php' : 'SUBMIT.php'; ?>" method="post" class="contact-form">
<input type="text" name="name" placeholder="Name" required class="contact-input" value="<?php echo htmlspecialchars($name); ?>">
<input type="number" name="phone" placeholder="Phone Number" required class="contact-input" value="<?php echo htmlspecialchars($phone); ?>">
<input type="email" name="email" placeholder="Email" required class="contact-input" value="<?php echo htmlspecialchars($email); ?>">
<textarea name="message" placeholder="Message" required class="contact-input"><?php echo htmlspecialchars($message); ?></textarea>

    <button type="submit" class="btn-submit" value="Submit"><?php echo $edit_mode ? 'Update' : 'Submit'; ?></button>
</form>
</div>

</html>
