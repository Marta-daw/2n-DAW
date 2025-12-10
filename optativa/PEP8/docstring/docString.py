import random

# Funció atac_critic(dan: int)


def atac_critic(dany: int) -> int:
    """Funció atac_critic: segons el dany passat per paràmetre
    retorna dany o dany*2 amb probabilitat 20% per al crític.

    En el cas que el calcul del random sigui menor del 20% (o del 0.2)
    el dany final és duplicarà, sinó es quedarà igual
    """
    if random.random() < 0.2:
        dany_final = dany*2
        print("Atac crític!")
    else:
        dany_final = dany
        print("Atac normal")

    return dany_final
    raise NotImplementedError("Implementa atac_critic(dany)")


print(atac_critic.__doc__)

# ===============================================================================================================
# Funció tirar(dice_notation:str, k: int=1)


def tirar(dice_notation: str, k: int = 1):
    """Funció tirar(): Segons el què es passa per paràmetre
    s'interpreta notació NdM, fa k repeticions,
    imprimeix resultats/detalls de la tirada i retorna la 
    millor tirada i la mitjana.

    # el random.randit(1, cares) ens genera un número aleatori
    # entre els dos digits introduits, en aquest cas entre 1 i
    # el numero de cares del dau

    # Els bucles el que fan és que a la primera tirada, el
    # resultat de tirar cada dau és guarda a l'array "tirada",
    # després es fa la suma dels digits i finalment es guarda
    # el resultat a l'array "resultats"
    """

    # Pas 1: Interpretar la notació "NdM"
    # Dividim per la 'd' per obtenir número de daus i cares
    parts = dice_notation.lower().split('d')
    num_daus = int(parts[0])  # Quants daus tenim per tirar
    cares = int(parts[1])     # De quantes cares es cada dau

    # Pas 2: Fer k repeticions (entrades per parametre)
    resultats = []  # Guardem les sumes de cada tirada

    for i in range(k):
        # Tirar tots els daus
        tirada = []
        for j in range(num_daus):
            # el random.randit(1, cares) ens genera un número aleatori
            # entre els dos digits introduits, en aquest cas entre 1 i
            # el numero de cares del dau

            # En aquest bucles el que fan és que a la primera tirada, el
            # resultat de tirar cada dau és guarda a l'array "tirada",
            # després es fa la suma dels digits i finalment es guarda
            # el resultat a l'array "resultats"
            valor = random.randint(1, cares)
            tirada.append(valor)

        suma = sum(tirada)
        resultats.append(suma)

        # Pas 3: Imprimir detalls de la tirada
        print(f"Tirada {i+1}: {tirada} = {suma}")

    # Pas 4: Calcular millor i mitjana agafant el resultat de cada
    # suma que hem guardat a l'array "resultat"
    millor = max(resultats)
    mitjana = sum(resultats) / len(resultats)

    print(f"\nMillor tirada: {millor}")
    print(f"Mitjana: {mitjana:.2f}")

    return (millor, mitjana)

    raise NotImplementedError("Implementa tirar(dice_notation, k)")


print(tirar.__doc__)
