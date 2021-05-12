

<form  method="post" action="">
                    
Nome do Curso: <input type='text' name='nome' value ="<?php echo $curso->getNome();?>"> <br/><br/>
Preço do Curso: <input type='text' name='preco' value = "<?php echo $curso->getPreco(); ?>"><br/><br/>

<input type='hidden' name='id' value="<?php echo $curso->getId(); ?>">
<input type='submit' name='botao' value="Salvar">
</form><br/><br/>

<?php
if(isset($_POST['botao']) && $_POST['botao'] == "Salvar"){
    include("classes/Curso.class.php");
    include("classes/class.DB.php");
    $con = DB::conexao();
    

    $curso = new Curso($_POST['id']);
    $curso->setId($_POST['id']);
    $curso->setNome($_POST['nome']);
    $curso->setPreco($_POST['preco']);
    $curso->atualizar();


   
}
?>

























