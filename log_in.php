<?php
session_start();
require './models/login_validator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $login = new Login_Validator($_POST);

    $errors = $login->validate_login();

    var_dump($_SESSION['logged_in']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Page - Log in to access to the admin dashboard</title>
    <link rel="stylesheet" href="./assets/css/basics.css">
</head>
<body>
    <main>
        <h1>Authentification page</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <label for="username">Username</label>
            <input name="username" id="username" type="text">
            <div <?php echo (isset($errors['username'])) ? 'class="error"' : ""; ?>><?php echo $errors['username'] ?? '' ?></div>
            <label for="password">Password</label>
            <input name="password" id="username" type="password">
            <div <?php echo (isset($errors['password'])) ? 'class="error"' : ""; ?>><?php echo $errors['password'] ?? '' ?></div>
            <button type="submit" value="submit">Log In</button>
        </form>
    </main>
</body>
</html>