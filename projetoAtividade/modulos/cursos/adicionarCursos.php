

<h1>Adicionar Curso</h1>


<form class = "adicionarcursos" method="post" action="">
           Id: <input type='text' name='id'> <br/><br/>           
Nome do Curso: <input type='text' name='nome'> <br/><br/>
Preço do Curso: <input type='text' name='preco'><br/><br/>
<input type='submit' name='botao' value="Salvar">
</form><br/><br/>

<?php
if(isset($_POST['botao']) && $_POST['botao'] == "Salvar"){
    include("classes/Curso.class.php");
    include("classes/class.DB.php");
    $con = DB::conexao();
    

    $curso = new Curso();
    $curso->setId($_POST['id']);
    $curso->setNome($_POST['nome']);
    $curso->setPreco($_POST['preco']);
    $curso->adicionar();


    echo "<br/>  O Id inserido é: ".$curso->getId();
    echo "<br/>  O nome do curso inserido é: ".$curso->getNome();
    echo "<br/>  O preço inserido é: ".$curso->getPreco();
}
?>


