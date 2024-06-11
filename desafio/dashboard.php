<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escola de cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <?php 

    require __DIR__.'/vendor/autoload.php';
    include __DIR__.'/protect.php';

    use \Classes\Class\Prof;
    use \Classes\Class\Aluno;
    use \Classes\Class\Aula;

    $professores = Prof::getProfessores();
    $alunos = Aluno::getAlunos();
    $aulas = Aula::getAulas();
    
    ?>

  <body class="bg-dark text-light">
      <div style="height: 100vh;" class="d-flex justify-content-between gap-3 fi">
        <div style="width: 10%;" class="bg-light d-flex
        flex-column justify-content-between align-items-center py-4 px-5 text-light">
            <div class="d-flex flex-column gap-2">
                <a id="professores"><button type="button" class="btn btn-dark" style="width: 100%;">Professores</button></a>
                <a id="alunos"><button type="button" class="btn btn-dark" style="width: 100%">Alunos</button></a>
                <a id="aulas"><button type="button" class="btn btn-dark" style="width: 100%">Aulas</button></a>
                <a id="presenca"><button type="button" class="btn btn-dark" style="width: 100%">Presença</button></a>
            </div>
            <div class="d-flex justify-content-center align-center mt-3">
                <a href="logout.php" class="btn btn-danger" style="width: 100%;">LOGOUT</a>
            </div>
        </div>
        <div class="container">
            <div class="text-center my-4">
                <h1><strong>Escola de cursos</strong></h1>
                <p>Informações sobre os professores, os alunos, as aulas e presença.</p>
                <?php
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
                                        <a><button type="button" value="'.$professor->idProfessor.'" class="editar-professor-btn btn btn-primary">Editar</button></a>
                                        <a><button type="button" value="'.$professor->idProfessor.'" class="btn btn-danger">Excluir</button></a>
                                    </td>
                                    </tr>';
                }
                ?>
                <section id="tabela-professores">
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
                                    <a id="btn-cadastrar-professor">
                                        <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#cadastrarProfessor">Novo professor</button>
                                    </a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </section>
                <div class="modal fade text-dark" id="cadastrarProfessor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="acao-prof">Cadastrar professor</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="novoProfessor">
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomeprof">Nome Completo</label>
                                        <input type="text" name="nomeprof" class="form-control" placeholder="Digite o nome completo" id="nomeprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="cpfprof">CPF</label>
                                        <input type="text" name="cpfprof" class="form-control" placeholder="Ex: 12345678910" maxlength="11" id="cpfprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="telprof">Telefone</label>
                                        <input type="text" name="telprof" class="form-control" placeholder="Ex: 12345678910" maxlength="11" id="telprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="nascprof">Data de Nascimento</label>
                                        <input type="date" max="9999-12-31" name="nascprof" class="form-control" id="nascprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="cursoprof">Curso</label>
                                        <input type="text" name="cursoprof" class="form-control" placeholder="Digite o nome do curso" id="cursoprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="emailprof">E-mail</label>
                                        <input type="email" name="emailprof" class="form-control" placeholder="Digite o e-mail" id="emailprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="senhaprof">Senha</label>
                                        <input type="password" name="senhaprof" class="form-control" placeholder="Digite a senha" id="senhaprof" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Cadastrar Professor</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <?php 

                // $resultados = '';
                // foreach($alunos as $aluno){
                //     if($aluno->Responsavel == null){
                //         $aluno->Responsavel = 'Não possui responsável!';
                //     }
                //     $resultados .= '<tr>
                //                     <td>'.$aluno->idAluno.'</td>
                //                     <td>'.$aluno->Nome.'</td>
                //                     <td>'.$aluno->CPF.'</td>
                //                     <td>'.$aluno->Telefone.'</td>
                //                     <td>'.$aluno->Nascimento.'</td>
                //                     <td>'.$aluno->Responsavel.'</td>
                //                     <td>'.$aluno->Email.'</td>
                //                     <td>
                //                         <a href="editar-alunos.php?idAluno='.$aluno->idAluno.'"><button type="button" class="btn btn-primary">Editar</button></a>
                //                         <a href="excluir-alunos.php?idAluno='.$aluno->idAluno.'"><button type="button" class="btn btn-danger">Excluir</button></a>
                //                     </td>
                //                     </tr>';
                // }
                ?>
                
                <section id="tabela-alunos">
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
                                    <button class="btn btn-success my-2" id="btn-cadastrar-aluno" data-bs-toggle="modal" data-bs-target="#cadastrarAluno">Novo aluno</button>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <div id="cadastrar-aluno" class="text-start">
                    <section class="my-4">
                        <a id="voltar-alunos">
                            <button class="btn btn-primary">Voltar</button>
                        </a>
                    </section>

                    <h2 id="acao-aluno"></h2>
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label" for="nome">Nome Completo</label>
                            <input type="text" name="nome" class="form-control" placeholder="Digite o seu nome" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cpf">CPF</label>
                            <input type="text" name="cpf" class="form-control" placeholder="Ex: 12345678910" maxlength="11" id="cpf" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tel">Telefone</label>
                            <input type="text" name="tel" class="form-control" placeholder="Ex: 12345678910" maxlength="11" id="tel" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nasc">Data de Nascimento</label>
                            <input type="date" max="9999-12-31" name="nasc" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="resp">Responsável</label>
                            <input type="text" name="resp" class="form-control" placeholder="Digite o nome do responsável (Se o aluno for de maior, deixe em branco)">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">E-mail</label>
                            <input type="text" name="email" class="form-control" placeholder="Digite o seu e-mail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="senha">Senha</label>
                            <input type="password" name="senha" class="form-control" placeholder="Digite a sua senha" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="submit-cadastro-aluno" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </div>
 -->












            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="script.js"></script>
<script>
    $('#cpfprof').mask('000.000.000-00', {reverse: true});
    $('#telprof').mask('(00) 00000-0000');
</script>
</body>
</html>