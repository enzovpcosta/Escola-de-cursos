<?php

require 'config.php';

if(isset($_POST['excluir_aula'])){
    $id = $_POST['idAula'];
    $query = 'DELETE FROM aulas WHERE idAula='.$id;
    $res = $conn->query($query);
    echo json_encode(true);
}

if(isset($_POST['professor'])){
    $query = 'SELECT Curso FROM professores WHERE Nome='.$_POST['professor'];
    $res = $conn->query($query);
    $response = [
        'msg' => 'success',
        'curso' => $res
    ];
    return json_encode($response);
}

if(isset($_POST['atualizar_aula'])){
    if(isset($_POST['EidAula'],$_POST['Etitulo'],$_POST['Edescricao'],$_POST['Eprofessor'],$_POST['Edata'],$_POST['Ecurso'])){

        $id = $_POST['EidAula'];
        $titulo = $_POST['Etitulo'];
        $descricao = $_POST['Edescricao'];
        $professor = $_POST['Eprofessor'];
        $data = $_POST['Edata'];
        $curso = $_POST['Ecurso'];
    
        $query = "UPDATE aulas SET Titulo='$titulo', Descricao='$descricao', Professor='$professor', Data='$data', Curso='$curso' WHERE idAula='$id'";
        $res = $conn->query($query);
        echo json_encode(true);
    }
}

if(isset($_GET['idAula'])){
    $idAula = $_GET['idAula'];

    $query = "SELECT * FROM aulas WHERE idAula='$idAula'";
    $res = $conn->query($query);
    $qtd = $res->num_rows;

    if($qtd == 1){

        $aula = mysqli_fetch_array($res);

        $res = [
            'status' => 200,
            'message' => 'Aula encontrada',
            'data' => $aula
        ];
        echo json_encode($res);

    }else {

        $res = [
            'status' => 404,
            'message' => 'Aula não encontrada'
        ];
        echo json_encode($res);

    }

}

if(isset($_POST['nova_aula'])){
    if(isset($_POST['titulo'],$_POST['descricao'],$_POST['professor'],$_POST['data'],$_POST['curso'])){
    
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $professor = $_POST['professor'];
        $data = $_POST['data'];
        $curso = $_POST['curso'];
    
        $query = "INSERT INTO aulas (Titulo,Descricao,Professor,Data,Curso) VALUES ('$titulo','$descricao','$professor','$data','$curso')";
        $res = $conn->query($query);
        echo json_encode(true);
    }
}