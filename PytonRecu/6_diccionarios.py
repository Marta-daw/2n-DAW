# Ejercicio 1
# Escribir un programa que guarde en una variable el diccionario {'Euro':'€', 'Dollar':'$', 'Yen':'¥'}, 
# pregunte al usuario por una divisa y muestre su símbolo o un mensaje de aviso si la divisa no está en el diccionario.
divisas = {'Euro':'€', 'Dollar':'$', 'Yen':'¥'}
divisa_usuario = input("Introdueix una divisa: ")

if divisa_usuario in divisas:
    print (f"El símbol de {divisa_usuario} és {divisas[divisa_usuario]}")
else:
    print (f"El símbol de {divisa_usuario} no està en el diccionari")

# Ejercicio 2
# Escribir un programa que pregunte al usuario su nombre, edad, dirección y teléfono y lo guarde en un 
# diccionario. Después debe mostrar por pantalla el mensaje <nombre> tiene <edad> años, vive en 
# <dirección> y su número de teléfono es <teléfono>.
person = {}

nombre = input ("Com et dius? ")
edad = int(input ("Quants anys tens? "))
direccion = input("Quina és la teva direcció? ")
telefon = int(input("Quin és el teu telèfon: "))

person = {'name':nombre, 'age':edad, 'address':direccion, 'phone': telefon}

print(person)
print(f"{person['name']} tiene {person['age']} años, vive en {person['address']} y su número de telefono es {person['phone']}" )

# Ejercicio 3
# Escribir un programa que guarde en un diccionario los precios de las frutas de la tabla, pregunte al 
# usuario por una fruta, un número de kilos y muestre por pantalla el precio de ese número de kilos de 
# fruta. Si la fruta no está en el diccionario debe mostrar un mensaje informando de ello.

    # Fruta	    Precio
    # Plátano	1.35
    # Manzana	0.80
    # Pera	    0.85
    # Naranja	0.70

frutas = { "Plátano":1.35, "Manzana":0.80, "Pera":0.85, "Naranja":0.70 }

fruta = input ("Que fruta quieres? ")
kilos = float(input("Cuantos kilos? "))

if fruta in frutas:
    price = round((frutas[fruta] * kilos), 2)
    print (f"El precio de {kilos} kilos de {fruta} es {price}")
else:
    print (f"La fruta {fruta} no existe en el diccioanrio")

# Ejercicio 4
# Escribir un programa que pregunte una fecha en formato dd/mm/aaaa y muestre por pantalla la misma fecha 
# en formato dd de <mes> de aaaa donde <mes> es el nombre del mes.
meses = { '01': 'enero', '02': 'febrero', '03': 'marzo', '04': 'abril', '05': 'mayo', '06': 'junio', '07': 'julio', '08': 'agosto', '09': 'septiembre', '10': 'octubre', '11': 'noviembre', '12': 'diciembre' }

fecha = input("Introduce una fecha en formato 'dd/mm/aaaa': ")

fecha_split = fecha.split("/")

if fecha_split[1] in meses:
    print(f"{fecha_split[0]} de {meses[fecha_split[1]]} de {fecha_split[2]}")

# Ejercicio 5
# Escribir un programa que almacene el diccionario con los créditos de las asignaturas de un curso 
# {'Matemáticas': 6, 'Física': 4, 'Química': 5} y después muestre por pantalla los créditos de cada asignatura 
# en el formato <asignatura> tiene <créditos> créditos, donde <asignatura> es cada una de las asignaturas del 
# curso, y <créditos> son sus créditos. Al final debe mostrar también el número total de créditos del curso.
subjects = {'Matemáticas': 6, 'Física': 4, 'Química': 5, 'Tecnología': 7, 'Historia': 2}

total = 0

for subject in subjects:
    print(f"{subject} tiene {subjects[subject]} creditos")
    total += subjects[subject]

print(f"El total de creditos és {total}")

# Ejercicio 6
# Escribir un programa que cree un diccionario vacío y lo vaya llenado con información sobre una persona 
# (por ejemplo nombre, edad, sexo, teléfono, correo electrónico, etc.) que se le pida al usuario. Cada vez que 
# se añada un nuevo dato debe imprimirse el contenido del diccionario.
persona = {}
continuar = True

while continuar:
    clave = input("Que información quieres introducir? ")
    valor = input (clave+": ")
    persona [clave] = valor
    print(persona)
    continuar = input("Quieres continuar (si/no)? ") == "si"

