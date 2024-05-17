<?php 

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
                break;
            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não executada</div>';
                break;
        }
    }

    $resultados = '';
    foreach($presencas as $presenca){
        $resultados .= '<tr>
                          <td>'.$presenca->idPresenca.'</td>
                          <td>'.$presenca->Aluno.'</td>
                          <td>'.$presenca->Titulo.'</td>
                          <td>'.$presenca->Professor.'</td>
                          <td>'.$presenca->Curso.'</td>
                          <td>'.$presenca->Data.'</td>
                          <td>'.$presenca->Status.'</td>
                          <td>
                            <a href="editar-presenca.php?idPresenca='.$presenca->idPresenca.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="excluir-presenca.php?idPresenca='.$presenca->idPresenca.'"><button type="button" class="btn btn-danger">Excluir</button></a>
                          </td>
                        </tr>';
    }
?>
    <div class="mt-3">
        <?=$mensagem?>
    </div>
    

<main>
    <section>
        <table class="table mt-3 text-center table-bordered">
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
            <tbody class="table-group-divider">
                <?=$resultados?>
                <tr>
                    <th class="text-center" colspan=8>
                    <a href="cadastrar-presenca.php">
                        <button class="btn btn-success mt-3">Nova presença</button>
                    </a>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
</main>