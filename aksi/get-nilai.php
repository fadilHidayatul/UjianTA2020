<?php
include_once 'class/database.php';

$database = new Database();
$conn = $database->dbConnection();

//getbindo
$query = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 1 ";
$statement = $conn->prepare($query);
$statement->execute();

//getbing
$query_ing = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 2 ";
$statement_bing = $conn->prepare($query_ing);
$statement_bing->execute();

//getmm
$query_ing = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 3 ";
$statement_mm = $conn->prepare($query_ing);
$statement_mm->execute();

//getmm
$query_ing = "SELECT u.username AS username, u.nis AS nis, n.nilai
         FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
         WHERE n.id_matpel = 4 ";
$statement_ipa = $conn->prepare($query_ing);
$statement_ipa->execute();


?>