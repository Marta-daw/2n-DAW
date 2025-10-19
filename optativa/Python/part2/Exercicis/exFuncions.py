import datetime
""" 1- Crea una funció longituds que a partir d’una llista de paraules i una longitud, retorni tres valors: quantes paraules tenen la mateixa longitud,  quantes una longitud inferior i quantes una longitud superior.
iguals, petites, grans = longituds(paraules, lon) """

def longituds (lista, long):
    countIgual=0
    countMenys=0
    countMes=0

    for m in lista:
        longitudParaula= len(m) 
        if longitudParaula>long:
            countMes+=1
        elif longitudParaula<long: 
            countMenys+=1
        else:
            countIgual+=1
    
    return countIgual, countMenys, countMes

lista=["Fent", "servir", "un", "bucle", "compta", "les", "paraules", "de", "la", "llista", "que", "tenen", "la", "mateixa", "longitud"]

long=6

countIgual, countMenys, countMes=longituds(lista, long)

print(f"Longitud igual a {long}: {countIgual}")
print(f"Longitud inferior a {long}: {countMenys}")
print(f"Longitud superior a {long}: {countMes}")
print("----------------------------------------------------------")

""" 2- Crea una funció puntsDaus que a partir d’una llista de valors de tirades de daus, calculi una puntuació de la següent manera:
Si hi ha algun dau que sigui menor que 3, aleshores la puntuació final és zero punts.
En altre cas la puntuació es calcula de la següent manera:
Se sumen tots els daus.
2 punts més si la suma és més gran de 12.
1 punt més per cada dau que marqui un 6. 

puntuacio=puntsDaus(punts)"""

def puntsDaus (punts):
    puntuacio=0

    for m in punts:
        if m<3:
            puntuacio=0
        elif m==6:
            puntuacio+=m+1
        else:
            puntuacio+=m
            if puntuacio>12:
                puntuacio+=2
        
    return puntuacio

punts=[4, 5, 4]

puntuacio=puntsDaus(punts)

print(puntuacio)

print("----------------------------------------------------------")
""" 3- Crea una funció valorsRang que a partir d’una llista de valors, un valor mínim i un valor màxim, retorni una nova llista amb tots els valors de la primera què es troben entre els dos valors entrats per teclat (inclosos), sense valors repetits.

escollits=valorsRang(llista, valmin, valmax) """

def valorsRang (llistaValors, valMin, valMax):
    escollits=set()

    for m in llistaValors:
        if m>=valMin and m<=valMax:
            escollits.add(m)
    
    return escollits

llistaValors=[5,-2, 120, 55, 68, -13, 16, 41, 32, -98]
valMin=int(input("Entra valor minim: "))
valMax=int(input("Entra valor màxim: "))

escollits=valorsRang(llistaValors, valMin, valMax)

print(escollits)
print("----------------------------------------------------------")
""" 4- Crea una funció calcula_segons que calculi la quantitat de segons en un temps donat en hores, minuts i segons.
segons = calcula_segons( hores, minuts, segons) """

def calculaSegons(hores, minuts, segons):
    calcMin=hores*60
    mins=minuts+calcMin
    calcSegons=mins*60
    segonsTotals=segons+calcSegons

    return segonsTotals

x=datetime.datetime.now()

hores=int(x.strftime("%H"))
minuts=int(x.strftime("%M"))
segons=int(x.strftime("%S"))
print(hores, minuts, segons)

seconds=calculaSegons(hores, minuts, segons)
print(seconds)

""" 5- Crea una funció temps que calculi la quantitat d’hores, minuts i segons d’un temps donat en segons.
hores, minuts, segons = temps(segons) """

#2h son 7200segons

#minuts=segons/60
#restoSegons=segons%60

#hores=minuts/60
#restoHores=minuts%60

""" 6- Escriu una funció esvocal que a partir un caràcter torni True si el caràcter és una vocal o False en cas contrari.
if esvocal(caracter):
    print(caracter, “és una vocal”)
else:
    print(caracter, “NO és una vocal”) """

#match (caracter):
#   case a | A | e | E | i | I | o | O | u | U:
#       print(caracter, “és una vocal”)
#   case _:
#       print(caracter, “NO és una vocal”)


"""7 -Crea una funció canviaMorse programa que sigui capaç de transformar text natural a codi morse i viceversa.
Heu de detectar automàticament de quin tipus es tracta i realitzar la conversió.
En morse se suporta ratlla "-", punt ".", s'ha de fer servir un espai " " per separar lletres i dos espais "  " entre paraules.
L'alfabet morse suportat serà el mostrat a https://es.wikipedia.org/wiki/Código_morse. """

#morse_dict = {
#    'A': '.-', 'B': '-...', 'C': '-.-.', 'D': '-..', 'E': '.', 
#    'F': '..-.', 'G': '--.', 'H': '....', 'I': '..', 'J': '.---',
#   ... etc
#}
#
# all(c in '.- ' for c in text)
#
# split(' ') // split('  ')
#
#  text_dict = {v: k for k, v in morse_dict.items()}
# 
#  def canviaMorse(text):
    # 1. Detectar tipus
#    if es_morse(text):
#        return morse_a_text(text)
#    else:
#        return text_a_morse(text)  #


""" 8-Crea una funció diferencies que a partir de dues cadenes de text gairebé iguals, retorneu les diferències.
La funció ha de trobar les diferències a la segona cadena i retornar-les en format llista.
Les dues cadenes de text han de ser iguals en longitud.
Exemples:
Em dic mouredev / Em dic meuredov -> ["e", "o"]
Em dic.Brais Moure / Em dic brais moure -> [" ", "b", "m"] """

#def diferencies(text1, text2):
    # Comprovar que la longitud de les dos cadenes siguin iguals
    # Crear llista buida per guardar diferències
    # Recórrer amb un for, comparar caràcter a caràcter i quan trobis la diferència afegir el caracter diferent de la cadena text2 a una llista nova
    # Retornar llista

""" 9-Crea una funció comptaLA que a partir d'una frase retorni la quantitat de LA trobades.
No es diferencia entre majúscules i minúscules. No s'ha de fer servir el mètode count.
Exemple:
Ell s'ha passat la tarda cantant La, LA, lA, ...
Retorna 4 """

#frase = frase.upper() // i així no ens preocupem per les majuscules i minuscules
# def comptaLA(frase):
    # Convertir a majúscules
    # Inicialitzar comptador a 0
    # Recórrer des de 0 fins len(frase)-1
    #   Si frase[i:i+2] == "LA":
    #       augmentar comptador
    # Retornar comptador

""" 10-Crea una funció comptaLES que a partir d'una frase retorni la quantitat de LES trobades.
No es diferencia entre majúscules i minúscules. No s'ha de fer servir el mètode count.
Exemple:
Ell es passa totes les tardes cantant LaLESlesla...
Retorna 3 """

#frase = frase.upper() // i així no ens preocupem per les majuscules i minuscules
# def comptaLA(frase):
    # Convertir a majúscules
    # Inicialitzar comptador a 0
    # Recórrer des de 0 fins len(frase)-2 //per tenir espai per 3 caràcters
    #   Si frase[i:i+3] == "LES":
    #       augmentar comptador
    # Retornar comptador