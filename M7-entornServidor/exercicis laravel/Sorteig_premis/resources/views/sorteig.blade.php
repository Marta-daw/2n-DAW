@vite(['resources/css/styles.css'])
<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <h1>Persones amb premi aleatori</h1>
        <table>
            <tr>
                <th>DNI</th>
                <th>Premio</th>
            </tr>
            @foreach ($persones as $person)
                <tr>
                    <td>{{ $person->dni }}</td>
                    <td>{{ $person->premi->nom }}</td>
                </tr>
            @endforeach
        </table>
</div>
