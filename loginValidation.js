function loginValidation(event)
{
    if(form_login.email.value == "")
        {
            const email = document.querySelector("#email");
            email.classList.remove('hidden');
            email.classList.add('errore');
            event.preventDefault();
        }

    if(form_login.password.value == "")
        {
            const password = document.querySelector("#password");
            password.classList.remove('hidden');
            password.classList.add('errore');
            event.preventDefault();
        }

}

const form_login = document.querySelector('#form_login');
form_login.addEventListener('submit', loginValidation);
