<?php 

require 'config.php';

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