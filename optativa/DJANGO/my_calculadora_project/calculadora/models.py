from django.db import models

# Create your models here.


class Calcular(models.Model):
    digitoUno = models.FloatField()
    digitoDos = models.FloatField()
    operacion = models.CharField(max_length=10)
    resultado = models.FloatField()

    def __str__(self):
        return f"{self.digitoUno}{self.operacion}{self.digitoDos} = {self.resultado}"
