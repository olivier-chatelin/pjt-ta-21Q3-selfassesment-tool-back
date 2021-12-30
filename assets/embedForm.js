const objectiveContainer = document.getElementById('objective-container');
const form = objectiveContainer.dataset.prototype;
const button = document.getElementById('button-objective');
let index = 0;
const regex = /__name__/g
button.addEventListener('click',(e)=>{
    e.preventDefault();
    index ++;
    let li = document.createElement('li');
    let newForm = form.replace(regex, 'objective' + index)
    li.innerHTML=newForm;
    objectiveContainer.appendChild(li);

})