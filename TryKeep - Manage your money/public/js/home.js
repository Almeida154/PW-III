
// Anime

function animeScrool(){
    var $target = [$('.anime-top'), $('.anime-left')]
	var documentTop = $(document).scrollTop()
	var offset = $(window).height() * 3 / 4
    
    for(let i = 0; i < $target.length; i++){
        $target[i].each(function() {
            var itemTop = $(this).offset().top
            if(documentTop > itemTop - offset) $(this).addClass('anime-start')
            else $(this).removeClass('anime-start')
        })
    }
}

function animeJust() {
    setTimeout(() => {
        $('#header').addClass('anime-start')
        $('#content').addClass('anime-start')
        $('#icon').addClass('anime-start')
    }, 500)
}

// Slide

const slidePartners = document.querySelector('#slide')
const partners = ['centropaula', 'flaticon', 'freepik', 'origamid', 'vscode']

partners.forEach(partner => {
    let div = document.createElement('div')
    div.classList.add('slide-cell')
    div.style.backgroundImage = `url('public/svg/slide/${partner}.svg')`
    slidePartners.append(div)
})

$('#slide').flickity({
    cellAlign: 'left',
    contain: true,
    prevNextButtons: false,
    pageDots: true,
    autoplay: 3000,
    wrapAround: true
});

// To Top

function toTop() {
    $('#logo-anchor').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
}

// Setting Functions

$(document).ready(() => {
    animeJust()
    toTop()
})

$(document).scroll(() => animeScrool())