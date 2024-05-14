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
});


//Envia o formulário de promoção automaticamente ao clicar na checkbox
document.addEventListener('DOMContentLoaded', function () {
    // Encontra a caixa de seleção, o formulário e o estado da caixa de seleção
    var checkbox = document.getElementById('promotion-checkbox');
    var form = document.getElementById('promotion-form');
    var isChecked = localStorage.getItem('promotionCheckboxChecked');

    // Se o estado estiver marcado, marca a caixa de seleção
    if (isChecked === 'true') {
        checkbox.checked = true;
    }

    // Função para enviar o formulário
    function submitForm() {
        // Verifica se o formulário é válido
        if (form.checkValidity()) {
            form.submit();
        }
    }


    // Adiciona um ouvinte de evento de clique na caixa de seleção
    checkbox.addEventListener('change', function () {
        // Salva o estado da caixa de seleção no localStorage
        localStorage.setItem('promotionCheckboxChecked', this.checked);

        // Atualiza a URL apenas se a caixa de seleção estiver marcada
        if (this.checked) {
            var url = new URL(window.location.href);
            url.searchParams.set('promotion_checkbox', 'true');
            history.pushState(null, null, url.toString());
        } else {
            var url = new URL(window.location.href);
            url.searchParams.delete('promotion_checkbox');
            history.pushState(null, null, url.toString());
        }

        // Envia o formulário
        submitForm();
    });
});

// Price Slider
const priceInputs = document.querySelectorAll(".price-input input");
const rangeInputs = document.querySelectorAll(".range-input input");
const range = document.querySelector(".slider .progress");

let priceGap = 1000;

// Função para atualizar os inputs de preço quando o slider é movido
function updatePriceInputs() {
    let minVal = parseInt(rangeInputs[0].value);
    let maxVal = parseInt(rangeInputs[1].value);

    priceInputs[0].value = minVal;
    priceInputs[1].value = maxVal;
}

// Função para garantir que o valor máximo não seja menor que o valor mínimo
function adjustMaxPrice() {
    let minPrice = parseInt(priceInputs[0].value);
    let maxPrice = parseInt(priceInputs[1].value);

    if (maxPrice < minPrice) {
        maxPrice = minPrice + 1;
        priceInputs[1].value = maxPrice;
    }
}

// Função para atualizar o slider quando os inputs de preço são alterados
function updateSlider() {
    let minPrice = parseInt(priceInputs[0].value);
    let maxPrice = parseInt(priceInputs[1].value);

    adjustMaxPrice(); // Chamando a função para garantir que o valor máximo seja válido

    rangeInputs[0].value = minPrice;
    rangeInputs[1].value = maxPrice;

    range.style.left = (minPrice / rangeInputs[0].max) * 100 + "%";
    range.style.width = ((maxPrice - minPrice) / rangeInputs[1].max) * 100 + "%"; // Corrigindo a definição da largura da barra de progresso
}

// Função para submeter o formulário após 1 segundo
function submitFormAfterDelay() {
    setTimeout(() => {
        document.getElementById("price-filter-form").submit();
    }, 700);
}

// Função para salvar os valores dos inputs localmente
function saveInputsLocally() {
    localStorage.setItem("minPrice", priceInputs[0].value);
    localStorage.setItem("maxPrice", priceInputs[1].value);
}

// Função para carregar os valores dos inputs armazenados localmente
function loadInputsFromLocalStorage() {
    let minPrice = localStorage.getItem("minPrice");
    let maxPrice = localStorage.getItem("maxPrice");

    if (minPrice !== null && maxPrice !== null) {
        priceInputs[0].value = minPrice;
        priceInputs[1].value = maxPrice;
        updateSlider();
    }
}

// Event listeners para os inputs de preço
priceInputs.forEach((input) => {
    input.addEventListener("input", () => {
        updateSlider();
        saveInputsLocally(); // Salvando os valores localmente ao alterar
    });
});

// Event listeners para os inputs de slider
rangeInputs.forEach((input) => {
    input.addEventListener("input", () => {
        updatePriceInputs();
        adjustMaxPrice(); // Chamando a função para garantir que o valor máximo seja válido
        updateSlider();
        saveInputsLocally(); // Salvando os valores localmente ao alterar
    });

    input.addEventListener("mouseup", () => {
        submitFormAfterDelay();
    });
});

// Chamada inicial para configurar o slider
loadInputsFromLocalStorage();
updateSlider();