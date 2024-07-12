<?php

require 'config.php';

if(isset($_POST['verifica_aluno'])){
    $query = 'SELECT * FROM alunos';
    $res = $conn->query($query);
    $qtd = $res->num_rows;
    if($qtd > 0){
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

if(isset($_POST['excluir_aluno'])){
    $id = $_POST['idAluno'];
    $query = 'DELETE FROM alunos WHERE idAluno='.$id;
    $res = $conn->query($query);
    echo json_encode(true);
}

if(isset($_POST['atualizar_aluno'])){
    if(isset($_POST['EidAluno'],$_POST['Enomealuno'],$_POST['Ecpfaluno'],$_POST['Etelaluno'],$_POST['Enascaluno'],$_POST['Erespaluno'],$_POST['Eemailaluno'])){

        $id = $_POST['EidAluno'];
        $nome = $_POST['Enomealuno'];
        $cpf = $_POST['Ecpfaluno'];
        $tel = $_POST['Etelaluno'];
        $nasc = $_POST['Enascaluno'];
        $resp = $_POST['Erespaluno'];
        $email = $_POST['Eemailaluno'];
    
        $query = "UPDATE alunos SET Nome='$nome', CPF='$cpf', Telefone='$tel', Nascimento='$nasc', Responsavel='$resp', Email = '$email' WHERE idAluno='$id'";
        $res = $conn->query($query);
        echo json_encode(true);
    }
}

if(isset($_GET['idAluno'])){
    $idAluno = $_GET['idAluno'];

    $query = "SELECT * FROM alunos WHERE idAluno='$idAluno'";
    $res = $conn->query($query);
    $qtd = $res->num_rows;

    if($qtd == 1){

        $aluno = mysqli_fetch_array($res);

        $res = [
            'status' => 200,
            'message' => 'Aluno encontrado',
            'data' => $aluno
        ];
        echo json_encode($res);

    }else {

        $res = [
            'status' => 404,
            'message' => 'Aluno não encontrado'
        ];
        echo json_encode($res);

    }

}

if(isset($_POST['novo_aluno'])){
    if(isset($_POST['nomealuno'],$_POST['cpfaluno'],$_POST['telaluno'],$_POST['nascaluno'],$_POST['respaluno'],$_POST['emailaluno'],$_POST['senhaaluno'])){
    
        $nome = $_POST['nomealuno'];
        $cpf = $_POST['cpfaluno'];
        $tel = $_POST['telaluno'];
        $nasc = $_POST['nascaluno'];
        $resp = $_POST['respaluno'];
        $email = $_POST['emailaluno'];
        $senha = $_POST['senhaaluno'];
    
        $query = "INSERT INTO alunos (Nome,CPF,Telefone,Nascimento,Responsavel,Email,Senha) VALUES ('$nome','$cpf','$tel','$nasc','$resp','$email','$senha')";
        $res = $conn->query($query);
        echo json_encode(true);
    }
}