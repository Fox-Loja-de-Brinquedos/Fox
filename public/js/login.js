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