
const activeNavigation = document.querySelectorAll('.container-navigation')[0]
activeNavigation.classList.add('activeContainer')

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
            url: 'filter',
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
    let url = '//localhost/PW-III/TryKeep - Manage your money/public/dashboard'
    $.ajax({
        url: query != '' ? `${url}/search/?query=${query}` : `${url}/nonSearch`,
        method: 'get',
        success: response => {
            $('.table').html($(response).filter('.table').html())
            colorCategory()
        }
    })
}