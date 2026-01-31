from django.shortcuts import render

# Create your views here.


def calculator(request):
    result = None
    error = None

    if request.method == 'POST':
        try:
            num1 = float(request.POST.get('num1'))
            num2 = float(request.POST.get('num2'))
            operation = request.POST.get('operation')

            if operation == 'add':
                result = num1 + num2
            elif operation == 'subtract':
                result = num1 - num2
            elif operation == 'multiply':
                result = num1 * num2
            elif operation == 'divide':
                if num2 != 0:
                    result = num1 / num2
                else:
                    error = "Cannot divide by zero."
            else:
                error = "Invalid operation."
        except ValueError:
            error = "Invalid input. Please enter numeric values."

    return render(request, 'index.html', {'result': result, 'error': error})