# Ejercicio 7
# Escribir un programa que cree un diccionario simulando una cesta de la compra. El programa debe preguntar el 
# artículo y su precio y añadir el par al diccionario, hasta que el usuario decida terminar. Después se debe 
# mostrar por pantalla la lista de la compra y el coste total, con el siguiente formato

    # Lista de la compra	
    # Artículo 1	Precio
    # Artículo 2	Precio
    # Artículo 3	Precio
    # …	…
    # Total	        Coste

# Ejercicio 8
# Escribir un programa que cree un diccionario de traducción español-inglés. El usuario introducirá las palabras en 
# español e inglés separadas por dos puntos, y cada par <palabra>:<traducción> separados por comas. El programa debe 
# crear un diccionario con las palabras y sus traducciones. Después pedirá una frase en español y utilizará el diccionario 
# para traducirla palabra a palabra. Si una palabra no está en el diccionario debe dejarla sin traducir.


# Ejercicio 9
# Escribir un programa que gestione las facturas pendientes de cobro de una empresa. Las facturas se almacenarán en un 
# diccionario donde la clave de cada factura será el número de factura y el valor el coste de la factura. El programa debe 
# preguntar al usuario si quiere añadir una nueva factura, pagar una existente o terminar. Si desea añadir una nueva factura 
# se preguntará por el número de factura y su coste y se añadirá al diccionario. Si se desea pagar una factura se preguntará 
# por el número de factura y se eliminará del diccionario. Después de cada operación el programa debe mostrar por pantalla 
# la cantidad cobrada hasta el momento y la cantidad pendiente de cobro.


# Ejercicio 10
# Escribir un programa que permita gestionar la base de datos de clientes de una empresa. Los clientes se guardarán en un 
# diccionario en el que la clave de cada cliente será su NIF, y el valor será otro diccionario con los datos del cliente 
# (nombre, dirección, teléfono, correo, preferente), donde preferente tendrá el valor True si se trata de un cliente preferente. 
# El programa debe preguntar al usuario por una opción del siguiente menú: (1) Añadir cliente, (2) Eliminar cliente, (3) Mostrar 
# cliente, (4) Listar todos los clientes, (5) Listar clientes preferentes, (6) Terminar. En función de la opción elegida el 
# programa tendrá que hacer lo siguiente:

    # Preguntar los datos del cliente, crear un diccionario con los datos y añadirlo a la base de datos.
    # Preguntar por el NIF del cliente y eliminar sus datos de la base de datos.
    # Preguntar por el NIF del cliente y mostrar sus datos.
    # Mostrar lista de todos los clientes de la base datos con su NIF y nombre.
    # Mostrar la lista de clientes preferentes de la base de datos con su NIF y nombre.
    # Terminar el programa.

# Ejercicio 11
# El directorio de los clientes de una empresa está organizado en una cadena de texto como la de más abajo, donde cada línea contiene 
# la información del nombre, email, teléfono, nif, y el descuento que se le aplica. Las líneas se separan con el carácter de cambio de 
# línea \n y la primera línea contiene los nombres de los campos con la información contenida en el directorio.

# "nif;nombre;email;teléfono;descuento\n01234567L;Luis González;luisgonzalez@mail.com;656343576;12.5\n71476342J;Macarena Ramírez;
# macarena@mail.com;692839321;8\n63823376M;Juan José Martínez;juanjo@mail.com;664888233;5.2\n98376547F;Carmen Sánchez;carmen@mail.com;667677855;15.7"

# Escribir un programa que genere un diccionario con la información del directorio, donde cada elemento corresponda a un cliente y 
# tenga por clave su nif y por valor otro diccionario con el resto de la información del cliente. Los diccionarios con la 
# información de cada cliente tendrán como claves los nombres de los campos y como valores la información de cada clienteb correspondientes 
# a los campos. Es decir, un diccionario como el siguiente
# {'01234567L': {'nombre': 'Luis González', 'email': 'luisgonzalez@mail.com', 'teléfono': '656343576', 'descuento': 12.5}, 
# '71476342J': {'nombre': 'Macarena Ramírez', 'email': 'macarena@mail.com', 'teléfono': '692839321', 'descuento': 8.0}, 
# '63823376M': {'nombre': 'Juan José Martínez', 'email': 'juanjo@mail.com', 'teléfono': '664888233', 'descuento': 5.2}, 
# '98376547F': {'nombre': 'Carmen Sánchez', 'email': 'carmen@mail.com', 'teléfono': '667677855', 'descuento': 15.7}}

