const usuaris = [
    {
        nom: "Joan", edat: 45, professio: "mecànic", sou: 1750, idioma: ["espanyol"]
    },
    {
        nom: "Pere", edat: 57, professio: "administratiu", sou: 1860, idioma: ["espanyol", "catala", "francès"]
    },
    {
        nom: "Laia", edat: 24, professio: "imformatica", sou: 1500, idioma: ["espanyol", "catala", "anglès", "francès"]
    },
    {
        nom: "Joana", edat: 88, professio: "jubilada", sou: 480, idioma: ["catala"]
    },
    {
        nom: "Mark", edat: 71, professio: "jubilat", sou: 650, idioma: ["anglès"]
    },
    {
        nom: "Josep", edat: 21, professio: "estudiant", sou: 0, idioma: ["espanyol", "catala", "anglès"]
    },
    {
        nom: "Maria", edat: 19, professio: "estudiant", sou: 0, idioma: ["espanyol", "catala", "anglès", "francès"]
    },
    {
        nom: "Eva", edat: 24, professio: "periodista", sou: 2750, idioma: ["espanyol", "catala", "italià", "francès"]
    },
    {
        nom: "Mireia", edat: 36, professio: "perruquera", sou: 1240, idioma: ["espanyol", "catala"]
    },
    {
        nom: "Esteve", edat: 54, professio: "dentista", sou: 4507, idioma: ["espanyol", "francès"]
    },
    {
        nom: "Joaquim", edat: 62, professio: "jubilat", sou: 1100, idioma: ["espanyol", "catala"]
    },
    {
        nom: "Ernest", edat: 14, professio: "estudiant", sou: 0, idioma: ["catala", "anglès"]
    },
    {
        nom: "Eric", edat: 28, professio: "disenyador", sou: 850, idioma: ["espanyol", "catala", "anglès", "alemany"]
    },
    {
        nom: "Maiol", edat: 20, professio: "estudiant", sou: 0, idioma: ["espanyol", "catala"]
    },
    {
        nom: "Carles", edat: 18, professio: "estudiant", sou: 0, idioma:
            ["espanyol"]
    },
    {
        nom: "Antoni", edat: 32, professio: "metge", sou: 7800, idioma: ["espanyol", "catala", "anglès"]
    },
];

/* 1. Crea un nou amb el sou augmentat en un 2% si el sou és menor de 1000 i en un 1.7% si és igual o més gran. Utilitza map(). */
const usuarisSousActualitzats = usuaris.map(usuari => {
    let sou = usuari.sou;

    if (sou < 1000) {
        sou *= 1.02;
    } else {
        sou *= 1.017;
    }

    sou = Number(sou.toFixed(2));
    return sou;
})

console.log(usuarisSousActualitzats);

/* 2. Retorna els items amb un sou entre 500 i 1500 ambdós inclosos. Utilitza filter(). */
const usersSouFilter = usuaris.filter(usuari => usuari.sou >= 500 && usuari.sou <= 1500);
console.log(usersSouFilter);

/* 3. Utilitzant every() i some()
- Mostra un missatge que indiqui si tots els usuaris són majors d’edat o no ho són.
- Mostra un missatge que indiqui si hi han usuaris que tenen 65 anys o més. */
const usersMajorEdat = usuaris.every(usuari => usuari.edat >= 18);

if (usersMajorEdat) {
    console.log("Tots els usuaris són majors d'edat.");
} else {
    console.log("Hi ha algun usuari que no és major d'edat.");
}

const usuarisMajors65 = usuaris.some(usuari => usuari.edat >= 65);

if (usuarisMajors65) {
    console.log("Hi ha usuaris que tenen 65 anys o més.");
} else {
    console.log("NO Hi ha usuaris de 65 anys o més.");
}

/* 4. Retorna el valor de la suma total del sou de tots els usuaris.Utilitza reduce(). */
const initValue = 0;
const sumaSou = usuaris.reduce((accumulator, usuari) => accumulator + usuari.sou, initValue)
console.log(sumaSou + " €");

/* 5. Mitjançant splice() a l’array usuaris:
- Insereix dos elements nous a partir de la posició 7.
- Extreu els elements de les posicions 3 a 5(ambdós inclosos) eliminant - los de l’array original i desant-los en un de nou. */
usuaris.splice(7, 0, { "nom": "Maria", "edat": 32, "professio": "advocada", "sou": 1300, "idioma": ["espanyol", "catala", "angles"] }, { "nom": "Nil", "edat": 55, "professio": "dissenyador grafic", "sou": 1250, "idioma": ['espanyol', 'angles'] })

console.log(usuaris);

const usuarisEliminats = usuaris.splice(3, 3); // elimina 3 (digit de després de la coma) elements a partir de la posició 3 (digit de abans de la coma)
console.log("Usuaris eliminats:");
console.log(usuarisEliminats);
console.log("Array original modificat:");
console.log(usuaris);