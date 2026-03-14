import { useContext } from 'react';
import styles from './Cart.module.scss';
import { CartContext } from '../../context/CartContext.jsx';
import { CartVisibilityContext } from '../../context/CartVisibilityContext';
import CartItem from '../CartItem/cartItem.jsx';
import { Button } from '../HTMLElement/index.jsx'; // Importem el component Button des de l'index de HTMLElement

function Cart (){
    const { cart, setCart } = useContext(CartContext);

    const { isCardOpen, toggleCard } = useContext(CartVisibilityContext);
    
    if (!isCardOpen) {
        return null; // No renderitzem res si el carret no està obert
    }

    const deleteAllItems = () => {
        // Aquí podrías implementar la lógica para eliminar todos los items del carrito
        setCart ([]); // Ejemplo: vaciar el carrito estableciendo un array vacío
    }

    return (
        <div >
            {/* Aquí podrías mapear los items del carrito y mostrar su información */}
            <div className={styles.cartDrawer}>
                <div className={styles.cartHeader}>
                    <button onClick={toggleCard} className={styles.closeButton}>X</button>
                    <h1><br/>Carrito de la compra</h1>
                </div>
                {cart.length === 0 ? (
                    <>
                        <p>El carret està buit</p>
                        <Button text="Finalitzar compra" onClick={() => alert('No hi ha productes al carret!')} className={styles.buyButton} />
                        <Button text="Buidar tot" onClick={() => alert('El carret ja es buit')} className={styles.buttonDeleteItem} />
                    </>
                ) : (
                    <>
                        <CartItem cart={cart} />
                        <Button text="Finalitzar compra" onClick={() => alert('Compra finalitzada!')} className={styles.buyButton} />
                        <Button text="Buidar tot" onClick={deleteAllItems} className={styles.buttonDeleteItem} />
                    </>
                )}

                
            </div>
            
        </div>
    );

}

export default Cart;