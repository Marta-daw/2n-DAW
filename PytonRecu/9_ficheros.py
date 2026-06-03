# Ejercicio 1
# Escribir una función que pida un número entero entre 1 y 10 y guarde en un fichero con el nombre tabla-n.txt
# la tabla de multiplicar de ese número, done n es el número introducido.
num = int(input("Escriu un número entre el 1 i el 10: "))

with open(f'tabla-{num}.txt', 'w') as f:
    for i in range (1, 11):
        multip = num * i
        f.write(f"{num} x {i} = {multip}\n")
        
        i += 1

# Ejercicio 2
# Escribir una función que pida un número entero entre 1 y 10, lea el fichero tabla-n.txt con la tabla de
# multiplicar de ese número, done n es el número introducido, y la muestre por pantalla. Si el fichero no
# existe debe mostrar un mensaje por pantalla informando de ello.
numb= int(input("Escriu un número entre el 1 i el 10: "))

try:
    with open(f'tabla-{numb}.txt', 'r') as f:
        print(f.read())
except FileNotFoundError:
    print(f"El fitxer tabla-{numb}.txt no existeix")

# Ejercicio 3
# Escribir una función que pida dos números n y m entre 1 y 10, lea el fichero tabla-n.txt con la tabla 
# de multiplicar de ese número, y muestre por pantalla la línea m del fichero. Si el fichero no existe debe 
# mostrar un mensaje por pantalla informando de ello.
numA= int(input("Escriu un número entre el 1 i el 10: "))
numB= int(input("Escriu un número entre el 1 i el 10: "))

try:
    with open(f'tabla-{numA}.txt', 'r') as f:
        linies = f.readlines()
    print(linies[numB - 1])
except FileNotFoundError:
    print(f"El fitxer tabla-{numA}.txt no existeix")

# Ejercicio 4
# Escribir un programa que acceda a un fichero de internet mediante su url y muestre por pantalla el número de palabras que contiene.


# Ejercicio 5
# Escribir un programa que abra el fichero con información sobre el PIB per cápita de los países de la Unión Europea
# (url:https://ec.europa.eu/eurostat/estat-navtree-portlet-prod/BulkDownloadListing?file=data/sdg_08_10.tsv.gz&unzip=true), 
# pregunte por las iniciales de un país y muestre el PIB per cápita de ese país de todos los años disponibles.


# Ejercicio 6
# Escribir un programa para gestionar un listín telefónico con los nombres y los teléfonos de los clientes de una empresa. El programa 
# incorporar funciones crear el fichero con el listín si no existe, para consultar el teléfono de un cliente, añadir el teléfono de 
# un nuevo cliente y eliminar el teléfono de un cliente. El listín debe estar guardado en el fichero de texto listin.txt donde el nombre
# del cliente y su teléfono deben aparecer separados por comas y cada cliente en una línea distinta.
opcio = int(input("Escull una d'aquestes opcions: \n 1) Crear el listín de clientes \n 2) Consultar el telefono de un cliente \n 3) Añadir el telefono de un cliente \n 4) Eliminar el teléfono de un cliente \n"))

print (f"Has escollit la opció {opcio}")
continuar = True
match opcio:
    case 1:
        while continuar:
            nom = input("Escriu el nom: ")
            telef= int(input("Escriu el telèfon: "))
            with open('listin.txt', 'a') as f:
                    f.write(f"{nom},{telef}\n")
            continuar = input("Quieres continuar (si/no)? ") == "si"
    case 2:
        nom = input("Escriu el nom de qui vulguis buscar el telèfon: ")
        with open('listin.txt', 'r') as f:
            for line in f:
                if line.split(",")[0] == nom:
                    print(f"El telèfon de {nom} és {line.split(',')[1]}")
    case 3:
        nom = input("Escriu el nom: ")
        telef= int(input("Escriu el telèfon: "))
        with open('listin.txt', 'a') as f:
            f.write(f"{nom}, {telef}\n")
    case 4:
        nom = input("Escriu el nom de qui vulguis eliminar el telèfon: ")
        with open('listin.txt', 'r') as f:
            lines = f.readlines()
        with open('listin.txt', 'w') as f:
            for line in lines:
                if line.split(",")[0] != nom:
                    f.write(line)

