
document.addEventListener('DOMContentLoaded', function() {
    const minusBtn = document.querySelector('.minus-btn');
    const plusBtn = document.querySelector('.plus-btn');
    const itemQtdInput = document.getElementById('itemQtdInput');
    const itemQtdInputHidden = document.getElementById('itemQtdInputHidden');

    minusBtn.addEventListener('click', function() {
      let currentValue = parseInt(itemQtdInput.value);
      if (currentValue > 1) {
        itemQtdInput.value = currentValue - 1;
        itemQtdInputHidden.value = itemQtdInput.value;
      }
    });

    plusBtn.addEventListener('click', function() {
      let currentValue = parseInt(itemQtdInput.value);
      itemQtdInput.value = currentValue + 1;
      itemQtdInputHidden.value = itemQtdInput.value;
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

//zoom da imagem 
document.addEventListener('DOMContentLoaded', function () {
    const mainImageContainer = document.querySelector('.main-image');
    const mainImage = document.querySelector('.main-image img');

    mainImageContainer.addEventListener('mouseenter', function () {
      mainImageContainer.classList.add('zoomed');
    });

    mainImageContainer.addEventListener('mousemove', function (e) {
      const rect = mainImageContainer.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const xPercent = (x / rect.width) * 100;
      const yPercent = (y / rect.height) * 100;

      mainImage.style.transformOrigin = `${xPercent}% ${yPercent}%`;
    });

    mainImageContainer.addEventListener('mouseleave', function () {
      mainImageContainer.classList.remove('zoomed');
    });
  });