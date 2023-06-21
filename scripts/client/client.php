<?php
class client extends connection{
    private $queryPost = 'INSERT INTO tb_client(identificacion,full_name,email,address,phone) VALUES(:cc,:name,:email,:direction,:cellphone)';
    private $queryGetAll = 'SELECT * FROM tb_client';
    private $queryDelete = 'DELETE FROM tb_client WHERE id = ?';
    private $message;
    use getInstance;
    function __construct(private $Identification, public $Full_Name, public $Email, private $Address, private $Phone){parent::__construct();}

    public function postClient(){
        try {
            $res = $this->conx->prepare($this->queryPost);
            $res->bindValue("email", $this->Email);
            $res->bindValue("cc", $this->Identification);
            $res->bindValue("name", $this->Full_Name);
            $res->bindValue("direction", $this->Address);
            $res->bindValue("cellphone", $this->Phone);
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