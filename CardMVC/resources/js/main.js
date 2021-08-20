// Variables
var title = document.querySelector('#name');
var price = document.querySelector('#price');
var league = document.querySelector('#league');
var description = document.querySelector('#description');
var colors = document.querySelector('#colors');
var image = document.querySelector('.card-image');
var fab = document.querySelector('.fab');

const getShirts = async () => {
    let req = await fetch('http://localhost/CardMVC/products.json');
    let res = await req.json();
    fabClick(res);
}

function fabClick(shirts) {    
    // Click event
    setShirt(shirts[0]);
    let i = 1;
    fab.addEventListener('click', () => {
        if (i == 6) i = 0;
        reset();
        setShirt(shirts[i]);
        i++;
    })
}

const setShirt = shirt => {
    let nameShirt = document.createTextNode(shirt.name);
    title.appendChild(nameShirt);

    let priceShirt = document.createTextNode('$' + shirt.price);
    price.appendChild(priceShirt);

    let descriptionShirt = document.createTextNode(shirt.description);
    description.appendChild(descriptionShirt);

    let leagueShirt = document.createTextNode(shirt.league);
    league.appendChild(leagueShirt);
    
    let imageShirt = document.createElement('img');
    imageShirt.src = `resources/images/${shirt.image}.png`;
    image.appendChild(imageShirt);

    shirt.colors.map(color => {
        let uniqueColor = document.createElement('li');
        uniqueColor.style.backgroundColor = `${color.color}`;
        colors.append(uniqueColor);
    })
}

const reset = () => {
    title.innerHTML = '';
    price.innerHTML = '';
    league.innerHTML = '';
    description.innerHTML = '';
    image.innerHTML = '';
    colors.innerHTML = '';
}

getShirts();