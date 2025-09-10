
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Walker Registration</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="login-container">
        <h2>Register as Walker</h2>
        <form class="form-box" action="register_walker_process.php" method="post" enctype="multipart/form-data">
            
            <label for="name">Full Name:</label>
            <input type="text" name="name" required>

            <label for="city">City:</label>
            <input type="text" name="city" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" required>

            <label for="profile_photo">Profile Photo:</label>
            <input type="file" name="profile_photo" accept="image/*" required>

            <label for="security_docs">Upload Security Documents:</label>
            <input type="file" name="security_docs[]" multiple required>

            <h3>Availability</h3>
            <label for="days">Days Available:</label><br>
            <input type="checkbox" name="days[]" value="Monday"> Monday
            <input type="checkbox" name="days[]" value="Tuesday"> Tuesday
            <input type="checkbox" name="days[]" value="Wednesday"> Wednesday
            <input type="checkbox" name="days[]" value="Thursday"> Thursday
            <input type="checkbox" name="days[]" value="Friday"> Friday
            <input type="checkbox" name="days[]" value="Saturday"> Saturday
            <input type="checkbox" name="days[]" value="Sunday"> Sunday
            <br><br>

            <label for="times">Preferred Times:</label>
            <input type="text" name="times" placeholder="e.g., 9am - 5pm">

            <h3>Questionnaire</h3>
            <label>Are you willing to work on a sliding scale?</label>
            <select name="sliding_scale">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br><br>

            <label>Are you willing to walk multiple dogs from the same owner at once?</label>
            <select name="multiple_dogs">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br><br>

            <label>Are you willing to do longer walks/appointments of up to 4 hours?</label>
            <select name="long_walks">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br><br>

            <label>Are you willing to travel up to 20km outside your local area?</label>
            <select name="travel">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select><br><br>

            <label>Preferred Contact Method:</label>
            <select name="contact_preference">
                <option value="In-App">In-App</option>
                <option value="Text">Text</option>
            </select><br><br>

            <button type="submit">Register</button>
        </form>
        <a href="../welcome.php" class="back-link">← Back to Home</a>
    </div>
</body>
</html>
