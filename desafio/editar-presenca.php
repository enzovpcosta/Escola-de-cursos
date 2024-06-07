<?php 

    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Editar presença');

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

    if(isset($_POST['aluno'],$_POST['aula'],$_POST['status'])){
        
        $obPresenca->idAluno = $_POST['aluno'];
        $obPresenca->idAula = $_POST['aula'];
        $obPresenca->Status = $_POST['status'];
        $obPresenca->atualizar();
       
        header('location: presenca.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario-presenca.php';
    include __DIR__.'/includes/footer.php';   
?>