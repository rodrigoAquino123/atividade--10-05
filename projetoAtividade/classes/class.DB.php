<?php

  class DB{
      public static $conexao;

      public static function Conexao(){
          self::$conexao = new PDO('mysql:host=localhost;dbname=atividadePW','root','');
          return self::$conexao;

          try{

          }catch(PDOException $e){
            echo "ERRO: ".$e->getMessage();
          }
      }

  }

?>