import './App.scss'
import Prova from './components/Prova'
import CatalegApp from './components/Cataleg/Cataleg.jsx'
import Books from './components/Books/Books.jsx'
import IncidenciaForm from './components/IncidenciaForm/IncidenciaForm.jsx'
import CartProvider from './context/CartContext.jsx'
import CartVisibilityProvider from './context/CartVisibilityContext.jsx' // Importem el nou context de visibilitat del carret
import Cart from './components/Cart/Cart.jsx' // Importem el component Carrito que faltava
import Header from './components/Header/Header.jsx'


function App() {
  return (
    <CartProvider>
      <CartVisibilityProvider> {/* Envoltem el Carret amb el nou context de visibilitat */}
        <Header />
        <CatalegApp/>
        <Books/>
        <IncidenciaForm/>
        <Cart /> 
      </CartVisibilityProvider>
    </CartProvider>
    
  )
}

export default App;
