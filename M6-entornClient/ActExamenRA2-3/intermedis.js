/* 6. Validador de DNI/NIE: Crea una funció que validi si un DNI o NIE espanyol és correcte:
    • Comprova el format (8 números + lletra o NIE) 
    • Valida que la lletra sigui correcta segons l'algoritme oficial 
    • Retorna si és vàlid i el tipus de document  */
    function validarDNI(dni) {
        const numDni = dni.slice(0, -1);
        const lletraDni = dni.slice(-1).toUpperCase();
        const lletras = "TRWAGMYFPDXBNJZSQVHLCKE";

        let validesa=false;
        let tipusDocument = "";

        if (numDni.length === 8) {
            
            const formatDNI =/[0-9]{8}/;

            if (numDni.match(formatDNI)) {
                const indexLletra = parseInt(numDni) % 23;
                const lletraCorrecta = lletras.charAt(indexLletra);
                
                if (lletraDni === lletraCorrecta) {
                    tipusDocument = "DNI";
                    validesa=true;
                }

            } else {
                tipusDocument ="No és un DNI vàlid";
            }
        }

        return "El document és de tipus: "+tipusDocument+". Vàlid: "+validesa;
    }

    const dni = "38871607C";  //Exemple de DNI a validar
    const validacio= validarDNI(dni);
    console.log("-----------------------------------------------");
    console.log(validacio);
    console.log("-----------------------------------------------");

/* 7. Sistema de notes: Crea un sistema que gestioni notes d'estudiants:
    • Array d'objectes amb nom, cognoms i array de notes 
    • Calcula la mitjana de cada estudiant 
    • Ordena els estudiants per nota mitjana 
    • Mostra qui ha suspès (< 5), aprovat (5-6.9), notable (7-8.9) o excel·lent (9-10)  */

    function sistemaNotes(estudiants){        
        let mitjanaEstudiants = [];

        let mitjana=0;
        let sumaNotes;

        for (let i=0; i<estudiants.length; i++){
            sumaNotes = 0;
            sumaNotes += estudiants[i].notes.reduce((a, b) => a + b, 0);

            mitjana = Math.round(sumaNotes / estudiants[i].notes.length);

            mitjanaEstudiants.push({
                nom: estudiants[i].nom,
                cognoms: estudiants[i].Cognoms,
                mitjana: mitjana
            });
        }

        mitjanaEstudiants.sort((a, b) => b.mitjana - a.mitjana);
        
        for (let j=0; j<mitjanaEstudiants.length; j++){
            let qualificacio="";

            if(mitjanaEstudiants[j].mitjana < 5){
                qualificacio="suspès";
            } else if (mitjanaEstudiants[j].mitjana < 7) {
                qualificacio= "aprovat";
            } else if (mitjanaEstudiants[j].mitjana < 9){
                qualificacio="notable";
            } else {
                qualificacio="excel·lent"
            }

            mitjanaEstudiants[j].qualificacio = qualificacio;
        }

        return mitjanaEstudiants;
    }

    const estudiants = [
        {nom:"Ariadna", Cognoms:"Pérez Martínez", notes:[5, 7.2, 4.8, 8, 6.5]},
        {nom:"Marcel", Cognoms:"Fernandez Llopis", notes:[6.7, 10, 7.3, 8, 7]},
        {nom:"Llucia", Cognoms: "Ramonet González", notes:[7, 8, 4.1, 9.2, 6]},
        {nom:"Oriol", Cognoms:"Massuet Aguirre", notes:[7, 6, 8.4, 6.6, 8]},
        {nom:"Sofia", Cognoms:"Lopez Torres", notes:[9, 7.5, 4.3, 8, 9.7]}
    ]

    const returnSistema = sistemaNotes(estudiants);
    console.log(returnSistema);
    console.log("-----------------------------------------------");

/* 8. Conversor de temps: Crea funcions per convertir:
    • Segons a format HH:MM:SS 
    • Dies, hores, minuts a segons totals 
    • Format 12h a 24h i viceversa 
    • Calcula la diferència entre dues hores en format llegible */

    function conversorTemps(segons){
        const minuts = Math.floor(segons / 60);
        const hores = Math.floor(minuts / 60);

        const segonsRestants = segons % 60;
        const minutsRestants = minuts % 60;
        const horesRestants = hores % 24;  

        const formatHHMMSS = horesRestants.toString().padStart(2, '0') + ':' + minutsRestants.toString().padStart(2, '0') + ':' +
                             segonsRestants.toString().padStart(2, '0');

        // Dies, hores, minuts a segons totals
        const dies = 3;
        const hores2= 4;
        const minuts2 = 47;

        const totalSegons = (dies * 86400) + (hores2 * 3600) + (minuts2 * 60);

        // calcular la diferència entre dues hores en format llegible
        const data1 = new Date();
        let horaActual= data1.getHours();
        let minutActual= data1.getMinutes();
        let segonActual= data1.getSeconds();

        const data2 = new Date();
        data2.setHours(12);
        data2.setMinutes(30);
        data2.setSeconds(15);

        let horaDiferencia = Math.abs(data2.getHours() - horaActual);
        let minutDiferencia = Math.abs(data2.getMinutes() - minutActual);
        let segonDiferencia = Math.abs(data2.getSeconds() - segonActual);  

        const difHora = horaDiferencia.toString().padStart(2, '0') + ':' + minutDiferencia.toString().padStart(2, '0') + ':' +
                        segonDiferencia.toString().padStart(2, '0');
        
    
        return formatHHMMSS+"\n"+totalSegons+"\n"+"la diferencia entre "+ horaActual+":"+minutActual+":"+segonActual+" i 12:30:15 és "+difHora;
    }

    const segons = 3665;
    const resultFunction = conversorTemps(segons);
    console.log(resultFunction);
    console.log("-----------------------------------------------");

/* 9. Filtrador d'objectes: Donat un array d'objectes de productes amb propietats (nom, preu, categoria, stock):
    • Filtra per rang de preus 
    • Filtra per categories múltiples 
    • Ordena per diferents criteris (preu, nom, stock) 
    • Troba productes amb stock baix (< 10 unitats) */

/* 10. Sistema de reserva de butaques: Crea un sistema de cinema amb:
    • Array bidimensional representant files i seients 
    • Funció per reservar butaques (comprova disponibilitat) 
    • Funció per cancel·lar reserves 
    • Mostra un plànol visual amb butaques lliures/ocupades 
    • Calcula el preu total segons tipus de butaca */

/* 16. Generador de taules de multiplicar interactives: Crea una aplicació que:
    • Generi una taula de multiplicar de l'1 al 10 per al número escollit 
    • Permeti seleccionar quin número vols practicar (de l'1 al 12) 
    • Tingui un mode "examen" que faci preguntes aleatòries 
    • Compti els encerts i errors 
    • Mostri el temps que has trigat a completar 10 preguntes 
    • Guardi les teves millors puntuacions al localStorage */

/* 17. Conversor d'unitats universal: Crea un conversor complet que inclogui:
    • Longitud (metres, quilòmetres, milles, peus, polzades) 
    • Pes (quilograms, grams, lliures, unces) 
    • Temperatura (Celsius, Fahrenheit, Kelvin) 
    • Volum (litres, mil·lilitres, galons, tasses) 
    • Velocitat (km/h, m/s, mph) 
    • Interface amb selectors per escollir unitat origen i destí 
    • Conversió automàtica mentre escrius */