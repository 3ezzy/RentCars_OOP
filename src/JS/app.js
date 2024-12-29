const showFormAdd = document.querySelectorAll('.showFormAdd');

const formAdd = document.querySelector('.formAdd');


// show form add
showFormAdd.forEach(add => {
    add.addEventListener('click', () => {
        
        formAdd.classList.remove('hidden');
    })
})


// calculate defference batween two dates
const inputDuree = document.querySelectorAll('.inputDuree');

const dateDebut = document.querySelectorAll('.dateDebut');
const dateFin = document.querySelectorAll('.dateFin');

const duree = document.querySelectorAll('.duree');
    
    function calcDifference() {
        dateDebut.forEach((debut, i) => {
            if(debut.value != "" && dateFin[i].value != "") {
                let date1 = new Date(`${debut.value}`);
                let date2 = new Date(`${dateFin[i].value}`);
                
                let difference = date2.getTime() - date1.getTime();
                let days = Math.round(difference / (1000 * 3600 * 24));
                
                inputDuree[i].value = days
                duree[i].innerText = days;
            }
        })
    }
    
    dateDebut.forEach((debut, i) => {
        debut.addEventListener('input', calcDifference)
        dateFin[i].addEventListener('input', calcDifference)
    })