let form = document.querySelectorAll('.formPersoActions');

for (let formI = 0; formI < form.length; formI++){
    let hiddenInput = form[formI].querySelector('.hidden-input');
    let inputs = form[formI].querySelectorAll('.input');

    for (let inputI = 0; inputI < inputs.length ; inputI++) {
        console.log(inputs[inputI]);
        inputs[inputI].addEventListener('click', function (){
            hiddenInput.value = this.name;
        });
    }
}
