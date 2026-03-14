from django.shortcuts import render, redirect, get_object_or_404
from .models import Personatge
from .forms import PersonatgeForm

# Create your views here.


def llista_personatge(request):
    personatges = Personatge.objects.all()
    return render(request, 'llista.html', {'personatges': personatges})


def crear_personatge(request):
    form = PersonatgeForm(request.POST or None)

    if form.is_valid():
        form.save()
        return redirect('llista')

    return render(request, 'formulari.html', {'form': form})


def editar_personatge(request, id):
    personatge = get_object_or_404(Personatge, id=id)
    form = PersonatgeForm(request.POST or None, instance=personatge)

    if form.is_valid():
        form.save()
        return redirect('llista')

    return render(request, 'formulari.html', {'form': form})


def eliminar_personatge(request, id):
    personatge = get_object_or_404(Personatge, id=id)
    personatge.delete()
    return redirect('llista')
