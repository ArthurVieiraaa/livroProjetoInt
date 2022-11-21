const error_cpf_login = document.querySelector('#span-error-cpf');
const error_phone = document.querySelector('#span-error-phone');

  // cpf's

const input_01 = document.querySelector('#cpf');

input_01.addEventListener('keypress', (e) => {
    let inputLength = input_01.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_cpf_login.innerHTML = '';
        if (inputLength === 3 || inputLength === 7){
            input_01.value += '.';
        }else if(inputLength === 11){
            input_01.value += '-';
        };
    }else{
        error_cpf_login.innerHTML = '* Insira apenas numeros';
    };
});

// telefone

const input_04 = document.querySelector('#phone');

input_04.addEventListener('keypress', (e) => {
    let inputLength = input_04.value.length;

    var key = e.keyCode || e.charCode;

    if (key >= 48 && key <= 57) {
        error_phone.innerHTML = '';
        if (inputLength === 2){
            input_04.value = '('+ (input_04.value.length === 2 ? input_04.value : 0) + ')';
        }else if(inputLength === 5){
            input_04.value += ' ';
        }else if(inputLength === 10){
            input_04.value += '-';
        };
    }else{
        error_phone.innerHTML = '* Insira apenas numeros';
    };
});