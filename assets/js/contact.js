document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('contactForm');
  if (!form || typeof jQuery === 'undefined' || typeof resetAjax === 'undefined') {
    return;
  }

  var successMsg = document.getElementById('contactSuccessMsg');
  var button = form.querySelector('button[type="submit"]');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    if (button) {
      button.disabled = true;
    }

    var categoryField = form.querySelector('input[name="category"]:checked');
    var payload = {
      action: 'reset_registro',
      nonce: resetAjax.nonce,
      nombre: form.elements['name'] ? form.elements['name'].value : '',
      email: form.elements['email'] ? form.elements['email'].value : '',
      category: categoryField ? categoryField.value : '',
      subject: form.elements['subject'] ? form.elements['subject'].value : '',
      message: form.elements['message'] ? form.elements['message'].value : '',
      website: form.elements['website'] ? form.elements['website'].value : '',
      form_loaded: form.elements['form_loaded'] ? form.elements['form_loaded'].value : 0,
      form_token: form.elements['form_token'] ? form.elements['form_token'].value : ''
    };

    jQuery.post(resetAjax.url, payload)
      .done(function (response) {
        if (response && response.success) {
          form.style.display = 'none';
          if (successMsg) {
            successMsg.style.display = 'block';
          }
          return;
        }

        if (button) {
          button.disabled = false;
        }
      })
      .fail(function () {
        if (button) {
          button.disabled = false;
        }
      });
  });
});
