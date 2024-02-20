<?php
session_start();
include "db_connection.php";
$db = Database::getInstance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Aggiungere qui eventuali regole CSS personalizzate */
    </style>
</head>
<body class="container">
    <?php
    if(isset($_SESSION["username"])){
        echo "<h4 class='mt-3'>Benvenuto ".$_SESSION["username"]."</h4>";
        if(isset($_GET['eliminazione']) && $_GET['eliminazione']=="success"){
            echo "<p class='alert alert-success'>eliminazione avvenuta con successo<p>";
        } else if(isset($_GET['eliminazione']) && $_GET['eliminazione']=="error"){
            echo "<p class='alert alert-danger'>Errore</p>";
        }
        $id=$_SESSION["id"];
        
        
        if(isset($_GET['msg']) && $_GET['msg']=="success"){
            echo "<p class='alert alert-success'>Modifica avvenuta con successo</p>";
        } else if(isset($_GET['msg']) && $_GET['msg']=="error"){
            echo "<p class='alert alert-danger'>Errore</p>";
        }
        $where = array(
            "id_followed" => $id
        );
        $result = $db->read_table("follow", $where, "i");
        $n_followers = $result->num_rows;
        echo "<h4 class='mt-3'>Followers: ".$n_followers."</h4>";
        ?>
        
        
        <?php 
        if(isset($_SESSION["id"])){
            $where = array(
                "id" => $_SESSION["id"]
            );
        
            $result= $db->read_table("users" , $where, "i");
            $row = $result->fetch_assoc();


            if(!($row["foto_profilo"]=="" or $row["foto_profilo"]==null)){
                echo"<img  width='200' height='200' src='foto/".$row['foto_profilo']."' >";}
            else{
                echo"<img width='200' height='200' src='foto/default.jpg' >";
            }
            echo "<h3 class='mt-3'>Descrizione</h3>";
            echo "<h4>".$row["descrizione"]."</h4>";
        }

        echo "<h3 class='mt-3'>Foto</h3>";
        $where = array(
            "id_user" => $id
        );
        $result=$db->read_table("foto", $where);
        if($result->num_rows > 0){
            echo "<div class='row'>";
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-3 col-sm-6'>";
                echo "<img src='foto/".$row["path"]."' class='img-fluid'>";
                echo "<a href='elimina_foto.php?idfoto=".$row['id']."' class='btn btn-secondary mt-3'>elimina</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?> 
        
        <a href="personalizza_profilo.php" class="btn btn-success mt-3">Modifica Profilo</a>
        <a href="add_foto.php" class="btn btn-success mt-3">Aggiungi Foto</a>
        <a href="index.php" class="btn btn-secondary mt-3">Home</a>
        <a href="check.php?msg=logout" class="btn btn-danger mt-3">Logout</a>
    <?php
    } else {
        echo "<a href='login.php' class='btn btn-primary mt-3'>Login</a>";
        echo "<a href='index.php' class='btn btn-secondary mt-3'>Home</a>";
    }
    ?>
    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
