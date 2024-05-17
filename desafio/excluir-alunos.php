<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\class\Aluno;

    if(!isset($_GET['idAluno']) or !is_numeric($_GET['idAluno'])){
        header('location: alunos.php?status=error');
        exit;
    }

    $obAluno = Aluno::getAluno($_GET['idAluno']);
    
    if(!$obAluno instanceof Aluno){
        header('location: alunos.php?status=error');
        exit;
    }
    


    if(isset($_POST['excluir'])){

        $obAluno->excluir();
       
        header('location: alunos.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/confirmar-exclusao-alunos.php';
     include __DIR__.'/includes/footer.php';   
?>