<?php
header('Location: your_profile.php?eliminazione=success');
include("db_connection.php");
$db = Database::getInstance();
if(isset($_GET['idfoto']) and $_GET['idfoto']!=""){
    $where = array(
        "id" => $_GET['idfoto']
    );
    $result=$db->read_table("foto", $where);
    $row = $result->fetch_assoc();
    $path = $row['path'];
    unlink("foto/".$path);
    $db->delete("foto", $where);
}
else{
    header('Location: your_profile.php?eliminazione=error');
}
?>