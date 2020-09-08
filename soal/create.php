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
    $returnData = msg(0, 404, 'Page Not Found');
    
}elseif (!isset($_POST['id_mata_pelajaran']) || !isset($_POST['text_soal']) || !isset($_POST['jawaban_a']) || !isset($_POST['jawaban_b']) ||
         !isset($_POST['jawaban_c']) || !isset($_POST['jawaban_d']) || !isset($_POST['text_jawaban']) ||
         empty(trim($_POST['id_mata_pelajaran'])) || empty(trim($_POST['text_soal'])) || empty(trim($_POST['jawaban_a'])) || empty(trim($_POST['jawaban_b'])) ||
         empty(trim($_POST['jawaban_c'])) || empty(trim($_POST['jawaban_d'])) || empty(trim($_POST['text_jawaban']))
        ){
    $field = ['Fields' => ['id_mata_pelajaran:', 'text_soal:', 'jawaban_a:', 'jawaban_b:', 'jawaban_c:', 'jawaban_d;', 'text_jawaban:']];
    $returnData = msg(0,401,'Field berikut wajib diisi',$field);

}else {
     $id_matpel = $_POST['id_mata_pelajaran'];
     $txt_soal = $_POST['text_soal'];
     $a = $_POST['jawaban_a'];
     $b = $_POST['jawaban_b'];
     $c = $_POST['jawaban_c'];
     $d = $_POST['jawaban_d'];
     $kunci = $_POST['text_jawaban'];

     //cek mata pelajaran kalau ada
     $chk_idm = "SELECT id_matpel FROM tb_matpel WHERE  id_matpel=:idmatpel";
     $stmt = $conn->prepare($chk_idm);
     $stmt->bindParam(":idmatpel", $id_matpel);
     $stmt->execute();
          
     if (!$stmt->rowCount()) {
         $returnData = msg(0,404,'Id Mata Pelajaran Tidak Ada');
     }else {
        if (empty($_FILES)) {
            $query = "INSERT INTO tb_soal(image_soal,id_matpel,txt_soal,jawab_a,jawab_b,jawab_c,jawab_d,kunci) 
                      VALUES(NULL, :id_matpel, :txt_soal, :jawab_a, :jawab_b, :jawab_c, :jawab_d, :kunci)";

            $statement = $conn->prepare($query);
            $statement->bindParam(":id_matpel", $id_matpel);
            $statement->bindParam(":txt_soal", $txt_soal);
            $statement->bindParam(":jawab_a", $a);
            $statement->bindParam(":jawab_b", $b);
            $statement->bindParam(":jawab_c", $c);
            $statement->bindParam(":jawab_d", $d);
            $statement->bindParam(":kunci", $kunci);
            $statement->execute();

            $returnData = msg(1,200,'Soal berhasil ditambahkan');
        }else{
           $ext_allow = array('png','jpg');
           $img_soal = $_FILES['image_soal']['name'];
           $x=explode('.' , $img_soal);
           $ext = strtolower(end($x));
           $size = $_FILES['image_soal']['size'];
           $tmp = $_FILES['image_soal']['tmp_name'];
           $path = '';

           try{
            if (in_array($ext, $ext_allow) === true) {
                if($size < 1044070){

                    switch($id_matpel){
                        case "1" :  move_uploaded_file($tmp, '../soal/img/b.indo/'.$img_soal);
                                    $path = '/soal/img/b.indo/'.$img_soal;
                                    break;
                        case "2" :  move_uploaded_file($tmp, '../soal/img/b.ing/'.$img_soal);
                                    $path = '/soal/img/b.ing/'.$img_soal;
                                    break;
                        case "3" :  move_uploaded_file($tmp, '../soal/img/matematika/'.$img_soal);
                                    $path = '/soal/img/matematika/'.$img_soal;
                                    break;
                        case "4" :  move_uploaded_file($tmp, '../soal/img/ipa/'.$img_soal);
                                    $path = '/soal/img/ipa/'.$img_soal;
                                    break;
                    }
                    
                    $query = "INSERT INTO tb_soal(image_soal,id_matpel,txt_soal,jawab_a,jawab_b,jawab_c,jawab_d,kunci) 
                              VALUES(:img_soal, :id_matpel, :txt_soal, :jawab_a, :jawab_b, :jawab_c, :jawab_d, :kunci)";

                     $statement = $conn->prepare($query);
                     $statement->bindParam(":img_soal",$path);
                     $statement->bindParam(":id_matpel", $id_matpel);
                     $statement->bindParam(":txt_soal", $txt_soal);
                     $statement->bindParam(":jawab_a", $a);
                     $statement->bindParam(":jawab_b", $b);
                     $statement->bindParam(":jawab_c", $c);
                     $statement->bindParam(":jawab_d", $d);
                     $statement->bindParam(":kunci", $kunci);
                     $statement->execute();

                     $returnData = msg(1,200,'Soal berhasil ditambahkan');
                }else {
                    $returnData = msg(0,300,'Ukuran Terlalu Besar');
                }
            }else {
                $returnData = msg(0,300, 'Ekstensi gambar tidak sesuai, masukkan jpg atau png');
            }
         }catch(PDOException $e){
             $returnData = msg(0,500, $e->getMessage());
         }
        }

     }
     
}
echo json_encode($returnData);
?>