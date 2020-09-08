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
    $returnData = msg(0,404, 'Page Not Found');
}else {
    $time = $_POST['waktu_ujian'];
    $id_matpel = isset($_GET['id_mata_pelajaran']) ? $_GET['id_mata_pelajaran'] : 0;

    $query = "SELECT * FROM tb_matpel WHERE id_matpel = :id_matpel";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id_matpel", $id_matpel);
    $stmt->execute();

    if(!$stmt->rowCount()){
        $returnData = msg(0,401,'Id Mata pelajaran yang di update tidak ada');
    }elseif($time<=0){
        $returnData = msg(0,405, 'Waktu yang dimasukkan tidak valid!!');
    }else {
        $query = "UPDATE tb_matpel SET waktu_ujian=:waktu WHERE id_matpel=:id_matpel";

        $statement = $conn->prepare($query);
        $statement->bindParam(":waktu", $time);
        $statement->bindParam(":id_matpel", $id_matpel);
        $statement->execute();

        $returnData = msg(1,201,'Waktu berhasil di update');
    }

}

echo json_encode($returnData);
?>