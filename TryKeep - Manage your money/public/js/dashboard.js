// Toggle

const btnMobile = document.querySelector('#btn-mobile')
const sticky = document.querySelector('.sticky-sidebar')
const nav = document.querySelector('#nav')

function toggleMenu(event) {
    let elements = [sticky, nav]
    elements.map(elem => elem.classList.toggle('active'))
    if(elements[1].classList.contains('active')) {
        event.currentTarget.setAttribute('aria-expanded', 'true')
        event.currentTarget.setAttribute('aria-label', 'Close Menu')
        return
    }
    event.currentTarget.setAttribute('aria-expanded', 'false')
    event.currentTarget.setAttribute('aria-label', 'Open Menu')
}

btnMobile.addEventListener('click', toggleMenu)