<?php

require 'config.php';

if(isset($_POST['excluir_professor'])){
    $id = $_POST['idProfessor'];
    $query = 'DELETE FROM professores WHERE idProfessor='.$id;
    $res = $conn->query($query);
    echo json_encode(true);
}

if(isset($_POST['atualizar_professor'])){
    if(isset($_POST['EidProfessor'],$_POST['Enomeprof'],$_POST['Ecpfprof'],$_POST['Etelprof'],$_POST['Enascprof'],$_POST['Ecursoprof'],$_POST['Eemailprof'])){

        $id = $_POST['EidProfessor'];
        $nome = $_POST['Enomeprof'];
        $cpf = $_POST['Ecpfprof'];
        $tel = $_POST['Etelprof'];
        $nasc = $_POST['Enascprof'];
        $curso = $_POST['Ecursoprof'];
        $email = $_POST['Eemailprof'];
    
        $query = "UPDATE professores SET Nome='$nome', CPF='$cpf', Telefone='$tel', Nascimento='$nasc', Curso='$curso', Email = '$email' WHERE idProfessor='$id'";
        $res = $conn->query($query);
        echo json_encode(true);
    }
}

if(isset($_GET['idProfessor'])){
    $idProfessor = $_GET['idProfessor'];

    $query = "SELECT * FROM professores WHERE idProfessor='$idProfessor'";
    $res = $conn->query($query);
    $qtd = $res->num_rows;

    if($qtd == 1){

        $professor = mysqli_fetch_array($res);

        $res = [
            'status' => 200,
            'message' => 'Professor encontrado',
            'data' => $professor
        ];
        echo json_encode($res);

    }else {

        $res = [
            'status' => 404,
            'message' => 'Professor não encontrado'
        ];
        echo json_encode($res);

    }

}

if(isset($_POST['novo_professor'])){
    if(isset($_POST['nomeprof'],$_POST['cpfprof'],$_POST['telprof'],$_POST['nascprof'],$_POST['cursoprof'],$_POST['emailprof'],$_POST['senhaprof'])){
        $nome = $_POST['nomeprof'];
        $cpf = $_POST['cpfprof'];
        $tel = $_POST['telprof'];
        $nasc = $_POST['nascprof'];
        $curso = $_POST['cursoprof'];
        $email = $_POST['emailprof'];
        $senha = $_POST['senhaprof'];
    
        $query = "INSERT INTO professores (Nome,CPF,Telefone,Nascimento,Curso,Email,Senha) VALUES ('$nome','$cpf','$tel','$nasc','$curso','$email','$senha')";
        $res = $conn->query($query);
        echo json_encode(true);
    }
}