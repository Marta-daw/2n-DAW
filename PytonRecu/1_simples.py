# Ejercicio 1
# Escribir un programa que muestre por pantalla la cadena ¡Hola Mundo!.
print("¡Hola mundo!")

# Ejercicio 2
# Escribir un programa que almacene la cadena ¡Hola Mundo! en una variable y luego muestre por pantalla el contenido de la variable.
saludo= "¡Hola mundo!"

print(saludo)

# Ejercicio 3
# Escribir un programa que pregunte el nombre del usuario en la consola y después de que el usuario lo introduzca muestre por pantalla 
# la cadena ¡Hola <nombre>!, donde <nombre> es el nombre que el usuario haya introducido.
nombre = input("Escriu el teu nom: ")

print(f"¡Hola {nombre}!")

# Ejercicio 4
# Escribir un programa que muestre por pantalla el resultado de la siguiente operación aritmética 
#((3 + 2)/(5 * 2)) ** 2
resultat = ((3+2) / (5*2)) ** 2

round_result = round(resultat, 2)

print(f"El resultat de la formula és {resultat}")
print(f"El resultat ARRODONIT és {round_result}")

# Ejercicio 5
# Escribir un programa que pregunte al usuario por el número de horas trabajadas y el coste por hora. Después debe mostrar por pantalla la paga que le corresponde.
horas = int(input("Quantes hores treballes? "))
coste = int(input("Quin és el cost per hora? "))

paga = round((coste * horas), 2)

print(paga)

# Ejercicio 6
# Escribir un programa que lea un entero positivo, n, introducido por el usuario y después muestre en pantalla la suma de todos los enteros desde 1 hasta 
# n. La suma de los primeros enteros positivos puede ser calculada de la siguiente forma: suma= (n*(n+1))/2
digito = int(input("Escriu un numero positiu: "))

suma = digito*(digito+1)/2

print(suma)

# Ejercicio 7
# Escribir un programa que pida al usuario su peso (en kg) y estatura (en metros), calcule el índice de masa corporal y lo almacene en una variable, y 
# muestre por pantalla la frase "Tu índice de masa corporal es <imc>" donde <imc> es el índice de masa corporal calculado redondeado con dos decimales.
altura = float(input("Escriu la teva altura en metres: "))
peso = float(input("Escriu el teu pes en kilos: "))

imc = round((peso / altura**2), 2)

print(imc)

# Ejercicio 8
# Escribir un programa que pida al usuario dos números enteros y muestre por pantalla la "<n> entre <m> da un cociente <c> y un resto <r>" donde <n> y <m> 
# son los números introducidos por el usuario, y <c> y <r> son el cociente y el resto de la división entera respectivamente.
n = float(input("Entra un número: "))
m = float(input("Entra un altre número: "))

c = round((n/m), 2)

r = n%m

print(f"Dividir {n} entre {m} da un cociente {c} y un resto {r}")

# Ejercicio 9
# Escribir un programa que pregunte al usuario una cantidad a invertir, el interés anual y el número de años, y muestre por pantalla el capital obtenido en la inversión.


# Ejercicio 10
# Una juguetería tiene mucho éxito en dos de sus productos: payasos y muñecas. Suele hacer venta por correo y la empresa de logística les cobra por peso de
# cada paquete así que deben calcular el peso de los payasos y muñecas que saldrán en cada paquete a demanda. Cada payaso pesa 112 g y cada muñeca 75 g. 
# Escribir un programa que lea el número de payasos y muñecas vendidos en el último pedido y calcule el peso total del paquete que será enviado.
peso_payaso = 112
peso_muneca = 75

num_payasos = int(input("Escriu la quantitat de pallasos a enviar: "))
num_muneca = int(input("Escriu la quantitat de nines a enviar: "))

peso = (num_payasos * peso_payaso) + (num_muneca + peso_muneca)

print (f"El pes total del paquet és de {peso} grams")

# Ejercicio 11
# Imagina que acabas de abrir una nueva cuenta de ahorros que te ofrece el 4% de interés al año. Estos ahorros debido a intereses, que no se cobran hasta 
# finales de año, se te añaden al balance final de tu cuenta de ahorros. Escribir un programa que comience leyendo la cantidad de dinero depositada en la 
# cuenta de ahorros, introducida por el usuario. Después el programa debe calcular y mostrar por pantalla la cantidad de ahorros tras el primer, segundo y 
# tercer años. Redondear cada cantidad a dos decimales.


# Ejercicio 12
# Una panadería vende barras de pan a 3.49€ cada una. El pan que no es el día tiene un descuento del 60%. Escribir un programa que comience leyendo el número de barras 
# vendidas que no son del día. Después el programa debe mostrar el precio habitual de una barra de pan, el descuento que se le hace por no ser fresca y el coste final total.
barras_no_frescas = int(input("Introdueix el numero de barres venudes que no són del dia: "))
preu_frescas = 3.49
dspt = 60

preu_predesc = (preu_frescas - 60)/100

preu_amb_desc_aplicat = preu_frescas - preu_predesc

print(f"El preu habitual d'una barra és {preu_frescas} €")
print(f"El descompte de les barres que no són del dia és {dspt} %")
print(f"El preu final és {round((preu_amb_desc_aplicat * barras_no_frescas), 2)}")
