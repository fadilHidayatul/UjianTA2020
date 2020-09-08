<?php
    include_once 'class/database.php';

    $database = new Database();
    $conn = $database->dbConnection();

    $query = "SELECT * FROM tb_nis";
    $statement = $conn->prepare($query);
    $statement->execute();

?>