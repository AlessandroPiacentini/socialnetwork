<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Profilo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    // if(isset($_SESSION["username"])){
    //     ?>
    
        <h3 class="mt-3">Modifica Profilo</h3>
        <form action="modifica_profilo.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="foto_profilo">foto Profilo:</label>
                <input type="file" name="foto_profilo" class="form-control" id="foto_profilo" >
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" name="descrizione" class="form-control" placeholder="Descrizione">
            </div>
            <button type="submit" class="btn btn-primary">Modifica</button>
        </form>
        <a href="index.php" class="btn btn-secondary mt-3">Home</a>
    <?php
    // } else {
    //     echo "<a href='login.php' class='btn btn-primary mt-3'>Login</a>";
    //     echo "<a href='index.php' class='btn btn-secondary mt-3'>Home</a>";
    // }
    ?> 

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
