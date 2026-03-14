@vite(['resources/css/styles.css'])
<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <h1>Persones Participants al sorteig</h1>
        <table>
            <tr>
                <th>DNI</th>
                <th>Nom</th>
                <th>Cognom1</th>
                <th>Cognom2</th>
                <th>Telèfon</th>
                <th>Correu</th>
            </tr>
            @foreach ($persones as $person)
                <tr>
                    <td>{{ $person->dni }}</td>
                    <td>{{ $person->nom }}</td>
                    <td>{{ $person->cognom1 }}</td>
                    <td>{{ $person->cognom2 }}</td>
                    <td>{{ $person->telefon }}</td>
                    <td>{{ $person->correu }}</td>
                </tr>
            @endforeach
        </table>
</div>
