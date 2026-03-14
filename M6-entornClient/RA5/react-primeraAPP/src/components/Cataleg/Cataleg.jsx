import { useState, useEffect } from 'react';
import DonutCard from '../Product/Product.jsx';
import { fetchDonuts } from '../../services/apiService.jsx';
import '../../App.css';

import styles from './Cataleg.module.scss'; //--> Mirar com fer que els estils estiguin en el .scss (primer instalar sass: npm install -D sass)

function CatalegApp() {
    const [donuts, setDonuts] = useState([]); // Estat per a la llista de donuts carregats des del fitxer JSON

    const [loading, setLoading] = useState(true); // Estat per a controlar si les dades s'estan carregant o ja s'han carregat

    // Utilitzar useEffect per carregar les dades del fitxer JSON quan el component es monta
    useEffect(() => {
        // Carregar les dades que obtenim del fitxer JSON
        fetchDonuts()
            .then(donuts => {
                setDonuts(donuts); // Actualitzar l'estat dels donuts amb les dades carregades
                setLoading(false); // Actualitzar l'estat de càrrega a false un cop les dades s'han carregat correctament
            }) // Capturar qualsevol error que pugui ocórrer durant la càrrega de les dades
            .catch(error => {
                console.error('Error al carregar les dades: ', error);
                setLoading(false);
            });
    }, []);

    // Mostrar un missatge de càrrega mentre les dades s'estan carregant
    if (loading) {
        return <div className={styles.carregant}>Carregant ...</div>
    }

    // Return que mostra el catàleg de donuts un cop les dades s'han carregat correctament
    return (
        <div className={styles.catalegApp}>
            <p className={styles.titleACT}>Activitat 1</p>
            {/* <button className={styles.sendBTN}>Enviar</button> */}
            <div className="donutsGrid">
                 {/* Mapear els donuts i renderitzar un component DonutCard per a cada donut */}
                {donuts.map(donut => (
                    <DonutCard key={donut.id} donut={donut} />
                ))}
            </div>

        </div>
    )
}

export default CatalegApp;