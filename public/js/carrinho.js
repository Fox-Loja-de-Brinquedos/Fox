//esse codigo serve para controlar os botoes de + e - no carrinho
document.addEventListener('DOMContentLoaded', function() {
  const minusButtons = document.querySelectorAll('.minus-btn');
  const plusButtons = document.querySelectorAll('.plus-btn');

  minusButtons.forEach(minusBtn => {
    minusBtn.addEventListener('click', function(event) {
      event.preventDefault();
      const form = minusBtn.closest('form');
      const produtoId = form.querySelector('input[name="PRODUTO_ID"]').value;
      const itemQtdInput = document.getElementById(`item-qtd-${produtoId}`);
      const decrementInput = document.getElementById(`decrement-${produtoId}`);

      let currentValue = parseInt(itemQtdInput.value);
      if (currentValue > 1) {
        currentValue--;
        itemQtdInput.value = currentValue;
        decrementInput.value = currentValue;
        form.querySelector('input[name="ITEM_QTD"]').value = currentValue;  // Atualiza o input hidden do form
        form.submit();
      }
    });
  });

  plusButtons.forEach(plusBtn => {
    plusBtn.addEventListener('click', function(event) {
      event.preventDefault();
      const form = plusBtn.closest('form');
      const produtoId = form.querySelector('input[name="PRODUTO_ID"]').value;
      const itemQtdInput = document.getElementById(`item-qtd-${produtoId}`);
      const incrementInput = document.getElementById(`increment-${produtoId}`);

      let currentValue = parseInt(itemQtdInput.value);
      currentValue++;
      itemQtdInput.value = currentValue;
      incrementInput.value = currentValue;
      form.querySelector('input[name="ITEM_QTD"]').value = currentValue;  // Atualiza o input hidden do form
      form.submit();
    });
  });
});