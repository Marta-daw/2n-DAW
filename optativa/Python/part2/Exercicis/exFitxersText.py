# 1- Crea un mètode mostra, que a partir d'un nom de fitxer, mostri el seu contingut per consola. 
# Si el fitxer no és vàlid, ha de mostrar un missatge informatiu.

file=open('exemple.txt', 'r')

try:
    print(file.readlines())

finally:
    file.close

# 2- Crea un mètode concatena, que a partir de dos fitxers, afegeixi el contingut del segon fitxer 
# al primer fitxer. Si el segon fitxer no és vàlid, ha de mostrar un missatge informatiu.

# 3- Crea un mètode afegir, que escrigui el contingut d'una llista en un fitxer. S'ha de fer append, 
# el contingut original del fitxer no s'ha d'esborrar.

# 4- Crea un mètode escriuPos, que escrigui una frase en un fitxer, a una posició concreta. Si la posició 
# és incorrecta, ha de mostrar un missatge informatiu.