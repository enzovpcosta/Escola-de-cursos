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
    foreach($presencas as $presenca){
        $resultados .= '<tr>
                          <td>'.$presenca->idPresenca.'</td>
                          <td>'.$presenca->Aluno.'</td>
                          <td>'.$presenca->Titulo.'</td>
                          <td>'.$presenca->Professor.'</td>
                          <td>'.$presenca->Curso.'</td>
                          <td>'.date('d/m/Y', strtotime($presenca->Data)).'</td>
                          <td>'.$presenca->Status.'</td>
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
                    <th>Nome do Aluno</th>
                    <th>Título da Aula</th>
                    <th>Professor</th>
                    <th>Curso</th>
                    <th>Data</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>