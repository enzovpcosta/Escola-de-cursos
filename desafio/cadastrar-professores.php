<?php

    require __DIR__.'/vendor/autoload.php';

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

        echo json_encode(true);


        }
?>