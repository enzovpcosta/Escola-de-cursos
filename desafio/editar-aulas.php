<?php 

    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Editar aula');

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

    if(isset($_POST['titulo'],$_POST['descricao'],$_POST['professor'],$_POST['data'],$_POST['curso'])){
        $obAula->Titulo = $_POST['titulo'];
        $obAula->Descricao = $_POST['descricao'];
        $obAula->Professor = $_POST['professor'];
        $obAula->Data = $_POST['data'];
        $obAula->Curso = $_POST['curso'];
        $obAula->atualizar();
       
        header('location: aulas.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario-aulas.php';
    include __DIR__.'/includes/footer.php';   
?>