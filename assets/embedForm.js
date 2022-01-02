// Didn't find other way to erase objective legend
const legendToHide = document.getElementsByTagName('legend');
for (let legend of legendToHide) {
    legend.classList.add('d-none');
}
const objectiveContainer = document.getElementById('objective-container');
const form = objectiveContainer.dataset.prototype;
const button = document.getElementById('button-objective');
let index = 0;
const regex = /__name__/g
button.addEventListener('click',(e)=>{
    e.preventDefault();
    index ++;
    let shows = document.getElementsByClassName('show');
    for (let show of shows) {
        show.classList.remove('show');
    }
    let buttonCollapse = document.getElementsByClassName('accordion-button');
    for (let button of buttonCollapse) {
        button.classList.add('collapsed');
    }
    let li = document.createElement('li');
    li.classList.add('accordion-item')
    let accordionTitle = document.createElement('h4');
    accordionTitle.classList.add('accordion-header');
    accordionTitle.id=`heading${index}`;
    let buttonAccordion = document.createElement('button');
    buttonAccordion.classList.add('accordion-button');
    buttonAccordion.type='button';
    buttonAccordion.dataset.bsToggle='collapse';
    buttonAccordion.dataset.bsTarget=`#collapse${index}`;
    buttonAccordion.innerHTML = `Objective n°${index}`;
    accordionTitle.appendChild(buttonAccordion);
    li.appendChild(accordionTitle);
    let newForm = form.replace(regex, 'objective' + index);
    let accordionCollapse = document.createElement('div');
    accordionCollapse.id = `collapse${index}`;
    accordionCollapse.classList.add('accordion-collapse','collapse','show', 'm-3');
    accordionCollapse.innerHTML = newForm;
    accordionCollapse.dataset.bsParent='#objective-container'
    li.appendChild(accordionCollapse);
    objectiveContainer.appendChild(li);
    let hiddenInput = document.getElementById(`checkpoint_objectives_objective${index}_number`);
    hiddenInput.value=index;
    let skillDiv = document.getElementById(`checkpoint_objectives_objective${index}_skills`);
    skillDiv.classList.add('d-flex', 'flex-wrap')
    for (let skill of skillDiv.children) {
        skill.classList.add('col-6')
    }

})