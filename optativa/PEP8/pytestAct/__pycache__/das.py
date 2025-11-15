import random
import re

# Funció tirar(dice_notation:str, k: int=1)


def tirar(dice_notation: str, k: int = 1):

    # Parsejar la notació de daus (exemple: 3d6, 1d20, etc.)
    # Ens ajuda a buscar el patró "num + d + num"
    # (\d+)  -> busca un o més dígits (primer grup: nombre de daus
    # i segon grup: nombre de cares)
    # d      -> busca la lletra 'd'
    # .lower().strip() -> per assegurar que la notació és en minúscules
    #   i sense espais innecessaris
    match = re.match(r'(\d+)d(\d+)', dice_notation.lower().strip())
    if not match:
        raise ValueError(
            f"Notació invàlida: {dice_notation}. Usa el format NdM (exemple: 3d6)")

    num_daus = int(match.group(1))
    cares = int(match.group(2))

    if num_daus <= 0 or cares <= 0:
        raise ValueError("El nombre de daus i cares han de ser positius")

    print(
        f"Tirant {dice_notation} ({num_daus} daus de {cares} cares) {k} vegades...\n")

    totals = []

    for i in range(k):
        # Tirar tots els daus
        # Resultats genera un numero aleatori entre 1
        # i el nombre de cares per cada dau
        resultats = [random.randint(1, cares) for _ in range(num_daus)]
        total = sum(resultats)
        totals.append(total)

        # Mostrar els resultats
        daus_str = " + ".join(str(r) for r in resultats)
        print(f"Tirada {i+1}: [{daus_str}] = {total}")

    # Calcular millor i mitjana
    millor = max(totals)
    mitjana = sum(totals) / len(totals)

    print(f"\nResum després de {k} tirades:")
    print(f"Millor resultat: {millor}")
    print(f"Mitjana: {mitjana:.2f}")
    print(f"Rang possible: {num_daus}-{num_daus * cares}")

    return millor, mitjana

    raise NotImplementedError("Implementa tirar(dice_notation, k)")


def test_tirar():
    # Prova bàsica per a la funció tirar
    millor, mitjana = tirar("2d6", k=5)
    assert 2 <= millor <= 12
    assert 2 <= mitjana <= 12
