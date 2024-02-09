<?php
session_start();
include("db_connection.php");
$db = Database::getInstance();
$fields=array();
$where = array(
    "id" => $_SESSION['id']
);
if(isset($_POST['username']) and $_POST['username']!=""){
    $username = $_POST['username']; 
    $fields["user"]=$username;
    $_SESSION['username']=$username;
}
if(isset($_POST['password'])and $_POST['password']!=""){
    $password = $_POST['password'];
    $fields["password"]=$password; 
}
if(isset($_POST['descrizione']) and $_POST['descrizione']!=""){
    $descrizione = $_POST['descrizione']; 
    $fields["descrizione"]=$descrizione;
}
if(count($fields)>0){
    $db->updateTable("users", $fields, $where);
    header("Location: your_profile.php?msg=success");
}



if(isset($_FILES['img'])){
    //Costruisco il path completo di destinazione
    $uploaddir = 'C:/xampp/htdocs/Piacentini/php/socialnetwork/foto/'; //La cartella uploads in htdocs deve essere gi� creata!
    $nome_file = basename($_FILES['img']['name']);
    $uploadfile = $uploaddir . $nome_file;

    //$_FILES['img']['tmp_name']: Il nome del file temporaneo in cui il file caricato � salvato sul server.
    if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
        
        $db->insert("foto", array("id_user" => $_SESSION['id'], "path" => $nome_file));
        // $db->insert_foto($_SESSION['id'], $nome_file);
        header("Location: add_foto.php?msg=success");
    }
}
?>