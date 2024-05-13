//abrir formulario de adicionar novo endereço
document.addEventListener('DOMContentLoaded', function() {
    const showAddressFormButton = document.getElementById('showAddressForm');
    const addressForm = document.querySelector('.new-address');
    showAddressFormButton.addEventListener('click', function() {
        addressForm.style.display = 'block';
    });
});

//fechar o formulario de adicionar novo endereço e limpar o conteudo
const cancelButton = document.querySelector('.cancel-button');
const addressForm = document.querySelector('.new-address');

cancelButton.addEventListener('click', function() {
  const formInputs = addressForm.querySelectorAll('input[type="text"]');
  formInputs.forEach(input => input.value = '');

  const formNumberInput = addressForm.querySelector('input[type="number"]');
  formNumberInput.value = '';

  addressForm.style.display = 'none';
});

//mascara para cep
const cepInput = document.querySelector('.address-form-item.formZipCode');
Inputmask('99999-999').mask(cepInput);

//abrir formulario de edição
function showUpdateSection() {
  var updateSection = document.getElementById("updateSection");
  updateSection.style.display = "block";
}

//fechar formulario de edição
const cancelUpdate = document.getElementById('cancelUpdate');
const addressUpdate = document.getElementById('updateSection');

cancelUpdate.addEventListener('click', function() {
  addressUpdate.style.display = 'none';
});

//mascara para cep update
const cepMask = document.getElementById('cepUpdate');
Inputmask('99999-999').mask(cepMask);


