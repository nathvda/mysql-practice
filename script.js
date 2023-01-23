let inputs = document.querySelectorAll(".deletion");

for (let input of inputs){

    input.addEventListener('click', (e) =>{
    let form = document.getElementById('idk');
    form.submit();
    input.preventDefault();
    }
    
    )

}