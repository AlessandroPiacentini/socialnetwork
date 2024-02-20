<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Photo</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <?php
    if(isset($_GET['msg']) && $_GET['msg']=="success"){
        echo "<div class='alert alert-success'>Aggiunta avvenuta con successo</div>";
    }
    ?>
    <h2 class="mt-3">Upload Photo</h2>
    <form action="modifica_profilo.php" method="post" enctype="multipart/form-data" class="mb-3">
        <div class="form-group">
            <label for="img">Image:</label>
            <input type="file" name="img" id="img" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Carica Foto</button>
    </form>
    <a href="index.php" class="btn btn-secondary">Home</a><br>
    <a href="your_profile.php" class="btn btn-secondary">Your Profile</a>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
