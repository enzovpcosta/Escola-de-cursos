<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\class\Prof;

    if(!isset($_GET['idProfessor']) or !is_numeric($_GET['idProfessor'])){
        header('location: professores.php?status=error');
        exit;
    }

    $obProf = Prof::getProfessor($_GET['idProfessor']);
    
    if(!$obProf instanceof Prof){
        header('location: professores.php?status=error');
        exit;
    }
    


    if(isset($_POST['excluir'])){

        $obProf->excluir();
       
        header('location: professores.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/confirmar-exclusao-professores.php';
     include __DIR__.'/includes/footer.php';   
?>