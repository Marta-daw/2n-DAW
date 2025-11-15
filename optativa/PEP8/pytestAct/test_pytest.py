import random
from unittest.mock import patch

# Funció atac_critic(dan: int)


def atac_critic(dany: int) -> int:
    """Retorna dany o dany*2 amb probabilitat 20% per al crític."""
    # TODO: Implementa la funció

    # En el cas que el calcul del random sigui menor del 20% (o del 0.2)
    # el dany final és duplicarà, sinó es quedarà igual
    if random.random() < 0.2:
        danyFinal = dany*2
        print("Atac crític!")
    else:
        danyFinal = dany
        print("Atac normal")

    return danyFinal
    raise NotImplementedError("Implementa atac_critic(dany)")

# Conjunt de proves


def test_atac_crític():
    # Utilitza 'patch' per controlar el comportament de random.random
    # En aquest cas amb el mock.
    with patch('random.random', return_value=0.1):
        # Cas d'atac crític
        assert atac_critic(10) == 20
        assert atac_critic(5) == 10
        assert atac_critic(0) == 0

    with patch('random.random', return_value=0.8):
        # Cas d'atac normal
        assert atac_critic(0) == 0
        assert atac_critic(5) == 5
        assert atac_critic(10) == 10
        assert atac_critic(20) == 20


# ===============================================================================================================
# Funció tirar(dice_notation:str, k: int=1)


def tirar(dice_notation: str, k: int = 1):
    """Interpreta notació NdM, fa k repeticions, imprimeix resultats i 
    retorna (millor, mitjana)."""

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


# Conjunt de proves


def test_tirar():
    # Prova bàsica per a la funció tirar
    millor, mitjana = tirar("2d6", k=5)
    assert 2 <= millor <= 12
    assert 2 <= mitjana <= 12

    millor, mitjana = tirar("1d20", k=10)
    assert 1 <= millor <= 20
    assert 1 <= mitjana <= 20

    millor, mitjana = tirar("3d4", k=5)
    assert 3 <= millor <= 12
    assert 3 <= mitjana <= 12

    # Prova per a notació invàlida
    try:
        tirar("4r8", k=5)
        assert False, "Excepció per notació invàlida"
    except ValueError:
        pass
