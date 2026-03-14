import styles from './CartItem.module.scss';
import { Button } from '../HTMLElement/Button/Button.jsx';
import { useContext } from 'react';
import { CartContext } from '../../context/CartContext.jsx';

function CartItem({ cart }) {
    const { setCart } = useContext(CartContext);

    const deleteItem = (cardId) => {
        setCart(cart.filter(item => item.cartId !== cardId)); // Filtra el carrito para eliminar el item con el cartId especificado
    }

    return (
        <>
            <ul className={styles.cartList}>
                {cart.map((item) => (
                    <>
                        <li key={item.cartId} className={styles.cartItem}> {/* Utilitzem item.cartId com a clau única en comptes de item.id */}
                            <p className={styles.namePrice}><strong>{item.name}</strong> <strong>{(item.ppu * item.quantity).toFixed(2)} €</strong></p>
                            <p>Batters: {item.chosenBatter}</p> {/* Mostrem el batter seleccionat */}
                            <p>Toppings: {item.chosenTopping}</p> {/* Mostrem el topping seleccionat */}
                            <p className={styles.priceDelete}>{item.quantity} u. x {(item.ppu )} € <Button text="Eliminar" onClick={() => deleteItem(item.cartId)} className={styles.buttonItem}></Button> </p>
                        </li>
                        <hr />
                    </>
                ))}
                
            </ul>
            <div className={styles.cartFooter}>
                <p className={styles.footerElements}><strong>Total</strong> {cart.reduce((acc, item) => acc + item.ppu * item.quantity, 0).toFixed(2)} €</p> {/* Mostrem el total calculat sumant el preu de cada item multiplicat per la seva quantitat */}
            </div>
        </>
    );
}


export default CartItem;