
import { sweetAlert } from '../functions/util.js'

const activeNavigation = document.querySelectorAll('.container-navigation')[1]
activeNavigation.classList.add('activeContainer')

var tag = 'Monthly Expense'
var category = 'Expense'

var tagAmount = document.getElementById('tagAmount').innerHTML
var categoryAmount = document.getElementById('categoryAmount').innerHTML

// Chart

var ctx = document.getElementById('myChart').getContext('2d');
ctx.width = 500;
ctx.height = 500;

$('#chartForm').submit(e => {
    e.preventDefault()
    $.ajax({
        url: 'stats/chart',
        type: 'post',
        data: $('#chartForm').serialize(),
        success: response => {
            if (response == 'empty') return sweetAlert(`Select a tag`, false)
            $('.chart-data').html($(response).filter('.chart-data').html())

            tagAmount = $(response).find('#tagAmount').text()
            categoryAmount = $(response).find('#categoryAmount').text()

            tag = $(response).find('#tagAmount').attr('tag')
            category = $(response).find('#categoryAmount').attr('category')

            myChart.destroy();

            data.labels = [tag, category];
            data.datasets = [{
                label: 'points',
                backgroundColor: ['#FCB9B2', '#9F3541'],
                data: [parseInt(tagAmount), (parseInt(categoryAmount) - parseInt(tagAmount))]
            }]

            myChart = new Chart(ctx, {
                type: 'pie',
                options: options,
                data: data 
            })
        }
    })
})

// Drawing

var options = {
    responsive: true,
    maintainAspectRatio: false,
    tooltips: { enabled: false },
    plugins: {
        datalabels: {
            formatter: (value, ctx) => {
                let sum = 0;
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += data;
                });
                let percentage = (value * 100 / sum).toFixed(2)+"%";
                return percentage;
            },
            color: '#fff',
        }
    }
}

var data = [{
    labels: [tag, category],
    data: [parseInt(tagAmount), (parseInt(categoryAmount) - parseInt(tagAmount))],
    backgroundColor: ['#FCB9B2', '#9F3541'],
}]

var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        datasets: data
    },
    options: options,
})