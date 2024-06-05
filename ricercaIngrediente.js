function onJson(json)
{
    console.log('Stampo il json');
    console.log(json);

    const risultati = json.hits;
    const ricette = document.querySelector('#ricette');
    ricette.innerHTML='';

    for(let i = 0; i<10; i++)
    {
        const descPiatto = document.createElement('div');
        descPiatto.classList.add('piatto');
        const risultato = risultati[i];

        const calorie = risultato.recipe.calories;
        const nomePiatto = risultato.recipe.label;
        const tipoPiatto = risultato.recipe.dishType[0];

        const checkBox = document.createElement('input');
        checkBox.type= 'checkbox';
        checkBox.textContent= 'Aggiungi ai preferiti';
        checkBox.classList.add('preferito');
        checkBox.dataset.value=nomePiatto;

        
        const options = document.createElement('span');
        options.textContent = 'Aggiungi ai preferiti';
        options.classList.add('preferito');
        
        
        const kcal = document.createElement('div');
        kcal.classList.add('calorie');
        kcal.textContent='Calorie:  '+ calorie+' kcal';

        const dishName = document.createElement('div');
        dishName.classList.add('nomePiatto');
        dishName.textContent='Nome piatto:  '+nomePiatto;

        const typeDish = document.createElement('div');
        typeDish.classList.add('tipoPiatto');
        typeDish.textContent='Tipologia piatto:  '+tipoPiatto;

        descPiatto.appendChild(dishName);
        descPiatto.appendChild(typeDish);
        descPiatto.appendChild(kcal);
        
        for(let j=0; j<5; j++)
            {
                const ingrediente = risultato.recipe.ingredientLines[j]; 
                const ingr = document.createElement('div');
                ingr.classList.add('ingrediente');
                ingr.textContent= 'Ingrediente '+(j+1)+': '+ingrediente;
                descPiatto.appendChild(ingr);
            }
        
        descPiatto.appendChild(options);
        descPiatto.appendChild(checkBox);
        ricette.appendChild(descPiatto);
    }
    const piattoPreferito = document.querySelectorAll('.preferito');
    for(let elem of piattoPreferito)
        {
            elem.addEventListener('click', addPiattoPreferito);
        }
    
}

function onResponse(response)
{
    console.log('Promise ricevuta, restituisco json');
    return response.json();
}
function onError(error)
{
    console.log('Errore'+error);
}

// 1) CERCA PER INGREDIENTE E ED ESEGUE OnResponse/onError E INFINE onJson
function searchForIngredientes(event)
{
    event.preventDefault();
    const inputData=document.querySelector('#ingrediente');
    const inputValue=encodeURIComponent(inputData.value);

    phpUrl = 'ricercaIngrediente.php?q='+inputValue;
    fetch(phpUrl).then(onResponse, onError).then(onJson);
}



// 2) DOPO AVER CARICATO LA LISTA DEI PIATTI, SE VOGLIO POSSO AGGIUNGERE AI PREFERITI
function onText(text)
{
    console.log(text);
}

function responseAggiungiPreferiti(response)
{
    console.log('promise ricevuta, restituisco Testo');
    return response.text();
}
function addPiattoPreferito(event)
{
    event.preventDefault();
    const preferito = event.currentTarget.dataset.value;
    console.log(preferito);
    fetch('aggiungiPreferiti.php?q='+preferito).then(responseAggiungiPreferiti).then(onText);
}


