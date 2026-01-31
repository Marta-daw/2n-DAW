from django.db import models

# Create your models here.


class Personatge(models.Model):
    nom = models.CharField(max_length=100, help_text="Nom del personatge")
    raca = models.CharField(max_length=50, verbose_name="Raça")
    classe = models.CharField(max_length=50)
    nivell = models.IntegerField(default=1)
    puntuacio_de_vida = models.IntegerField(verbose_name="HP")
    força = models.IntegerField(default=10, verbose_name="FOR")
    destresa = models.IntegerField(default=10, verbose_name="DES")
    constitucio = models.IntegerField(default=10, verbose_name="CON")
    intelligencia = models.IntegerField(default=10, verbose_name="INT")
    saviesa = models.IntegerField(default=10, verbose_name="SAB")
    carisma = models.IntegerField(default=10, verbose_name="CAR")
    inventari = models.TextField(
        blank=True, help_text="Llista d'objectes que porta el personatge")

    def __str__(self):
        return f"{self.nom} - Nivell {self.nivell}{self.classe}"

    # Mètode per calcular el modificador d'una puntuació
    def get_modificador(self, atribut):
        return (atribut - 10) // 2
