<?php

    include('classes/class.DB.php');
    class Aluno{
        private $Id;
        private $nome;
        private $idade;
        private $email;

      
        public function __construct($id=false) {

            if($id){
            
                $sql =  "SELECT * FROM aluno where id = :id";
                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                $stmt->execute();

                foreach($stmt as $registro){
                    $this->setId($registro['id']);
                    $this->setNome($registro['nome']);
                    $this->setIdade($registro['idade']);
                    $this->setEmail($registro['email']);
                    
                }
            
            }
        }


        public function setId($id){
            $this->id = $id;
        }
        public function setNome($nome){
            $this->nome = $nome;
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
        public function getIdade(){
            return $this->idade;
        }

        public function getEmail(){
            return $this->email;
        }



        public function adicionar(){
            $sql = "INSERT INTO aluno(id, nome, idade, email) VALUES (:id, :nome, :idade, :email)";

            try{

                $stmt = DB::conexao()->prepare($sql);
                $stmt->bindParam(':id', $this->id);
                $stmt->bindParam(':nome', $this->nome);
                $stmt->bindParam(':idade', $this->idade);
                $stmt->bindParam(':email', $this->email);
                $stmt->execute();
            
            }catch(PDOException $e){
                    echo "Erro no método adicionar ".$e->getMessage();

            }
        }



        public static function listar(){
            $sql ="SELECT * FROM aluno";
            $stmt = DB::conexao()->prepare($sql);
            $stmt->execute();
            $registros = $stmt->fetchAll();

            if($registros){
                $itens = array();

                foreach($registros as $registro){
                    $temporario = new Aluno();
                    $temporario->setId($registro['id']);
                    $temporario->setNome($registro['nome']);
                    $temporario->setIdade($registro['idade']);
                    $temporario->setEmail($registro['Email']);
                    $itens[] = $temporario;  
                }
                return $itens;

            }
            return false; 
        }

        public function excluir(){
            if($this->id){
            $sql = "DELETE FROM aluno WHERE id = :id";
            
            $stmt = DB::conexao()->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            }
        }

    }

?>