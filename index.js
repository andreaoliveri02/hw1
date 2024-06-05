//LOGIN
function apriLogin(event)
{
    const boxLogin = document.querySelector("#box_login");
    const boxInfo = document.querySelector('#box_info');
    boxInfo.classList.remove('flex');
    boxInfo.classList.add('hidden');
    boxLogin.classList.remove('hidden');
    boxLogin.classList.add('flex');
    event.currentTarget.removeEventListener('click', apriLogin);
    event.currentTarget.addEventListener('click', chiudiLogin);
}

function chiudiLogin(event)
{
    const boxLogin = document.querySelector("#box_login");
    const boxInfo = document.querySelector('#box_info');
    boxInfo.classList.remove('hidden');
    boxInfo.classList.add('flex');
    boxLogin.classList.remove('flex')
    boxLogin.classList.add('hidden');
    event.currentTarget.removeEventListener('click', chiudiLogin);
    event.currentTarget.addEventListener('click', apriLogin);
}

function apriReg(event)
{
    console.log("Pulsante premuto");
    window.location.href = "Registrazione.php";
}

const pulsanteLogin = document.querySelector("#pulsante_login");
pulsanteLogin.addEventListener('click', apriLogin);

const pulsanteRegistrazione = document.querySelector("#pulsante_registrazione");
pulsanteRegistrazione.addEventListener('click', apriReg);