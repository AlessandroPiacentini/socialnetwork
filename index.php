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
        <script>
            function open_details(id){
                window.location.href = "pagine_utente.php?id="+id;
            }
        </script>
         <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h3, h4 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    </head>
    <body>
        
        <?php
        $db = Database::getInstance();
        if(isset($_SESSION["username"]) and $_SESSION["username"]!=""){
            echo "Benvenuto ".$_SESSION["username"];
            echo "<a href='your_profile.php'><h3>Your Profile</h3></a>";
            echo "<a href='check.php?msg=logout'><h4>logout</h4></a>";
        }
        else{
            echo "<a href='login.php'><h3>iscriviti</h3></a>";
        }

           
        ?>
        

        <h3>Cerca</h3>
        <form action="index.php" method="post">
            <input type="text" name="search" placeholder="Cerca">
            <button type="submit">Cerca</button>
        </form>
        
        
        <table >
            <thead><tr><td>username</td><td>descrizione</td></tr></thead>
            <tbody>
        
        <?php
        if(isset($_POST['search']) and $_POST['search']!=""){
            $where = array(
                "user" => $_POST['search']
            );
            $result=$db->read_table("users", $where);

        }
        else{
            $result=$db->read_table("users");
        }

        $s="";
        while($row = $result->fetch_assoc()) {
            if(isset($_SESSION["username"]) and $_SESSION["username"]==$row["user"]){
                continue;
            }
            $s.="<tr><td onclick='open_details(".$row['id'].")'>".$row["user"]."</td><td onclick='open_details(".$row['id'].")'>".$row["descrizione"]."</td></tr>"; 
        }

        echo $s;
        ?>
        </tbody>
        </table>
    </body>
    
    </html>
