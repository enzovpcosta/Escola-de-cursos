<?php 

    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Cadastrar aluno');

    use \Classes\class\Aluno;
    $obAluno = new Aluno;
    
    if(isset($_POST['nome'],$_POST['cpf'],$_POST['tel'],$_POST['nasc'],$_POST['resp'])){
        
        $obAluno->Nome = $_POST['nome'];
        $obAluno->CPF = $_POST['cpf'];
        $obAluno->Telefone = $_POST['tel'];
        $obAluno->Nascimento = $_POST['nasc'];
        $obAluno->Responsavel = $_POST['resp'];
        $obAluno->cadastrar();
       
        header('location: alunos.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/formulario-alunos.php';
     include __DIR__.'/includes/footer.php';   
?>