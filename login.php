<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($_GET['error'])) { 
        echo "<p>Invalid username or password</p>";
     } ?>
    <form action="check.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button name="login" type="submit">Login</button>
    </form>
    se non sei registrato <a href="sign-in.php">clicca qui</a><br>
    <a href='index.php' >Home</a>

</body>
</html>