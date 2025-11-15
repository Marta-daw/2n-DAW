# S'utilitza l'extensió AUTOPEP8 i FLAKE8 per assegurar-se que el
# codi compleix amb els estàndards PEP 8.

# S'eliminen els imports ja que són innecessaris.

# En aquest cas, l'error es trobava en l'espai entre el signe "="
# i el valor assignat.
PI = 3.14159

# En el codi original, la classe necessitava dos espais en blanc entre
# el codi que introduim previament i la declaració de la classe. A més,
# el nom de la classe ha de començar amb una lletra majúscula.


class Calculator:
    # Al igual que la variable anterior, s'ha afegit un espai entre el signe
    # "=", el nom de la variable i el valor assignat.
    def __init__(self, name): self.name = name

    # S'ha afegit un espai després de les comes que separen els paràmetres.
    # A més, el nom del mètode ha de començar amb una lletra minúscula.
    def add(self, a, b):
        # Mala identació
        return a+b

# En el codi original, la funció necessitava dos espais en blanc entre
# el codi que introduim previament i la declaració de la funció.


def compute_circle_area(radius): return PI*radius*radius

# En el codi original, la funció necessitava dos espais en blanc entre
# el codi que introduim previament i la declaració de la funció.


def print_info(calc):
    # S'ha afegit un espai després de la coma.
    print("Calculator:", calc.name)


# Es necessiten dos espais en blanc entre el codi que introduim previament
# i la declaració de la variable.
unused_variable = 42

# En el codi original, la funció necessitava dos espais en blanc entre
# el codi que introduim previament i la declaració de la funció.


def divide(a, b):
    if b == 0:
        return None
    return a/b

# En el codi original, la funció necessitava dos espais en blanc entre
# el codi que introduim previament i la declaració de la funció.


def main():
    # S'ha d'incloure un espai després de les comes.
    c = Calculator("Prova")
    print_info(c)
    # S'ha d'afegir un espai després de les comes.
    print("Area", compute_circle_area(5))
    # S'ha d'afegir un espai després de les comes.
    print("Sum:", c.add(2, 3))
    # S'ha d'afegir un espai després de les comes.
    print("Div:", divide(4, 0))


# S'han d'afegir dos espais en blanc abans de la declaració següent.
if __name__ == "__main__":
    main()
