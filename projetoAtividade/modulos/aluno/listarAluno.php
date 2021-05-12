<?php
    include('classes/Aluno.class.php');
    include('classes/class.DB.php');
    $con = DB::conexao();

            
?>
<table class = "listarAluno" border = "1">

<tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Idade</th>
    <th>Email</th>
    <th colspan = '2'>Operação</th>
    
    
</tr>

<?php
     $alunos = Aluno::Listar();
     if($alunos){
    foreach($alunos as $aluno){
?>
    <tr>
        <td><?php echo $aluno->getId();?></td>
        <td><?php echo $aluno->getNome();?></td>
        <td><?php echo $aluno->getIdade();?></td>
        <td><?php echo $aluno->getEmail();?></td>
        <td><a href="?modulo=aluno&acao=editar&id=<?php echo $aluno->getId();?>">Editar</a></td>
        <td><a href="?modulo=aluno&acao=excluir&id=<?php echo $aluno->getId();?>">Excluir</a></td>
       

    </tr>
<?php
    }}
?>
</table>