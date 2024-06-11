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

    $resultados = '';
    foreach($aulas as $aula){
        $resultados .= '<tr>
                          <td>'.$aula->idAula.'</td>
                          <td>'.$aula->Titulo.'</td>
                          <td>'.$aula->Descricao.'</td>
                          <td>'.$aula->Professor.'</td>
                          <td>'.$aula->Data.'</td>
                          <td>'.$aula->Curso.'</td>
                          <td>
                            <a href="editar-aulas.php?idAula='.$aula->idAula.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="excluir-aulas.php?idAula='.$aula->idAula.'"><button type="button" class="btn btn-danger">Excluir</button></a>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Presença
                            </button>
                          </td>
                        </tr>';
    }
?>
    <div class="mt-3">
        <?=$mensagem?>
    </div>
    

<main>
    <section>
        <table class="table mt-3 text-center table-bordered table-hover border-dark table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Professor</th>
                    <th>Data</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
                <tr>
                    <th class="text-center" colspan=7>
                    <a href="cadastrar-aulas.php">
            <button class="btn btn-success my-2">Nova aula</button>
                    </a>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
    <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Presença</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php
                    $sql = "SELECT idPresenca, alunos.Nome, aulas.Titulo, aulas.Professor, aulas.Curso, aulas.Data, presenca.Status FROM presenca JOIN alunos ON presenca.idAluno = alunos.idAluno JOIN aulas ON presenca.idAula = aulas.idAula";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</main>