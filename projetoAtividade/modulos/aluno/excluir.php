<?php

if(isset($_GET["id"]) && is_numeric($_GET["id"])){

    include('classes/Aluno.class.php');

    $aluno= new Aluno($_GET["id"]);
    $aluno->excluir();

    
}
?>