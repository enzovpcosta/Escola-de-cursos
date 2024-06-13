$(document).ready(function() {
    $('#tabela-professores').hide();
    $('#tabela-alunos').hide();
    $('#tabela-aulas').hide();
    $('#presenca').hide();
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.tel').mask('(00) 00000-0000');

$('#professores').click(function (e) { 
    e.preventDefault();

    $('#tabela-professores').show();
    $('#tabela-alunos').hide();
    $('#tabela-aulas').hide();
});

$('#novoProfessor').submit(function (e) { 
    e.preventDefault();

    var formData = new FormData(this)
    formData.append("novo_professor", true)

    $.ajax({
        type: "POST",
        url: "Professores.php",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (response) {
            if(response == true){
                console.log("Success")
                Swal.fire({
                    title: "Professor cadastrado com sucesso!",
                    icon: "success"
                  });
                  $('#cadastrarProfessor').modal('hide')
                  $('#tabela-professores').load(location.href + ' #tabela-professores')
            }
            else {
                console.log("Error")
            }
        }
    });
});

$(document).on('click','.editarProfessorBtn', function () {
    var idProfessor = $(this).val()
    //alert(idProfessor)

    $.ajax({
        type: "GET",
        url: "Professores.php?idProfessor=" + idProfessor,
        success: function (response) {

            var res = JSON.parse(response)

            if(res.status == 404){
                Swal.fire({
                    icon: "error",
                    title: "Professor não encontrado!"
                  });

            } else if(res.status == 200){
                $('#EidProfessor').val(res.data.idProfessor);
                $('#Enomeprof').val(res.data.Nome);
                $('#Ecpfprof').val(res.data.CPF);
                $('#Etelprof').val(res.data.Telefone);
                $('#Enascprof').val(res.data.Nascimento);
                $('#Ecursoprof').val(res.data.Curso);
                $('#Eemailprof').val(res.data.Email);
                $('#Esenhaprof').val(res.data.Senha);
                $('#editarProfessor').modal('show');
            }

        }
    });
});

$('#atualizarProfessor').submit(function (e) { 
    e.preventDefault();

    var formData = new FormData(this)
    formData.append("atualizar_professor", true)

    $.ajax({
        type: "POST",
        url: "Professores.php",
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if(response == true){
                console.log("Success")
                Swal.fire({
                    title: "Professor atualizado com sucesso!",
                    icon: "success"
                  });
                  $('#editarProfessor').modal('hide');
                  $('#tabela-professores').load(location.href + ' #tabela-professores')
                  return
            }
            else {
                console.log("Error")

            }
        }
    });
});

$(document).on('click','.excluirProfessorBtn', function () {

    Swal.fire({
        title: "Deseja excluir o professor selecionado?",
        text: "Você não poderá reverter depois!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#228B22",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {

            var idProfessor = $(this).val();

            $.ajax({
                type: "POST",
                url: "Professores.php",
                data: {
                    'excluir_professor': true,
                    'idProfessor': idProfessor
                },
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                    title: "Excluído!",
                    text: "O professor foi excluído!",
                    icon: "success"
                     });
                    $('#tabela-professores').load(location.href + " #tabela-professores")
                }
            }); 
        }
    });
});

//ALUNO ---------------------------------------------

$('#alunos').click(function (e) { 
    e.preventDefault();

    $('#tabela-alunos').show();
    $('#tabela-professores').hide();
    $('#tabela-aulas').hide();
});

$('#novoAluno').submit(function (e) { 
    e.preventDefault();

    var formData = new FormData(this)
    formData.append("novo_aluno", true)

    $.ajax({
        type: "POST",
        url: "Alunos.php",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (response) {
            if(response == true){
                console.log("Success")
                Swal.fire({
                    title: "Aluno cadastrado com successo!",
                    icon: "success"
                  });
                  $('#cadastrarAluno').modal('hide')
                  $('#tabela-alunos').load(location.href + ' #tabela-alunos')
            }
            else {
                console.log("Error")
            }
        }
    });
});

$(document).on('click','.editarAlunoBtn', function () {
    var idAluno = $(this).val()
    //alert(idAluno)

    $.ajax({
        type: "GET",
        url: "Alunos.php?idAluno=" + idAluno,
        success: function (response) {

            var res = JSON.parse(response)

            if(res.status == 404){
                Swal.fire({
                    icon: "error",
                    title: "Aluno não encontrado!"
                  });

            } else if(res.status == 200){
                $('#EidAluno').val(res.data.idAluno);
                $('#Enomealuno').val(res.data.Nome);
                $('#Ecpfaluno').val(res.data.CPF);
                $('#Etelaluno').val(res.data.Telefone);
                $('#Enascaluno').val(res.data.Nascimento);
                $('#Erespaluno').val(res.data.Responsavel);
                $('#Eemailaluno').val(res.data.Email);
                $('#editarAluno').modal('show');
            }

        }
    });
});

