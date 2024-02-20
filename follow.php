<?php
session_start();
include "db_connection.php";


$db = Database::getInstance();
if(isset($_GET["id"]) and isset($_GET["action"])){
    $id = $_GET["id"];
    $action = $_GET["action"];
    if($action==1){
        $db->insert("follow", array("id_follower" => $_SESSION["id"], "id_followed" => $id), "ii");
        
    }
    else{
        $db->delete("follow", array("id_follower" => $_SESSION["id"], "id_followed" => $id), "ii");
    }
    header("Location: pagine_utente.php?id=".$id);
}
else{
    header("Location: index.php");
}

?>