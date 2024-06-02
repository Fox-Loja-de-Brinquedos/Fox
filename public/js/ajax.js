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
                    if (xhr.status === 401) {
                        window.location.href = '/login'; // Usuário não autenticado, redirecionar para a página de login
                    } else {
                        // Outro erro ocorreu
                        let err = JSON.parse(xhr.responseText);
                        toastr.error(err.message, 'Erro');
                    }
                }
            });
        });
    });
    
    //metodo ajax para remover itens do carrinho de forma assincrona
    $(document).ready(function() {
        $(document).on('submit', '.removerCarrinho', function(e) {
            e.preventDefault();
            let form = $(this);
            let url = form.attr('action');
            let rowId = form.find('input[name="PRODUTO_ID"]').val(); //extrair id unico para remover sua linha posteriormente

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    if(response.success) {
                        $('#item-row-' + rowId).remove(); //removendo linha de item do carrinho

                        // Atualizar o subtotal e o total na página
                        $('#subtotal').text('R$ ' + response.subtotal_formatado);
                        $('#total').text('R$ ' + response.total_formatado);
                    } 
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao remover o item:', error);
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