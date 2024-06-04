
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