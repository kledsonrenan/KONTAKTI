let desc = $('.contact-desc');
let title = $('.contact-name');
$('input[name=newNome]').focusout(function() {
    if (this.value == '')
        title.html('Nome contato');
    else
        title.html(this.value);
});
$('input[name=newSobrenome]').focusout(function() {
    if (!this.value == '')
        title.html(`${title.html()} ${this.value}`);
});
$('textarea[name=newDescricao]').focusout(function() {
    if (this.value == '')
        desc.html('Descrição contato');
    else
        desc.html(this.value);
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('.contact-img')
            .attr('src', e.target.result)
            .width(auto)
            .height(auto);
        };
        reader.readAsDataURL(input.files[0]);
    }
}