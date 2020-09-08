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
    ], $extra);
}

include_once '../class/database.php';
$database = new Database();
$conn = $database->dbConnection();
$returnData = [];

if($_SERVER["REQUEST_METHOD"]!="GET"){
    $returnData = msg(0,404,'Page Not Found');

}elseif(!isset($_GET['nama/nis']) || empty($_GET['nama/nis'])){
    $field = ['fields' => ['nama/nis:']];
    $returnData = msg(0, 422, 'Harap isi paramater berikut untuk menemukan pencarian',$field);

}else {
    $search = isset($_GET['nama/nis']) ? $_GET['nama/nis'] : "";
    $keyword = htmlspecialchars(strip_tags($search));
    $keyword = "%{$keyword}%";

    $query = "SELECT * FROM tb_nis WHERE nis LIKE ? OR nama_siswa LIKE ? ORDER BY id_nis";
    $statement = $conn->prepare($query);
    $statement->bindParam(1, $keyword);
    $statement->bindParam(2, $keyword);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $data = array();
        $data["DATA"] = array();

        while($num = $statement->fetch(PDO::FETCH_ASSOC)){
            extract($num);
            $item = array(
                "id_nis" => $num['id_nis'],
                "nis" => $num['nis'],
                "nama_siswa" => $num['nama_siswa']
            );
            array_push($data["DATA"],$item);
        }
        
        $returnData = msg(1,200,'data ditemukan',$data);
    }else {
        $returnData = msg(1,200,'data tidak ditemukan');
    }


    
}

echo json_encode($returnData);
?>