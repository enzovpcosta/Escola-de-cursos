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
                          <td>'.$aula->Titulo.'</td>
                          <td>'.$aula->Descricao.'</td>
                          <td>'.$aula->Professor.'</td>
                          <td>'.$aula->Data.'</td>
                          <td>'.$aula->Curso.'</td>';
                
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
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Professor</th>
                    <th>Data</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>