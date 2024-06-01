
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



//carrossel de exbir imagens

var mainImg = document.getElementById("main-image");
var thumbnails = document.getElementsByClassName("thumbnail");

Array.from(thumbnails).forEach(function(thumbnail) {
    thumbnail.addEventListener("click", function() {
        mainImg.src = this.src;
    });
});
