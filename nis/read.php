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
        'message' => $message
    ],$extra);
}

include_once '../class/database.php';
$database = new Database();
$conn = $database->dbConnection();
$returnData = [];

if ($_SERVER["REQUEST_METHOD"] != "GET") {
    $returnData = msg(0,404,'Page not found');
} else {
    $query = "SELECT * FROM tb_nis";
    $statement = $conn->prepare($query);
    $statement->execute();
    
    if($statement->rowCount() > 0){
        $data = array();
        
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
               "id_nis" => $row['id_nis'],
               "nis" => $row['nis'],
               "nama_siswa" => $row['nama_siswa']    
            );
            array_push($data, $item);
        }

        $returnData = array(
            'status' => 200,
            'message' => 'Data didapatkan',
            'DATA' => $data
        );
        
    }else{
        $returnData = msg(0,422,'data tidak ditemukan');
    }
}
echo json_encode($returnData);
?>