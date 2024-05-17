<?php 

    require __DIR__.'/vendor/autoload.php';

    use \Classes\class\Presenca;

    if(!isset($_GET['idPresenca']) or !is_numeric($_GET['idPresenca'])){
        header('location: presenca.php?status=error');
        exit;
    }

    $obPresenca = Presenca::getPresenca($_GET['idPresenca']);
    
    if(!$obPresenca instanceof Presenca){
        header('location: presenca.php?status=error');
        exit;
    }
    


    if(isset($_POST['excluir'])){

        $obPresenca->excluir();
       
        header('location: presenca.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
     include __DIR__.'/includes/header.php';
     include __DIR__.'/includes/confirmar-exclusao-presenca.php';
     include __DIR__.'/includes/footer.php';   
?>