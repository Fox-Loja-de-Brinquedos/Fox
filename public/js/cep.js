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


document.getElementById('cepInput').addEventListener('load', function() {
    this.value = formatCEP(this.value);
});
window.addEventListener("load", (event) => {
    let cepInput = document.getElementById('cepInput');
    cepInput.value = formatCEP(cepInput.value);
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