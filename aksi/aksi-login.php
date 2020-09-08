<?php
include_once '../class/database.php';
include_once '../class/jwthandler.php';

$database = new Database();
$conn = $database->dbConnection();

session_start();
    if(isset($_POST['btnLogin'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $query = "SELECT * FROM tb_admin WHERE username = :username AND password = :pw";
        $statement = $conn->prepare($query);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":pw", $password);
        $statement->execute();

        $id = "";

        if($statement->rowCount()){
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['id'] = $row['id_admin'];
            $_SESSION['nama'] = $row['username'];

            //echo $_SESSION['id'];
            
            header('location:../?page=nis');

        }else {
            header('location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
?>