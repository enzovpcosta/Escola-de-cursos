<?php

require 'config.php';

if(isset($_POST['verifica_aula'])){
    $query = 'SELECT * FROM aulas';
    $res = $conn->query($query);
    $qtd = $res->num_rows;
    if($qtd > 0){
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

if(isset($_POST['excluir_aula'])){
    $id = $_POST['idAula'];
    // $query = 'DELETE FROM presenca WHERE idAula='.$id;
    // $res = $conn->query($query);
    $query = 'DELETE FROM aulas WHERE idAula='.$id;
    $res = $conn->query($query);
    echo json_encode(true);
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

if(isset($_POST['modal_aula']) == 'true'){
    if(isset($_COOKIE['professor'])){
        $id = $_COOKIE['professor'];
        $query = 'SELECT * FROM professores WHERE idProfessor='.$id;
        $res = $conn->query($query);
        $dados = $res->fetch_object();
        $prof = "<option value=\"".$dados->Nome."\">".$dados->Nome."</option>";
        $curso = "<option value=\"".$dados->Curso."\">".$dados->Curso."</option>";
        $res = [
            'tipo' => 'professor',
            'professor' => $prof,
            'curso' => $curso
        ];
        echo json_encode($res);  

    } else {
        $query = 'SELECT * FROM professores';
        $res = $conn->query($query);
        $professor = '';
        foreach($res as $row){
            $professor .= "<option value=\"".$row['Nome']."\">".$row['Nome']."</option>";
        }

        $query = 'SELECT DISTINCT Curso FROM professores';
        $res = $conn->query($query);
        $curso = '';
        foreach($res as $row){
            $curso .= "<option value=\"".$row['Curso']."\">".$row['Curso']."</option>";
        }
        $res = [
            'tipo' => 'admin',
            'status' => 200,
            'msg' => 'success',
            'professor' => $professor,
            'curso' => $curso
        ];
        echo json_encode($res);                               
    }
}
    

if(isset($_GET['idProfessor'])){
    $idProfessor = $_GET['idProfessor'];

    $query = "SELECT * FROM professores WHERE Nome='$idProfessor'";
    $res = $conn->query($query);
    $curso = mysqli_fetch_array($res);

    $res = [
        'dados' => $curso
    ];
    echo json_encode($res);
}