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
    foreach($alunos as $aluno){
        $resultados .= '<tr>
                          <td>'.$aluno->idAluno.'</td>
                          <td>'.$aluno->Nome.'</td>
                          <td>'.$aluno->CPF.'</td>
                          <td>'.$aluno->Telefone.'</td>
                          <td>'.$aluno->Nascimento.'</td>
                          <td>'.$aluno->Responsavel.'</td>
                          <td>
                            <a href="editar-alunos.php?idAluno='.$aluno->idAluno.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="excluir-alunos.php?idAluno='.$aluno->idAluno.'"><button type="button" class="btn btn-danger">Excluir</button></a>
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
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Nascimento</th>
                    <th>Responsavel</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?=$resultados?>
                <tr>
                    <th class="text-center" colspan=7>
                    <a href="cadastrar-alunos.php">
            <button class="btn btn-success mt-3">Novo aluno</button>
        </a>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
</main>