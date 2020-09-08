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

if($_SERVER["REQUEST_METHOD"]!= "POST"){
    $returnData = msg(0,404,'Page Not Found');

}else {
    $id_soal = isset($_GET['id_soal']) ? $_GET['id_soal'] : die();
    $id_matpel = isset($_POST['id_mata_pelajaran']) ? $_POST['id_mata_pelajaran'] : die();
    $txt_soal = isset($_POST['teks_soal']) ? $_POST['teks_soal'] : "" ;
    $a = isset($_POST['jawaban_a']) ? $_POST['jawaban_a'] : "";
    $b = isset($_POST['jawaban_b']) ? $_POST['jawaban_b'] : "";
    $c = isset($_POST['jawaban_c']) ? $_POST['jawaban_c'] : "";
    $d = isset($_POST['jawaban_d']) ? $_POST['jawaban_d'] : "";
    $kunci = isset($_POST['teks_jawaban']) ? $_POST['teks_jawaban'] : "";


    //menyeleksi id soal yang tidak ada
    $query = "SELECT * FROM tb_soal WHERE id_soal = :id_soal";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id_soal", $id_soal);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    //menyeleksi id matpel yang tidak ada
    $querymatpel = "SELECT * FROM tb_matpel WHERE id_matpel = :id_matpel";
    $mp = $conn->prepare($querymatpel);
    $mp->bindParam(":id_matpel", $id_matpel);
    $mp->execute();

    $path ='';
    //$link = str_replace("/ujianTA", "..", $data['image_soal']);
    

    if(!$stmt->rowCount()){
        $returnData = msg(0,422,'Id soal yang dimasukkan tidak ada'); 
    }
    elseif (!$mp->rowCount()) {
        $returnData = msg(0,422,'id mata pelajaran tidak ada'); 
    }
    else{
        if(empty($_FILES)){
            //unlink($link);
            
            $query = "UPDATE tb_soal 
                      SET image_soal=NULL, id_matpel=:id_matpel, txt_soal=:soal, jawab_a=:a, jawab_b=:b, jawab_c=:c, jawab_d=:d, kunci=:kunci
                      WHERE id_soal=:id_soal";

            $statement = $conn->prepare($query);
            $statement->bindParam(":id_matpel", $id_matpel);
            $statement->bindParam(":soal", $txt_soal);
            $statement->bindParam(":a", $a);
            $statement->bindParam(":b", $b);
            $statement->bindParam(":c", $c);
            $statement->bindParam(":d", $d);
            $statement->bindParam(":kunci", $kunci);
            $statement->bindParam(":id_soal", $id_soal);
            $statement->execute();

            $returnData = msg(1,200,'Soal berhasil di update');
        }else{
            $allow = array('png','jpg');
            $name = $_FILES['image_soal']['name'];
            $x = explode('.',$name);
            $ext = strtolower(end($x));
            $size = $_FILES['image_soal']['size'];
            $tmp = $_FILES['image_soal']['tmp_name'];
            

            if(in_array($ext, $allow) === true){
                if($size <1044070){
                    unlink($data['image_soal']); 
                    switch ($id_matpel) {
                        case '1': move_uploaded_file($tmp, '../soal/img/b.indo/'.$name);
                                  $path = '/soal/img/b.indo/'.$name;
                                  break;
                        case '2': move_uploaded_file($tmp, '../soal/img/b.ing/'.$name);
                                  $path = '/soal/img/b.ing/'.$name;
                                  break;
                        case '3': move_uploaded_file($tmp, '../soal/img/matematika/'.$name);
                                  $path = '/soal/img/matematika/'.$name;
                                  break;
                        case '4': move_uploaded_file($tmp, './soal/img/ipa/'.$name);
                                  $path = '/soal/img/ipa/'.$name;
                                  break;
                    }

                    $query = "UPDATE tb_soal 
                              SET image_soal=:image_soal, id_matpel=:id_matpel, txt_soal=:txt_soal, jawab_a=:a, jawab_b=:b, jawab_c=:c, jawab_d=:d, kunci=:kunci
                              WHERE id_soal=:id_soal";

                    $statement = $conn->prepare($query);
                    $statement->bindParam(":image_soal", $path);
                    $statement->bindParam(":id_matpel", $id_matpel);
                    $statement->bindParam(":txt_soal", $txt_soal);
                    $statement->bindParam(":a", $a);
                    $statement->bindParam(":b", $b);
                    $statement->bindParam(":c", $c);
                    $statement->bindParam(":d", $d);
                    $statement->bindParam(":kunci", $kunci);
                    $statement->bindParam(":id_soal", $id_soal);
                    $statement->execute();

                    $returnData = msg(1,200,'Soal berhasil di update');

                }else {
                    $returnData = msg(0,300,'Ukuran gambar terlalu besar');
                }
            }else {
                $returnData = msg(0,300,'Ekstensi gambar tidak sesuai, masukkan jpg atau png');
            }
        }
    } 
}

echo json_encode($returnData);
?>