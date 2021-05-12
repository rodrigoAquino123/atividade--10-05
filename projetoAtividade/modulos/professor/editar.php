<?php include('classes/Professor.class.php');
    include('classes/class.DB.php');
    $con = DB::conexao();
?>

<h1>Adicionar Professor</h1>

<form class="adicionaraluno" method="post" action="">
          Nome: <input type='text' name='nome'value ="<?php echo $professor->getNome();?>"> <br/><br/>
 Especialidade: <input type='text' name='especialidade' value ="<?php echo $professor->getEspecialidade();?>"> <br/><br/>
         Idade: <input type='text' name='idade' value ="<?php echo $professor->getIdade();?>"><br/><br/>
         Email: <input type='text' name='email' value ="<?php echo $professor->getEmail();?>"><br/><br/>

         <input type='hidden' name='id' value ="<?php echo $professor->getId();?>">
         <input type='submit' name='botao' value="Salvar" >

</form>
<br/><br/><br/><br/>
<?php

if(isset($_POST['botao']) && $_POST['botao'] == "Salvar"){

$professor = new Professor($_POST['id']);
$professor->setId($_POST['id']); 
$professor->setNome($_POST['nome']);    
$professor->setEspecialidade($_POST['especialidade']);
$professor->setIdade($_POST['idade']);
$professor->setEmail($_POST['email']);
$professor->atualizar();


}
    
?>