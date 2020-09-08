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
    $returnData = msg(0,404,'Page Not Found');
}elseif (!isset($_POST['nis']) || empty($_POST['nis']) ) {
    $field = ['Fields' => ['nis:']];
    $returnData = msg(0,422, 'Isi nis yang akan dihapus',$field);
}
else{
    $nis = isset($_POST['nis']) ? $_POST['nis'] : die();

    $query = "SELECT * FROM tb_nis WHERE nis = :nis";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":nis", $nis);
    $stmt->execute();

    $isi = $stmt->fetch(PDO::FETCH_ASSOC);

    if($isi['nis'] != $nis){
        $returnData = msg(0,300, 'nis yang diinputkan tidak ada!');
    }else{
        $query = "DELETE FROM tb_nis WHERE nis = :nis";
        $statement = $conn->prepare($query);
        $statement->bindParam(":nis", $nis);
        $statement->execute();
        $returnData = msg(1,200, 'nis berhasil dihapus');
    }
}

echo json_encode($returnData);
?>