const inputDesable = document.querySelectorAll('#inputDesable')
const abs = document.getElementById('abs')
const dateInputs = document.querySelectorAll('input[type="date"]');


abs.addEventListener('change', () => {
    inputDesable.forEach(input => {
        input.disabled = abs.checked
    })
})


const today = new Date();
const yyyy = today.getFullYear();
const mm = String(today.getMonth() + 1).padStart(2, '0'); // Les mois commencent à 0
const dd = String(today.getDate()).padStart(2, '0');

const formattedDate = `${yyyy}-${mm}-${dd}`;

dateInputs.forEach(input => {
    input.value = formattedDate
})
