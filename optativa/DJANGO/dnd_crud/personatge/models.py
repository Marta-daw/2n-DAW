from django.db import models

# Create your models here.


class Personatge(models.Model):
    nom = models.CharField(max_length=50) # Nom del personatge
    raca = models.CharField(max_length=30, default="Humà") # Raça del personatge (Humà, Elfo, Enano, etc.)
    classe = models.CharField(max_length=30) # Classe del personatge (Guerrero, Mago, Pícaro, etc.)
    nivell = models.IntegerField(default=1) # Nivell del personatge (1-20)
    ALINEAMENT = [
        ('caotic', 'Caòtic'),
        ('neutral', 'Neutral'),
        ('legal', 'Legal'),
    ]
    alineament = models.CharField(max_length=10, choices=ALINEAMENT, default='neutral') # Alineament del personatge (Caòtic, Neutral, Legal)

    def __str__(self):
        return self.nom
