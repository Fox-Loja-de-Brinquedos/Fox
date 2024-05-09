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
