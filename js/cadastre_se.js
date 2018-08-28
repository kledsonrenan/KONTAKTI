// VERIFICAR SE AS SENHA SE DISTINGUE UMA DA OUTRA
let senha = $('input[name=user_pass]');
let confirmar = $('input[name=user_repeat_pass]');
let alert = $('.alert-pass');
let submit = $('button[type=submit]');

submit.attr('disabled', true);

confirmar.on('focusout', () => {
    if (confirmar.val() != senha.val()) {
        alert.html('Ops!! As senhas informadas são diferentes! você só poderá prosseguir depois de corrigi-las.');
        alert.addClass('text-danger');
        submit.attr('disabled', true);
        confirmar.val("");
    } else if ( (confirmar.val() == senha.val()) && senha.val() == "") {
        submit.attr('disabled', true);
    } else {
        alert.html('');
        alert.removeClass('text-danger');
        submit.attr('disabled', false);
    }
});