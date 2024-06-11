<?php 

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

    if(isset($_POST['nome'],$_POST['cpf'],$_POST['tel'],$_POST['nasc'],$_POST['curso'],$_POST['email'],$_POST['senha'])){
        $obProf->Nome = $_POST['nome'];
        $obProf->CPF = $_POST['cpf'];
        $obProf->Telefone = $_POST['tel'];
        $obProf->Nascimento = $_POST['nasc'];
        $obProf->Curso = $_POST['curso'];
        $obProf->Email = $_POST['email'];
        $obProf->Senha = $_POST['senha'];
        $obProf->atualizar();
       
        header('location: professores.php?status=success');
        exit;
    }

?>