# Ejercicio 7
# El fichero cotizacion.csv contiene las cotizaciones de las empresas del IBEX35 con las siguientes columnas: Nombre (nombre de la empresa), 
# Final (precio de la acción al cierre de bolsa), Máximo (precio máximo de la acción durante la jornada), Mínimo (precio mínimo de la acción 
# durante la jornada), Volumen (Volumen al cierre de bolsa), Efectivo (capitalización al cierre en miles de euros).

    # Construir una función reciba el fichero de cotizaciones y devuelva un diccionario con los datos del fichero por columnas.
    # Construir una función que reciba el diccionario devuelto por la función anterior y cree un fichero en formato csv con el mínimo, el máximo y la media de dada columna.


# Ejercicio 8
# El fichero calificaciones.csv contiene las calificaciones de un curso. Durante el curso se realizaron dos exámenes parciales de teoría y 
# un examen de prácticas. Los alumnos que tuvieron menos de 4 en alguno de estos exámenes pudieron repetirlo en la al final del curso 
# (convocatoria ordinaria). Escribir un programa que contenga las siguientes funciones:

    # Una función que reciba el fichero de calificaciones y devuelva una lista de diccionarios, donde cada diccionario contiene la información de 
    # los exámenes y la asistencia de un alumno. La lista tiene que estar ordenada por apellidos.

    # Una función que reciba una lista de diccionarios como la que devuelve la función anterior y añada a cada diccionario un nuevo par con la nota 
    # final del curso. El peso de cada parcial de teoría en la nota final es de un 30% mientras que el peso del examen de prácticas es de un 40%.

    # Una función que reciba una lista de diccionarios como la que devuelve la función anterior y devuelva dos listas, una con los alumnos aprobados 
    # y otra con los alumnos suspensos. Para aprobar el curso, la asistencia tiene que ser mayor o igual que el 75%, la nota de los exámenes parciales 
    # y de prácticas mayor o igual que 4 y la nota final mayor o igual que 5.

def nota(cifra):
    '''Función que elimina cambia las comas de separación de decimales por puntos de una cifra y la convierte en un real.
    Parámetros: cifra: Es una cadena con una cifra.
    Devuelve: Un real con la cifra de la cadena después de cambiar el separador de decimales por punto.
    '''
    cifra = cifra.replace(',','.')
    return float(cifra) 

def calificaciones(ruta):
    '''Función que preprocesa los datos contenidos en un fichero con formato csv y devuelve una lista de diccionarios donde las claves de los 
    diccionarios son los datos de la primera fila y los valores los datos de cada línea del fichero.
    
    Parámetros:
        - ruta: Es una cadena con la ruta del fichero.
    Devuelve:
        Una lista de diccionarios donde cada diccionario contiene los datos de una linea del fichero (a excepción de la primera línea), usando como claves los datos de la primera línea.
    '''
    try:
        # Abrimos el fichero en modo lectura
        f = open(ruta, 'r')
    except FileNotFoundError:
        print('El fichero no existe.')
        return
    # Leemos el fichero por líneas en una lista
    lineas = f.readlines()
    # Cerramos el fichero
    f.close()
    # Leemos las claves del primer elemento de la lista, eliminamos el cambio de línea que aparece al final y dividimos la cadena por el punto y coma.
    claves = lineas[0][:-1].split(";")
    # Creamos la lista de calificaciones
    calificaciones = []
    # Recorremos las líneas del fichero y para cada línea creamos un diccionario que añadimos a la lista de calificaciones.
    for i in lineas[1:]:
        # Eliminamos el cambio de línea del final y dividimos la cadena por el punto y coma.
        valores = i[:-1].split(";")
        # Creamos un diccionario vacío para ir añadiendo los datos de cada alumno.
        alumno = {}
        # Recorremos la lista de valores y los añadimos al diccionario.
        for j in range(len(valores)):
            alumno[claves[j]] = valores[j]
        # Añadimos el diccionario a la lista de calificaciones
        calificaciones.append(alumno)
    return calificaciones

