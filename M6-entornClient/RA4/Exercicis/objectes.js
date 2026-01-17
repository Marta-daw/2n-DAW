/* 1. A partir del següent Object Recupera la informació següent:
- 1.1 En quants colors està disponible l’article S124234G.
- 1.2 El nombre de samarretes de color blanc de la talla M de l'article S124234G.
- 1.3 La suma de les unitats de la talla L de color blau dels tres articles.
- 1.4 La suma de les unitats de totes les talles de color blau dels tres articles. */

const producte = {
  S124234G: {
    Descripcio: "Samarreta",
    preu: 45,
    colors: ["blau", "negre", "blanc"],
    stock: {
      "M": { "blau": 5, "negre": 10, "blanc": 7 },
      "L": { "blau": 2, "negre": 5, "blanc": 1 },
      "XL": { "blau": 4, "negre": 7, "blanc": 0 }
    }
  },
  P785745Y: {
    Descripcio: "Pantaló",
    preu: 84,
    colors: ["blau", "negre"],
    stock: {
      "M": { "blau": 5, "negre": 10 },
      "L": { "blau": 2, "negre": 5 },
      "XL": { "blau": 4, "negre": 7 }
    }
  },
  A234578W: {
    Descripcio: "Abric",
    preu: 129,
    colors: ["blau", "verd"],
    stock: {
      "M": { "blau": 1, "verd": 0 },
      "L": { "blau": 7, "verd": 15 },
      "XL": { "blau": 4, "verd": 3 }
    }
  }
};

const quantsColors = producte.S124234G.colors.length;
console.log("Exercici 1.1: ", quantsColors);

const samarretaBlanc = producte.S124234G.stock.M.blanc;
console.log("Exercici 1.2: ", samarretaBlanc);

let sumaBlaus = 0;
for (let article in producte) {
  sumaBlaus += producte[article].stock.L.blau;
}
console.log("Exercici 1.3: ", sumaBlaus);

let sumaStockBlau = 0;
for (let article in producte) {
  for (let talla in producte[article].stock) {
    sumaStockBlau += producte[article].stock[talla].blau;
  }
}
console.log("Exercici 1.4: ", sumaStockBlau);
console.log("------------------------------------");
/* 2. Crea el mètode nomSencer() que retorni el nom i cognom de l'objecte client. Defineix el mètode amb:
- Una funció estàndard.
- Una funció de fletxa. */

const nom = "Pere";
const cognom = "Garcia";
const client = {
  nom: 'Ramon',
  cognom: 'Llull',
  naixement: '1232',
  /*  //FUNCIÓ ESTÀNDARD
  
  nomSencer: function () {
    return `${this.nom} ${this.cognom}`;
  } */

  // FUNCIÓ DE FLETXA
  nomSencer: () => {
    return client.nom + " " + client.cognom;
  }
};

console.log(client.nomSencer());
console.log("------------------------------------");

/* 3. Donat aquest objecte Defineix el la funció de callback de forEach amb:
- Una funció estàndard.
- Una funció de fletxa. */

const cotxes = {
  marques: ["Maserati", "Ferrari", "BMW"],
  categoria: "Esportiu",
  /* //FUNCIÓ ESTÀNDARD
  missatge: function () {
    this.marques.forEach(function (marca) {
      console.log(`${marca} és un ${this.categoria}`);
    });
  } */

  //FUNCIÓ DE FLETXA
  missatge: () => {
    cotxes.marques.forEach((marca) => {
      console.log(`${marca} és un ${cotxes.categoria}`);
    });
  }
}

console.log(cotxes.missatge());
