<?php 

    require __DIR__.'/vendor/autoload.php';

    define('TITLE','Cadastrar professor');

    use \Classes\class\Prof;
    $obProf = new Prof;

    if(isset($_POST['nome'],$_POST['cpf'],$_POST['tel'],$_POST['nasc'],$_POST['curso'],$_POST['email'],$_POST['senha'])){
        
        $obProf->Nome = $_POST['nome'];
        $obProf->CPF = $_POST['cpf'];
        $obProf->Telefone = $_POST['tel'];
        $obProf->Nascimento = $_POST['nasc'];
        $obProf->Curso = $_POST['curso'];
        $obProf->Email = $_POST['email'];
        $obProf->Senha = $_POST['senha'];
        $obProf->cadastrar();
       
        header('location: professores.php?status=success');
        exit;
    }

    include __DIR__.'/includes/protect.php';
    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario-professores.php';
    include __DIR__.'/includes/footer.php';   
?>