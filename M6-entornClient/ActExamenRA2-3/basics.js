/* 1. Validació de contrasenya: Crea una funció que validi si una contrasenya compleix els següents requisits:
    • Mínim 8 caràcters 
    • Almenys una lletra majúscula 
    • Almenys un número 
    • Almenys un caràcter especial (@, #, $, %, &) */

/* 2. Calculadora d'edat: Crea un script que, donada una data de naixement, calculi:
    • L'edat exacta en anys 
    • Els dies que falten pel proper aniversari 
    • El dia de la setmana en què vas néixer  */

/* 3. Manipulació de text: Donada una frase:
    • Compta quantes vocals té 
    • Substitueix totes les vocals per "*" 
    • Inverteix l'ordre de les paraules 
    • Crea un acrònim amb les primeres lletres de cada paraula  */

/* 4. Estadístiques d'un array: Crea una funció que rebi un array de números i retorni un objecte amb:
    • La mitjana 
    • La mediana 
    • El valor més freqüent (moda) 
    • La desviació estàndard  */

const arrayNums = [1, 3, 10, 18, 2, 7, 22, 5, 2, 4, 27, 6];

let num = 0;
let mitjana = 0;
let mediana = 0;
let moda = 0;
let desviacioEst = 0;

let posicioMig = 0;

function calculsNums(arrayNums) {
    for (const i in arrayNums) {
        num += arrayNums[i];
    }

    mitjana = Math.round(num / arrayNums.length);
    //---------------------------------------------------

    const arrayOrdenat = arrayNums.sort((a, b) => a - b);

    const largo = arrayOrdenat.length;

    if (largo % 2 == 0) {
        posicioMig = arrayOrdenat.length / 2;

        const num1 = arrayOrdenat[posicioMig - 1];
        const num2 = arrayOrdenat[posicioMig];

        mediana = (num1 + num2) / 2;
    } else {
        posicioMig = arrayOrdenat.length / 2;

        mediana = arrayOrdenat[Math.floor(posicioMig)];
    }

    //---------------------------------------------------

    return arrayOrdenat + " / " + largo + " / " + posicioMig + " / " + mediana;
}

const solucio = calculsNums(arrayNums);
console.log(solucio);
/* 5. Generador de contrasenyes: Crea una funció que generi contrasenyes aleatòries amb:
    • Longitud personalitzable 
    • Opció d'incloure majúscules, minúscules, números i símbols 
    • Garanteix que compleix els requisits seleccionats  */