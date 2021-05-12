<?php include('classes/Aluno.class.php');
    include('classes/class.DB.php');
    $con = DB::conexao();
?>

<h1>Editar Aluno</h1>

<form class="adicionaraluno" method="post" action=""> 
  Nome: <input type='text' name='nome' value ="<?php echo $aluno->getNome();?>"> <br/><br/>
 Idade: <input type='text' name='idade' value ="<?php echo $aluno->getidade();?>"><br/><br/>
 Email: <input type='text' name='email' value ="<?php echo $aluno->getEmail();?>"><br/><br/>

 <input type='hidden' name='id' value="<?php echo $aluno->getId(); ?>">
<input type='submit' name='botao' value="Salvar">
</form>
<br/><br/><br/><br/>
<?php

if(isset($_POST['botao']) && $_POST['botao'] == "Salvar"){

$aluno = new Aluno($_POST['id']);    
$aluno->setId($_POST['id']);
$aluno->setNome($_POST['nome']);
$aluno->setIdade($_POST['idade']);
$aluno->setEmail($_POST['email']);
$aluno->atualizar();


}
    
?>