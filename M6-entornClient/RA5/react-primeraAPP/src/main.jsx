import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.jsx'
import './index.scss'


createRoot(document.getElementById('root')).render(
  <StrictMode>
    <App />
  </StrictMode>,
)

/* createRoot(document.getElementById('root')).render(
  <StrictMode>
    <CatalegApp />
    
    <Books />
  </StrictMode>,
)

createRoot(document.getElementById('form')).render(
  <StrictMode>
    <IncidenciaForm />
  </StrictMode>,
)
 */