
def comptaLES (cadena, busca):
    frase=cadena.upper()
    compt2=0
    i=0
    
    for i in range (len(frase)-1):
        if frase[i:i+3]=="LES":
            compt2+=1

    return "S'han trobat "+ str(compt2)+" vegades"

cadena="Ell es passa totes les tardes cantant LaLESlesla..."
busca="LES"

cuentaLES=comptaLES(cadena, busca)
print (cuentaLES)