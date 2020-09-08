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
}elseif (!isset($_POST['nis']) || !isset($_POST['nama_siswa'])|| empty($_POST['nis']) || empty($_POST['nama_siswa']) ) {
    $field = ['Field' => ['nis : ', 'nama siswa :']];
    $returnData = msg(0,422,'Harap isi semua field berikut',$field);
}else{
    $nis = isset($_POST['nis']) ? $_POST['nis'] : die();
    $nama = isset($_POST['nama_siswa']) ? $_POST['nama_siswa'] : die();

    $chk_nis = "SELECT * FROM tb_nis WHERE nis = :nis";
    $stmt = $conn->prepare($chk_nis);
    $stmt->bindParam(":nis", $nis);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if($data != null){
        $returnData = msg(0,422,'nis yang didaftarkan sudah ada!!!');
    }else{
        $query = "INSERT INTO tb_nis(nis,nama_siswa) VALUES (:nis,:namasiswa)";
        $statement = $conn->prepare($query);
        $statement->bindParam(":nis", $nis);
        $statement->bindParam(":namasiswa", $nama);
        $statement->execute();

        $returnData = msg(1,200,'nis berhasil ditambahkan');
    }
}

echo json_encode($returnData);
?>