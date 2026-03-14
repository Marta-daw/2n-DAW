from django.urls import path
from . import views

urlpatterns = [
    path('', views.llista_personatge, name='llista'),
    path('crear/', views.crear_personatge, name='crear'),
    path('editar/<int:id>/', views.editar_personatge, name='editar'),
    path('eliminar/<int:id>/', views.eliminar_personatge, name='eliminar'),
]
