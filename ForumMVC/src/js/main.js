const header = document.querySelector('.header');
const hero = document.querySelector('.hero');
const cards = document.querySelectorAll('.posts__card');

window.onscroll = () => {
    if (this.scrollY > 30) {
        header.classList.add('sticky-header');
        hero.classList.add('sticky-hero');
    } else {
        header.classList.remove('sticky-header');
        hero.classList.remove('sticky-hero');
    }
}

cards.forEach(card => {
    card.addEventListener('click', () => {
        let key = card.getAttribute('key');
        window.location.href = `http://localhost/PW-III/ForumMVC/post/${key}`;
    })
});