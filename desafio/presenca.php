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

if(isset($_GET['idAula'])){
    $idAula = $_GET['idAula'];

    $sql = "SELECT presenca.idPresenca, alunos.Nome, aulas.Titulo, aulas.Professor, aulas.Curso, aulas.Data, presenca.Status FROM presenca JOIN alunos ON presenca.idAluno = alunos.idAluno JOIN aulas ON presenca.idAula = aulas.idAula WHERE aulas.idAula =".$idAula;

    $res = $conn->query($sql);
    $qtd = $res->num_rows;
    if($qtd > 0){

        $dados ='';
        foreach($res as $aula){
        $dados .= "<tr>
                    <td>".$aula['Nome']."</td>
                    <td>".$aula['Titulo']."</td>
                    <td>".$aula['Professor']."</td>
                    <td>".$aula['Curso']."</td>
                    <td>".$aula['Data']."</td>
                    <td>".$aula['Status']."</td>
                    <td>
                        <button type=\"button\" value=\"".$aula['idPresenca']."\" class=\"alterarPresenca btn btn-primary\">Alterar status</button>
                        <button type=\"button\" value=\"".$aula['idPresenca']."\" class=\"excluirPresenca btn btn-danger\">Excluir aluno</button>
                    </td>
                </tr>";
        }

        $res = [
            'status' => 200,
            'msg' => 'success',
            'data' => $dados
        ];
        echo json_encode($res);

    } else {
        $res = [
            'status' => 404,
            'msg' => 'error'
        ];
        echo json_encode($res);
    }
    
}

if(isset($_POST['modal_addAluno']) == 'true'){
    $query = 'SELECT * FROM alunos';
    $res = $conn->query($query);
    $aluno = '';
    foreach($res as $row){
        $aluno .= "<option value=\"".$row['idAluno']."\">".$row['Nome']."</option>";
    }

    $res = [
        'status' => 200,
        'msg' => 'success',
        'aluno' => $aluno
    ];

    echo json_encode($res);                               
}

?>