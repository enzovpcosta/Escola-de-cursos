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
                        <th>Nome do Aluno</th>
                        <th>Título da Aula</th>
                        <th>Professor</th>
                        <th>Curso</th>
                        <th>Data</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>';
        while($row = $res->fetch_object()){
            if($_SESSION['id'] == $row->idAluno){
            echo '<tr>
            <td>'.$row->Nome.'</td>
            <td>'.$row->Titulo.'</td>
            <td>'.$row->Professor.'</td>
            <td>'.$row->Curso.'</td>
            <td>'.date('d/m/Y', strtotime($row->Data)).'</td>
            <td>'.$row->Status.'</td>
          </tr>';
            }
        }
        echo '</tbody>
        </table>';
    } else {
        echo '<div class="alert alert-danger text-center">Não há nenhuma presença!</div>';
    }