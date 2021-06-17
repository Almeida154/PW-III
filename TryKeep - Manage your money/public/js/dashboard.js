'use strict';

// Toggle

var btnMobile = document.querySelector('#btn-mobile')
var sticky = document.querySelector('.sticky-sidebar')
var nav = document.querySelector('#nav')

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

$('.container-navigation').each(function () {
    $(this).on("click", function(){
        console.log($(this).attr('section'));
        removeNavigationClasses()
        getSection($(this).attr('section'))
        $(this).addClass('active')
    });
})

function removeNavigationClasses() {
    $('.container-navigation').each(function() {
        $(this).removeClass('active')
    })
}

function getSection(section) {
    $.ajax({
        url: `dashboard/${section}`,
        type: 'post',
        success: response => {
            $('.content-container').html($(response).find('.content-container').html())
        }
    })
}

// Category Color

function colorCategory() {
    var categories = document.querySelectorAll('#category')
    categories.forEach(category => {
        if (category.getAttribute('category') == 'Income') return category.classList.add('income')
        category.classList.add('expense')
    })
}

colorCategory()

// Filter

function filterForm() {
    $('#filter-form').submit(e => {
        e.preventDefault()
        $('#cb').val(verifyCheckBox())
        $.ajax({
            url: 'dashboard/filter',
            method: 'post',
            data: $('#filter-form').serialize(),
            success: response => {
                $('.table').html($(response).filter('.table').html())
                colorCategory()
            }
        })
    })
}

filterForm()

// Functions

function verifyCheckBox() {
    let cbIncome = document.querySelector('#cb-income')
    let cbExpense = document.querySelector('#cb-expense')
    if (cbIncome.checked && cbExpense.checked) return 'both'
    if (cbIncome.checked && !cbExpense.checked) return 'income'
    if (cbExpense.checked && !cbIncome.checked) return 'expense'
    return 'empty'
}

// Search

function search() {
    $('#inptSearch').keyup(e => {
        $('#cb-income').prop('checked', true)
        $('#cb-expense').prop('checked', true)
        document.querySelectorAll('.selected')[0].classList.add('first')
        document.querySelectorAll('.selected')[1].classList.add('scnd')
        $('.first').text('Tag')
        $('.scnd').text('Order')
        getSearch($(e.target).val())
    })
}

search()

function getSearch(query = '') {
    $.ajax({
        url: query != '' ? `dashboard/search/?query=${query}` : `dashboard/nonSearch`,
        method: 'get',
        success: response => {
            $('.table').html($(response).filter('.table').html())
            colorCategory()
        }
    })
}