const absCheckboxes = document.querySelectorAll('input[type="checkbox"]');
absCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', (e) => {
        console.log(e.target.id)
        abs_info = e.target.id
        id_enfant = abs_info.split('_')[1]
        console.log(id_enfant)
        console.log(`inputDesable_${id_enfant}`)
        let inputs = document.querySelectorAll(`#inputDesable_${id_enfant}`);
        console.log(inputs)
        inputs.forEach(input => {
            console.log(e.target.checked)
            if (e.target.checked) {
                input.value = ""
            }
            input.disabled = e.target.checked;
        });
    });
});