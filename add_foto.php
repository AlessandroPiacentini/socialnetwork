<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['msg']) && $_GET['msg']=="success"){
        echo "<p>aggiunta avvenuta con successo</p>";
    }
    ?>
    <form action="modifica_profilo.php"  method="post" enctype="multipart/form-data">
        <label for="img">img:</label>
        <input type="file" name="img" id="img" require>
        <input type="submit" value="carica foto">
    </form>
    <a href="index.php">home</a><br>
    <a href="your_profile.php">your profile</a>
</body>
</html>