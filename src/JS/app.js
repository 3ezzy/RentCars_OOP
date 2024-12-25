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