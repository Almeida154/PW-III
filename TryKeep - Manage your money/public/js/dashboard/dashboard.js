
// Toggle

const btnMobile = document.querySelector('#btn-mobile')
const sticky = document.querySelector('.sticky-sidebar')
const nav = document.querySelector('#nav')

btnMobile.addEventListener('click', toggleMenu)

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

// Navigation

const containerNavigation = document.querySelectorAll('.container-navigation')
let url = '//localhost/PW-III/TryKeep - Manage your money/public/dashboard/'

containerNavigation.forEach(cn => {
    cn.addEventListener('click', () => {
        window.location.href = url + cn.getAttribute('section')
    })
})