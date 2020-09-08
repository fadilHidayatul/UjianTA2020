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
    $returnData = msg(0,404,'Page Not Found');

}else{
    $id_matpel = isset($_GET['id_matpel']) ? $_GET['id_matpel'] : die();

    $query = "SELECT * FROM tb_matpel WHERE id_matpel = :id_matpel";
    $chk_matpel = $conn->prepare($query);
    $chk_matpel->bindParam(":id_matpel", $id_matpel);
    $chk_matpel->execute();
    
    if (!$chk_matpel->rowCount()) {
        $returnData = msg(0,422,'Id mata pelajaran tidak ada');
    }else{
        // $query = "SELECT tb_soal.* , tb_matpel.matpel AS matapelajaran FROM tb_soal,tb_matpel 
        //           WHERE tb_soal.id_matpel = tb_matpel.id_matpel ";
        $query = "SELECT m.matpel AS matapelajaran, m.waktu_ujian AS waktu, s.id_soal, s.image_soal, s.id_matpel, 
        s.txt_soal, s.jawab_a, s.jawab_b, s.jawab_c, s.jawab_d, s.kunci
        FROM tb_soal s LEFT JOIN tb_matpel m ON s.id_matpel = m.id_matpel 
        WHERE s.id_matpel = :idmatpel ORDER BY RAND() LIMIT 20";

        $statement = $conn->prepare($query);
        $statement->bindParam(":idmatpel", $id_matpel);
        $statement->execute();
    
        if($statement->rowCount() > 0){
            $data = array();
            $data["DATA"] = array();
    
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $item = array(
                    "id_soal" => $row['id_soal'],
                    "id_matpel" => $row['id_matpel'],
                    "mata_pelajaran" => $row['matapelajaran'],
                    "waktu_pengerjaan" => $row['waktu'],
                    "image_soal" => $row['image_soal'],
                    "text_soal" => $row['txt_soal'],
                    "a" => $row['jawab_a'],
                    "b" => $row['jawab_b'],
                    "c" => $row['jawab_c'],
                    "d" => $row['jawab_d'],
                    "kunci" => $row['kunci']
                );
                array_push($data["DATA"],$item);
            }
            $returnData = msg(1,200,'Data didapatkan',$data);
        }else{
            $returnData = msg(0,422,'Data tidak ditemukan');
        } 
    }

    
}
echo json_encode($returnData);
?>