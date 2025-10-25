//Exercici 28
const calc=document.getElementById("calculadora");

function inic() {
    creaInputs();
    calcul();
}

function creaInputs (){
    let divInputPrimer=document.querySelector("#div");
    
    const inputFirst=document.createElement("input");
    inputFirst.type='text';
    inputFirst.className='primerDigit';
    inputFirst.id='primerDigit';

    const selectOperacions=document.createElement("select");
    selectOperacions.name='operacions';
    selectOperacions.id='operacio-select';

    const op =['suma', 'resta', 'multiplica', 'divisio', 'potencia'];
    const op2 =['+', '-', '*', '/', '^'];


    op.forEach((element, index) =>{
        const opcio=document.createElement("option");
        opcio.value=element;
        opcio.textContent=op2[index];
        selectOperacions.appendChild(opcio);
    })

    const inputSecond=document.createElement("input");
    inputSecond.type='text';
    inputSecond.className='segonDigit';
    inputSecond.id='segonDigit';

    const igual=document.createTextNode('=');

    const inputResult=document.createElement("input");
    inputResult.type='text';
    inputResult.className='result';
    inputResult.id='result';

    const botoCalcul= document.createElement("button");
    botoCalcul.type='submit';
    botoCalcul.className='ferCalcul';
    botoCalcul.id='ferCalcul';
    botoCalcul.innerHTML='Calcula';

    const botoReset= document.createElement("button");
    botoReset.type='submit';
    botoReset.className='reset';
    botoReset.id='reset';
    botoReset.innerHTML='Reseteja';

    divInputPrimer.append(inputFirst);
    divInputPrimer.append(selectOperacions);
    divInputPrimer.append(inputSecond);
    divInputPrimer.append(igual);
    divInputPrimer.append(inputResult);
    divInputPrimer.append(botoCalcul);
    divInputPrimer.append(botoReset);
    calc.insertAdjacentElement("afterbegin", divInputPrimer);
}

function calcul(){
    const ferCalculs=document.querySelector("#ferCalcul");

    ferCalculs.addEventListener('click', (e) =>{
        const selectOpera=document.querySelector("#operacio-select");
        const operacioEscollida= selectOpera.value;

        let primerDi= parseFloat(document.querySelector("#primerDigit").value.replace(',', '.'));
        let segonDi=parseFloat(document.querySelector("#segonDigit").value.replace(',', '.'));

        const inputResultat=document.querySelector('#result');
        
        let resultat;

        //Per resetejar el color
        inputResultat.style.color='';
        switch (operacioEscollida){
            case 'suma':
                resultat=primerDi+segonDi;
                break;
            case 'resta':
                resultat=primerDi-segonDi;
                break;
            case 'multiplica':
                resultat=primerDi*segonDi;
                break;
            case 'divisio':
                resultat=primerDi/segonDi;
                break;
            case 'potencia':
                segonDi=Math.trunc(segonDi);
                document.querySelector("#segonDigit").value=segonDi;
                resultat=primerDi ** segonDi;
                break;
        }

        if (!isFinite(resultat)){
            inputResultat.style.color='red';
        }

        inputResultat.value=resultat.toFixed(2);
    })
}

//Exercici 29

//Exercici 30
//hem de fer servir el setInterval() i em de fer servir una funció i cada quant volem que s'executi
//El mètode/funció que al fer doble click canvii d'un format a l'altre és
