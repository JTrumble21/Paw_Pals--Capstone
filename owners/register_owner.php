<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register as Owner - Paw Pals</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="login-container">
        <h2>Register as Owner</h2>
        <form class="form-box" action="process_register_owner.php" method="post" enctype="multipart/form-data">
            
            <input type="text" name="name" placeholder="Full Name" required>
         
            <input type="text" name="city" placeholder="City" required>
            
            <input type="email" name="email" placeholder="Email" required>
            
            <input type="tel" name="phone" placeholder="Phone Number" required>
            
            <label for="photo">Profile Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
            
            <button type="submit">Register</button>
        </form>

        <a href="../welcome.php" class="back-link">Back to Home</a>
    </div>
</body>
</html>