def añadir_nota_final(calificaciones):
    '''Función que recibe una lista de diccionarios con las calificaciones de cada alumno en un curso, calcula la nota final del curso de cada alumno y la añade al diccionario del alumno.

    Parámetros:
        - calificaciones: Es una lista de diccionarios donde cada diccionario contiene los datos de un alumno (nombre, asistencia y notas de exámenes del curso).
    Devuelve:
        La lista de las calificaciones de los alumnos tras añadir a cada alumno de la lista su nota final del curso.
    '''

    def nota_final(alumno):
        '''Función que calcula la nota final del curso de un alumno.

        Parámetros:
            - alumno: Es un diccionario con las notas del alumno.
        Devuelve:
            El diccionario con los datos del alumno tras añadirle un nuevo par con la nota final del curso.
        '''
        if alumno['Ordinario1']: #Si el alumno se ha presentado al examen de repesca del primer parcial tomamos esa nota como la nota del primer parcial
            parcial1 = nota(alumno['Ordinario1'])
        elif alumno['Parcial1']:
            parcial1 = nota(alumno['Parcial1'])
        else: # No se ha presentado al primer parcial ni a la repesca en el ordinario
            parcial1 = 0
        if alumno['Ordinario2']: #Si el alumno se ha presentado al examen de repesca del segundo parcial tomamos esa nota como la nota del segundo parcial
            parcial2 = nota(alumno['Ordinario2'])
        elif alumno['Parcial2']:
            parcial2 = nota(alumno['Parcial2'])
        else: # No se ha presentado al segundo parcial ni a la repesca en el ordinario
            parcial2 = 0 
        if alumno['OrdinarioPracticas']: #Si el alumno se ha presentado al examen de repesca de prácticas tomamos esa nota como la nota de prácticas
            practicas = nota(alumno['OrdinarioPracticas'])
        elif alumno['Practicas']:
            practicas = nota(alumno['Practicas'])
        else:
            practicas = 0
        alumno['Final1'] = parcial1
        alumno['Final2'] = parcial2
        alumno['FinalPracticas'] = practicas
        alumno['NotaFinal'] = parcial1 * 0.3 + parcial2 * 0.3 + practicas * 0.4
        return alumno

    # Aplicamos la función nota_final a todos los alumnos
    return list(map(nota_final, calificaciones))

def aprobados_suspensos(calificaciones):
    '''Función que recibe una lista de diccionarios con las calificaciones de cada alumno en un curso, y devuelve la lista de aprobados y suspensos en el curso.

    Parámetros:
        - calificaciones: Es una lista de diccionarios donde cada diccionario contiene los datos de un alumno (nombre, asistencia y notas de exámenes del curso).
    Devuelve:
        - aprobados: Es una lista con los nombres de los alumnos aprobados.
        - suspensos: Es una lista con los nombres de los alumnos suspensos.
    '''
    # Creamos las listas de aprobados y suspensos vacías
    aprobados = []
    suspensos = []
    # Recorremos los alumnos del curso
    for alumno in calificaciones:
        # Si se cumplen las condiciones para aprobar añadimos el nombre del alumno a la lista de aprobados y si no a la de suspensos.
        if all([int(alumno['Asistencia'][:-1]) >= 75, alumno['Final1'] >= 4, alumno['Final2'] >=4, alumno['FinalPracticas'] >=4, alumno['NotaFinal'] >= 5]):
            aprobados.append(alumno['Apellidos'] + ', ' + alumno['Nombre'])
        else:
            suspensos.append(alumno['Apellidos'] + ', ' + alumno['Nombre'])
    return aprobados, suspensos

# Llamada a las funciones de prueba
print(añadir_nota_final(calificaciones('calificaciones.csv')))
aprobados, suspensos = aprobados_suspensos(añadir_nota_final(calificaciones('calificaciones.csv')))
print('Lista de aprobados:', aprobados)
print('Lista de suspensos:', suspensos)
