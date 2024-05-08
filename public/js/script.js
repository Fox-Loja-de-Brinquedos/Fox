const entrarButton = document.getElementById('entrarButton');
    const cadastrarButton = document.getElementById('cadastrarButton');
    const entrarSection = document.getElementById('entrarSection');
    const cadastrarSection = document.getElementById('cadastrarSection');
    const loginOption = document.querySelector('.loginOption');

    entrarButton.addEventListener('click', function() {
        entrarSection.style.display = 'block';
        cadastrarSection.style.display = 'none';

        entrarButton.classList.add('log'); 
        cadastrarButton.classList.remove('log'); 
    });

    cadastrarButton.addEventListener('click', function() {
        entrarSection.style.display = 'none';
        cadastrarSection.style.display = 'block';

        entrarButton.classList.remove('log');
        cadastrarButton.classList.add('log'); 

    });


    
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