
import { sweetAlert } from '../functions/util.js'

const activeNavigation = document.querySelectorAll('.container-navigation')[1]
activeNavigation.classList.add('activeContainer')

// First render

var tag = 'Monthly Expense'

var tagAmount = parseFloat(document.getElementById('tagAmount').innerHTML)
var categoryAmount = parseFloat(document.getElementById('categoryAmount').innerHTML)

var other = document.getElementById('other')
var otherAmount = document.createTextNode((categoryAmount - tagAmount))
other.appendChild(otherAmount)

setFormat(categoryAmount, tagAmount)

// Drawing

var ctx = document.getElementById('myChart').getContext('2d');

var options = {
    plugins: {
        legend: {
            position: 'bottom',
            labels: { padding: 30 }
        },
    },
}

var data = {
    labels: [tag, 'Other'],
    datasets: [{
        data: [tagAmount, categoryAmount - tagAmount],
        backgroundColor: ['#FCB9B2', '#9F3541'],
    }]
}

var myChart = new Chart(ctx, {
    type: 'pie',
    data: data,
    options: options,
})

// Rendering a new chart

$('#chartForm').submit(e => {
    e.preventDefault()
    $.ajax({
        url: 'stats/chart',
        type: 'post',
        data: $('#chartForm').serialize(),
        success: response => {
            if (response == 'empty') return sweetAlert(`Select a tag`, false)
            $('.chart-data').html($(response).filter('.chart-data').html())

            initializeChart(response)

            myChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
            })
        }
    })
})

// Functions

function formatCurrency(value, n, x, s, c) {
    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
        num = value.toFixed(Math.max(0, ~~n));
    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
}

function setFormat(categoryAmount, tagAmount) {
    $('#other').text('R$ ' + formatCurrency(categoryAmount - tagAmount, 2, 3, '.', ','))
    $('#tagAmount').text('R$ ' + formatCurrency(parseFloat(tagAmount), 2, 3, '.', ','))
    $('#categoryAmount').text('R$ ' + formatCurrency(parseFloat(categoryAmount), 2, 3, '.', ','))
}

function initializeChart(response) {
    tagAmount = $(response).find('#tagAmount').text()
    categoryAmount = $(response).find('#categoryAmount').text()
    tag = $(response).find('#tagAmount').attr('tag')

    myChart.destroy();

    data.labels = [tag, 'Other'];
    data.datasets = [{
        backgroundColor: ['#FCB9B2', '#9F3541'],
        data: [tagAmount, (categoryAmount - tagAmount)]
    }]

    setFormat(categoryAmount, tagAmount)
}