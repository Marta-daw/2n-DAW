from django.db import models
import random

# Create your models here.
class Character(models.Model):
    RACES = [
        ('huma', 'Humà'),
        ('elfo', 'Elfo'),
        ('enano', 'Enano'),
        ('mediano', 'Mediano'),
        ('orco', 'Orco'),
        ('goblin', 'Goblin'),
        ('troll', 'Troll'),
    ]

    CLASSES = [
        ('guerrero', 'Guerrero'),
        ('mago', 'Mago'),
        ('picaro', 'Pícaro'),
        ('clerigo', 'Clérigo'),
        ('druida', 'Druida'),
        ('bardo', 'Bardo'),
        ('paladin', 'Paladín'),
        ('explorador', 'Explorador'),
    ]

    ESTADISTIQUES = [
        ('força', 'Força'),
        ('destresa', 'Destresa'),
        ('constitucio', 'Constitució'),
        ('intel·ligencia', 'Intel·ligència'),
        ('sabiduria', 'Sabiduría'),
        ('carisma', 'Carisma'),
    ]

    nom = models.CharField(max_length=100)
    raca = models.CharField(choices=RACES)
    classe = models.CharField(choices=CLASSES)
    nivell = models.IntegerField(default=1)
    estadistiques = models.CharField(choices=ESTADISTIQUES)
    
    #Mètode que simula el llançament de 4 daus de 6 cares i es queda amb la suma dels 3 digits més alts
    @staticmethod
    def roll_stat():
        rolls = [random.randint(1, 6) for _ in range(4)]
        return sum(sorted(rolls)[1:])

    #Mètode que assigna valors aletoris a les estadístiques fent servir el mètode roll_stat, i també utilitza random.choice per assignar una raça i classe aletòria
    def generate_stats(self):
        self.força = self.roll_stat()
        self.destresa = self.roll_stat()
        self.constitucio = self.roll_stat()
        self.intel·ligencia = self.roll_stat()
        self.sabiduria = self.roll_stat()
        self.carisma = self.roll_stat()
        self.raca = random.choice(self.RACES)[0]
        self.classe = random.choice(self.CLASSES)[0]

    def __str__(self):
        return self.nom