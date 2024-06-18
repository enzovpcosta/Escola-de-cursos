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
      <h2 class="mb-3 text-center">Recuperar Senha</h2>
      <form class="p-4 rounded-4" method="post">

      <?php 

   include __DIR__.'/config.php';
   
   if(isset($_POST['recuperar'])) {
        if(strlen($_POST['email']) == 0){
            echo '<div class="alert alert-danger text-center">Preencha seu e-mail!</div>';
        } else { 

            $email = $conn->real_escape_string($_POST['email']);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                 echo '<div class="alert alert-danger text-center">E-mail inválido!</div>';
            } else {
                $novasenha = substr(md5(time()), 0, 6);
                if($_POST['tipo'] == 'Aluno'){
                    $query = 'SELECT Email FROM alunos WHERE Email = \''.$email.'\'';
                    $result = $conn->query($query);
                    $row = $result->num_rows;
                    if($row == 0){
                        echo '<div class="alert alert-danger text-center">E-mail incorreto! Tente novamente!</div>';
                    } else {
                        if (mail($email, 'Sua nova senha', 'Sua nova senha é: '.$novasenha)){
                        $query = 'UPDATE alunos SET Senha = \''.$novasenha.'\' WHERE Email = \''.$email.'\'';
                        $result = $conn->query($query);
                        echo '<div class="alert alert-success">Um email foi enviado com a sua nova senha! <a href="index.php" class="alert-link text-decoration-none">Clique aqui para fazer o login</a></div>';
                        ;
                        }
                    }
                } else if ($_POST['tipo'] == 'Professor'){
                    $query = 'SELECT Email FROM professores WHERE Email = \''.$email.'\'';
                    $result = $conn->query($query);
                    $row = $result->num_rows;
                    if($row == 0){
                        echo '<div class="alert alert-danger text-center">E-mail incorreto! Tente novamente!</div>';
                    } else {
                        if (mail($email, 'Sua nova senha', 'Sua nova senha é: '.$novasenha)){
                        $query = 'UPDATE professores SET Senha = \''.$novasenha.'\' WHERE Email = \''.$email.'\'';
                        $result = $conn->query($query);
                        echo '<div class="alert alert-success text-center">Um email foi enviado com a sua nova senha! <a href="index.php" class="text-decoration-none alert-link">Clique aqui para fazer o login</a>!</div>';
                        }
                    }
                }
            }
        }
   }
?>
      
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
        </div>
        <div class="form-check-inline">
            <input type="radio" class="btn-check" name="tipo" id="option1" value="Professor" autocomplete="off" checked>
            <label class="btn btn-outline-primary" for="option1">Professor</label>
        </div>
        <div class="form-check-inline">
            <input type="radio" class="btn-check" name="tipo" id="option2" value="Aluno" autocomplete="off">
            <label class="btn btn-outline-primary" for="option2">Aluno</label>
        </div>
        <div class="d-flex justify-content-between align-items-center my-4">
            <a href="index.php" class="btn btn-danger">Voltar</a>
            <button style="width: 150px;" type="submit" class="btn btn-success" name="recuperar">Recuperar</button>
        </div>
      </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>