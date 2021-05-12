<?php

    include("classes/class.DB.php");

    class Professor{
        private $Id;
        private $nome;
        private $especialidade;
        private $idade;
        private $email;

        public function __construct($id=false) {
            if($id){
                $sql = "SELECT * FROM professor where id = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                foreach($stmt as $obj){
                    $this->setId($obj['id']);
                    $this->setNome($obj['nome']);
                    $this->setEspecialidade($obj['especialidade']);
                    $this->setIdade($obj['idade']);
                    $this->setEmail($obj['email']);
                }
            }
            }
            



        public function setId($id){
            $this->id = $id;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setEspecialidade($especialidade){
            $this->especialidade = $especialidade;
        }
        
        public function setIdade($idade){
            $this->idade = $idade;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getId(){
            return $this->id;
        }
        public function getNome(){
            return $this->nome;
        }
        public function getEspecialidade(){
            return $this->especialidade;
        }
        public function getIdade(){
            return $this->idade;
        }

        public function getEmail(){
            return $this->email;
        }


        public function adicionar(){
            $sql = "INSERT INTO professor(id, nome, especialidade, idade, email) VALUES (:id, :nome, :especialidade, :idade, :email)";

            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':especialidade', $this->especialidade);
            $stmt->bindParam(':idade', $this->idade);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
        }


        public static function listar(){

            $sql ="SELECT * FROM professor";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll();

            if($registros){

                $itens = array();

                foreach($registros as $registro){
                    $temporario = new Professor();
                    $temporario->setId($registro['id']);
                    $temporario->setNome($registro['nome']);
                    $temporario->setEspecialidade($registro['especialidade']);
                    $temporario->setIdade($registro['idade']);
                    $temporario->setEmail($registro['email']);
                    $itens[]= $temporario;  
                }
                return $itens;
            }
            return false; 
        }

        

        public function excluir(){
            if($this->id){
    
            try{    
                echo " o registro com id: ".$this->id."vai ser excluido";
                $sql = "DELETE FROM professor WHERE id = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':id', $this->id);
                $stmt->execute();

            }catch(PDOException $e){
                 echo "Erro no método excluir: ".$e->getMessage();
            }
        
            }
        }

        

    }

?>