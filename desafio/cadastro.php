<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Escola de cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="bg-dark text-light">
    <div style="width: 40%;" class="min-vh-100 d-flex flex-column justify-content-center m-auto">
    <h2 class="mb-3 text-center">Cadastro Professor</h2>
    <form class="p-4 rounded-4" method="post">
    <?php

    include __DIR__.'/config.php'; 
    
    if(isset($_POST['submit'])){
        if(empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['tel']) || empty($_POST['nasc']) || empty($_POST['curso']) || empty($_POST['senha'])){
            echo '<div class="alert alert-danger text-center">Preencha todos os campos!</div>';
        } else {
            $nome = $conn->real_escape_string($_POST['nome']);
            $cpf = $conn->real_escape_string($_POST['cpf']);
            $tel = $conn->real_escape_string($_POST['tel']);
            $nasc = $conn->real_escape_string($_POST['nasc']);
            $curso = $conn->real_escape_string($_POST['curso']);
            $senha = $conn->real_escape_string($_POST['senha']);

            $query = 'SELECT * FROM professores WHERE cpf= \''.$cpf.'\'';

            $result = $conn->query($query);
            $row = $result->num_rows;
            
            if($row > 0){
                echo '<div class="alert alert-danger text-center">CPF já cadastrado!</div>';
            } else{
                $insert = 'INSERT INTO professores (Nome, CPF, Telefone, Nascimento, Curso, senha) VALUES (\''.$nome.'\',\''.$cpf.'\',\''.$tel.'\,\''.$nasc.'\',\''.$curso.'\',\''.$senha.'\')';
                $result = $conn->query($insert);
                header('location: index.php');
            }
        }
  
    }

    ?>
      
    <div class="mb-3">
        <label class="form-label" for="nome">Nome Completo</label>
        <input type="text" name="nome" class="form-control" placeholder="Digite o seu nome">
    </div>
    <div class="mb-3">
        <label class="form-label" for="cpf">CPF</label>
        <input type="text" name="cpf" class="form-control" placeholder="Ex: 12345678910" maxlength="11">
    </div>
    <div class="mb-3">
        <label class="form-label" for="tel">Telefone</label>
        <input type="text" name="tel" class="form-control" placeholder="Ex: 12345678910" maxlength="11">
    </div>
    <div class="mb-3">
        <label class="form-label" for="nasc">Data de Nascimento</label>
        <input type="date" max="9999-12-31" name="nasc" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label" for="curso">Curso</label>
        <input type="text" name="curso" class="form-control" placeholder="Digite o nome do curso">
    </div>
    <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha">
        </div>
    <div class="d-flex justify-content-end align-items-center">
        <button style="width: 150px;" type="submit" name="submit" class="btn btn-primary">Logar</button>
    </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>