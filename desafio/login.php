<?php 

    require 'config.php';
   
    if(isset($_POST['login'])){
        if(isset($_POST['emailLogin']) || isset($_POST['senhaLogin'])) {
            if(strlen($_POST['emailLogin']) == 0){
                $res = [
                    'status' => 'email',
                    'message' => 'Preencha seu e-mail!'
                ];
                echo json_encode($res);
            } else if(strlen($_POST['senhaLogin']) == 0){
                $res = [
                    'status' => 'senha',
                    'message' => 'Preencha sua senha!'
                ];
                echo json_encode($res);
            } else {
                $email = $conn->real_escape_string($_POST['emailLogin']);
                $senha = $conn->real_escape_string($_POST['senhaLogin']);

                if($email == 'admin' && $senha = 'admin'){
                    $res = [
                        'status' => 'admin',
                        'tipo' => 'admin'
                    ];
                    echo json_encode($res);
                    exit;
                }

                if ($_POST['tipo'] == 'Professor'){
                    $query = 'SELECT * FROM professores WHERE Email = \''.$email.'\' AND Senha = \''.$senha.'\'';
                    $result = $conn->query($query);
                    $row = $result->num_rows;
            
                    if($row == 1){
                        $usuario = $result->fetch_assoc();
                        $res = [
                            'status' => 'success',
                            'id' => $usuario['idProfessor'],
                            'nome' => $usuario['Nome'],
                            'tipo' => 'professor'
                        ];
                        echo json_encode($res);
                    } else {
                        $res = [
                            'status' => 'error',
                            'message' => 'Falha ao logar! E-mail ou senha incorretos'
                        ];
                        echo json_encode($res);
                    } 
                } else if ($_POST['tipo'] == 'Aluno'){
                    $query = 'SELECT * FROM alunos WHERE Email = \''.$email.'\' AND Senha = \''.$senha.'\'';
                    $result = $conn->query($query);
                    $row = $result->num_rows;
            
                    if($row == 1){
                        $usuario = $result->fetch_assoc();
                        $res = [
                            'status' => 'success',
                            'id' => $usuario['idAluno'],
                            'nome' => $usuario['Nome'],
                            'tipo' => 'aluno'
                        ];
                        echo json_encode($res);
                    } else {
                        $res = [
                            'status' => 'error',
                            'message' => 'Falha ao logar! E-mail ou senha incorretos'
                        ];
                        echo json_encode($res);
                    }
                }
            }
        }
    }

    ?>