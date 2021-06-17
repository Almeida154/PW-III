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

// Active Navigation

const containerNavigation = document.querySelectorAll('.container-navigation');

function removeNavigationClasses() {
    containerNavigation.forEach(cn => {
        if (cn.classList.contains('active'))
            cn.classList.remove('active')
    })
}

containerNavigation.forEach(cn => {
    cn.addEventListener('click', () => {
        removeNavigationClasses()
        cn.classList.add('active')
    })
})

// Category Color

function colorCategory() {
    const categories = document.querySelectorAll('#category')
    categories.forEach(category => {
        if (category.getAttribute('category') == 'Income') return category.classList.add('income')
        category.classList.add('expense')
    })
}

colorCategory()

// Filter

$('#cb').css('display', 'none')

$('#filter-form').submit(e => {
    e.preventDefault()
    $('#cb').val(verifyCheckBox())
    $.ajax({
        url: 'dashboard/filter',
        method: 'post',
        data: $('#filter-form').serialize(),
        success: response => {
            //console.log(response)
            $('.table').html(
                $(response).filter('.table').html()
            )
            colorCategory()
        }
    })
})

// Functions

let cbIncome = document.querySelector('#cb-income')
let cbExpense = document.querySelector('#cb-expense')

function verifyCheckBox() {
    if (cbIncome.checked && cbExpense.checked) return 'both'
    if (cbIncome.checked && !cbExpense.checked) return 'income'
    if (cbExpense.checked && !cbIncome.checked) return 'expense'
    return 'empty'
}

// Search

$('#inptSearch').keyup(e => {
    $('#cb-income').prop('checked', true)
    $('#cb-expense').prop('checked', true)
    document.querySelectorAll('.selected')[0].classList.add('first')
    document.querySelectorAll('.selected')[1].classList.add('scnd')
    $('.first').text('Tag')
    $('.scnd').text('Order')
    search($(e.target).val())
})

const search = (query = '') => {
    $.ajax({
        url: query != '' ? `dashboard/search/?query=${query}` : `dashboard/nonSearch`,
        method: 'get',
        success: response => {
            $('.table').html(
                $(response).filter('.table').html()
            )
            colorCategory()
        }
    })
}