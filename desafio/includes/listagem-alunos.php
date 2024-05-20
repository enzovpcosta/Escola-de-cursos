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
    foreach($alunos as $aluno){
        $resultados .= '<tr>
                          <td>'.$aluno->idAluno.'</td>
                          <td>'.$aluno->Nome.'</td>
                          <td>'.$aluno->CPF.'</td>
                          <td>'.$aluno->Telefone.'</td>
                          <td>'.$aluno->Nascimento.'</td>
                          <td>'.$aluno->Responsavel.'</td>
                          <td>'.$aluno->Email.'</td>
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
        <table class="table mt-3 text-center table-bordered table-hover border-dark table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Nascimento</th>
                    <th>Responsavel</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
                <tr>
                    <th class="text-center" colspan=8>
                    <a href="cadastrar-alunos.php">
            <button class="btn btn-success my-2">Novo aluno</button>
        </a>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
</main>