import { useState } from "react";
import styles from './IncidenciaForm.module.scss'; //--> Mirar com fer que els estils estiguin en el .scss (primer instalar sass: npm install -D sass)

function IncidenciaForm () {
    const [resposta, setResposta] = useState("");

    const handleSubmit = async (e) => {
        // Captura l'esdeveniment i evita el comportament per defecte
        // Evita que el formulari faci reload de la pàgina
        e.preventDefault();

        //Creem un objecte amb les dades del formulari
        const dades = {
            titol: e.target.titol.value,
            descripcio: e.target.descripcio.value,
            prioritat: e.target.prioritat.value
        };

        // Enviar les dades amb fetch
        // Es fa servir async/await amb un try/catch per gestionar errors de xarxa o del servidor.
        try {
            const resposta = await fetch("https://localhost/php/incidencia.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json" //Indica el format amb que arriben les dades, impressindible perque el PHP pugui llegir-es bé
                },
                body: JSON.stringify(dades) //converteix objecte javascript a json per enviar-lo al servidor
            });

            // Mostrar la resposta del servidor
            const resultat = await resposta.json(); //response.text() //Depen del que envii el servidor
            setResposta(resultat.message);
        } catch (error) {
            setResposta("Error " + error.message);
        }
    };

    return (
        <div className={styles.incidenciaContainer}>
            <p className={styles.titleACT}>Activitat 3</p>
            <form onSubmit={handleSubmit} className={styles.incidenciaForm}>
                <label htmlFor="titol" className={styles.label}>Títol:</label><br />
                <input type="text" name="titol" placeholder="Títol" required className={styles.inputTextASelect}/><br/>
                <label htmlFor="descripcio" className={styles.label}>Descipció:</label><br />
                <textarea name="descripcio" placeholder="Descripció" required className={styles.inputTextASelect}></textarea><br/>
                <label htmlFor="prioritat" className={styles.label}>Prioritat:</label><br />
                <select name="prioritat" required className={styles.inputTextASelect}>
                    <option value="">Selecciona prioritat</option>
                    <option value="baixa">Baixa</option>
                    <option value="mitjana">Mitjana</option>
                    <option value="alta">Alta</option>
                </select><br/>
                <button type="submit" className={styles.btnForm}>Enviar Incidència</button><br/>
                
                {/* Div on es mostrarà la resposta */}
                <div className={styles.resposta}>{resposta}</div>
            </form>
        </div>
    )
}


export default IncidenciaForm;