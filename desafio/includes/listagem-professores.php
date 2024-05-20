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
    foreach($professores as $professor){
        $resultados .= '<tr>
                          <td>'.$professor->idProfessor.'</td>
                          <td>'.$professor->Nome.'</td>
                          <td>'.$professor->CPF.'</td>
                          <td>'.$professor->Telefone.'</td>
                          <td>'.$professor->Nascimento.'</td>
                          <td>'.$professor->Curso.'</td>
                          <td>'.$professor->Email.'</td>
                          <td>
                            <a href="editar-professores.php?idProfessor='.$professor->idProfessor.'"><button type="button" class="btn btn-primary">Editar</button></a>
                            <a href="excluir-professores.php?idProfessor='.$professor->idProfessor.'"><button type="button" class="btn btn-danger">Excluir</button></a>
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
                    <th>Curso</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
                <tr>
                    <th class="text-center" colspan=8>
                        <a href="cadastrar-professores.php">
                            <button class="btn btn-success my-2">Novo professor</button>
                        </a>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
</main>