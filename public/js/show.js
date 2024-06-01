//funcao quantidade
document.addEventListener("DOMContentLoaded", function() {
    const minusBtns = document.querySelectorAll(".minus-btn");
    const plusBtns = document.querySelectorAll(".plus-btn");

    minusBtns.forEach(btn => {
        btn.addEventListener("click", function() {
            const input = btn.nextElementSibling;
            let value = parseInt(input.value);
            if (value > 1) {
                value--;
                input.value = value;
            }
        });
    });

    plusBtns.forEach(btn => {
        btn.addEventListener("click", function() {
            const input = btn.previousElementSibling;
            let value = parseInt(input.value);
            value++;
            input.value = value;
        });
    });
});

//funcao cep

function formatCEP(value) {
    value = value.replace(/\D/g, '');

    if (value.length > 5) {
        value = value.slice(0, 5) + '-' + value.slice(5, 8);
    }
    return value;
}

document.getElementById('cepInput').addEventListener('input', function() {
    this.value = formatCEP(this.value);
});

document.getElementById('calculateButton').addEventListener('click', function() {
    var cep = document.getElementById('cepInput').value.replace('-', '');
    var freteResultDiv = document.getElementById('freteResult');

    freteResultDiv.innerText = '';
    if (cep.length === 8) {
        var frete = 10.00;
        var freteText = 'SEDEX: Em até 4 dias úteis R$: ' + frete.toFixed(2).replace('.', ',');

        freteResultDiv.innerText = freteText;
    }
});

//carrossel de exbir imagens

var mainImg = document.getElementById("main-image");
var thumbnails = document.getElementsByClassName("thumbnail");

Array.from(thumbnails).forEach(function(thumbnail) {
    thumbnail.addEventListener("click", function() {
        mainImg.src = this.src;
    });
});