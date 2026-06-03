import math

# Ejercicio 1
# Escribir una función que muestre por pantalla el saludo ¡Hola amiga! cada vez que se la invoque.
def saludo():
    print("¡Hola amiga!")

saludo()
saludo()
saludo()

# Ejercicio 2
# Escribir una función a la que se le pase una cadena <nombre> y muestre por pantalla el saludo ¡hola <nombre>!.
def saludo_personal (name):
    print(f"¡Hola {name}!")

saludo_personal("Maria")
saludo_personal("Pablo")
saludo_personal("Rosa")

# Ejercicio 3
# Escribir una función que reciba un número entero positivo y devuelva su factorial.

def factorial (num):
    n = 1
    for i in range (2, num+1):
        n *= i
    
    return n

print(factorial(4))
print(factorial(5))

# Ejercicio 4
# Escribir una función que calcule el total de una factura tras aplicarle el IVA. La función debe recibir la 
# cantidad sin IVA y el porcentaje de IVA a aplicar, y devolver el total de la factura. Si se invoca la función 
# sin pasarle el porcentaje de IVA, deberá aplicar un 21%.
def calculo_iva (importe, iva):
    if iva == 0 or iva == "null":
        importe_iva = importe * 21 / 100
        total = importe + importe_iva
    else:
        importe_iva = importe * iva / 100
        total = importe + importe_iva
    return total

print(calculo_iva(1000, 10))
print(calculo_iva(850, 4))
print(calculo_iva(1200, 0))

# Ejercicio 5
# Escribir una función que calcule el área de un círculo y otra que calcule el volumen de un cilindro usando la primera función.
def area_circulo (radio):
    area = math.pi * radio ** 2 
    return round(area, 2)

def volumen_cilindro (radio, altura):
    volumen = area_circulo(radio) * altura
    return round(volumen, 2)

print(area_circulo(5))
print(volumen_cilindro(5, 10))

# Ejercicio 6
# Escribir una función que reciba una muestra de números en una lista y devuelva su media.
def media (lista):
    suma = sum(lista)
    media= suma/len(lista)
    return media

lista_numeros = [15, 22, 38, 40, 55]
print (media(lista_numeros))

# Ejercicio 7
# Escribir una función que reciba una muestra de números en una lista y devuelva otra lista con sus cuadrados.
def cuadrados (lista):
    lista_cuadrados = []

    for elemento in lista:
        lista_cuadrados.append(elemento ** 2)
    
    return lista_cuadrados


list_numeros = [1, 2, 3, 4, 5]
print(cuadrados(list_numeros))
print(cuadrados(lista_numeros))

# Ejercicio 8
# Escribir una función que reciba una muestra de números en una lista y devuelva un diccionario con su media, varianza y desviación típica.
def calculos (lista):
    diccionario_calculos = {}

    for elemento in lista:
        elemento += elemento
    media = elemento / len(lista)

    diccionario_calculos["media"] = media

    diccionario_calculos["varianca"] = round((sum(elemento ** 2 for elemento in lista) / len(lista) - media ** 2), 2)
    diccionario_calculos["desviacion_tipica"] = round(((diccionario_calculos["varianca"])**0.5), 2)

    return diccionario_calculos


print(calculos(list_numeros))
print(calculos(lista_numeros))

# Ejercicio 9
# Escribir una función que calcule el máximo común divisor de dos números y otra que calcule el mínimo común múltiplo.


# Ejercicio 10
# Escribir una función que convierta un número decimal en binario y otra que convierta un número binario en decimal.


# Ejercicio 11
# Escribir un programa que reciba una cadena de caracteres y devuelva un diccionario con cada palabra que contiene y su frecuencia. 
# Escribir otra función que reciba el diccionario generado con la función anterior y devuelva una tupla con la palabra más repetida y su frecuencia.


