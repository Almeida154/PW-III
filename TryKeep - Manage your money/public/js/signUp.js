
import { capitalize, capitalizeAll, firstName, sweetAlert, currencyMask } from './functions/util.js'

$(document).ready(() => {
    $('#signUp').addClass('active-link');
})

const user = {
    name: '',
    email: '',
    password: '',
    income: 0,
    expense: 0,
}

// Step 1
$('#formStart').submit(e => start(e))
async function start(e) {
    e.preventDefault()
    const { name, email, password } = formStart
    if ([name, email, password].every(input => input.value != '')) {
        let bool = await validateEmail() === 'true'
        // console.log(bool)
        if (bool) {
            ajaxIncome()
            user.name = capitalizeAll(name.value)
            user.email = email.value
            user.password = password.value
            return
        }
        sweetAlert(`Email already registered!`, false)
        return
    }
    sweetAlert(`Don't forget any field`, false)
}

// Step 2
function income(e) {
    e.preventDefault()
    const { income } = incomeForm
    if (income.value != ''){
        ajaxExpense()
        user.income = parseFloat(income.value.slice(3).replace(/\./g,'').replace(',', '.'))
        return
    }
    sweetAlert(`Don't forget any field`, false)
}

// Step 3
function expense(e) {
    e.preventDefault()
    const { expense } = expenseForm
    if (expense.value != ''){
        ajaxInfo()
        user.expense = parseFloat(expense.value.slice(3).replace(/\./g,'').replace(',', '.'))
        return
    }
    sweetAlert(`Don't forget any field`, false)
}

// Step 4
function info(e) {
    e.preventDefault()
    ajaxRegister()
}

// Ajax

function ajaxStart() {
    $.get('signUp').done(response => {
        $('#helper').html($(response).find('#helper').children())
        $('#formStart').submit(e => start(e))
    })
}

function ajaxIncome() {
    $.get('accountSteps/income').done(response => {
        $('#helper').html(response)
        $('#income-back').click(() => back('start'))
        $('#incomeForm').submit(e => income(e))
        currencyMask($('#inputIncome'))
    })
}

function ajaxExpense() {
    $.get('accountSteps/expense').done(response => {
        $('#helper').html(response)
        $('#expense-back').click(() => back('income'))
        $('#expenseForm').submit(e => expense(e))
        currencyMask($('#inputExpense'))
    })
}

function ajaxInfo() {
    $.get('accountSteps/info').done(response => {
        $('#helper').html(response)
        $('#title-name').append(`Be welcome, ${firstName(user.name)}!`)
        $('#info-back').click(() => back('expense'))
        $('#inputUser').css('display', 'none')
        $('#inputUser').val(JSON.stringify(user))
        $('#infoForm').submit(e => info(e))
    })
}

function ajaxRegister() {
    $.ajax({
        url: 'signUp/newUser',
        type: 'POST',
        data: $('#infoForm').serialize(),
        success: response => {
            console.log(response);
            sweetAlert(`${capitalize(firstName(response.name))}, your registration was successful`, true)
        },
        error: () => sweetAlert('Something was wrong', false)
    })
}

// Functions

function validateEmail() {
    return $.ajax({
        url: 'signUp/validateEmail',
        type: 'POST',
        data: $('#formStart').serialize()
    })
}

function back(step) {
    switch (step) {
        case 'start': ajaxStart(); break;
        case 'income': ajaxIncome(); break;
        case 'expense': ajaxExpense(); break;
    }
}