<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

function msg($success,$status,$message,$extra = []){
    return array_merge([
        'success' => $success,
        'status' => $status,
        'message'=> $message
    ],$extra);
}

include_once '../class/database.php';

$database = new Database();
$conn = $database->dbConnection();

$returnData = [];

if($_SERVER["REQUEST_METHOD"]!= "GET"){
    $returnData = msg(0,404,'Page Not Found');
}elseif (!isset($_GET['id']) || empty(trim($_GET['id']))  ) {
    $field = ['fields' => ['id : ']];
    $returnData = msg(0,422,'Harap isi field berikut',$field);
}
else{
    $id = isset($_GET['id']) ? $_GET['id'] : die();

    $query = "SELECT * FROM tb_user WHERE id_user = :iduser";
    $statement = $conn->prepare($query);
    $statement->bindParam(":iduser", $id);
    $statement->execute();

    if(!$statement->rowCount()){
        $returnData = msg(0,422,'Id user tidak ditemukan');
    }else {
        $data = array();
        $data["data"] = array();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                "id_user" => $row['id_user'],
                "username" => $row['username'],
                "nis" => $row['nis']
            );
            array_push($data["data"], $item);
        }
        $returnData = msg(1,200,'Data didapatkan',$data);
    }


}
echo json_encode($returnData);
?>