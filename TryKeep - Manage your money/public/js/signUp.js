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
        $('#formIncome').submit(e => income(e))
    })
}

function ajaxExpense() {
    $.get('accountSteps/expense').done(response => {
        $('#helper').html(response)
        $('#expense-back').click(() => back('income'))
        $('#formExpense').submit(e => expense(e))
    })
}

function ajaxInfo() {
    $.get('accountSteps/info').done(response => {
        $('#helper').html(response)
        $('#title-name').append(`Be welcome, ${capitalize(user.name.split(' ')[0])}!`)
        $('#info-back').click(() => back('expense'))
        $('#inputUser').css('display', 'none')
        $('#inputUser').val(JSON.stringify(user))
        $('#formInfo').submit(e => info(e))
    })
}

function ajaxRegister() {
    $.ajax({
        url: 'signUp/newUser',
        type: 'POST',
        data: $('#formInfo').serialize(),
        success: response => {
            console.log(response);
            //registerAlert(response.name, true)
        },
        error: () => registerAlert(null, false)
    })
}

// Step 1

$('#formStart').submit(e => start(e))

function start(e) {
    e.preventDefault()
    const { name, email, password } = formStart
    //if([name, email, password].every(input => input.value != '')){
        ajaxIncome()
        user.name = name.value
        user.email = email.value
        user.password = password.value
        return
    //}
    //fieldEmptyAlert()
}

// Step 2

function income(e) {
    e.preventDefault()
    const { income } = formIncome
    //if(income.value != ''){
        ajaxExpense()
        user.income = income.value
        return
    //}
    //fieldEmptyAlert()
}

// Step 3

function expense(e) {
    e.preventDefault()
    const { expense } = formExpense
    //if(expense.value != ''){
        ajaxInfo()
        user.expense = expense.value
        return
    //}
    //fieldEmptyAlert()
}

// Step 4

function info(e) {
    e.preventDefault()
    ajaxRegister()
}

// Alert

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

// Functions

function capitalize(string) {
    return string.charAt(0).toUpperCase() + string.slice(1)
}

function fieldEmptyAlert() {
    Toast.fire({icon: 'error', title: `Don't forget any field`})
}

function registerAlert(name, status) {
    Toast.fire({icon: status ? 'success' : 'error', title: status ? `${name} your registration was successful` : `I'm sorry, Something was wrong`})
}

function back(step) {
    switch(step) {
        case 'start': ajaxStart(); break;
        case 'income': ajaxIncome(); break;
        case 'expense': ajaxExpense(); break;
    }
}
