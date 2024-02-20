<?php
session_start();
include "db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        .table-container {
            margin-top: 20px;
        }
    </style>
    <script>
        function pulisci_textbox(){
            document.getElementById("search").value = "";
        }
        function open_details(id){
            window.location.href = "pagine_utente.php?id="+id;
        }
    </script>
</head>
<body class="container">
    <?php
    $db = Database::getInstance();
    if(isset($_SESSION["username"]) and $_SESSION["username"]!=""){
        echo "<p>Welcome, ".$_SESSION["username"]."</p>";
        echo "<a href='your_profile.php'><h3>Your Profile</h3></a>";
        echo "<a href='check.php?msg=logout'><h4>Logout</h4></a>";
    }
    else{
        echo "<a href='login.php'><h3>Sign Up</h3></a>";
    }
    ?>

    <h3>Search</h3>
    <form action="index.php" method="post" class="mb-3">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <?php
                if(isset($_POST['search']) and $_POST['search']!=""){
                    echo "<input type='text' name='search' id='search' class='form-control' placeholder='Search' value='".$_POST['search']."'>";
                }
                else{
                    echo "<input type='text' name='search' id='search' class='form-control' placeholder='Search'>";
                }
                ?>
            </div>
            <div class="col-auto">
                <button onclick="pulisci_textbox();" class="btn btn-secondary">X</button>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <div class="table-container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Username</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_POST['search']) and $_POST['search']!=""){
                    $where = array(
                        "user" => $_POST['search']
                    );
                    $result = $db->read_table("users", $where);
                }
                else{
                    $result = $db->read_table("users");
                }

                while($row = $result->fetch_assoc()) {
                    if(isset($_SESSION["username"]) and $_SESSION["username"]==$row["user"]){
                        continue;
                    }
                    echo "<tr onclick='open_details(".$row['id'].")'>";
                    
                    if(!($row["foto_profilo"]=="" or $row["foto_profilo"]==null)){
                        echo"<td><img  width='50' height='50' src='foto/".$row['foto_profilo']."' ></td>";}
                    else{
                        echo"<td><img width='50' height='50' src='foto/default.jpg' ></td>";
                        }
                    echo "<td>".$row["user"]."</td>";
                    echo "<td>".$row["descrizione"]."</td>";
                    echo "</tr>";
                }
                ?>
                
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
