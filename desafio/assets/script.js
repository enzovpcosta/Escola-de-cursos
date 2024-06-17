$(document).ready(function() {

    $('.alertLogin').hide();

    $('#login').submit(function (e) { 
        e.preventDefault();
        
        var formData = new FormData(this)
        formData.append('login', true)

        $.ajax({
            type: "POST",
            url: "login.php",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if(response.status == 'email'){
                    $('.alertLogin').text(response.message)
                    $('.alertLogin').show()
                    return
                } else if(response.status == 'senha'){
                    $('.alertLogin').text(response.message)
                    $('.alertLogin').show()
                    return
                } else if(response.status == 'error'){
                    $('.alertLogin').text(response.message)
                    $('.alertLogin').show()
                    return
                } else if(response.status == 'success'){
                    Cookies.set(response.tipo, response.id)
                    location.href = "dashboard.php"
                }
            }
        })
    })

    

    $('#logout').click(function (e) { 
        e.preventDefault();
        Cookies.remove('professor');
        Cookies.remove('aluno');
        location.href = "index.php"
        return
    });


    if(Cookies.get('professor')){
        $('#tabela-professores').hide();
        $('#tabela-alunos').hide();
        $('#tabela-aulas').hide();
         $('#tabela-presenca-alunos').hide();
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
                        $('#novoProfessor')[0].reset()
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
                            title: "Aluno cadastrado com sucesso!",
                            icon: "success"
                        });
                        $('#cadastrarAluno').modal('hide')
                        $('#tabela-alunos').load(location.href + ' #tabela-alunos')
                        $('#novoAluno')[0].reset()
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
                            title: "Aluno atualizado com sucesso!",
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

        $('#novaAula').submit(function (e) { 
            e.preventDefault();

            if($('#professor').val() == 0){
                Swal.fire({
                    icon: "warning",
                    title: "Selecione algum professor!"
                });
            } else if($('#curso').val() == 0){
                Swal.fire({
                    icon: "warning",
                    title: "Selecione algum curso!"
                });
            } else {

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
                            title: "Aula cadastrada com sucesso!",
                            icon: "success"
                        });
                        $('#cadastrarAula').modal('hide')
                        $('#tabela-aulas').load(location.href + ' #tabela-aulas')
                        $('#novaAula')[0].reset()
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
                            title: "Aula atualizada com sucesso!",
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

        $(document).on('click', '.presencaBtn', function () {
            var valor = $(this).val()
            $('#idAulaPresenca').val(valor)
        });

        $("#addAlunoPresenca").submit(function (e) { 
            e.preventDefault();

            if($('#pAluno').val() == 0){
                Swal.fire({
                    icon: "warning",
                    title: "Selecione algum aluno!"
                }); 
            } else {

            var formData = new FormData(this)
            formData.append("adicionar_aluno", true)

            $.ajax({
                type: "POST",
                url: "presenca.php",
                dataType: "json",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if(response == true){
                        Swal.fire({
                            title: "Aluno adicionado com sucesso!",
                            icon: "success"
                        });
                        $('#modaladdpresenca').modal('hide')
                        $('#modalpresenca').modal('show')
                        $('.tabela-presenca').load(location.href + ' .tabela-presenca')
                    } else {
                        Swal.fire({
                            title: "Não foi possível realizar está ação!",
                            text: "Aluno já foi adicionado",
                            icon: "error"
                        });
                    }
                }

            });

            }
        });

        $(document).on('click','.alterarPresenca', function () {
            Swal.fire({
                title: "Você tem certeza?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#228B22",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, alterar!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {

                    var idPresenca = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: "Presenca.php",
                        data: {
                            'alterar_status': true,
                            'idPresenca': idPresenca
                        },
                        dataType: "json",
                        success: function (response) {
                            Swal.fire({
                            title: "Alterado!",
                            text: "O status foi alterado!",
                            icon: "success"
                            });
                            $('.tabela-presenca').load(location.href + " .tabela-presenca")
                        }
                    }); 
                }
            });
        });

        $(document).on('click','.excluirPresenca', function () {
            Swal.fire({
                title: "Deseja excluir o aluno selecionado?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#228B22",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {

                    var idPresenca = $(this).val();

                    $.ajax({
                        type: "POST",
                        url: "Presenca.php",
                        data: {
                            'excluir_presenca': true,
                            'idPresenca': idPresenca
                        },
                        dataType: "json",
                        success: function (response) {
                            Swal.fire({
                            title: "Excluído!",
                            text: "O aluno foi excluído!",
                            icon: "success"
                            });
                            $('.tabela-presenca').load(location.href + " .tabela-presenca")
                        }
                    }); 
                }
            });
        });
    } else {
        $('#tabela-professores').hide();
        $('#tabela-alunos').hide();
        $('#tabela-aulas').hide();
        $('#tabela-presenca-alunos').hide();
        $('#professores').hide();
        $('#alunos').hide();
        $('#presenca').show();

        $('#aulas').click(function (e) { 
            e.preventDefault();

            $('#tabela-aulas').show();
            $('#tabela-presenca-alunos').hide();
            $('.acao').hide();
            $('.new').hide();
        });

        $('#presenca').click(function (e) { 
            e.preventDefault();

            $('#tabela-presenca-alunos').show();
            $('#tabela-aulas').hide();
        });
    }
});