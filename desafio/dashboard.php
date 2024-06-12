<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escola de cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-dark text-light">
      <div style="height: 100vh;" class="d-flex justify-content-between gap-3">
        <div style="width: 10%; height: 100vh;" class="bg-light d-flex
        flex-column justify-content-between align-items-center py-4 px-5 text-light position-fixed">
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
                require 'config.php';

                $query = 'SELECT * FROM professores';
                $res = $conn->query($query);
                $qtd = $res->num_rows;
                $dados ='';
                foreach($res as $professor){
                $dados .= "<tr>
                                <td>".$professor['idProfessor']."</td>
                                <td>".$professor['Nome']."</td>
                                <td>".$professor['CPF']."</td>
                                <td>".$professor['Telefone']."</td>
                                <td>".$professor['Nascimento']."</td>
                                <td>".$professor['Curso']."</td>
                                <td>".$professor['Email']."</td>
                                <td>
                                    <a><button type=\"button\" value=\"".$professor['idProfessor']."\" class=\"editarProfessorBtn btn btn-primary\">Editar</button></a>
                                    <a><button type=\"button\" value=\"".$professor['idProfessor']."\" class=\"excluirProfessorBtn btn btn-danger\">Excluir</button></a>
                                </td>
                            </tr>";
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
                            <?=$dados?>
                            <tr>
                                <th class="text-center" colspan=8>
                                    <a class="btn-cadastrar-professor">
                                        <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#cadastrarProfessor">Novo professor</button>
                                    </a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Cadastrar Professor -->
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
                                        <input type="text" name="cpfprof" class="cpf form-control" placeholder="Ex: 12345678910" maxlength="11" id="cpfprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="telprof">Telefone</label>
                                        <input type="text" name="telprof" class="tel form-control" placeholder="Ex: 12345678910" maxlength="11" id="telprof" required>
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


                <!-- Editar Professor -->
                <div class="modal fade text-dark" id="editarProfessor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="acao-prof">Editar professor</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="atualizarProfessor">
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label for="EidProfessor">ID</label>
                                        <input type="text" name="EidProfessor" id="EidProfessor" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Enomeprof">Nome Completo</label>
                                        <input type="text" name="Enomeprof" class="form-control" placeholder="Digite o nome completo" id="Enomeprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Ecpfprof">CPF</label>
                                        <input type="text" name="Ecpfprof" class="cpf form-control" placeholder="Ex: 12345678910" maxlength="11" id="Ecpfprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Etelprof">Telefone</label>
                                        <input type="text" name="Etelprof" class="tel form-control" placeholder="Ex: 12345678910" maxlength="11" id="Etelprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Enascprof">Data de Nascimento</label>
                                        <input type="date" max="9999-12-31" name="Enascprof" class="form-control" id="Enascprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="cursoprof">Curso</label>
                                        <input type="text" name="Ecursoprof" class="form-control" placeholder="Digite o nome do curso" id="Ecursoprof" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Eemailprof">E-mail</label>
                                        <input type="email" name="Eemailprof" class="form-control" placeholder="Digite o e-mail" id="Eemailprof" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar Professor</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ALUNOS----------------------------------------------------------------->

                <?php

                $query = 'SELECT * FROM alunos';
                $res = $conn->query($query);
                $qtd = $res->num_rows;
                $dados ='';
                foreach($res as $aluno){
                    if($aluno['Responsavel'] == null){
                        $aluno['Responsavel'] = 'Não possui responsável';
                    }
                $dados .= "<tr>
                                <td>".$aluno['idAluno']."</td>
                                <td>".$aluno['Nome']."</td>
                                <td>".$aluno['CPF']."</td>
                                <td>".$aluno['Telefone']."</td>
                                <td>".$aluno['Nascimento']."</td>
                                <td>".$aluno['Responsavel']."</td>
                                <td>".$aluno['Email']."</td>
                                <td>
                                    <a><button type=\"button\" value=\"".$aluno['idAluno']."\" class=\"editarAlunoBtn btn btn-primary\">Editar</button></a>
                                    <a><button type=\"button\" value=\"".$aluno['idAluno']."\" class=\"excluirAlunoBtn btn btn-danger\">Excluir</button></a>
                                </td>
                            </tr>";
                    }
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
                                <th>Responsável</th>
                                <th>E-mail</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$dados?>
                            <tr>
                                <th class="text-center" colspan=8>
                                    <a class="btn-cadastrar-aluno">
                                        <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#cadastrarAluno">Novo aluno</button>
                                    </a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Cadastrar Aluno -->
                <div class="modal fade text-dark" id="cadastrarAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Cadastrar aluno</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="novoAluno">
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label class="form-label" for="nomealuno">Nome Completo</label>
                                        <input type="text" name="nomealuno" class="form-control" placeholder="Digite o nome completo" id="nomealuno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="cpfaluno">CPF</label>
                                        <input type="text" name="cpfaluno" class="cpf form-control" placeholder="Ex: 12345678910" maxlength="11" id="cpfaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="telaluno">Telefone</label>
                                        <input type="text" name="telaluno" class="tel form-control" placeholder="Ex: 12345678910" maxlength="11" id="telaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="nascaluno">Data de Nascimento</label>
                                        <input type="date" max="9999-12-31" name="nascaluno" class="form-control" id="nascaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="respaluno">Responsável</label>
                                        <input type="text" name="respaluno" class="form-control" placeholder="Digite o nome do responsável" id="respaluno">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="emailaluno">E-mail</label>
                                        <input type="email" name="emailaluno" class="form-control" placeholder="Digite o e-mail" id="emailaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="senhaaluno">Senha</label>
                                        <input type="password" name="senhaaluno" class="form-control" placeholder="Digite a senha" id="senhaaluno" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Editar Aluno -->
                <div class="modal fade text-dark" id="editarAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Editar aluno</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="atualizarAluno">
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label for="EidAluno">ID</label>
                                        <input type="text" name="EidAluno" id="EidAluno" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Enomealuno">Nome Completo</label>
                                        <input type="text" name="Enomealuno" class="form-control" placeholder="Digite o nome completo" id="Enomealuno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Ecpfaluno">CPF</label>
                                        <input type="text" name="Ecpfaluno" class="cpf form-control" placeholder="Ex: 12345678910" maxlength="11" id="Ecpfaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Etelaluno">Telefone</label>
                                        <input type="text" name="Etelaluno" class="tel form-control" placeholder="Ex: 12345678910" maxlength="11" id="Etelaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Enascaluno">Data de Nascimento</label>
                                        <input type="date" max="9999-12-31" name="Enascaluno" class="form-control" id="Enascaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="respaluno">Responsável</label>
                                        <input type="text" name="Erespaluno" class="form-control" placeholder="Digite o nome do responsável" id="Erespaluno">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Eemailaluno">E-mail</label>
                                        <input type="email" name="Eemailaluno" class="form-control" placeholder="Digite o e-mail" id="Eemailaluno" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar aluno</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- AULAS ------------------------------------------------------------------------->
                <?php

                $query = 'SELECT * FROM aulas';
                $res = $conn->query($query);
                $qtd = $res->num_rows;
                $dados ='';
                foreach($res as $aula){
                $dados .= "<tr>
                                <td>".$aula['idAula']."</td>
                                <td>".$aula['Titulo']."</td>
                                <td>".$aula['Descricao']."</td>
                                <td>".$aula['Professor']."</td>
                                <td>".$aula['Data']."</td>
                                <td>".$aula['Curso']."</td>
                                <td>
                                    <a><button type=\"button\" value=\"".$aluno['idAluno']."\" class=\"editarAulaBtn btn btn-primary\">Editar</button></a>
                                    <a><button type=\"button\" value=\"".$aluno['idAluno']."\" class=\"excluirAulaBtn btn btn-danger\">Excluir</button></a>
                                </td>
                            </tr>";
                    }
                ?>
                <section id="tabela-aulas">
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
                            <?=$dados?>
                            <tr>
                                <th class="text-center" colspan=7>
                                    <a class="btn-cadastrar-aula">
                                        <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#cadastrarAula">Nova aula</button>
                                    </a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Cadastrar Aulas -->
                <div class="modal fade text-dark" id="cadastrarAula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Cadastrar aula</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="novaAula">
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label class="form-label" for="titulo">Título da aula</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Digite o título da aula" id="titulo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="descricao">Descrição</label>
                                        <input type="text" name="descricao" class="form-control" placeholder="Adicione uma descrição da aula" id="descricao">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="professor">Professor</label>
                                        <select name="professor" id="professor" class="form-control">
                                            <option value="0">Escolha o professor</option>
                                            <?php 
                                                $query = 'SELECT * FROM professores';
                                                $res = $conn->query($query);
                                                while($row = $res->fetch_object()){
                                                    echo '<option value="'.$row->idProfessor.'">'.$row->Nome.'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="data">Data</label>
                                        <input type="date" max="9999-12-31" name="data" class="form-control" id="data" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="curso">Curso</label>
                                        <select name="curso" id="curso" class="form-control"></select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="emailaluno">E-mail</label>
                                        <input type="email" name="emailaluno" class="form-control" placeholder="Digite o e-mail" id="emailaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="senhaaluno">Senha</label>
                                        <input type="password" name="senhaaluno" class="form-control" placeholder="Digite a senha" id="senhaaluno" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Editar Aulas -->
                <div class="modal fade text-dark" id="editarAluno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Editar aluno</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="atualizarAluno">
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label for="EidAluno">ID</label>
                                        <input type="text" name="EidAluno" id="EidAluno" class="form-control" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Enomealuno">Nome Completo</label>
                                        <input type="text" name="Enomealuno" class="form-control" placeholder="Digite o nome completo" id="Enomealuno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Ecpfaluno">CPF</label>
                                        <input type="text" name="Ecpfaluno" class="cpf form-control" placeholder="Ex: 12345678910" maxlength="11" id="Ecpfaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Etelaluno">Telefone</label>
                                        <input type="text" name="Etelaluno" class="tel form-control" placeholder="Ex: 12345678910" maxlength="11" id="Etelaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Enascaluno">Data de Nascimento</label>
                                        <input type="date" max="9999-12-31" name="Enascaluno" class="form-control" id="Enascaluno" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="respaluno">Responsável</label>
                                        <input type="text" name="Erespaluno" class="form-control" placeholder="Digite o nome do responsável" id="Erespaluno">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="Eemailaluno">E-mail</label>
                                        <input type="email" name="Eemailaluno" class="form-control" placeholder="Digite o e-mail" id="Eemailaluno" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Atualizar aluno</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>












            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="script.js"></script>
<script>
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.tel').mask('(00) 00000-0000');
</script>
</body>
</html>