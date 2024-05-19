//Previne o envio de formulário de pesquisa caso esteja vazio
document.addEventListener("DOMContentLoaded", function () {
    // Captura o formulário
    var form = document.querySelector(".form-inline");

    // Adiciona um ouvinte de evento para a submissão do formulário
    form.addEventListener("submit", function (event) {
        // Captura o valor do campo de pesquisa
        var searchTerm = document.querySelector(".searchbar").value.trim();

        // Verifica se o campo de pesquisa está vazio
        if (searchTerm === "") {
            // Impede o envio do formulário
            event.preventDefault();
        }
    });


// Atalho de pesquisa NAVBAR
const searchOptions = document.querySelectorAll('.searchOption');
const searchbar = document.querySelector('.searchbar');

// Função para remover a última letra "S" se existir e ajustar "Jogos de cartas"
function removeLastS(text) {
    if (text === 'Jogos de cartas') {
        return 'carta';
    } else if(text === 'Outros brinquedos'){
        return '%';
    } 
    else if (text.endsWith('s') || text.endsWith('S')) {
        return text.slice(0, -1);
    }
    return text;
}

searchOptions.forEach(option => {
    option.addEventListener('click', function() {
        // Remover a última letra "S" do texto da opção, se existir
        const originalText = option.textContent;
        const modifiedText = removeLastS(originalText);
        
        searchbar.value = modifiedText;
        // Se necessário, substitua "form" pelo seletor correto para o seu formulário
        document.querySelector('form').submit();
    });
});







});




