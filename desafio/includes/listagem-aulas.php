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
</main>