function registrazioneValidation(event)
{

    if(form_registrazione.nome.value == "")
    {
        const nome = document.querySelector("#nome");
        nome.classList.remove('hidden');
        nome.classList.add('errore');
        event.preventDefault();
    }
    if(form_registrazione.cognome.value == "")
    {
        const cognome = document.querySelector("#cognome");
        cognome.classList.remove('hidden');
        cognome.classList.add('errore');
        event.preventDefault();
    } 

    if(form_registrazione.username.value == "")
        {
            const username = document.querySelector("#username");
            username.classList.remove('hidden');
            username.classList.add('errore');
            event.preventDefault();
        } 

    if(form_registrazione.email.value == "")
    {
        const email = document.querySelector("#email");
        email.classList.remove('hidden');
        email.classList.add('errore');
        event.preventDefault();
    }
    //AGGIUNGERE LA VALIDAZIONE DELL'EMAIL
    if(form_registrazione.password.value < 8)
    {
        const password = document.querySelector("#password");
        password.classList.remove('hidden');
        password.classList.add('errore');
        event.preventDefault();
    }

}

const form_registrazione = document.querySelector("#form_registrazione");
form_registrazione.addEventListener('submit', registrazioneValidation);