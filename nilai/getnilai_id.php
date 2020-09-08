<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message' => $message
    ],$extra);
}

include_once '../class/database.php';
$database = new Database();
$conn = $database->dbConnection();
$returnData = [];

if($_SERVER["REQUEST_METHOD"]!="GET"){
    $returnData = msg(0,404,'Page Not Found');
}else{
    $idUser = isset($_GET['id_user']) ? $_GET['id_user'] : die();
    $query = "SELECT u.username AS username, n.id_nilai, n.id_user, n.id_matpel, n.nilai 
    FROM tb_nilai n LEFT JOIN tb_user u ON n.id_user = u.id_user
    WHERE n.id_user = :iduser ORDER BY n.id_matpel";

    $statement = $conn->prepare($query);
    $statement->bindParam(":iduser",$idUser);
    $statement->execute();

    if(!$statement->rowCount()){
        $returnData = msg(0,422, 'nilai tidak ada!!');
    }else{
        $data = array();
        $data["DATA"] = array();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $item = array(
                "id_nilai" => $row['id_nilai'],
                "id_user" => $row['id_user'],
                "username" => $row['username'],
                "id_matpel" => $row['id_matpel'],
                "nilai" => $row['nilai']
            );
            array_push($data["DATA"],$item);
        }

        $returnData = msg(1,200,'nilai ada!!',$data);
    }
}
echo json_encode($returnData);
?>