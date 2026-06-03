# Ejercicio 1
# Escribir un programa que pida al usuario una palabra y la muestre por pantalla 10 veces.
paraula = input("Escriu una paraula: ")

for i in range (10):
    print (paraula, end=" ")

# Ejercicio 2
# Escribir un programa que pregunte al usuario su edad y muestre por pantalla todos los años que ha cumplido (desde 1 hasta su edad).
edat = int(input("\n Quants anys tens? "))

for i in range(1, edat+1):
    if i == 1:
        print(f"Has complert {i} any")
    else:
        print(f"Has complert {i} anys")
    
    i += 1
    
# Ejercicio 3
# Escribir un programa que pida al usuario un número entero positivo y muestre por pantalla todos los números impares desde 1 hasta ese número separados por comas.
num = int(input("Escriu un número positiu: "))

for i in range (1, num+1, 2):
    print (i, end = " ")
    
    i+= 1

# Ejercicio 4
# Escribir un programa que pida al usuario un número entero positivo y muestre por pantalla la cuenta atrás desde ese número hasta cero separados por comas.
digit = int(input("\nEscriu un número positiu: "))

for i in range (digit, 0, -1):
    print(i, end=" ")

    i -= 1

# Ejercicio 5
# Escribir un programa que pregunte al usuario una cantidad a invertir, el interés anual y el número de años, y muestre por pantalla el capital obtenido 
# en la inversión cada año que dura la inversión.
capital = float(input("\nQuina quantitat de diners vols invertir? "))
interes_anual = float(input("Quin interés anual vols? "))
num_anys = int(input("Quantas anys? "))

interes_a_aplicar = interes_anual / 100

for i in range (num_anys):
    capital *= 1 + interes_a_aplicar
    print(capital)

# Ejercicio 6
# Escribir un programa que pida al usuario un número entero y muestre por pantalla un triángulo rectángulo como el de más abajo, de altura el número introducido.

    # *
    # **
    # ***
    # ****
    # *****
n = int(input("Escriu un numero: "))

for i in range (1, n+1):
    print("*"*i)
# Ejercicio 7
# Escribir un programa que muestre por pantalla la tabla de multiplicar del 1 al 10.


# Ejercicio 8
# Escribir un programa que pida al usuario un número entero y muestre por pantalla un triángulo rectángulo como el de más abajo.

    # 1
    # 3 1
    # 5 3 1
    # 7 5 3 1
    # 9 7 5 3 1

nu = int(input("Escriu un numero: "))

for i in range (1, nu+1, 2):
    for j in range (i, 0, -2):
        print(j, end=" ")
    print()
    
# Ejercicio 9
# Escribir un programa que almacene la cadena de caracteres contraseña en una variable, pregunte al usuario por la contraseña hasta que introduzca la contraseña correcta.


# Ejercicio 10
# Escribir un programa que pida al usuario un número entero y muestre por pantalla si es un número primo o no.


# Ejercicio 11
# Escribir un programa que pida al usuario una palabra y luego muestre por pantalla una a una las letras de la palabra introducida empezando por la última.


# Ejercicio 12
# Escribir un programa en el que se pregunte al usuario por una frase y una letra, y muestre por pantalla el número de veces que aparece la letra en la frase.


# Ejercicio 13
# Escribir un programa que muestre el eco de todo lo que el usuario introduzca hasta que el usuario escriba “salir” que terminará.
