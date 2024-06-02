    //metodo ajax para adicionar itens ao carrinho de forma assincrona
    $(document).ready(function() { 
        $(document).on('submit', '.adicionarItemForm', function(e) { 
            e.preventDefault(); //impede o comportamento padrão do submit do formulário, que seria enviar o formulário e recarregar a página

            let form = $(this); //aqui guardamos o formulario q foi apertado
            let url = form.attr('action'); //Extrai o valor do atributo action do formulário, que no caso é a url onde os dados sao enviados

            $.ajax({ // função jQuery que realiza a solicitação AJAX
                type: "POST", // tipo de solicitacao HTTP
                url: url, //qual arquivo recebera a requisição
                data: form.serialize(), //transforma os dados do formulario em um formato especifico para AJAX
                success: function(response) { //caso a solicitação tenha sucesso, os dados do servidor estarao dentro de response
                    toastr.success(response.success, 'Sucesso');
                },
                error: function(xhr, status, error) { //caso a solicitação falhe, os parametros são detalhes do erro
                    let err = JSON.parse(xhr.responseText);
                    toastr.error(err.message, 'Erro');
                }
            });
        });
    });





    

  // AQUI PARA PERSONALIZAR O POPUP de adicionar produto ao carrinho da biblioteca TOASTR
  toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "300",
    "timeOut": "1000",
    "extendedTimeOut": "500",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}