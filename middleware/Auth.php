<?php
require __DIR__.'/../class/jwthandler.php';

class Auth extends JWTHandler{
    protected $db;
    protected $header;
    protected $token;

    public function __construct($db,$header){
        parent::__construct();
        $this->db = $db;
        $this->header = $header;
    }

    public function isAuth(){
        if(array_key_exists('Authorization',$this->header) && !empty(trim($this->header['Authorization']))){
            $this->token = explode("", trim($this->header['Authorization']));

            if(isset($this->token[1]) && !empty(trim($this->token[1]))){
                $data = $this->_jwt_decode_data($this->token[1]);

                if(isset($data['auth']) && isset($data['data']->user_id) && $data['auth']){
                    $user = $this->fetchUser($data['data']->user_id);
                    return $user;
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    protected function fetchUser($user_id){
        try{
            $fetch_user_by_id = "SELECT username,email FROM tb_user WHERE id=:id";
            $statement = $this->db->prepare($fetch_user_by_id);
            $statement->bindParam(":id", $user_id);
            $statement->execute();

            if($statement->rowCount()){
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                return [
                    'success' => 1,
                    'status' => 200,
                    'user' => $row
                ];
            }else{
                return null;
            }

        }catch(PDOException $e){
            return null;
        }
    }

}
?>