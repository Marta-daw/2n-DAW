from django import forms


class InputForm (forms.Form):
    nom = forms.CharField(label="Nom del personatge", max_length=100)
    raca = forms.CharField(label="Raça", max_length=50)
    classe = forms.CharField(label="Classe", max_length=50)
    nivell = forms.IntegerField(label="Nivell", initial=1)
    puntuacio_de_vida = forms.IntegerField(label="HP")
    força = forms.IntegerField(label="FOR", initial=10)
    destresa = forms.IntegerField(label="DES", initial=10)
    constitucio = forms.IntegerField(label="CON", initial=10)
    intelligencia = forms.IntegerField(label="INT", initial=10)
    saviesa = forms.IntegerField(label="SAB", initial=10)
    carisma = forms.IntegerField(label="CAR", initial=10)
    inventari = forms.CharField(
        label="Inventari", widget=forms.Textarea, required=False,
        help_text="Llista d'objectes que porta el personatge")
