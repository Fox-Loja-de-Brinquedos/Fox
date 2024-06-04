//MASCARA PARA CPF
$(document).ready(function(){
    $('#USUARIO_CPF').mask('000.000.000-00');
});

$(document).ready(function(){
    // Aplicar a máscara ao campo de CPF
    $('#USUARIO_CPF').mask('000.000.000-00');

    $('form').submit(function() {
        var cpf = $('#USUARIO_CPF').val();
        cpf = cpf.replace(/[^\d]/g, '');
        $('#USUARIO_CPF').val(cpf);
    });
});