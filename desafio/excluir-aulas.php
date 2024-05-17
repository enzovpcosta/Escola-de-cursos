<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\class\Aula;

    if(!isset($_GET['idAula']) or !is_numeric($_GET['idAula'])){
        header('location: aulas.php?status=error');
        exit;
    }

    $obAula = Aula::getAula($_GET['idAula']);
    
    if(!$obAula instanceof Aula){
        header('location: aulas.php?status=error');
        exit;
    }
    


    if(isset($_POST['excluir'])){

        $obAula->excluir();
       
        header('location: aulas.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/confirmar-exclusao-aulas.php';
     include __DIR__.'/includes/footer.php';   
?>