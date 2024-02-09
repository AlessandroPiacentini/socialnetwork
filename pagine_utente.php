<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
    <?php
    include "db_connection.php";
    $db = Database::getInstance();
    $id = $_GET["id"];
    $where = array(
        "id" => $id
    );
    $result = $db->read_table("users", $where, "i");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3 class='mt-3'>".$row["user"]."</h3>";
        echo "<h4 class='mt-3'>".$row["descrizione"]."</h4>";
    }

    $where = array(
        "id_user" => $id
    );
    $result = $db->read_table("foto", $where, "i");
    if ($result->num_rows > 0) {
        echo "<div class='row'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='col-md-3 mb-3'>";
            echo "<img src='foto/".$row["path"]."' class='img-fluid'>";
            echo "</div>";
        }
        echo "</div>";
    }
    ?>
    <a href='index.php' class='btn btn-secondary mt-3'>Home</a>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
