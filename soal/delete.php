<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json, charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

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

if($_SERVER["REQUEST_METHOD"] != "POST"){
    $returnData = msg(0,404,'Page not found');
}elseif (!isset($_POST['id_soal']) ||empty($_POST['id_soal']) ) {
    $field = ['Fields' => ['id_soal : ']];
    $returnData = msg(0,422,'Field berikut wajib diisi',$field);
}else {
    $id_soal = isset($_POST['id_soal']) ? $_POST['id_soal'] : 0 ;

    $query = "SELECT * FROM tb_soal WHERE id_soal=:id_soal";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id_soal", $id_soal);
    $stmt->execute();

    if(!$stmt->rowCount()){
        $returnData = msg(0,422,'Id yang dimasukkan tidak ada');
    }else{
        $query = "DELETE FROM tb_soal WHERE id_soal=:id_soal";
        $statement = $conn->prepare($query);
        $statement->bindParam(":id_soal", $id_soal);
        $statement->execute();
        $returnData = msg(1,200,'Soal berhasil dihapus');
    }
    
    
}

echo json_encode($returnData);
?>