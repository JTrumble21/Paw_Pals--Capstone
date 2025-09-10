<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In - Paw Pals</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <img src="assets/images/welcome.png" alt="Paw Pals Logo" class="logo">
        <h1>Log In</h1>

        <form action="login_process.php" method="POST" class="form-box">
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <button type="submit" class="button">Log In</button>
        </form>

        <a href="welcome.php" class="back-link">← Back to Home</a>
    </div>
</body>
</html>
