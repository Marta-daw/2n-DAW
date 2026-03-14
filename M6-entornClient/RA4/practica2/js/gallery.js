import { CompoundElement } from './domElements.js';

//Reutilitzem la clau del localstorage que ja em definit a createCharacter.js
const STORAGE_KEY = 'God of War';

function obtenerStorage() {
    const datos = localStorage.getItem(STORAGE_KEY);
    if (!datos) return {};

    return JSON.parse(datos);
}

//Recuperem botons i contenidor del DOM de la galeria
const carregaBtn = document.getElementById('btnCarregarCarta');
const eliminaBtn = document.getElementById('btnEliminaCartes');

carregaBtn.addEventListener('click', () => {
    //Netejem el contenidor abans de crear la galeria
    //contenidorGaleriaElem.innerHTML = '';

    const personatges = obtenerStorage();

    //Contenidor per la card
    const contenidorCarta = new CompoundElement('div', { id: 'contenidorCarta' });

    //Recorrem els personatges i creem les cartes - recoperem codi del fitxer createCharacter.js
    Object.values(personatges).forEach(data => {
       const carta = new CompoundElement('div', { class: 'cartaPers' }).createElement();

        /* const cartaDiv = document.createElement('div');
        cartaDiv.className = 'cartaPers'; */

        const imgCarta = document.createElement('img');
        imgCarta.className = 'imgCarta';
        imgCarta.src = data.imatge;
        imgCarta.alt = data.nom;

        const titulo = document.createElement('h2');
        titulo.className = 'tituloCarta';
        titulo.textContent = data.nom;

        const descrip = document.createElement('p');
        descrip.className ='descripCarta';
        descrip.textContent = data.descripcio;

        const tabla = document.createElement('table');
        tabla.className = 'tablaCarta';
        tabla.innerHTML =
        `<tr>
        <th> Personatge </th> <th> ${data.nom}</th>
        </tr>
        <tr>
        <th> Origen </th> <th> ${data.origien}</th>
        </tr>
        <tr>
        <th> Tipus </th> <th> ${data.tipus}</th>
        </tr>
        <tr>
        <th> Casa </th> <th> ${data.casa}</th>
        </tr>
        <tr>
        <th> Estat </th> <th> ${data.estat}</th>
        </tr>
        `;

        carta.element.appendChild(imgCarta);
        carta.element.appendChild(titulo);
        carta.element.appendChild(descrip);
        carta.element.appendChild(tabla);
        
        contenidorCarta.addChildren([carta]).createElement();
        
    });
    
    contenidorCarta.printElement({ position: 'beforeend', parentId: 'appGaleria' }); 

});

eliminaBtn.addEventListener('click', () => {
    //Eliminem el tenim al localStorage i netegem la galeria
    localStorage.removeItem(STORAGE_KEY);
    document.getElementById('contenidorCarta').innerHTML = '';
})