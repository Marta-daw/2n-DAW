import { useContext } from "react";
import { CartContext } from "../../context/CartContext.jsx";
import { CartVisibilityContext } from "../../context/CartVisibilityContext.jsx";
import { BsCart3 } from "react-icons/bs";
import styles from './CardIcon.module.scss';


function CardIcon() {
    const { cart } = useContext(CartContext); //Afegim el toggleCard
    const { toggleCard } = useContext(CartVisibilityContext); //Afegim el toggleCard
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);

    return (
        <div className={styles.divIcon} onClick={() => {console.log("click fet"); toggleCard();}} > {/* //Canviem el console.log pel toggleCard per a que s'obri el carret quan fem click a la icona */}
            <button className={styles.cartButton}>
                <BsCart3 size={24} />
            </button>
            {/* <p>{cart.length}</p> */}
            {totalItems > 0 && <span className={styles.cartCount}>{totalItems}</span>}
        </div>
    );
}

export default CardIcon;