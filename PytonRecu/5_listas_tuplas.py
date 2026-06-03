# Ejercicio 1
# Escribir un programa que almacene las asignaturas de un curso (por ejemplo Matemáticas, Física, Química, Historia y Lengua) 
# en una lista y la muestre por pantalla.
assignatures = ["Matemáticas", "Física", "Química", "Historia", "Lengua"]

print(assignatures)

# Ejercicio 2
# Escribir un programa que almacene las asignaturas de un curso (por ejemplo Matemáticas, Física, Química, Historia y Lengua) en 
# una lista y la muestre por pantalla el mensaje Yo estudio <asignatura>, donde <asignatura> es cada una de las asignaturas de la lista.
i=0
while i < len(assignatures):
    print (f"Yo estudio {assignatures[i]}")
    i += 1

# Ejercicio 3
# Escribir un programa que almacene las asignaturas de un curso (por ejemplo Matemáticas, Física, Química, Historia y Lengua) en 
# una lista, pregunte al usuario la nota que ha sacado en cada asignatura, y después las muestre por pantalla con el mensaje 
# "En <asignatura> has sacado <nota>" donde <asignatura> es cada una des las asignaturas de la lista y <nota> cada una de las 
# correspondientes notas introducidas por el usuario.
scores = []

for classe in assignatures:
    score = float(input(f"Quina nota has tret a {classe}? "))    
    scores.append(score)

for i in range (len(assignatures)):
    print (f"A {assignatures[i]} has tret {scores[i]}")
    i += 1

# Ejercicio 4
# Escribir un programa que pregunte al usuario los números ganadores de la lotería primitiva, los almacene en una lista y los muestre por pantalla ordenados de menor a mayor.
numeros_loto = []

for i in range(6):
    num_ganador = int(input("Introdueix el número guanyador: "))
    numeros_loto.append(num_ganador)
    
numeros_loto.sort()
print(numeros_loto)

# Ejercicio 5
# Escribir un programa que almacene en una lista los números del 1 al 10 y los muestre por pantalla en orden inverso separados por comas.
digits = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10]

#Opció 1
for i in range(1, 11):
    b = sorted(digits, reverse=True)
    i+=1

print(b)

#opció 2
    # digits.reverse()

    # print(digits)

# Ejercicio 6
# Escribir un programa que almacene las asignaturas de un curso (por ejemplo Matemáticas, Física, Química, Historia y Lengua) en una lista, 
# pregunte al usuario la nota que ha sacado en cada asignatura y elimine de la lista las asignaturas aprobadas. Al final el programa debe 
# mostrar por pantalla las asignaturas que el usuario tiene que repetir.
subjects = ["Matemáticas", "Física", "Química", "Historia", "Lengua"]

for subject in subjects[:]:
    nota = int(input(f"Quina nota has treta a {subject}? "))
    if nota >= 5:
        subjects.remove(subject)

print (subjects)

# Ejercicio 7
# Escribir un programa que almacene el abecedario en una lista, elimine de la lista las letras que ocupen posiciones múltiplos de 3, y muestre por pantalla la lista resultante.
abecedario = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]

for i in range (len(abecedario) -1, -1, -1):
    if i % 3 == 0:
        abecedario.pop(i)

print (abecedario)

# Ejercicio 8
# Escribir un programa que pida al usuario una palabra y muestre por pantalla si es un palíndromo.
palabra = input("Escriu una paraula: ")
palabra_alreves = palabra[::-1]

if palabra.lower() == palabra_alreves.lower():
    print("És una paraula palíndroma")
else:
    print("NO és una paraula palíndroma")

print (palabra, palabra_alreves)

# Ejercicio 9
# Escribir un programa que pida al usuario una palabra y muestre por pantalla el número de veces que contiene cada vocal.


# !! Ejercicio 10
# Escribir un programa que almacene en una lista los siguientes precios, 50, 75, 46, 22, 80, 65, 8, y muestre por pantalla el menor y el mayor de los precios.
prices = [50, 75, 46, 22, 80, 65, 8]
prices_nov = sorted(prices)
print (prices_nov)

# Ejercicio 11
# Escribir un programa que almacene los vectores (1,2,3) y (-1,0,2) en dos listas y muestre por pantalla su producto escalar.


# Ejercicio 12
# Escribir un programa que almacene las matrices
# [[1,0,2],[-1,3,1]] y [[3,1],[2,1],[1,0]] en dos listas anidadas (listas dentro de listas) y muestre por pantalla su producto.

# en una lista y muestre por pantalla su producto.
# Nota: Para representar matrices mediante listas usar listas anidadas, representando cada vector fila en una lista.


# Ejercicio 13
# Escribir un programa que pregunte por una muestra de números, separados por comas, los guarde en una lista y muestre por pantalla su media y desviación típica.
numeros2 = []

list_nums = input("Escriu una llista de números separats per comes: ")

numeros2= list_nums.split(", ")

print(numeros2)

for i in range (len(numeros2)):
    numeros2[i] = int(numeros2[i]) 

print(numeros2)

media = round ((sum(numeros2) / len (numeros2)), 2)

desviacion = round((sum((x - media) ** 2 for x in numeros2) / len(numeros2)) ** 0.5, 2)

print(f"La media es {media} y la desviación típica es {desviacion}")