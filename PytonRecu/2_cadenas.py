# Ejercicio 1
# Escribir un programa que pregunte el nombre del usuario en la consola y un número entero e imprima por pantalla en líneas distintas el nombre del usuario tantas veces como el
# número introducido.
nombre = input("Escriu el teu nom: ")
numero = int(input("Entra un número: "))

print ((nombre+"\n") * numero)

# Ejercicio 2
# Escribir un programa que pregunte el nombre completo del usuario en la consola y después muestre por pantalla el nombre completo del usuario tres veces, una con todas las letras 
# minúsculas, otra con todas las letras mayúsculas y otra solo con la primera letra del nombre y de los apellidos en mayúscula. El usuario puede introducir su nombre combinando 
# mayúsculas y minúsculas como quiera.
nombre = input("Escriu el teu nom: ")
apellido_A = input("Escriu el primer cognom: ")
apellido_B = input("Escriu el segon cognom: ")

print (f"\n"+f"Nom complet {nombre} {apellido_A} {apellido_B}"+"\n")

print (f"Nom complet en minúscula {nombre.lower()} {apellido_A.lower()} {apellido_B.lower()}")
print (f"Nom complet en mayúscula {nombre.upper()} {apellido_A.upper()} {apellido_B.upper()}")
print (f"Nom complet amb majúscula només a la primera lletra {nombre.capitalize()} {apellido_A.capitalize()} {apellido_B.capitalize()}")

# Ejercicio 3
# Escribir un programa que pregunte el nombre del usuario en la consola y después de que el usuario lo introduzca muestre por pantalla "<NOMBRE> tiene <n> letras", 
# donde <NOMBRE> es el nombre de usuario en mayúsculas y <n> es el número de letras que tienen el nombre.
nombre = input("Escriu el teu nom: ")

count = len(nombre)

print(f"{nombre.upper()} tiene un total de {count} letras")

# Ejercicio 4
# Los teléfonos de una empresa tienen el siguiente formato "prefijo-número-extension" donde el prefijo es el código del país +34, y la extensión tiene dos dígitos (por ejemplo +34-913724710-56). 
# Escribir un programa que pregunte por un número de teléfono con este formato y muestre por pantalla el número de teléfono sin el prefijo y la extensión.
telefono = input("Introdueix el telèfon en aquest format: +34-xxxxxxxxx-xx -> ")

telefon_solo = telefono.split("-")

print(f"El telefon introduit és {telefon_solo[1]}")

# Ejercicio 5
# Escribir un programa que pida al usuario que introduzca una frase en la consola y muestre por pantalla la frase invertida.
frase = input("Escriu una frase: ")

print(frase[::-1])

# Ejercicio 6
# Escribir un programa que pida al usuario que introduzca una frase en la consola y una vocal, y después muestre por pantalla la misma frase pero con la vocal introducida en mayúscula.
frase = input("Escriu una frase: ")
vocal = input("Escull una vocal: ")

print(frase.replace(vocal, vocal.upper()))

# Ejercicio 7
# Escribir un programa que pregunte el correo electrónico del usuario en la consola y muestre por pantalla otro correo electrónico con el mismo nombre (la parte delante de la arroba @) 
# pero con dominio ceu.es.
correu_usuari = input("Escriu el teu correu electrònic: ")

parts_correu = correu_usuari.split("@")

print (f"{parts_correu[0]}@ceu.es") 

# Ejercicio 8
# Escribir un programa que pregunte por consola el precio de un producto en euros con dos decimales y muestre por pantalla el número de euros y el número de céntimos del precio introducido.
precio = float(input("Escriu el preu del producte amb dos decimals (i separat per un punt): "))

parts_preu = str(precio).split(".")

print(f"El producte costa {parts_preu[0]} euros i {parts_preu[1]} cèntims")

# Ejercicio 9
# Escribir un programa que pregunte al usuario la fecha de su nacimiento en formato "dd/mm/aaaa" y muestra por pantalla, el día, el mes y el año. Adaptar el programa anterior para que 
# también funcione cuando el día o el mes se introduzcan con un solo carácter.


# Ejercicio 10
# Escribir un programa que pregunte por consola por los productos de una cesta de la compra, separados por comas, y muestre por pantalla cada uno de los productos en una línea distinta.


# Ejercicio 11
# Escribir un programa que pregunte el nombre el un producto, su precio y un número de unidades y muestre por pantalla una cadena con el nombre del producto seguido de su precio unitario 
# con 6 dígitos enteros y 2 decimales, el número de unidades con tres dígitos y el coste total con 8 dígitos enteros y 2 decimales.

nom_product = input("Escriu el nom del producte: ")
preu_product = float(input("Escriu el seu preu: "))
unitats_product = int(input("Escriu el número d'unitats del producte: "))

print(f"El producte {nom_product} té un preu de {preu_product:009.2f} euros i hi ha un total de {unitats_product:03d}. Per tal, el preu total és de {(unitats_product*preu_product):011.2f}")