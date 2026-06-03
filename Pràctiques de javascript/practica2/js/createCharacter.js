import {
    DomElement,
    OnlyTagElement,
    ElementWithText,
    SelectElement,
    CompoundElement
} from './domElements.js';

function crearFormulario() {
    // Agafar la id del contenidor on afegirem el formulari
    const app = document.getElementById('app');

    //Creació dels camps individualment
    const imgLable = new ElementWithText('label', { for: 'imatge' }, 'Imatge: ').createElement();
    const imgInput = new OnlyTagElement('input', { type: 'file', id: 'imatge', accept: 'image/*' }).createElement();

    const nameLabel = new ElementWithText('label', { for: 'nom' }, 'Nom: ').createElement();
    const nameInput = new OnlyTagElement('input', { type: 'text', id: 'nom', placeholder: 'Introdueix el nom del personatge' }).createElement();

    const descLabel = new ElementWithText('label', { for: 'descripcio' }, 'Descripció: ').createElement();
    const descInput = new OnlyTagElement('textarea', { id: 'descripcio', placeholder: 'Introdueix la descripció del personatge' }).createElement();

    const originLabel = new ElementWithText('label', { for: 'origen' }, 'Origen: ').createElement();
    const originInput = new OnlyTagElement('input', { type: 'text', id: 'origen', placeholder: 'Introdueix l\'origen del personatge' }).createElement();

    const typeLabel = new ElementWithText('label', { for: 'tipus' }, 'Tipus: ').createElement();
    const typeSelect = new SelectElement(
        { id: 'tipus' },
        [
            { value: '', text: '-Selecciona tipus-' },
            { value: 'Déu', text: 'Déu' },
            { value: 'Semidéu', text: 'Semidéu' },
            { value: 'Humà', text: 'Humà' }
        ]
    ).createElement();

    const homeLabel = new ElementWithText('label', { for: 'casa' }, 'Casa: ').createElement();
    const homeInput = new OnlyTagElement('input', { type: 'text', id: 'casa', placeholder: 'Introdueix la casa del personatge' }).createElement();

    const stateLabel = new ElementWithText('label', { for: 'estat' }, 'Estat: ').createElement();
    const stateSelect = new SelectElement(
        { id: 'estat' },
        [
            { value: '', text: '-Selecciona tipus-' },
            { value: 'Viu', text: 'Viu' },
            { value: 'Mort', text: 'Mort' },
            { value: 'Desconegut', text: 'Desconegut' }
        ]
    ).createElement();

    const saveButton = new ElementWithText('button', { type: 'button', id: 'saveButton' }, 'Save').createElement();
    const resetButton = new ElementWithText('button', { type: 'button', id: 'resetButton' }, 'Reset').createElement();

    const buttonContainer = new CompoundElement('div', { class: 'buttonContainer' }).addChildren([saveButton, resetButton]).createElement();
    //Creació del formulari com a CompoundElement
    const form = new CompoundElement('form', { id: 'personatgeForm' }).addChildren([
        imgLable, imgInput,
        nameLabel, nameInput,
        descLabel, descInput,
        originLabel, originInput,
        typeLabel, typeSelect,
        homeLabel, homeInput,
        stateLabel, stateSelect,
        buttonContainer
    ]).createElement();

    //Afegir el formulari al DOM
    form.printElement({ position: 'beforeend', parentId: app.id });

//-------------------------CREACIÓ--DE--LES--CARDS---------------------------------------------------------------------------------------------------------------
    //Contenidor per la card
    const contenidorCarta = new CompoundElement('div', { id: 'contenidorCarta' });

    //Llegim les dades rebudes del formulari
    const imgInputElem = imgInput.element;
    const nameInputElem = nameInput.element;
    const descInputElem = descInput.element;
    const originInputElem = originInput.element;
    const typeSelectElem = typeSelect.element;
    const homeInputElem = homeInput.element;
    const stateSelectElem = stateSelect.element;
    
    //Convertim la imatge a BASE64 
    function imageToBase64(img) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
            reader.readAsDataURL(img);
        });
    }

    //Creem la card amb les dades rebudes i amb les classes
    saveButton.addListener(async () => {
        contenidorCarta.children=[];
        const imgFile = imgInputElem.files[0];

        if (!imgFile) {
            alert('Select an image');
            return;
        }

        const imgBase64 = await imageToBase64(imgFile);
        
        const data = {
            nom: nameInputElem.value,
            descripcio: descInputElem.value,
            origien: originInputElem.value,
            tipus: typeSelectElem.value,
            casa: homeInputElem.value,
            estat: stateSelectElem.value,
            imatge: imgBase64
        }

        //Creem la carta visual crearCartaPersonatge(personatgeData);
        console.log('carta creada ', document.getElementById('contenidorCartaCreada'));
        
        
        document.getElementById('contenidorCartaCreada').replaceChildren();


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
        <th> Personatge </th> <td> ${data.nom}</td>
        </tr>
        <tr>
        <th> Origen </th> <td> ${data.origien}</td>
        </tr>
        <tr>
        <th> Tipus </th> <td> ${data.tipus}</td>
        </tr>
        <tr>
        <th> Casa </th> <td> ${data.casa}</td>
        </tr>
        <tr>
        <th> Estat </th> <td> ${data.estat}</td>
        </tr>
        `;

        carta.element.appendChild(imgCarta);
        carta.element.appendChild(titulo);
        carta.element.appendChild(descrip);
        carta.element.appendChild(tabla);
        
        contenidorCarta.addChildren([carta]).createElement();

        contenidorCarta.printElement({ position: 'beforeend', parentId: 'contenidorCartaCreada' }); 
        
        //Guardem al localStorage
        guardarPersonatgeLocalStorage(data);

    }, 'click');

    resetButton.addListener(() => {
        document.getElementById('personatgeForm').reset();
        contenidorCarta.element.innerHTML = '';
    }, 'click');
}

//Quan cliquem el botó save afegim la carta a un objecte al localStorage
const STORAGE_KEY = 'God of War';

function obtenerStorage() {
    const datos = localStorage.getItem(STORAGE_KEY);
    if (!datos) return {};

    return JSON.parse(datos);
}

function guardarPersonatgeLocalStorage(personatge) {
    const personatges = obtenerStorage();
    personatges[personatge.nom] = personatge;
    localStorage.setItem(STORAGE_KEY, JSON.stringify(personatges));
}

export { crearFormulario };