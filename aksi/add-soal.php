<?php
    include_once '../class/database.php';

    $database = new Database();
    $conn = $database->dbConnection();

    if(isset($_POST['btnSoal'])){
        $matpel = $_POST['id-matpel'];
        $txt_soal = $_POST['teks'];
        $a = $_POST['A'];
        $b = $_POST['B'];
        $c = $_POST['C'];
        $d = $_POST['D'];
        $kunci = $_POST['kunci'];
        $url = '';

        if (empty($_FILES["image"]["tmp_name"])) {
            $query = "INSERT INTO tb_soal(image_soal,id_matpel,txt_soal,jawab_a,jawab_b,jawab_c,jawab_d,kunci) 
                      VALUES(NULL, :id_matpel, :txt_soal, :jawab_a, :jawab_b, :jawab_c, :jawab_d, :kunci)";
            $statement = $conn->prepare($query);
            $statement->bindParam(":id_matpel", $matpel);
            $statement->bindParam(":txt_soal", $txt_soal);
            $statement->bindParam(":jawab_a", $a);
            $statement->bindParam(":jawab_b", $b);
            $statement->bindParam(":jawab_c", $c);
            $statement->bindParam(":jawab_d", $d);
            $statement->bindParam(":kunci", $kunci);
            $statement->execute();

            header('Location:../?page=soal&status=berhasil');

        }else{
            $ext_allow = array('png','jpg');
            $img_soal = $_FILES['image']['name'];
            $x=explode('.' , $img_soal);
            $ext = strtolower(end($x));
            $size = $_FILES['image']['size'];
            $tmp = $_FILES['image']['tmp_name'];
            $path = '';

            try{
                if (in_array($ext, $ext_allow) === true) {
                    if($size < 1044070){
    
                        switch($matpel){
                            case "1" :  copy($tmp, '../soal/img/b.indo/'.$img_soal);
                                        $path = '/soal/img/b.indo/'.$img_soal;
                                        break;
                            case "2" :  copy($tmp, '../soal/img/b.ing/'.$img_soal);
                                        $path = '/soal/img/b.ing/'.$img_soal;
                                        break;
                            case "3" :  copy($tmp, '../soal/img/matematika/'.$img_soal);
                                        $path = '/soal/img/matematika/'.$img_soal;
                                        break;
                            case "4" :  copy($tmp, '..soal/img/ipa/'.$img_soal);
                                        $path = '/soal/img/ipa/'.$img_soal;
                                        break;
                        }
                        
                        $query = "INSERT INTO tb_soal(image_soal,id_matpel,txt_soal,jawab_a,jawab_b,jawab_c,jawab_d,kunci) 
                                  VALUES(:img_soal, :id_matpel, :txt_soal, :jawab_a, :jawab_b, :jawab_c, :jawab_d, :kunci)";
                         $statement = $conn->prepare($query);
                         $statement->bindParam(":img_soal",$path);
                         $statement->bindParam(":id_matpel", $matpel);
                         $statement->bindParam(":txt_soal", $txt_soal);
                         $statement->bindParam(":jawab_a", $a);
                         $statement->bindParam(":jawab_b", $b);
                         $statement->bindParam(":jawab_c", $c);
                         $statement->bindParam(":jawab_d", $d);
                         $statement->bindParam(":kunci", $kunci);
                         $statement->execute();
    
                         header('Location:../?page=soal&status=berhasil');
                         
                    }else {
                        header('Location:../?page=soal&status=gambar');
                    }
                }else {
                    header('Location:../?page=soal&status=format');
                }
             

        }catch(PDOException $e){
            echo $e;
        }
    
    }
}
?>