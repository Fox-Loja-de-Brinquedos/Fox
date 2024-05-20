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


// Seleciona todos os banners
const banners = document.querySelectorAll('.banner-slide');

// Adiciona um evento de clique a cada banner
banners.forEach(banner => {
    banner.addEventListener('click', function(event) {
        // Previne o comportamento padrão do link
        event.preventDefault();

        // Seleciona o input de busca e o formulário
        const searchInput = document.querySelector('.searchbar');
        const searchForm = searchInput.closest('form');

        // Define o valor do input de busca com base no atributo data-search do banner
        const searchValue = banner.getAttribute('data-search');
        searchInput.value = searchValue;

        // Submete o formulário
        searchForm.submit();
    });
});


//Carroussel de produto
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 4,
    spaceBetween: 37,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
});