$('#atualizarAluno').submit(function (e) { 
    e.preventDefault();

    var formData = new FormData(this)
    formData.append("atualizar_aluno", true)

    $.ajax({
        type: "POST",
        url: "Alunos.php",
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if(response == true){
                console.log("Success")
                Swal.fire({
                    title: "Aluno atualizado com successo!",
                    icon: "success"
                  });
                  $('#editarAluno').modal('hide');
                  $('#tabela-alunos').load(location.href + ' #tabela-alunos')
                  return
            }
            else {
                console.log("Error")

            }
        }
    });
});

$(document).on('click','.excluirAlunoBtn', function () {

    Swal.fire({
        title: "Deseja excluir o aluno selecionado?",
        text: "Você não poderá reverter depois!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#228B22",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {

            var idAluno = $(this).val();

            $.ajax({
                type: "POST",
                url: "Alunos.php",
                data: {
                    'excluir_aluno': true,
                    'idAluno': idAluno
                },
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                    title: "Excluído!",
                    text: "O aluno foi excluído!",
                    icon: "success"
                     });
                    $('#tabela-alunos').load(location.href + " #tabela-alunos")
                }
            }); 
        }
    });
});

//AULAS ---------------------------------------------------
$('#aulas').click(function (e) { 
    e.preventDefault();

    $('#tabela-alunos').hide();
    $('#tabela-professores').hide();
    $('#tabela-aulas').show();
});

$('#professor').blur(function (e) {  
    e.preventDefault();

    var Prof = $('#professor').val();

    $.ajax({
        type: "POST",
        url: "Aulas.php",
        data: {professor: Prof},
        dataType: "json",
        success: function (response) {
            if(response.msg=='success'){
                $('#curso').val(response.curso);
            }
        }
    });

});

$('#novaAula').submit(function (e) { 
    e.preventDefault();

    if($('#professor').val() == 0){
        Swal.fire({
            icon: "warning",
            title: "Selecione algum professor!"
          });
          return
    } else{

        var formData = new FormData(this)
        formData.append("nova_aula", true)

        $.ajax({
        type: "POST",
        url: "Aulas.php",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function (response) {
            if(response == true){
                console.log("Success")
                Swal.fire({
                    title: "Aula cadastrada com successo!",
                    icon: "success"
                  });
                  $('#cadastrarAula').modal('hide')
                  $('#tabela-aulas').load(location.href + ' #tabela-aulas')
                }
            else {
                console.log("Error")
                }
            }
        });
    }
});

$(document).on('click','.editarAulaBtn', function () {
    var idAula = $(this).val()
    //alert(idAluno)

    $.ajax({
        type: "GET",
        url: "Aulas.php?idAula=" + idAula,
        success: function (response) {

            var res = JSON.parse(response)

            if(res.status == 404){
                Swal.fire({
                    icon: "error",
                    title: "Aula não encontrada!"
                  });

            } else if(res.status == 200){
                $('#EidAula').val(res.data.idAula);
                $('#Etitulo').val(res.data.Titulo);
                $('#Edescricao').val(res.data.Descricao);
                $('#Eprofessor').val(res.data.Professor);
                $('#Edata').val(res.data.Data);
                $('#Ecurso').val(res.data.Curso);
                $('#editarAula').modal('show');
            }

        }
    });
});

$('#atualizarAula').submit(function (e) { 
    e.preventDefault();

    var formData = new FormData(this)
    formData.append("atualizar_aula", true)

    $.ajax({
        type: "POST",
        url: "Aulas.php",
        dataType: 'json',
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if(response == true){
                console.log("Success")
                Swal.fire({
                    title: "Aula atualizada com successo!",
                    icon: "success"
                  });
                  $('#editarAula').modal('hide');
                  $('#tabela-aulas').load(location.href + ' #tabela-aulas')
                  return
            }
            else {
                console.log("Error")

            }
        }
    });
});

$(document).on('click','.excluirAulaBtn', function () {

    Swal.fire({
        title: "Deseja excluir a aula selecionada?",
        text: "Você não poderá reverter depois!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#228B22",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {

            var idAula = $(this).val();

            $.ajax({
                type: "POST",
                url: "Aulas.php",
                data: {
                    'excluir_aula': true,
                    'idAula': idAula
                },
                dataType: "json",
                success: function (response) {
                    Swal.fire({
                    title: "Excluído!",
                    text: "A aula foi excluída!",
                    icon: "success"
                     });
                    $('#tabela-aulas').load(location.href + " #tabela-aulas")
                }
            }); 
        }
    });
});

});