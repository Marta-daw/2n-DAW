import { createContext, useState } from 'react';

const CartVisibilityContext = createContext();

const CartVisibilityProvider = ({children}) => {
    const [isCardOpen, setIsCardOpen] = useState(false);

    console.log("isCartOpen:", isCardOpen);
    
    const toggleCard = () => setIsCardOpen(prev => !prev);

    return (
            <CartVisibilityContext.Provider value={{ isCardOpen, toggleCard }}>
                {children}
            </CartVisibilityContext.Provider>
        );
}

export { CartVisibilityContext };
export default CartVisibilityProvider;