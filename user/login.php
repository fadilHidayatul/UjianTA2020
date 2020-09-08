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
include_once '../class/jwthandler.php';

$database = new Database();
$conn = $database->dbConnection();

$returnData = [];

if($_SERVER["REQUEST_METHOD"] != "POST"){
    $returnData = msg(0, 404, 'Page Not Found');
}elseif (!isset($_POST['nis']) || !isset($_POST['password']) ||empty(trim($_POST['nis'])) || empty(trim($_POST['password'])) ) {
    $field = ['Fields' => ['email','password']];
    $returnData = msg(0,422, 'Please fill all required fields',$field);
}else {
    $nis = trim($_POST['nis']);
    $pass = trim($_POST['password']);
    

    if(strlen($pass) < 8){
        $returnData = msg(0,422,'Password Minimal 8 karakter');
    }else{
        try{
            $fetch_nis = "SELECT * FROM tb_user WHERE nis=:nis";
            $statement = $conn->prepare($fetch_nis);
            $statement->bindParam(":nis",$nis);
            $statement->execute();

            //jika nis ditemukan
            if ($statement->rowCount()) {
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $chk_pass = password_verify($pass, $row['password']);

                //jika password benar kirim token
                if($chk_pass){
                    $jwt = new JwtHandler();
                    $token = $jwt->_jwt_encode_data(
                                'http://localhost/db_ujian/',  
                                array("user_id" => $row['id_user'])//
                    );

                    $query = "UPDATE tb_user SET token=:token WHERE nis=:nis";
                    $up_token = $conn->prepare($query);
                    $up_token->bindParam(":token",$token);
                    $up_token->bindParam(":nis",$nis);
                    $up_token->execute();
                    

                    $returnData = [
                        'status' => 200,
                        'message' => 'Success Login',
                        'data' => array(
                            'id_user' =>$row['id_user'],
                            'username' => $row['username'],
                            'nis' => $row['nis'],
                            'token' => $token
                        ) 
                    ];
                }else {
                    $returnData = msg(0,422,'Password Salah');
                }
            }else{
                $returnData = msg(0,422,'Nis Belum Terdaftar');
            }

        }catch(PDOException $e){
            $returnData = msg(0,500,$e->getMessage());
        }
    }
}
echo json_encode($returnData);
?>