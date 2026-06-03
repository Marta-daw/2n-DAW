# Ejercicio 1
# Escribir una función que aplique un descuento a un precio y otra que aplique el IVA a un precio. Escribir una tercera función 
# que reciba un diccionario con los precios y porcentajes de una cesta de la compra, y una de las funciones anteriores, y utilice 
# la función pasada para aplicar los descuentos o el IVA a los productos de la cesta y devolver el precio final de la cesta.


# Ejercicio 2
# Escribir una función que simule una calculadora científica que permita calcular el seno, coseno, tangente, exponencial y logaritmo 
# neperiano. La función preguntará al usuario el valor y la función a aplicar, y mostrará por pantalla una tabla con los enteros de 
# 1 al valor introducido y el resultado de aplicar la función a esos enteros.


# Ejercicio 3
# Escribir una función que reciba otra función y una lista, y devuelva otra lista con el resultado de aplicar la función dada a cada uno de los elementos de la lista.
def aplicar_funcion (funcion, lista):
    nueva_lista = []
    for elemento in lista:
        nuevo_elemento = funcion(elemento)
        nueva_lista.append(nuevo_elemento)

    return nueva_lista

def cuadrado (num):
    return num ** 2

numeros = [1, 2, 3, 4, 5]
print(aplicar_funcion(cuadrado, numeros))

# Ejercicio 4
# Escribir una función que reciba otra función booleana y una lista, y devuelva otra lista con los elementos de la lista que devuelvan True al aplicarles la función booleana.
def funcion_aplicada (funcion, lista):
    lista_nueva_num = []
    lista_nueva_string = []

    for elemento in lista:
        if isinstance(elemento, (int, float)):
            if funcion(elemento) == True:
                lista_nueva_num.append(elemento)
        elif isinstance(elemento, str):
            if funcion(elemento) == True:
                lista_nueva_string.append(elemento)
    
    return lista_nueva_num, lista_nueva_string


def booleano (x):
    if isinstance(x, int):
        if x % 2 != 0:
            return True
    
    if isinstance(x, str):
        if len(x) > 4:
            return True

numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

palabras = ["uno", "dos", "tres", "cuatro", "cinco", "diez", "veinte", "treinta", "cuarenta", "cincuenta"]

print(funcion_aplicada(booleano, numeros))
print(funcion_aplicada(booleano, palabras))

# Ejercicio 5
# Escribir una función que reciba una frase y devuelva un diccionario con las palabras que contiene y su longitud.
def longitud_palabras (frase):
    palabras = frase.split()
    diccionario = {}

    for palabra in palabras:
        diccionario[palabra] = len(palabra)

    return diccionario

print(longitud_palabras("Hola mi nombre es Marta y me gusta programar"))

# Ejercicio 6
# Escribir una función reciba una lista de notas y devuelva la lista de calificaciones correspondientes a esas notas.
def calificaciones (lista):
    calificaciones = []

    for nota in lista:
        if nota < 5:
            calificaciones.append("Suspenso")
        elif nota >= 5 and nota < 6:
            calificaciones.append("Aprovado")
        elif nota >= 6 and nota < 7:
            calificaciones.append("Bien")
        elif nota >= 7 and nota < 8:
            calificaciones.append("Notable")
        elif nota >= 8 and nota < 9:
            calificaciones.append("Notable alto")
        elif nota >= 9 and nota < 10:
            calificaciones.append("Excelente")
        elif nota == 10:
            calificaciones.append("Matricula")
    
    return calificaciones

notas = [0, 3, 5, 6, 7, 8, 9, 10, 2, 2, 8, 7]

print (calificaciones(notas))

# Ejercicio 7
# Escribir una función reciba un diccionario con las asignaturas y las notas de un alumno y devuelva otro diccionario con las asignaturas
#  en mayúsculas y las calificaciones correspondientes a las notas.
def calificaciones_alum (diccionario):
    calif_alum = {}

    for alumno, notas in diccionario.items():
        calific = {}

        for subject, nota in notas.items():
            if nota < 5:
                calific[subject] = "Suspenso"
            elif nota >= 5 and nota < 6:
                calific[subject] = "Aprovado"
            elif nota >= 6 and nota < 7:
                calific[subject] ="Bien"
            elif nota >= 7 and nota < 8:
                calific[subject] = "Notable"
            elif nota >= 8 and nota < 9:
                calific[subject] = "Notable alto"
            elif nota >= 9 and nota < 10:
                calific[subject] = "Excelente"
            elif nota == 10:
                calific[subject] = "Matricula"
        
        calif_alum[alumno] = calific
    
    return calif_alum

asignaturas ={
    "alumno1":{"Matematicas": 6.5, "Historia": 8, "Lengua": 5.75, "Arte": 9, "Etica": 7},
    "alumno2":{"Matematicas": 9.75, "Historia": 5.5, "Lengua": 7, "Arte": 4.25, "Etica": 6},
    "alumno3":{"Matematicas": 4, "Historia": 6.75, "Lengua": 8, "Arte": 7.25, "Etica": 8},
    "alumno4":{"Matematicas": 6, "Historia": 9.5, "Lengua": 6.5, "Arte": 7.5, "Etica": 4},
    "alumno5":{"Matematicas": 2, "Historia": 7, "Lengua": 6.75, "Arte": 6.25, "Etica": 8},
}

print (calificaciones_alum(asignaturas))

# Ejercicio 8
# Escribir una función reciba un diccionario con las asignaturas y las notas de un alumno y devuelva otro diccionario con las asignaturas 
# en mayúsculas y las calificaciones correspondientes a las notas aprobadas.


# Ejercicio 9
# Escribir una función que calcule el módulo de un vector.


# Ejercicio 10
# Una inmobiliaria de una ciudad maneja una lista de inmuebles como la siguiente:

    # [{'año': 2000, 'metros': 100, 'habitaciones': 3, 'garaje': True, 'zona': 'A'},
    # {'año': 2012, 'metros': 60, 'habitaciones': 2, 'garaje': True, 'zona': 'B'},
    # {'año': 1980, 'metros': 120, 'habitaciones': 4, 'garaje': False, 'zona': 'A'},
    # {'año': 2005, 'metros': 75, 'habitaciones': 3, 'garaje': True, 'zona': 'B'},
    # {'año': 2015, 'metros': 90, 'habitaciones': 2, 'garaje': False, 'zona': 'A'}]

# Construir una función que permita hacer búsqueda de inmuebles en función de un presupuesto dado. La función recibirá como entrada la lista 
# de inmuebles y un precio, y devolverá otra lista con los inmuebles cuyo precio sea menor o igual que el dado. Los inmuebles de la lista que 
# se devuelva deben incorporar un nuevo par a cada diccionario con el precio del inmueble, donde el precio de un inmueble se calcula con las 
# siguiente fórmula en función de la zona:

    # Zona A: precio = (metros * 1000 + habitaciones * 5000 + garaje * 15000) * (1-antiguedad/100)
    # Zona B: precio = (metros * 1000 + habitaciones * 5000 + garaje * 15000) * (1-antiguedad/100) * 1.5

# Ejercicio 11
# Escribir una función que reciba una muestra de números y devuelva los valores atípicos, es decir, los valores cuya puntuación típica sea mayor 
# que 3 o menor que -3. Nota: La puntuación típica de un valor se obtiene restando la media y dividiendo por la desviación típica de la muestra.


