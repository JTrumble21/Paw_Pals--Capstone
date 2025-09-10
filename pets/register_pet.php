<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register a Pet - Paw Pals</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="login-container">
        <h2>Register Your Pet</h2>
        <form class="form-box" action="process_register_pets.php" method="post" enctype="multipart/form-data">
            
            <input type="text" name="name" placeholder="Pet Name" required>
           
            <input type="text" name="breed" placeholder="Breed" required>
           
            <input type="number" name="age" placeholder="Age (in years)" min="0" required>
            
            <textarea name="requirements" placeholder="Special Requirements" rows="3"></textarea>
            
            <label for="photo">Pet Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
           
            <button type="submit" name="action" value="add">Add Pet</button>
            <button type="submit" name="action" value="done">Finish & Back to Home</button>
        </form>

        <a href="../welcome.php" class="back-link">Back to Home</a>
    </div>
</body>
</html>
