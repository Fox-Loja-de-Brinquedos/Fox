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



const priceInputs = document.querySelectorAll(".price-input input");
const rangeInputs = document.querySelectorAll(".range-input input");
const range = document.querySelector(".slider .progress");

let priceGap = 1000;

priceInputs.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minPrice = parseInt(priceInputs[0].value);
    let maxPrice = parseInt(priceInputs[1].value);

    if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInputs[1].max) {
      if (e.target.className === "min-input") {
        rangeInputs[0].value = minPrice;
        range.style.left = (minPrice / rangeInputs[0].max) * 100 + "%";
      } else {
        rangeInputs[1].value = maxPrice;
        range.style.right = 100 - (maxPrice / rangeInputs[1].max) * 100 + "%";
      }
    }
  });
});

rangeInputs.forEach((input) => {
  input.addEventListener("input", (e) => {
    let minVal = parseInt(rangeInputs[0].value);
    let maxVal = parseInt(rangeInputs[1].value);

    if (maxVal - minVal < priceGap) {
      if (e.target.className === "min-range") {
        rangeInputs[0].value = maxVal - priceGap;
      } else {
        rangeInputs[1].value = minVal + priceGap;
      }
    } else {
      priceInputs[0].value = minVal;
      priceInputs[1].value = maxVal;
      range.style.left = (minVal / rangeInputs[0].max) * 100 + "%";
      range.style.right = 100 - (maxVal / rangeInputs[1].max) * 100 + "%";
    }
  });
});