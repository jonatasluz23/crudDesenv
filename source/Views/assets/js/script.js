$(function(){

    // API Via CEP
   /* $('#cep').focusout(function(e){

        var cep = $("#cep").val();

        e.preventDefault();
        var form = $(this);

        $.ajax({
            url: 'https://viacep.com.br/ws/'+ cep +'/json/',
            async: false,
            type: "GET",
            dataType: 'json',
            beforeSend:function(){
                load("open");
            },
            success: function (callback) {
                if(callback != ''){
                    $("#endereco").val(callback.logradouro);
                    $("#complemento").val(callback.complemento);
                    $("#bairro").val(callback.bairro);
                    $("#uf").val(callback.uf);
                    $("#cidade").val(callback.localidade);
                }
            },
            complete: function () {
                load("close");
            }
        });
    });*/
     
    // Cadastro/Edição
    $(".form").submit(function (e) {

        e.preventDefault();
        var form = $(this);

        $.ajax({
            url: form.attr("action"),
            type: "POST",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function () {
                load("open");
            },
            success: function (callback) {
                if(callback.status === true){
                    swal("", callback.result, "success");
                }else{
                    swal("", callback.error, "error");
                }
            },
            complete: function () {
                load("close");
            }
        });
    });

    // Exclusão
    $(document).on('click', '#btnExcluir', function(e){
        e.preventDefault();
        var href = $(this).attr('href');

        $.ajax({
            url: href,
            async: false,
            type: "DELETE",
            dataType: 'json',
            beforeSend:function(){
                load("open");
            },
            success: function (callback) {
                if(callback.status === true){
                    swal("", callback.result, "success");
                }else{
                    swal("", callback.error, "error");
                }
            },
            complete: function () {
                list();
                load("close");
                
            }
        });
    });
});

function load(action){
    var load_div = $(".overlay-load");
    if (action === "open") {
        load_div.fadeIn();
    }else{
        load_div.fadeOut();
    }
}

function list(){
    var include_path = $('base').attr('base');
    $.ajax({
        url: include_path + '/list',
        async: false,
        type: "GET",
        dataType: 'json',
        success: function (callback) {
            $("#table > tbody > tr").html("");
            $(callback).each(function(key, item){
                console.log(item);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><a class="icon btn btn-sm" id="btnEditar" href="'+ include_path +'/update/'+ item.ID +'"><img src="'+include_path+'/source/Views/assets/img/pen.svg" alt="Editar" title="Editar Registro"></a></td>';
                cols += '<td><a class="icon btn btn-sm" id="btnExcluir" href="'+ include_path +'/delete/'+ item.ID +'"><img src="'+include_path+'/source/Views/assets/img/close.svg" alt="Exclui" title="Excluir Registro"></a></td>';
                cols += '<td>' + item.ID + '</td>';
                cols += '<td>' + item.Nome + '</td>';
                cols += '<td>' + item.Nascimento + '</td>';
                cols += '<td>' + item.Idade + '</td>'
                cols += '<td>' + item.Sexo + '</td>';
                cols += '<td>' + item.Hobby + '</td>';
              //  cols += '<td>' + item.Idade + '</td>';
                newRow.append(cols);
                $("#table").append(newRow);
            });
        }
    });
}