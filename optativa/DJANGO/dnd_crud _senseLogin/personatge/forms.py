from django import forms
from .models import Personatge


class PersonatgeForm(forms.ModelForm):
    class Meta:
        model = Personatge
        fields = '__all__'
