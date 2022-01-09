import Chart from 'chart.js/auto';
const mainContainer = document.getElementById('radar-container');
let progressData = JSON.parse(mainContainer.dataset.radarData);
console.log(progressData);
for(let i = 0; i < progressData.length; i++) {

    let radarContainer = document.createElement('div');
    radarContainer.classList.add('d-flex','flex-column','w-50','justify-content-between');
    let title = document.createElement('h3');
    title.classList.add('text-center')
    title.innerHTML = 'Résultats de ' + progressData[i].student;
    let canvas = document.createElement('canvas');
    canvas.id = 'radar' + i;
    canvas.classList.add('radarChart');
    radarContainer.appendChild(title);
    radarContainer.appendChild(canvas);
    mainContainer.appendChild(radarContainer);
}

const radars = document.getElementsByClassName('radarChart');
for(let i = 0; i < progressData.length; i++) {
    let labels =[];
    let data = [];
    let hundred = [];
    for (let skill in progressData[i].skillNames) {
        labels.push(progressData[i].skillNames[skill]);
    }
    for (let skill in progressData[i].skillRatios) {
        data.push(progressData[i].skillRatios[skill]);
        hundred.push(100);
    }
    console.log(data);
    let myChart = new Chart(radars[i], {
        type:'radar',
        data:{
            labels:labels,
            datasets:[{
                label: 'skills',
                data: data,
                fill: true,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'

            },
            {
                label: 'objective 100%',
                data: hundred,
                fill: false,
                backgroundColor: 'rgba(62,152,199,0.0)',
                borderColor: '#26A69A',
                borderWidth: 3,
            }]

        },
        options: {
            elements: {
                line: {
                    borderWidth: 3
                }
            },
            scale: {
                r:{
                    suggestedMin: 0,
                    suggestedMax: 100
                },
                ticks: { beginAtZero: true },
            },
        },
    })
}



