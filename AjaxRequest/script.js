var ajax = new XMLHttpRequest();
const d = document;
const container = d.querySelector('.container-list');

document.addEventListener("DOMContentLoaded", event => {
    ajax.onreadystatechange = () => {
        if(ajax.readyState == 4 && ajax.status == 200){
            JSON.parse(ajax.response).data.forEach(data => {
                var row = d.createElement('div');
                row.classList.add('row');

                var img = d.createElement('img');
                img.src = data.avatar;

                var h3 = d.createElement('h3');
                h3.appendChild(d.createTextNode('ID '))

                var spanH3 = d.createElement('span');
                spanH3.appendChild(d.createTextNode(`(#${data.id})`))
                h3.appendChild(spanH3)

                row.appendChild(img)
                row.appendChild(h3)

                for(let i = 0; i < Object.keys(data).length; i++){
                    let p = d.createElement('p')
                    let span = d.createElement('span')
                    
                    if(i > 0 && i < 4){
                        let legend = new String(`${Object.keys(data)[i]}:`).replace('_', ' ')
                        p.appendChild(d.createTextNode(legend[0].toUpperCase() + legend.slice(1)))
                        span.appendChild(d.createTextNode(data[Object.keys(data)[i]]))
                        p.appendChild(span)
                        row.appendChild(p)
                    }
                }
                container.appendChild(row)
            })
        }
    }
    ajax.open('GET', 'https://reqres.in/api/users');
    ajax.send();
});