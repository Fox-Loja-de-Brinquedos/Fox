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

//Reset de Filtros de Pesquisa
function resetFilters() {
    var checkboxes = document.querySelectorAll('#filter-container input[type="checkbox"]');
    var slider = document.getElementById("valueRange");

    // Percorre todos os checkboxes e desmarca-os
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });

    // Volta para posição inicial o Slider
    slider.value = slider.defaultValue;
}


// Adiciona um evento change para todas as checkboxes com a classe categoria-checkbox
document.querySelectorAll('.categoria-checkbox').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        // Submete o formulário quando uma checkbox é Checkada
        document.getElementById('filter-form').submit();
    });
});

