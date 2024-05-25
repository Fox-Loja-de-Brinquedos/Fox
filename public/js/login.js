document.addEventListener('DOMContentLoaded', function () {
    const entrarButton = document.getElementById('entrarButton');
    const cadastrarButton = document.getElementById('cadastrarButton');
    const entrarSection = document.getElementById('entrarSection');
    const cadastrarSection = document.getElementById('cadastrarSection');

    // Função para alternar entre as seções
    function showSection(sectionToShow, sectionToHide, buttonToActivate, buttonToDeactivate) {
        sectionToShow.style.display = 'block';
        sectionToHide.style.display = 'none';
        buttonToActivate.classList.add('log');
        buttonToDeactivate.classList.remove('log');
    }

    // Eventos de clique para alternar entre as seções
    entrarButton.addEventListener('click', function() {
        showSection(entrarSection, cadastrarSection, entrarButton, cadastrarButton);
    });

    cadastrarButton.addEventListener('click', function() {
        showSection(cadastrarSection, entrarSection, cadastrarButton, entrarButton);
    });

    // Verifica se há erros no formulário de cadastro e exibe a seção correspondente
    if (document.querySelectorAll('#registerForm .alert').length > 0) {
        showSection(cadastrarSection, entrarSection, cadastrarButton, entrarButton);
    }
    
});


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

 
document.addEventListener("DOMContentLoaded", function () {
    const minusBtns = document.querySelectorAll(".minus-btn");
    const plusBtns = document.querySelectorAll(".plus-btn");

    minusBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            const input = btn.nextElementSibling;
            let value = parseInt(input.value);
            if (value > 1) {
                value--;
                input.value = value;
            }
        });
    });

    plusBtns.forEach(btn => {
        btn.addEventListener("click", function () {
            const input = btn.previousElementSibling;
            let value = parseInt(input.value);
            value++;
            input.value = value;
        });
    });
});
