import { useState, useEffect } from 'react';


function Prova() {
    const [dada, setDada] = useState(null);

    useEffect(() => {
        fetch('https://jsonplaceholder.typicode.com/posts')
            .then(response => {
                if (!response.ok) {
                    throw new Error('La resposta no ha estat correcta');
                }
                return response.json();
            })
            .then(dades => {
                setDada(dades);
                console.log(dades);
            })
            .catch(error => {
                console.error('Error en la petició:', error);
            });
    })

    return (
        <>
            <div>Prova</div>
        </>
    )
}

export default Prova