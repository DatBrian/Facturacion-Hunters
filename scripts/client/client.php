<?php
class client extends connection{
    private $queryPost = 'INSERT INTO tb_client(identification,full_name,email,address,phone) VALUES(:cc,:name,:email,:direction,:cellphone)';
    private $queryGetAll = 'SELECT * FROM tb_client';
    private $queryGet = 'SELECT * FROM tb_client WHERE identification = ?';
    private $queryDelete = 'DELETE FROM tb_client WHERE id = ?';
    private $message;
    use getInstance;
    function __construct(private $identification, public $full_name, public $email, private $address, private $phone){parent::__construct();}

    public function postClient(){
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("email", $this->email);
            $res->bindValue("cc", $this->identification);
            $res->bindValue("name", $this->full_name);
            $res->bindValue("direction", $this->address);
            $res->bindValue("cellphone", $this->phone);
            $res->execute();
            $this->message = ["Code"=> 200+$res->rowCount(), "Message"=> "inserted data"];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function getAllClient(){
        try {
            $res = $this->conx->prepare($this->queryGetAll);
            $res->execute();
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch(\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function getClient($id){
        try{
            $res = $this -> conx -> prepare($this -> queryGet);
            $res -> execute([$id]);
            $this -> message = ["Code" => "200", "Message" => $res -> fetch(PDO::FETCH_ASSOC)];
        }catch(\PDOException $e){
            $this -> message = ["Code" => $e -> getCode(), "Message" => $res -> errorInfo()[2]];
        }
    }

    public function deleteClient($id){
        try{

            $res = $this -> conx -> prepare($this->queryDelete);
            $res -> execute([$id]);
            $this -> message = ["Code" => 200, "Message" => $res -> fetch(PDO::FETCH_ASSOC)];

        }catch(\PDOException $e){
            $this -> message = ["Code" => $e -> getCode(), "Message" => $res -> errorInfo()[2]];
        }
    }
}

?>