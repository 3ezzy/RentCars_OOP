const showFormAdd = document.querySelectorAll('.showFormAdd');

const formAdd = document.querySelector('.formAdd');

const closeForm = document.querySelectorAll('#close');

// show form add
showFormAdd.forEach(add => {
    add.addEventListener('click', () => {
        
        formAdd.classList.remove('hidden');
    })
})

// close form
closeForm.forEach(close => {
    close.addEventListener('click', (e) => {
        e.preventDefault();
        formAdd.classList.add('hidden')
        
    })
})

// calculate defference batween two dates
const inputDuree = document.querySelector('.inputDuree');

const dateDebut = document.querySelector('.dateDebut');
const dateFin = document.querySelector('.dateFin');

const duree = document.querySelector('.duree');
    
    function calcDifference() {

        if(dateDebut.value != "" && dateFin.value != "") {
            let date1 = new Date(`${dateDebut.value}`);
            let date2 = new Date(`${dateFin.value}`);
            
            let difference = date2.getTime() - date1.getTime();
            let days = Math.round(difference / (1000 * 3600 * 24));
            
            inputDuree.value = days
            duree.innerText = days;
        }
    }
    
    dateDebut.addEventListener('input', calcDifference)
    dateFin.addEventListener('input', calcDifference)