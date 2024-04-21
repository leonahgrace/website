<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="wrapper">
        <form action="UPDATE.php" method="post" class="contact-form">
            <?php
            // Retrieve information from URL parameters if they are set
            $name = isset($_GET['name']) ? $_GET['name'] : '';
            $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
            $email = isset($_GET['email']) ? $_GET['email'] : '';
            $message = isset($_GET['message']) ? $_GET['message'] : '';
            ?>
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
            <input type="text" name="name" placeholder="Name" required class="contact-input" value="<?php echo $name; ?>">
            <input type="number" name="phone" placeholder="Phone Number" required class="contact-input" value="<?php echo $phone; ?>">
            <input type="email" name="email" placeholder="Email" required class="contact-input" value="<?php echo $email; ?>">
            <textarea name="message" placeholder="Message" required class="contact-input"><?php echo $message; ?></textarea>
            <button type="submit" class="btn-submit" value="Submit">Update</button>
        </form>
    </div>
</body>
</html>
