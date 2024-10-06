const inputDesable = document.querySelectorAll('#inputDesable')
const abs = document.getElementById('abs')

abs.addEventListener('change', () => {
    inputDesable.forEach(input => {
        input.disabled = abs.checked
    })
})