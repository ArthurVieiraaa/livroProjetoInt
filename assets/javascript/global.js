
// util's

getInsertDate = function(type){
    return document.querySelector(type).innerText = new Date().getFullYear();
};

// callback

getInsertDate('#s234sad2');

// active function

document.querySelectorAll('.rf3siq6p3t-item a').forEach(isActive => {
    isActive.addEventListener('click', function(){
        document.querySelector('.rf3siq6p3t-menu').querySelector('.active').classList.remove('active')
        isActive.classList.add('active')
    })
});

// click navbar

document.querySelector('#ui5r6qlhla').addEventListener('click',
    () => {
        document.querySelector('#ui5r6qlhla').classList.toggle('is-active')
        document.querySelector('.rf3siq6p3t-menu').classList.toggle('active')
    }
);

// for

var i;
for(i = 0; i <= books.length; i++){
    insertBooks(books[i]['text'], books[i]['img'],  books[i]['button'], books[i]['link'], books[i]['type']);
};

// function generate

function insertBooks(element, img, button, link, type){
    var element = ((element === '') ? false : element);
    var img = ((img === '') ? false : img);
    var type = ((type === '') ? false : type);
    if (element && type){
        document.querySelector(`#${type}`).insertAdjacentHTML(
            'beforeend',
            `
            <div class='f0axtplhol'>
                <img src=${img} alt='Livro - ${element}' />
                <p>${element}</p>
                <a href="${link}">${button}</a>
            </div>
            `
        );
    };
};

//senha para admin
document.getElementById('adm').onclick = function(){
    const administrador = prompt('Insira a senha')

    if (administrador === null){
        document.getElementById('adm').setAttribute('disabled', 'disabled');
    };

    if (administrador.toLowerCase() == 'bv@2022') {
        document.getElementById('adm').removeAttribute('disabled');
    } else {
        document.getElementById('adm').setAttribute('disabled', 'disabled');        
    };
};