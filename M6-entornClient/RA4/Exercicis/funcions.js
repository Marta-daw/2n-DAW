/* 1. Crea una funció que es pugui executar en diferents objectes mitjançant Apply() o Call(). Aquesta funció calcularà:
- La mitjana de les puntuacions obtingudes a partir dels valors de l’array scores de l’objecte, i la desarà en una variable avgScores.
- Si la mitjana és igual o superior a 50 una variable overcame es posarà a true, en cas contrari a false
- Executa una funció mitjançant call(). L’objecte que es passarà com a paràmetre té el següent
format i se li han d’afegir dues propietats avgScores i overcame calculades per la funció. */

function calculaMitjana() {
    let valorInic = 0;

    const sumaScore = this.scores.reduce((acumulator, currentValue) => acumulator + currentValue, valorInic);

    this.mitjanaPuntuacio = sumaScore / this.scores.length;

    if (this.mitjanaPuntuacio >= 50) {
        this.haSuperat = true;
    } else {
        this.haSuperat = false;
    }

    console.log(`La mitjana de ${this.name} ${this.surname} és ${this.mitjanaPuntuacio} i ha superat: ${this.haSuperat}`);
}

const student = {
    name: "Antoni",
    surname: "Batllori",
    scores: [40, 25, 37, 65, 72, 55]
};

calculaMitjana.call(student);
calculaMitjana.apply(student);
console.log("-------------------------------------------------------");

/*  2. Aplica la funció del punt anterior a un array d'objects */
const students = [
    { name: "Antoni", surname: "Batllori", scores: [40, 75, 22, 78] },
    { name: "Pere", surname: "Rodríguez", scores: [10, 28, 85, 35] },
    { name: "Josepa", surname: "Rovira", scores: [62, 71, 23, 44] },
    { name: "Joan", surname: "Revert", scores: [14, 65, 18, 88] },
    { name: "Maria", surname: "Palau", scores: [52, 45, 24, 55] }
];

students.forEach((student) => calculaMitjana.call(student));