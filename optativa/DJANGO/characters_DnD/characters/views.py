from django.shortcuts import render
from .forms import CharacterForm

# Create your views here.
def create_character(request):
    if request.method == 'POST':
        form = CharacterForm(request.POST)
        if form.is_valid():
            character = form.save(commit=False) #Pausa el temps! Crea objecte però no el guarda a la base de dades

            if form.cleaned_data['randomize']:
                character.generate_stats()
            
            character.save() #Ara si que es guarda al model
    else:
        form = CharacterForm()

        
    return render(request, 'formulari.html', {'form': form})