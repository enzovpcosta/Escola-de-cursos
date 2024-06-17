<?php 

require 'config.php';

if(isset($_POST['excluir_presenca'])){
    $id = $_POST['idPresenca'];
    $query = 'DELETE FROM presenca WHERE idPresenca='.$id;
    $res = $conn->query($query);
    echo json_encode(true);
}

if(isset($_POST['adicionar_aluno'])){
    $id = $_POST['idAulaPresenca'];
    $aluno = $_POST['pAluno'];
    $query = "SELECT * FROM presenca WHERE idAluno = '$aluno' AND idAula = '$id'";
    $res = $conn->query($query);
    $qtd = $res->num_rows;
    if($qtd > 0){
        echo json_encode(false);
    } else {
        $query = "INSERT INTO presenca (idAluno,idAula,Status) VALUES ('$aluno','$id','Presente')";
        $res = $conn->query($query);
        echo json_encode(true);  
    }
}

if(isset($_POST['alterar_status'])){
    $id = $_POST['idPresenca'];
    $query = 'SELECT * FROM presenca WHERE idPresenca='.$id;
    $res = $conn->query($query);
    $data = $res->fetch_object();
    if($data->Status == 'Presente'){
        $query = "UPDATE presenca SET Status='Ausente' WHERE idPresenca=".$id;
    } else if($data->Status == 'Ausente'){
        $query = "UPDATE presenca SET Status='Presente' WHERE idPresenca=".$id;
    }
    $res = $conn->query($query);
    echo json_encode(true);
}

?>