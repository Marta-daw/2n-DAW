from django.shortcuts import render
from .forms import InputForm
# Create your views here.


def personatge(request):
    context = {
        'nom': 'Aragorn',
        'raca': 'Humà',
        'classe': 'Muntaraz',
        'nivell': 5,
        'stats': {
            'FOR': 16, 'DES': 14, 'CON': 15,
            'INT': 12, 'SAB': 13, 'CAR': 17
        },
        'habilitats': ['Rastrejar', 'Espasa', 'Supervivència'],
        'equipament': ['Espasa Andúril', 'Capa èlfica', 'Pa de lembas'],
    }

    return render(request, 'personatge.html', context)


def home_view(request):
    context = {}
    context['form'] = InputForm()
    return render(request, 'home.html', context)
