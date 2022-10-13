
// util's

getInsertDate = function(type){
    return document.querySelector(type).innerText = new Date().getFullYear();
};

// callback

getInsertDate('#s234sad2');

// book's

const books = [
    {
        id: 1,
        text: 'Endurance',
        img: 'https://images-na.ssl-images-amazon.com/images/I/51Entnc8cUL._SX441_BO1,204,203,200_.jpg',
        button: 'Comprar',
        link: 'endurance.html',
        type: 'line-01'
    },

    {
        id: 2,
        text: 'O Homem De Giz',
        img: 'https://images-na.ssl-images-amazon.com/images/I/31KPmUV6FBL._SY498_BO1,204,203,200_.jpg',
        button: 'Comprar',
        link: '#',
        type: 'line-01'
    },

    {
        id: 3,
        text: 'O Cortiço',
        img: 'https://images-na.ssl-images-amazon.com/images/I/518IaZYte8L._SX328_BO1,204,203,200_.jpg',
        button: 'Comprar',
        link: '#',
        type: 'line-01'
    },

    {
        id: 4,
        text: 'O poder do habito',
        img: 'https://images-na.ssl-images-amazon.com/images/I/51Xby92J9KL._SY344_BO1,204,203,200_QL70_ML2_.jpg',
        button: 'Comprar',
        link: '#',
        type: 'line-01'
    },

    {
        id: 5,
        text: 'Cabeça Fria, Coração Quente Capa',
        img: 'https://images-na.ssl-images-amazon.com/images/I/41afp7FgH8L._SX346_BO1,204,203,200_.jpg',
        button: 'Comprar',
        link: '#',
        type: 'line-02'
    },

    {
        id: 6,
        text: 'Quando Ninguém Está Olhando Capa',
        img: 'https://images-na.ssl-images-amazon.com/images/I/51jQqNedq9L._SX258_BO1,204,203,200_QL70_ML2_.jpg',
        button: 'Comprar',
        link: '#',
        type: 'line-02'
    },

    {
        id: 7,
        text: 'Extraordinário',
        img: 'https://images-na.ssl-images-amazon.com/images/I/31FrF2A0gKL._SX258_BO1,204,203,200_QL70_ML2_.jpg',
        button: 'Comprar',
        link: '#',
        type: 'line-02'
    },

    {
        id: 8,
        text: 'Poder e manipulação',
        img: 'https://images-na.ssl-images-amazon.com/images/I/412PUfafFzL._SY344_BO1,204,203,200_QL70_ML2_.jpg',
        button: 'Comprar',
        link: '#',
        type: 'line-02'
    },
];

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