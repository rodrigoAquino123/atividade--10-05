<?php

if(isset($_GET['id']) && is_numeric($_GET['id'])){

    include("classes/Curso.class.php");
    

    $curso= new Curso($_GET['id']);
    $curso->excluir();



}
?>