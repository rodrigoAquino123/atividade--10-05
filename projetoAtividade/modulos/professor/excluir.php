<?php

if(isset($_GET["id"]) && is_numeric($_GET["id"])){
    include('classes/Professor.class.php');
    
    $professor= new Professor($_GET["id"]);
    $professor->excluir();


}
?>