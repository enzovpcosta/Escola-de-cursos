$('#tabela-professores').hide();
$('#cadastrar-professor').hide();
$('#tabela-alunos').hide();
$('#cadastrar-aluno').hide();
$('#presenca').hide();

$('#professores').click(function (e) { 
    e.preventDefault();

    $('#tabela-professores').show();
    $('#cadastrar-professor').hide();
    $('#tabela-alunos').hide();
    $('#cadastrar-aluno').hide();
});

$('#btn-cadastrar-professor').click(function (e) { 
    e.preventDefault();
    
    $('#tabela-professores').show();
});

$('#voltar-professores').click(function (e) { 
    e.preventDefault();

    $('#cadastrar-professor').hide();
    $('#tabela-professores').show();
});

$('#novoProfessor').submit(function (e) { 
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "cadastrar-professores.php",
        dataType: "json",
        data: {
                nome: $('#nomeprof').val(),
                cpf: $('#cpfprof').val(), 
                tel: $('#telprof').val(), 
                nasc: $('#nascprof').val(), 
                curso: $('#cursoprof').val(), 
                email: $('#emailprof').val(), 
                senha: $('#senhaprof').val()},
        success: function (response) {
            if(response == true){
                console.log("Success")
                Swal.fire({
                    title: "Professor cadastrado com successo",
                    icon: "success"
                  });
                  $('#cadastrarProfessor').modal('hide');
                  $('#tabela-professores').load(location.href + ' #tabela-professores')
                  return
            }
            else {
                console.log("Error")

            }
        }
    });
});

$('.editar-professor-btn').click(function (e) { 
    e.preventDefault();
    
    var idProf = $('.editar-professor-btn').val()

    alert(idProf)
});


















$('#alunos').click(function (e) { 
    e.preventDefault();

    $('#tabela-alunos').show();
    $('#tabela-professores').hide();
    $('#cadastrar-professor').hide();
    $('#cadastrar-aluno').hide();
});

$('#btn-cadastrar-aluno').click(function (e) { 
    e.preventDefault();
    
    $('#tabela-alunos').hide();
    $('#cadastrar-aluno').show();
    $('#acao-aluno').text('Cadastrar aluno');
});

$('#voltar-alunos').click(function (e) { 
    e.preventDefault();

    $('#cadastrar-aluno').hide();
    $('#tabela-alunos').show();
});

