<?php 

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success text-center">Ação executada com sucesso</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger text-center">Ação não executada</div>';
                break;
        }
    }
    if($qtd > 0){
        echo 
        '<div class="mt-3">
            '.$mensagem.'
        </div>
        <table class="table mt-3 text-center table-bordered table-hover border-dark table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Aluno</th>
                        <th>Título da Aula</th>
                        <th>Professor</th>
                        <th>Curso</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>';
        while($row = $res->fetch_object()){
            echo '<tr>
            <td>'.$row->idPresenca.'</td>
            <td>'.$row->Nome.'</td>
            <td>'.$row->Titulo.'</td>
            <td>'.$row->Professor.'</td>
            <td>'.$row->Curso.'</td>
            <td>'.date('d/m/Y', strtotime($row->Data)).'</td>
            <td>'.$row->Status.'</td>
            <td>
              <a href="editar-presenca.php?idPresenca='.$row->idPresenca.'"><button type="button" class="btn btn-primary">Editar</button></a>
              <a href="excluir-presenca.php?idPresenca='.$row->idPresenca.'"><button type="button" class="btn btn-danger">Excluir</button></a>
            </td>
          </tr>';
        }
        echo '</tbody>
        <tr>
        <th class="text-center" colspan=8>
            <a href="cadastrar-presenca.php">
                <button class="btn btn-success my-2">Nova presença</button>
            </a>
        </th>
         </tr>
        </table>';
    } else {
        echo '<div class="alert alert-danger text-center">Não há nenhuma presença!</div>
        <a href="cadastrar-presenca.php">
                <button class="btn btn-success my-2">Nova presença</button>
            </a>';
    }
?>