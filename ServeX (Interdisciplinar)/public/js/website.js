
// Splash JS

$(document).ready(() => {
    // splash()
    $('.container-splash').css('display', 'none')
    $('.container-dash').css('display', 'inline')
    $('.container-dash').addClass('anime-left')
    setTimeout(() => {
        $('.container-dash').addClass('anime-start')
    }, 100)
    
})

const splash = async () => {
    setTimeout(() => {
        $('.wrapper-splash').addClass('anime-start')
    }, 600)

    setTimeout(() => {
        $('.wrapper-splash').removeClass('anime-start')
    }, 2500)

    setTimeout(() => {
        $('.container-splash').addClass('anime-background')
    }, 2700)

    setTimeout(() => {
        $('.container-splash').css('display', 'none')
        $('.container-dash').css('display', 'table')
        $('.container-dash').addClass('anime-left')
    }, 3700)

    setTimeout(() => {
        $('.container-dash').addClass('anime-start')
    }, 3720)

    setTimeout(() => {
        $('.container-dash').css('display', 'inline')
    }, 5200)

}

// Dashboard JS

var sticky = $('.sticky-filter')
var cards = $('.content')

$(window).scroll(() => {
    navBar(window)
    stickyFilter(window) 
})

const navBar = (w) => {
    this.scrollY > 20
    ? $('nav').addClass('sticky')
    : $('nav').removeClass('sticky')
}

const stickyFilter = (w) => {
    if($('.dropdown').hasClass('open')) {
        $('.sticky-filter').css('position', 'absolute')
        return
    }
    if($(this).scrollTop() + sticky.outerHeight() <= cards.outerHeight()){
        sticky.css('position', 'fixed')
        sticky.css('margin-top', 0)
        return
    }
    sticky.css('position', 'absolute')
    sticky.css('margin-top', cards.outerHeight() - sticky.outerHeight())
}

$('.dropdown').focus(e => {
    e.preventDefault();
    e.target.focus({preventScroll: true});
    if(!$('.dropdown').hasClass('open')) {
        sticky.css('margin-top', $(document).scrollTop())
        return
    }
    sticky.css('margin-top', 0)
})

// Filter

$('#select-form').submit(e => {
    $('#inptSearch').val('')
    e.preventDefault()
    $.ajax({
        url: ($('.selected').text() == 'Nothing') ? `/` : `/filter/${$('.selected').text()}`,
        type: 'get',
        dataType: 'html',
        success: response => {
            $('.content').html(jQuery(response).find('.content').html())
        }
    })
})

// Search

$('#inptSearch').keyup(e => {
    $('.selected').text('Category')
    search($(e.target).val())
})

const search = (query = '') => {
    $.ajax({
        url: query != '' ? '/search' : '/',
        method: 'get',
        data: {query: query},
        dataType: 'html',
        success: response => $('.content').html($(response).find('.content').html())
    })
}

