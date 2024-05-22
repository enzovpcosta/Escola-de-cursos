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
      <h2 class="mb-3 text-center">Login</h2>
      <form class="p-4 rounded-4" method="post">

    <?php 

    include __DIR__.'/config.php';
   
    if(isset($_POST['cpf']) || isset($_POST['senha'])) {
        if(strlen($_POST['email']) == 0){
            echo '<div class="alert alert-danger text-center">Preencha seu e-mail!</div>';
        } else if(strlen($_POST['senha']) == 0){
            echo '<div class="alert alert-danger text-center">Preencha sua senha!</div>';
        } else {
            $email = $conn->real_escape_string($_POST['email']);
            $senha = $conn->real_escape_string($_POST['senha']);

            if ($_POST['tipo'] == 'Professor'){
                $query = 'SELECT * FROM professores WHERE Email = \''.$email.'\' AND Senha = \''.$senha.'\'';
                $result = $conn->query($query);
                $row = $result->num_rows;
           
                if($row == 1){
                    $usuario = $result->fetch_assoc();

                    if(!isset($_SESSION)){
                    session_start();
                 }

                    $_SESSION['id'] = $usuario['idProfessor'];
                    $_SESSION['nome'] = $usuario['Nome'];

                    header('location: menu-prof.php');

                } else {
                    echo '<div class="alert alert-danger text-center">Falha ao logar! E-mail ou senha incorretos!</div>';
                } 
            } else if ($_POST['tipo'] == 'Aluno'){
                $query = 'SELECT * FROM alunos WHERE Email = \''.$email.'\' AND Senha = \''.$senha.'\'';
                $result = $conn->query($query);
                $row = $result->num_rows;
           
                if($row == 1){
                    $usuario = $result->fetch_assoc();

                    if(!isset($_SESSION)){
                    session_start();
                 }

                    $_SESSION['id'] = $usuario['idAluno'];
                    $_SESSION['nome'] = $usuario['Nome'];

                    header('location: menu-aluno.php');

                } else {
                    echo '<div class="alert alert-danger text-center">Falha ao logar! E-mail ou senha incorretos!</div>';
                }
        }
        }
    }

    ?>
      
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha">
        </div>
        <div class="mb-3">
            <label class="form-label">Login como:</label>
            <div>
                <div class="form-check-inline">
                    <input type="radio" name="tipo" value="Professor" checked> Professor
                </div>
                <div class="form-check-inline">
                    <input type="radio" name="tipo" value="Aluno"> Aluno
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between align-items-center py-3">
            <a href="recuperar.php" class="text-secondary">Recuperar senha</a>
            <button style="width: 150px;" type="submit" class="btn btn-success">Logar</button>
        </div>
      </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>