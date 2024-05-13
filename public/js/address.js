document.addEventListener('DOMContentLoaded', function() {
    const showAddressFormButton = document.getElementById('showAddressForm');

    const addressForm = document.querySelector('.new-address');

    showAddressFormButton.addEventListener('click', function() {
        addressForm.style.display = 'block';
    });
});


const cancelButton = document.querySelector('.cancel-button');
const addressForm = document.querySelector('.new-address');

cancelButton.addEventListener('click', function() {
  const formInputs = addressForm.querySelectorAll('input[type="text"]');
  formInputs.forEach(input => input.value = '');

  const formNumberInput = addressForm.querySelector('input[type="number"]');
  formNumberInput.value = '';

  addressForm.style.display = 'none';
});

const cepInput = document.querySelector('.address-form-item.formZipCode');
Inputmask('99999-999').mask(cepInput);
