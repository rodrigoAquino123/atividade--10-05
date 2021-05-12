<?php include('classes/Aluno.class.php');
    include('classes/class.DB.php');
    $con = DB::conexao();
?>

<h1>Adicionar Aluno</h1>

<form class="adicionaraluno" method="post" action="">
    Id: <input type='text' name='id'> <br/><br/> 
  Nome: <input type='text' name='nome'> <br/><br/>
 Idade: <input type='text' name='idade'><br/><br/>
 Email: <input type='text' name='email'><br/><br/>
<input type='submit' name='botao' value="Salvar">
</form>
<br/><br/><br/><br/>
<?php

if(isset($_POST['botao']) && $_POST['botao'] == "Salvar"){

$aluno = new Aluno();    
$aluno->setId($_POST['id']);
$aluno->setNome($_POST['nome']);
$aluno->setIdade($_POST['idade']);
$aluno->setEmail($_POST['email']);
$aluno->adicionar();


echo "<br/>  O Id inserido é: ".$aluno->getId();
echo "<br/>  O nome inserido é: ".$aluno->getNome();
echo "<br/>  A idade inserida é: ".$aluno->getIdade();
echo "<br/>  O Email inserido é: ".$aluno->getEmail();

}
    
?>