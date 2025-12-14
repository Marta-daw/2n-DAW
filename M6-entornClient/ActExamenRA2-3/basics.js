/* 1. Validació de contrasenya: Crea una funció que validi si una contrasenya compleix els següents requisits:
    • Mínim 8 caràcters 
    • Almenys una lletra majúscula 
    • Almenys un número 
    • Almenys un caràcter especial (@, #, $, %, &) */
function validarContrasenya(contrasenya){
    const largoContra=contrasenya.length;
    const simbol=/[@, #, $, %, &]/g; //expressió regular per buscar símbols on la g 
    
    let tieneMayuscula=false;
    let tieneNumero=false;
    for (let i=0; i<contrasenya.length; i++){
        const char=contrasenya.charAt(i);
        if (char >= 'A' && char <= 'Z'){
            tieneMayuscula=true;
        } else if (char >= '0' && char <= '9'){
            tieneNumero=true;
        }
    }

    let resposta;

    if (largoContra>= 8 && contrasenya.match(simbol) && tieneMayuscula && tieneNumero){
        resposta = "Contrasenya CORRECTE";
    } else {
        resposta="Contrasenya INCORRECTE";
    }

    return resposta;
}

const contrasenya = "Marta$25";
const valid = validarContrasenya(contrasenya);
console.log(valid);
console.log("-----------------------------------------------")

/* 2. Calculadora d'edat: Crea un script que, donada una data de naixement, calculi:
    • L'edat exacta en anys 
    • Els dies que falten pel proper aniversari 
    • El dia de la setmana en què vas néixer  */

    function calculadoraEdat(dataNaixement){
        const arrayFecha = dataNaixement.split("/");

        const dayActual = new Date;

        const diaActual = dayActual.getDate();
        const mesActual = dayActual.getMonth()+1;
        const anoActual = dayActual.getFullYear();

        let missatgeA="";

        // Per saber l'edat actual de la persona
        if (mesActual < arrayFecha[1] || (mesActual == arrayFecha[1] && diaActual < arrayFecha[0])){
            const edat = anoActual - arrayFecha[2] - 1;
            missatgeA = "Tens "+edat+" anys.";
        } else {
            const edat = anoActual - arrayFecha[2];
            missatgeA = "Tens "+edat+" anys.";
        }

        // Per saber els dies que falten pel proper aniversari
        const properAniversari = new Date(anoActual, arrayFecha[1]-1, arrayFecha[0]);

        if (mesActual > arrayFecha[1] || (mesActual == arrayFecha[1] && diaActual > arrayFecha[0])){
            properAniversari.setFullYear(anoActual + 1);
        }
        const tempsRestant = properAniversari - dayActual;
        const diesRestants = Math.ceil(tempsRestant / (1000 * 60 * 60 * 24));
        missatgeA += " Falten "+diesRestants+" dies pel teu proper aniversari.";

        // Per saber el dia de la setmana en què vas néixer
        const diaSetmana = new Date(arrayFecha[2], arrayFecha[1]-1, arrayFecha[0]);
        const diesSetmana = ["Diumenge", "Dilluns", "Dimarts", "Dimecres", "Dijous", "Divendres", "Dissabte"];
        const diaNaixement = diesSetmana[diaSetmana.getDay()];
        missatgeA += " Vas néixer un "+diaNaixement+".";

        return missatgeA;
    }

const dataNaixement = "10/06/1995";
const calcularEdat = calculadoraEdat(dataNaixement);
console.log(calcularEdat);
console.log("-----------------------------------------------")

/* 3. Manipulació de text: Donada una frase:
    • Compta quantes vocals té 
    • Substitueix totes les vocals per "*" 
    • Inverteix l'ordre de les paraules 
    • Crea un acrònim amb les primeres lletres de cada paraula  */

    function manipulacioText (frase){
        const fraseMin = frase.toLowerCase();
        const letrasFrase= fraseMin.split("");

        let count=0;

        //Per contar les vocals
        message="";
        for (let i=0; i<letrasFrase.length; i++){
            if (letrasFrase[i] == "a" || letrasFrase[i] == "e" || letrasFrase[i] == "i" || letrasFrase[i] == "o" || letrasFrase[i] == "u"){
                count++;
            }
        }
        message = "La frase té "+count+" vocals.\n";

        //Per substituir les vocals per l'asterisc
        const subsFrase= fraseMin.replace(/[aeiou]/g, "*");

        message += "Substituim les vocals per '*': "+subsFrase;

        // invertir l'ordre
        const paraulesFrase = frase.split(" ");

        let fraseInvers= [];

        for (let i=1; i<= paraulesFrase.length; i++){
            fraseInvers.push(paraulesFrase.slice(-i)[0]);
        }

        fraseInvers = fraseInvers.join(" "); //Passar l'array a un string
        message += "\nFrase invertida: "+fraseInvers;
        
        //Crear acrònim
        let acronim="";

        for (let i=0; i<paraulesFrase.length; i++){
            acronim += paraulesFrase[i].charAt(0).toUpperCase(); //.charAt(0) per agafar la primera lletra de cada paraula
        }

        message += "\nL'acrònim és: "+acronim;

        return message;
    }

    const frase = "Benvinguts a la vila del pingui";
    const text = manipulacioText (frase);
    console.log(text);
    console.log("-----------------------------------------------")

/* 4. Estadístiques d'un array: Crea una funció que rebi un array de números i retorni un objecte amb:
    • La mitjana 
    • La mediana 
    • El valor més freqüent (moda) */

const arrayNums = [1, 3, 10, 18, 2, 7, 22, 5, 2, 4, 27, 6];

let num = 0;
let mitjana = 0;
let mediana = 0;
let moda = 0;

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

    const listaCount={};

    arrayOrdenat.map(function(elemento){
        if (listaCount[elemento]){
            listaCount[elemento]+=1;
        } else{
            listaCount[elemento]=1;
        }
    }
    );

    const convertirArray = Object.entries(listaCount).sort(
        function (elementA, elementB){
            return elementA[1] - elementB[1];
        }
    );

    const moda= convertirArray[convertirArray.length - 1];

    return "La mitjana és "+mitjana+", La mediana és "+mediana+" i la moda és "+moda;
}

const solucio = calculsNums(arrayNums);
console.log(solucio);
console.log("-----------------------------------------------")

/* 5. Generador de contrasenyes: Crea una funció que generi contrasenyes aleatòries amb:
    • Longitud personalitzable 
    • Opció d'incloure majúscules, minúscules, números i símbols 
    • Garanteix que compleix els requisits seleccionats  */

    function generadorContrasenya (longitud, majuscula, minuscula, numeros, simbol){
        let contrasenya = "";
        const majuscules = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const minuscules = "abcdefghijklmnopqrstuvwxyz";
        const nums = "0123456789";
        const simbols = "@#$%&";

        let contrasenyaArray = [];
        if (majuscula) contrasenyaArray.push(majuscules);
        if (minuscula) contrasenyaArray.push(minuscules);
        if (numeros) contrasenyaArray.push(nums);
        if (simbol) contrasenyaArray.push(simbols);

        contrasenyaArray = contrasenyaArray.join("");

        for (let i=0; i<longitud; i++){
            const aleatori = contrasenyaArray[Math.floor(Math.random() * contrasenyaArray.length)];
            contrasenya += aleatori;
        }

        return contrasenya;
    }

const longitud = 10;
const majuscula= true;
const minuscula= true;
const numeros = false;
const simbol = true;

const ferContrasenya = generadorContrasenya (longitud, majuscula, minuscula, numeros, simbol);

console.log (ferContrasenya);