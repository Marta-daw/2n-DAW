from django.db import models

# Create your models here.


class Personatge(models.Model):
    nom = models.CharField(max_length=50)
    classe = models.CharField(max_length=30)
    nivell = models.IntegerField(default=1)

    def __str__(self):
        return self.nom
