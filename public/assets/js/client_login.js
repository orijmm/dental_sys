$(".inputmask").inputmask();

//$('#validaty_card').inputmask("99-99", { "placeholder": "MM-YY" });

$('#birthday').datetimepicker({
  format: 'DD-MM-YYYY',
  ignoreReadonly: true,
  viewMode: 'years'
});

$('#login-form-link').click(function(e) {
  $("#login-form").delay(100).fadeIn(100);
  $("#reset-form").fadeOut(100);
  $("#register-form").fadeOut(100);
  $('#register-form-link').removeClass('active');
  $(this).addClass('active');
  e.preventDefault();
});

$('#reset_pass').click(function(e) {
  $("#reset-form").delay(100).fadeIn(100);
  $("#login-form").fadeOut(100);
  $("#register-form").fadeOut(100);
  e.preventDefault();
});

$('#register-form-link').click(function(e) {
  $("#register-form").delay(100).fadeIn(100);
  $("#login-form").fadeOut(100);
  $("#reset-form").fadeOut(100);
  $('#login-form-link').removeClass('active');
  $(this).addClass('active');
  e.preventDefault();
});

$(document).on('click', '.btn-submit', function (e) {
    e.preventDefault();
    showLoading();
    var $this = $(this);
    var form_id = $this.closest("form").attr("id"); 
    var form = $('#'+form_id);
    var type = $('#'+form_id+' input[name="_method"]').val();
    if(typeof type == "undefined") {
        type = form.attr('method');
    }
    $.ajax({
        url: form.attr('action'),
        type: type,
        data: form.serialize(),
        dataType: 'json',
        success: function(response) {
            hideLoading();
            var message = '';
            if(response.success){
                notify('success', response.message);
                $('#'+form_id).get(0).reset();
                if(response.url_return) {
                    showLoading();
                    window.location.href = response.url_return;
                }
            } else {
              if(response.validator) {
                var message = '';
                $.each(response.message, function(key, value) {
                  message += value+' ';
                });
                notify('error', message);
              } else {
                notify('error', response.message);
              }
            }
        },
        error: function (status) {
            hideLoading();
            notify('error', status.statusText);
        }
    });
});

$(document).on('click', '#accept_terms', function (e) {
    if( $('#accept_terms').is(':checked') ) {
      document.getElementById('btn-register').disabled = false;
    } else {
      document.getElementById('btn-register').disabled = true;
    }
});


