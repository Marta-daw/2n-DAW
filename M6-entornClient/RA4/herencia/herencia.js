
// exercici3.js

// ========== CLASSE 1: Vehicle (pare) ==========
function Vehicle(dades) {
    this.marca = dades.marca;
    this.model = dades.model;
    this.matricula = dades.matricula;
    this.color = dades.color;
    this.combustible = dades.combustible;
}

Vehicle.prototype.mostrarInfo = function () {
    return `${this.marca} ${this.model}, matrícula: ${this.matricula}`;
};

Vehicle.prototype.arrencar = function () {
    return `Arrencant el vehicle ${this.marca}`;
};


// ========== CLASSE 2: Cotxe (fill) ==========
function Cotxe(dades, numPortes) {
    Vehicle.call(this, dades);
    this.numPortes = numPortes;
}

Cotxe.prototype = Object.create(Vehicle.prototype);
Cotxe.prototype.constructor = Cotxe;

Cotxe.prototype.obrir = function () {
    return `Obrint les ${this.numPortes} portes`;
};


// ========== CLASSE 3: Moto (fill) ==========
function Moto(dades, cilindrada) {
    Vehicle.call(this, dades);
    this.cilindrada = cilindrada;
}

Moto.prototype = Object.create(Vehicle.prototype);
Moto.prototype.constructor = Moto;

Moto.prototype.accelerar = function () {
    return `Accelerant la moto de ${this.cilindrada}cc`;
};


// ========== CREAR INSTÀNCIES I PROVAR ==========
let cotxe1 = new Cotxe({
    marca: "Seat",
    model: "Ibiza",
    matricula: "1234ABC",
    color: "Vermell",
    combustible: "Gasolina"
}, 5);

let moto1 = new Moto({
    marca: "Yamaha",
    model: "MT-07",
    matricula: "5678DEF",
    color: "Negre",
    combustible: "Gasolina"
}, 689);

/* // ========== MOSTRAR AL HTML ==========
const resultats = document.getElementById('resultats');

resultats.innerHTML = `
    <div class="vehicle">
        <h3>Cotxe: ${cotxe1.marca} ${cotxe1.model}</h3>
        <p><strong>Info:</strong> ${cotxe1.mostrarInfo()}</p>
        <p><strong>Color:</strong> ${cotxe1.color}</p>
        <p><strong>Combustible:</strong> ${cotxe1.combustible}</p>
        <p><strong>Portes:</strong> ${cotxe1.numPortes}</p>
        <p><strong>Acció:</strong> ${cotxe1.obrir()}</p>
        <p><strong>Arrencar:</strong> ${cotxe1.arrencar()}</p>
    </div>
    
    <div class="vehicle">
        <h3>Moto: ${moto1.marca} ${moto1.model}</h3>
        <p><strong>Info:</strong> ${moto1.mostrarInfo()}</p>
        <p><strong>Color:</strong> ${moto1.color}</p>
        <p><strong>Combustible:</strong> ${moto1.combustible}</p>
        <p><strong>Cilindrada:</strong> ${moto1.cilindrada}cc</p>
        <p><strong>Acció:</strong> ${moto1.accelerar()}</p>
        <p><strong>Arrencar:</strong> ${moto1.arrencar()}</p>
    </div>
`; */

// També mostrar a la consola
console.log("=== COTXE ===");
console.log(cotxe1.mostrarInfo());
console.log(cotxe1.obrir());

console.log("\n=== MOTO ===");
console.log(moto1.mostrarInfo());
console.log(moto1.accelerar());
