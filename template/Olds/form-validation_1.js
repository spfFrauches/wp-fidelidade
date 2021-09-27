
$(document).ready(function(){
    
  $('#cpf').mask('000.000.000-00', {reverse: false});
  $('.cpf').mask('000.000.000-00', {reverse: false});
  $('#cpf_marcacao').mask('000.000.000-00', {reverse: false});
  $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: false});
  $('.telefoneform').mask('(99)99999-9999', {reverse: false});
  $('.cepform').mask('99.999-999', {reverse: false});
  
});



// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  }, false)
})()
