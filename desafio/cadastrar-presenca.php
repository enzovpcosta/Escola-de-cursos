<?php 

    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Cadastrar presença');

    use \Classes\class\Presenca;
    $obPresenca = new Presenca;
    
    if(isset($_POST['aluno'],$_POST['titulo'],$_POST['professor'],$_POST['curso'],$_POST['data'],$_POST['status'])){
        
        $obPresenca->Aluno = $_POST['aluno'];
        $obPresenca->Titulo = $_POST['titulo'];
        $obPresenca->Professor = $_POST['professor'];
        $obPresenca->Curso = $_POST['curso'];
        $obPresenca->Data = $_POST['data'];
        $obPresenca->Status = $_POST['status'];
        $obPresenca->cadastrar();
       
        header('location: presenca.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario-presenca.php';
    include __DIR__.'/includes/footer.php';   
?>