<?php 
session_start();
include("db_connection.php");
$db = Database::getInstance();
if(isset($_POST['login'])){
    if(!isset($_POST['username']) || !isset($_POST['password'])){
        header("Location: login.php?error=1");
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Definire i parametri
    $where = array(
        "user" => $username,
        "password" => $password
    );

    // Chiamare la funzione read_table
    $result = $db->read_table("users", $where);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $_SESSION["username"]=$username;
        $_SESSION["id"]=$id;
        header("Location: index.php");
    }
    else{
        header("Location: login.php?error=1");
    }
    
}
else if(isset($_POST['sign-in'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $where = array(
        "user" => $username
    );
    $result = $db->read_table("users", $where);
    if($result->num_rows > 0){
        header("Location: sign-in.php?error=2");
    }
    else{
        $db->insert_user($username, $password, "");
        // Definire i parametri
        $where = array(
            "user" => $username,
            "password" => $password
        );

        // Chiamare la funzione read_table
        $result = $db->read_table("users", $where, "ss");
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $_SESSION["username"]=$username;
        $_SESSION["id"]=$id;

        header("Location: index.php");  
    }
}
else if(isset($_GET["msg"]) and $_GET["msg"]=="logout"){
    $_SESSION["username"]="";
    $_SESSION["id"]="";
    header("Location: index.php");
}
