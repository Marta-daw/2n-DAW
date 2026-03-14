import { useState, useContext } from 'react';
import styles from './Product.module.scss'; //(primer instalar sass: npm install -D sass)
// i per afegir les classes a cada part es de la seguent manera: className={styles.donutIMG} i així per cada classe que tingui el .scss
import  { CartContext } from '../../context/CartContext.jsx';
import { calculateNewCart } from '../../services/cartService.jsx';

import { Button, Image, Input, Label, Select, Options } from '../HTMLElement/index.jsx'; // Importem els components des de l'index de HTMLElement

function Product ({ donut }){
    const [selectedBatter, setSelectedBatter] = useState(donut.batters.batter[0].type); // Estat per al batter seleccionat
    const [selectedTopping, setSelectedTopping] = useState(donut.topping[0].type); // Estat per al topping seleccionat
    const [quantity, setQuantity] = useState(1); // Estat per a la quantitat seleccionada

    // Context per a gestionar el carret de la compra
    const { cart, setCart } = useContext(CartContext);

    // Funció per afegir el donut al carrito
    const handleBuy = () => {
        const newItem = calculateNewCart(
            cart,
            donut,
            selectedBatter,
            selectedTopping,
            quantity
        );

        setCart(newItem);
    };

    // Return que em monta la card i em mostra la informació del donut i em monta el formulari en base a les dades del donut que rebo en el .map del CatalegApp
    return (
        <div className={styles.donutCard}>
            <div className={styles.donutHeader}>
                <h2>{donut.name}</h2>                                                                                                                                                                       
            </div>

            <div className={styles.donutIMG}>
                <Image src={donut.img} alt={donut.name} />
            </div>

            <div className={styles.donutPrice}>
                <p>Preu: {donut.ppu.toFixed(2)} €</p>
            </div>

            <div className={styles.donutForm}>
                <div className={styles.formGroup}>
                    <Label>Batters: </Label>
                    <Select value={selectedBatter} onChange={(e) => setSelectedBatter(e.target.value)}>
                        {donut.batters.batter.map(batter => (
                            <Options key={batter.id} value={batter.type}>{batter.type}</Options>
                        ))}
                    </Select>
                </div>
                <div className={styles.formGroup}>
                    <Label>Topping: </Label>
                    <Select value={selectedTopping} onChange={(e) => setSelectedTopping(e.target.value)}>
                        {donut.topping.map(topping => (
                            <Options key={topping.id} value={topping.type}>{topping.type}</Options>
                        ))}
                    </Select>
                </div>

                <div className={styles.quantityGroup}>
                    <Label>Quantitat: </Label>
                    <Input type="number" min="1" value={quantity} onChange={(e) => setQuantity(e.target.value)} />
                </div>

                <Button text="Comprar" onClick={handleBuy} />
            </div>
        </div>
    );
}

export default Product;

