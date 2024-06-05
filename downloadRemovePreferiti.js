function onTextRimuoviPreferito(text)
{
    console.log(text);
    window.location.reload();
}

function responseRimuoviPreferito(response)
{
    console.log('Response rimuovi preferito ricevuta: mando il testo');
    return response.text();
}


function rimuoviDaiPreferiti(event)
{
    event.preventDefault();

    const id_ricetta = event.currentTarget.dataset.value;

    const phpurlRimuoviPreferito = 'rimuoviPreferito.php?q='+ id_ricetta;
    console.log('rimuovo '+id_ricetta);

    fetch(phpurlRimuoviPreferito).then(responseRimuoviPreferito).then(onTextRimuoviPreferito);


}


function onJson(json)
{
    console.log(json);
    const boxPreferiti=document.querySelector('#risultati');
    let i=0;
    for(let elem of json)
    {
        console.log(elem.nomePiatto); 
        const rimuovi = document.createElement('button');
        rimuovi.textContent = 'RIMUOVI DAI PREFERITI';
        rimuovi.classList.add('rimuoviPreferito');
        const preferito = document.createElement('div');
        preferito.classList.add('preferito');
        preferito.textContent='  '+'Preferito '+(i+1)+': '+elem.nomePiatto;
        rimuovi.dataset.value = elem.id_ricetta;
        preferito.appendChild(rimuovi);
        boxPreferiti.appendChild(preferito);
        i++;
    }

    const bottoneRimuoviPreferito = document.querySelectorAll('.rimuoviPreferito');
    for(let elem of bottoneRimuoviPreferito)
        {
            elem.addEventListener('click', rimuoviDaiPreferiti);
        }
}

function onError(error)
{
    console.log('Errore'+error);
}

function onResponse(response)
{
    console.log('dowload preferiti: promise ricevuta, mando json');
    return response.json();
}

function downloadPreferiti(event)
{
    event.preventDefault();
    const phpDownloadPreferiti = 'downloadPreferiti.php';
    fetch(phpDownloadPreferiti).then(onResponse, onError).then(onJson);
}


const button1=document.querySelector('#button1');
button1.addEventListener('click', downloadPreferiti);