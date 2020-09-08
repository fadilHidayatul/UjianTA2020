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
    $returnData = msg(0,404, 'Page not found!');
}else {
    $query = "SELECT * FROM tb_matpel";
    $statement = $conn->prepare($query);
    $statement->execute();
    
    if($statement->rowCount() > 0){
        $data = array();
        $data["DATA"] = array();

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item = array(
                "id_matpel" => $row['id_matpel'],
                "matpel" => $row['matpel'],
                "waktu_ujian" =>$row['waktu_ujian']
            );
            array_push($data["DATA"],$item);
        }
        $returnData = msg(1,200,'Data didapatkan',$data);
    }else {
        $returnData = msg(0,422,'Data tidak ada');
    }
}
echo json_encode($returnData);
?>