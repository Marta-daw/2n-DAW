<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
    <h1>Persones amb número aleatori</h1>
        <table>
            @foreach ($persones as $person)
                <tr>
                    <td>{{ $person->dni }}</td>
                    <td>{{ $person->nombre }}</td>
                </tr>
            @endforeach
        </table>
</div>
