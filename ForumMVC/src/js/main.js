const header = document.querySelector('.header');
const hero = document.querySelector('.hero');

window.onscroll = () => {
    if (this.scrollY > 30) {
        header.classList.add('sticky-header');
        hero.classList.add('sticky-hero');
    } else {
        header.classList.remove('sticky-header');
        hero.classList.remove('sticky-hero');
    }
}