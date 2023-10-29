<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Strong Password Generator</title>
</head>

<body>
    <h1>Strong Password Generator</h1>
    <form method="POST" action="generate_password.php">
        <label for="password_length">Password Length (8-16):</label>
        <input type="number" name="password_length" id="password_length" min="8" max="16" required>
        <button type="submit">Generate Password</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['error'])) {
        echo "<p style='color: red;'>Error: Password length must be between 8 and 64 characters.</p>";
    }
    ?>
</body>
</html>
