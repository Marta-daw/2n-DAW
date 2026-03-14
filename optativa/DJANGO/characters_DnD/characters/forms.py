from django import forms
from .models import Character

class CharacterForm(forms.ModelForm):
    randomize = forms.BooleanField(required=False, label='Genera Stats Aleatoris')
    
    class Meta:
        model = Character
        fields = '__all__'
        widgets = {
            'força': forms.NumberInput(attrs={'min':1, 'max':20}),
            'destresa': forms.NumberInput(attrs={'min':1, 'max':20}),
            'constitucio': forms.NumberInput(attrs={'min':1, 'max':20}),
            'intel·ligencia': forms.NumberInput(attrs={'min':1, 'max':20}),
            'sabiduria': forms.NumberInput(attrs={'min':1, 'max':20}),
            'carisma': forms.NumberInput(attrs={'min':1, 'max':20}),
        }

        