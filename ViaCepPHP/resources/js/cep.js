
// Mask
$('#cepField').mask('00000-000');

// jQuery
function getAddress(cep = '08030590') {
    $.ajax({
        url: `http://localhost/PW-III/ViaCepPHP/home/${cep}`,
        method: 'GET',
        success: response => {
            $('#streetField').val(response.logradouro);
            $('#districtField').val(response.bairro);
            $('#localityField').val(response.localidade);
        }
    });
}

// Form submit
$('#form').submit(e => {
    e.preventDefault();
    const { cep, street, district, locality } = form;
    
    if ([cep, street, district, locality].every(input => input.value != ''))
        alert('Tudo certo!')
    else
        alert('Impossível! Preencha todos os campos!')
});

// Cep autofill
$('#cepField').keyup(() => {
    if ($('#cepField').val().length > 8) {
        let cepFormatted = $('#cepField').val();
        cepFormatted = cepFormatted.replace('-', '');
        getAddress(cepFormatted);
    }
});

// Na tarefa dizia que não aceitava em JAVASCRIPT, então só usei para automatizar o preenchimento dos campos. A rotina de pegar o endereço do viacep é 100% PHP. 🐘

// O projeto foi feito em arquitetura MVC, usa o 'coffeecode/router' para as rotas e o 'league/plates' para a renderização das views 💻

// Além disso, conta com um design responsivo. É feito em SASS 🎨