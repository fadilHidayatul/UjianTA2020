<?php
include_once 'class/database.php';

$database = new Database();
$conn = $database->dbConnection();


    $mp = isset($_POST['id-matpel-chk']) ? $_POST['id-matpel-chk'] : die();    

    $query = "SELECT * FROM tb_soal WHERE id_matpel = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $mp);
    $stmt->execute();
    
?>