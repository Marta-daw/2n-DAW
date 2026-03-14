export const calculateNewCart = (cart, donut, selectedBatter, selectedTopping, quantityToAdd) => {
    const uniqueId = `${donut.id}-${selectedBatter}-${selectedTopping}`;
    const existingItemIndex = cart.find((item) => item.cartId === uniqueId); //Afegir item.cartId en comptes de item.id (per comparar el id del donut + batter + topping)

        if (existingItemIndex) {
            return cart.map((item) => {
                return item.cartId === uniqueId 
                    ? { ...item, quantity: item.quantity + Number(quantityToAdd) } //Afegir el Number a quantityToAdd per assegurar que es suma com a número
                    : item
            });
            
        } else{
            const newItem = {
                ...donut,
                cartId: uniqueId,
                quantity: Number(quantityToAdd), //Afegir el Number a quantityToAdd per assegurar que es suma com a número
                chosenBatter: selectedBatter,
                chosenTopping: selectedTopping
            };
            
            return  [...cart, newItem];
    }
};