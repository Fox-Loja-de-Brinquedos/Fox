
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

  